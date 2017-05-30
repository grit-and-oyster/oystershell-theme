<?php
/**
 * The template to display the video post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
		<?php
			$video_url = get_post_meta($post->ID, '_format_video_embed', true);
			echo wp_oembed_get( $video_url, array('width'=>550));
		?>
		<?php the_content(); ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
