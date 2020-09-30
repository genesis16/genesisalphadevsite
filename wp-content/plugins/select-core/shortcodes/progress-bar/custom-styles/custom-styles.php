<?php
if(!function_exists('moments_qodef_progress_bar_title_styles')){
    function moments_qodef_progress_bar_title_styles(){
        $selector = '.qodef-progress-bar .qodef-progress-title-holder';
        $styles = array();

        if(moments_qodef_options()->getOptionValue('progress_bar_title_color')) {
            $styles['color'] = moments_qodef_options()->getOptionValue('progress_bar_title_color');
        }

        $font_family = moments_qodef_options()->getOptionValue('progress_bar_font_family');
        if(moments_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $text_transform = moments_qodef_options()->getOptionValue('progress_bar_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = moments_qodef_options()->getOptionValue('progress_bar_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('progress_bar_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = moments_qodef_options()->getOptionValue('progress_bar_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = moments_qodef_options()->getOptionValue('progress_bar_font_size');
        if($font_size !== '') {
            $styles['font-size'] = moments_qodef_filter_px($font_size).'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }
    add_action('moments_qodef_style_dynamic', 'moments_qodef_progress_bar_title_styles');
}

if(!function_exists('moments_qodef_progress_bar_number_styles')){
    function moments_qodef_progress_bar_number_styles(){
        $selector = '.qodef-progress-bar .qodef-progress-title-holder .qodef-progress-number-wrapper .qodef-progress-number';
        $styles = array();

        if(moments_qodef_options()->getOptionValue('progress_bar_number_color')) {
            $styles['color'] = moments_qodef_options()->getOptionValue('progress_bar_number_color');
        }
        if(moments_qodef_options()->getOptionValue('progress_bar_number_background_color')) {
            $styles['background-color'] = moments_qodef_options()->getOptionValue('progress_bar_number_background_color');
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }
    add_action('moments_qodef_style_dynamic', 'moments_qodef_progress_bar_number_styles');
}
if(!function_exists('moments_qodef_progress_bar_arrow_styles')){
    function moments_qodef_progress_bar_arrow_styles(){
        $selector = '.qodef-progress-bar .qodef-progress-title-holder .qodef-progress-number-wrapper .qodef-down-arrow';
        $styles = array();

        if(moments_qodef_options()->getOptionValue('progress_bar_number_background_color')) {
            $styles['border-top-color'] = moments_qodef_options()->getOptionValue('progress_bar_number_background_color');
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }
    add_action('moments_qodef_style_dynamic', 'moments_qodef_progress_bar_arrow_styles');
}