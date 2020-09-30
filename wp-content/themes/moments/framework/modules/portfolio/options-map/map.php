<?php

if ( ! function_exists( 'moments_qodef_portfolio_options_map' ) ) {

	function moments_qodef_portfolio_options_map() {

		moments_qodef_add_admin_page( array(
			'slug'  => '_portfolio',
			'title' => esc_html__( 'Portfolio', 'moments' ),
			'icon'  => 'fa fa-camera-retro'
		) );

		$panel = moments_qodef_add_admin_panel( array(
			'title' => esc_html__( 'Portfolio Single', 'moments' ),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_template',
			'type'          => 'select',
			'label'         => esc_html__( 'Portfolio Type', 'moments' ),
			'default_value' => 'small-images',
			'description'   => esc_html__( 'Choose a default type for Single Project pages', 'moments' ),
			'parent'        => $panel,
			'options'       => array(
				'small-images'      => esc_html__( 'Portfolio small images', 'moments' ),
				'small-slider'      => esc_html__( 'Portfolio small slider', 'moments' ),
				'big-images'        => esc_html__( 'Portfolio big images', 'moments' ),
				'big-slider'        => esc_html__( 'Portfolio big slider', 'moments' ),
				'custom'            => esc_html__( 'Portfolio custom', 'moments' ),
				'full-width-custom' => esc_html__( 'Portfolio full width custom', 'moments' ),
				'gallery'           => esc_html__( 'Portfolio gallery', 'moments' )
			)
		) );


		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Lightbox for Images', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Lightbox for Videos', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Hide Categories', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will disable category meta description on Single Projects.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Hide Date', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will disable date meta on Single Projects.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Show Comments', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will show comments on your page.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Sticky Side Text', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Hide Pagination', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#qodef_navigate_same_category_container'
			)
		) );

		$container_navigate_category = moments_qodef_add_admin_container( array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Enable Comments', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will show comments on portfolio single pages.', 'moments' ),
			'parent'        => $panel,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_nav_same_category',
			'type'          => 'yesno',
			'label'         => esc_html__( 'Enable Pagination Through Same Category', 'moments' ),
			'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category.', 'moments' ),
			'parent'        => $container_navigate_category,
			'default_value' => 'no'
		) );

		moments_qodef_add_admin_field( array(
			'name'          => 'portfolio_single_numb_columns',
			'type'          => 'select',
			'label'         => esc_html__( 'Number of Columns', 'moments' ),
			'default_value' => 'three-columns',
			'description'   => esc_html__( 'Enter the number of columns for Portfolio Gallery type', 'moments' ),
			'parent'        => $panel,
			'options'       => array(
				'two-columns'   => esc_html__( '2 columns', 'moments' ),
				'three-columns' => esc_html__( '3 columns', 'moments' ),
				'four-columns'  => esc_html__( '4 columns', 'moments' )
			)
		) );

		moments_qodef_add_admin_field( array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__( 'Portfolio Single Slug', 'moments' ),
			'description' => esc_html( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'moments' ),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_portfolio_options_map', 14 );

}