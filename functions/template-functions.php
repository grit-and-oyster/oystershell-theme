<?php
/**
 * Functions hooked to actions or filters.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_masthead' ) ):
/**
 * Display the site masthead
 *
 * @since Oystershell 1.0
 */
function oystershell_display_masthead() {

?> 	<hgroup>
		<h1 class="assistive-text"><?php wp_title( '-', true, 'right' ); ?></h1>
		<h2 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
		<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
	</hgroup>
<?php

}
endif; // oystershell_display_masthead
add_action( 'oystershell_masthead', 'oystershell_display_masthead' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_page_title' ) ) :
/**
 * Prints HTML with the page title.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_page_title() {

	if (is_front_page()) : { ?>
		<h1 class="page-title front-page-title"><?php echo bloginfo('name'); ?></h1>
	<?php } elseif (is_home()) : { ?>
		<h1 class="page-title blog-page-title"><?php single_post_title(); ?></h1>
	<?php } elseif (is_search()) : { ?>
		<h1 class="page-title"><?php _e( 'Search Results', 'oystershell' ); ?></h1>
	<?php } else : { ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
	<?php } endif;

}
endif; // oystershell_display_page_title
add_action( 'oystershell_page_title', 'oystershell_display_page_title' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_author_profile' ) ) :
/**
 * Prints HTML with author profile details, Displayed on author archive pages.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_author_profile( $user_ID, $gravatar = 'on') {
?>
		<section class="os-author-profile clearfix">
			<header>
				<h1 class="assistive-text"><?php _e( 'Author profile', 'oystershell' ); ?></h1>
			</header>
			<?php if ( $gravatar == 'on' ) { ?>
				<div class="os-author-profile-gravatar">
					<?php echo get_avatar( get_the_author_meta('email', $user_ID ) ); ?>
				</div><!-- .os-author-profile-gravatar -->
			<?php } ?>

			<div class="os-author-profile-bio">
				<div class="os-author-profile-bio-name">
					<?php echo get_the_author_meta('display_name', $user_ID); ?>  <span class="os-author-profile-bio-nickname">(<?php echo get_the_author_meta('nickname', $user_ID); ?>)</span>
				</div>
				<div class="os-author-profile-bio-description">
					<?php echo apply_filters("the_content",get_the_author_meta('user_description', $user_ID)); ?>
				</div>
			</div><!-- .os-author-profile-bio -->

			<div class="os-author-profile-links">
				<?php oystershell_display_author_profile_links( $user_ID ); ?>
			</div><!-- .os-author-profile-links -->
		</section><!-- .os-author-profile -->
	<?php
}
endif;
add_action( 'oystershell_author_profile', 'oystershell_display_author_profile' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_post_divider' ) ) :
/**
 * Prints post date to divide the posts.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_post_divider() {
	if ( 'post' == get_post_type() ) : ?>
		<div class="entry-date">
			<?php $os_post_date = get_the_date( 'c'); ?>
			<time class="os-post-date" datetime="<?php echo $os_post_date ?>" pubdate="pubdate"><?php the_date(); ?></time>
		</div><!-- .entry-date -->
	<?php endif;

}
endif; // oystershell_display_post_divider
add_action( 'oystershell_post_divider', 'oystershell_display_post_divider' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_featured_image' ) ):
/**
 * Handle featured images
 *
 * @since Oystershell 1.0
 */
function oystershell_display_featured_image() {

	if ( has_post_thumbnail() ) {
		if (is_page()) : { ?>
			<div class="page-featured-image">
		<?php } else : { ?>
			<div class="entry-featured-image">
		<?php } endif; ?>
			<?php
				if ( is_single() || is_page()) {
					the_post_thumbnail();
					oystershell_thumbnail_caption();

				} else { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
					<?php oystershell_thumbnail_caption(); ?>
			<?php } ?>
			</div>
	<?php }
}
endif; // oystershell_display_featured_image
add_action( 'oystershell_featured_image', 'oystershell_display_featured_image' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_header_meta' ) ) :
/**
 * Prints HTML with meta information for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_header_meta() {

	if (is_attachment()) {
		# code...
	} elseif (is_page()) {
		# code...
	} elseif (is_single()) {
		oystershell_meta_byline( '<span class="byline">By ', '.</span>');
	} else {
		oystershell_meta_byline( '<span class="byline">By ', '.</span>');
	}
}
endif; // oystershell_display_header_meta
add_action( 'oystershell_header_meta', 'oystershell_display_header_meta' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_attachment' ) ):
/**
 * Handle the display of attachments
 *
 * @since Oystershell 1.1
 */
function oystershell_display_attachment() {
   	global $post;
    if ( wp_attachment_is_image() ) {
      $thumbnail = wp_get_attachment_thumb_url();
    } else {
      $thumbnail = wp_mime_type_icon( $post->post_mime_type );
    }
    $url = wp_get_attachment_url();
    ?>
    <div class="os-attachment">
      <div class="os-attachment-thumbnail">
        <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment" class="attachment-link">
          <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php esc_attr( $post->title ) ?>" />
        </a>
      </div>
      <div class="wp-caption-text">
        <?php echo esc_attr( $post->post_excerpt ); ?>
      </div>
      <div class="os-attachment-link">
        <p><i class="fa fa-lg fa-download" aria-hidden="true"></i> <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment" class="attachment-link">Download File</a></p>
      </div>
    </div><!-- .os-attachment -->
    <?php echo wpautop(esc_html($post->post_content));
    oystershell_content_nav( 'nav-attach' );
}
endif; // oystershell_display_other_attachment
add_action( 'oystershell_other_attachment', 'oystershell_display_attachment' );


//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_image_attachment' ) ):
/**
 * Handle image attachments
 *
 * @since Oystershell 1.0
 */
function oystershell_display_image_attachment() {
   	global $post;
    ?>

    <div class="os-attachment">
      <div class="os-attachment-image">
        <?php $attachment_size = apply_filters( 'oystershell_attachment_size', array( 1200, 1200 ) ); // Filterable image size.
        echo wp_get_attachment_image( $post->ID, $attachment_size ); ?>
      </div>
      <div class="wp-caption-text">
        <?php echo esc_attr( $post->post_excerpt ); ?>
      </div>
      <?php oystershell_content_nav( 'nav-attach' ); ?>
    </div><!-- .os-attachment -->
    <?php echo wpautop(esc_html($post->post_content)); ?>
    <p class='os-attachment-resolutions'>Downloads:
		<?php
			$images = array();
			$image_sizes = get_intermediate_image_sizes();
			array_unshift( $image_sizes, 'full' );
			foreach( $image_sizes as $image_size ) {
				$image = wp_get_attachment_image_src( get_the_ID(), $image_size );
				$name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
				$images[] = '<i class="fa fa-download" aria-hidden="true"></i> <a href="' . $image[0] . '">' . $name . '</a>';
			}
			echo implode( ' | ', $images );
		?>
		</p>
<?php
}
endif; // oystershell_display_image_attachment
add_action( 'oystershell_image_attachment', 'oystershell_display_image_attachment' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_footer_meta' ) ) :
/**
 * Prints HTML with meta information for the current post.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_footer_meta() {

	if (is_attachment()) {
		oystershell_attachment_meta();
	} elseif (is_page()) {
		oystershell_simple_meta();
	} elseif (is_single()) {
		oystershell_extended_meta();
	} else {
		oystershell_simple_meta();
	}
}
endif; // oystershell_display_header_meta
add_action( 'oystershell_footer_meta', 'oystershell_display_footer_meta' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_no_results' ) ) :
/**
 * Displays a message that posts cannot be found.
 *
 * @since Oystershell 1.0
 */
function oystershell_display_no_results() {

?>
	<header class="row entry-header">
		<div class="small-12 columns">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'oystershell' ); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="row entry-content">
		<div class="small-12 columns">
			<?php if ( is_home() ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'oystershell' ), admin_url( 'post-new.php' ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'oystershell' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'oystershell' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="row entry-footer">
		<div class="small-12 columns entry-meta">
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->

<?php
}
endif; // oystershell_display_no_results
add_action( 'oystershell_no_results', 'oystershell_display_no_results' );
add_action( 'oystershell_404', 'oystershell_display_no_results' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_display_postscript' ) ):
/**
 * Insert the postscript text
 *
 * @since Oystershell 1.0
 */
function oystershell_display_postscript() { ?>

	<section id="postscript-text" class="postscript-text">
		<h1 class="assistive-text"><?php _e( 'Postscript', 'oystershell' ); ?></h1>

		<!-- Postscript text goes here -->

	</section><!-- #postscript-text .postscript-text -->

<?php }
endif; // oystershell_display_postscript
add_action( 'oystershell_postscript', 'oystershell_display_postscript' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_credits' ) ) :
/**
 * Write website credits to the colophon
 *
 * @since Oystershell 1.0
 */
function oystershell_credits() {

	$this_theme = wp_get_theme();

?>
<p>Powered by <a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform" rel="generator">WordPress</a> and <a href="<?php echo $this_theme->get( 'ThemeURI' ); ?>" title="The WordPress theme" ><?php echo $this_theme->Name; ?></a> by <a href="<?php echo $this_theme->get( 'AuthorURI' ); ?>" title="The theme author" ><?php echo $this_theme->get( 'Author' ); ?></a></p>
<?php
}
endif;
add_action( 'oystershell_colophon', 'oystershell_credits' );

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_more_link' ) ) :
/**
 * Customises the more link across the site.
 *
 * @since Oystershell 1.0
 */
function oystershell_more_link($more_link, $more_link_text) {

	$new_link_text = __( 'Read more&hellip;', 'oystershell' );

	//$new_link_text = __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'oystershell' );

	//$new_link_text = __( 'Continue reading  &lsquo;' . get_the_title('', '', false) . '&rsquo; <span class="meta-nav">&rarr;</span>', 'oystershell' );

	return str_replace($more_link_text, $new_link_text, $more_link);

}
endif;
add_filter('the_content_more_link', 'oystershell_more_link', 10, 2);
