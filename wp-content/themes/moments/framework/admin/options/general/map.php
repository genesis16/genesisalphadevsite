<?php

if ( ! function_exists( 'moments_qodef_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function moments_qodef_general_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'moments' ),
				'icon'  => 'fa fa-institution'
			)
		);

		$panel_design_style = moments_qodef_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'moments' ),
				'parent'        => $panel_design_style
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'moments' ),
				'description'   => '',
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_additional_google_fonts_container"
				)
			)
		);

		$additional_google_fonts_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'moments' ),
				'parent'        => $additional_google_fonts_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'moments' ),
				'parent'        => $additional_google_fonts_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'moments' ),
				'parent'        => $additional_google_fonts_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'moments' ),
				'parent'        => $additional_google_fonts_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'moments' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'moments' ),
				'parent'        => $additional_google_fonts_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'moments' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'moments' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'moments' ),
					'100italic' => esc_html__( '100 Thin Italic', 'moments' ),
					'200'       => esc_html__( '200 Extra-Light', 'moments' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'moments' ),
					'300'       => esc_html__( '300 Light', 'moments' ),
					'300italic' => esc_html__( '300 Light Italic', 'moments' ),
					'400'       => esc_html__( '400 Regular', 'moments' ),
					'400italic' => esc_html__( '400 Regular Italic', 'moments' ),
					'500'       => esc_html__( '500 Medium', 'moments' ),
					'500italic' => esc_html__( '500 Medium Italic', 'moments' ),
					'600'       => esc_html__( '600 Semi-Bold', 'moments' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'moments' ),
					'700'       => esc_html__( '700 Bold', 'moments' ),
					'700italic' => esc_html__( '700 Bold Italic', 'moments' ),
					'800'       => esc_html__( '800 Extra-Bold', 'moments' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'moments' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'moments' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'moments' )
				),
				'args'          => array(
					'enable_empty_checkbox' => true,
					'inline_checkbox_class' => true
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'moments' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'moments' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'moments' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'moments' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'moments' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'moments' ),
					'greek'        => esc_html__( 'Greek', 'moments' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'moments' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'moments' )
				),
				'args'          => array(
					'enable_empty_checkbox' => true,
					'inline_checkbox_class' => true
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'predefined_style',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Predefined Font Style', 'moments' ),
				'description'   => esc_html__( 'Choose predefined font style', 'moments' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					''                  => esc_html__( 'Default', 'moments' ),
					'predefined-style1' => esc_html__( 'Style 1', 'moments' ),
					'predefined-style2' => esc_html__( 'Style 2', 'moments' ),
					'predefined-style3' => esc_html__( 'Style 3', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'moments' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #292929', 'moments' ),
				'parent'      => $panel_design_style
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'moments' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'moments' ),
				'parent'      => $panel_design_style
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'moments' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'moments' ),
				'parent'      => $panel_design_style
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'moments' ),
				'description'   => '',
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_boxed_container"
				)
			)
		);

		$boxed_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'moments' ),
				'description' => esc_html__( 'Choose the page background color outside box.', 'moments' ),
				'parent'      => $boxed_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'moments' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'moments' ),
				'parent'      => $boxed_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'moments' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'moments' ),
				'parent'      => $boxed_container
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'moments' ),
				'description'   => esc_html__( 'Choose background image attachment', 'moments' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__( 'Fixed', 'moments' ),
					'scroll' => esc_html__( 'Scroll', 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'moments' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"', 'moments' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					""          => esc_html__( "1100px - default", 'moments' ),
					"grid-1300" => esc_html__( "1300px", 'moments' ),
					"grid-1200" => esc_html__( "1200px", 'moments' ),
					"grid-1000" => esc_html__( "1000px", 'moments' ),
					"grid-800"  => esc_html__( "800px", 'moments' )
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'preload_pattern_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Preload Pattern Image', 'moments' ),
				'description' => esc_html__( 'Choose preload pattern image to be displayed until images are loaded ', 'moments' ),
				'parent'      => $panel_design_style
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'element_appear_amount',
				'type'        => 'text',
				'label'       => esc_html__( 'Element Appearance', 'moments' ),
				'description' => esc_html__( 'For animated elements, set distance (related to browser bottom) to start the animation', 'moments' ),
				'parent'      => $panel_design_style,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		$panel_settings = moments_qodef_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'moments' ),
				'parent'        => $panel_settings
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links.', 'moments' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_page_transitions_container"
				)
			)
		);

		$page_transitions_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'moments' ),
				'parent' => $page_transitions_container
			)
		);

		moments_qodef_add_admin_field( array(
			'type'          => 'select',
			'name'          => 'smooth_pt_spinner_type',
			'default_value' => '',
			'label'         => esc_html__( 'Spinner Type', 'moments' ),
			'parent'        => $page_transitions_container,
			'options'       => array(
				"pulse"                 => esc_html__( "Pulse", 'moments' ),
				"double_pulse"          => esc_html__( "Double Pulse", 'moments' ),
				"cube"                  => esc_html__( "Cube", 'moments' ),
				"rotating_cubes"        => esc_html__( "Rotating Cubes", 'moments' ),
				"stripes"               => esc_html__( "Stripes", 'moments' ),
				"wave"                  => esc_html__( "Wave", 'moments' ),
				"two_rotating_circles"  => esc_html__( "2 Rotating Circles", 'moments' ),
				"five_rotating_circles" => esc_html__( "5 Rotating Circles", 'moments' ),
				"atom"                  => esc_html__( "Atom", 'moments' ),
				"clock"                 => esc_html__( "Clock", 'moments' ),
				"mitosis"               => esc_html__( "Mitosis", 'moments' ),
				"lines"                 => esc_html__( "Lines", 'moments' ),
				"fussion"               => esc_html__( "Fussion", 'moments' ),
				"wave_circles"          => esc_html__( "Wave Circles", 'moments' ),
				"pulse_circles"         => esc_html__( "Pulse Circles", 'moments' ),
				"overlapping_diamonds"  => esc_html__( "Overlapping Diamonds", 'moments' )
			),
			'args'          => array(
				'dependence' => true,
				'hide'       => array(
					'overlapping_diamonds'  => '#qodef_spinner_single_color_container',
					'pulse'                 => '#qodef_spinner_multiple_color_container',
					'double_pulse'          => '#qodef_spinner_multiple_color_container',
					'cube'                  => '#qodef_spinner_multiple_color_container',
					'rotating_cubes'        => '#qodef_spinner_multiple_color_container',
					'stripes'               => '#qodef_spinner_multiple_color_container',
					'wave'                  => '#qodef_spinner_multiple_color_container',
					'two_rotating_circles'  => '#qodef_spinner_multiple_color_container',
					'five_rotating_circles' => '#qodef_spinner_multiple_color_container',
					'atom'                  => '#qodef_spinner_multiple_color_container',
					'clock'                 => '#qodef_spinner_multiple_color_container',
					'mitosis'               => '#qodef_spinner_multiple_color_container',
					'lines'                 => '#qodef_spinner_multiple_color_container',
					'fussion'               => '#qodef_spinner_multiple_color_container',
					'wave_circles'          => '#qodef_spinner_multiple_color_container',
					'pulse_circles'         => '#qodef_spinner_multiple_color_container',
				),
				'show'       => array(
					'pulse'                 => '#qodef_spinner_single_color_container',
					'double_pulse'          => '#qodef_spinner_single_color_container',
					'cube'                  => '#qodef_spinner_single_color_container',
					'rotating_cubes'        => '#qodef_spinner_single_color_container',
					'stripes'               => '#qodef_spinner_single_color_container',
					'wave'                  => '#qodef_spinner_single_color_container',
					'two_rotating_circles'  => '#qodef_spinner_single_color_container',
					'five_rotating_circles' => '#qodef_spinner_single_color_container',
					'atom'                  => '#qodef_spinner_single_color_container',
					'clock'                 => '#qodef_spinner_single_color_container',
					'mitosis'               => '#qodef_spinner_single_color_container',
					'lines'                 => '#qodef_spinner_single_color_container',
					'fussion'               => '#qodef_spinner_single_color_container',
					'wave_circles'          => '#qodef_spinner_single_color_container',
					'pulse_circles'         => '#qodef_spinner_single_color_container',
					'overlapping_diamonds'  => '#qodef_spinner_multiple_color_container',
				)
			)
		) );

		$spinner_single_color_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'spinner_single_color_container',
				'hidden_property' => 'smooth_pt_spinner_type',
				'hidden_value'    => 'overlapping_diamonds'
			)
		);

		$spinner_multiple_color_container = moments_qodef_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'spinner_multiple_color_container',
				'hidden_property' => 'smooth_pt_spinner_type',
				'hidden_values'   => array(
					'pulse',
					'double_pulse',
					'cube',
					'rotating_cubes',
					'stripes',
					'wave',
					'two_rotating_circles',
					'five_rotating_circles',
					'atom',
					'clock',
					'mitosis',
					'lines',
					'fussion',
					'wave_circles',
					'pulse_circles'
				)
			)
		);

		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'smooth_pt_spinner_color',
			'default_value' => '',
			'label'         => esc_html__( 'Spinner Color', 'moments' ),
			'parent'        => $spinner_single_color_container
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'smooth_pt_spinner_multiple_color_1',
			'default_value' => '',
			'label'         => esc_html__( 'Spinner First Color', 'moments' ),
			'parent'        => $spinner_multiple_color_container
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'smooth_pt_spinner_multiple_color_2',
			'default_value' => '',
			'label'         => esc_html__( 'Spinner Second Color', 'moments' ),
			'parent'        => $spinner_multiple_color_container
		) );

		moments_qodef_add_admin_field( array(
			'type'          => 'color',
			'name'          => 'smooth_pt_spinner_multiple_color_overlap',
			'default_value' => '',
			'label'         => esc_html__( 'Spinner Blend Color', 'moments' ),
			'parent'        => $spinner_multiple_color_container
		) );

		moments_qodef_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'moments' ),
				'parent'        => $panel_settings
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'moments' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'moments' ),
				'parent'        => $panel_settings
			)
		);

		$panel_custom_code = moments_qodef_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'moments' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'moments' ),
				'parent'      => $panel_custom_code
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'moments' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'moments' ),
				'parent'      => $panel_custom_code
			)
		);

		$panel_google_api = moments_qodef_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'moments' )
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'moments' ),
				'description' => esc_html__( 'Insert your Google Maps API key here', 'moments' ),
				'parent'      => $panel_google_api
			)
		);

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_general_options_map', 1 );

}