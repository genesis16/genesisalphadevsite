<?php

if ( ! function_exists( 'moments_qodef_tabs_map' ) ) {
	function moments_qodef_tabs_map() {

		$panel = moments_qodef_add_admin_panel( array(
			'title' => esc_html__( 'Tabs', 'select-core' ),
			'name'  => 'panel_tabs',
			'page'  => '_elements_page'
		) );

		//Typography options
		moments_qodef_add_admin_section_title( array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__( 'Tabs Navigation Typography', 'select-core' ),
			'parent' => $panel
		) );

		$typography_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_group',
			'title'       => esc_html__( 'Tabs Navigation Typography', 'select-core' ),
			'description' => esc_html__( 'Setup typography for tabs navigation', 'select-core' ),
			'parent'      => $panel
		) );

		$typography_row = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'fontsimple',
			'name'          => 'tabs_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'select-core' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'select-core' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'select-core' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'tabs_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'select-core' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		$typography_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row2',
			'next'   => true,
			'parent' => $typography_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'tabs_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'select-core' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'textsimple',
			'name'          => 'tabs_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'select-core' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		//Tab Color Styles

		moments_qodef_add_admin_section_title( array(
			'name'   => 'tab_color_section_title',
			'title'  => esc_html__( 'Tab Navigation Color Styles', 'select-core' ),
			'parent' => $panel
		) );
		$tabs_color_group = moments_qodef_add_admin_group( array(
			'name'        => 'tabs_color_group',
			'title'       => esc_html__( 'Tab Navigation Color Styles', 'select-core' ),
			'description' => esc_html__( 'Set color styles for tab navigation', 'select-core' ),
			'parent'      => $panel
		) );
		$tabs_color_row   = moments_qodef_add_admin_row( array(
			'name'   => 'tabs_color_row',
			'next'   => true,
			'parent' => $tabs_color_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color',
			'default_value' => '',
			'label'         => esc_html__( 'Color', 'select-core' )
		) );
		moments_qodef_add_admin_field( array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color_active',
			'default_value' => '',
			'label'         => esc_html__( 'Hover / Active Color', 'select-core' )
		) );

	}

	add_action( 'moments_qodef_options_elements_map', 'moments_qodef_tabs_map' );
}