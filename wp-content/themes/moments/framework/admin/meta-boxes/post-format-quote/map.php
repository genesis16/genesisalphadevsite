<?php

/*** Quote Post Format ***/

$quote_post_format_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'post' ),
		'title' => esc_html__( 'Quote Post Format', 'moments' ),
		'name'  => 'post_format_quote_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_quote_text_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Quote Text', 'moments' ),
		'description' => esc_html__( 'Enter Quote text', 'moments' ),
		'parent'      => $quote_post_format_meta_box,

	)
);
