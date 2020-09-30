<?php

if(!function_exists('moments_qodef_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function moments_qodef_header_top_bar_styles() {

        if(moments_qodef_options()->getOptionValue('top_bar_height') !== '') {
            echo moments_qodef_dynamic_css('.qodef-top-bar', array('height' => moments_qodef_options()->getOptionValue('top_bar_height') . 'px'));
            echo moments_qodef_dynamic_css('.qodef-top-bar .qodef-logo-wrapper a', array('max-height' => moments_qodef_options()->getOptionValue('top_bar_height').'px'));
        }

        if(moments_qodef_options()->getOptionValue('top_bar_in_grid') == 'yes') {
            $top_bar_grid_selector = '.qodef-top-bar .qodef-grid .qodef-vertical-align-containers';
            $top_bar_grid_styles = array();
            if(moments_qodef_options()->getOptionValue('top_bar_grid_background_color') !== '') {
                $grid_background_color    = moments_qodef_options()->getOptionValue('top_bar_grid_background_color');
                $grid_background_transparency = 1;

                if(moments_qodef_options()->getOptionValue('top_bar_grid_background_transparency') !== '') {
                    $grid_background_transparency = moments_qodef_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = moments_qodef_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo moments_qodef_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = moments_qodef_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(moments_qodef_options()->getOptionValue('top_bar_background_transparency') !== '') {
                $background_transparency = moments_qodef_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = moments_qodef_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo moments_qodef_dynamic_css('.qodef-top-bar', $top_bar_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_header_top_bar_styles');
}



if(!function_exists('moments_qodef_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function moments_qodef_header_standard_menu_area_styles() {

        $menu_area_header_standard_styles = array();

        if(moments_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '') {
            $menu_area_background_color        = moments_qodef_options()->getOptionValue('menu_area_background_color_header_standard');
            $menu_area_background_transparency = 1;

            if(moments_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '') {
                $menu_area_background_transparency = moments_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard');
            }

            $menu_area_header_standard_styles['background-color'] = moments_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(moments_qodef_options()->getOptionValue('menu_area_height_header_standard') !== '') {
            $max_height = intval(moments_qodef_filter_px(moments_qodef_options()->getOptionValue('menu_area_height_header_standard')) * 0.9).'px';
            echo moments_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('menu_area_height_header_standard')).'px';

        }

        echo moments_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if(moments_qodef_options()->getOptionValue('menu_area_in_grid_header_standard') == 'yes' && moments_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '') {
            $menu_area_grid_background_color        = moments_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard');
            $menu_area_grid_background_transparency = 1;

            if(moments_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') !== '') {
                $menu_area_grid_background_transparency = moments_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard');
            }

            $menu_area_grid_header_standard_styles['background-color'] = moments_qodef_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo moments_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-menu-area .qodef-grid .qodef-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_header_standard_menu_area_styles');
}

if(!function_exists('moments_qodef_header_centered_menu_area_styles')) {
    /**
     * Generates styles for header centered menu
     */
    function moments_qodef_header_centered_menu_area_styles() {

        $menu_area_header_centered_styles = array();

        if(moments_qodef_options()->getOptionValue('menu_area_background_color_header_centered') !== '') {
            $menu_area_background_color        = moments_qodef_options()->getOptionValue('menu_area_background_color_header_centered');
            $menu_area_background_transparency = 1;

            if(moments_qodef_options()->getOptionValue('menu_area_background_transparency_header_centered') !== '') {
                $menu_area_background_transparency = moments_qodef_options()->getOptionValue('menu_area_background_transparency_header_centered');
            }

            $menu_area_header_centered_styles['background-color'] = moments_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(moments_qodef_options()->getOptionValue('menu_area_height_header_centered') !== '') {
            $max_height = intval(moments_qodef_filter_px(moments_qodef_options()->getOptionValue('menu_area_height_header_centered')) * 0.9).'px';
            echo moments_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_centered_styles['height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('menu_area_height_header_centered')).'px';

        }

        echo moments_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-menu-area', $menu_area_header_centered_styles);

        $menu_area_grid_header_centered_styles = array();

        if(moments_qodef_options()->getOptionValue('menu_area_in_grid_header_centered') == 'yes' && moments_qodef_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '') {
            $menu_area_grid_background_color        = moments_qodef_options()->getOptionValue('menu_area_grid_background_color_header_centered');
            $menu_area_grid_background_transparency = 1;

            if(moments_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') !== '') {
                $menu_area_grid_background_transparency = moments_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_centered');
            }

            $menu_area_grid_header_centered_styles['background-color'] = moments_qodef_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo moments_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-menu-area .qodef-grid .qodef-vertical-align-containers', $menu_area_grid_header_centered_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_header_centered_menu_area_styles');
}


if(!function_exists('moments_qodef_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function moments_qodef_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.qodef-header-vertical .qodef-vertical-area-background'
        );

        if(moments_qodef_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = moments_qodef_options()->getOptionValue('vertical_header_background_color');
        }

        if(moments_qodef_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = moments_qodef_options()->getOptionValue('vertical_header_transparency');
        }

        if(moments_qodef_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.moments_qodef_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo moments_qodef_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_vertical_menu_styles');
}


if(!function_exists('moments_qodef_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function moments_qodef_sticky_header_styles() {

        if(moments_qodef_options()->getOptionValue('sticky_header_in_grid') == 'yes' && moments_qodef_options()->getOptionValue('sticky_header_grid_background_color') !== '') {
            $sticky_header_grid_background_color        = moments_qodef_options()->getOptionValue('sticky_header_grid_background_color');
            $sticky_header_grid_background_transparency = 1;

            if(moments_qodef_options()->getOptionValue('sticky_header_grid_transparency') !== '') {
                $sticky_header_grid_background_transparency = moments_qodef_options()->getOptionValue('sticky_header_grid_transparency');
            }

            echo moments_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-grid .qodef-vertical-align-containers', array('background-color' => moments_qodef_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if(moments_qodef_options()->getOptionValue('sticky_header_background_color') !== '') {

            $sticky_header_background_color              = moments_qodef_options()->getOptionValue('sticky_header_background_color');
            $sticky_header_background_color_transparency = 1;

            if(moments_qodef_options()->getOptionValue('sticky_header_transparency') !== '') {
                $sticky_header_background_color_transparency = moments_qodef_options()->getOptionValue('sticky_header_transparency');
            }

            echo moments_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array('background-color' => moments_qodef_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if(moments_qodef_options()->getOptionValue('sticky_header_height') !== '') {
            $max_height = intval(moments_qodef_filter_px(moments_qodef_options()->getOptionValue('sticky_header_height')) * 0.9).'px';

            echo moments_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header', array('height' => moments_qodef_options()->getOptionValue('sticky_header_height').'px'));
            echo moments_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if(moments_qodef_options()->getOptionValue('sticky_color') !== '') {
            $sticky_menu_item_styles['color'] = moments_qodef_options()->getOptionValue('sticky_color');
        }
        if(moments_qodef_options()->getOptionValue('sticky_google_fonts') !== '-1') {
            $sticky_menu_item_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('sticky_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('sticky_fontsize') !== '') {
            $sticky_menu_item_styles['font-size'] = moments_qodef_options()->getOptionValue('sticky_fontsize').'px';
        }
        if(moments_qodef_options()->getOptionValue('sticky_lineheight') !== '') {
            $sticky_menu_item_styles['line-height'] = moments_qodef_options()->getOptionValue('sticky_lineheight').'px';
        }
        if(moments_qodef_options()->getOptionValue('sticky_texttransform') !== '') {
            $sticky_menu_item_styles['text-transform'] = moments_qodef_options()->getOptionValue('sticky_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('sticky_fontstyle') !== '') {
            $sticky_menu_item_styles['font-style'] = moments_qodef_options()->getOptionValue('sticky_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('sticky_fontweight') !== '') {
            $sticky_menu_item_styles['font-weight'] = moments_qodef_options()->getOptionValue('sticky_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('sticky_letterspacing') !== '') {
            $sticky_menu_item_styles['letter-spacing'] = moments_qodef_options()->getOptionValue('sticky_letterspacing').'px';
        }

        $sticky_menu_item_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li > a'
        );

        echo moments_qodef_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if(moments_qodef_options()->getOptionValue('sticky_hovercolor') !== '') {
            $sticky_menu_item_hover_styles['color'] = moments_qodef_options()->getOptionValue('sticky_hovercolor');
        }

        $sticky_menu_item_hover_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            '.qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a'
        );

        echo moments_qodef_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_sticky_header_styles');
}

if(!function_exists('moments_qodef_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function moments_qodef_fixed_header_styles() {

        if(moments_qodef_options()->getOptionValue('fixed_header_grid_background_color') !== '') {

            $fixed_header_grid_background_color              = moments_qodef_options()->getOptionValue('fixed_header_grid_background_color');
            $fixed_header_grid_background_color_transparency = 1;

            if(moments_qodef_options()->getOptionValue('fixed_header_grid_transparency') !== '') {
                $fixed_header_grid_background_color_transparency = moments_qodef_options()->getOptionValue('fixed_header_grid_transparency');
            }

            echo moments_qodef_dynamic_css('.qodef-fixed-wrapper.fixed .qodef-grid .qodef-vertical-align-containers,
                                    .qodef-fixed-wrapper.fixed .qodef-grid .qodef-vertical-align-containers',
                array('background-color' => moments_qodef_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if(moments_qodef_options()->getOptionValue('fixed_header_background_color') !== '') {

            $fixed_header_background_color              = moments_qodef_options()->getOptionValue('fixed_header_background_color');
            $fixed_header_background_color_transparency = 1;

            if(moments_qodef_options()->getOptionValue('fixed_header_transparency') !== '') {
                $fixed_header_background_color_transparency = moments_qodef_options()->getOptionValue('fixed_header_transparency');
            }

            echo moments_qodef_dynamic_css('.qodef-fixed-wrapper.fixed .qodef-menu-area,
                                   .qodef-fixed-wrapper.fixed .qodef-menu-area',
                array('background-color' => moments_qodef_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_fixed_header_styles');
}

if(!function_exists('moments_qodef_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function moments_qodef_main_menu_styles() {
        global $moments_qodef_options;

        $main_menu_styles_array = array();

        if ( moments_qodef_options()->getOptionValue( 'menu_color' ) !== '' ) {
            $main_menu_styles_array['color'] = moments_qodef_options()->getOptionValue( 'menu_color' );
        }
        if ( moments_qodef_options()->getOptionValue( 'menu_google_fonts' ) !== '-1' ) {
            $main_menu_styles_array['font-family'] = moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( 'menu_google_fonts' ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'menu_fontsize' ) !== '' ) {
            $main_menu_styles_array['font-size'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_fontsize' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'menu_fontstyle' ) !== '' ) {
            $main_menu_styles_array['font-style'] = moments_qodef_options()->getOptionValue( 'menu_fontstyle' );
        }
        if ( moments_qodef_options()->getOptionValue( 'menu_fontweight' ) !== '' ) {
            $main_menu_styles_array['font-weight'] = moments_qodef_options()->getOptionValue( 'menu_fontweight' );
        }
        if ( moments_qodef_options()->getOptionValue( 'menu_texttransform' ) !== '' ) {
            $main_menu_styles_array['text-transform'] = moments_qodef_options()->getOptionValue( 'menu_texttransform' );
        }
        if ( moments_qodef_options()->getOptionValue( 'menu_letterspacing' ) !== '' ) {
            $main_menu_styles_array['letter-spacing'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_letterspacing' ) ) . 'px';
        }

        echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a,
            .qodef-page-header #lang_sel > ul > li > a,
            .qodef-page-header #lang_sel_click > ul > li > a,
            .qodef-page-header #lang_sel ul > li:hover > a', $main_menu_styles_array );

        if ( moments_qodef_options()->getOptionValue( 'menu_google_fonts' ) !== '-1' ) {
            echo moments_qodef_dynamic_css( '.qodef-page-header #lang_sel_list', array(
                'font-family' => moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( '' ) ) . 'sans-serif !important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_hovercolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            .qodef-page-header #lang_sel ul li a:hover,
            .qodef-page-header #lang_sel_click > ul > li a:hover', array(
                'color' => moments_qodef_options()->getOptionValue( 'menu_hovercolor' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_activecolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a,
			body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => moments_qodef_options()->getOptionValue( 'menu_activecolor' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_icon_position' ) == 'top' && moments_qodef_options()->getOptionValue( 'menu_item_icon_size' ) !== '' ) {

            echo moments_qodef_dynamic_css( 'body.qodef-menu-with-large-icons .qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner i', array(
                'font-size' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_item_icon_size' ) ) . 'px !important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' && ( moments_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' || moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) ) {

            $menu_item_style_array = array();
            if ( moments_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' ) {
                $menu_item_style_array['background-color'] = moments_qodef_options()->getOptionValue( 'menu_text_background_color' );
            }

            if ( moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) !== 'yes' ) {

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_radius' ) !== '' ) {
                    $menu_item_style_array['border-radius'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_item_border_radius' ) ) . 'px';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style_style' ) !== '' ) {
                    $menu_item_style_array['border-style'] = moments_qodef_options()->getOptionValue( 'menu_item_border_style_style' );
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_width' ) !== '' ) {
                    $menu_item_style_array['border-width'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_item_border_width' ) ) . 'px';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                    $menu_item_style_array['border-color'] = moments_qodef_options()->getOptionValue( 'menu_item_border_color' );
                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'top_bottom_borders' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
                    $menu_item_style_array['border-left']   = 'none';
                    $menu_item_style_array['border-top']    = 'none';
                    $menu_item_style_array['border-bottom'] = 'none';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                    $menu_item_style_array['border-top']   = 'none';
                }

            }

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', $menu_item_style_array );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a span.item_inner,
			.qodef-main-menu.qodef-default-nav > ul > li:last-child > a', array(
                'border-right' => 'none'
            ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {

            $menu_item_style_array = array();
            if ( moments_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' ) {
                $menu_item_style_array['background-color'] = moments_qodef_options()->getOptionValue( 'menu_text_background_color' );
            }

            if ( moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) !== 'yes' ) {

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_radius' ) !== '' ) {
                    $menu_item_style_array['border-radius'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_item_border_radius' ) ) . 'px';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style_style' ) !== '' ) {
                    $menu_item_style_array['border-style'] = moments_qodef_options()->getOptionValue( 'menu_item_border_style_style' );
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_width' ) !== '' ) {
                    $menu_item_style_array['border-width'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_item_border_width' ) ) . 'px';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                    $menu_item_style_array['border-color'] = moments_qodef_options()->getOptionValue( 'menu_item_border_color' );
                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'top_bottom_borders' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
                    $menu_item_style_array['border-left']   = 'none';
                    $menu_item_style_array['border-top']    = 'none';
                    $menu_item_style_array['border-bottom'] = 'none';
                }
                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                    $menu_item_style_array['border-top']   = 'none';
                }

            }

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', $menu_item_style_array );

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_hover_background_color' ) !== '' ) {
            $menu_hover_background_color     = moments_qodef_options()->getOptionValue( 'menu_hover_background_color' );
            $menu_hover_background_color_rgb = 1;
            if ( moments_qodef_options()->getOptionValue( 'menu_hover_background_color_transparency' ) !== '' ) {
                $menu_hover_background_color_rgb = moments_qodef_options()->getOptionValue( 'menu_hover_background_color_transparency' );
            }
            $menu_hover_background_color = moments_qodef_rgba_color( $menu_hover_background_color, $menu_hover_background_color_rgb );

            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'small_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner', array(
                    'background-color' => $menu_hover_background_color
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'large_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                    'background-color' => $menu_hover_background_color
                ) );
            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_active_background_color' ) !== '' ) {
            $menu_active_background_color     = moments_qodef_options()->getOptionValue( 'menu_active_background_color' );
            $menu_active_background_color_rgb = 1;
            if ( moments_qodef_options()->getOptionValue( 'menu_active_background_color_transparency' ) !== '' ) {
                $menu_active_background_color_rgb = moments_qodef_options()->getOptionValue( 'menu_active_background_color_transparency' );
            }
            $menu_active_background_color = moments_qodef_rgba_color( $menu_active_background_color, $menu_active_background_color_rgb );

            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'small_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'background-color' => $menu_active_background_color
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'large_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'background-color' => $menu_active_background_color
                ) );
            }

        }

        if ( moments_qodef_options()->getOptionValue('menu_light_hovercolor') !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
			.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                'color' => moments_qodef_options()->getOptionValue('menu_light_hovercolor') . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue('menu_light_activecolor') !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => moments_qodef_options()->getOptionValue('menu_light_activecolor') . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue('menu_dark_hovercolor') !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
			.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                'color' => moments_qodef_options()->getOptionValue('menu_dark_hovercolor') . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue('menu_dark_activecolor') !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => moments_qodef_options()->getOptionValue('menu_dark_activecolor') . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( moments_qodef_options()->getOptionValue('menu_light_border_color') !== '' ) {
                $light = moments_qodef_options()->getOptionValue('menu_light_border_color');

                if ( moments_qodef_options()->getOptionValue('menu_item_style') == 'small_item' ) {
                    echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
					.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border-color' => $light
                    ));
                }
                if ( moments_qodef_options()->getOptionValue('menu_item_style') == 'large_item' ) {
                    echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
					.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                        'border-color' => $light
                    ));
                }

            }
            if ( moments_qodef_options()->getOptionValue('menu_dark_border_color') !== '' ) {
                $dark = moments_qodef_options()->getOptionValue('menu_dark_border_color');

                if ( moments_qodef_options()->getOptionValue('menu_item_style') == 'small_item' ) {
                    echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
					.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border-color' => $dark
                    ));
                }
                if ( moments_qodef_options()->getOptionValue('menu_item_style') == 'large_item' ) {
                    echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
					.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                        'border-color' => $dark
                    ));
                }

            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_lineheight' ) !== '' || moments_qodef_options()->getOptionValue( 'menu_padding_left_right' ) !== '' ) {
            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                'line-height' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_lineheight' ) ) . 'px',
                'padding'     => '0 ' . moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_padding_left_right' ) ) . 'px'
            ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'menu_margin_left_right' ) !== '' ) {
            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li', array(
                'margin'     => '0 ' . moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'menu_margin_left_right' ) ) . 'px'
            ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' && moments_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li a span.item_inner', array(
                    'color' => '#000'
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                    'color' => '#000'
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'color' => '#000'
                ) );
            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' && moments_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li > a', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li > a', array(
                    'color' => '#000'
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'color' => '#000'
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'color' => '#fff'
                ) );
                echo moments_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'color' => '#000'
                ) );
            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border_double' && moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {

            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_border_color' ),
                        'display' => 'block'
                    ) );

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ),
                    ) );

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ),
                    ) );

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

            }

            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {

                if ( moments_qodef_options()->getOptionValue( 'menu_item_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li > a:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_border_color' ),
                        'display' => 'block'
                    ) );

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', array(
                        'border' => 'none'
                    ) );

                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ),
                    ) );

                    echo moments_qodef_dynamic_css( 'nav.main_menu > ul > li.qodef-active-item > a', array(
                        'border' => 'none'
                    ) );

                }

                if ( moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) == '' ) {

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li:hover > a:after', array(
                        'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ),
                    ) );

                    echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', array(
                        'border' => 'none'
                    ) );

                }

            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' && moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {

            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a span.item_inner', array(
                    'border-right' => 'none'
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a', array(
                    'border-right' => 'none'
                ) );
            }

        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' && moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover a span.item_inner', array(
                    'border-color' => moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' )
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'border-color' => moments_qodef_options()->getOptionValue( 'menu_item_hover_border_color' )
                ) );
            }
        }

        if ( moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' && moments_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'border-color' => moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' )
                ) );
            }
            if ( moments_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item a,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'border-color' => moments_qodef_options()->getOptionValue( 'menu_item_active_border_color' )
                ) );
            }
        }

        if ( moments_qodef_options()->getOptionValue( 'enable_menu_item_separators' ) == 'yes' && moments_qodef_options()->getOptionValue('menu_item_separators_color') !== '' ) {
            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.plus', array(
                'display' => 'block',
                'background-color' => moments_qodef_options()->getOptionValue( 'menu_item_separators_color' )
            ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'enable_menu_item_text_decoration' ) == 'yes' ) {

            $decoration = moments_qodef_options()->getOptionValue( 'menu_item_text_decoration_style' );

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner', array(
                'text-decoration' => $decoration
            ) );

            $active_decoration = moments_qodef_options()->getOptionValue( 'menu_item_active_text_decoration_style' );

            echo moments_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                'text-decoration' => $active_decoration
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_background_color' ) !== '' || moments_qodef_options()->getOptionValue( 'dropdown_background_transparency' ) !== '' ) {

            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = moments_qodef_options()->getOptionValue('dropdown_background_color') !== "" ? moments_qodef_options()->getOptionValue('dropdown_background_color') : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = moments_qodef_options()->getOptionValue('dropdown_background_transparency') !== "" ? moments_qodef_options()->getOptionValue('dropdown_background_transparency') : $dropdown_bg_transparency_initial;

            $dropdown_bg_color = moments_qodef_rgba_color( $dropdown_bg_color, $dropdown_bg_transparency );

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul,
			.qodef-drop-down .second .inner ul li ul,
			.shopping_cart_dropdown,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-main-menu.qodef-default-nav #lang_sel ul ul,
			.qodef-main-menu.qodef-default-nav #lang_sel_click  ul ul,
			.header-widget.widget_nav_menu ul ul,
			.qodef-drop-down .wide.wide_background .second', array(
                'background-color' => $dropdown_bg_color
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_top_separator_color' ) !== '' ) {
            echo moments_qodef_dynamic_css( '.qodef-drop-down .second', array(
                'border-top-color' => moments_qodef_options()->getOptionValue( 'dropdown_top_separator_color' )
            ) );
        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_top_padding' ) !== '' || moments_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'no' ) {

            $menu_inner_ul_top = 15; //default value without border
            if ( moments_qodef_options()->getOptionValue( 'dropdown_top_padding' ) !== '' ) {
                echo moments_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul,
				.qodef-drop-down .wide .second .inner > ul', array(
                    'padding-top' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_top_padding' ) ) . 'px'
                ) );
                $menu_inner_ul_top = $moments_qodef_options['dropdown_top_padding']; //overwrite default value
            }
            if ( moments_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'yes' ) {
                $menu_inner_ul_top += 1; //top border is 1px
            }

            echo moments_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul li ul,
			body.qodef-slide-from-bottom .qodef-drop-down .narrow .second .inner ul li:hover ul,
			body.qodef-slide-from-top .narrow .second .inner ul li:hover ul', array(
                'top' => '-' . $menu_inner_ul_top
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_bottom_padding' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .wide .second .inner > ul', array(
                'padding-bottom' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_bottom_padding' ) ) . 'px'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'enable_dropdown_top_separator' ) == 'no' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second', array(
                'border-top' => '0 !important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) == 'yes' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li:last-child > a,
			.qodef-drop-down .second .inner > ul > li > ul > li:last-child > a,
			.qodef-drop-down .second .inner > ul > li > ul > li > ul > li:last-child > a', array(
                'border-bottom' => '1px solid transparent'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) !== 'yes' && moments_qodef_options()->getOptionValue( 'dropdown_separator_color' ) != '') {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li a,
			.header-widget.widget_nav_menu ul.menu li ul li a', array(
                'border-color' => moments_qodef_options()->getOptionValue( 'dropdown_separator_color' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) == 'yes' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li,
			.header-widget.widget_nav_menu ul.menu li ul li', array(
                'border-bottom' => '1px solid ' . moments_qodef_options()->getOptionValue( 'dropdown_separator_color' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_vertical_separator_color' ) !== '') {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second ul li', array(
                'border-left-color' => moments_qodef_options()->getOptionValue( 'dropdown_vertical_separator_color' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_top_position' ) !== '' ) {

            echo moments_qodef_dynamic_css( 'header .qodef-drop-down .second', array(
                'border-left-color' => moments_qodef_options()->getOptionValue( 'dropdown_top_position' ) . '%'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'yes' && moments_qodef_options()->getOptionValue('dropdown_border_around_color') !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .narrow .second .inner ul li ul,
			.shopping_cart_dropdown,
			.shopping_cart_dropdown ul li', array(
                'border-left-color' => moments_qodef_options()->getOptionValue( 'dropdown_border_around_color' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'no' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner>ul,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .narrow .second .inner ul li ul', array(
                'border' => 'none'
            ) );

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul.right li ul', array(
                'margin-left' => 0
            ) );

        }

        $dropdown_styles_array = array();

        if ( moments_qodef_options()->getOptionValue( 'dropdown_color' ) !== '' ) {
            $dropdown_styles_array['color'] = moments_qodef_options()->getOptionValue( 'dropdown_color' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_google_fonts' ) !== '-1' ) {
            $dropdown_styles_array['font-family'] = moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( 'dropdown_google_fonts' ) );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontsize' ) !== '' ) {
            $dropdown_styles_array['font-size'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_fontsize' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_lineheight' ) !== '' ) {
            $dropdown_styles_array['line-height'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_lineheight' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontstyle' ) !== '' ) {
            $dropdown_styles_array['font-style'] = moments_qodef_options()->getOptionValue( 'dropdown_fontstyle' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontweight' ) !== '' ) {
            $dropdown_styles_array['font-weight'] = moments_qodef_options()->getOptionValue( 'dropdown_fontweight' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_texttransform' ) !== '' ) {
            $dropdown_styles_array['text-transform'] = moments_qodef_options()->getOptionValue( 'dropdown_texttransform' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_letterspacing' ) !== '' ) {
            $dropdown_styles_array['letter-spacing'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_letterspacing' ) );
        }

        echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li > a,
			.qodef-drop-down .second .inner > ul > li > h4,
			.qodef-drop-down .wide .second .inner > ul > li > h4,
			.qodef-drop-down .wide .second .inner > ul > li > a,
			.qodef-drop-down .wide .second ul li ul li.menu-item-has-children > a,
			.qodef-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
			.qodef-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4 a,
			.qodef-drop-down .wide .second .inner > ul li .flexslider ul li  h4 a,
			.qodef-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4,
			.qodef-drop-down .wide .second .inner > ul li .flexslider ul li  h4,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li li a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul ul a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul ul a', $dropdown_styles_array );

        if ( moments_qodef_options()->getOptionValue( 'dropdown_color' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.shopping_cart_dropdown ul li
			.item_info_holder .item_left a,
			.shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount', array(
                'color' => moments_qodef_options()->getOptionValue( 'dropdown_color' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_hovercolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li:hover > a,
			.qodef-drop-down .wide .second ul li ul li.menu-item-has-children:hover > a,
			.qodef-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children:hover > a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li li:hover a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li:hover a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li:hover > a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li:hover > a', array(
                'color' => moments_qodef_options()->getOptionValue( 'dropdown_hovercolor' ) . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_background_hovercolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down li:not(.wide) .second .inner > ul > li:hover', array(
                'background-color' => moments_qodef_options()->getOptionValue( 'dropdown_background_hovercolor' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
			.qodef-drop-down .second .inner ul li a,
			.qodef-drop-down .wide .second ul li a,
			.qodef-drop-down .second .inner ul.right li a', array(
                'padding-top'    => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) ),
                'padding-bottom' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) )
            ) );

        }

        $dropdown_wide_styles = array();
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_color' ) !== '' ) {
            $dropdown_wide_styles['color'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_color' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts' ) !== '-1' ) {
            $dropdown_wide_styles['font-family'] = moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts' ) );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontsize' ) !== '' ) {
            $dropdown_wide_styles['font-size'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontsize' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_lineheight' ) !== '' ) {
            $dropdown_wide_styles['line-height'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_lineheight' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle' ) !== '' ) {
            $dropdown_wide_styles['font-style'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontweight' ) !== '' ) {
            $dropdown_wide_styles['font-weight'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_fontweight' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_texttransform' ) !== '' ) {
            $dropdown_wide_styles['text-transform'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_texttransform' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing' ) !== '' ) {
            $dropdown_wide_styles['letter-spacing'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing' ) ) . 'px';
        }

        echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li > a', $dropdown_wide_styles );


        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li:hover > a', array(
                'color' => moments_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor' ) . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li:hover > a', array(
                'background-color' => moments_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor' )
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
			.qodef-drop-down .wide .second .inner ul li a,
			.qodef-drop-down .wide .second ul li a,
			.qodef-drop-down .wide .second .inner ul.right li a', array(
                'padding-top'    => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) ) . 'px',
                'padding-bottom' => moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) ) . 'px'
            ) );

        }

        $dropdown_thirdlvl_styles = array();
        if ( moments_qodef_options()->getOptionValue( 'dropdown_color_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['color'] = moments_qodef_options()->getOptionValue( 'dropdown_color_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_google_fonts_thirdlvl' ) !== '-1' ) {
            $dropdown_thirdlvl_styles['font-family'] = moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( 'dropdown_google_fonts_thirdlvl' ) );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontsize_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-size'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_fontsize_thirdlvl' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_lineheight_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['line-height'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_lineheight_thirdlvl' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontstyle_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-style'] = moments_qodef_options()->getOptionValue( 'dropdown_fontstyle_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_fontweight_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-weight'] = moments_qodef_options()->getOptionValue( 'dropdown_fontweight_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_texttransform_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['text-transform'] = moments_qodef_options()->getOptionValue( 'dropdown_texttransform_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_letterspacing_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['letter-spacing'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_letterspacing_thirdlvl' ) ) . 'px';
        }

        echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li a', $dropdown_thirdlvl_styles );

        if ( moments_qodef_options()->getOptionValue( 'dropdown_hovercolor_thirdlvl' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
			.qodef-drop-down .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next)', array(
                'color' => moments_qodef_options()->getOptionValue( 'dropdown_hovercolor_thirdlvl' ) . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_background_hovercolor_thirdlvl' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li:hover,
			.qodef-drop-down .second .inner ul li ul li:hover', array(
                'background-color' => moments_qodef_options()->getOptionValue( 'dropdown_background_hovercolor_thirdlvl' )
            ) );

        }

        $dropdown_wide_thirdlvl_styles = array();
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_color_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['color'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_color_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts_thirdlvl' ) !== '-1' ) {
            $dropdown_wide_thirdlvl_styles['font-family'] = moments_qodef_get_formatted_font_family( moments_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts_thirdlvl' ) );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontsize_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-size'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontsize_thirdlvl' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_lineheight_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['line-height'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_lineheight_thirdlvl' ) ) . 'px';
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-style'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_fontweight_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-weight'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_fontweight_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_texttransform_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['text-transform'] = moments_qodef_options()->getOptionValue( 'dropdown_wide_texttransform_thirdlvl' );
        }
        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['letter-spacing'] = moments_qodef_filter_px( moments_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing_thirdlvl' ) ) . 'px';
        }

        echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li a,
			.qodef-drop-down .wide .second ul li ul li a', $dropdown_wide_thirdlvl_styles );

        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor_thirdlvl' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
			.qodef-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover', array(
                'color' => moments_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor_thirdlvl' ) . '!important'
            ) );

        }

        if ( moments_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor_thirdlvl' ) !== '' ) {

            echo moments_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li:hover,
			.qodef-drop-down .wide .second .inner ul li ul li:hover', array(
                'background-color' => moments_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor_thirdlvl' )
            ) );

        }

    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_main_menu_styles');
}

