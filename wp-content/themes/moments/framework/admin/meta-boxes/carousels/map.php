<?php

//Carousels

$carousel_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'carousels' ),
		'title' => esc_html__( 'Carousel', 'moments' ),
		'name'  => 'carousel_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_carousel_image',
		'type'        => 'image',
		'label'       => esc_html__( 'Carousel Image', 'moments' ),
		'description' => esc_html__( 'Choose carousel image (min width needs to be 215px)', 'moments' ),
		'parent'      => $carousel_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_carousel_hover_image',
		'type'        => 'image',
		'label'       => esc_html__( 'Carousel Hover Image', 'moments' ),
		'description' => esc_html__( 'Choose carousel hover image (min width needs to be 215px)', 'moments' ),
		'parent'      => $carousel_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_carousel_item_link',
		'type'        => 'text',
		'label'       => esc_html__( 'Link', 'moments' ),
		'description' => esc_html__( 'Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'moments' ),
		'parent'      => $carousel_meta_box
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_carousel_item_target',
		'type'        => 'selectblank',
		'label'       => esc_html__( 'Target', 'moments' ),
		'description' => esc_html__( 'Specify where to open the linked document', 'moments' ),
		'parent'      => $carousel_meta_box,
		'options'     => array(
			'_self'  => esc_html__( 'Self', 'moments' ),
			'_blank' => esc_html__( 'Blank', 'moments' )
		)
	)
);