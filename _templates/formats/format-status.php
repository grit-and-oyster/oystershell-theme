<?php
/**
 * The template to display the status post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="entry-header">
	<?php oystershell_featured_image(); ?>
	<h1 class="entry-title assistive-text"><?php the_title(); ?></h1>
	<div class="entry-meta">
		<?php oystershell_header_meta(); ?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="entry-content">
		<?php the_content( ); ?>
</div><!-- .entry-content -->

<footer class="entry-footer">
	<div class="entry-meta">
		<?php oystershell_meta_byline( 'Status of <span class="byline">', '</span>' ); ?> 
		<?php oystershell_meta_pubdate( '<span class="meta-pubdate">on ', '</span>'); ?>
		<?php oystershell_comments_meta( '<span class="sep"> | </span><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->