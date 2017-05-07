<?php
/**
 * The template used for displaying page content in loop-page.php
 *
 * @package Oyster Shell
 * @since Oyster Shell 1.0
 */
?>

<header class="row page-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<?php if (is_front_page()) : { ?>
			<h1 class="page-title front-page-title"><?php the_title(); ?></h1>
		<?php } else : { ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
		<?php } endif; ?>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .page-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
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
