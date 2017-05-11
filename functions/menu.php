<?php
	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oystershell' ),
		'postscript' => __( 'Postscript Menu', 'oystershell' ),
	) );

	/**
	 * Associate menus with hooks
	 */
	add_action( 'oystershell_navmenu_primary', 'oystershell_display_navmenu_primary' );
	add_action( 'oystershell_navmenu_postscript', 'oystershell_display_navmenu_postscript' );

	//------------------------------------------------------------------------------------
	if ( ! function_exists( 'oystershell_display_navmenu_primary' ) ):
	/**
	 * Insert the primary navigation menu
	 *
	 * @since Oystershell 1.1
	 */
	function oystershell_display_navmenu_primary() {

		wp_nav_menu( array(
			'theme_location'  => 'primary',
			'container_class' => 'navigation-menu main-navigation-menu',
			'menu_class'      => 'dropdown menu navigation-menu-list main-navigation-menu-list',
			'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
			'depth' => 3,
			'fallback_cb'     => false
		) );
	}
	endif; // oystershell_display_navmenu_primary

	//------------------------------------------------------------------------------------
	if ( ! function_exists( 'oystershell_display_navmenu_postscript' ) ):
	/**
	 * Insert the postscript navigation menu
	 *
	 * @since Oystershell 1.0
	 */
	function oystershell_display_navmenu_postscript() {

		wp_nav_menu( array(
			'theme_location' => 'postscript',
			'container_class' => 'navigation-menu postscript-navigation-menu',
			'menu_class' => 'menu navigation-menu-list postscript-navigation-menu-list',
			'depth' => 1,
			'fallback_cb' => false,

		) );
	}
	endif; // oystershell_display_navmenu_postscript

//------------------------------------------------------------------------------------
// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
