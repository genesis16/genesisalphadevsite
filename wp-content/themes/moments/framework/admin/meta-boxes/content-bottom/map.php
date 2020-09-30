<?php

$content_bottom_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page', 'portfolio-item', 'post' ),
		'title' => esc_html__( 'Content Bottom', 'moments' ),
		'name'  => 'content_bottom_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_enable_content_bottom_area_meta',
		'type'          => 'selectblank',
		'default_value' => '',
		'label'         => esc_html__( 'Enable Content Bottom Area', 'moments' ),
		'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'moments' ),
		'parent'        => $content_bottom_meta_box,
		'options'       => array(
			'no'  => esc_html__( 'No', 'moments' ),
			'yes' => esc_html__( 'Yes', 'moments' )
		),
		'args'          => array(
			'dependence' => true,
			'hide'       => array(
				''   => '#qodef_qodef_show_content_bottom_meta_container',
				'no' => '#qodef_qodef_show_content_bottom_meta_container'
			),
			'show'       => array(
				'yes' => '#qodef_qodef_show_content_bottom_meta_container'
			)
		)
	)
);

$show_content_bottom_meta_container = moments_qodef_add_admin_container(
	array(
		'parent'          => $content_bottom_meta_box,
		'name'            => 'qodef_show_content_bottom_meta_container',
		'hidden_property' => 'qodef_enable_content_bottom_area_meta',
		'hidden_value'    => '',
		'hidden_values'   => array( '', 'no' )
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_content_bottom_sidebar_custom_display_meta',
		'type'          => 'selectblank',
		'default_value' => '',
		'label'         => esc_html__( 'Sidebar to Display', 'moments' ),
		'description'   => esc_html__( 'Choose a Content Bottom sidebar to display', 'moments' ),
		'options'       => moments_qodef_get_custom_sidebars(),
		'parent'        => $show_content_bottom_meta_container
	)
);

moments_qodef_create_meta_box_field(
	array(
		'type'          => 'selectblank',
		'name'          => 'qodef_content_bottom_in_grid_meta',
		'default_value' => '',
		'label'         => esc_html__( 'Display in Grid', 'moments' ),
		'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'moments' ),
		'options'       => array(
			'no'  => esc_html__( 'No', 'moments' ),
			'yes' => esc_html__( 'Yes', 'moments' )
		),
		'parent'        => $show_content_bottom_meta_container
	)
);

moments_qodef_create_meta_box_field(
	array(
		'type'          => 'color',
		'name'          => 'qodef_content_bottom_background_color_meta',
		'default_value' => '',
		'label'         => esc_html__( 'Background Color', 'moments' ),
		'description'   => esc_html__( 'Choose a background color for Content Bottom area', 'moments' ),
		'parent'        => $show_content_bottom_meta_container
	)
);