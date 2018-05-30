<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       jeremy.l.wagner@gmail.com
 * @since      1.0.0
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/admin
 * @author     Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js_Admin {

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
	 * The view ID of the Google Analytics collection
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			string		$view_id		The view ID of the Google Analytics collection
	 */
	protected $view_id;

	/**
	 * The JSON credentials for authenticating to the service account
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			string		$view_id		The JSON credentials for authenticating to the service account
	 */
	protected $credentials;

	/**
	 * Initializes the UI for the Guess.js admin page.
	 *
	 * @since    1.0.0
	 */
	public function guess_js_admin_menu() {
		add_menu_page( 'Guess.js', 'Guess.js', 'manage_options', 'guess-js-options', array( $this, 'guess_js_init' ) );
	}

	/**
	 * Populates the UI for the Guess.js admin page.
	 *
	 * @since    1.0.0
	 */
	public function guess_js_init() {
	 $view_id = get_option( GUESS_JS_OPTIONS_VIEW_ID );
	 $json_credentials = get_option( GUESS_JS_OPTIONS_CREDENTIALS );

	 ?>
	 <h1>Guess.js Settings</h1>
	 <?php
	 if ( isset( $_POST['guess_js_save'] ) && $_POST['guess_js_save'] == 1 ) {
		 echo '<div id="message" class="updated notice is-dismissible"><p>Settings saved.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
	 }

	 if ( isset( $_POST['guess_js_populate_predictions'] ) && $_POST['guess_js_populate_predictions'] == 1 ) {
		 echo '<div id="message" class="updated notice is-dismissible"><p>Predictions have been generated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
	 }
	 ?>
	 <hr>
	 <h2>General settings</h2>
	 <form method="POST" id="guess-js-options-form" action="options-general.php?page=guess-js-options&amp;savedata=true">
		 <fieldset>
			 <?php wp_nonce_field( 'save-guess-js-settings', '_guessjs_nonce' ); ?>
			 <input type="hidden" name="guess_js_save" value="1">
			 <table class="form-table">
				 <tbody>
					 <tr>
						 <th scope="row">
							 <label for="guess_js_view_id">View ID</label>
						 </th>
						 <td>
							 <input type="text" id="guess_js_view_id" name="guess_js_view_id" value="<?php if ( is_string( $view_id ) ): echo $view_id; endif; ?>">
						 </td>
					 </tr>
					 <tr>
						 <th scope="row">
							 <label for="guess_js_credentials_json">Credentials JSON Contents</label>
						 </th>
						 <td>
							 <textarea id="guess_js_credentials_json" name="guess_js_credentials_json"><?php if ( is_string( $json_credentials ) ): echo $json_credentials; endif; ?></textarea>
						 </td>
					 </tr>
				 </tbody>
			 </table>
			 <p class="submit">
				 <input type="submit" name="submit_guess_js_options" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
			 </p>
		 </fieldset>
	 </form>
	 <hr>
	 <h2>Populate/update predictions table</h2>
	 <form method="post" id="guess-js-generate-predictions" action="options-general.php?page=guess-js-options&amp;generate_predictions=true">
		 <fieldset>
			 <?php wp_nonce_field( 'populate-guess-js-predictions', '_guessjs_nonce' ); ?>
			 <input type="hidden" name="guess_js_populate_predictions" value="1">
			 <p class="submit">
				 <input type="submit" name="submit_guess_js_generate_predictions" class="button-primary" value="<?php _e( 'Click to Populate/update predictions table' ); ?>" />
			 </p>
		 </fieldset>
	 </form>
	 <?php
	}

	/**
	 * Saves option fields from the admin page to the database.
	 *
	 * @since    1.0.0
	 */
	public function save_guess_js_options() {
		if ( !current_user_can( 'manage_options' ) ) {
			wp_die( 'You do not have sufficient permissions to access this page.' );
		}

		if ( check_admin_referer( 'save-guess-js-settings', '_guessjs_nonce' ) ) {
			$clean = array();

			if( isset( $_POST['guess_js_view_id'] ) && !empty( $_POST['guess_js_view_id'] ) && ctype_alnum( $_POST['guess_js_view_id'] ) ) {
				$clean['guess_js_view_id'] = $_POST['guess_js_view_id'];
			} else {
				return false;
			}

			if( isset( $_POST['guess_js_credentials_json'] ) && !empty( $_POST['guess_js_credentials_json'] ) ) {
				$clean['guess_js_credentials_json'] = stripslashes( $_POST['guess_js_credentials_json'] );
			} else {
				return false;
			}

			update_option( GUESS_JS_OPTIONS_VIEW_ID, $clean['guess_js_view_id'] );
			update_option( GUESS_JS_OPTIONS_CREDENTIALS, $clean['guess_js_credentials_json'] );
			wp_cache_delete ( 'alloptions', 'options' );
		}
	}

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', array( $this, 'guess_js_admin_menu' ) );

		if ( isset( $_POST['guess_js_save'] ) && $_POST['guess_js_save'] == 1 ) {
			add_action( 'admin_init', array( $this, 'save_guess_js_options' ) );
		}

		if ( isset( $_POST['guess_js_populate_predictions'] ) && $_POST['guess_js_populate_predictions'] == 1 ) {
			add_action( 'admin_init', array( $this, 'generate_predictions' ) );
		}

		$this->view_id = get_option( GUESS_JS_OPTIONS_VIEW_ID );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/guess-js-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/guess-js-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Generate prefetch predictions
	 *
	 * @since		 1.0.0
	 */
	public function generate_predictions() {
		if ( !current_user_can( 'manage_options' ) ) {
			wp_die( 'You do not have sufficient permissions to access this page.' );
		}

		if ( check_admin_referer( 'populate-guess-js-predictions', '_guessjs_nonce' ) ) {
			$this->credentials = get_option( GUESS_JS_OPTIONS_CREDENTIALS ); // <-- Still not sure if this is entirely safe

			// Psst. Set permissions pls.
			if ( !file_exists( GUESS_JS_CREDENTIALS_FILE ) ) {
				file_put_contents( GUESS_JS_CREDENTIALS_FILE, $this->credentials );
			}

			// Connect to the API and service account
			$client = new Google_Client();
			$client->setAuthConfig( GUESS_JS_CREDENTIALS_FILE );
			$client->setScopes( 'https://www.googleapis.com/auth/analytics.readonly' );
			$analyticsReporting = new Google_Service_AnalyticsReporting($client);

			// Create the DateRange object
			$dateRange = new Google_Service_AnalyticsReporting_DateRange();
			$dateRange->setStartDate( '30daysAgo' );
			$dateRange->setEndDate( 'yesterday' );

			// Create the Metrics object
			$pageviews = new Google_Service_AnalyticsReporting_Metric();
			$pageviews->setExpression( 'ga:pageviews' );
			$pageviews->setAlias( 'Pageviews' );
			$exits = new Google_Service_AnalyticsReporting_Metric();
			$exits->setExpression( 'ga:exits' );
			$exits->setAlias( 'Page Exits' );

			// Create the Dimensions object
			$previousPagePath = new Google_Service_AnalyticsReporting_Dimension();
			$previousPagePath->setName( 'ga:previousPagePath' );
			$pagePath = new Google_Service_AnalyticsReporting_Dimension();
			$pagePath->setName( 'ga:pagePath' );

			// Set proper sort parameters
			$primarySort = new Google_Service_AnalyticsReporting_OrderBy();
			$primarySort->setOrderType( 'VALUE' );
			$primarySort->setFieldName( 'ga:previousPagePath' );
			$primarySort->setSortOrder( 'ASCENDING' );
			$secondarySort = new Google_Service_AnalyticsReporting_OrderBy();
			$secondarySort->setOrderType( 'VALUE' );
			$secondarySort->setFieldName( 'ga:pageviews' );
			$secondarySort->setSortOrder( 'DESCENDING' );

			// Create the ReportRequest object
			$request = new Google_Service_AnalyticsReporting_ReportRequest();
			$request->setViewId( $this->view_id );
			$request->setDateRanges( array( $dateRange ) );
			$request->setDimensions( array( $previousPagePath, $pagePath ) );
			$request->setMetrics( array( $pageviews, $exits ) );
			$request->setOrderBys( array ( $primarySort, $secondarySort ) );
			$request->setPageSize( '10000' );

			$body = new Google_Service_AnalyticsReporting_GetReportsRequest();
			$body->setReportRequests( array( $request ) );
			$report = $analyticsReporting->reports->batchGet( $body );

			$this->parse_data( $report->reports );

			if ( file_exists ( GUESS_JS_CREDENTIALS_FILE ) ){
				unlink( GUESS_JS_CREDENTIALS_FILE );
			}
		}
	}

	/**
	 * Parse data from the predictions
	 *
	 * @since		 1.0.0
	 */
	public function parse_data( $reports ) {
		$report = $reports;
		$rows = $report[0]->data->rows;
		$data = [];
		$pages = [];

		foreach ( $rows as $row ) {
			$previousPagePath = $row->dimensions[0];
			$pagePath = $row->dimensions[1];
			$pageviews = $row->metrics[0]->values[0];
			$exits = $row->metrics[0]->values[1];

			if ( preg_match( '/\?.*$/', $pagePath ) || preg_match( '/\?.*$/', $previousPagePath ) ) {
				$pagePath = preg_replace( '/\?.*$/', '', $pagePath );
				$previousPagePath = preg_replace( '/\?.*$/', '', $previousPagePath );
			}

			if ( $previousPagePath == $pagePath ) {
				continue;
			}

			if ( $previousPagePath != '(entrance)' ) {
				if ( !isset( $data[$previousPagePath] ) ) {
					$data[$previousPagePath] = new StdClass;
					$data[$previousPagePath]->pagePath = $previousPagePath;
					$data[$previousPagePath]->pageviews = 0;
					$data[$previousPagePath]->exits = 0;
					$data[$previousPagePath]->nextPageviews = 0;
					$data[$previousPagePath]->nextExits = 0;
					$data[$previousPagePath]->nextPages = new StdClass;
				} else {
					$data[$previousPagePath] = $data[$previousPagePath];
				}

				$data[$previousPagePath]->nextPageviews += $pageviews;
				$data[$previousPagePath]->nextExits += $exits;

				if ( property_exists( $data[$previousPagePath]->nextPages, $pagePath ) ) {
					$data[$previousPagePath]->nextPages->{$pagePath} += $pageviews;
				} else {
					$data[$previousPagePath]->nextPages->{$pagePath} = $pageviews;
				}
			}

			if ( !isset( $data[$pagePath] ) ) {
				$data[$pagePath] = new StdClass;
				$data[$pagePath]->pagePath = $pagePath;
				$data[$pagePath]->pageviews = 0;
				$data[$pagePath]->exits = 0;
				$data[$pagePath]->nextPageviews = 0;
				$data[$pagePath]->nextExits = 0;
				$data[$pagePath]->nextPages = new StdClass;
			} else {
				$data[$pagePath] = $data[$pagePath];
			}

			$data[$pagePath]->pageviews += $pageviews;
			$data[$pagePath]->exits += $exits;
		}

		foreach ( $data as $page ) {
			$nextPages = array();

			foreach ( $page->nextPages as $pagePath => $pageviews ) {
				$nextPageObj = new StdClass;
				$nextPageObj->pagePath = $pagePath;
				$nextPageObj->pageviews = $pageviews;
				array_push( $nextPages, $nextPageObj );
			}

			usort( $nextPages, function( $a, $b ) {
				if ( $a->pageviews == $b->pageviews ) {
					return 0;
				}

				return ( $a->pageviews < $b->pageviews ) ? 1 : -1;
			} );

			$page->nextPages = $nextPages;
		}

		$data = array_filter( $data, function( $var ) {
			return $var->nextPageviews > 0;
		} );

		foreach ( $data as $page ) {
			$page->percentExits = $page->exits / ( $page->exits + $page->nextPageviews );
			$page->topNextPageProbability = $page->nextPages[0]->pageviews / ( $page->exits + $page->nextPageviews );
			array_push( $pages, $page );
		}

		$this->save_pages_to_database( $pages );
	}

	/**
	 * Saves pages to the database
	 *
	 * @since		 1.0.0
	 */
	public function save_pages_to_database( $pages ) {
		global $wpdb;

		foreach ( $pages as $page ) {
			$row = $wpdb->get_row( 'SELECT * FROM ' . GUESS_JS_PREDICTIONS_TABLE . ' WHERE prediction_page_path=\'' . $page->pagePath . '\'' );

			if( is_null( $row ) ) {
				$wpdb->insert( GUESS_JS_PREDICTIONS_TABLE, array(
					'prediction_id' => 0,
					'prediction_page_path' => $page->pagePath,
					'prediction_next_page_certainty' => $page->topNextPageProbability,
					'prediction_next_page_path' => $page->nextPages[0]->pagePath
				) );
			} else {
				$wpdb->update( GUESS_JS_PREDICTIONS_TABLE, array(
					'prediction_page_path' => $page->pagePath,
					'prediction_next_page_certainty' => $page->topNextPageProbability,
					'prediction_next_page_path' => $page->nextPages[0]->pagePath
				), array(
					'prediction_id' => $row->prediction_id
				) );
			}
		}
	}
}
