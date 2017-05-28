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
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
	<div class="entry-meta">
		<?php oystershell_header_meta(); ?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
<?php else : ?>
	<div class="entry-content">
		<?php 
			$video_url = get_post_meta($post->ID, '_format_video_embed', true);
			echo wp_oembed_get( $video_url, array('width'=>600)); 
		?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oystershell' ) ); ?>
	</div><!-- .entry-content -->
<?php endif; ?>

<footer class="entry-footer">
	<div class="entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->