<?php

/**
 * Fired during plugin deactivation
 *
 * @link       jeremy.l.wagner@gmail.com
 * @since      1.0.0
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Guess_Js
 * @subpackage Guess_Js/includes
 * @author     Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;

		$wpdb->query( "DROP TABLE IF EXISTS " . GUESS_JS_PREDICTIONS_TABLE );
		$wpdb->query( "DROP TABLE IF EXISTS " . GUESS_JS_PAGEVIEWS_TABLE );
		$wpdb->query( "DROP TABLE IF EXISTS " . GUESS_JS_USER_FLOWS_TABLE );
		delete_option ( GUESS_JS_OPTIONS_VIEW_ID );
		delete_option ( GUESS_JS_OPTIONS_CREDENTIALS );

		if ( file_exists ( GUESS_JS_CREDENTIALS_FILE ) ){
			unlink( GUESS_JS_CREDENTIALS_FILE );
		}
	}

}
