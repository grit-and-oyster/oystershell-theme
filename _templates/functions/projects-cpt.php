<?php

//------------------------------------------------------------------------------------
function oystershell_simple_meta_projects() {
    global $post;
?>
	<p>
		<?php the_terms( $post->ID, 'go_project_status', '<span class="meta-tags-n-cats">This is a ', ' &amp; ', ' project. </span>' ); ?>
		<?php the_terms( $post->ID, 'go_project_types', '<span class="meta-tags-n-cats">The project type is: ', ' , ', '. </span>' ); ?>
		<?php oystershell_comments_meta( '<span class="sep"> | </span><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}

//------------------------------------------------------------------------------------
function oystershell_extended_meta_projects() {
    global $post;
?>
	<p>
		<?php oystershell_meta_pubdate( '<span class="meta-pubdate">Posted on ', '</span>'); ?>
		<?php oystershell_meta_byline( 'by <span class="byline">', '</span>' ); ?>
		<?php the_terms( $post->ID, 'go_project_status', '<span class="meta-tags-n-cats">This is a ', ' &amp; ', ' project. </span>' ); ?>
		<?php the_terms( $post->ID, 'go_project_types', '<span class="meta-tags-n-cats">The project type is: ', ' , ', '. </span>' ); ?>
		<?php oystershell_meta_permalink( '<span class="sep"> | </span><span class="meta-permalink">Permalink to &laquo;', '&raquo;</span>'); ?>
		<?php oystershell_comments_meta( '<span class="sep"> | </span><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}
