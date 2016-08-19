<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://slushman.com
 * @since      1.0.0
 *
 * @package    Formidable_Schedule_Export
 * @subpackage Formidable_Schedule_Export/classes/loop-views
 */

/**
 * formidable-schedule-export-before-loop hook
 *
 * @hooked 		loop_wrap_start 		15
 */
do_action( 'formidable-schedule-export-before-loop', $args );

foreach ( $items as $item ) {

	$meta = get_post_custom( $item->ID );

	/**
	 * formidable-schedule-export-before-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		loop_content_wrap_begin 		10
	 * @hooked 		loop_content_link_begin 		15
	 */
	do_action( 'formidable-schedule-export-before-loop-content', $item, $meta );

		/**
		 * lazy-load-videos-loop-content hook
		 *
		 * @param 		object  	$item 		The post object
		 *
		 * @hooked		loop_content_image 			10
		 * @hooked		loop_content_title 			15
		 * @hooked		loop_content_subtitle 		20
		 */
		do_action( 'formidable-schedule-export-loop-content', $item, $meta );

	/**
	 * formidable-schedule-export-after-loop-content hook
	 *
	 * @param 		object  	$item 		The post object
	 *
	 * @hooked 		loop_content_link_end 		10
	 * @hooked 		loop_content_wrap_end 		90
	 */
	do_action( 'formidable-schedule-export-after-loop-content', $item, $meta );

	unset( $meta );

} // foreach

/**
 * formidable-schedule-export-after-loop hook
 *
 * @hooked 		loop_wrap_end 			10
 */
do_action( 'formidable-schedule-export-after-loop', $args );
