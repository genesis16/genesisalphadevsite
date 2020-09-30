<?php
/**
 * Custom styles for woocommerce pages
 * Hooks to moments_qodef_style_dynamic hook
 */

if(!function_exists('moments_qodef_product_list_title_typography_styles')){
    function moments_qodef_product_list_title_typography_styles(){
        $selector = '.woocommerce .product .qodef-product-list-product-title,
                    .qodef-woocommerce-page .product .qodef-product-list-product-title';
        $styles = array();

        $font_family = moments_qodef_options()->getOptionValue('product_list_title_font_family');
        if(moments_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $text_transform = moments_qodef_options()->getOptionValue('product_list_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = moments_qodef_options()->getOptionValue('product_list_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('product_list_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = moments_qodef_options()->getOptionValue('product_list_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = moments_qodef_options()->getOptionValue('product_list_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = moments_qodef_filter_px($font_size).'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }
    add_action('moments_qodef_style_dynamic', 'moments_qodef_product_list_title_typography_styles');
}

if(!function_exists('moments_qodef_product_single_title_typography_styles')){
    function moments_qodef_product_single_title_typography_styles(){
        $selector = '.qodef-single-product-title';
        $styles = array();

        $font_family = moments_qodef_options()->getOptionValue('product_single_title_font_family');
        if(moments_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $text_transform = moments_qodef_options()->getOptionValue('product_single_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = moments_qodef_options()->getOptionValue('product_single_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('product_single_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = moments_qodef_options()->getOptionValue('product_single_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = moments_qodef_options()->getOptionValue('product_single_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = moments_qodef_filter_px($font_size).'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }
    add_action('moments_qodef_style_dynamic', 'moments_qodef_product_single_title_typography_styles');
}
