<?php

/**
 * Fired during plugin activation
 *
 * @link			 jeremy.l.wagner@gmail.com
 * @since			1.0.0
 *
 * @package		Guess_Js
 * @subpackage Guess_Js/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since			1.0.0
 * @package		Guess_Js
 * @subpackage Guess_Js/includes
 * @author		 Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js_Activator {
	/**
	 * Fired during plugin activation. Creates necessary tables for Guess JS to store data.
	 *
	 * Long Description.
	 *
	 * @since		1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$queries = array(
			'predictions_table' => 'CREATE TABLE ' . GUESS_JS_PREDICTIONS_TABLE . ' (
				prediction_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				prediction_page_path VARCHAR(255) NOT NULL,
				prediction_next_page_certainty VARCHAR(255) NOT NULL,
				prediction_next_page_path VARCHAR(255) NOT NULL,
				PRIMARY KEY (prediction_id)
			) ' . $charset_collate . ';',
			'pageviews_table' => 'CREATE TABLE ' . GUESS_JS_PAGEVIEWS_TABLE . ' (
				pageview_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				pageview_connection_type VARCHAR(255) NOT NULL,
				pageview_platform VARCHAR(255) NOT NULL,
				pageview_language VARCHAR(255) NOT NULL,
				pageview_prefetch_path VARCHAR(255) NULL,
				pageview_actual_prefetch_path VARCHAR(255) NULL,
				PRIMARY KEY (pageview_id)
			) ' . $charset_collate . ';',
			'user_flows_table' => 'CREATE TABLE ' . GUESS_JS_USER_FLOWS_TABLE . ' (
				user_flow_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				user_flow_page_id INT UNSIGNED NOT NULL,
				user_flow_page_path VARCHAR(255) NOT NULL,
				PRIMARY KEY (user_flow_id),
				KEY (user_flow_page_id)
			) ' . $charset_collate . ';',
		);

		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta($queries);
	}
}
