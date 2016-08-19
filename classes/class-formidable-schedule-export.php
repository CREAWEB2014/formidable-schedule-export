<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link 		http://example.com
 * @since 		1.0.0
 *
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
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
 * @since 		1.0.0
 * @package 	Formidable_Schedule_Export
 * @subpackage 	Formidable_Schedule_Export/classes
 * @author 		Chris Wilcoxson <web@dccmarketing.com>
 * http://example.com
 */
class Formidable_Schedule_Export {

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Plugin_Name 	$_instance 		Instance singleton.
	 */
	protected static $_instance;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Formidable_Schedule_Export_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_formidable_hooks();

	} // __construct()

	/**
	 * Creates an instance of the sanitizer and the loader, which will be used to
	 * register the hooks with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		$this->loader = new Formidable_Schedule_Export_Loader();

	} // load_dependencies()

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Formidable_Schedule_Export_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Formidable_Schedule_Export_i18n();

		$this->loader->action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	} // set_locale()

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Formidable_Schedule_Export_Admin();

		$this->loader->action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	} // define_admin_hooks()

	/**
	 * Registers all the hooks related to the Formidable Admin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 */
	private function define_formidable_hooks() {

		$formidable = new Formidable_Schedule_Export_Formidable_Admin();

		$this->loader->action( 'frm_add_settings_section', $formidable, 'add_tab_to_formidable_global_settings', 10, 1 );
		$this->loader->action( 'admin_init', $formidable, 'register_fields' );
		$this->loader->action( 'admin_init', $formidable, 'register_sections' );
		$this->loader->action( 'admin_init', $formidable, 'register_settings' );

	} // define_formidable_hooks()

	/**
	 * Get instance of main class
	 *
	 * @since 		1.0.0
	 * @return 		Plugin_Name
	 */
	public static function get_instance() {

		if ( empty( self::$_instance ) ) {

			self::$_instance = new self;

		}

		return self::$_instance;

	} // get_instance()

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->loader->run();

	} // run()

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 *
	 * @return    Formidable_Schedule_Export_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {

		return $this->loader;

	} // get_loader()

} // class
