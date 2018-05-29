<?php

// Include Google API stuff
putenv( 'GOOGLE_APPLICATION_CREDENTIALS=' . dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'credentials.json' ); // Hardcoding this is a baaad idea, and needs to be done some other way.
require_once( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' );

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link			 jeremy.l.wagner@gmail.com
 * @since			1.0.0
 *
 * @package		Guess_Js
 * @subpackage Guess_Js/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since			1.0.0
 * @package		Guess_Js
 * @subpackage Guess_Js/includes
 * @author		 Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			Guess_Js_Loader		$loader		Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			string		$plugin_name		The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			string		$version		The current version of the plugin.
	 */
	protected $version;

	/**
	 * The view ID of the Google Analytics collection
	 *
	 * @since		1.0.0
	 * @access	 protected
	 * @var			int		$view_id		The view ID of the Google Analytics collection
	 */
	protected $view_id;

	/**
	 * Define the core functionality of the plugin
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since		1.0.0
	 */
	public function __construct() {
		global $wpdb;
		$wpdb->show_errors();

		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'guess-js';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		// This is hardcoded and should be exposed to an admin interface at some point
		$this->view_id = '89465509';

		// Calling this ad hoc for now, but this should be invoked via the admin panel or something.
		// $this->generate_predictions();
		// die;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Guess_Js_Loader. Orchestrates the hooks of the plugin.
	 * - Guess_Js_i18n. Defines internationalization functionality.
	 * - Guess_Js_Admin. Defines all hooks for the admin area.
	 * - Guess_Js_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since		1.0.0
	 * @access	 private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-guess-js-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-guess-js-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-guess-js-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-guess-js-public.php';

		$this->loader = new Guess_Js_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Guess_Js_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since		1.0.0
	 * @access	 private
	 */
	private function set_locale() {

		$plugin_i18n = new Guess_Js_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since		1.0.0
	 * @access	 private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Guess_Js_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since		1.0.0
	 * @access	 private
	 */
	private function define_public_hooks() {

		$plugin_public = new Guess_Js_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'register_api_endpoints' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since		1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since		 1.0.0
	 * @return		string		The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since		 1.0.0
	 * @return		Guess_Js_Loader		Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since		 1.0.0
	 * @return		string		The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Generate prefetch predictions
	 *
	 * @since		 1.0.0
	 * @return		string		The version number of the plugin.
	 */
	public function generate_predictions() {
		// Connect to the API and service account
		$client = new Google_Client();
		$client->useApplicationDefaultCredentials();
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
	}

	/**
	 * Parse data from the predictions
	 *
	 * @since		 1.0.0
	 * @return		string		The version number of the plugin.
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

			usort ( $nextPages, function( $a, $b ) {
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
