<?php

if(!function_exists('moments_qodef_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function moments_qodef_boxed_class($classes) {

        //is boxed layout turned on?
        if(moments_qodef_get_meta_field_intersect('boxed') == 'yes' && moments_qodef_get_meta_field_intersect('header_type') !== 'header-vertical') {
            $classes[] = 'qodef-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_boxed_class');
}

if(!function_exists('moments_qodef_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function moments_qodef_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_theme_version_class');
}

if(!function_exists('moments_qodef_smooth_scroll_class')) {
    /**
     * Function that adds classes on body for smooth scroll
     */
    function moments_qodef_smooth_scroll_class($classes) {

        //is smooth scroll enabled enabled?
        if(moments_qodef_options()->getOptionValue('smooth_scroll') == 'yes') {
            $classes[] = 'qodef-smooth-scroll';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_smooth_scroll_class');
}

if(!function_exists('moments_qodef_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function moments_qodef_smooth_page_transitions_class($classes) {

        if(moments_qodef_options()->getOptionValue('smooth_page_transitions') == 'yes') {
            $classes[] = 'qodef-smooth-page-transitions qodef-mimic-ajax';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_smooth_page_transitions_class');
}

if(!function_exists('moments_qodef_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function moments_qodef_content_initial_width_body_class($classes) {

        if(moments_qodef_options()->getOptionValue('initial_content_width')) {
            $classes[] = 'qodef-'.moments_qodef_options()->getOptionValue('initial_content_width');
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_content_initial_width_body_class');
}

if(!function_exists('moments_qodef_set_blog_body_class')) {
    /**
     * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function moments_qodef_set_blog_body_class($classes) {

        if(moments_qodef_load_blog_assets()) {
            $classes[] = 'qodef-blog-installed';
        }

        return $classes;
    }

    add_filter('body_class', 'moments_qodef_set_blog_body_class');
}


if(!function_exists('moments_qodef_set_portfolio_single_info_follow_body_class')) {
    /**
     * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
     *
     * @param $classes array of body classes
     *
     * @return array with follow portfolio info class body class added
     */

    function moments_qodef_set_portfolio_single_info_follow_body_class($classes) {

        if(is_singular('portfolio-item')){
            if(moments_qodef_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes'){
                $classes[] = 'qodef-follow-portfolio-info';
            }
        }


        return $classes;
    }

    add_filter('body_class', 'moments_qodef_set_portfolio_single_info_follow_body_class');
}


if (!function_exists('moments_qodef_predefined_style_class')) {

    function moments_qodef_predefined_style_class( $classes ) {

        $id = moments_qodef_get_page_id();

        if(($meta_temp = get_post_meta($id, 'qodef_predefined_style_meta', true)) !== ''){
            $classes[] = 'qodef-' . $meta_temp;

        } else if ( moments_qodef_options()->getOptionValue('predefined_style') !== '' ) {
            $classes[] = 'qodef-' . moments_qodef_options()->getOptionValue('predefined_style');
        }

        return $classes;

    }

    add_filter('body_class', 'moments_qodef_predefined_style_class');

}


if (!function_exists('moments_qodef_guestbook_class')) {

    function moments_qodef_guestbook_class( $classes ) {

        $id = moments_qodef_get_page_id();

        if (get_post_meta($id, 'qodef_page_comments_guestbook_meta', true) == 'yes') {
            $classes[] = 'qodef-guestbook-style';
        }

        return $classes;

    }

    add_filter('body_class', 'moments_qodef_guestbook_class');

}

