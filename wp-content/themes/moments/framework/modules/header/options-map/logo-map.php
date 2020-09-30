<?php

if ( ! function_exists( 'moments_qodef_logo_options_map' ) ) {

	function moments_qodef_logo_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'moments' ),
				'icon'  => 'fa fa-coffee'
			)
		);

		$panel_logo = moments_qodef_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'moments' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#qodef_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'moments' ),
				'description'   => esc_html__( 'Choose a default logo image to display ', 'moments' ),
				'parent'        => $hide_logo_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'moments' ),
				'description'   => esc_html__( 'Choose a default logo image to display ', 'moments' ),
				'parent'        => $hide_logo_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Light', 'moments' ),
				'description'   => esc_html__( 'Choose a default logo image to display ', 'moments' ),
				'parent'        => $hide_logo_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'moments' ),
				'description'   => esc_html__( 'Choose a default logo image to display ', 'moments' ),
				'parent'        => $hide_logo_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => QODE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'moments' ),
				'description'   => esc_html__( 'Choose a default logo image to display ', 'moments' ),
				'parent'        => $hide_logo_container
			)
		);

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_logo_options_map', 2 );

}