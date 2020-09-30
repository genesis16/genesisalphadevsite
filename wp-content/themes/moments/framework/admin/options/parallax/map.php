<?php

if ( ! function_exists( 'moments_qodef_parallax_options_map' ) ) {
	/**
	 * Parallax options page
	 */
	function moments_qodef_parallax_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_parallax_page',
				'title' => esc_html__( 'Parallax', 'moments' ),
				'icon'  => 'fa fa-unsorted'
			)
		);

		$panel_parallax = moments_qodef_add_admin_panel(
			array(
				'page'  => '_parallax_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__( 'Parallax', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'type'          => 'onoff',
			'name'          => 'parallax_on_off',
			'default_value' => 'off',
			'label'         => esc_html__( 'Parallax on touch devices', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will allow parallax on touch devices', 'moments' ),
			'parent'        => $panel_parallax
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'text',
			'name'          => 'parallax_min_height',
			'default_value' => '400',
			'label'         => esc_html__( 'Parallax Min Height', 'moments' ),
			'description'   => esc_html__( 'Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'moments' ),
			'args'          => array(
				'col_width' => 3,
				'suffix'    => 'px'
			),
			'parent'        => $panel_parallax
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_parallax_options_map', 19 );

}