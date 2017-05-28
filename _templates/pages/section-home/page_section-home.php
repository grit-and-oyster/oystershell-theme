<?php

/*
Template Name: Section Home
 *
 * The template for displaying the home page of a section of the website.
 *
 * @package Oyster Shell
 * @since Oyster Shell 1.0
 */

get_header();

get_template_part( 'loops/loop', 'page' );

get_template_part( 'loops/loop', 'section-home' );

get_sidebar( 'sidebar' );

get_footer(); ?>
