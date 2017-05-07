<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="entry-header">
	<?php oystershell_featured_image(); ?>
	<h1 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Link to %s', 'oystershell' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
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
		<?php the_content(); ?>
		<?php if ( osc_is_paginated_post() ) { ?>
			<div class="page-links">
				<?php wp_link_pages(); ?>
			</div><!-- .page-links -->
		<?php } // end if ?>
	</div><!-- .entry-content -->
<?php endif; ?>

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
