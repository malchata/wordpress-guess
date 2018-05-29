<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       jeremy.l.wagner@gmail.com
 * @since      1.0.0
 *
 * @package    Guess_Js
 * @subpackage Guess_Js/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Guess_Js
 * @subpackage Guess_Js/includes
 * @author     Jeremy Wagner <jeremy.l.wagner@gmail.com>
 */
class Guess_Js_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'guess-js',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
