<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>

<div id="col-4">
	<section id="secondary" class="widget-area" role="complementary">
		<?php oystershell_before_sidebar(); ?>
		<h1 class="assistive-text"><?php _e( 'Sidebar', 'oystershell' ); ?></h1>

		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
		<?php endif; // end sidebar widget area ?>

		<?php oystershell_after_sidebar(); ?>
	</section><!-- #secondary .widget-area -->
</div><!-- #col-4 -->
