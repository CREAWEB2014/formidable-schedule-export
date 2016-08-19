<?php

/**
 * Provides the markup for any checkbox field
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/views/fields
 */
$defaults['class'] 			= 'widefat';
$defaults['description'] 	= __( '', 'formidable-schedule-export' );
$defaults['id'] 			= '';
$defaults['name'] 			= '';
$defaults['value'] 			= 0;
$atts 						= wp_parse_args( $atts, $defaults );

?><label for="<?php echo esc_attr( $atts['id'] ); ?>">
	<input <?php

		checked( 1, $atts['value'], true );

		?>class="<?php echo esc_attr( $atts['class'] ); ?>"
		id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
		type="checkbox"
		value="1" />
	<span class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></span>
</label>
