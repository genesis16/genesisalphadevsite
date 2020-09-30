<?php

if ( ! function_exists( 'moments_qodef_title_options_map' ) ) {

	function moments_qodef_title_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_title_page',
				'title' => esc_html__( 'Title', 'moments' ),
				'icon'  => 'fa fa-list-alt'
			)
		);

		$panel_title = moments_qodef_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title',
				'title' => esc_html__( 'Title Settings', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Title Area', 'moments' ),
				'description'   => esc_html__( 'This option will enable/disable Title Area', 'moments' ),
				'parent'        => $panel_title,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_show_title_area_container"
				)
			)
		);

		$show_title_area_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_title,
				'name'            => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Title Area Type', 'moments' ),
				'description'   => esc_html__( 'Choose title type', 'moments' ),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'standard'   => esc_html__( 'Standard', 'moments' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'moments' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"breadcrumb" => "#qodef_title_area_type_container"
					),
					"show"       => array(
						"standard"   => "#qodef_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value'    => '',
				'hidden_values'   => array( 'breadcrumb' ),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_enable_breadcrumbs',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Breadcrumbs', 'moments' ),
				'description'   => esc_html__( 'This option will display Breadcrumbs in Title Area', 'moments' ),
				'parent'        => $title_area_type_container,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_animation',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__( 'Animations', 'moments' ),
				'description'   => esc_html__( 'Choose an animation for Title Area', 'moments' ),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'no'         => esc_html__( 'No Animation', 'moments' ),
					'right-left' => esc_html__( 'Text right to left', 'moments' ),
					'left-right' => esc_html__( 'Text left to right', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_vertial_alignment',
				'type'          => 'select',
				'default_value' => 'header_bottom',
				'label'         => esc_html__( 'Vertical Alignment', 'moments' ),
				'description'   => esc_html__( 'Specify title vertical alignment', 'moments' ),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'header_bottom' => esc_html__( 'From Bottom of Header', 'moments' ),
					'window_top'    => esc_html__( 'From Window Top', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_content_alignment',
				'type'          => 'select',
				'default_value' => 'left',
				'label'         => esc_html__( 'Horizontal Alignment', 'moments' ),
				'description'   => esc_html__( 'Specify title horizontal alignment', 'moments' ),
				'parent'        => $show_title_area_container,
				'options'       => array(
					'left'   => esc_html__( 'Left', 'moments' ),
					'center' => esc_html__( 'Center', 'moments' ),
					'right'  => esc_html__( 'Right', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'title_area_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'moments' ),
				'description' => esc_html__( 'Choose a background color for Title Area', 'moments' ),
				'parent'      => $show_title_area_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'title_area_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'moments' ),
				'description' => esc_html__( 'Choose an Image for Title Area', 'moments' ),
				'parent'      => $show_title_area_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_background_image_responsive',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Background Responsive Image', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image responsive', 'moments' ),
				'parent'        => $show_title_area_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#qodef_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $show_title_area_container,
				'name'            => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value'    => 'yes'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'title_area_background_image_parallax',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__( 'Background Image in Parallax', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image parallax', 'moments' ),
				'parent'        => $title_area_background_image_responsive_container,
				'options'       => array(
					'no'       => esc_html__( 'No', 'moments' ),
					'yes'      => esc_html__( 'Yes', 'moments' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field( array(
			'name'        => 'title_area_height',
			'type'        => 'text',
			'label'       => esc_html__( 'Height', 'moments' ),
			'description' => esc_html__( 'Set a height for Title Area', 'moments' ),
			'parent'      => $title_area_background_image_responsive_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		) );


		$panel_typography = moments_qodef_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'moments' )
			)
		);

		$group_page_title_styles = moments_qodef_add_admin_group( array(
			'name'        => 'group_page_title_styles',
			'title'       => esc_html__( 'Title', 'moments' ),
			'description' => esc_html__( 'Define styles for page title', 'moments' ),
			'parent'      => $panel_typography
		) );

		$row_page_title_styles_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_title_styles_1',
			'parent' => $group_page_title_styles
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'page_title_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_page_title_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_title_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_title_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_page_title_styles_1
		) );

		$row_page_title_styles_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_title_styles_2',
			'parent' => $group_page_title_styles,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'page_title_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_page_title_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_page_title_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_title_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_page_title_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_title_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_title_styles_2
		) );

		$group_page_subtitle_styles = moments_qodef_add_admin_group( array(
			'name'        => 'group_page_subtitle_styles',
			'title'       => esc_html__( 'Subtitle', 'moments' ),
			'description' => esc_html__( 'Define styles for page subtitle', 'moments' ),
			'parent'      => $panel_typography
		) );

		$row_page_subtitle_styles_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_subtitle_styles_1',
			'parent' => $group_page_subtitle_styles
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'page_subtitle_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_page_subtitle_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_page_subtitle_styles_1
		) );

		$row_page_subtitle_styles_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_subtitle_styles_2',
			'parent' => $group_page_subtitle_styles,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'page_subtitle_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_page_subtitle_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_page_subtitle_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_subtitle_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_page_subtitle_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_subtitle_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_subtitle_styles_2
		) );

		$group_page_breadcrumbs_styles = moments_qodef_add_admin_group( array(
			'name'        => 'group_page_breadcrumbs_styles',
			'title'       => esc_html__( 'Breadcrumbs', 'moments' ),
			'description' => esc_html__( 'Define styles for page breadcrumbs', 'moments' ),
			'parent'      => $panel_typography
		) );

		$row_page_breadcrumbs_styles_1 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_breadcrumbs_styles_1',
			'parent' => $group_page_breadcrumbs_styles
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
			'parent'        => $row_page_breadcrumbs_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_fontsize',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_lineheight',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_1
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_texttransform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array(),
			'parent'        => $row_page_breadcrumbs_styles_1
		) );

		$row_page_breadcrumbs_styles_2 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_breadcrumbs_styles_2',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'fontsimple',
			'name'          => 'page_breadcrumb_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__( 'Font Family', 'moments' ),
			'parent'        => $row_page_breadcrumbs_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontstyle',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'selectblanksimple',
			'name'          => 'page_breadcrumb_fontweight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array(),
			'parent'        => $row_page_breadcrumbs_styles_2
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'textsimple',
			'name'          => 'page_breadcrumb_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_page_breadcrumbs_styles_2
		) );

		$row_page_breadcrumbs_styles_3 = moments_qodef_add_admin_row( array(
			'name'   => 'row_page_breadcrumbs_styles_3',
			'parent' => $group_page_breadcrumbs_styles,
			'next'   => true
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'colorsimple',
			'name'          => 'page_breadcrumb_hovercolor',
			'default_value' => '',
			'label'         => esc_html__( 'Hover/Active Color', 'moments' ),
			'parent'        => $row_page_breadcrumbs_styles_3
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_title_options_map', 6 );

}