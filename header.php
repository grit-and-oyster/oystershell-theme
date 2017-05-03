<?php
/**
 * The template for displaying the header.
 *
 * Displays all of the <head> section and <div id="col-1"> for the banner and <div id="col-2"> for the site navigation.
 *
 * @package Oystershell
 * @since Oystershell 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
<?php oystershell_seo_description(); ?>
<!--[if !IE 7]>
<style type="text/css">
	#wrap {display:table;height:100%}
</style>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="row hfeed site background-page">
	<a class="skip-link assistive-text" href="#content"><?php _e( 'Skip to content', 'oystershell' ); ?></a>
	<?php oystershell_page_top(); ?>
		<div id="wrap">
			<div id="canvas" class="background-canvas clearfix">
				<div id="col-1" class="large-12 columns">
					<header id="masthead" class="site-header" role="banner">
						<?php oystershell_masthead() ?>
					</header><!-- #masthead .site-header -->
				</div><!-- #col-1 -->
				<div id="col-2" class="large-12 columns">
					<nav id="navigation" role="navigation" class="site-navigation main-navigation clearfix">
						<h1 class="assistive-text"><?php _e( 'Main navigation', 'oystershell' ); ?></h1>
						<?php oystershell_navmenu_primary() ?>
					</nav><!-- #navigation .site-navigation .main-navigation -->
				</div><!-- #col-2 -->
				<?php oystershell_end_header(); ?>
