<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       jeremy.l.wagner@gmail.com
 * @since      1.0.0
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/public
 * @author     Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Guess_Js_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Guess_Js_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Guess_Js_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Guess_Js_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_action( 'wp_head', array( $this, 'guess_js_inline_nonce' ) );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/predictive-fetching.js', array(), $this->version, true );
	}

	public function guess_js_inline_nonce() {
		?><script>GUESS_JS_NONCE="<?php echo wp_create_nonce( 'wp_rest' ); ?>"</script><?php
	}

	public function should_prefetch( $request, $prediction ) {
		if ( is_null( $prediction ) || ( isset( $_SERVER['HTTP_SAVE_DATA'] ) && strtolower( $_SERVER['HTTP_SAVE_DATA'] ) === 'on' ) ) {
			return false;
		}

		$certainty_thresholds_by_connection_type = array(
			'slow-2g' => 0.95,
			'2g' => 0.9,
			'3g' => 0.5,
			'4g' => 0.2
		);

		$connection_type = $request['clientInfo']['connectionType'];

		if ( !isset( $certainty_thresholds_by_connection_type[$connection_type] ) ) {
			return false;
		} else {
			$threshold = $certainty_thresholds_by_connection_type[$connection_type];
			return ( float )$prediction->prediction_next_page_certainty > ( float )$threshold;
		}
	}

	public function get_previous_page_id( $cookies ) {
		$latest_time_stamp = 0;
		$latest_id = null;

		foreach ( $cookies as $cookie ) {
			$timestamp = ( int )explode( '=', $cookie );

			if ( $timestamp > $latest_time_stamp ) {
				$latest_time_stamp = $timestamp;
				$latest_id = substr( $cookie, ( strpos( $cookie, '_' ) + 1 ), strpos( $cookie, '=' ) );
			}
		}

		return $latest_id;
	}

	public function register_api_endpoints() {
		add_action( 'rest_api_init', function() {
			register_rest_route( 'guess-js/v1', '/get_prediction', array (
				'methods' => 'POST',
				'callback' => function( $request ) {
					global $wpdb;
					$wpdb->show_errors();

					header( 'Access-Control-Allow-Origin: ' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
					header( 'Access-Control-Allow-Methods: ' . 'PUT, GET, POST, DELETE, OPTIONS' );
					header( 'Access-Control-Allow-Headers: ' . 'X-Requested-With, Content-Type' );

					$prediction = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . GUESS_JS_PREDICTIONS_TABLE . ' WHERE prediction_page_path=%s', $request['pagePath'] ) );
					$prefetch_path = $this->should_prefetch( $request, $prediction ) ? $prediction->prediction_next_page_path : '';

					$pageview = array(
						'page_path' => $request['pagePath'],
						'client_info' => $request['clientInfo'],
						'prefetch_path' => $prefetch_path
					);

					$wpdb->insert( GUESS_JS_PAGEVIEWS_TABLE, array(
							'pageview_id' => 0,
							'pageview_connection_type' => $pageview['client_info']['connectionType'],
							'pageview_platform' => $pageview['client_info']['platform'],
							'pageview_language' => $pageview['client_info']['language'],
							'pageview_prefetch_path' => strlen( $pageview['prefetch_path'] ) > 0 ? $pageview['prefetch_path'] : null,
							'pageview_actual_prefetch_path' => null
						)
					);

					$pageview_id = $wpdb->insert_id;

					if ( count( $request['userFlow'] ) > 0 ) {
						$id = $this->get_previous_page_id( $request['userFlow'] );
						$wpdb->update( GUESS_JS_PAGEVIEWS_TABLE, array(
								'pageview_actual_prefetch_path' => $pageview['page_path']
							) , array (
								'pageview_id' => $id
							)
						);
					}

					$response = new WP_REST_Response( array(
							'pageViewId' => $pageview_id,
							'prefetchPath' => $prefetch_path
						)
					);

					$response->set_status(200);
					return $response;
				}
			) );
		} );
	}
}
