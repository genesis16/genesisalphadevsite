<?php

$custom_sidebars = moments_qodef_get_custom_sidebars();

$sidebar_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page', 'portfolio-item', 'post' ),
		'title' => esc_html__( 'Sidebar', 'moments' ),
		'name'  => 'sidebar_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_sidebar_meta',
		'type'        => 'select',
		'label'       => esc_html__( 'Layout', 'moments' ),
		'description' => esc_html__( 'Choose the sidebar layout', 'moments' ),
		'parent'      => $sidebar_meta_box,
		'options'     => array(
			''                 => esc_html__( 'Default', 'moments' ),
			'no-sidebar'       => esc_html__( 'No Sidebar', 'moments' ),
			'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'moments' ),
			'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'moments' ),
			'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'moments' ),
			'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'moments' ),
		)
	)
);

if ( count( $custom_sidebars ) > 0 ) {
	moments_qodef_create_meta_box_field( array(
		'name'        => 'qodef_custom_sidebar_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'moments' ),
		'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar', 'moments' ),
		'parent'      => $sidebar_meta_box,
		'options'     => $custom_sidebars
	) );
}
