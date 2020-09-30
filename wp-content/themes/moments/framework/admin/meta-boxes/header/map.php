<?php

$header_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page', 'portfolio-item', 'post' ),
		'title' => esc_html__( 'Header', 'moments' ),
		'name'  => 'header_meta'
	)
);


$temp_holder_show             = '';
$temp_holder_hide             = '';
$temp_array_standard          = array();
$temp_array_vertical          = array();
$temp_array_centered          = array();
$temp_array_standard_centered = array();

switch ( moments_qodef_options()->getOptionValue( 'header_type' ) ) {

	case 'header-standard':
		$temp_holder_show = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_standard_centered_meta_container';
		$temp_holder_hide = '#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_centered_type_meta_container';

		$temp_array_standard          = array(
			'hidden_value'  => 'default',
			'hidden_values' => array( 'header-vertical', 'header-centered' )
		);
		$temp_array_vertical          = array(
			'hidden_values' => array( '', 'header-standard', 'header-centered' )
		);
		$temp_array_centered          = array(
			'hidden_values' => array( '', 'header-standard', 'header-vertical' )
		);
		$temp_array_standard_centered = array(
			'hidden_value'  => 'default',
			'hidden_values' => array( 'header-vertical' )
		);

		break;

	case 'header-centered':
		$temp_holder_show    = '#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_standard_centered_meta_container';
		$temp_holder_hide    = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container';
		$temp_array_standard = array(
			'hidden_values' => array( '', 'header-vertical', 'header-centered' )
		);

		$temp_array_vertical = array(
			'hidden_values' => array( '', 'header-standard', 'header-centered' )
		);

		$temp_array_centered = array(
			'hidden_value'  => 'default',
			'hidden_values' => array( 'header-vertical', 'header-standard' )
		);

		$temp_array_standard_centered = array(
			'hidden_value'  => 'default',
			'hidden_values' => array( 'header-vertical' )
		);

		break;

	case 'header-vertical':
		$temp_holder_show = '#qodef_qodef_header_vertical_type_meta_container';
		$temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_standard_centered_meta_container';

		$temp_array_standard          = array(
			'hidden_values' => array( '', 'header-vertical', 'header-centered' )
		);
		$temp_array_vertical          = array(
			'hidden_value'  => 'default',
			'hidden_values' => array( 'header-standard', 'header-centered' )
		);
		$temp_array_centered          = array(
			'hidden_values' => array( '', 'header-standard', 'header-vertical' )
		);
		$temp_array_standard_centered = array(
			'hidden_values' => array( '', 'header-standard', 'header-centered' )
		);
		break;

}


moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_header_type_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__( 'Choose Header Type', 'moments' ),
		'description'   => esc_html__( 'Select header type layout', 'moments' ),
		'parent'        => $header_meta_box,
		'options'       => array(
			''                => esc_html__( 'Default', 'moments' ),
			'header-standard' => esc_html__( 'Standard Header', 'moments' ),
			'header-centered' => esc_html__( 'Centered Header', 'moments' ),
			'header-vertical' => esc_html__( 'Vertical Header', 'moments' )

		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				""                => $temp_holder_hide,
				'header-standard' => '#qodef_qodef_header_vertical_type_meta_container,#qodef_qodef_header_centered_type_meta_container',
				'header-vertical' => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_standard_centered_meta_container',
				'header-centered' => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_vertical_type_meta_container'
			),
			"show"       => array(
				""                => $temp_holder_show,
				"header-standard" => '#qodef_qodef_header_standard_type_meta_container,#qodef_qodef_header_standard_centered_meta_container',
				"header-vertical" => '#qodef_qodef_header_vertical_type_meta_container',
				"header-centered" => '#qodef_qodef_header_centered_type_meta_container,#qodef_qodef_header_standard_centered_meta_container'
			)
		)
	)
);


$header_standard_type_meta_container = moments_qodef_add_admin_container(
	array_merge(
		array(
			'parent'          => $header_meta_box,
			'name'            => 'qodef_header_standard_type_meta_container',
			'hidden_property' => 'qodef_header_type_meta',

		),
		$temp_array_standard
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_menu_area_background_color_header_standard_meta',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'moments' ),
		'description' => esc_html__( 'Choose a background color for header area', 'moments' ),
		'parent'      => $header_standard_type_meta_container
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_menu_area_background_transparency_header_standard_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Transparency', 'moments' ),
		'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'moments' ),
		'parent'      => $header_standard_type_meta_container,
		'args'        => array(
			'col_width' => 2
		)
	)
);


