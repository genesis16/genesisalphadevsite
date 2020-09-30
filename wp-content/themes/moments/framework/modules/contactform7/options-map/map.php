<?php

if ( ! function_exists( 'moments_qodef_contact_form_7_options_map' ) ) {

	function moments_qodef_contact_form_7_options_map() {

		moments_qodef_add_admin_page( array(
			'slug'  => '_contact_form7_page',
			'title' => esc_html__( 'Contact Form 7', 'moments' ),
			'icon'  => 'fa fa-envelope-o'
		) );

		$panel_contact_form_style_1 = moments_qodef_add_admin_panel( array(
			'page'  => '_contact_form7_page',
			'name'  => 'panel_contact_form_style_1',
			'title' => esc_html__( 'Custom Style 1', 'moments' )
		) );

		//Text Typography

		$typography_text_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_text_group',
			'title'       => esc_html__( 'Form Text Typography', 'moments' ),
			'description' => esc_html__( 'Setup typography for form elements text', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$typography_text_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row1',
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_text_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_focus_text_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_text_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_text_line_height',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		$typography_text_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row2',
			'next'   => true,
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_1_text_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_text_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_text_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_text_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		$typography_text_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row3',
			'next'   => true,
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_text_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Labels Typography

		$typography_label_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_label_group',
			'title'       => esc_html__( 'Form Label Typography', 'moments' ),
			'description' => esc_html__( 'Setup typography for form elements label', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$typography_label_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_label_row1',
			'parent' => $typography_label_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_label_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_label_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_label_line_height',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_1_label_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		$typography_label_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_label_row2',
			'next'   => true,
			'parent' => $typography_label_group
		) );


		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_label_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_label_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_label_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_label_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Elements Background and Border

		$background_border_group = moments_qodef_add_admin_group( array(
			'name'        => 'background_border_group',
			'title'       => esc_html__( 'Form Elements Background and Border', 'moments' ),
			'description' => esc_html__( 'Setup form elements background and border style', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$background_border_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row1',
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_focus_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_focus_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Background Transparency', 'moments' )
		) );

		$background_border_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row2',
			'next'   => true,
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_focus_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_focus_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Border Transparency', 'moments' )
		) );

		$background_border_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row3',
			'next'   => true,
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_border_width',
			'default_value' => '',
			'label'         => esc_html__( 'Border Width', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_border_radius',
			'default_value' => '',
			'label'         => esc_html__( 'Border Radius', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Dropdown Styles

		$color_dropdown_group = moments_qodef_add_admin_group( array(
			'name'        => 'color_dropdown_group',
			'title'       => esc_html__( 'Form Dropdown Color', 'moments' ),
			'description' => esc_html__( 'Setup dropdown color style', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$color_dropdown_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row1',
			'parent' => $color_dropdown_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_dropdown_background_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_dropdown_background_hover_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Transparency', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_dropdown_arrow_color',
			'default_value' => '',
			'label'         => esc_html__( 'Arrow Color', 'moments' )
		) );


		// Form Elements Padding

		$padding_group = moments_qodef_add_admin_group( array(
			'name'        => 'padding_group',
			'title'       => esc_html__( 'Elements Padding', 'moments' ),
			'description' => esc_html__( 'Setup form elements padding', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$padding_row = moments_qodef_add_admin_row( array(
			'name'   => 'padding_row',
			'parent' => $padding_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_padding_top',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Top', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_padding_right',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Right', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Bottom', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_padding_left',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Left', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Elements Margin

		$margin_group = moments_qodef_add_admin_group( array(
			'name'        => 'margin_group',
			'title'       => esc_html__( 'Elements Margin', 'moments' ),
			'description' => esc_html__( 'Setup form elements margin', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$margin_row = moments_qodef_add_admin_row( array(
			'name'   => 'margin_row',
			'parent' => $margin_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $margin_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_margin_top',
			'default_value' => '',
			'label'         => esc_html__( 'Margin Top', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $margin_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_margin_bottom',
			'default_value' => '',
			'label'         => esc_html__( 'Margin Bottom', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Textarea

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_1,
			'type'          => 'text',
			'name'          => 'cf7_style_1_textarea_height',
			'default_value' => '',
			'label'         => esc_html__( 'Textarea Height', 'moments' ),
			'description'   => esc_html__( 'Enter height for textarea form element', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

		// Button Typography

		$button_typography_group = moments_qodef_add_admin_group( array(
			'name'        => 'button_typography_group',
			'title'       => esc_html__( 'Button Typography', 'moments' ),
			'description' => esc_html__( 'Setup button text typography', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$button_typography_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'button_typography_row1',
			'parent' => $button_typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_1_button_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' )
		) );

		$button_typography_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'button_typography_row2',
			'next'   => true,
			'parent' => $button_typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_button_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_button_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_1_button_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Button Background and Border

		$button_background_border_group = moments_qodef_add_admin_group( array(
			'name'        => 'button_background_border_group',
			'title'       => esc_html__( 'Button Background and Border', 'moments' ),
			'description' => esc_html__( 'Setup button background and border style', 'moments' ),
			'parent'      => $panel_contact_form_style_1
		) );

		$button_background_border_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row1',
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_hover_bckg_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_hover_bckg_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Transparency', 'moments' )
		) );

		$button_background_border_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row2',
			'next'   => true,
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_1_button_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_hover_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Hover Transparency', 'moments' )
		) );

		$button_background_border_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row3',
			'next'   => true,
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_border_width',
			'default_value' => '',
			'label'         => esc_html__( 'Border Width', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_1_button_border_radius',
			'default_value' => '',
			'label'         => esc_html__( 'Border Radius', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Button Height

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_1,
			'type'          => 'text',
			'name'          => 'cf7_style_1_button_height',
			'default_value' => '',
			'label'         => esc_html__( 'Button Height', 'moments' ),
			'description'   => esc_html__( 'Insert form button height', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

		// Button Padding

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_1,
			'type'          => 'text',
			'name'          => 'cf7_style_1_button_padding',
			'default_value' => '',
			'label'         => esc_html__( 'Button Left/Right Padding', 'moments' ),
			'description'   => esc_html__( 'Enter value for button left and right padding', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

		$panel_contact_form_style_2 = moments_qodef_add_admin_panel( array(
			'page'  => '_contact_form7_page',
			'name'  => 'panel_contact_form_style_2',
			'title' => esc_html__( 'Custom Style 2', 'moments' )
		) );

		//Text Typography

		$typography_text_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_text_group',
			'title'       => esc_html__( 'Form Text Typography', 'moments' ),
			'description' => esc_html__( 'Setup typography for form elements text', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$typography_text_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row1',
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_text_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_focus_text_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_text_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_text_line_height',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		$typography_text_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row2',
			'next'   => true,
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_2_text_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_text_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_text_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_text_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		$typography_text_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_text_row3',
			'next'   => true,
			'parent' => $typography_text_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_text_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_text_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Labels Typography

		$typography_label_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_label_group',
			'title'       => esc_html__( 'Form Label Typography', 'moments' ),
			'description' => esc_html__( 'Setup typography for form elements label', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$typography_label_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_label_row1',
			'parent' => $typography_label_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_label_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_label_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_label_line_height',
			'default_value' => '',
			'label'         => esc_html__( 'Line Height', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row1,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_2_label_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		$typography_label_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_label_row2',
			'next'   => true,
			'parent' => $typography_label_group
		) );


		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_label_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_label_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_label_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_label_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_label_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Elements Background and Border

		$background_border_group = moments_qodef_add_admin_group( array(
			'name'        => 'background_border_group',
			'title'       => esc_html__( 'Form Elements Background and Border', 'moments' ),
			'description' => esc_html__( 'Setup form elements background and border style', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$background_border_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row1',
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_focus_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_focus_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Background Transparency', 'moments' )
		) );

		$background_border_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row2',
			'next'   => true,
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_focus_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_focus_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Focus Border Transparency', 'moments' )
		) );

		$background_border_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row3',
			'next'   => true,
			'parent' => $background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_border_width',
			'default_value' => '',
			'label'         => esc_html__( 'Border Width', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_border_radius',
			'default_value' => '',
			'label'         => esc_html__( 'Border Radius', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Dropdown Styles

		$color_dropdown_group = moments_qodef_add_admin_group( array(
			'name'        => 'color_dropdown_group',
			'title'       => esc_html__( 'Form Dropdown Color', 'moments' ),
			'description' => esc_html__( 'Setup dropdown color style', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$color_dropdown_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'background_border_row1',
			'parent' => $color_dropdown_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_dropdown_background_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Color', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_dropdown_background_hover_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Transparency', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_dropdown_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_dropdown_arrow_color',
			'default_value' => '',
			'label'         => esc_html__( 'Arrow Color', 'moments' )
		) );

		// Form Elements Padding

		$padding_group = moments_qodef_add_admin_group( array(
			'name'        => 'padding_group',
			'title'       => esc_html__( 'Elements Padding', 'moments' ),
			'description' => esc_html__( 'Setup form elements padding', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$padding_row = moments_qodef_add_admin_row( array(
			'name'   => 'padding_row',
			'parent' => $padding_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_padding_top',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Top', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_padding_right',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Right', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_padding_bottom',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Bottom', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $padding_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_padding_left',
			'default_value' => '',
			'label'         => esc_html__( 'Padding Left', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Form Elements Margin

		$margin_group = moments_qodef_add_admin_group( array(
			'name'        => 'margin_group',
			'title'       => esc_html__( 'Elements Margin', 'moments' ),
			'description' => esc_html__( 'Setup form elements margin', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$margin_row = moments_qodef_add_admin_row( array(
			'name'   => 'margin_row',
			'parent' => $margin_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $margin_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_margin_top',
			'default_value' => '',
			'label'         => esc_html__( 'Margin Top', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $margin_row,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_margin_bottom',
			'default_value' => '',
			'label'         => esc_html__( 'Margin Bottom', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Textarea

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_2,
			'type'          => 'text',
			'name'          => 'cf7_style_2_textarea_height',
			'default_value' => '',
			'label'         => esc_html__( 'Textarea Height', 'moments' ),
			'description'   => esc_html__( 'Enter height for textarea form element', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

		// Button Typography

		$button_typography_group = moments_qodef_add_admin_group( array(
			'name'        => 'button_typography_group',
			'title'       => esc_html__( 'Button Typography', 'moments' ),
			'description' => esc_html__( 'Setup button text typography', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$button_typography_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'button_typography_row1',
			'parent' => $button_typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_hover_color',
			'default_value' => '',
			'label'         => esc_html__( 'Text Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row1,
			'type'          => 'fontsimple',
			'name'          => 'cf7_style_2_button_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' )
		) );

		$button_typography_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'button_typography_row2',
			'next'   => true,
			'parent' => $button_typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_button_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_button_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'cf7_style_2_button_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_typography_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Button Background and Border

		$button_background_border_group = moments_qodef_add_admin_group( array(
			'name'        => 'button_background_border_group',
			'title'       => esc_html__( 'Button Background and Border', 'moments' ),
			'description' => esc_html__( 'Setup button background and border style', 'moments' ),
			'parent'      => $panel_contact_form_style_2
		) );

		$button_background_border_row1 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row1',
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_background_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_hover_bckg_color',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row1,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_hover_bckg_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Background Hover Transparency', 'moments' )
		) );

		$button_background_border_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row2',
			'next'   => true,
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Transparency', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'colorsimple',
			'name'          => 'cf7_style_2_button_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__( 'Border Hover Color', 'moments' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row2,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_hover_border_transparency',
			'default_value' => '',
			'label'         => esc_html__( 'Border Hover Transparency', 'moments' )
		) );

		$button_background_border_row3 = moments_qodef_add_admin_row( array(
			'name'   => 'button_background_border_row3',
			'next'   => true,
			'parent' => $button_background_border_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_border_width',
			'default_value' => '',
			'label'         => esc_html__( 'Border Width', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $button_background_border_row3,
			'type'          => 'textsimple',
			'name'          => 'cf7_style_2_button_border_radius',
			'default_value' => '',
			'label'         => esc_html__( 'Border Radius', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		// Button Height

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_2,
			'type'          => 'text',
			'name'          => 'cf7_style_2_button_height',
			'default_value' => '',
			'label'         => esc_html__( 'Button Height', 'moments' ),
			'description'   => esc_html__( 'Insert form button height', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

		// Button Padding

		moments_qodef_add_admin_field( array(
			'parent'        => $panel_contact_form_style_2,
			'type'          => 'text',
			'name'          => 'cf7_style_2_button_padding',
			'default_value' => '',
			'label'         => esc_html__( 'Button Left/Right Padding', 'moments' ),
			'description'   => esc_html__( 'Enter value for button left and right padding', 'moments' ),
			'args'          => array(
				'col_width' => '3',
				'suffix'    => 'px'
			)
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_contact_form_7_options_map', 10 );

}