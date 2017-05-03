<?php
/**
 * The loop that displays pages.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<div id="col-3">
	<div id="primary" class="content-area">
		<section id="content" class="site-content" role="main">
			<h1 class="assistive-text"><?php _e( 'Page content', 'oystershell' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php oystershell_content_nav( 'nav-above' ); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<article class="post-entry">

						<?php get_template_part( 'formats/format', 'page' ); ?>

					</article><!-- .post-entry -->
				</div><!-- #post-<?php the_ID(); ?> -->

				<?php oystershell_content_nav( 'nav-below' ); ?>

				<?php oystershell_comments(); ?>

			<?php endwhile; // end of the loop. ?>

		</section><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div><!-- #col-3 -->
