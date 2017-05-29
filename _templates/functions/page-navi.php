<?php

//------------------------------------------------------------------------------------
/**
 * Displays a simple page navigation
 *
 */
function oystershell_section_nav() {

	if ( ! is_front_page( ) ) {
		if (is_page( )) {
			echo "<section id='go_page_nav' class='widget widget_page_menu'><h1 class='widget-title'>In this section</h1>";
			echo "<ul class='menu'>";
			wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) );
			wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) );
			echo "</ul></section>";
		}
	}
}

add_action( 'before_sidebar', 'oystershell_section_nav' );
