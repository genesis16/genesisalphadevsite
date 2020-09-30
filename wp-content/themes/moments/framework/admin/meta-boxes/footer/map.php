<?php

$footer_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page', 'portfolio-item', 'post' ),
		'title' => esc_html__( 'Footer', 'moments' ),
		'name'  => 'footer_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_disable_footer_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__( 'Disable Footer for this Page', 'moments' ),
		'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'moments' ),
		'parent'        => $footer_meta_box,
	)
);