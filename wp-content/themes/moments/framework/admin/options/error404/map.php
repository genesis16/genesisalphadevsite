<?php

if ( ! function_exists( 'moments_qodef_error_404_options_map' ) ) {

	function moments_qodef_error_404_options_map() {

		moments_qodef_add_admin_page( array(
			'slug'  => '__404_error_page',
			'title' => esc_html__( '404 Error Page', 'moments' ),
			'icon'  => 'fa fa-exclamation-triangle'
		) );

		$panel_404_options = moments_qodef_add_admin_panel( array(
			'page'  => '__404_error_page',
			'name'  => 'panel_404_options',
			'title' => esc_html__( '404 Page Option', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_title',
			'default_value' => '',
			'label'         => esc_html__( 'Title', 'moments' ),
			'description'   => esc_html__( 'Enter title for 404 page', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_text',
			'default_value' => '',
			'label'         => esc_html__( 'Text', 'moments' ),
			'description'   => esc_html__( 'Enter text for 404 page', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_404_options,
			'type'          => 'text',
			'name'          => '404_back_to_home',
			'default_value' => '',
			'label'         => esc_html__( 'Back to Home Button Label', 'moments' ),
			'description'   => esc_html__( 'Enter label for "Back to Home" button', 'moments' ),
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_error_404_options_map', 18 );

}