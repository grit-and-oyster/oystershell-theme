<?php
/**
 *
 * The template to display the default loop. Also the loop that displays posts.
 *
 * This can be overridden in child themes with loop-template.php,
 * where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<div id="col-3" class="large-8 medium-8 columns">
	<div id="primary" class="content-area">
		<section id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php oystershell_content_nav( 'nav-above' ); ?>

				<header class="page-header">

					<?php oystershell_page_title(); ?>

				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-divider">
							<?php oystershell_post_divider(); ?>
						</div><!-- .post-divider -->
						<article class="post-entry">
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'formats/format', osc_get_post_format( get_the_ID() ) );
							?>
						</article><!-- .post-entry -->
					</div><!-- #post-<?php the_ID(); ?> -->
				<?php endwhile; ?>

				<?php oystershell_content_nav( 'nav-below' ); ?>

			<?php else: ?>

				<div id="post-0" class="post no-results not-found">

					<?php oystershell_no_results(); ?>

				</div><!-- #post-0 .post .no-results .not-found -->

			<?php endif; ?>

		</section><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div><!-- #col-3 -->
