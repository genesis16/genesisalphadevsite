<?php

/*** Link Post Format ***/

$link_post_format_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'post' ),
		'title' => esc_html__( 'Link Post Format', 'moments' ),
		'name'  => 'post_format_link_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_link_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Link', 'moments' ),
		'description' => esc_html__( 'Enter link', 'moments' ),
		'parent'      => $link_post_format_meta_box,

	)
);

