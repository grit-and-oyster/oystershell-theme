<?php

add_action( 'widgets_init', 'oystershell_widgets_init' );

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
