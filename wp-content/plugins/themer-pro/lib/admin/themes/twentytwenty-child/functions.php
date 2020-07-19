<?php

add_action( 'wp_enqueue_scripts', 'twentytwenty_child_enqueue_styles' );
/**
 * Load the parent and child style.css files
 */
function twentytwenty_child_enqueue_styles() {

    wp_enqueue_style( 'twentytwenty-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentytwenty-style' ),
        wp_get_theme()->get('Version')
    );
    
}

/* Add your custom functions below... */		
