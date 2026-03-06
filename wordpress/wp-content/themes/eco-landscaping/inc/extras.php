<?php
/**
 * 
 * @package Eco Landscaping
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $eco_landscaping_classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'eco_landscaping_body_classes' ) ) :
function eco_landscaping_body_classes( $eco_landscaping_classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$eco_landscaping_classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$eco_landscaping_classes[] = 'hfeed';
	}

	return $eco_landscaping_classes;
}
endif;
add_filter( 'body_class', 'eco_landscaping_body_classes' );