<?php
/**
 * The loop that displays archives.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<div id="col-3">
	<div id="primary" class="content-area">
		<section id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php oystershell_content_nav( 'nav-above' ); ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) {
								printf( __( '%s', 'oystershell' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag: %s', 'oystershell' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author: %s', 'oystershell' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'oystershell' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'oystershell' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'oystershell' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} elseif ( is_tax() ) {
								printf( __( '%s', 'oystershell' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_post_type_archive() ) {
							    ?><span><?php post_type_archive_title(); ?></span><?php

							} else {
								_e( 'Archives', 'oystershell' );
							}
						?>
					</h1>

					<?php
						if ( is_category() ) {
							// show an optional category description
							$description = category_description();
							if ( ! empty( $description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $description . '</div>' );
						} elseif ( is_tag() ) {
							// show an optional tag description
							$description = tag_description();
							if ( ! empty( $description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $description . '</div>' );
						} elseif ( is_tax() ) {
							// show an optional taxonomy description
							$description = term_description();
							if ( ! empty( $description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $description . '</div>' );
						} elseif ( is_author() ) {
							// show the author profile
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							oystershell_author_profile();

							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						}
					?>
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
								 * called format-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'formats/format', oystershell_get_post_format( get_the_ID() ) );
							?>
						</article><!-- .post-entry -->
					</div><!-- #post-<?php the_ID(); ?> -->
				<?php endwhile; ?>

				<?php oystershell_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<div id="post-0" class="post no-results not-found">

					<?php oystershell_no_results(); ?>

				</div><!-- #post-0 .post .no-results .not-found -->

			<?php endif; ?>

		</section><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div><!-- #col-3 -->
