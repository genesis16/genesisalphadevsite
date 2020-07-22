<?php
if (!defined('ABSPATH')) {
	exit;
}
$pgc_sgb_slug = 'pgc-simply-gallery-block';

function pgc_sgb_menager_script()
{
	global $pgc_sgb_slug,
		$pgc_sgb_version,
		$pgc_sgb_skins_list,
		$pgc_sgb_skins_presets;

	/** Parser */
	wp_enqueue_script(
		$pgc_sgb_slug . '-script',
		plugins_url('/blocks/pgc_sgb.min.js', dirname(__FILE__)),
		false,
		$pgc_sgb_version,
		true
	);

	wp_localize_script(
		$pgc_sgb_slug . '-script',
		'PGC_SGB',
		array(
			//'ajaxurl'   => admin_url('admin-ajax.php'),
			//'nonce' => wp_create_nonce('pgc-sgb-nonce'),
			'assets' => plugins_url('/assets/', dirname(__FILE__)),
			'skinsFolder' => plugins_url('/blocks/skins/', dirname(__FILE__)),
			'skinsList' => $pgc_sgb_skins_list,
			/** Skins List */
			'skinsSettings' => $pgc_sgb_skins_presets,
		)
	);
}

function pgc_sgb_block_assets()
{
	global $pgc_sgb_slug,
		$pgc_sgb_version,
		$pgc_sgb_skins_list,
		$pgc_sgb_skins_presets;

	wp_register_style(
		$pgc_sgb_slug . '-frontend',
		plugins_url('blocks/blocks.uni.css', dirname(__FILE__)), // Block style CSS.
		array(),
		$pgc_sgb_version
	);
	wp_register_style(
		$pgc_sgb_slug . '-editor',
		plugins_url('dist/blocks.build.style.css', dirname(__FILE__)),
		array(),
		$pgc_sgb_version
	);
	wp_register_script(
		$pgc_sgb_slug . '-script',
		plugins_url('/blocks/pgc_sgb.min.js', dirname(__FILE__)),
		[],
		$pgc_sgb_version,
		true
	);
	wp_localize_script(
		$pgc_sgb_slug . '-script',
		'PGC_SGB',
		array(
			'ajaxurl'   => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('pgc-sgb-nonce'),
			'assets' => plugins_url('/assets/', dirname(__FILE__)),
			'skinsFolder' => plugins_url('/blocks/skins/', dirname(__FILE__)),
			'skinsList' => $pgc_sgb_skins_list,
			/** Skins List */
			'skinsSettings' => $pgc_sgb_skins_presets,
			'admin' => is_admin()
		)
	);
	wp_register_script(
		$pgc_sgb_slug . '-js',
		plugins_url('/dist/blocks.build.js', dirname(__FILE__)),
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-data', 'media', 'media-grid', $pgc_sgb_slug . '-script',),
		$pgc_sgb_version,
		false
	);
	register_block_type(
		'pgcsimplygalleryblock/masonry',
		array(
			'style'         => $pgc_sgb_slug . '-frontend',
			'editor_script' => $pgc_sgb_slug . '-js',
			'editor_style'  => $pgc_sgb_slug . '-editor',
		)
	);
	register_block_type(
		'pgcsimplygalleryblock/justified',
		array(
			'style'         => $pgc_sgb_slug . '-frontend',
			'editor_script' => $pgc_sgb_slug . '-js',
			'editor_style'  => $pgc_sgb_slug . '-editor',
		)
	);
	register_block_type(
		'pgcsimplygalleryblock/grid',
		array(
			'style'         => $pgc_sgb_slug . '-frontend',
			'editor_script' => $pgc_sgb_slug . '-js',
			'editor_style'  => $pgc_sgb_slug . '-editor',
		)
	);
}
add_action('init', 'pgc_sgb_block_assets');
add_action('wp_enqueue_scripts', 'pgc_sgb_menager_script');
