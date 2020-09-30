<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'post' ),
		'title' => esc_html__( 'Audio Post Format', 'moments' ),
		'name'  => 'post_format_audio_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_audio_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Link', 'moments' ),
		'description' => esc_html__( 'Enter audio link', 'moments' ),
		'parent'      => $audio_post_format_meta_box,

	)
);
