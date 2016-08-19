<?php

/**
 * The plugin bootstrap file
 *
 * @link 				http://example.com
 * @since 				1.0.0
 * @package 			Formidable_Schedule_Export
 *
 * @wordpress-plugin
 * Plugin Name: 		Formidable Schedule Export
 * Plugin URI: 			http://example.com/formidable-schedule-export/
 * Description: 		Exports form submissions on a chosen schedule and emails them to the requested email address.
 * Version: 			1.0.0
 * Author: 				DCC Marketing
 * Author URI: 			http://dccmarketing.com/
 * License: 			GPL-2.0+
 * License URI: 		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: 		formidable-schedule-export
 * Domain Path: 		/assets/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

/**
 * Define constants
 */
define( 'FORMIDABLE_SCHEDULE_EXPORT_VERSION', '1.0.0' );
define( 'FORMIDABLE_SCHEDULE_EXPORT_SLUG', 'formidable-schedule-export' );
define( 'FORMIDABLE_SCHEDULE_EXPORT_FILE', plugin_basename( __FILE__ ) );

/**
 * Activation/Deactivation Hooks
 */
register_activation_hook( __FILE__, array( 'Formidable_Schedule_Export_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Formidable_Schedule_Export_Deactivator', 'deactivate' ) );

/**
 * Autoloader function
 *
 * Will search both plugin root and includes folder for class
 *
 * @param string $class_name
 */
if ( ! function_exists( 'formidable_schedule_export_autoloader' ) ) :

	function formidable_schedule_export_autoloader( $class_name ) {

		$class_name = str_replace( 'Formidable_Schedule_Export_', '', $class_name );
		$lower 		= strtolower( $class_name );
		$file      	= 'class-' . str_replace( '_', '-', $lower ) . '.php';
		$base_path 	= plugin_dir_path( __FILE__ );
		$paths[] 	= $base_path . $file;
		$paths[] 	= $base_path . 'classes/' . $file;

		/**
		 * formidable_schedule_export_autoloader_paths filter
		 */
		$paths = apply_filters( 'formidable-schedule-export-autoloader-paths', $paths );

		foreach ( $paths as $path ) :

			if ( is_readable( $path ) && file_exists( $path ) ) {

				require_once( $path );
				return;

			}

		endforeach;

	} // formidable_schedule_export_autoloader()

endif;

spl_autoload_register( 'formidable_schedule_export_autoloader' );

if ( ! function_exists( 'formidable_schedule_export_init' ) ) :

	/**
	 * Function to initialize plugin
	 */
	function formidable_schedule_export_init() {

		formidable_schedule_export()->run();

	}

	add_action( 'plugins_loaded', 'formidable_schedule_export_init' );

endif;

if ( ! function_exists( 'formidable_schedule_export' ) ) :

	/**
	 * Function wrapper to get instance of plugin
	 *
	 * @return Formidable_Schedule_Export
	 */
	function formidable_schedule_export() {

		return Formidable_Schedule_Export::get_instance();

	}

endif;
