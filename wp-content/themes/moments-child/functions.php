<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'moments_qodef_child_theme_enqueue_scripts' ) ) {
	function moments_qodef_child_theme_enqueue_scripts() {
		$parent_style = 'moments-qodef-default-style';

		wp_enqueue_style( 'moments-qodef-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'moments_qodef_child_theme_enqueue_scripts' );
}