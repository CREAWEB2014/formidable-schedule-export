<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/classes/views
 */

?><h3><?php echo esc_html( 'Schedule Export', 'formidable-schedule-export' ); ?></h3><?php

settings_fields( FORMIDABLE_SCHEDULE_EXPORT_SLUG . '-formidable-options' );

do_settings_sections( FORMIDABLE_SCHEDULE_EXPORT_SLUG );
