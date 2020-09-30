<?php
if(!function_exists('moments_qodef_contact_form7_text_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 elements
     */
    function moments_qodef_contact_form7_text_styles_1() {
        $selector = array(
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date',
            '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
            '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date::-webkit-input-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea::-webkit-input-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:-moz-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:-moz-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date::-moz-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea::-moz-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:-ms-input-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:-ms-input-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $line_height = moments_qodef_options()->getOptionValue('cf7_style_1_text_line_height');
        if($line_height !== ''){
            $styles['line-height'] = moments_qodef_filter_px($line_height) . 'px';

            $padding_sum = 12; // taken from default style - padding top + padding bottom (2*6)
            $padding_top = moments_qodef_options()->getOptionValue('cf7_style_1_padding_top');
            $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_padding_bottom');
            if($padding_top !== ''){
                $padding_sum = (int)moments_qodef_filter_px($padding_top) + 6;
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_top) + (int)moments_qodef_filter_px($padding_bottom);
                }
            }
            else {
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_bottom) + 6;
                }
            }

            $styles['height'] = (int)moments_qodef_filter_px($line_height) + $padding_sum . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_1_text_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_1_text_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_1_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_1_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        $border_width = moments_qodef_options()->getOptionValue('cf7_style_1_border_width');
        if($border_width !== ''){
            $styles['border-width'] = moments_qodef_filter_px($border_width) . 'px';
        }

        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_1_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        $padding_top = moments_qodef_options()->getOptionValue('cf7_style_1_padding_top');
        if($padding_top !== ''){
            $styles['padding-top'] = moments_qodef_filter_px($padding_top) . 'px';
        }

        $padding_right = moments_qodef_options()->getOptionValue('cf7_style_1_padding_right');
        if($padding_right !== ''){
            $styles['padding-right'] = moments_qodef_filter_px($padding_right) . 'px';
        }

        $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_padding_bottom');
        if($padding_bottom !== ''){
            $styles['padding-bottom'] = moments_qodef_filter_px($padding_bottom) . 'px';
        }

        $padding_left = moments_qodef_options()->getOptionValue('cf7_style_1_padding_left');
        if($padding_left !== ''){
            $styles['padding-left'] = moments_qodef_filter_px($padding_left) . 'px';
        }

        $margin_top = moments_qodef_options()->getOptionValue('cf7_style_1_margin_top');
        if($margin_top !== ''){
            $styles['margin-top'] = moments_qodef_filter_px($margin_top) . 'px';
        }

        $margin_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_margin_bottom');
        if($margin_bottom !== ''){
            $styles['margin-bottom'] = moments_qodef_filter_px($margin_bottom) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);

        if(moments_qodef_options()->getOptionValue('cf7_style_1_textarea_height')) {
            $textarea_height = moments_qodef_options()->getOptionValue('cf7_style_1_textarea_height');
            echo moments_qodef_dynamic_css(
                '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
                array('height' => moments_qodef_filter_px($textarea_height).'px')
            );
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_text_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_focus_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 elements focus
     */
    function moments_qodef_contact_form7_focus_styles_1() {
        $selector = array(
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus',
            '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus',
            '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus',
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_focus_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus:-moz-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus:-moz-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus:-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus::-moz-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus::-moz-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus::-moz-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus:-ms-input-placeholder',
                    '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus:-ms-input-placeholder',
                    '.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus:-ms-input-placeholder',
                    '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_1_focus_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_focus_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_focus_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_1_focus_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_focus_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_focus_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_focus_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_label_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 label
     */
    function moments_qodef_contact_form7_label_styles_1() {
        $selector = array('.cf7_custom_style_1 p', '.cf7_custom_style_1 .wpcf7-list-item-label');
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_label_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_1_label_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $line_height = moments_qodef_options()->getOptionValue('cf7_style_1_label_line_height');
        if($line_height !== ''){
            $styles['line-height'] = moments_qodef_filter_px($line_height) . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_1_label_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_1_label_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_1_label_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_1_label_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_1_label_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_label_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_dropdown_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 dropdown
     */
    function moments_qodef_contact_form7_dropdown_styles_1() {
        $selector_container = array('.cf7_custom_style_1 .select2-container');
        $styles_container = array();

        $margin_top = moments_qodef_options()->getOptionValue('cf7_style_1_margin_top');
        if($margin_top !== ''){
            $styles_container['margin-top'] = moments_qodef_filter_px($margin_top) . 'px';
        }

        $margin_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_margin_bottom');
        if($margin_bottom !== ''){
            $styles_container['margin-bottom'] = moments_qodef_filter_px($margin_bottom) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_container, $styles_container);

        $selector_dropdown_holder = array('.cf7_custom_style_1 .select2-container .select2-choice','.cf7_custom_style_1 .select2-results .select2-result-label');
        $styles_dropdown_holder = array();

        $padding_top = moments_qodef_options()->getOptionValue('cf7_style_1_padding_top');
        if($padding_top !== ''){
            $styles_dropdown_holder['padding-top'] = moments_qodef_filter_px($padding_top) . 'px';
            echo moments_qodef_dynamic_css('.select2-container .select2-choice .select2-arrow b:after',
                array('padding-top' => moments_qodef_filter_px($padding_top) . 'px')
            );
        }

        $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_padding_bottom');
        if($padding_bottom !== ''){
            $styles_dropdown_holder['padding-bottom'] = moments_qodef_filter_px($padding_bottom) . 'px';
            echo moments_qodef_dynamic_css('.select2-container .select2-choice .select2-arrow b:after',
                array('padding-bottom' => moments_qodef_filter_px($padding_bottom) . 'px')
            );
        }

        $padding_left = moments_qodef_options()->getOptionValue('cf7_style_1_padding_left');
        if($padding_left !== ''){
            $styles_dropdown_holder['padding-left'] = moments_qodef_filter_px($padding_left) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_holder, $styles_dropdown_holder);

        $selector_dropdown_font = array(
            '.cf7_custom_style_1 .select2-results .select2-result-label',
            '.cf7_custom_style_1 .select2-container .select2-choice',
            '.cf7_custom_style_1 .select2-container.select2-container-active .select2-choice',
            '.cf7_custom_style_1 .select2-container.select2-container-active .select2-choices'
        );
        $styles_dropdown_font = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_text_color');
        if($color !== ''){
            $styles_dropdown_font['color'] = $color . '!important';
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_size');
        if($font_size !== ''){
            $styles_dropdown_font['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $padding_sum = 12; // taken from default style - padding top + padding bottom (2*6)
        $line_height = moments_qodef_options()->getOptionValue('cf7_style_1_text_line_height');
        if($line_height !== ''){
            $styles_dropdown_font['line-height'] = moments_qodef_filter_px($line_height) . 'px';

            $padding_top = moments_qodef_options()->getOptionValue('cf7_style_1_padding_top');
            $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_1_padding_bottom');
            if($padding_top !== ''){
                $padding_sum = (int)moments_qodef_filter_px($padding_top) + 6;
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_top) + (int)moments_qodef_filter_px($padding_bottom);
                }
            }
            else {
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_bottom) + 6;
                }
            }

            $styles_dropdown_font['height'] = (int)moments_qodef_filter_px($line_height) + $padding_sum . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles_dropdown_font['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_style');
        if(!empty($font_style)){
            $styles_dropdown_font['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_1_text_font_weight');
        if(!empty($font_weight)){
            $styles_dropdown_font['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_1_text_text_transform');
        if(!empty($text_transform)){
            $styles_dropdown_font['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_1_text_letter_spacing');
        if($letter_spacing !== ''){
            $styles_dropdown_font['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_font, $styles_dropdown_font);

        $selector_dropdown_background_color = array(
            '.cf7_custom_style_1 .select2-results .select2-result-label',
            '.cf7_custom_style_1 .select2-container .select2-choice'
        );
        $styles_dropdown_color = array();

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_1_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_background_transparency');
            }
            $styles_dropdown_color['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        echo moments_qodef_dynamic_css($selector_dropdown_background_color, $styles_dropdown_color);

        $selector_dropdown_border_color = array(
            '.cf7_custom_style_1 .select2-container .select2-choice',
            '.cf7_custom_style_1 .select2-drop-active',
            '.cf7_custom_style_1 .select2-container.select2-dropdown-open.select2-drop-above .select2-choice',
            '.cf7_custom_style_1 .select2-container.select2-dropdown-open.select2-drop-above .select2-choices',
            '.cf7_custom_style_1 .select2-drop-active.select2-drop.select2-drop-above',
            '.cf7_custom_style_1 .select2-results .select2-result-label',
            '.cf7_custom_style_1 .select2-drop-active.select2-drop.select2-drop-above'
        );
        $styles_dropdown_border_color = array();
        $border_color = moments_qodef_options()->getOptionValue('cf7_style_1_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_border_transparency');
            }
            $styles_dropdown_border_color['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }
        $border_width = moments_qodef_options()->getOptionValue('cf7_style_1_border_width');
        if($border_width !== ''){
            $styles_dropdown_border_color['border-width'] = moments_qodef_filter_px($border_width) . 'px';
            echo moments_qodef_dynamic_css(
                '.select2-drop.select2-drop-above',
                array('margin-top' => moments_qodef_filter_px($border_width).'px')
            );
            echo moments_qodef_dynamic_css(
                '.select2-drop',
                array('margin-top' => '-' . moments_qodef_filter_px($border_width).'px')
            );
        }

        echo moments_qodef_dynamic_css($selector_dropdown_border_color, $styles_dropdown_border_color);

        $selector_dropdown_border_radius = array(
            '.cf7_custom_style_1 .select2-container .select2-choice',
            '.cf7_custom_style_1 .select2-drop.select2-drop-active',
            '.cf7_custom_style_1 .select2-container.select2-dropdown-open.select2-drop-above .select2-choice',
            '.cf7_custom_style_1 .select2-container.select2-dropdown-open.select2-drop-above .select2-choices',
            '.cf7_custom_style_1 .select2-drop-active.select2-drop.select2-drop-above'
        );
        $styles_dropdown_border_radius = array();
        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_1_border_radius');
        if($border_radius !== ''){
            $styles_dropdown_border_radius['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_border_radius, $styles_dropdown_border_radius);

        $selector_dropdown_background_hover = array(
            '.cf7_custom_style_1 .select2-results .select2-highlighted .select2-result-label'
        );
        $styles_dropdown_background_hover = array();

        $background_hover_color = moments_qodef_options()->getOptionValue('cf7_style_1_dropdown_background_hover_color');
        $background_hover_opacity = 1;
        if($background_hover_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_dropdown_background_hover_transparency') !== ''){
                $background_hover_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_dropdown_background_hover_transparency');
            }
            $styles_dropdown_background_hover['background-color'] = moments_qodef_rgba_color($background_hover_color,$background_hover_opacity);
        }

        echo moments_qodef_dynamic_css($selector_dropdown_background_hover, $styles_dropdown_background_hover);

        $selector_dropdown_arrow_color = array(
            '.cf7_custom_style_1 .select2-container .select2-choice .select2-arrow b:after'
        );
        $styles_dropdown_arrow_color = array();
        $arrow_color = moments_qodef_options()->getOptionValue('cf7_style_1_dropdown_arrow_color');
        if($arrow_color !== ''){
            $styles_dropdown_arrow_color['color'] = $arrow_color;
        }

        echo moments_qodef_dynamic_css($selector_dropdown_arrow_color, $styles_dropdown_arrow_color);

    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_dropdown_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_button_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function moments_qodef_contact_form7_button_styles_1() {
        $selector = array(
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_button_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_1_button_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $height = moments_qodef_options()->getOptionValue('cf7_style_1_button_height');
        if($height !== ''){
            $styles['height'] = moments_qodef_filter_px($height) . 'px';

            echo moments_qodef_dynamic_css(
                array('.cf7_custom_style_1 .qodef-rsvp .qodef-form-bottom .wpcf7-form-control-wrap'),
                array('line-height' => $height . 'px')
            );
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_1_button_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_1_button_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_1_button_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_1_button_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_1_button_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_1_button_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_button_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_button_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_1_button_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_button_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_button_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        $border_width = moments_qodef_options()->getOptionValue('cf7_style_1_button_border_width');
        if($border_width !== ''){
            $styles['border-width'] = moments_qodef_filter_px($border_width) . 'px';
        }

        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_1_button_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        $padding_left_right = moments_qodef_options()->getOptionValue('cf7_style_1_button_padding');
        if($padding_left_right !== ''){
            $styles['padding-left'] = moments_qodef_filter_px($padding_left_right) . 'px';
            $styles['padding-right'] = moments_qodef_filter_px($padding_left_right) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_button_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_button_hover_styles_1')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function moments_qodef_contact_form7_button_hover_styles_1() {
        $selector = array(
            '.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover,
            .cf7_custom_style_1 input.wpcf7-form-control.wpcf7-submit:hover'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_bckg_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_bckg_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_1_button_hover_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_button_hover_styles_1');
}

if(!function_exists('moments_qodef_contact_form7_text_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 elements
     */
    function moments_qodef_contact_form7_text_styles_2() {
        $selector = array(
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date',
            '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
            '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date::-webkit-input-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea::-webkit-input-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:-moz-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:-moz-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date::-moz-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea::-moz-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:-ms-input-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:-ms-input-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $line_height = moments_qodef_options()->getOptionValue('cf7_style_2_text_line_height');
        if($line_height !== ''){
            $styles['line-height'] = moments_qodef_filter_px($line_height) . 'px';

            $padding_sum = 12; // taken from default style - padding top + padding bottom (2*6)
            $padding_top = moments_qodef_options()->getOptionValue('cf7_style_2_padding_top');
            $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_padding_bottom');
            if($padding_top !== ''){
                $padding_sum = (int)moments_qodef_filter_px($padding_top) + 6;
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_top) + (int)moments_qodef_filter_px($padding_bottom);
                }
            }
            else {
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_bottom) + 6;
                }
            }

            $styles['height'] = (int)moments_qodef_filter_px($line_height) + $padding_sum . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_2_text_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_2_text_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_2_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_2_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        $border_width = moments_qodef_options()->getOptionValue('cf7_style_2_border_width');
        if($border_width !== ''){
            $styles['border-width'] = moments_qodef_filter_px($border_width) . 'px';
        }

        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_2_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        $padding_top = moments_qodef_options()->getOptionValue('cf7_style_2_padding_top');
        if($padding_top !== ''){
            $styles['padding-top'] = moments_qodef_filter_px($padding_top) . 'px';
        }

        $padding_right = moments_qodef_options()->getOptionValue('cf7_style_2_padding_right');
        if($padding_right !== ''){
            $styles['padding-right'] = moments_qodef_filter_px($padding_right) . 'px';
        }

        $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_padding_bottom');
        if($padding_bottom !== ''){
            $styles['padding-bottom'] = moments_qodef_filter_px($padding_bottom) . 'px';
        }

        $padding_left = moments_qodef_options()->getOptionValue('cf7_style_2_padding_left');
        if($padding_left !== ''){
            $styles['padding-left'] = moments_qodef_filter_px($padding_left) . 'px';
        }

        $margin_top = moments_qodef_options()->getOptionValue('cf7_style_2_margin_top');
        if($margin_top !== ''){
            $styles['margin-top'] = moments_qodef_filter_px($margin_top) . 'px';
        }

        $margin_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_margin_bottom');
        if($margin_bottom !== ''){
            $styles['margin-bottom'] = moments_qodef_filter_px($margin_bottom) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);

        if(moments_qodef_options()->getOptionValue('cf7_style_2_textarea_height')) {
            $textarea_height = moments_qodef_options()->getOptionValue('cf7_style_2_textarea_height');
            echo moments_qodef_dynamic_css(
                '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
                array('height' => moments_qodef_filter_px($textarea_height).'px')
            );
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_text_styles_2');
}

if(!function_exists('moments_qodef_contact_form7_focus_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 elements focus
     */
    function moments_qodef_contact_form7_focus_styles_2() {
        $selector = array(
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus',
            '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus',
            '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus',
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_focus_text_color');
        if($color !== ''){
            $styles['color'] = $color;
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus::-webkit-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus::-webkit-input-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus:-moz-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus:-moz-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus:-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus:-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus::-moz-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus::-moz-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus::-moz-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus::-moz-placeholder'
                ),
                array('color' => $color)
            );
            echo moments_qodef_dynamic_css(
                array(
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus:-ms-input-placeholder',
                    '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus:-ms-input-placeholder',
                    '.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus:-ms-input-placeholder',
                    '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus:-ms-input-placeholder'
                ),
                array('color' => $color)
            );
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_2_focus_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_focus_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_focus_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_2_focus_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_focus_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_focus_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_focus_styles_2');
}

if(!function_exists('moments_qodef_contact_form7_label_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 label
     */
    function moments_qodef_contact_form7_label_styles_2() {
        $selector = array('.cf7_custom_style_2 p', '.cf7_custom_style_2 .wpcf7-list-item-label');
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_label_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_2_label_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $line_height = moments_qodef_options()->getOptionValue('cf7_style_2_label_line_height');
        if($line_height !== ''){
            $styles['line-height'] = moments_qodef_filter_px($line_height) . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_2_label_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_2_label_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_2_label_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_2_label_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_2_label_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_label_styles_2');
}

if(!function_exists('moments_qodef_contact_form7_dropdown_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 dropdown
     */
    function moments_qodef_contact_form7_dropdown_styles_2() {
        $selector_container = array('.cf7_custom_style_2 .select2-container');
        $styles_container = array();

        $margin_top = moments_qodef_options()->getOptionValue('cf7_style_2_margin_top');
        if($margin_top !== ''){
            $styles_container['margin-top'] = moments_qodef_filter_px($margin_top) . 'px';
        }

        $margin_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_margin_bottom');
        if($margin_bottom !== ''){
            $styles_container['margin-bottom'] = moments_qodef_filter_px($margin_bottom) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_container, $styles_container);

        $selector_dropdown_holder = array('.cf7_custom_style_2 .select2-container .select2-choice','.cf7_custom_style_2 .select2-results .select2-result-label');
        $styles_dropdown_holder = array();

        $padding_top = moments_qodef_options()->getOptionValue('cf7_style_2_padding_top');
        if($padding_top !== ''){
            $styles_dropdown_holder['padding-top'] = moments_qodef_filter_px($padding_top) . 'px';
            echo moments_qodef_dynamic_css('.select2-container .select2-choice .select2-arrow b:after',
                array('padding-top' => moments_qodef_filter_px($padding_top) . 'px')
            );
        }

        $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_padding_bottom');
        if($padding_bottom !== ''){
            $styles_dropdown_holder['padding-bottom'] = moments_qodef_filter_px($padding_bottom) . 'px';
            echo moments_qodef_dynamic_css('.select2-container .select2-choice .select2-arrow b:after',
                array('padding-bottom' => moments_qodef_filter_px($padding_bottom) . 'px')
            );
        }

        $padding_left = moments_qodef_options()->getOptionValue('cf7_style_2_padding_left');
        if($padding_left !== ''){
            $styles_dropdown_holder['padding-left'] = moments_qodef_filter_px($padding_left) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_holder, $styles_dropdown_holder);

        $selector_dropdown_font = array(
            '.cf7_custom_style_2 .select2-results .select2-result-label',
            '.cf7_custom_style_2 .select2-container .select2-choice',
            '.cf7_custom_style_2 .select2-container.select2-container-active .select2-choice',
            '.cf7_custom_style_2 .select2-container.select2-container-active .select2-choices'
        );
        $styles_dropdown_font = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_text_color');
        if($color !== ''){
            $styles_dropdown_font['color'] = $color . '!important';
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_size');
        if($font_size !== ''){
            $styles_dropdown_font['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $padding_sum = 12; // taken from default style - padding top + padding bottom (2*6)
        $line_height = moments_qodef_options()->getOptionValue('cf7_style_2_text_line_height');
        if($line_height !== ''){
            $styles_dropdown_font['line-height'] = moments_qodef_filter_px($line_height) . 'px';

            $padding_top = moments_qodef_options()->getOptionValue('cf7_style_2_padding_top');
            $padding_bottom = moments_qodef_options()->getOptionValue('cf7_style_2_padding_bottom');
            if($padding_top !== ''){
                $padding_sum = (int)moments_qodef_filter_px($padding_top) + 6;
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_top) + (int)moments_qodef_filter_px($padding_bottom);
                }
            }
            else {
                if($padding_bottom !== ''){
                    $padding_sum = (int)moments_qodef_filter_px($padding_bottom) + 6;
                }
            }

            $styles_dropdown_font['height'] = (int)moments_qodef_filter_px($line_height) + $padding_sum . 'px';
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles_dropdown_font['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_style');
        if(!empty($font_style)){
            $styles_dropdown_font['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_2_text_font_weight');
        if(!empty($font_weight)){
            $styles_dropdown_font['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_2_text_text_transform');
        if(!empty($text_transform)){
            $styles_dropdown_font['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_2_text_letter_spacing');
        if($letter_spacing !== ''){
            $styles_dropdown_font['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_font, $styles_dropdown_font);

        $selector_dropdown_background_color = array(
            '.cf7_custom_style_2 .select2-results .select2-result-label',
            '.cf7_custom_style_2 .select2-container .select2-choice'
        );
        $styles_dropdown_color = array();

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_2_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_background_transparency');
            }
            $styles_dropdown_color['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        echo moments_qodef_dynamic_css($selector_dropdown_background_color, $styles_dropdown_color);

        $selector_dropdown_border_color = array(
            '.cf7_custom_style_2 .select2-container .select2-choice',
            '.cf7_custom_style_2 .select2-drop-active',
            '.cf7_custom_style_2 .select2-container.select2-dropdown-open.select2-drop-above .select2-choice',
            '.cf7_custom_style_2 .select2-container.select2-dropdown-open.select2-drop-above .select2-choices',
            '.cf7_custom_style_2 .select2-drop-active.select2-drop.select2-drop-above',
            '.cf7_custom_style_2 .select2-results .select2-result-label',
            '.cf7_custom_style_2 .select2-drop-active.select2-drop.select2-drop-above'
        );
        $styles_dropdown_border_color = array();
        $border_color = moments_qodef_options()->getOptionValue('cf7_style_2_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_border_transparency');
            }
            $styles_dropdown_border_color['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }
        $border_width = moments_qodef_options()->getOptionValue('cf7_style_2_border_width');
        if($border_width !== ''){
            $styles_dropdown_border_color['border-width'] = moments_qodef_filter_px($border_width) . 'px';
            echo moments_qodef_dynamic_css(
                '.select2-drop.select2-drop-above',
                array('margin-top' => moments_qodef_filter_px($border_width).'px')
            );
            echo moments_qodef_dynamic_css(
                '.select2-drop',
                array('margin-top' => '-' . moments_qodef_filter_px($border_width).'px')
            );
        }

        echo moments_qodef_dynamic_css($selector_dropdown_border_color, $styles_dropdown_border_color);

        $selector_dropdown_border_radius = array(
            '.cf7_custom_style_2 .select2-container .select2-choice',
            '.cf7_custom_style_2 .select2-drop.select2-drop-active',
            '.cf7_custom_style_2 .select2-container.select2-dropdown-open.select2-drop-above .select2-choice',
            '.cf7_custom_style_2 .select2-container.select2-dropdown-open.select2-drop-above .select2-choices',
            '.cf7_custom_style_2 .select2-drop-active.select2-drop.select2-drop-above'
        );
        $styles_dropdown_border_radius = array();
        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_2_border_radius');
        if($border_radius !== ''){
            $styles_dropdown_border_radius['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        echo moments_qodef_dynamic_css($selector_dropdown_border_radius, $styles_dropdown_border_radius);

        $selector_dropdown_background_hover = array(
            '.cf7_custom_style_2 .select2-results .select2-highlighted .select2-result-label'
        );
        $styles_dropdown_background_hover = array();

        $background_hover_color = moments_qodef_options()->getOptionValue('cf7_style_2_dropdown_background_hover_color');
        $background_hover_opacity = 1;
        if($background_hover_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_dropdown_background_hover_transparency') !== ''){
                $background_hover_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_dropdown_background_hover_transparency');
            }
            $styles_dropdown_background_hover['background-color'] = moments_qodef_rgba_color($background_hover_color,$background_hover_opacity);
        }

        echo moments_qodef_dynamic_css($selector_dropdown_background_hover, $styles_dropdown_background_hover);

        $selector_dropdown_arrow_color = array(
            '.cf7_custom_style_2 .select2-container .select2-choice .select2-arrow b:after'
        );
        $styles_dropdown_arrow_color = array();
        $arrow_color = moments_qodef_options()->getOptionValue('cf7_style_2_dropdown_arrow_color');
        if($arrow_color !== ''){
            $styles_dropdown_arrow_color['color'] = $arrow_color;
        }

        echo moments_qodef_dynamic_css($selector_dropdown_arrow_color, $styles_dropdown_arrow_color);

    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_dropdown_styles_2');
}

if(!function_exists('moments_qodef_contact_form7_button_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function moments_qodef_contact_form7_button_styles_2() {
        $selector = array(
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_button_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $font_size = moments_qodef_options()->getOptionValue('cf7_style_2_button_font_size');
        if($font_size !== ''){
            $styles['font-size'] = moments_qodef_filter_px($font_size) . 'px';
        }

        $height = moments_qodef_options()->getOptionValue('cf7_style_2_button_height');
        if($height !== ''){
            $styles['height'] = moments_qodef_filter_px($height) . 'px';

            echo moments_qodef_dynamic_css(
                array('.cf7_custom_style_2 .qodef-rsvp .qodef-form-bottom .wpcf7-form-control-wrap'),
                array('line-height' => $height . 'px')
            );
        }

        $font_family = moments_qodef_options()->getOptionValue('cf7_style_2_button_font_family');
        if(moments_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = moments_qodef_get_font_option_val($font_family);
        }

        $font_style = moments_qodef_options()->getOptionValue('cf7_style_2_button_font_style');
        if(!empty($font_style)){
            $styles['font-style'] = $font_style;
        }

        $font_weight = moments_qodef_options()->getOptionValue('cf7_style_2_button_font_weight');
        if(!empty($font_weight)){
            $styles['font-weight'] = $font_weight;
        }

        $text_transform = moments_qodef_options()->getOptionValue('cf7_style_2_button_text_transform');
        if(!empty($text_transform)){
            $styles['text-transform'] = $text_transform;
        }

        $letter_spacing = moments_qodef_options()->getOptionValue('cf7_style_2_button_letter_spacing');
        if($letter_spacing !== ''){
            $styles['letter-spacing'] = moments_qodef_filter_px($letter_spacing) . 'px';
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_2_button_background_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_button_background_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_button_background_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_2_button_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_button_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_button_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        $border_width = moments_qodef_options()->getOptionValue('cf7_style_2_button_border_width');
        if($border_width !== ''){
            $styles['border-width'] = moments_qodef_filter_px($border_width) . 'px';
        }

        $border_radius = moments_qodef_options()->getOptionValue('cf7_style_2_button_border_radius');
        if($border_radius !== ''){
            $styles['border-radius'] = moments_qodef_filter_px($border_radius) . 'px';
        }

        $padding_left_right = moments_qodef_options()->getOptionValue('cf7_style_2_button_padding');
        if($padding_left_right !== ''){
            $styles['padding-left'] = moments_qodef_filter_px($padding_left_right) . 'px';
            $styles['padding-right'] = moments_qodef_filter_px($padding_left_right) . 'px';
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_button_styles_2');
}

if(!function_exists('moments_qodef_contact_form7_button_hover_styles_2')) {
    /**
     * Generates custom styles for Contact Form 7 button
     */
    function moments_qodef_contact_form7_button_hover_styles_2() {
        $selector = array(
            '.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover'
        );
        $styles = array();

        $color = moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_color');
        if($color !== ''){
            $styles['color'] = $color;
        }

        $background_color = moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_bckg_color');
        $background_opacity = 1;
        if($background_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency') !== ''){
                $background_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_bckg_transparency');
            }
            $styles['background-color'] = moments_qodef_rgba_color($background_color,$background_opacity);
        }

        $border_color = moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_border_color');
        $border_opacity = 1;
        if($border_color !== ''){
            if(moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_border_transparency') !== ''){
                $border_opacity = moments_qodef_options()->getOptionValue('cf7_style_2_button_hover_border_transparency');
            }
            $styles['border-color'] = moments_qodef_rgba_color($border_color,$border_opacity);
        }

        echo moments_qodef_dynamic_css($selector, $styles);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_contact_form7_button_hover_styles_2');
}