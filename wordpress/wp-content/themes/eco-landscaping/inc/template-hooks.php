<?php
/**
 * Custom template hooks for this theme.
 *
 * @package Eco Landscaping
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'eco_landscaping_before_title' ) ) :
function eco_landscaping_before_title() {
	do_action('eco_landscaping_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'eco_landscaping_before_title_content' ) ) :
	function eco_landscaping_before_title_content() {
		do_action('eco_landscaping_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'eco_landscaping_after_title_content' ) ) :
	function eco_landscaping_after_title_content() {
		do_action('eco_landscaping_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'eco_landscaping_after_title' ) ) :
function eco_landscaping_after_title() {
	do_action('eco_landscaping_after_title');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'eco_landscaping_single_post_after_content' ) ) :
	function eco_landscaping_single_post_after_content($postID) {
		do_action('eco_landscaping_single_post_after_content',$postID);
	}
endif;