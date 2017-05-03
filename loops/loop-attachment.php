<?php
/**
 * The loop that displays single attachments.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<div id="col-3" class="large-8 medium-8 columns">
	<div id="primary" class="content-area">
		<section id="content" class="site-content" role="main">
			<h1 class="assistive-text"><?php _e( 'Attachment', 'oystershell' ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<article class="post-entry">
						<?php
							if ( wp_attachment_is_image() ) {
								get_template_part( 'formats/format-attachment', 'image' );
							} else {
								get_template_part( 'formats/format', 'attachment' );
							}
						?>
					</article><!-- .post-entry -->
				</div><!-- #post-<?php the_ID(); ?> -->

				<?php oystershell_content_nav( 'nav-attach' ); ?>

				<?php oystershell_comments(); ?>

			<?php endwhile; // end of the loop. ?>

		</section><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div><!-- #col-3 -->
