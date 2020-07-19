<?php
/**
 * Template Name: Page Builder
 * Template Post Type: page
 *
 * @package Freelancer
 */

// Remove page elements to allow for page builders to take full control.
remove_action( 'freelancer_entry_header', 'freelancer_do_entry_header' );
remove_action( 'freelancer_entry_footer', 'freelancer_do_entry_footer' );
remove_action( 'freelancer_after_endwhile', 'freelancer_do_posts_pagination' );

// Add the "page-builder" body class to account for necessary style changes.
freelancer_add_body_classes( 'page-builder-template' );

// Initialize the Freelancer Framework
freelancer();
