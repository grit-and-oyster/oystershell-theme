<?php
/**
 * The template to display the default post format for single posts.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<h1 class="page-title">
			<?php the_title(); ?>
		</h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
		<?php the_content(); ?>
		<?php if ( osc_is_paginated_post() ) { ?>
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
