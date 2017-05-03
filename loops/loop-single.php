<?php
/**
 * The loop that displays single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<div id="col-3" class="large-8 medium-8 columns">
	<div id="primary" class="content-area">
		<section id="content" class="site-content" role="main">
			<h1 class="assistive-text"><?php _e( 'Post content', 'oystershell' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php oystershell_content_nav( 'nav-above' ); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php oystershell_post_top(); ?>

					<article class="post-entry">
						<?php
							/* Include the Post-Format-specific template for the content *as a single post*.
							 * If you want to overload this in a child theme then include a file
							 * called format-single-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'formats/format-single', osc_get_post_format( get_the_ID() ) );
						?>
					</article><!-- .post-entry -->

					<?php oystershell_post_bottom(); ?>

				</div><!-- #post-<?php the_ID(); ?> -->

				<?php oystershell_content_nav( 'nav-below' ); ?>

				<?php oystershell_comments(); ?>

			<?php endwhile; // end of the loop. ?>

		</section><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div><!-- #col-3 -->
