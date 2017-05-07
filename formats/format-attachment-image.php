<?php
/**
 * The template to display image attachments.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
<header class="row entry-header">
	<div class="small-12 columns">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
		<div class="entry-attachment">
			<div class="attachment">
				<?php oystershell_image_attachment(); ?>
			</div><!-- .attachment -->

			<?php if ( ! empty( $post->post_excerpt ) ) : ?>
			<div class="entry-caption">
				<?php the_excerpt(); ?>
			</div><!-- .entry-caption -->
			<?php endif; ?>
		</div><!-- .entry-attachment -->
		<?php the_content(); ?>
		<?php if ( oystershell_is_paginated_post() ) { ?>
			<div class="page-links">
				<?php wp_link_pages(); ?>
			</div><!-- .page-links -->
		<?php } // end if ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
