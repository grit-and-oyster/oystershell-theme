<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */

get_header();

/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */
if ( is_front_page() && is_home() ) {
  // Default homepage (with latest posts)
  get_template_part( 'loops/loop', 'home' );
} elseif ( is_front_page() ) {
  // static homepage
  get_template_part( 'loops/loop', 'homepage' );
} elseif ( is_home() ) {
  // blog page (latest posts)
  get_template_part( 'loops/loop', 'blog' );
} elseif ( is_search() ) {
  // search results archive
  get_template_part( 'loops/loop', 'search' );
} elseif ( is_archive() ) {
    if ( is_post_type_archive()  ) {
      $obj = get_queried_object();
      $post_type = $obj->name;
      get_template_part( 'loops/loop-archive', $post_type );
    } elseif ( is_category()  ) {
      get_template_part( 'loops/loop-archive', 'category' );
    } elseif ( is_tag() ) {
      get_template_part( 'loops/loop-archive', 'tag' );
    } elseif ( is_tax() ) {
      get_template_part( 'loops/loop-archive', 'tax' );
    } elseif ( is_author() ) {
      get_template_part( 'loops/loop-archive', 'author' );
    } elseif ( is_year() ) {
      get_template_part( 'loops/loop-archive', 'year' );
    } elseif ( is_month() ) {
      get_template_part( 'loops/loop-archive', 'month' );
    } elseif ( is_day() ) {
      get_template_part( 'loops/loop-archive', 'day' );
    } else {
      get_template_part( 'loops/loop', 'archive' );
    }
} elseif ( is_singular() ) {
    if ( is_attachment() ) {
      get_template_part( 'loops/loop', 'attachment' );
    } elseif ( is_page() ) {
      get_template_part( 'loops/loop', 'page' );
    } else {
      // ?? check for custom post type ??
      get_template_part( 'loops/loop', 'single' );
    }
} elseif ( is_404() ) {
    get_template_part( 'loops/loop', '404' );
} else {
    get_template_part( 'loops/loop', 'index' );
}

get_sidebar( 'sidebar' );

get_footer(); ?>
