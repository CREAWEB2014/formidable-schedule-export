<?php

/**
 * Provides the markup for any text field
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/views/fields
 */
$defaults['class'] 			= 'widefat';
$defaults['context'] 		= 'settings';
$defaults['description'] 	= __( '', 'formidable-schedule-export' );
$defaults['id'] 			= '';
$defaults['label'] 			= __( '', 'formidable-schedule-export' );
$defaults['name'] 			= '';
$defaults['placeholder'] 	= __( '', 'formidable-schedule-export' );
$defaults['type'] 			= 'text';
$defaults['value'] 			= '';
$atts 						= wp_parse_args( $atts, $defaults );

if ( 'settings' !== $atts['context'] ) :

	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php echo wp_kses( $atts['label'], array( 'code' => array() ) ); ?>: </label><?php

endif;

?><input
	class="<?php echo esc_attr( $atts['class'] ); ?>"<?php

	if ( ! empty( $atts['data'] ) ) {

		foreach ( $atts['data'] as $key => $value ) {

			?>data-<?php echo $key; ?>="<?php echo esc_attr( $value ); ?>"<?php

		}

	}

	?> id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>"
	placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
	type="<?php echo esc_attr( $atts['type'] ); ?>"
	value="<?php echo esc_attr( $atts['value'] ); ?>" />
<p class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></p>
