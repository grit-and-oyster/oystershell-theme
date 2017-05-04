<?php
/**
 * Compatibility functions
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

//------------------------------------------------------------------------------------
/* Schema */
//------------------------------------------------------------------------------------
/**
 * Adds Schema.org schema type tag to <html>
 *
 * http://www.paulund.co.uk/add-schema-org-wordpress
 *
 */
function add_html_tag_schema( $output ) {

	$schema = 'http://schema.org/';

    // Is single post
    if(is_single())
    {
        $type = "Article";
    }
    // Contact form page ID
    /* else if( is_page(1) )
    {
        $type = 'ContactPage';
    } */
    // Is author page
    elseif( is_author() )
    {
        $type = 'ProfilePage';
    }
    // Is search results page
    elseif( is_search() )
    {
        $type = 'SearchResultsPage';
    }
    // Is of movie post type
    elseif(is_singular('movies'))
    {
        $type = 'Movie';
    }
    // Is of book post type
    elseif(is_singular('books'))
    {
        $type = 'Book';
    }
    else
    {
        $type = 'WebPage';
    }

    $output = $output . ' itemscope="itemscope" itemtype="' . $schema . $type . '"';

    return $output;

}
add_filter( 'language_attributes', 'add_html_tag_schema' );

//------------------------------------------------------------------------------------
/* SEO compatibility */
//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_descriptions' ) ):
/**
 * Use the excerpt where set as the meta description
 */
function oystershell_meta_descriptions() {

	$desc = null;
	if ( is_single() ) {
		$desc = get_the_excerpt();
	}
	elseif ( is_page() ) {
		$desc = get_the_excerpt();
	}
	elseif ( is_category() ) {
		$desc = category_description();
	}
	elseif ( is_home() ) {
		$desc = get_bloginfo('description');
	}
	$desc = trim(strip_tags($desc));
	if (!empty($desc)) {
		echo '<meta name="description" content="';
		echo $desc;
		echo '"/>';
	}
}
endif; // oystershell_meta_descriptions
add_action( 'oystershell_seo_description', 'oystershell_meta_descriptions' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_hide_duplicate_content' ) ):
/**
 * Hide duplicate content from search engines
 */
function oystershell_hide_duplicate_content() {

	$robot_tag;
	if ( is_author() ) {
		$robot_tag = 'noindex, follow';
	}
	elseif ( is_category() ) {
		//$robot_tag = 'noindex, follow';
	}
	elseif ( is_tag() ) {
		$robot_tag = 'noindex, follow';
	}
	elseif ( is_date() ) {
		$robot_tag = 'noindex, follow';
	}
	elseif ( is_search() ) {
		$robot_tag = 'noindex, follow';
	}
	elseif ( is_attachment() ) {
		$robot_tag = 'noindex, follow';
	}
	elseif ( is_paged() ) {
		$robot_tag = 'noindex, follow';
	}

	if (!empty($robot_tag)) {
		echo '<meta name="robots" content="';
		echo $robot_tag;
		echo '"/>';
	}
}
endif; // oystershell_hide_duplicate_content
add_action( 'oystershell_seo_description', 'oystershell_hide_duplicate_content' );

//------------------------------------------------------------------------------------
/**
 * Add rel="next" and rel="previous" to navigation links on paged archives
 */
if (!function_exists('get_next_posts_link_attributes')){
	function get_next_posts_link_attributes($attr){
		$attr = 'rel="next"';
		return $attr;
	}
}
if (!function_exists('get_previous_posts_link_attributes')){
	function get_previous_posts_link_attributes($attr){
		$attr = 'rel="prev"';
		return $attr;
	}
}
add_filter('next_posts_link_attributes', 'get_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'get_previous_posts_link_attributes');

//------------------------------------------------------------------------------------
/* Jetpack compatibility */
//------------------------------------------------------------------------------------
if ( ! function_exists( 'jptweak_remove_share' ) ):
/**
 * Tweak to control position of Jetpack sharing and likes
 *
 * @since Oyster Shell 1.0
 */
function jptweak_remove_share() {
    if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display',19 );
    if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display',19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
    	remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
endif; // jptweak_remove_share
add_action( 'loop_start', 'jptweak_remove_share' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'jptweak_display_share' ) ):
/**
 * Tweak to control position of Jetpack sharing and likes
 *
 * @since Oyster Shell 1.0
 */
function jptweak_display_share() {

	if ( function_exists( 'sharing_display' ) ) {
	    sharing_display( '', true );
	}

	if ( class_exists( 'Jetpack_Likes' ) ) {
	    $custom_likes = new Jetpack_Likes;
	    echo $custom_likes->post_likes( '' );
	}
}
endif; // jptweak_display_share

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_display' ) ):
/**
 * Display breadcrumb navigation
 *
 * @since Oyster Shell 1.0
 */
function oystershell_breadcrumb_nav( $nav_id ) {

	if ( function_exists('yoast_breadcrumb') ) {
		if ( ! is_front_page() ) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">','</div>');
		}
	} else {

	}
}
endif; // oystershell_breadcrumb_nav