$header_centered_type_meta_container = moments_qodef_add_admin_container(
	array_merge(
		array(
			'parent'          => $header_meta_box,
			'name'            => 'qodef_header_centered_type_meta_container',
			'hidden_property' => 'qodef_header_type_meta',

		),
		$temp_array_centered
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_menu_area_background_color_header_centered_meta',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'moments' ),
		'description' => esc_html__( 'Choose a background color for header centered type', 'moments' ),
		'parent'      => $header_centered_type_meta_container
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_menu_area_background_transparency_header_centered_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Transparency', 'moments' ),
		'description' => esc_html__( 'Choose a transparency for the header centered type (0 = fully transparent, 1 = opaque)', 'moments' ),
		'parent'      => $header_centered_type_meta_container,
		'args'        => array(
			'col_width' => 2
		)
	)
);

$header_vertical_type_meta_container = moments_qodef_add_admin_container(
	array_merge(
		array(
			'parent'          => $header_meta_box,
			'name'            => 'qodef_header_vertical_type_meta_container',
			'hidden_property' => 'qodef_header_type_meta',

		),
		$temp_array_vertical
	)
);

moments_qodef_create_meta_box_field( array(
	'name'        => 'qodef_vertical_header_background_color_meta',
	'type'        => 'color',
	'label'       => esc_html__( 'Background Color', 'moments' ),
	'description' => esc_html__( 'Set background color for vertical menu', 'moments' ),
	'parent'      => $header_vertical_type_meta_container
) );

moments_qodef_create_meta_box_field( array(
	'name'        => 'qodef_vertical_header_transparency_meta',
	'type'        => 'text',
	'label'       => esc_html__( 'Transparency', 'moments' ),
	'description' => esc_html__( 'Enter transparency for vertical menu (value from 0 to 1)', 'moments' ),
	'parent'      => $header_vertical_type_meta_container,
	'args'        => array(
		'col_width' => 1
	)
) );

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_vertical_header_background_image_meta',
		'type'          => 'image',
		'default_value' => '',
		'label'         => esc_html__( 'Background Image', 'moments' ),
		'description'   => esc_html__( 'Set background image for vertical menu', 'moments' ),
		'parent'        => $header_vertical_type_meta_container
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_disable_vertical_header_background_image_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__( 'Disable Background Image', 'moments' ),
		'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'moments' ),
		'parent'        => $header_vertical_type_meta_container
	)
);


$header_standard_centered_meta_container = moments_qodef_add_admin_container(
	array_merge(
		array(
			'parent'          => $header_meta_box,
			'name'            => 'qodef_header_standard_centered_meta_container',
			'hidden_property' => 'qodef_header_type_meta',
		),
		$temp_array_standard_centered
	)
);

$custom_sidebars = moments_qodef_get_custom_sidebars();

if ( count( $custom_sidebars ) > 0 ) {
	moments_qodef_create_meta_box_field( array(
		'name'        => 'qodef_custom_widget_area_header_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__( 'Choose Widget Area in Header', 'moments' ),
		'description' => esc_html__( 'Choose Custom Widget area to display in Header', 'moments' ),
		'parent'      => $header_standard_centered_meta_container,
		'options'     => $custom_sidebars
	) );
}

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_scroll_amount_for_sticky_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'moments' ),
		'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'moments' ),
		'parent'      => $header_standard_centered_meta_container,
		'args'        => array(
			'col_width' => 2,
			'suffix'    => 'px'
		)
	)
);


moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_header_style_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__( 'Header Skin', 'moments' ),
		'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'moments' ),
		'parent'        => $header_meta_box,
		'options'       => array(
			''             => '',
			'light-header' => esc_html__( 'Light', 'moments' ),
			'dark-header'  => esc_html__( 'Dark', 'moments' )
		)
	)
);

moments_qodef_create_meta_box_field(
	array(
		'parent'        => $header_meta_box,
		'type'          => 'select',
		'name'          => 'qodef_enable_header_style_on_scroll_meta',
		'default_value' => '',
		'label'         => esc_html__( 'Enable Header Style on Scroll', 'moments' ),
		'description'   => esc_html__( 'Enabling this option, header will change style depending on row settings for dark/light style', 'moments' ),
		'options'       => array(
			''    => '',
			'no'  => esc_html__( 'No', 'moments' ),
			'yes' => esc_html__( 'Yes', 'moments' )
		)
	)
);









