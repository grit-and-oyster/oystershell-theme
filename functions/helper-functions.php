<?php
/**
 * Helper functions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

//------------------------------------------------------------------------------------
/**
 * Alias for osc_get_post_format(). Returns the post format as a value.
 *
 * @since Oystershell 1.1
 */
function oystershell_get_post_format( $post_id ) {

	$result = osc_get_post_format( $post_id );
	return $result;
} // end oystershell_get_post_format

//------------------------------------------------------------------------------------
/**
 * Alias for osc_is_paginated_post(). Determines whether or not the current post is a paginated post.
 *
 * @since Oystershell 1.1
 */
function oystershell_is_paginated_post() {

	$result = osc_is_paginated_post();
 	return $result;
} // end oystershell_is_paginated_post

//------------------------------------------------------------------------------------
if(!function_exists('is_custom_post_type') ) :
/**
 * Alias for osc_is_custom_post_type(). Check if a post is a custom post type.
 * @param  mixed $post Post object or ID
 * @return boolean
 */
function is_custom_post_type( $post = NULL ) {

	$result = osc_is_custom_post_type();
    return $result;
}
endif;

//------------------------------------------------------------------------------------
if(!function_exists('get_post_top_ancestor_id') ) :
/**
 * Alias for osc_get_post_top_ancestor_id(). Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 *
 * @since Oystershell 1.1
 *
 * @uses object $post
 * @return int
 */
function get_post_top_ancestor_id(){

	$result = osc_get_post_top_ancestor_id();
	return $result;
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_categorized_blog' ) ) :
/**
 * Returns true if a blog has more than 1 category
 *
 * @since Oystershell 1.0
 */
function oystershell_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so oystershell_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so oystershell_categorized_blog should return false
		return false;
	}
}
endif;

if ( ! function_exists( 'oystershell_category_transient_flusher' ) ) :
/**
 * Flush out the transients used in oystershell_categorized_blog
 *
 * @since Oystershell 1.0
 */
function oystershell_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
endif;
add_action( 'edit_category', 'oystershell_category_transient_flusher' );
add_action( 'save_post', 'oystershell_category_transient_flusher' );

//------------------------------------------------------------------------------------
function oystershell_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

//------------------------------------------------------------------------------------
if ( ! function_exists( 'remove_more_jump_link' ) ) :
/**
 * Makes 'more' links jump to the top of page.
 *
 *  @since Oystershell 1.0
 */
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
endif;
add_filter('the_content_more_link', 'remove_more_jump_link');

//------------------------------------------------------------------------------------
if ( ! function_exists( 'empty_content' ) ) :
function empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}
endif;
