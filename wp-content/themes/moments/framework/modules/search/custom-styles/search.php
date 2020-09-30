<?php


if (!function_exists('moments_qodef_search_opener_icon_size')) {

	function moments_qodef_search_opener_icon_size()
	{

		if (moments_qodef_options()->getOptionValue('header_search_icon_size')) {
			echo moments_qodef_dynamic_css('.qodef-search-opener', array(
				'font-size' => moments_qodef_filter_px(moments_qodef_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_opener_icon_size');

}

if (!function_exists('moments_qodef_search_opener_icon_colors')) {

	function moments_qodef_search_opener_icon_colors()
	{

		if (moments_qodef_options()->getOptionValue('header_search_icon_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-opener', array(
				'color' => moments_qodef_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'color' => moments_qodef_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-light-header .qodef-top-bar .qodef-search-opener', array(
				'color' => moments_qodef_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (moments_qodef_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => moments_qodef_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (moments_qodef_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener', array(
				'color' => moments_qodef_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (moments_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => moments_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_opener_icon_colors');

}



if (!function_exists('moments_qodef_search_opener_spacing')) {

	function moments_qodef_search_opener_spacing()
	{
		$spacing_styles = array();

		if (moments_qodef_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (moments_qodef_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (moments_qodef_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (moments_qodef_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo moments_qodef_dynamic_css('.qodef-search-opener', $spacing_styles);
		}

	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_opener_spacing');
}

if (!function_exists('moments_qodef_search_bar_background')) {

	function moments_qodef_search_bar_background()
	{

		if (moments_qodef_options()->getOptionValue('search_background_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-cover .qodef-form-holder-outer', array(
				'background-color' => moments_qodef_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_bar_background');
}

if (!function_exists('moments_qodef_search_text_styles')) {

	function moments_qodef_search_text_styles()
	{
		$text_styles = array();

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = moments_qodef_options()->getOptionValue('search_text_color');
		}
		if (moments_qodef_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (moments_qodef_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = moments_qodef_options()->getOptionValue('search_text_texttransform');
		}
		if (moments_qodef_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (moments_qodef_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = moments_qodef_options()->getOptionValue('search_text_fontstyle');
		}
		if (moments_qodef_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = moments_qodef_options()->getOptionValue('search_text_fontweight');
		}
		if (moments_qodef_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qode_search_field::-webkit-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qode_search_field::-moz-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qode_search_field:-ms-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-field::-webkit-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-field::-moz-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}

		if (moments_qodef_options()->getOptionValue('search_text_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-field:-ms-input-placeholder', array(
				'color' => moments_qodef_options()->getOptionValue('search_text_color')
			));
		}


		if (!empty($text_styles)) {
			echo moments_qodef_dynamic_css('.qodef-search-slide-header-bottom input[type="text"], .qodef-search-cover input[type="text"], .qodef-fullscreen-search-holder .qodef-search-field, .qodef-search-slide-window-top input[type="text"]', $text_styles);
		}


	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_text_styles');
}



if (!function_exists('moments_qodef_search_close_icon_styles')) {

	function moments_qodef_search_close_icon_styles()
	{

		if (moments_qodef_options()->getOptionValue('search_close_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i, .qodef-search-cover .qodef-search-close span', array(
				'color' => moments_qodef_options()->getOptionValue('search_close_color')
			));
		}
		if (moments_qodef_options()->getOptionValue('search_close_hover_color') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i:hover, .qodef-search-cover .qodef-search-close span:hover', array(
				'color' => moments_qodef_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (moments_qodef_options()->getOptionValue('search_close_size') !== '') {
			echo moments_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i, .qodef-search-cover .qodef-search-close span', array(
				'font-size' => moments_qodef_filter_px(moments_qodef_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('moments_qodef_style_dynamic', 'moments_qodef_search_close_icon_styles');
}

?>
