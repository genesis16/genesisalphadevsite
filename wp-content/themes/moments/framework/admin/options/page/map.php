<?php

if ( ! function_exists( 'moments_qodef_page_options_map' ) ) {

	function moments_qodef_page_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'moments' ),
				'icon'  => 'fa fa-institution'
			)
		);

		$custom_sidebars = moments_qodef_get_custom_sidebars();

		$panel_sidebar = moments_qodef_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Design Style', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'name'          => 'page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'moments' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'moments' ),
			'default_value' => 'default',
			'parent'        => $panel_sidebar,
			'options'       => array(
				'default'          => esc_html__( 'No Sidebar', 'moments' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'moments' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'moments' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'moments' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'moments' )
			)
		) );


		if ( count( $custom_sidebars ) > 0 ) {
			moments_qodef_add_admin_field( array(
				'name'        => 'page_custom_sidebar',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'moments' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'moments' ),
				'parent'      => $panel_sidebar,
				'options'     => $custom_sidebars
			) );
		}


	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_page_options_map', 9 );

}