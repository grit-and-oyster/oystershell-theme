<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?>
			<div id="col-5" class="large-12 columns">
				<div id="postscript" class="postscript clearfix" role="complementary">
					<nav id="postscript-navigation" class="site-navigation postscript-navigation clearfix" role="navigation">
						<h1 class="assistive-text"><?php _e( 'Postscript navigation', 'oystershell' ); ?></h1>
						<?php oystershell_navmenu_postscript() ?>
					</nav><!-- #postscript-navigation .site-navigation .postscript-navigation -->

					<?php oystershell_postscript(); ?>

				</div><!-- #postscript .postscript -->
			</div><!-- #col-5 -->

			<?php oystershell_page_bottom(); ?>

		</div><!-- #canvas -->
	</div><!-- #wrap -->
</div><!-- #page .hfeed .site -->

<section id="colophon" class="row site-footer background-colophon" role="contentinfo">
	<h1 class="assistive-text"><?php _e( 'Colophon', 'oystershell' ); ?></h1>
	<div class="site-info">
		<?php oystershell_colophon(); ?>
	</div><!-- .site-info -->
</section><!-- #colophon .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
