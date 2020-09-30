<?php

$general_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page', 'portfolio-item', 'post' ),
		'title' => esc_html__( 'General', 'moments' ),
		'name'  => 'general_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_boxed_meta',
		'type'        => 'select',
		'label'       => esc_html__( 'Boxed Layout', 'moments' ),
		'description' => esc_html__( 'Enabling this option will show boxed layout', 'moments' ),
		'parent'      => $general_meta_box,
		'options'     => array(
			''    => '',
			'yes' => esc_html__( 'Yes', 'moments' ),
			'no'  => esc_html__( 'No', 'moments' )
		)
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_page_background_color_meta',
		'type'          => 'color',
		'default_value' => '',
		'label'         => esc_html__( 'Page Background Color', 'moments' ),
		'description'   => esc_html__( 'Choose background color for page content', 'moments' ),
		'parent'        => $general_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_page_padding_meta',
		'type'          => 'text',
		'default_value' => '',
		'label'         => esc_html__( 'Page Padding', 'moments' ),
		'description'   => esc_html__( 'Insert padding in format 10px 10px 10px 10px', 'moments' ),
		'parent'        => $general_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_predefined_style_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__( 'Predefined Font Style', 'moments' ),
		'description'   => esc_html__( 'Choose a predefined font style for this page', 'moments' ),
		'parent'        => $general_meta_box,
		'options'       => array(
			''                  => esc_html__( 'Default', 'moments' ),
			'predefined-style1' => esc_html__( 'Style 1', 'moments' ),
			'predefined-style2' => esc_html__( 'Style 2', 'moments' ),
			'predefined-style3' => esc_html__( 'Style 3', 'moments' )
		)
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_page_slider_meta',
		'type'          => 'text',
		'default_value' => '',
		'label'         => esc_html__( 'Slider Shortcode', 'moments' ),
		'description'   => esc_html__( 'Paste your slider shortcode here', 'moments' ),
		'parent'        => $general_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_page_transition_type',
		'type'          => 'selectblank',
		'label'         => esc_html__( 'Page Transition', 'moments' ),
		'description'   => esc_html__( 'Choose the type of transition to this page', 'moments' ),
		'parent'        => $general_meta_box,
		'default_value' => '',
		'options'       => array(
			'no-animation' => esc_html__( 'No animation', 'moments' ),
			'fade'         => esc_html__( 'Fade', 'moments' )
		)
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_page_comments_guestbook_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__( 'Use Comments for Guestbook', 'moments' ),
		'description' => esc_html__( 'Enabling this option will show comments with guestbook labels (Note that this will work only if comments are enabled)', 'moments' ),
		'parent'      => $general_meta_box,
		'options'     => array(
			'no'  => esc_html__( 'No', 'moments' ),
			'yes' => esc_html__( 'Yes', 'moments' )
		)
	)
);