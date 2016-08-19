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

wp_nonce_field( FORMIDABLE_SCHEDULE_EXPORT_SLUG, 'nonce_formidable_schedule_export_repeater' );

$setatts 						= array();
$setatts['class'] 				= 'repeater';
$setatts['id'] 					= 'file-repeater';
$setatts['labels']['add'] 		= __( 'Add File', 'formidable-schedule-export' );
$setatts['labels']['edit'] 		= __( 'Edit File', 'formidable-schedule-export' );
$setatts['labels']['header'] 	= __( 'File Name', 'formidable-schedule-export' );
$setatts['labels']['remove'] 	= __( 'Remove File', 'formidable-schedule-export' );
$i 								= 0;

$field1 						= array();
$field1['class'] 				= 'text widefat';
$field1['description'] 			= __( '', 'formidable-schedule-export' );
$field1['fieldtype'] 			= 'text';
$field1['id'] 					= 'file-uploader-field';
$field1['label'] 				= __( '', 'formidable-schedule-export' );
$field1['label-remove'] 		= __( 'Remove File', 'formidable-schedule-export' );
$field1['label-upload'] 		= __( 'Upload/Choose File', 'formidable-schedule-export' );
$field1['name'] 				= 'file-uploader-field';
$field1['placeholder'] 			= __( '', 'formidable-schedule-export' );
$field1['type'] 				= 'url';
$field1['value'] 				= '';

$field2 						= array();
$field2['class'] 				= 'widefat';
$field2['description'] 			= __( 'Text Field Description', 'formidable-schedule-export' );
$field2['fieldtype'] 			= 'text';
$field2['id'] 					= 'text-field';
$field2['label'] 				= __( 'Text Field', 'formidable-schedule-export' );
$field2['name'] 				= 'text-field';
$field2['placeholder'] 			= __( '', 'formidable-schedule-export' );
$field2['type'] 				= 'text';
$field2['value'] 				= '';

$setatts['fields'] 				= array( $field1, $field2 );

$setatts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-' . $setatts['id'], $setatts );

$count 		= 1;
$repeater 	= array();

if ( ! empty( $this->meta[$setatts['id']] ) ) {

	$repeater = maybe_unserialize( $this->meta[$setatts['id']][0] );

}

if ( ! empty( $repeater ) ) {

	$count = count( $repeater );

}

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/repeater.php' );

?></p>
