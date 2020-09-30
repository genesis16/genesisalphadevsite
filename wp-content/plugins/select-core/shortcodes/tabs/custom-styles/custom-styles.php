<?php
if(!function_exists('moments_qodef_tabs_typography_styles')){
	function moments_qodef_tabs_typography_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = moments_qodef_options()->getOptionValue('tabs_font_family');
		
		if(moments_qodef_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = moments_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = moments_qodef_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = moments_qodef_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = moments_qodef_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        $font_size = moments_qodef_options()->getOptionValue('tabs_font_size');
        if($font_size !== '') {
            $tabs_tipography_array['font-size'] = moments_qodef_filter_px($font_size).'px';
        }

        echo moments_qodef_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_tabs_typography_styles');
}

if(!function_exists('moments_qodef_tabs_inital_color_styles')){
	function moments_qodef_tabs_inital_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$styles = array();
		
		if(moments_qodef_options()->getOptionValue('tabs_color')) {
            $styles['color'] = moments_qodef_options()->getOptionValue('tabs_color');
        }
		
		echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_tabs_inital_color_styles');
}
if(!function_exists('moments_qodef_tabs_active_color_styles')){
	function moments_qodef_tabs_active_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li.ui-state-active a, .qodef-tabs .qodef-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(moments_qodef_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = moments_qodef_options()->getOptionValue('tabs_color_active');
        }
		
		echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_tabs_active_color_styles');
}