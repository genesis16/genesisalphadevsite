<?php

if ( ! function_exists( 'moments_qodef_sidebar_options_map' ) ) {

	function moments_qodef_sidebar_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar', 'moments' ),
				'icon'  => 'fa fa-bars'
			)
		);

		$panel_widgets = moments_qodef_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__( 'Widgets', 'moments' )
			)
		);

		/**
		 * Navigation style
		 */
		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'sidebar_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Sidebar Background Color', 'moments' ),
			'description'   => esc_html__( 'Choose background color for sidebar', 'moments' ),
			'parent'        => $panel_widgets
		) );

		$group_sidebar_padding = moments_qodef_add_admin_group( array(
			'name'   => 'group_sidebar_padding',
			'title'  => esc_html__( 'Padding', 'moments' ),
			'parent' => $panel_widgets
		) );

		$row_sidebar_padding = moments_qodef_add_admin_row( array(
			'name'   => 'row_sidebar_padding',
			'parent' => $group_sidebar_padding
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_top',
			'default_value' => '',
			'label'         => esc_html__( 'Top Padding', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_right',
			'default_value' => '',
			'label'         => esc_html__( 'Right Padding', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__( 'Bottom Padding', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'sidebar_padding_left',
			'default_value' => '',
			'label'         => esc_html__( 'Left Padding', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_sidebar_padding
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'select',
			'name'          => 'sidebar_alignment',
			'default_value' => '',
			'label'         => esc_html__( 'Text Alignment', 'moments' ),
			'description'   => esc_html__( 'Choose text aligment', 'moments' ),
			'options'       => array(
				'left'   => esc_html__( 'Left', 'moments' ),
				'center' => esc_html__( 'Center', 'moments' ),
				'right'  => esc_html__( 'Right', 'moments' )
			),
			'parent'        => $panel_widgets
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_sidebar_options_map', 12 );

}