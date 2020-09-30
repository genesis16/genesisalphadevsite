<?php

if(!function_exists('moments_qodef_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function moments_qodef_header_class($classes) {
        $header_type = moments_qodef_get_meta_field_intersect('header_type', moments_qodef_get_page_id());

        $classes[] = 'qodef-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_header_class');
}

if(!function_exists('moments_qodef_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function moments_qodef_header_behaviour_class($classes) {

        $classes[] = 'qodef-'.moments_qodef_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_header_behaviour_class');
}

if(!function_exists('moments_qodef_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function moments_qodef_menu_item_icon_position_class($classes) {

        if(moments_qodef_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'qodef-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_menu_item_icon_position_class');
}

if(!function_exists('moments_qodef_mobile_header_class')) {
    function moments_qodef_mobile_header_class($classes) {
        $classes[] = 'qodef-default-mobile-header';

        $classes[] = 'qodef-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_mobile_header_class');
}

if(!function_exists('moments_qodef_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added first level menu background color class
     */
    function moments_qodef_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if(moments_qodef_options()->getOptionValue('menu_hover_background_color') !== ''){
            $classes[]= 'qodef-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_header_class_first_level_bg_color');
}

if(!function_exists('moments_qodef_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function moments_qodef_menu_dropdown_appearance($classes) {

        if(moments_qodef_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'qodef-'.moments_qodef_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_menu_dropdown_appearance');
}

if (!function_exists('moments_qodef_header_skin_class')) {

    function moments_qodef_header_skin_class( $classes ) {

        $id = moments_qodef_get_page_id();

		if(($meta_temp = get_post_meta($id, 'qodef_header_style_meta', true)) !== ''){
			$classes[] = 'qodef-' . $meta_temp;
		} else if ( moments_qodef_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'qodef-' . moments_qodef_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'moments_qodef_header_skin_class');

}

if (!function_exists('moments_qodef_header_scroll_style_class')) {

	function moments_qodef_header_scroll_style_class( $classes ) {

		if (moments_qodef_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes' ) {
			$classes[] = 'qodef-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'moments_qodef_header_scroll_style_class');

}


if(!function_exists('moments_qodef_header_global_js_var')) {
    function moments_qodef_header_global_js_var($global_variables) {

        $global_variables['qodefTopBarHeight'] = moments_qodef_get_top_bar_height();
        $global_variables['qodefStickyHeaderHeight'] = moments_qodef_get_sticky_header_height();
        $global_variables['qodefStickyHeaderTransparencyHeight'] = moments_qodef_get_sticky_header_height_of_complete_transparency();
        $global_variables['qodefStickyScrollAmount'] = moments_qodef_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('moments_qodef_js_global_variables', 'moments_qodef_header_global_js_var');
}

if(!function_exists('moments_qodef_header_per_page_js_var')) {
    function moments_qodef_header_per_page_js_var($perPageVars) {

        $perPageVars['qodefStickyScrollAmount'] = moments_qodef_get_sticky_scroll_amount_per_page();

        return $perPageVars;
    }

    add_filter('moments_qodef_per_page_js_vars', 'moments_qodef_header_per_page_js_var');
}