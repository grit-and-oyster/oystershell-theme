<?php
/**
 * The template to display the default post format for single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="entry-header">
	<?php oystershell_featured_image(); ?>
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>
	<div class="entry-meta">
		<?php oystershell_header_meta(); ?>
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<div class="entry-content" itemprop="mainContentOfPage">
	<?php the_content(); ?>
	<?php if ( osc_is_paginated_post() ) { ?>
		<div class="page-links">
			<?php wp_link_pages(); ?>
		</div><!-- .page-links -->
	<?php } // end if ?>
</div><!-- .entry-content -->

<footer class="entry-footer">
	<div class="entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
