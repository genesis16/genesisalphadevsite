<?php

if ( ! function_exists( 'moments_qodef_content_bottom_options_map' ) ) {

	function moments_qodef_content_bottom_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_content_bottom_page',
				'title' => esc_html__( 'Content Bottom', 'moments' ),
				'icon'  => 'fa fa-level-down'
			)
		);

		$panel_content_bottom = moments_qodef_add_admin_panel(
			array(
				'page'  => '_content_bottom_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'name'          => 'enable_content_bottom_area',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => esc_html__( 'Enable Content Bottom Area', 'moments' ),
			'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'moments' ),
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#qodef_enable_content_bottom_area_container'
			),
			'parent'        => $panel_content_bottom
		) );

		$enable_content_bottom_area_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'hidden_property' => 'enable_content_bottom_area',
				'hidden_value'    => 'no'
			)
		);

		$custom_sidebars = moments_qodef_get_custom_sidebars();

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblank',
			'name'          => 'content_bottom_sidebar_custom_display',
			'default_value' => '',
			'label'         => esc_html__( 'Widget Area to Display', 'moments' ),
			'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'moments' ),
			'options'       => $custom_sidebars,
			'parent'        => $enable_content_bottom_area_container
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'yesno',
			'name'          => 'content_bottom_in_grid',
			'default_value' => 'yes',
			'label'         => esc_html__( 'Display in Grid', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'moments' ),
			'parent'        => $enable_content_bottom_area_container
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'content_bottom_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' ),
			'description'   => esc_html__( 'Choose a background color for Content Bottom area', 'moments' ),
			'parent'        => $enable_content_bottom_area_container
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_content_bottom_options_map', 20 );

}