<?php
/**
 * The template to display the quote post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<h1 class="entry-title assistive-text"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content">
	<div class="small-12 columns">
		<blockquote>
			<?php the_content(); ;
			oystershell_format_quote_source(); ?>
		</blockquote>
	</div>
</div><!-- .entry-content -->

<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
