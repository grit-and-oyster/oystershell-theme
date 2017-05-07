<?php
//------------------------------------------------------------------------------------
// Control the functions called to handle content nav

add_action( 'oystershell_nav_above', 'oystershell_display_nav' );

add_action( 'oystershell_nav_below', 'oystershell_display_nav' );

add_action( 'oystershell_nav_attachment', 'oystershell_display_nav' );

add_action( 'oystershell_nav_default', 'oystershell_display_nav' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Oystershell 1.1
 */
function oystershell_display_nav() {
	global $wp_query;

	if ( is_page() ) {
		return;
	} elseif ( is_attachment() ) {
		oystershell_content_nav_links_attachment();
	}	elseif ( is_single() ) {
		oystershell_content_nav_links_post();
 	} elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) { // navigation links for home, archive, and search pages
		oystershell_content_nav_links_paging();
		// oystershell_content_nav_links_numeric();
	} else {
		return;
	}
}
endif; // oystershell_display_nav
