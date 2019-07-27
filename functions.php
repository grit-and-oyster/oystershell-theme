<?php
/**
 * Oystershell functions and definitions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

// Set up the theme
require_once(get_template_directory().'/functions/setup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Various helper functions
require( get_template_directory() . '/functions/helper-functions.php' );

// Functions for displaying template components
require( get_template_directory() . '/functions/template-functions.php' );

// Functions for formatting page elements
require( get_template_directory() . '/functions/format-functions.php' );

// Additional functions for SEO and compatibility
require( get_template_directory() . '/functions/compat-functions.php' );

// Custom functions unique to this theme
require( get_template_directory() . '/functions/theme-functions.php' );

//------------------------------------------------------------------------------------
/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Oystershell 1.1
 */
function oystershell_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'oystershell_javascript_detection', 0 );

/**
 * Oystershell Hooks
 */

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_seo_description' ) ):
/**
 * Function to set up action hook for description meta tag
 */
function oystershell_seo_description() {
    do_action('oystershell_seo_description');
}
endif; // oystershell_seo_description

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_page_top' ) ):
/**
 * Function to set up action hook for adding things at the top of the page
 */
function oystershell_page_top() {
    do_action('oystershell_page_top');
}
endif; // oystershell_page_top

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_masthead' ) ):
/**
 * Function to set up action hook for displaying the site masthead
 */
function oystershell_masthead() {
    do_action('oystershell_masthead');
}
endif; // oystershell_masthead

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_navmenu_primary' ) ):
/**
 * Function to set up action hook for displaying the primary navigation menu
 */
function oystershell_navmenu_primary() {
    do_action('oystershell_navmenu_primary');
}
endif; // oystershell_navmenu_primary

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_end_header' ) ):
/**
 * Function to set up action hook for adding things at the end of the header.php template
 */
function oystershell_end_header() {
    do_action('oystershell_end_header');
}
endif; // oystershell_end_header

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav' ) ):
/**
 * Function to handle the content navigation
 */
function oystershell_content_nav( $nav_id ) {

	if ( 'nav-above' == $nav_id ) {

		do_action('oystershell_nav_above');

	} elseif ( 'nav-below' == $nav_id ) {

		do_action('oystershell_nav_below');

	} elseif ( 'nav-attach' == $nav_id ) {

		do_action('oystershell_nav_attachment');

	} else {

		do_action('oystershell_nav_default');
	}
}
endif; // oystershell_content_nav

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_page_title' ) ):
/**
 * Function to set up action hook for hndling the page title
 */
function oystershell_page_title() {
    do_action('oystershell_page_title');
}
endif; // oystershell_page_title

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_author_profile' ) ):
/**
 * Function to set up action hook for adding an author profile (should be used within the loop)
 */
function oystershell_author_profile() {
    do_action( 'oystershell_author_profile' );
}
endif; // oystershell_author_profile

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_post_divider' ) ):
/**
 * Function to set up action hook for handling the divider between posts
 */
function oystershell_post_divider() {
    do_action( 'oystershell_post_divider' );
}
endif; // oystershell_post_divider

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_post_top' ) ):
/**
 * Function to set up action hook for adding things at the top of the single post
 */
function oystershell_post_top() {
    do_action('oystershell_post_top');
}
endif; // oystershell_post_top

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_featured_image' ) ):
/**
 * Function to set up action hook for adding featured image to post
 */
function oystershell_featured_image() {
    do_action( 'oystershell_featured_image' );
}
endif; // oystershell_no_results

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_post_bottom' ) ):
/**
 * Function to set up action hook for adding things at the bottom of the single post
 */
function oystershell_post_bottom() {
    do_action('oystershell_post_bottom');
}
endif; // oystershell_post_bottom

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_comments' ) ):
/**
 * Function to set up action hook for adding comment functionality
 */
function oystershell_comments() {
    do_action( 'oystershell_comments' );
}
endif; // oystershell_comments

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_comments_nav' ) ):
/**
 * Function to handle the content navigation
 */
function oystershell_comments_nav( $nav_id ) {

	if ( 'nav-above' == $nav_id ) {

		do_action('oystershell_comments_nav_above');

	} elseif ( 'nav-below' == $nav_id ) {

		do_action('oystershell_comments_nav_below');

	} else {

		do_action('oystershell_comments_nav_default');
	}
}
endif; // oystershell_comments_nav

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_no_results' ) ):
/**
 * Function to set up action hook for adding 'no results' message
 */
function oystershell_no_results() {
    do_action( 'oystershell_no_results' );
}
endif; // oystershell_no_results

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_404' ) ):
/**
 * Function to set up action hook for 404 message
 */
function oystershell_404() {
    do_action( 'oystershell_404' );
}
endif; // oystershell_404

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_header_meta' ) ):
/**
 * Function to set up action hook for adding meta data to the header of a post
 */
function oystershell_header_meta() {
    do_action( 'oystershell_header_meta' );
}
endif; // oystershell_header_meta

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_image_attachment' ) ):
/**
 * Function to set up action hook for displaying image attachments
 */
function oystershell_image_attachment() {
    do_action( 'oystershell_image_attachment' );
}
endif; // oystershell_image_attachment

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_other_attachment' ) ):
/**
 * Function to set up action hook for displaying non-image attachments
 */
function oystershell_other_attachment() {
    do_action( 'oystershell_other_attachment' );
}
endif; // oystershell_other_attachment

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_footer_meta' ) ):
/**
 * Function to set up action hook for adding meta data to the footer of a post
 */
function oystershell_footer_meta() {
    do_action( 'oystershell_footer_meta' );
}
endif; // oystershell_footer_meta

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_before_sidebar' ) ):
/**
 * Function to set up action hook for adding things at the top of the sidebar
 */
function oystershell_before_sidebar() {
    do_action( 'before_sidebar' );
}
endif; // oystershell_before_sidebar

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_after_sidebar' ) ):
/**
 * Function to set up action hook for adding things at the bottom of the sidebar
 */
function oystershell_after_sidebar() {
    do_action( 'after_sidebar' );
}
endif; // oystershell_after_sidebar

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_navmenu_postscript' ) ):
/**
 * Function to set up action hook for displaying the postscript navigation menu
 */
function oystershell_navmenu_postscript() {
    do_action('oystershell_navmenu_postscript');
}
endif; // oystershell_navmenu_postscript

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_postscript' ) ):
/**
 * Function to set up action hook for adding things into the postscript text area
 */
function oystershell_postscript() {
    do_action( 'oystershell_postscript' );
}
endif; // oystershell_postscript

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_page_bottom' ) ):
/**
 * Function to set up action hook for adding things at the bottom of the page
 */
function oystershell_page_bottom() {
    do_action('oystershell_page_bottom');
}
endif; // oystershell_page_bottom

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_colophon' ) ):
/**
 * Function to set up action hook for adding things into the colophon area
 */
function oystershell_colophon() {
    do_action( 'oystershell_colophon' );
}
endif; // oystershell_colophon
