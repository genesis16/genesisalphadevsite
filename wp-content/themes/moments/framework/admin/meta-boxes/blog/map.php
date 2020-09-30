<?php

$qode_blog_categories = array();
$categories           = get_categories();
foreach ( $categories as $category ) {
	$qode_blog_categories[ $category->term_id ] = $category->name;
}

$blog_meta_box = moments_qodef_create_meta_box(
	array(
		'scope' => array( 'page' ),
		'title' => esc_html__( 'Blog', 'moments' ),
		'name'  => 'blog_meta'
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_blog_category_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__( 'Blog Category', 'moments' ),
		'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'moments' ),
		'parent'      => $blog_meta_box,
		'options'     => $qode_blog_categories
	)
);

moments_qodef_create_meta_box_field(
	array(
		'name'        => 'qodef_show_posts_per_page_meta',
		'type'        => 'text',
		'label'       => esc_html__( 'Number of Posts', 'moments' ),
		'description' => esc_html__( 'Enter the number of posts to display', 'moments' ),
		'parent'      => $blog_meta_box,
		'options'     => $qode_blog_categories,
		'args'        => array( "col_width" => 3 )
	)
);
	

