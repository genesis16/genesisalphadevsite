<?php 

if(!function_exists('moments_qodef_accordions_typography_styles')){
	function moments_qodef_accordions_typography_styles(){
		$selector = '.qodef-accordion-holder .qodef-title-holder';		
		$styles = array();
		
		$font_family = moments_qodef_options()->getOptionValue('accordions_font_family');
		if(moments_qodef_is_font_option_valid($font_family)){
			$styles['font-family'] = moments_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = moments_qodef_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = moments_qodef_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = moments_qodef_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing).'px';
       }

       $font_weight = moments_qodef_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

        $font_size = moments_qodef_options()->getOptionValue('accordions_font_size');
        if($font_size !== '') {
            $styles['font-size'] = moments_qodef_filter_px($font_size).'px';
        }

       echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_accordions_typography_styles');
}

if(!function_exists('moments_qodef_accordions_inital_title_color_styles')){
	function moments_qodef_accordions_inital_title_color_styles(){
		$selector = '.qodef-accordion-holder.qodef-initial .qodef-title-holder';
		$styles = array();
		
		if(moments_qodef_options()->getOptionValue('accordions_title_color')) {
           $styles['color'] = moments_qodef_options()->getOptionValue('accordions_title_color');
       }
		echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_accordions_inital_title_color_styles');
}

if(!function_exists('moments_qodef_accordions_active_title_color_styles')){
	
	function moments_qodef_accordions_active_title_color_styles(){
		$selector = array(
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-active',
			'.qodef-accordion-holder.qodef-initial .qodef-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(moments_qodef_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = moments_qodef_options()->getOptionValue('accordions_title_color_active');
       }
		
		echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_accordions_active_title_color_styles');
}
if(!function_exists('moments_qodef_accordions_inital_icon_color_styles')){
	
	function moments_qodef_accordions_inital_icon_color_styles(){
		$selector = '.qodef-accordion-holder.qodef-initial .qodef-title-holder .qodef-accordion-mark';
		$styles = array();
		
		if(moments_qodef_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = moments_qodef_options()->getOptionValue('accordions_icon_color');
        }

		echo moments_qodef_dynamic_css($selector, $styles);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_accordions_inital_icon_color_styles');
}
if(!function_exists('moments_qodef_accordions_border_color_styles')){
	
	function moments_qodef_accordions_border_color_styles(){
		$selector_border_top = array(
			'.qodef-accordion-holder .qodef-title-holder'
		);
        $selector_border_bottom = array(
			'.qodef-accordion-holder .qodef-title-holder:last-of-type',
            '.qodef-accordion-holder .qodef-title-holder.ui-state-active'
		);
		$styles_border_top = array();
		$styles_border_bottom = array();

		if(moments_qodef_options()->getOptionValue('accordions_border_color')) {
            $styles_border_top['border-top-color'] = moments_qodef_options()->getOptionValue('accordions_border_color');
            $styles_border_bottom['border-bottom-color'] = moments_qodef_options()->getOptionValue('accordions_border_color');
        }
		echo moments_qodef_dynamic_css($selector_border_top, $styles_border_top);
		echo moments_qodef_dynamic_css($selector_border_bottom, $styles_border_bottom);
	}
	add_action('moments_qodef_style_dynamic', 'moments_qodef_accordions_border_color_styles');
}