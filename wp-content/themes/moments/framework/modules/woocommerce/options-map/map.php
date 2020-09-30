<?php

if ( ! function_exists( 'moments_qodef_woocommerce_options_map' ) ) {

	/**
	 * Add Woocommerce options page
	 */
	function moments_qodef_woocommerce_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'moments' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = moments_qodef_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'name'          => 'qodef_woo_products_list_full_width',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Enable Full Width Template', 'moments' ),
			'default_value' => 'no',
			'description'   => esc_html__( 'Enabling this option will enable full width template for shop page', 'moments' ),
			'parent'        => $panel_product_list,
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'qodef_woo_product_list_columns',
			'type'          => 'select',
			'label'         => esc_html__( 'Product List Columns', 'moments' ),
			'default_value' => 'qodef-woocommerce-columns-3',
			'description'   => esc_html__( 'Choose number of columns for product listing and related products on single product', 'moments' ),
			'options'       => array(
				'qodef-woocommerce-columns-3' => esc_html__( '3 Columns (2 with sidebar)', 'moments' ),
				'qodef-woocommerce-columns-4' => esc_html__( '4 Columns (3 with sidebar)', 'moments' )
			),
			'parent'        => $panel_product_list,
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'qodef_woo_products_per_page',
			'type'          => 'text',
			'label'         => esc_html__( 'Number of products per page', 'moments' ),
			'default_value' => '',
			'description'   => esc_html__( 'Set number of products on shop page', 'moments' ),
			'parent'        => $panel_product_list,
			'args'          => array(
				'col_width' => 3
			)
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'qodef_products_list_title_tag',
			'type'          => 'select',
			'label'         => esc_html__( 'Products Title Tag', 'moments' ),
			'default_value' => 'h1',
			'description'   => '',
			'options'       => array(
				'h1' => esc_html__( 'h1', 'moments' ),
				'h2' => esc_html__( 'h2', 'moments' ),
				'h3' => esc_html__( 'h3', 'moments' ),
				'h4' => esc_html__( 'h4', 'moments' ),
				'h5' => esc_html__( 'h5', 'moments' ),
				'h6' => esc_html__( 'h6', 'moments' ),
			),
			'parent'        => $panel_product_list,
		) );

		$group_product_list_title = moments_qodef_add_admin_group( array(
			'title'       => esc_html__( 'Title Typography', 'moments' ),
			'name'        => 'group_product_list_title',
			'parent'      => $panel_product_list,
			'description' => esc_html__( 'Define custom styles for product list title', 'moments' ),
		) );

		$typography_row = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $group_product_list_title
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'fontsimple',
			'name'          => 'product_list_title_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'product_list_title_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'product_list_title_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'product_list_title_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		$typography_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row2',
			'next'   => true,
			'parent' => $group_product_list_title
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'product_list_title_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'textsimple',
			'name'          => 'product_list_title_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		/**
		 * Single Product Settings
		 */
		$panel_single_product = moments_qodef_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'name'          => 'qodef_single_product_title_tag',
			'type'          => 'select',
			'label'         => esc_html__( 'Single Product Title Tag', 'moments' ),
			'default_value' => 'h1',
			'description'   => '',
			'options'       => array(
				'h1' => esc_html__( 'h1', 'moments' ),
				'h2' => esc_html__( 'h2', 'moments' ),
				'h3' => esc_html__( 'h3', 'moments' ),
				'h4' => esc_html__( 'h4', 'moments' ),
				'h5' => esc_html__( 'h5', 'moments' ),
				'h6' => esc_html__( 'h6', 'moments' ),
			),
			'parent'        => $panel_single_product,
		) );

		$group_product_single_title = moments_qodef_add_admin_group( array(
			'title'       => esc_html__( 'Title Typography', 'moments' ),
			'name'        => 'group_product_single_title',
			'parent'      => $panel_single_product,
			'description' => esc_html__( 'Define custom styles for product single title', 'moments' ),
		) );

		$typography_row = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $group_product_single_title
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'fontsimple',
			'name'          => 'product_single_title_font_family',
			'default_value' => '',
			'label'         => esc_html__( 'Font Family', 'moments' ),
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'product_single_title_text_transform',
			'default_value' => '',
			'label'         => esc_html__( 'Text Transform', 'moments' ),
			'options'       => moments_qodef_get_text_transform_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'product_single_title_font_style',
			'default_value' => '',
			'label'         => esc_html__( 'Font Style', 'moments' ),
			'options'       => moments_qodef_get_font_style_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'product_single_title_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__( 'Letter Spacing', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

		$typography_row2 = moments_qodef_add_admin_row( array(
			'name'   => 'typography_row2',
			'next'   => true,
			'parent' => $group_product_single_title
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'product_single_title_font_weight',
			'default_value' => '',
			'label'         => esc_html__( 'Font Weight', 'moments' ),
			'options'       => moments_qodef_get_font_weight_array()
		) );

		moments_qodef_add_admin_field( array(
			'parent'        => $typography_row2,
			'type'          => 'textsimple',
			'name'          => 'product_single_title_font_size',
			'default_value' => '',
			'label'         => esc_html__( 'Font Size', 'moments' ),
			'args'          => array(
				'suffix' => 'px'
			)
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_woocommerce_options_map', 21 );

}