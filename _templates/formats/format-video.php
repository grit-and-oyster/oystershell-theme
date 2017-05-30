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
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="row entry-summary">
		<div class="small-12 columns">
			<?php the_excerpt(); ?>
		</div>
	</div><!-- .entry-summary -->
<?php else : ?>
	<div class="row entry-content">
		<div class="small-12 columns">
			<?php
				$video_url = get_post_meta($post->ID, '_format_video_embed', true);
				echo wp_oembed_get( $video_url, array('width'=>600));
			?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oystershell' ) ); ?>
		</div>
	</div><!-- .entry-content -->
<?php endif; ?>

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
