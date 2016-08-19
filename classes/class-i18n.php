<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since 		1.0.0
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 * @author 		Chris Wilcoxson <web@dccmarketing.com>
 */
class Formidable_Schedule_Export_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'formidable-schedule-export',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/assets/languages/'
		);

	} // load_plugin_textdomain()

} // class
