<?php
/**
 * The template to display the video post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="entry-header">
	<?php oystershell_featured_image(); ?>
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>
	<div class="entry-meta">
		<?php oystershell_header_meta(); ?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="entry-content" itemprop="mainContentOfPage">
	<?php 
		$video_url = get_post_meta($post->ID, '_format_video_embed', true);
		echo wp_oembed_get( $video_url, array('width'=>550)); 
	?>
	<?php the_content(); ?>
</div><!-- .entry-content -->

<footer class="entry-footer">
	<div class="entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->