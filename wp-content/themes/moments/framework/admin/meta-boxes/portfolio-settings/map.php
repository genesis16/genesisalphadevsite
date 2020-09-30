<?php

if ( ! function_exists( 'moments_qodef_map_portfolio_settings' ) ) {
	function moments_qodef_map_portfolio_settings() {
		$meta_box = moments_qodef_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'moments' ),
			'name'  => 'portfolio_settings_meta_box'
		) );

		moments_qodef_create_meta_box_field( array(
			'name'        => 'qodef_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'moments' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'moments' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'moments' ),
				'small-images'      => esc_html__( 'Portfolio small images', 'moments' ),
				'small-slider'      => esc_html__( 'Portfolio small slider', 'moments' ),
				'big-images'        => esc_html__( 'Portfolio big images', 'moments' ),
				'big-slider'        => esc_html__( 'Portfolio big slider', 'moments' ),
				'custom'            => esc_html__( 'Portfolio custom', 'moments' ),
				'full-width-custom' => esc_html__( 'Portfolio full width custom', 'moments' ),
				'gallery'           => esc_html__( 'Portfolio gallery', 'moments' )
			)
		) );

		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}

		moments_qodef_create_meta_box_field( array(
			'name'        => 'portfolio_single_back_to_link',
			'type'        => 'select',
			'label'       => esc_html__( '"Back To" Link', 'moments' ),
			'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'moments' ),
			'parent'      => $meta_box,
			'options'     => $all_pages
		) );

		moments_qodef_create_meta_box_field( array(
			'name'        => 'portfolio_external_link',
			'type'        => 'text',
			'label'       => esc_html__( 'Portfolio External Link', 'moments' ),
			'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'moments' ),
			'parent'      => $meta_box,
			'args'        => array(
				'col_width' => 3
			)
		) );

		moments_qodef_create_meta_box_field( array(
			'name'        => 'portfolio_masonry_dimenisions',
			'type'        => 'select',
			'label'       => esc_html__( 'Dimensions for Masonry', 'moments' ),
			'description' => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists', 'moments' ),
			'parent'      => $meta_box,
			'options'     => array(
				'default'            => esc_html__( 'Default', 'moments' ),
				'large_width'        => esc_html__( 'Large width', 'moments' ),
				'large_height'       => esc_html__( 'Large height', 'moments' ),
				'large_width_height' => esc_html__( 'Large width/height', 'moments' )
			)
		) );
	}

	add_action( 'moments_qodef_meta_boxes_map', 'moments_qodef_map_portfolio_settings' );
}