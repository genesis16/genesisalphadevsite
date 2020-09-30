<?php

if ( ! function_exists( 'moments_qodef_blog_options_map' ) ) {

	function moments_qodef_blog_options_map() {

		moments_qodef_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__(
					'Blog',
					'moments'
				),
				'icon'  => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = moments_qodef_get_custom_sidebars();

		$panel_blog_lists = moments_qodef_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__(
					'Blog Lists',
					'moments'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__(
					'Blog Layout for Archive Pages',
					'moments'
				),
				'description'   => esc_html__(
					'Choose a default blog layout',
					'moments'
				),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'standard'            => esc_html__(
						'Blog: Standard',
						'moments'
					),
					'standard-whole-post' => esc_html__(
						'Blog: Standard Whole Post',
						'moments'
					)
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'        => 'archive_sidebar_layout',
				'type'        => 'select',
				'label'       => esc_html__(
					'Archive and Category Sidebar',
					'moments'
				),
				'description' => esc_html__(
					'Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists',
					'moments'
				),
				'parent'      => $panel_blog_lists,
				'options'     => array(
					'default'          => esc_html__(
						'No Sidebar',
						'moments'
					),
					'sidebar-33-right' => esc_html__(
						'Sidebar 1/3 Right',
						'moments'
					),
					'sidebar-25-right' => esc_html__(
						'Sidebar 1/4 Right',
						'moments'
					),
					'sidebar-33-left'  => esc_html__(
						'Sidebar 1/3 Left',
						'moments'
					),
					'sidebar-25-left'  => esc_html__(
						'Sidebar 1/4 Left',
						'moments'
					),
				)
			)
		);

		if ( count( $custom_sidebars ) > 0 ) {
			moments_qodef_add_admin_field(
				array(
					'name'        => 'blog_custom_sidebar',
					'type'        => 'selectblank',
					'label'       => esc_html__(
						'Sidebar to Display',
						'moments'
					),
					'description' => esc_html__(
						'Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"',
						'moments'
					),
					'parent'      => $panel_blog_lists,
					'options'     => moments_qodef_get_custom_sidebars()
				)
			);
		}

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'pagination',
				'default_value' => 'yes',
				'label'         => esc_html__(
					'Pagination',
					'moments'
				),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__(
					'Enabling this option will display pagination links on bottom of Blog Post List',
					'moments'
				),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_pagination_container'
				)
			)
		);

		$pagination_container = moments_qodef_add_admin_container(
			array(
				'name'            => 'qodef_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_lists,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $pagination_container,
				'type'          => 'text',
				'name'          => 'blog_page_range',
				'default_value' => '',
				'label'         => esc_html__(
					'Pagination Range limit',
					'moments'
				),
				'description'   => esc_html__(
					'Enter a number that will limit pagination to a certain range of links',
					'moments'
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		moments_qodef_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'pagination_type',
				'default_value' => 'standard_pagination',
				'label'         => esc_html__(
					'Pagination Type',
					'moments'
				),
				'parent'        => $pagination_container,
				'description'   => esc_html__(
					'Choose Pagination Type',
					'moments'
				),
				'options'       => array(
					'standard_paginaton'   => esc_html__(
						'Standard Pagination',
						'moments'
					),
					'load_more_pagination' => esc_html__(
						'Load More',
						'moments'
					),
					'navigation'           => esc_html__(
						'Navigation',
						'moments'
					)
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '',
				'label'         => esc_html__(
					'Number of Words in Excerpt',
					'moments'
				),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__(
					'Enter a number of words in excerpt (article summary)',
					'moments'
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		moments_qodef_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'standard_number_of_chars',
				'default_value' => '',
				'label'         => esc_html__(
					'Standard Type Number of Words in Excerpt',
					'moments'
				),
				'parent'        => $panel_blog_lists,
				'description'   => esc_html__(
					'Enter a number of words in excerpt (article summary)',
					'moments'
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = moments_qodef_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__(
					'Blog Single',
					'moments'
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__(
					'Sidebar Layout',
					'moments'
				),
				'description'   => esc_html__(
					'Choose a sidebar layout for Blog Single pages',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'options'       => array(
					'default'          => esc_html__(
						'No Sidebar',
						'moments'
					),
					'sidebar-33-right' => esc_html__(
						'Sidebar 1/3 Right',
						'moments'
					),
					'sidebar-25-right' => esc_html__(
						'Sidebar 1/4 Right',
						'moments'
					),
					'sidebar-33-left'  => esc_html__(
						'Sidebar 1/3 Left',
						'moments'
					),
					'sidebar-25-left'  => esc_html__(
						'Sidebar 1/4 Left',
						'moments'
					),
				),
				'default_value' => 'default'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__(
					'Show Post Title in Title Area',
					'moments'
				),
				'description'   => esc_html__(
					'Enabling this option will show post title in title area on single post pages',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);

		if ( count( $custom_sidebars ) > 0 ) {
			moments_qodef_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar',
					'type'        => 'selectblank',
					'label'       => esc_html__(
						'Sidebar to Display',
						'moments'
					),
					'description' => esc_html__(
						'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"',
						'moments'
					),
					'parent'      => $panel_blog_single,
					'options'     => moments_qodef_get_custom_sidebars()
				)
			);
		}
		moments_qodef_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__(
					'Show Comments',
					'moments'
				),
				'description'   => esc_html__(
					'Enabling this option will show comments on your page.',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__(
					'Show Related Posts',
					'moments'
				),
				'description'   => esc_html__(
					'Enabling this option will show related posts on your single post.',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__(
					'Enable Prev/Next Single Post Navigation Links',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__(
					'Enable navigation links through the blog posts (left and right arrows will appear)',
					'moments'
				),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = moments_qodef_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__(
					'Enable Navigation Only in Current Category',
					'moments'
				),
				'description'   => esc_html__(
					'Limit your navigation only through current category',
					'moments'
				),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'no',
				'label'         => esc_html__(
					'Show Author Info Box',
					'moments'
				),
				'parent'        => $panel_blog_single,
				'description'   => esc_html__(
					'Enabling this option will display author name and descriptions on Blog Single pages',
					'moments'
				),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = moments_qodef_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);

		moments_qodef_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__(
					'Show Author Email',
					'moments'
				),
				'description'   => esc_html__(
					'Enabling this option will show author email',
					'moments'
				),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Typography
		 */

		$panel_blog_typography = moments_qodef_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_typography',
				'title' => esc_html__(
					'Blog Typography',
					'moments'
				)
			)
		);

		// Standard post styles

		$group_blog_title = moments_qodef_add_admin_group(
			array(
				'title'       => esc_html__(
					'Standard Title Typography',
					'moments'
				),
				'name'        => 'group_blog_title',
				'parent'      => $panel_blog_typography,
				'description' => esc_html__(
					'Define custom styles for standard, audio, video and gallery post type title',
					'moments'
				),
			)
		);

		$typography_row = moments_qodef_add_admin_row(
			array(
				'name'   => 'typography_row',
				'next'   => true,
				'parent' => $group_blog_title
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'fontsimple',
				'name'          => 'blog_title_font_family',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Family',
					'moments'
				),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'selectsimple',
				'name'          => 'blog_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__(
					'Text Transform',
					'moments'
				),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'selectsimple',
				'name'          => 'blog_title_font_style',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Style',
					'moments'
				),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'textsimple',
				'name'          => 'blog_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__(
					'Letter Spacing',
					'moments'
				),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$typography_row2 = moments_qodef_add_admin_row(
			array(
				'name'   => 'typography_row2',
				'next'   => true,
				'parent' => $group_blog_title
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row2,
				'type'          => 'selectsimple',
				'name'          => 'blog_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Weight',
					'moments'
				),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row2,
				'type'          => 'textsimple',
				'name'          => 'blog_title_font_size',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Size',
					'moments'
				),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		// Quote/Link styles

		$group_blog_quote_link_title = moments_qodef_add_admin_group(
			array(
				'title'       => esc_html__(
					'Quote/Link Title Typography',
					'moments'
				),
				'name'        => 'group_blog_quote_link_title',
				'parent'      => $panel_blog_typography,
				'description' => esc_html__(
					'Define custom styles for quote and link post type title',
					'moments'
				),
			)
		);

		$typography_row = moments_qodef_add_admin_row(
			array(
				'name'   => 'typography_row',
				'next'   => true,
				'parent' => $group_blog_quote_link_title
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'fontsimple',
				'name'          => 'blog_quote_link_title_font_family',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Family',
					'moments'
				),
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'selectsimple',
				'name'          => 'blog_quote_link_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__(
					'Text Transform',
					'moments'
				),
				'options'       => moments_qodef_get_text_transform_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'selectsimple',
				'name'          => 'blog_quote_link_title_font_style',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Style',
					'moments'
				),
				'options'       => moments_qodef_get_font_style_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row,
				'type'          => 'textsimple',
				'name'          => 'blog_quote_link_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__(
					'Letter Spacing',
					'moments'
				),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$typography_row2 = moments_qodef_add_admin_row(
			array(
				'name'   => 'typography_row2',
				'next'   => true,
				'parent' => $group_blog_quote_link_title
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row2,
				'type'          => 'selectsimple',
				'name'          => 'blog_quote_link_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Weight',
					'moments'
				),
				'options'       => moments_qodef_get_font_weight_array()
			)
		);

		moments_qodef_add_admin_field(
			array(
				'parent'        => $typography_row2,
				'type'          => 'textsimple',
				'name'          => 'blog_quote_link_title_font_size',
				'default_value' => '',
				'label'         => esc_html__(
					'Font Size',
					'moments'
				),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

	}

	add_action( 'moments_qodef_options_map', 'moments_qodef_blog_options_map', 13 );

}