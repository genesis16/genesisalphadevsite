<?php

if ( ! function_exists('moments_qodef_mobile_header_options_map') ) {

	function moments_qodef_mobile_header_options_map() {

		moments_qodef_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => 'Mobile Header',
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = moments_qodef_add_admin_panel(array(
			'title' => 'Mobile header',
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => 'Mobile Header Height',
			'description' => esc_html__( 'Enter height for mobile header in pixels', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Header Background Color',
			'description' => esc_html__( 'Choose color for mobile header', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => 'Mobile Menu Background Color',
			'description' => esc_html__( 'Choose color for mobile menu', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => 'Mobile Menu Item Separator Color',
			'description' => esc_html__( 'Choose color for mobile menu horizontal separators', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Header',
			'description' => esc_html__( 'Define logo height for screen size smaller than 1000px', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => 'Logo Height For Mobile Devices',
			'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		moments_qodef_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => 'Typography'
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => 'Navigation Text Color',
			'description' => esc_html__( 'Define color for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => 'Navigation Hover/Active Color',
			'description' => esc_html__( 'Define hover/active color for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => 'Navigation Font Family',
			'description' => esc_html__( 'Define font family for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => 'Navigation Font Size',
			'description' => esc_html__( 'Define font size for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => 'Navigation Line Height',
			'description' => esc_html__( 'Define line height for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => 'Navigation Text Transform',
			'description' => esc_html__( 'Define text transform for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header,
			'options'     => moments_qodef_get_text_transform_array(true)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => 'Navigation Font Style',
			'description' => esc_html__( 'Define font style for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header,
			'options'     => moments_qodef_get_font_style_array(true)
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => 'Navigation Font Weight',
			'description' => esc_html__( 'Define font weight for mobile navigation text', 'moments' ),
			'parent'      => $panel_mobile_header,
			'options'     => moments_qodef_get_font_weight_array(true)
		));

		moments_qodef_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => 'Mobile Menu Opener'
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => 'Mobile Navigation Icon Pack',
			'default_value' => 'font_awesome',
			'description' => esc_html__( 'Choose icon pack for mobile navigation icon', 'moments' ),
			'parent'      => $panel_mobile_header,
			'options'     => moments_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Color',
			'description' => esc_html__( 'Choose color for icon header', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => 'Mobile Navigation Icon Hover Color',
			'description' => esc_html__( 'Choose hover color for mobile navigation icon ', 'moments' ),
			'parent'      => $panel_mobile_header
		));

		moments_qodef_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => 'Mobile Navigation Icon size',
			'description' => esc_html__( 'Choose size for mobile navigation icon ', 'moments' ),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_mobile_header_options_map', 4);

}