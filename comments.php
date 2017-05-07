<div id="comments" class="comments-area">

	<?php // You can start editing here ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'oystershell' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php oystershell_comments_nav( 'nav-above' ); ?>

		<ol class="commentlist">
			<?php wp_list_comments('type=all&callback=oystershell_display_comment_item'); ?>
		</ol>

		<?php oystershell_comments_nav( 'nav-below' ); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'oystershell' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array('class_submit'=>'button')); ?>

</div><!-- #comments -->
