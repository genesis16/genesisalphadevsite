<?php

if ( ! function_exists( 'moments_qodef_search_options_map' ) ) {

	function moments_qodef_search_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'moments' ),
				'icon'  => 'fa fa-search'
			)
		);

		$search_panel = moments_qodef_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'moments' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_awesome',
				'label'         => esc_html__( 'Search Icon Pack', 'moments' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'moments' ),
				'options'       => moments_qodef_icon_collections()->getIconCollectionsExclude( array(
					'linea_icons',
					'simple_line_icons',
					'dripicons'
				) )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Search area in grid', 'moments' ),
				'description'   => esc_html__( 'Set search area to be in grid', 'moments' ),
			)
		);

		moments_qodef_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'moments' ),
				'description'   => esc_html__( 'Set size for icon', 'moments' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$search_icon_color_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'moments' ),
				'description' => esc_html__( 'Define color style for icon', 'moments' ),
				'name'        => 'search_icon_color_group'
			)
		);

		$search_icon_color_row = moments_qodef_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'moments' )
			)
		);
		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'moments' )
			)
		);
		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_light_search_icon_color',
				'label'  => esc_html__( 'Light Header Icon Color', 'moments' )
			)
		);
		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_light_search_icon_hover_color',
				'label'  => esc_html__( 'Light Header Icon Hover Color', 'moments' )
			)
		);

		$search_icon_color_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row2',
				'next'   => true
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'   => 'colorsimple',
				'name'   => 'header_dark_search_icon_color',
				'label'  => esc_html__( 'Dark Header Icon Color', 'moments' )
			)
		);
		moments_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'   => 'colorsimple',
				'name'   => 'header_dark_search_icon_hover_color',
				'label'  => esc_html__( 'Dark Header Icon Hover Color', 'moments' )
			)
		);


		$search_icon_spacing_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Spacing', 'moments' ),
				'description' => esc_html__( 'Define padding and margins for Search icon', 'moments' ),
				'name'        => 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = moments_qodef_add_admin_row(
			array(
				'parent' => $search_icon_spacing_group,
				'name'   => 'search_icon_spacing_row'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_padding_left',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Left', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_padding_right',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Right', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_margin_left',
				'default_value' => '',
				'label'         => esc_html__( 'Margin Left', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_icon_spacing_row,
				'type'          => 'textsimple',
				'name'          => 'search_margin_right',
				'default_value' => '',
				'label'         => esc_html__( 'Margin Right', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'search_form_title',
				'title'  => esc_html__( 'Search Bar', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'color',
				'name'          => 'search_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'moments' ),
				'description'   => esc_html__( 'Choose a background color for Select search bar', 'moments' )
			)
		);

		$search_input_text_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Search Input Text', 'moments' ),
				'description' => esc_html__( 'Define style for search text', 'moments' ),
				'name'        => 'search_input_text_group'
			)
		);

		$search_input_text_row = moments_qodef_add_admin_row(
			array(
				'parent' => $search_input_text_group,
				'name'   => 'search_input_text_row'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'colorsimple',
				'name'          => 'search_text_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_text_fontsize',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_texttransform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'moments' ),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		$search_input_text_row2 = moments_qodef_add_admin_row(
			array(
				'parent' => $search_input_text_group,
				'name'   => 'search_input_text_row2'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_fontstyle',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'moments' ),
				'options'       => moments_qodef_get_font_style_array(),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_text_fontweight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'moments' ),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_input_text_row2,
				'type'          => 'textsimple',
				'name'          => 'search_text_letterspacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'moments' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);


		$search_close_icon_group = moments_qodef_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Search Close', 'moments' ),
				'description' => esc_html__( 'Define style for search close icon', 'moments' ),
				'name'        => 'search_close_icon_group'
			)
		);

		$search_close_icon_row = moments_qodef_add_admin_row(
			array(
				'parent' => $search_close_icon_group,
				'name'   => 'search_icon_row'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_close_color',
				'label'         => esc_html__( 'Icon Color', 'moments' ),
				'default_value' => ''
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'colorsimple',
				'name'          => 'search_close_hover_color',
				'label'         => esc_html__( 'Icon Hover Color', 'moments' ),
				'default_value' => ''
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $search_close_icon_row,
				'type'          => 'textsimple',
				'name'          => 'search_close_size',
				'label'         => esc_html__( 'Icon Size', 'moments' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);


	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_search_options_map', 11 );

}