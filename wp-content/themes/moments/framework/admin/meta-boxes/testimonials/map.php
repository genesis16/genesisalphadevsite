<?php

//Testimonials

$testimonial_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'testimonials' ),
		'title' => esc_html__( 'Testimonial', 'moments' ),
		'name'  => 'testimonial_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_testimonial_title',
		'type'        => 'text',
		'label'       => esc_html__( 'Title', 'moments' ),
		'description' => esc_html__( 'Enter testimonial title', 'moments' ),
		'parent'      => $testimonial_meta_box,
	)
);


moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_testimonial_author',
		'type'        => 'text',
		'label'       => esc_html__( 'Author', 'moments' ),
		'description' => esc_html__( 'Enter author name', 'moments' ),
		'parent'      => $testimonial_meta_box,
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_testimonial_author_position',
		'type'        => 'text',
		'label'       => esc_html__( 'Job Position', 'moments' ),
		'description' => esc_html__( 'Enter job position', 'moments' ),
		'parent'      => $testimonial_meta_box,
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_testimonial_text',
		'type'        => 'text',
		'label'       => esc_html__( 'Text', 'moments' ),
		'description' => esc_html__( 'Enter testimonial text', 'moments' ),
		'parent'      => $testimonial_meta_box,
	)
);