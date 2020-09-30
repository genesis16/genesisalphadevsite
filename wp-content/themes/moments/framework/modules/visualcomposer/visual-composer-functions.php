<?php

if(!function_exists('moments_qodef_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function moments_qodef_vc_grid_elements_enabled() {

		return (moments_qodef_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('moments_qodef_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function moments_qodef_visual_composer_grid_elements() {

		if(!moments_qodef_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'moments_qodef_visual_composer_grid_elements', 12);
}

if(!function_exists('moments_qodef_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function moments_qodef_grid_elements_ajax_disable() {
		global $moments_qodef_options;

		if(moments_qodef_vc_grid_elements_enabled()) {
			$moments_qodef_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'moments_qodef_grid_elements_ajax_disable');
}


if(!function_exists('moments_qodef_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function moments_qodef_get_vc_version() {
		if(moments_qodef_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}