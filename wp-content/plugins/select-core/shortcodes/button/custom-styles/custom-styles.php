<?php

if(!function_exists('moments_qodef_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function moments_qodef_button_typography_styles() {
        $selector = '.qodef-btn';
        $styles = array();

        $font_family = moments_qodef_options()->getOptionValue('button_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $text_transform = moments_qodef_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = moments_qodef_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = moments_qodef_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_button_typography_styles');
}

if(!function_exists('moments_qodef_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function moments_qodef_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.qodef-btn.qodef-btn-outline';

        if(moments_qodef_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = moments_qodef_options()->getOptionValue('btn_outline_text_color');
        }

        if(moments_qodef_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = moments_qodef_options()->getOptionValue('btn_outline_border_color');
        }

        echo moments_qodef_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(moments_qodef_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-color):hover',
                array('color' => moments_qodef_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(moments_qodef_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => moments_qodef_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(moments_qodef_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover',
                array('border-color' => moments_qodef_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_button_outline_styles');
}

if(!function_exists('moments_qodef_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function moments_qodef_button_solid_styles() {
        //solid styles
        $solid_selector = '.qodef-btn.qodef-btn-solid';
        $solid_styles = array();

        if(moments_qodef_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = moments_qodef_options()->getOptionValue('btn_solid_text_color');
        }

        if(moments_qodef_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = moments_qodef_options()->getOptionValue('btn_solid_border_color');
        }

        if(moments_qodef_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = moments_qodef_options()->getOptionValue('btn_solid_bg_color');
        }

        echo moments_qodef_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(moments_qodef_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-color):hover',
                array('color' => moments_qodef_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(moments_qodef_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => moments_qodef_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(moments_qodef_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo moments_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('border-color' => moments_qodef_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_button_solid_styles');
}