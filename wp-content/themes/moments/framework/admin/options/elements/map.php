<?php

if ( ! function_exists( 'moments_qodef_load_elements_map' ) ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function moments_qodef_load_elements_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_elements_page',
				'title' => esc_html__( 'Elements', 'moments' ),
				'icon'  => 'fa fa-header'
			)
		);

		do_action( 'moments_qodef_options_elements_map' );

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_load_elements_map', 8 );

}