<?php

if ( ! function_exists( 'moments_qodef_footer_options_map' ) ) {
	/**
	 * Add footer options
	 */
	function moments_qodef_footer_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'moments' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = moments_qodef_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'moments' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__( 'Uncovering Footer', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'moments' ),
				'parent'        => $footer_panel,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'moments' ),
				'parent'        => $footer_panel,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_top_container = moments_qodef_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'moments' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'moments' ),
				'options'       => array(
					'1' => esc_html__( '1', 'moments' ),
					'2' => esc_html__( '2', 'moments' ),
					'3' => esc_html__( '3', 'moments' ),
					'5' => esc_html__( '3(25%+25%+50%)', 'moments' ),
					'6' => esc_html__( '3(50%+25%+25%)', 'moments' ),
					'4' => esc_html__( '4', 'moments' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => '',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'moments' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'moments' ),
				'options'       => array(
					'left'   => esc_html__( 'Left', 'moments' ),
					'center' => esc_html__( 'Center', 'moments' ),
					'right'  => esc_html__( 'Right', 'moments' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'moments' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = moments_qodef_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);


		moments_qodef_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '3',
				'label'         => esc_html__( 'Footer Bottom Columns', 'moments' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'moments' ),
				'options'       => array(
					'1' => esc_html__( '1', 'moments' ),
					'2' => esc_html__( '2', 'moments' ),
					'3' => esc_html__( '3', 'moments' )
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_footer_options_map', 5 );

}