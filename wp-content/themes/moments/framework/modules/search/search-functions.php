<?php

if( !function_exists('moments_qodef_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function moments_qodef_search_body_class($classes) {

		if ( is_active_widget( false, false, 'qode_search_opener' ) ) {

			$classes[] = 'qodef-search-covers-header';


		}
		return $classes;

	}

	add_filter('body_class', 'moments_qodef_search_body_class');
}

if ( ! function_exists('moments_qodef_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function moments_qodef_get_search() {

		if ( moments_qodef_active_widget( false, false, 'qode_search_opener' ) ) {
			moments_qodef_set_position_for_covering_search();
			return;
			moments_qodef_load_search_template();
		}
	}

}

if ( ! function_exists('moments_qodef_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function moments_qodef_set_position_for_covering_search() {

		$containing_sidebar = moments_qodef_active_widget( false, false, 'qode_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'moments_qodef_after_header_top_html_open', 'moments_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'moments_qodef_after_header_menu_area_html_open', 'moments_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'moments_qodef_after_mobile_header_html_open', 'moments_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'moments_qodef_after_header_logo_area_html_open', 'moments_qodef_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'moments_qodef_after_sticky_menu_html_open', 'moments_qodef_load_search_template');
			}

		}

	}

}

if ( ! function_exists('moments_qodef_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function moments_qodef_set_search_position_in_menu( $type ) {

		add_action( 'moments_qodef_after_header_menu_area_html_open', 'moments_qodef_load_search_template');
		if ( $type == 'search-slides-from-header-bottom' ) {
			add_action( 'moments_qodef_after_sticky_menu_html_open', 'moments_qodef_load_search_template');
		}

	}
}

if ( ! function_exists('moments_qodef_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function moments_qodef_set_search_position_mobile() {

		add_action( 'moments_qodef_after_mobile_header_html_open', 'moments_qodef_load_search_template');

	}

}

if ( ! function_exists('moments_qodef_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function moments_qodef_load_search_template() {

		$search_type = 'search-covers-header';

		$search_icon = '';
		$search_icon_close = '';
		if ( moments_qodef_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = moments_qodef_icon_collections()->getSearchIcon( moments_qodef_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = moments_qodef_icon_collections()->getSearchClose( moments_qodef_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> moments_qodef_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		moments_qodef_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}