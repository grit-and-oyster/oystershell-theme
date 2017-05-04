<?php
//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_scripts' ) ):
/**
 * Enqueue scripts and styles
 */
function oystershell_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/foundation/js/vendor/what-input.js', array(), '', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/vendor/foundation/js/vendor/foundation.min.js', array( 'jquery' ), '6.2.3', true );

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '', true );

    // Foundation stylesheet
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation/css/foundation.min.css', array(), '', 'all' );

     // Add custom fonts, used in the main stylesheet.
   	wp_enqueue_style( 'oystershell-fonts', oystershell_fonts_url(), array(), null );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/css/style.css', array(), '', 'all' );

    // Load the html5 shiv.
  	wp_enqueue_script( 'oystershell-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
  	wp_script_add_data( 'oystershell-html5', 'conditional', 'lt IE 9' );

  	wp_enqueue_script( 'oystershell-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
endif; // oystershell_scripts
add_action('wp_enqueue_scripts', 'oystershell_scripts', 999);

//------------------------------------------------------------------------------------
if ( ! function_exists( 'oystershell_fonts_url' ) ) :
/**
 * Register Google fonts for Oystershell.
 *
 * Create your own oystershell_fonts_url() function to override in a child theme.
 *
 * @since Oystershell 1.1
 *
 * @return string Google fonts URL for the theme.
 */
function oystershell_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Asap, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Asap font: on or off', 'oystershell' ) ) {
		$fonts[] = 'Asap:400,700,400italic,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;
