<?php
//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_comments' ) ):
/**
 * Display comments and comment form
 *
 * @since Oystershell 1.0
 */
function oystershell_display_comments() {
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
	/*
	 * Don't display comments on pages and attachments
	 */
	if ( is_page() )
		return;
	if ( is_attachment() )
		return;
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() )
		comments_template( '', true );
}
endif; // oystershell_display_comments
add_action( 'oystershell_comments', 'oystershell_display_comments' );

//------------------------------------------------------------------------------------
// Comment Layout
function oystershell_display_comment_item($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<div class="row media-object">
			<div class="small-2 columns media-object-section">
			    <?php echo get_avatar( $comment, 75 ); ?>
			  </div>
			<div class="small-10 columns media-object-section">
				<article id="comment-<?php comment_ID(); ?>">
					<header class="comment-author">
						<?php
							// create variable
							$bgauthemail = get_comment_author_email();
						?>
						<?php printf(__('%s', 'oystershell'), get_comment_author_link()) ?> on
						<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'oystershell')); ?> </a></time>
						<?php edit_comment_link(__('(Edit)', 'oystershell'),'  ','') ?>
					</header>
					<?php if ($comment->comment_approved == '0') : ?>
						<div class="alert alert-info">
							<p><?php _e('Your comment is awaiting moderation.', 'oystershell') ?></p>
						</div>
					<?php endif; ?>
					<section class="comment_content clearfix">
						<?php comment_text() ?>
					</section>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</article>
			</div>
		</div>
	<!-- </li> is added by WordPress automatically -->
<?php
}

//------------------------------------------------------------------------------------
// Control the functions called to handle comment nav

add_action( 'oystershell_comments_nav_above', 'oystershell_display_comments_nav' );

add_action( 'oystershell_comments_nav_below', 'oystershell_display_comments_nav' );

//add_action( 'oystershell_comments_nav_default', 'oystershell_display_comments_nav' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_comments_nav' ) ):
/**
 * Display navigation to next/previous comment pages when applicable
 *
 * @since Oystershell 1.1
 */
function oystershell_display_comments_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through?
		oystershell_content_nav_links_comments();
	}
}
endif; // oystershell_display_comments_nav
