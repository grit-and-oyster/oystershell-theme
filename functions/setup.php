<?php
//------------------------------------------------------------------------------------
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that these functions are hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Oyster Shell 1.0
 */

add_action( 'after_setup_theme', 'oystershell_setup' );
add_action( 'after_setup_theme', 'oystershell_start', 16);
add_filter( 'post_class', 'remove_sticky_class');
add_action( 'init', 'oystershell_add_excerpts_to_pages' );
add_action( 'wp_head', 'oystershell_add_icons');

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_setup' ) ):
	function oystershell_setup() {
   oystershell_theme_support();
  }
endif; // oystershell_setup

//------------------------------------------------------------------------------------
function oystershell_start() {

    // launching operation cleanup
    add_action('init', 'oystershell_head_cleanup');

    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'oystershell_remove_wp_widget_recent_comments_style', 1 );

    // clean up comment styles in the head
    add_action('wp_head', 'oystershell_remove_recent_comments_style', 1);

    // clean up gallery output in wp
    add_filter('gallery_style', 'oystershell_gallery_style');

    // cleaning up excerpt
    add_filter('excerpt_more', 'oystershell_excerpt_more');

} /* end oystershell_start */

//------------------------------------------------------------------------------------
function oystershell_theme_support() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Oyster Shell, use a find and replace
	 * to change 'oystershell' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oystershell', get_template_directory() . '/languages' );

	/**
	 * Add theme support for document Title tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

  // Default thumbnail size
	//set_post_thumbnail_size(125, 125, true);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Add support for Post Formats
	 *
	 * 'status', 'aside', 'quote', 'link', 'image', 'gallery', 'video', 'audio', 'chat'
	 */
	add_theme_support( 'post-formats', array( 'status', 'quote', 'link' ) );

}

//------------------------------------------------------------------------------------
//The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function oystershell_head_cleanup() {
	// Remove category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// Remove post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// Remove EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove Windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove WP version
	remove_action( 'wp_head', 'wp_generator' );
} /* end Joints head cleanup */

// Remove injected CSS for recent comments widget
function oystershell_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// Remove injected CSS from recent comments widget
function oystershell_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// Remove injected CSS from gallery
function oystershell_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// This removes the annoying […] to a Read More link
function oystershell_excerpt_more($more) {
	global $post;
	// edit here if you like
return '<a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __('Read', 'jointswp') . get_the_title($post->ID).'">'. __('... Read more &raquo;', 'jointswp') .'</a>';
}

//------------------------------------------------------------------------------------
//  Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class($classes) {
	if(in_array('sticky', $classes)) {
		$classes = array_diff($classes, array("sticky"));
		$classes[] = 'wp-sticky';
	}

	return $classes;
}

//------------------------------------------------------------------------------------
//This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function oystershell_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s', 'jointswp' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

//------------------------------------------------------------------------------------
// Add support for excerpts to pages
function oystershell_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

//------------------------------------------------------------------------------------
function oystershell_add_icons() {
?>
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" >
<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon.png" >
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-72x72.png" >
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-114x114.png" >
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/img/apple-touch-icon-144x144.png" >
<?php
}
