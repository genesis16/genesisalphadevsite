<?php

add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_styles' );
/**
 * Load the parent style.css file
 */
function twentyseventeen_child_enqueue_styles() {

    wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentyseventeen-style' ),
        wp_get_theme()->get('Version')
    );
    
}

/* Add your custom functions below... */		
