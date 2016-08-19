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
class Formidable_Schedule_Export_Formidable_Admin {

	/**
	 * The settings fields.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		array 			$fields 		The settings fields
	 */
	private $fields;

	/**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options 		The plugin options.
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {

		$this->set_options();

	} // __construct()

	public function add_tab_to_formidable_global_settings( $sections ) {

		$sections['scheduleExport']['class'] 		= 'Formidable_Schedule_Export_Formidable_Admin';
		$sections['scheduleExport']['function'] 	= 'route';

		return $sections;

	} // add_tab_to_formidable_global_settings()

	public static function display_form() {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/pages/formidable-settings.php' );

	} // display_form()

	/**
	 * Creates a checkbox field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_checkbox( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/checkbox.php' );

	} // field_checkbox()

	/**
	 * Creates a checkbox field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_date( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/date.php' );

	} // field_date()

	/**
	 * Creates a text field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_editor( $atts ) {

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/editor.php' );

	} // field_editor()

	/**
	 * Creates a file uploader field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_file_uploader( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/file-upload.php' );

	} // field_file_uploader()

	/**
	 * Creates a set of radios field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_radios( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/radios.php' );

	} // field_radios()

	/**
	 * Creates a set of repeatable fields.
	 *
	 * Must include a sub-array for each field's args.
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_repeater( $args ) {

		$defaults['class'] 			= 'repeater';
		$defaults['fields'] 		= array();
		$defaults['id'] 			= '';
		$defaults['label-add'] 		= 'Add Item';
		$defaults['label-edit'] 	= 'Edit Item';
		$defaults['label-header'] 	= 'Item Name';
		$defaults['label-remove'] 	= 'Remove Item';
		$defaults['title-field'] 	= '';

		/**
		 * formidable-schedule-export-field-repeater-options-defaults filter
		 *
		 * @param 	array 	$defaults 		The default settings for the field
		 */
		apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-repeater-options-defaults', $defaults );

		$setatts 	= wp_parse_args( $args, $defaults );
		$count 		= 1;
		$repeater 	= array();

		if ( ! empty( $this->options[$setatts['id']] ) ) {

			$repeater = maybe_unserialize( $this->options[$setatts['id']][0] );

		}

		if ( ! empty( $repeater ) ) {

			$count = count( $repeater );

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-admin-field-repeater.php' );

	} // field_repeater()

	/**
	 * Creates a select field
	 *
	 * Requires the ID parameter value.
	 *
	 * Note: label is blank since its created in the Settings API
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_select( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/select.php' );

	} // field_select()

	/**
	 * Creates a text field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_text( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/text.php' );

	} // field_text()

	/**
	 * Creates a textarea field
	 *
	 * Requires the ID parameter value.
	 *
	 * @param 	array 		$atts 			The arguments for the field
	 *
	 * @return 	string 						The HTML field
	 */
	public function field_textarea( $atts ) {

		$atts['name'] = FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-options[' . $atts['id'] . ']';

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/fields/textarea.php' );

	} // field_textarea()

	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

		$options = array();

		$options[] = array( 'date1', 'date', '' );
		$options[] = array( 'date2', 'date', '' );
		$options[] = array( 'recipient', 'email', '' );

		return $options;

	} // get_options_list()

	/**
	 * Registers settings fields with WordPress
	 */
	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			'recipient',
			apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-label-recipient', esc_html__( 'Recipient', 'formidable-schedule-export' ) ),
			array( $this, 'field_text' ),
			FORMIDABLE_SCHEDULE_EXPORT_SLUG,
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-settingssection',
			array(
				'description' 	=> esc_html__( 'What email address should receive the export?', 'formidable-schedule-export' ),
				'id' 			=> 'recipient',
				'type' 			=> 'email',
				'value' 		=> '',
			)
		);

		add_settings_field(
			'date1',
			apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-label-date1', esc_html__( 'Date 1', 'formidable-schedule-export' ) ),
			array( $this, 'field_date' ),
			FORMIDABLE_SCHEDULE_EXPORT_SLUG,
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-settingssection',
			array(
				'description' 	=> esc_html__( 'First date to send the export.', 'formidable-schedule-export' ),
				'id' 			=> 'date1',
				'value' 		=> ''
			)
		);

		add_settings_field(
			'date2',
			apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-label-date2', esc_html__( 'Date 2', 'formidable-schedule-export' ) ),
			array( $this, 'field_date' ),
			FORMIDABLE_SCHEDULE_EXPORT_SLUG,
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-settingssection',
			array(
				'description' 	=> esc_html__( 'Second date to send the export.', 'formidable-schedule-export' ),
				'id' 			=> 'date2',
				'value' 		=> ''
			)
		);

	} // register_fields()

	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-settingssection',
			apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-section-settingssection-title', esc_html__( '', 'formidable-schedule-export' ) ),
			array( $this, 'section_settingssection' ),
			FORMIDABLE_SCHEDULE_EXPORT_SLUG
		);

	} // register_sections()

	/**
	 * Registers plugin settings
	 *
	 * @since 		1.0.0
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-formidable-options',
			FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-formidable-options',
			array( $this, 'validate_options' )
		);

	} // register_settings()

	public static function route() {

		$action = isset( $_REQUEST['frm_action'] ) ? 'frm_action' : 'action';
		$action = FrmAppHelper::get_param( $action );

		if ( $action == 'process-form' ) {

			return self::validate_options();

		} else {

			return self::display_form();

		}

	} // route()

	/**
	 * Displays a settings section
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$params 		Array of parameters for the section
	 *
	 * @return 		mixed 						The settings section
	 */
	public function section_settingssection( $params ) {

		include( plugin_dir_path( dirname( __FILE__ ) ) . 'views/sections/settingssection.php' );

	} // section_settingssection()

	/**
	 * Sets the class variable $options
	 */
	private function set_options() {

		$this->options = get_option( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-formidable-options' );

	} // set_options()

	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 *
	 * @param 		array 		$input 			array of submitted plugin options
	 *
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		$valid 		= array();
		$options 	= $this->get_options_list();

		foreach ( $options as $option ) {

			$sanitizer 			= new Formidable_Schedule_Export_Sanitize();
			$valid[$option[0]] 	= $sanitizer->clean( $input[$option[0]], $option[1] );

			if ( $valid[$option[0]] != $input[$option[0]] ) {

				add_settings_error( $option[0], $option[0] . '_error', esc_html__( $option[0] . ' error.', 'formidable-schedule-export' ), 'error' );

			}

			unset( $sanitizer );

		}

		return $valid;

	} // validate_options()

} // class
