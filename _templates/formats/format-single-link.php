<?php
/**
 * The template to display the default post format.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<header class="row entry-header">
	<div class="small-12 columns">
		<?php oystershell_featured_image(); ?>
		<h1 class="page-title assistive-text"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php oystershell_header_meta(); ?>
		</div><!-- .entry-meta -->
	</div>
</header><!-- .entry-header -->

<div class="row entry-content" itemprop="mainContentOfPage">
	<div class="small-12 columns">
		<p class="link-format-link"><a href="<?php echo osc_post_format_link_get_url($post->ID); ?>" target="_blank" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a><span class="fa fa-lg fa-external-link"></span></p>
		<?php the_content(); ?>
	</div>
</div><!-- .entry-content -->


<footer class="row entry-footer">
	<div class="small-12 columns entry-meta">
		<?php oystershell_footer_meta(); ?>
	</div><!-- .entry-meta -->
</footer><!-- .entry-footer -->
