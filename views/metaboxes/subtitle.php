<?php

/**
 * Displays a metabox
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/classes/views
 */

wp_nonce_field( FORMIDABLE_SCHEDULE_EXPORT_SLUG, 'nonce_formidable_schedule_export_subtitle' );

$atts['id'] 			= 'subtitle';
$atts['label'] 			= __( 'Subtitle', 'formidable-schedule-export' );
$atts['name'] 			= 'subtitle';
$atts['placeholder'] 	= __( 'Enter the subtitle', 'formidable-schedule-export' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-field-subtitle', $atts );

?><p><?php

include( plugin_dir_path( dirname( __FILE__ ) ) . 'fields/text.php' );
unset( $atts );

?></p>
