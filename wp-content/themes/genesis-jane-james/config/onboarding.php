<?php
/**
 * Genesis jane james.
 *
 * Onboarding config to load plugins and homepage content on theme activation.
 *
 * @package Genesis jane james
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$genesis_jane_james_shared_content = genesis_get_config( 'onboarding-shared' );

return [
	'starter_packs' => [
		'black-white' => [
			'title'       => __( 'Black & White', 'genesis-jane-james' ),
			'description' => __( 'A pack with a homepage designed with black and white images.', 'genesis-jane-james' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/import/images/thumbnails/home-black-white.jpg',
			'demo_url'    => 'https://demo.studiopress.com/genesis-sample/',
			'config'      => [
				'dependencies'     => [
					'plugins' => $genesis_jane_james_shared_content['plugins'],
				],
				'content'          => array_merge(
					[
						'homepage' => [
							'post_title'     => 'Homepage',
							'post_content'   => require dirname( __FILE__ ) . '/import/content/home-black-white.php',
							'post_type'      => 'page',
							'post_status'    => 'publish',
							'comment_status' => 'closed',
							'ping_status'    => 'closed',
							'meta_input'     => [
								'_genesis_layout'     => 'full-width-content',
								'_genesis_hide_title' => true,
								'_genesis_hide_breadcrumbs' => true,
								'_genesis_hide_singular_image' => true,
							],
						],
					],
					$genesis_jane_james_shared_content['content']
				),
				'navigation_menus' => $genesis_jane_james_shared_content['navigation_menus'],
				'widgets'          => $genesis_jane_james_shared_content['widgets'],
			],
		],
		'color'       => [
			'title'       => __( 'Color', 'genesis-jane-james' ),
			'description' => __( 'A pack with a homepage designed with color images.', 'genesis-jane-james' ),
			'thumbnail'   => get_stylesheet_directory_uri() . '/config/import/images/thumbnails/home-color.jpg',
			'demo_url'    => 'https://demo.studiopress.com/genesis-sample/home-color/',
			'config'      => [
				'dependencies'     => [
					'plugins' => $genesis_jane_james_shared_content['plugins'],
				],
				'content'          => array_merge(
					[
						'homepage' => [
							'post_title'     => 'Homepage',
							'post_content'   => require dirname( __FILE__ ) . '/import/content/home-color.php',
							'post_type'      => 'page',
							'post_status'    => 'publish',
							'comment_status' => 'closed',
							'ping_status'    => 'closed',
							'meta_input'     => [
								'_genesis_layout'     => 'full-width-content',
								'_genesis_hide_title' => true,
								'_genesis_hide_breadcrumbs' => true,
								'_genesis_hide_singular_image' => true,
							],
						],
					],
					$genesis_jane_james_shared_content['content']
				),
				'navigation_menus' => $genesis_jane_james_shared_content['navigation_menus'],
				'widgets'          => $genesis_jane_james_shared_content['widgets'],
			],
		],
	],
];
