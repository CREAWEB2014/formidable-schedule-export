<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link 		http://example.com
 * @since 		1.0.0
 *
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 * @author 		Chris Wilcoxson <web@dccmarketing.com>
 */
class Formidable_Schedule_Export_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {

		//

	} // __construct()

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( FORMIDABLE_SCHEDULE_EXPORT_SLUG, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/formidable-schedule-export-admin.css', array(), FORMIDABLE_SCHEDULE_EXPORT_VERSION, 'all' );

	} // enqueue_styles()

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook_suffix ) {

		wp_enqueue_media();

		wp_enqueue_script( FORMIDABLE_SCHEDULE_EXPORT_SLUG, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/formidable-schedule-export-admin.min.js', array( 'jquery' ), FORMIDABLE_SCHEDULE_EXPORT_VERSION, true );

	} // enqueue_scripts()

} // class