if(!function_exists('moments_qodef_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function moments_qodef_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if(moments_qodef_options()->getOptionValue('vertical_dropdown_background_color') !== '') {
            $dropdown_styles['background-color'] = moments_qodef_options()->getOptionValue('vertical_dropdown_background_color');
        }

        $dropdown_selector = array(
            '.qodef-header-vertical .qodef-vertical-dropdown-float .menu-item .second',
            '.qodef-header-vertical .qodef-vertical-dropdown-float .second .inner ul ul'
        );

        echo moments_qodef_dynamic_css($dropdown_selector, $dropdown_styles);

        $fist_level_styles = array();
        $fist_level_hover_styles = array();

        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_color');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_fontsize').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_lineheight').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_letter_spacing').'px';
        }

        if(moments_qodef_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a:hover',
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a.qodef-active-item'
        );

        echo moments_qodef_dynamic_css($first_level_selector, $fist_level_styles);
        echo moments_qodef_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);

        $second_level_styles = array();
        $second_level_hover_styles = array();

        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontsize').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_lineheight').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_letter_spacing').'px';
        }

        if(moments_qodef_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a:hover',
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a.qodef-active-item'
        );

        echo moments_qodef_dynamic_css($second_level_selector, $second_level_styles);
        echo moments_qodef_dynamic_css($second_level_hover_selector, $second_level_hover_styles);

        $third_level_styles = array();
        $third_level_hover_styles = array();

        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontsize').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_lineheight').'px';
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_letter_spacing').'px';
        }

        if(moments_qodef_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = moments_qodef_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a:hover',
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a.qodef-active-item'
        );

        echo moments_qodef_dynamic_css($third_level_selector, $third_level_styles);
        echo moments_qodef_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_vertical_main_menu_styles');
}