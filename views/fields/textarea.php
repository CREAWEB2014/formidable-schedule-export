<?php

/**
 * Provides the markup for any textarea field
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/views/fields
 */
$defaults['class'] 			= 'large-text';
$defaults['cols'] 			= 50;
$defaults['description'] 	= __( '', 'formidable-schedule-export' );
$defaults['id'] 			= '';
$defaults['label'] 			= __( '', 'formidable-schedule-export' );
$defaults['name'] 			= '';
$defaults['rows'] 			= 10;
$defaults['value'] 			= '';
$atts 						= wp_parse_args( $atts, $defaults );

?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php echo wp_kses( $atts['label'], array( 'code' => array() ) ); ?>: </label>
<textarea
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	cols="<?php echo esc_attr( $atts['cols'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	rows="<?php echo esc_attr( $atts['rows'] ); ?>"><?php

	echo esc_textarea( $atts['value'] );

?></textarea>
<span class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></span>
