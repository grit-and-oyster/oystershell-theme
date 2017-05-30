<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<h1 class="entry-title assistive-text"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content">
	<div class="small-12 columns">
		<p class="link-format-link"><a href="<?php echo get_post_meta($post->ID, '_format_link_url', true); ?>" target="_blank" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a><span class="genericon genericon-external"></span></p>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oystershell' ) ); ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
