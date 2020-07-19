<?php

add_action( 'wp_enqueue_scripts', 'twentynineteen_child_enqueue_styles' );
/**
 * Load the parent style.css file
 */
function twentynineteen_child_enqueue_styles() {

    wp_enqueue_style( 'twentynineteen-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentynineteen-style' ),
        wp_get_theme()->get('Version')
    );
    
}

/* Add your custom functions below... */		
