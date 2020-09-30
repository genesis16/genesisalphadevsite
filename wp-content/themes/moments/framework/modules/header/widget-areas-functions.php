<?php

if ( ! function_exists( 'moments_qodef_register_top_header_areas' ) ) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function moments_qodef_register_top_header_areas() {
		$top_bar_layout  = moments_qodef_options()->getOptionValue( 'top_bar_layout' );
		$top_bar_enabled = moments_qodef_options()->getOptionValue( 'top_bar' );

		if ( $top_bar_enabled == 'yes' ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Left', 'moments' ),
				'id'            => 'qodef-top-bar-left',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top bar', 'moments' ),
			) );

			//register this widget area only if top bar layout is three columns
			if ( $top_bar_layout === 'three-columns' ) {
				register_sidebar( array(
					'name'          => esc_html__( 'Top Bar Center', 'moments' ),
					'id'            => 'qodef-top-bar-center',
					'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
					'after_widget'  => '</div>',
					'description'   => esc_html__( 'Widgets added here will appear in the center in top bar', 'moments' ),
				) );
			}

			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Right', 'moments' ),
				'id'            => 'qodef-top-bar-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top bar', 'moments' ),
			) );
		}
	}

	add_action( 'widgets_init', 'moments_qodef_register_top_header_areas' );
}

if ( ! function_exists( 'moments_qodef_header_standard_centered_widget_areas' ) ) {
	/**
	 * Registers widget areas for standard header type and header centered type
	 */
	function moments_qodef_header_standard_centered_widget_areas() {
		if ( moments_qodef_core_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Right From Main Menu', 'moments' ),
				'id'            => 'qodef-right-from-main-menu',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-main-menu-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the main menu', 'moments' )
			) );
		}
	}

	add_action( 'widgets_init', 'moments_qodef_header_standard_centered_widget_areas' );
}

if ( ! function_exists( 'moments_qodef_header_vertical_widget_areas' ) ) {
	/**
	 * Registers widget areas for vertical header
	 */
	function moments_qodef_header_vertical_widget_areas() {
		register_sidebar( array(
			'name'          => esc_html__( 'Vertical Area', 'moments' ),
			'id'            => 'qodef-vertical-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-area-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__( 'Widgets added here will appear on the bottom of vertical menu', 'moments' )
		) );

	}

	add_action( 'widgets_init', 'moments_qodef_header_vertical_widget_areas' );
}


if ( ! function_exists( 'moments_qodef_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function moments_qodef_register_mobile_header_areas() {
		if ( moments_qodef_is_responsive_on() || moments_qodef_core_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Right From Mobile Logo', 'moments' ),
				'id'            => 'qodef-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo', 'moments' )
			) );
		}
	}

	add_action( 'widgets_init', 'moments_qodef_register_mobile_header_areas' );
}

if ( ! function_exists( 'moments_qodef_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function moments_qodef_register_sticky_header_areas() {
		if ( in_array( moments_qodef_options()->getOptionValue( 'header_behaviour' ), array(
			'sticky-header-on-scroll-up',
			'sticky-header-on-scroll-down-up'
		) ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Sticky Right', 'moments' ),
				'id'            => 'qodef-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side in sticky menu', 'moments' )
			) );
		}
	}

	add_action( 'widgets_init', 'moments_qodef_register_sticky_header_areas' );
}