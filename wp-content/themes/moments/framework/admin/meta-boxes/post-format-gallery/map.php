<?php

/*** Gallery Post Format ***/

$gallery_post_format_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'post' ),
		'title' => esc_html__( 'Gallery Post Format', 'moments' ),
		'name'  => 'post_format_gallery_meta'
	)
);

moments_qodef_add_multiple_images_field(
	array(
		'name'        => 'qodef_post_gallery_images_meta',
		'label'       => esc_html__( 'Gallery Images', 'moments' ),
		'description' => esc_html__( 'Choose your gallery images', 'moments' ),
		'parent'      => $gallery_post_format_meta_box,
	)
);
