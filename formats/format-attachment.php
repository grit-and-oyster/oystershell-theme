<?php
/**
 * The template to display non-image attachments.
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
		<?php oystershell_other_attachment(); ?>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
