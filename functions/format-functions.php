<?php
/**
 * Functions used within format template files.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_links_post' ) ) :
/**
 * Prints HTML with the navigation links for a single post.
 *
 * @since Oystershell 1.0
 */
function oystershell_content_nav_links_post() { ?>

	<nav role="navigation" class="site-navigation post-navigation">
		<h1 class="assistive-text"><?php _e( 'Content navigation', 'oystershell' ); ?></h1>
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'oystershell' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'oystershell' ) . '</span>' ); ?>
	</nav>

<?php }
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_links_paging' ) ) :
/**
 * Prints HTML with the navigation links for post listing pages.
 *
 * @since Oystershell 1.0
 */
function oystershell_content_nav_links_paging() { ?>

	<nav role="navigation" class="site-navigation paging-navigation">
		<h1 class="assistive-text"><?php _e( 'Content navigation', 'oystershell' ); ?></h1>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'oystershell' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'oystershell' ) ); ?></div>
		<?php endif; ?>
	</nav>

<?php }
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_links_attachment' ) ):
/**
 * Display navigation to next/previous attachments when applicable
 *
 * @since Oystershell 1.1
 */
function oystershell_content_nav_links_attachment() { ?>

	<nav role="navigation" class="site-navigation post-navigation attachment-navigation">
		<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous', 'oystershell' ) ); ?></span>
		<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;', 'oystershell' ) ); ?></span>
	</nav><!-- #image-navigation -->
<?php }
endif; // oystershellcontent_nav_links_attachment

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_links_numeric' ) ):
// Numeric Page Navi (built into the theme by default)
function oystershell_content_nav_links_numeric($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo '<nav role="navigation" class="site-navigation paging-navigation"><h1 class="assistive-text">' .  __( 'Content navigation', 'oystershell' ) . '</h1>';
	echo $before.'<ul class="pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( 'First', 'oystershell' );
		echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li>';
	previous_posts_link( __('Previous', 'oystershell') );
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"> '.$i.' </li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li>';
	next_posts_link( __('Next', 'oystershell'), 0 );
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( 'Last', 'oystershell' );
		echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
} /* End page navi */
endif; // oystershell_content_nav_links_numeric

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_content_nav_links_comments' ) ):
	function oystershell_content_nav_links_comments() { ?>
		<nav role="navigation" id="comment-nav" class="site-navigation comment-navigation">
			<h2 class="assistive-text"><?php _e( 'Comment navigation', 'oystershell' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older comments', 'oystershell' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer comments <span class="meta-nav">&rarr;</span>', 'oystershell' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
	<?php }
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_author_profile_links' ) ) :
/**
 *  Prints HTML with user links for author profiles.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_author_profile_links() {

		echo '<ul>';
		echo '<li><a href="' . get_author_feed_link(get_the_author_meta('ID')) . '">RSS Feed</a></li>';

		$website_url = get_the_author_meta( 'user_url' );
		if ( $website_url && $website_url != '' ) {
			echo '<li><a href="' . esc_url($website_url) . '">Website</a></li>';
		}
		echo '</ul>';
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_thumbnail_caption' ) ) :
/**
 * Prints HTML with the caption for an image.
 *
 * @since Oystershell 1.0
 */
function oystershell_thumbnail_caption( $before = '', $after = '' ) {

	$caption = get_post(get_post_thumbnail_id())->post_excerpt;
	if(!empty($caption)){
		echo '<span class="os-post-thumnbnail-caption">' . $caption . '</span>';
	}
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_byline' ) ) :
/**
 * Prints HTML with meta information for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_byline( $before = '', $after = '' ) {

	if ( is_multi_author() ) {

		printf( __( '%1$s<span class="author vcard"><a class="url fn n" href="%2$s" title="%3$s" rel="author">%4$s</a></span>%5$s', 'oystershell' ),

			$before,
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'oystershell' ), get_the_author() ) ),
			esc_html( get_the_author() ),
			$after
		);
	}
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_simple_meta' ) ) :
/**
 * Prints HTML with meta information for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_simple_meta() {
?>
	<p>
		<?php oystershell_tags_n_cats( '<span class="meta-tags-n-cats">', '</span>' ); ?>
		<?php oystershell_comments_meta( '<span class="sep"> &middot; </span><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_extended_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Oystershell 1.0
 */
function oystershell_extended_meta() {
?>
	<p>
		<?php oystershell_meta_pubdate( '<span class="meta-pubdate">Posted on ', '</span>'); ?>
		<?php oystershell_meta_byline( 'by <span class="byline">', '</span>' ); ?>
		<?php oystershell_tags_n_cats( '<span class="sep"> &middot; </span><span class="meta-tags-n-cats">', '</span>' ); ?>
		<?php oystershell_meta_permalink( '<span class="sep"> &middot; </span><span class="meta-permalink">Link to &laquo;', '&raquo;</span>'); ?>
		<?php oystershell_comments_meta( '<span class="sep"> &middot; </span><span class="meta-comments">', '</span>' ); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
<?php
	jptweak_display_share();
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_attachment_meta' ) ) :
/**
 * Prints HTML with meta information for an attachment.
 *
 * @since Oystershell 1.0
 */
function oystershell_attachment_meta() {
	global $post;
?>
	<p>
		<?php oystershell_meta_pubdate( '<span class="meta-pubdate">Posted on ', '</span>'); ?>
		<?php printf( __( 'and attached to <a href="%1$s" title="Return to %2$s">%2$s</a>', 'oystershell' ),
			get_permalink( $post->post_parent ),
			get_the_title( $post->post_parent )
		); ?>
		<?php edit_post_link( __( 'Edit', 'oystershell' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</p>
	<?php if ( wp_attachment_is_image() ) {
		$meta = wp_get_attachment_metadata($id);
		echo '<p>';
		echo "Resolution: ".$meta[width]." x ".$meta[height]."<br />";
		$timestamped = $meta[image_meta][created_timestamp];
		$created_timestamp = date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $timestamped);
		echo "Created:  ".$created_timestamp."<br />";
    echo "Credit:  ".$meta[image_meta][credit]."<br /> ";
   	echo "Camera:  ".$meta[image_meta][camera]."<br />";
    echo "Focal length:  ".$meta[image_meta][focal_length]."<br />";
 		echo "Aperture:  ".$meta[image_meta][aperture]."<br />";
 		echo "ISO:  ".$meta[image_meta][iso]."<br />";
 		echo "Shutter speed:  ".$meta[image_meta][shutter_speed]."<br />";
		echo "Copyright:  ".$meta[image_meta][copyright];
		echo '<p>';
	}
	jptweak_display_share();
}
endif;

//------------------------------------------------------------------------------------
/**
 * Functions for formatting post meta
 */
//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_permalink' ) ) :
/**
 * Prints HTML with the permalink for a post.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_permalink( $before = '', $after = '' ) {
	printf( __( '%1$s<a href="%2$s" title="Link to %3$s" rel="bookmark">%4$s</a>%5$s', 'oystershell' ),

		$before,
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_html( get_the_title() ),
		$after

	);
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_pubdate' ) ) :
/**
 * Prints HTML with meta information for the current post date.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_pubdate( $before = '', $after = '' ) {
	printf( __(
	'%1$s<time class="meta-entry-date" datetime="%2$s" itemprop="datePublished" pubdate>%3$s</time>%4$s', 'oystershell' ),

		$before,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		$after
	);
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_pubdatetime' ) ) :
/**
 * Prints HTML with meta information for the current post date/time.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_pubdatetime( $before = '', $after = '' ) {
	printf( __(
	'%1$s<time class="meta-entry-date" datetime="%2$s" itemprop="datePublished" pubdate>%3$s</time> at %4$s%5$s', 'oystershell' ),

		$before,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_html( get_the_time() ),
		$after
	);
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_moddate' ) ) :
/**
 * Prints HTML with meta information for the current post modification date.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_moddate( $before = '', $after = '' ) {
	printf( __(
	'%1$s<time class="meta-modified-date" datetime="%2$s" itemprop="datePublished" pubdate>%3$s</time>%4$s', 'oystershell' ),

		$before,
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() ),
		$after
	);
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_moddatetime' ) ) :
/**
 * Prints HTML with meta information for the current post modification date/time.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_moddatetime( $before = '', $after = '' ) {
	printf( __(
	'%1$s<time class="meta-modified-date" datetime="%2$s" itemprop="datePublished" pubdate>%3$s</time> at %4$s%5$s', 'oystershell' ),

		$before,
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() ),
		esc_html( get_the_modified_time() ),
		$after
	);
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_meta_modauthor' ) ) :
/**
 * Prints HTML with meta information for the current post author.
 *
 * @since Oystershell 1.0
 */
function oystershell_meta_modauthor( $before = '', $after = '' ) {

	if ( is_multi_author() ) {

		printf( __( '%1$s<span>%2$s</span>%3$s', 'oystershell' ),

			$before,
			esc_html( get_the_modified_author() ),
			$after
		);
	}
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_comments_meta' ) ) :
/**
 * Prints HTML with comment details for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_comments_meta( $before = '', $after = '' ) {

	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) :
		echo $before;?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'oystershell' ), __( '1 Comment', 'oystershell' ), __( '% Comments', 'oystershell' ) ); ?></span>
	<?php echo $after;
	endif;
}
endif;

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_tags_n_cats' ) ) :
/**
 * Prints HTML with categories and tags for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_tags_n_cats( $before = '', $after = '' ) {
	if ( is_page() || is_custom_post_type() )
		return;
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'oystershell' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', ', ' );

	if ( ! oystershell_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( '%1$sThis entry was tagged %3$s%4$s', 'oystershell' );
		} else {
			$meta_text = __( '', 'oystershell' );
		}

	} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( '%1$sThis entry was posted in %2$s and tagged %3$s%4$s', 'oystershell' );
		} else {
			$meta_text = __( '%1$sThis entry was posted in %2$s%4$s', 'oystershell' );
		}

	} // end check for categories on this blog

	printf(
		$meta_text,
		$before,
		$category_list,
		$tag_list,
		$after
	);
}
endif;

//------------------------------------------------------------------------------------
/**
 * Post Format Functions
 */
//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_format_quote_source' ) ) :
/**
 * Prints HTML with the source of a quotation.
 *
 * @since Oystershell 1.0
 */
function oystershell_format_quote_source( $before = '<cite>', $after = '</cite>' ) {

	$source_name = get_post_meta(get_the_id(), '_format_quote_source_name', true);
	$source_url = get_post_meta(get_the_id(), '_format_quote_source_url', true);

	if(!empty($source_name)){

		$link_open = '';
		$link_close = '';

		if(!empty($source_url)){

			$link_open = '<a href="' . $source_url . '" target="_blank">';
			$link_close = '</a>';
		}

		printf( __( '%1$s%2$s%3$s%4$s%5$s', 'oystershell' ),
			$before,
			$link_open,
			$source_name,
			$link_close,
			$after
		);
	}
}
endif;
