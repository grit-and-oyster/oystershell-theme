<?php
/**
 * Oystershell functions and definitions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

/**
 * Load the Oystershell Core library
 * Essential classes and helper functions for the Oystershell framework.
 *
 * @since Oystershell 1.1
 */
add_action( 'init', 'osc_load_library_oystershell', 0 );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Oyster Shell 1.0
 */
function oystershell_setup() {

	require( get_template_directory() . '/inc/helper-functions.php' );
	require( get_template_directory() . '/inc/template-functions.php' );
	require( get_template_directory() . '/inc/format-functions.php' );
	require( get_template_directory() . '/inc/compat-functions.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Oyster Shell, use a find and replace
	 * to change 'oystershell' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oystershell', get_template_directory() . '/languages' );

	/**
	 * Add theme support for document Title tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oystershell' ),
		'postscript' => __( 'Postscript Menu', 'oystershell' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // oystershell_setup
add_action( 'after_setup_theme', 'oystershell_setup' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_widgets_init' ) ):
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Oyster Shell 1.0
 */
function oystershell_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'oystershell' ),
		'id' => 'sidebar',
		'description' => __( 'A short description of the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
endif; // oystershell_widgets_init
add_action( 'widgets_init', 'oystershell_widgets_init' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_fonts_url' ) ) :
/**
 * Register Google fonts for Oystershell.
 *
 * Create your own oystershell_fonts_url() function to override in a child theme.
 *
 * @since Oystershell 1.1
 *
 * @return string Google fonts URL for the theme.
 */
function oystershell_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Asap, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Asap font: on or off', 'oystershell' ) ) {
		$fonts[] = 'Asap:400,700,400italic,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

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

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_scripts' ) ):
/**
 * Enqueue scripts and styles
 */
function oystershell_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'oystershell-fonts', oystershell_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	// REQUIRES UPDATE
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/inc/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'oystershell-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'oystershell-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'oystershell-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'oystershell-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; // oystershell_scripts
add_action( 'wp_enqueue_scripts', 'oystershell_scripts' );

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
