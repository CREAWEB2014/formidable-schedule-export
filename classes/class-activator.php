<?php

/**
 * Fired during plugin activation
 *
 * @link 		http://example.com
 * @since 		1.0.0
 *
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since 		1.0.0
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 * @author 		Chris Wilcoxson <web@dccmarketing.com>
 */
class Formidable_Schedule_Export_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-formidable-admin.php';

		$opts 		= array();
		$options 	= Formidable_Schedule_Export_Formidable_Admin::get_options_list();

		foreach ( $options as $option ) {

			$opts[ $option[0] ] = $option[2];

		}

		update_option( 'formidable-schedule-export-options', $opts );

	} // activate()

} // class
