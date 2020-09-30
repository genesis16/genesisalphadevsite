<?php

if ( ! function_exists( 'moments_qodef_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function moments_qodef_reset_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'moments' ),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = moments_qodef_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'moments' )
			)
		);

		moments_qodef_add_admin_field( array(
			'type'          => 'yesno',
			'name'          => 'reset_to_defaults',
			'default_value' => 'no',
			'label'         => esc_html__( 'Reset to Defaults', 'moments' ),
			'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'moments' ),
			'parent'        => $panel_reset
		) );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_reset_options_map', 100 );

}