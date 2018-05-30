<?php

global $wpdb;
define( 'GUESS_JS_PREDICTIONS_TABLE', $wpdb->prefix . 'guess_js_predictions' );
define( 'GUESS_JS_PAGEVIEWS_TABLE', $wpdb->prefix . 'guess_js_pageviews' );
define( 'GUESS_JS_USER_FLOWS_TABLE', $wpdb->prefix . 'guess_js_user_flows' );
define( 'GUESS_JS_OPTIONS_VIEW_ID', 'guess_js_view_id' );
define( 'GUESS_JS_OPTIONS_CREDENTIALS', 'guess_js_credentials' );
define( 'GUESS_JS_CREDENTIALS_FILE', dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'credentials.json' );

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              jeremy.l.wagner@gmail.com
 * @since             1.0.0
 * @package           Guess_Js
 *
 * @wordpress-plugin
 * Plugin Name:       Guess JS
 * Plugin URI:        guess-js
 * Description:       Improves loading performance for your site's visitors by intelligently prefetching pages based on data from Google Analytics.
 * Version:           1.0.0
 * Author:            Jeremy Wagner
 * Author URI:        jeremy.l.wagner@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       guess-js
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GUESS_JS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-guess-js-activator.php
 */
function activate_guess_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-guess-js-activator.php';
	Guess_Js_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-guess-js-deactivator.php
 */
function deactivate_guess_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-guess-js-deactivator.php';
	Guess_Js_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_guess_js' );
register_deactivation_hook( __FILE__, 'deactivate_guess_js' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-guess-js.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_guess_js() {

	$plugin = new Guess_Js();
	$plugin->run();

}
run_guess_js();
