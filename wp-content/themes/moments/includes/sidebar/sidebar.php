<?php

if ( ! function_exists( 'moments_qodef_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function moments_qodef_register_sidebars() {

		register_sidebar( array(
			'name'          => 'Sidebar',
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Default Sidebar', 'moments' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );

	}

	add_action( 'widgets_init', 'moments_qodef_register_sidebars' );
}

if ( ! function_exists( 'moments_qodef_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates MomentsQodefSidebar object
	 */
	function moments_qodef_add_support_custom_sidebar() {
		add_theme_support( 'MomentsQodefSidebar' );
		if ( get_theme_support( 'MomentsQodefSidebar' ) ) {
			new MomentsQodefSidebar();
		}
	}

	add_action( 'after_setup_theme', 'moments_qodef_add_support_custom_sidebar' );
}
