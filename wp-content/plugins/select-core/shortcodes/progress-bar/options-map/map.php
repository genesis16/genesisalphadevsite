<?php

if ( ! function_exists( 'moments_qodef_progress_bar_map' ) ) {
	function moments_qodef_progress_bar_map() {

		$panel = moments_qodef_add_admin_panel( array(
			'title' => esc_html__( 'Progress Bar', 'select-core' ),
			'name'  => 'panel_progress_bar',
			'page'  => '_elements_page'
		) );

		//Typography options
		moments_qodef_add_admin_section_title( array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__( 'Typography', 'select-core' ),
			'parent' => $panel
		) );

		$typography_group = moments_qodef_add_admin_group( array(
			'name'        => 'typography_group',
			'title'       => esc_html__( 'Typography', 'select-core' ),
			'description' => esc_html__( 'Setup typography for progress bar title', 'select-core' ),
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
			'name'          => 'progress_bar_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'select-core' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'progress_bar_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'select-core' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'progress_bar_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'select-core' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'progress_bar_letter_spacing',
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
			'name'          => 'progress_bar_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'select-core' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'textsimple',
			'name'          => 'progress_bar_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'select-core' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'colorsimple',
			'name'          => 'progress_bar_title_color',
			'default_value' => '',
			'label'         => esc_html__( 'Title Color', 'select-core' )
		) );

		//Color options

		$color_group = moments_qodef_add_admin_group( array(
			'name'        => 'color_group',
			'title'       => esc_html__( 'Progress Bar Colors', 'select-core' ),
			'description' => esc_html__( 'Setup colors for progress bar parts', 'select-core' ),
			'parent'      => $panel
		) );

		$color_row = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $color_group
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'progress_bar_number_background_color',
			'default_value' => '',
			'label'         => esc_html__( 'Number Background Color', 'select-core' )
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'progress_bar_number_color',
			'default_value' => '',
			'label'         => esc_html__( 'Number Color', 'select-core' )
		) );
	}

	add_action( 'moments_qodef_options_elements_map', 'moments_qodef_progress_bar_map' );
}