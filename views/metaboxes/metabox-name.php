<?php

/**
 * Displays a metabox
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/classes/views
 */

wp_nonce_field( FORMIDABLE_SCHEDULE_EXPORT_SLUG, 'nonce_formidable_schedule_export_metabox_name' );

$atts['description'] 	= esc_html__( 'Checkbox Field', 'formidable-schedule-export' );
$atts['id'] 			= 'checkbox-field';
$atts['label'] 			= esc_html__( 'Checkbox Field', 'formidable-schedule-export' );
$atts['name'] 			= 'checkbox-field';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/checkbox.php' );
unset( $atts );

?></p><?php



$atts['id'] = 'editor-field';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/editor.php' );
unset( $atts );

?></p><?php



$atts['id'] 	= 'file-uploader-field';
$atts['name'] 	= 'file-uploader-field';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/file-upload.php' );
unset( $atts );

?></p><?php



$atts['description'] 	= esc_html__( 'Radio Field Description', 'formidable-schedule-export' );
$atts['id'] 			= 'radios-field';
$atts['label'] 			= esc_html__( 'Radios Field', 'formidable-schedule-export' );
$atts['name'] 			= 'radios-field';
$atts['selections'][] 	= array( 'value' => 'example1', 'label' => esc_html__( 'Example 1', 'formidable-schedule-export' ) );
$atts['selections'][] 	= array( 'value' => 'example2', 'label' => esc_html__( 'Example 2', 'formidable-schedule-export' ) );
$atts['selections'][] 	= array( 'value' => 'example3', 'label' => esc_html__( 'Example 3', 'formidable-schedule-export' ) );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/radios.php' );
unset( $atts );

?></p><?php



$atts['aria'] 			= esc_html__( 'Select an option', 'formidable-schedule-export' );
$atts['description'] 	= esc_html__( 'Select Field Description', 'formidable-schedule-export' );
$atts['id'] 			= 'select-field';
$atts['label'] 			= esc_html__( 'Select Field', 'formidable-schedule-export' );
$atts['name'] 			= 'select-field';
$atts['selections'][] 	= array( 'value' => 'example1', 'label' => esc_html__( 'Example 1', 'formidable-schedule-export' ) );
$atts['selections'][] 	= array( 'value' => 'example2', 'label' => esc_html__( 'Example 2', 'formidable-schedule-export' ) );
$atts['selections'][] 	= array( 'value' => 'example3', 'label' => esc_html__( 'Example 3', 'formidable-schedule-export' ) );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/select.php' );
unset( $atts );

?></p><?php



$atts['description'] 	= esc_html__( 'Text Field Description', 'formidable-schedule-export' );
$atts['id'] 			= 'text-field';
$atts['label'] 			= esc_html__( 'Text Field', 'formidable-schedule-export' );
$atts['name'] 			= 'text-field';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/text.php' );
unset( $atts );

?></p><?php



$atts['description'] 	= esc_html__( 'Textarea Field Description', 'formidable-schedule-export' );
$atts['id'] 			= 'textarea-field';
$atts['label'] 			= esc_html__( 'Textarea Field', 'formidable-schedule-export' );
$atts['name'] 			= 'textarea-field';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/textarea.php' );
unset( $atts );

?></p>
