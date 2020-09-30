<?php

if ( ! function_exists( 'moments_qodef_header_options_map' ) ) {

	function moments_qodef_header_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__( 'Header', 'moments' ),
				'icon'  => 'fa fa-header'
			)
		);

		$panel_header = moments_qodef_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__( 'Header', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => 'header-standard',
				'label'         => esc_html__( 'Choose Header Type', 'moments' ),
				'description'   => esc_html__( 'Select the type of header you would like to use', 'moments' ),
				'options'       => array(
					'header-standard' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-standard.png'
					),
					'header-centered' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-center.png'
					),
					'header-vertical' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-vertical.png'
					)
				),
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
					'dependence'  => true,
					'show'        => array(
						'header-standard' => '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-vertical' => '#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
						'header-centered' => '#qodef_panel_header_centered,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
					),
					'hide'        => array(
						'header-standard' => '#qodef_panel_header_centered,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
						'header-vertical' => '#qodef_panel_header_standard,#qodef_panel_header_centered,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-centered' => '#qodef_panel_header_standard,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu'
					)
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'sticky-header-on-scroll-up',
				'label'           => esc_html__( 'Choose Header behaviour', 'moments' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'moments' ),
				'options'         => array(
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'moments' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'moments' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'moments' )
				),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array( 'header-vertical' ),
				'args'            => array(
					'dependence' => true,
					'show'       => array(
						'sticky-header-on-scroll-up'      => '#qodef_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_sticky_header',
						'fixed-on-scroll'                 => '#qodef_panel_fixed_header'
					),
					'hide'       => array(
						'sticky-header-on-scroll-up'      => '#qodef_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_fixed_header',
						'fixed-on-scroll'                 => '#qodef_panel_sticky_header',
					)
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'moments' ),
				'parent'        => $panel_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_container"
				)
			)
		);

		$top_bar_container = moments_qodef_add_admin_container( array(
			'name'            => 'top_bar_container',
			'parent'          => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value'    => 'no'
		) );

		moments_qodef_add_admin_field(
			array(
				'parent'        => $top_bar_container,
				'type'          => 'select',
				'name'          => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label'         => esc_html__( 'Choose top bar layout', 'moments' ),
				'description'   => esc_html__( 'Select the layout for top bar', 'moments' ),
				'options'       => array(
					'two-columns'   => esc_html__( 'Two columns', 'moments' ),
					'three-columns' => esc_html__( 'Three columns', 'moments' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"two-columns"   => "#qodef_top_bar_layout_container",
						"three-columns" => ""
					),
					"show"       => array(
						"two-columns"   => "",
						"three-columns" => "#qodef_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = moments_qodef_add_admin_container( array(
			'name'            => 'top_bar_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array( "two-columns" ),
		) );

		moments_qodef_add_admin_field(
			array(
				'parent'        => $top_bar_layout_container,
				'type'          => 'select',
				'name'          => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label'         => esc_html__( 'Choose column widths', 'moments' ),
				'description'   => '',
				'options'       => array(
					'30-30-30' => esc_html__( '33% - 33% - 33%', 'moments' ),
					'25-50-25' => esc_html__( '25% - 50% - 25%', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in grid', 'moments' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'moments' ),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = moments_qodef_add_admin_container( array(
			'name'            => 'top_bar_in_grid_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value'    => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'top_bar_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__( 'Grid Background Color', 'moments' ),
			'description' => esc_html__( 'Set grid background color for top bar', 'moments' ),
			'parent'      => $top_bar_in_grid_container
		) );


		moments_qodef_add_admin_field( array(
			'name'        => 'top_bar_grid_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Grid Background Transparency', 'moments' ),
			'description' => esc_html__( 'Set grid background transparency for top bar', 'moments' ),
			'parent'      => $top_bar_in_grid_container,
			'args'        => array( 'col_width' => 3 )
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'top_bar_background_color',
			'type'        => 'color',
			'label'       => esc_html__( 'Background Color', 'moments' ),
			'description' => esc_html__( 'Set background color for top bar', 'moments' ),
			'parent'      => $top_bar_layout_container
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'top_bar_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Background Transparency', 'moments' ),
			'description' => esc_html__( 'Set background transparency for top bar', 'moments' ),
			'parent'      => $top_bar_container,
			'args'        => array( 'col_width' => 3 )
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'top_bar_height',
			'type'        => 'text',
			'label'       => esc_html__( 'Top bar height', 'moments' ),
			'description' => esc_html__( 'Enter top bar height (Default is 40px)', 'moments' ),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		) );

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'moments' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'moments' ),
				'options'       => array(
					''             => '',
					'light-header' => esc_html__( 'Light', 'moments' ),
					'dark-header'  => esc_html__( 'Dark', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'yesno',
				'name'          => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Header Style on Scroll', 'moments' ),
				'description'   => esc_html__( 'Enabling this option, header will change style depending on row settings for dark/light style', 'moments' ),
			)
		);


		$panel_header_standard = moments_qodef_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_standard',
				'title'           => esc_html__( 'Header Standard', 'moments' ),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical',
					'header-centered'
				)
			)
		);

		moments_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name'   => 'menu_area_title',
				'title'  => esc_html__( 'Menu Area', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Header in grid', 'moments' ),
				'description'   => esc_html__( 'Set header content to be in grid', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_header_standard,
				'name'            => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background color', 'moments' ),
				'description'   => esc_html__( 'Set grid background color for header area', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label'         => esc_html__( 'Grid background transparency', 'moments' ),
				'description'   => esc_html__( 'Set grid background transparency for header', 'moments' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__( 'Background color', 'moments' ),
				'description'   => esc_html__( 'Set background color for header', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label'         => esc_html__( 'Background transparency', 'moments' ),
				'description'   => esc_html__( 'Set background transparency for header', 'moments' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_standard',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'moments' ),
				'description'   => esc_html__( 'Enter header height (default is 60px)', 'moments' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);


		$panel_header_centered = moments_qodef_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_centered',
				'title'           => esc_html__( 'Header Centered', 'moments' ),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical'
				)
			)
		);

		moments_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_centered,
				'name'   => 'menu_area_title',
				'title'  => esc_html__( 'Menu Area', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_centered',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Header in grid', 'moments' ),
				'description'   => esc_html__( 'Set header content to be in grid', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_area_in_grid_header_centered_container'
				)
			)
		);

		$menu_area_in_grid_header_centered_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_header_centered,
				'name'            => 'menu_area_in_grid_header_centered_container',
				'hidden_property' => 'menu_area_in_grid_header_centered',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_centered_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background color', 'moments' ),
				'description'   => esc_html__( 'Set grid background color for header area', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_centered_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__( 'Grid background transparency', 'moments' ),
				'description'   => esc_html__( 'Set grid background transparency for header', 'moments' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_centered',
				'default_value' => '',
				'label'         => esc_html__( 'Background color', 'moments' ),
				'description'   => esc_html__( 'Set background color for header', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_centered',
				'default_value' => '',
				'label'         => esc_html__( 'Background transparency', 'moments' ),
				'description'   => esc_html__( 'Set background transparency for header', 'moments' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_header_centered,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_centered',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'moments' ),
				'description'   => esc_html__( 'Enter header height (default is 60px)', 'moments' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);


		$panel_header_vertical = moments_qodef_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_vertical',
				'title'           => esc_html__( 'Header Vertical', 'moments' ),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-standard',
					'header-centered'
				)
			)
		);

		moments_qodef_add_admin_field( array(
			'name'        => 'vertical_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__( 'Background Color', 'moments' ),
			'description' => esc_html__( 'Set background color for vertical menu', 'moments' ),
			'parent'      => $panel_header_vertical
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'vertical_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Transparency', 'moments' ),
			'description' => esc_html__( 'Enter transparency for vertical menu (value from 0 to 1)', 'moments' ),
			'parent'      => $panel_header_vertical,
			'args'        => array(
				'col_width' => 1
			)
		) );

		moments_qodef_add_admin_field(
			array(
				'name'          => 'vertical_header_background_image',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'moments' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'moments' ),
				'parent'        => $panel_header_vertical
			)
		);

		$panel_sticky_header = moments_qodef_add_admin_panel(
			array(
				'title'           => esc_html__( 'Sticky Header', 'moments' ),
				'name'            => 'panel_sticky_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values'   => array(
					'fixed-on-scroll'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'scroll_amount_for_sticky',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky', 'moments' ),
				'description' => esc_html__( 'Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'moments' ),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'sticky_header_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Sticky Header in grid', 'moments' ),
				'description'   => esc_html__( 'Set sticky header content to be in grid', 'moments' ),
				'parent'        => $panel_sticky_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = moments_qodef_add_admin_container( array(
			'name'            => 'sticky_header_in_grid_container',
			'parent'          => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value'    => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_header_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__( 'Grid Background Color', 'moments' ),
			'description' => esc_html__( 'Set grid background color for sticky header', 'moments' ),
			'parent'      => $sticky_header_in_grid_container
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_header_grid_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Sticky Header Grid Transparency', 'moments' ),
			'description' => esc_html__( 'Enter transparency for sticky header grid (value from 0 to 1)', 'moments' ),
			'parent'      => $sticky_header_in_grid_container,
			'args'        => array(
				'col_width' => 1
			)
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__( 'Background Color', 'moments' ),
			'description' => esc_html__( 'Set background color for sticky header', 'moments' ),
			'parent'      => $panel_sticky_header
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Sticky Header Transparency', 'moments' ),
			'description' => esc_html__( 'Enter transparency for sticky header (value from 0 to 1)', 'moments' ),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 1
			)
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_header_height',
			'type'        => 'text',
			'label'       => esc_html__( 'Sticky Header Height', 'moments' ),
			'description' => esc_html__( 'Enter height for sticky header (default is 60px)', 'moments' ),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		) );

		$group_sticky_header_menu = moments_qodef_add_admin_group( array(
			'title'       => esc_html__( 'Sticky Header Menu', 'moments' ),
			'name'        => 'group_sticky_header_menu',
			'parent'      => $panel_sticky_header,
			'description' => esc_html__( 'Define styles for sticky menu items', 'moments' ),
		) );

		$row1_sticky_header_menu = moments_qodef_add_admin_row( array(
			'name'   => 'row1',
			'parent' => $group_sticky_header_menu
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__( 'Text Color', 'moments' ),
			'description' => '',
			'parent'      => $row1_sticky_header_menu
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'sticky_hovercolor',
			'type'        => 'colorsimple',
			'label'       => esc_html__( 'Hover/Active color', 'moments' ),
			'description' => '',
			'parent'      => $row1_sticky_header_menu
		) );

		$row2_sticky_header_menu = moments_qodef_add_admin_row( array(
			'name'   => 'row2',
			'parent' => $group_sticky_header_menu
		) );

		moments_qodef_add_admin_field(
			array(
				'name'          => 'sticky_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'default_value' => '-1',
				'parent'        => $row2_sticky_header_menu,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_fontsize',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_lineheight',
				'label'         => esc_html__( 'Line height', 'moments' ),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_texttransform',
				'label'         => esc_html__( 'Text transform', 'moments' ),
				'default_value' => '',
				'options'       => moments_qodef_get_text_transform_array(),
				'parent'        => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = moments_qodef_add_admin_row( array(
			'name'   => 'row3',
			'parent' => $group_sticky_header_menu
		) );

		moments_qodef_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontstyle',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontweight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_letterspacing',
				'label'         => esc_html__( 'Letter Spacing', 'moments' ),
				'default_value' => '',
				'parent'        => $row3_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = moments_qodef_add_admin_panel(
			array(
				'title'           => esc_html__( 'Fixed Header', 'moments' ),
				'name'            => 'panel_fixed_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values'   => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
			)
		);

		moments_qodef_add_admin_field( array(
			'name'          => 'fixed_header_grid_background_color',
			'type'          => 'color',
			'default_value' => '',
			'label'         => esc_html__( 'Grid Background Color', 'moments' ),
			'description'   => esc_html__( 'Set grid background color for fixed header', 'moments' ),
			'parent'        => $panel_fixed_header
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'fixed_header_grid_transparency',
			'type'          => 'text',
			'default_value' => '',
			'label'         => esc_html__( 'Header Transparency Grid', 'moments' ),
			'description'   => esc_html__( 'Enter transparency for fixed header grid (value from 0 to 1)', 'moments' ),
			'parent'        => $panel_fixed_header,
			'args'          => array(
				'col_width' => 1
			)
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'fixed_header_background_color',
			'type'          => 'color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' ),
			'description'   => esc_html__( 'Set background color for fixed header', 'moments' ),
			'parent'        => $panel_fixed_header
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'fixed_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__( 'Header Transparency', 'moments' ),
			'description' => esc_html__( 'Enter transparency for fixed header (value from 0 to 1)', 'moments' ),
			'parent'      => $panel_fixed_header,
			'args'        => array(
				'col_width' => 1
			)
		) );


		$panel_main_menu = moments_qodef_add_admin_panel(
			array(
				'title'           => esc_html__( 'Main Menu', 'moments' ),
				'name'            => 'panel_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array( 'header-vertical' )
			)
		);

		moments_qodef_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__( 'Main Menu General Settings', 'moments' )
			)
		);


		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_item_icon_position',
				'default_value' => 'left',
				'label'         => esc_html__( 'Icon Position in 1st Level Menu', 'moments' ),
				'description'   => esc_html__( 'Choose position of icon selected in Appearance->Menu->Menu Structure', 'moments' ),
				'options'       => array(
					'left' => esc_html__( 'Left', 'moments' ),
					'top'  => esc_html__( 'Top', 'moments' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'left' => '#qodef_menu_item_icon_position_container'
					),
					'show'       => array(
						'top' => '#qodef_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value'    => 'left'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_icon_position_container,
				'type'          => 'text',
				'name'          => 'menu_item_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'moments' ),
				'description'   => esc_html__( 'Choose position of icon selected in Appearance->Menu->Menu Structure', 'moments' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_item_style',
				'default_value' => 'small_item',
				'label'         => esc_html__( 'Item Height in 1st Level Menu', 'moments' ),
				'description'   => esc_html__( 'Choose menu item height', 'moments' ),
				'options'       => array(
					'small_item' => esc_html__( 'Small', 'moments' ),
					'large_item' => esc_html__( 'Big', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_manu_item_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable 1st Level Menu Item Borders', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display border around menu items', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_item_border_container'
				)
			)
		);

		$menu_item_border_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'menu_item_border_container',
				'hidden_property' => 'enable_manu_item_border',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_border_container,
				'type'          => 'select',
				'name'          => 'menu_item_border_style',
				'default_value' => '',
				'label'         => esc_html__( 'Menu Item Border', 'moments' ),
				'description'   => esc_html__( 'Visible only if border width and one of the border color fields are filled.', 'moments' ),
				'options'       => array(
					'all_borders'          => esc_html__( 'All Borders', 'moments' ),
					'top_bottom_borders'   => esc_html__( 'Top/Bottom Borders', 'moments' ),
					'right_border'         => esc_html__( 'Right Border', 'moments' ),
					'bottom_border'        => esc_html__( 'Bottom Border', 'moments' ),
					'bottom_border_double' => esc_html__( 'Bottom Double Borders', 'moments' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'bottom_border_double' => '#qodef_menu_item_border_width_container'
					),
					'show'       => array(
						'all_borders'        => '#qodef_menu_item_border_width_container',
						'top_bottom_borders' => '#qodef_menu_item_border_width_container',
						'right_border'       => '#qodef_menu_item_border_width_container',
						'bottom_border'      => '#qodef_menu_item_border_width_container'
					)
				)
			)
		);

		$menu_item_border_width_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $menu_item_border_container,
				'name'            => 'menu_item_border_style',
				'hidden_property' => 'enable_manu_item_border',
				'hidden_value'    => 'bottom_border_double'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_border_width_container,
				'type'          => 'text',
				'name'          => 'menu_item_border_width',
				'default_value' => '',
				'label'         => esc_html__( 'Border Width', 'moments' ),
				'description'   => esc_html__( 'Enter border width', 'moments' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_border_width_container,
				'type'          => 'text',
				'name'          => 'menu_item_border_radius',
				'default_value' => '',
				'label'         => esc_html__( 'Border Radius', 'moments' ),
				'description'   => esc_html__( 'Enter border radius', 'moments' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_border_width_container,
				'type'          => 'select',
				'name'          => 'menu_item_border_style_style',
				'default_value' => 'solid',
				'label'         => esc_html__( 'Border Style', 'moments' ),
				'description'   => esc_html__( 'Choose border style', 'moments' ),
				'options'       => array(
					'solid'  => esc_html__( 'Solid', 'moments' ),
					'dotted' => esc_html__( 'Dotted', 'moments' ),
					'dashed' => esc_html__( 'Dashed', 'moments' )
				)
			)
		);

		$border_color_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $menu_item_border_container,
				'name'        => 'group_border_color',
				'title'       => esc_html__( 'Border Color', 'moments' ),
				'description' => esc_html__( 'Choose a color for border', 'moments' )
			)
		);

		$border_color_row = moments_qodef_add_admin_row(
			array(
				'parent' => $border_color_group,
				'name'   => 'border_color_row'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $border_color_row,
				'type'          => 'colorsimple',
				'name'          => 'menu_item_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $border_color_row,
				'type'          => 'colorsimple',
				'name'          => 'menu_item_hover_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Hover Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $border_color_row,
				'type'          => 'colorsimple',
				'name'          => 'menu_item_active_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Active Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_menu_item_separators',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable 1st Level Menu Item Separators', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display separators between menu items', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_item_separators_container'
				)
			)
		);

		$menu_item_separators_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'menu_item_separators_container',
				'hidden_property' => 'enable_menu_item_separators',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $menu_item_separators_container,
				'type'          => 'color',
				'name'          => 'menu_item_separators_color',
				'default_value' => '',
				'label'         => esc_html__( 'Separators Color', 'moments' ),
				'description'   => esc_html__( 'Enter separators color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_menu_item_text_decoration',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable 1st Level Menu Item Text Decoration', 'moments' ),
				'description'   => esc_html__( 'Enable this option and choose a text decoration for menu items in first level', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_item_text_decoration_container'
				)
			)
		);

		$menu_item_text_decoration_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'menu_item_text_decoration_container',
				'hidden_property' => 'enable_menu_item_text_decoration',
				'hidden_value'    => 'no'
			)
		);

		$text_decoration_group = moments_qodef_add_admin_group(
			array(
				'parent' => $menu_item_text_decoration_container,
				'name'   => 'group_text_decoration',
				'title'  => esc_html__( 'Menu Item Text Decoration', 'moments' ),
			)
		);

		$text_decoration_row = moments_qodef_add_admin_row(
			array(
				'parent' => $text_decoration_group,
				'name'   => 'text_decoration_row',
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $text_decoration_row,
				'type'          => 'selectsimple',
				'name'          => 'menu_item_text_decoration_style',
				'default_value' => 'none',
				'label'         => esc_html__( 'Hover Item Text Decoration', 'moments' ),
				'description'   => esc_html__( 'Choose text decoration type for hover menu items', 'moments' ),
				'options'       => array(
					'none'         => esc_html__( 'None', 'moments' ),
					'underline'    => esc_html__( 'Underline', 'moments' ),
					'line-through' => esc_html__( 'Line-through', 'moments' ),
					'overline'     => esc_html__( 'Overline', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $text_decoration_row,
				'type'          => 'selectsimple',
				'name'          => 'menu_item_active_text_decoration_style',
				'default_value' => 'none',
				'label'         => esc_html__( 'Active Item Text Decoration', 'moments' ),
				'description'   => esc_html__( 'Choose text decoration type for active menu items', 'moments' ),
				'options'       => array(
					'none'         => esc_html__( 'None', 'moments' ),
					'underline'    => esc_html__( 'Underline', 'moments' ),
					'line-through' => esc_html__( 'Line-through', 'moments' ),
					'overline'     => esc_html__( 'Overline', 'moments' )
				)
			)
		);

		$drop_down_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_group',
				'title'       => esc_html__( 'Main Dropdown Menu', 'moments' ),
				'description' => esc_html__( 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'moments' )
			)
		);

		$drop_down_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'drop_down_row1',
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'textsimple',
				'name'          => 'dropdown_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Transparency', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_separator_color',
				'default_value' => '',
				'label'         => esc_html__( 'Item Bottom Separator Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_vertical_separator_color',
				'default_value' => '',
				'label'         => esc_html__( 'Item Vertical Separator Color', 'moments' ),
			)
		);

		$drop_down_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'drop_down_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_row2,
				'type'          => 'yesnosimple',
				'name'          => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label'         => esc_html__( 'Item Separator Full Width', 'moments' ),
			)
		);

		$drop_down_padding_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_padding_group',
				'title'       => esc_html__( 'Main Dropdown Menu Padding', 'moments' ),
				'description' => esc_html__( 'Choose a top/bottom padding for dropdown menu', 'moments' )
			)
		);

		$drop_down_padding_row = moments_qodef_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name'   => 'drop_down_padding_row',
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_padding_row,
				'type'          => 'textsimple',
				'name'          => 'dropdown_top_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Top Padding', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $drop_down_padding_row,
				'type'          => 'textsimple',
				'name'          => 'dropdown_bottom_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Bottom Padding', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label'         => esc_html__( 'Main Dropdown Menu Appearance', 'moments' ),
				'description'   => esc_html__( 'Choose appearance for dropdown menu', 'moments' ),
				'options'       => array(
					'dropdown-default'           => esc_html__( 'Default', 'moments' ),
					'dropdown-slide-from-bottom' => esc_html__( 'Slide From Bottom', 'moments' ),
					'dropdown-slide-from-top'    => esc_html__( 'Slide From Top', 'moments' ),
					'dropdown-animate-height'    => esc_html__( 'Animate Height', 'moments' ),
					'dropdown-slide-from-left'   => esc_html__( 'Slide From Left', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'text',
				'name'          => 'dropdown_top_position',
				'default_value' => '',
				'label'         => esc_html__( 'Dropdown position', 'moments' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'moments' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_dropdown_menu_item_icon',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Arrow Icon for Dropdown Menu', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display an arrow icon for 1st level menu items which have a dropdown menu', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_dropdown_top_separator',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Dropdown Top Separator', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display top separator for second level in dropdown menu', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_enable_dropdown_top_separator_container'
				)
			)
		);

		$enable_dropdown_top_separator_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'enable_dropdown_top_separator_container',
				'hidden_property' => 'enable_dropdown_top_separator',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $enable_dropdown_top_separator_container,
				'type'          => 'color',
				'name'          => 'dropdown_top_separator_color',
				'default_value' => '',
				'label'         => esc_html__( 'Dropdown Top Separator Color', 'moments' ),
				'description'   => esc_html__( 'Choose color for top separator', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'dropdown_border_around',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Dropdown Menu Border', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display border around dropdown menu', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_dropdown_border_around_container'
				)
			)
		);

		$enable_dropdown_top_separator_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_main_menu,
				'name'            => 'dropdown_border_around_container',
				'hidden_property' => 'dropdown_border_around',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $enable_dropdown_top_separator_container,
				'type'          => 'color',
				'name'          => 'dropdown_border_around_color',
				'default_value' => '',
				'label'         => esc_html__( 'Dropdown Border Color', 'moments' ),
				'description'   => esc_html__( 'Choose a color for border around dropdown menu', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'yesno',
				'name'          => 'enable_wide_manu_background',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Full Width Background for Wide Dropdown Type', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will show full width background  for wide dropdown type', 'moments' ),
			)
		);

		$first_level_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'moments' ),
				'description' => esc_html__( 'Define styles for 1st level in Top Navigation Menu', 'moments' )
			)
		);

		$first_level_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Color', 'moments' ),
			)
		);

		$first_level_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_text_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Background Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_hover_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Background Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'colorsimple',
				'name'          => 'menu_active_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Background Color', 'moments' ),
			)
		);

		$first_level_row3 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Light Menu Hover Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Light Menu Active Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Light Menu Border Hover/Active Color', 'moments' ),
			)
		);

		$first_level_row4 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row4',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Dark Menu Hover Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Dark Menu Active Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Dark Menu Border Hover/Active Color', 'moments' ),
			)
		);

		$first_level_row5 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row5',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'fontsimple',
				'name'          => 'menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_fontsize',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Background Color Transparency', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Active Background Color Transparency', 'moments' ),
			)
		);

		$first_level_row6 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row6',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontstyle',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontweight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'textsimple',
				'name'          => 'menu_letterspacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_texttransform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		$first_level_row7 = moments_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row7',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_lineheight',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_padding_left_right',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Left/Right', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_margin_left_right',
				'default_value' => '',
				'label'         => esc_html__( 'Margin Left/Right', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_group',
				'title'       => esc_html__( '2nd Level Menu', 'moments' ),
				'description' => esc_html__( 'Define styles for 2nd level in Top Navigation Menu', 'moments' )
			)
		);

		$second_level_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Background Color', 'moments' )
			)
		);

		$second_level_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Top/Bottom', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle',
				'default_value' => '',
				'label'         => esc_html__( 'Font style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight',
				'default_value' => '',
				'label'         => esc_html__( 'Font weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		$second_level_wide_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_wide_group',
				'title'       => esc_html__( '2nd Level Wide Menu', 'moments' ),
				'description' => esc_html__( 'Define styles for 2nd level in Wide Menu', 'moments' )
			)
		);

		$second_level_wide_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row1'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Background Color', 'moments' )
			)
		);

		$second_level_wide_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Top/Bottom', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = moments_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row3',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label'         => esc_html__( 'Font style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label'         => esc_html__( 'Font weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		$third_level_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_group',
				'title'       => esc_html__( '3nd Level Menu', 'moments' ),
				'description' => esc_html__( 'Define styles for 3nd level in Top Navigation Menu', 'moments' )
			)
		);

		$third_level_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row1'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Background Color', 'moments' )
			)
		);

		$third_level_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row3',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Letter spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_wide_group',
				'title'       => esc_html__( '3rd Level Wide Menu', 'moments' ),
				'description' => esc_html__( 'Define styles for 3rd level in Wide Menu', 'moments' )
			)
		);

		$third_level_wide_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row1'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Background Color', 'moments' )
			)
		);

		$third_level_wide_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = moments_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row3',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Letter spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		$panel_vertical_main_menu = moments_qodef_add_admin_panel(
			array(
				'title'           => esc_html__( 'Vertical Main Menu', 'moments' ),
				'name'            => 'panel_vertical_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array( 'header-standard', 'header-centered' )
			)
		);

		$drop_down_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $panel_vertical_main_menu,
				'name'        => 'vertical_drop_down_group',
				'title'       => esc_html__( 'Main Dropdown Menu', 'moments' ),
				'description' => esc_html__( 'Set a style for dropdown menu', 'moments' )
			)
		);

		$vertical_drop_down_row1 = moments_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'qodef_drop_down_row1',
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $vertical_drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'vertical_dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'moments' ),
			)
		);

		$group_vertical_first_level = moments_qodef_add_admin_group( array(
			'name'        => 'group_vertical_first_level',
			'title'       => esc_html__( '1st level', 'moments' ),
			'description' => esc_html__( 'Define styles for 1st level menu', 'moments' ),
			'parent'      => $panel_vertical_main_menu
		) );

		$row_vertical_first_level_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_first_level_1',
			'parent' => $group_vertical_first_level
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_vertical_first_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Hover/Active Color', 'moments' ),
			'parent'        => $row_vertical_first_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_1
		) );

		$row_vertical_first_level_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_first_level_2',
			'parent' => $group_vertical_first_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_vertical_first_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_1st_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_vertical_first_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_vertical_first_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_vertical_first_level_2
		) );

		$row_vertical_first_level_3 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_first_level_3',
			'parent' => $group_vertical_first_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_3
		) );

		$group_vertical_second_level = moments_qodef_add_admin_group( array(
			'name'        => 'group_vertical_second_level',
			'title'       => esc_html__( '2nd level', 'moments' ),
			'description' => esc_html__( 'Define styles for 2nd level menu', 'moments' ),
			'parent'      => $panel_vertical_main_menu
		) );

		$row_vertical_second_level_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_second_level_1',
			'parent' => $group_vertical_second_level
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_vertical_second_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Hover/Active Color', 'moments' ),
			'parent'        => $row_vertical_second_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_1
		) );

		$row_vertical_second_level_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_second_level_2',
			'parent' => $group_vertical_second_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_vertical_second_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_2nd_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_vertical_second_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_vertical_second_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_vertical_second_level_2
		) );

		$row_vertical_second_level_3 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_second_level_3',
			'parent' => $group_vertical_second_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_3
		) );

		$group_vertical_third_level = moments_qodef_add_admin_group( array(
			'name'        => 'group_vertical_third_level',
			'title'       => esc_html__( '3rd level', 'moments' ),
			'description' => esc_html__( 'Define styles for 3rd level menu', 'moments' ),
			'parent'      => $panel_vertical_main_menu
		) );

		$row_vertical_third_level_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_third_level_1',
			'parent' => $group_vertical_third_level
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_vertical_third_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Hover/Active Color', 'moments' ),
			'parent'        => $row_vertical_third_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_1
		) );

		$row_vertical_third_level_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_third_level_2',
			'parent' => $group_vertical_third_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_vertical_third_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_3rd_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_vertical_third_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_vertical_third_level_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_vertical_third_level_2
		) );

		$row_vertical_third_level_3 = moments_qodef_add_admin_row( array(
			'name'   => 'row_vertical_third_level_3',
			'parent' => $group_vertical_third_level,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_3
		) );
	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_header_options_map', 3 );

}