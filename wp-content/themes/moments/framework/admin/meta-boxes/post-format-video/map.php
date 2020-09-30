<?php

/*** Video Post Format ***/

$video_post_format_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'post' ),
		'title' => esc_html__( 'Video Post Format', 'moments' ),
		'name'  => 'post_format_video_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'          => 'qodef_video_type_meta',
		'type'          => 'select',
		'label'         => esc_html__( 'Video Type', 'moments' ),
		'description'   => esc_html__( 'Choose video type', 'moments' ),
		'parent'        => $video_post_format_meta_box,
		'default_value' => 'social_networks',
		'options'       => array(
			'social_networks' => esc_html__( 'Youtube or Vimeo', 'moments' ),
			'self'            => esc_html__( 'Self Hosted', 'moments' )
		),
		'args'          => array(
			'dependence' => true,
			'hide'       => array(
				'social_networks' => '#qodef_qodef_video_self_hosted_container',
				'self'            => '#qodef_qodef_video_embedded_container'
			),
			'show'       => array(
				'social_networks' => '#qodef_qodef_video_embedded_container',
				'self'            => '#qodef_qodef_video_self_hosted_container'
			)
		)
	)
);

$qodef_video_embedded_container = moments_qodef_add_admin_container(
	array(
		'parent'          => $video_post_format_meta_box,
		'name'            => 'qodef_video_embedded_container',
		'hidden_property' => 'qodef_video_type_meta',
		'hidden_value'    => 'self'
	)
);

$qodef_video_self_hosted_container = moments_qodef_add_admin_container(
	array(
		'parent'          => $video_post_format_meta_box,
		'name'            => 'qodef_video_self_hosted_container',
		'hidden_property' => 'qodef_video_type_meta',
		'hidden_value'    => 'social_networks'
	)
);


moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_video_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Video URL', 'moments' ),
		'description' => esc_html__( 'Enter Video URL', 'moments' ),
		'parent'      => $qodef_video_embedded_container,

	)
);


moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_video_image_meta',
		'type'        => 'image',
		'label'       => esc_html__( 'Video Image', 'moments' ),
		'description' => esc_html__( 'Upload video image', 'moments' ),
		'parent'      => $qodef_video_self_hosted_container,

	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_video_webm_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Video WEBM', 'moments' ),
		'description' => esc_html__( 'Enter video URL for WEBM format', 'moments' ),
		'parent'      => $qodef_video_self_hosted_container,

	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_video_mp4_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Video MP4', 'moments' ),
		'description' => esc_html__( 'Enter video URL for MP4 format', 'moments' ),
		'parent'      => $qodef_video_self_hosted_container,

	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_post_video_ogv_link_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Video OGV', 'moments' ),
		'description' => esc_html__( 'Enter video URL for OGV format', 'moments' ),
		'parent'      => $qodef_video_self_hosted_container,

	)
);