<?php
/**
 * Genesis jane james child theme.
 *
 * Theme supports.
 *
 * @package Genesis jane james
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis-sample/
 */

return [
	'genesis-custom-logo'             => [
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	],
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	],
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	],
	'genesis-lazy-load-images'        => '',
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 3,
	'genesis-menus'                   => [
		'primary'   => __( 'Header Menu', 'genesis-jane-james' ),
		'secondary' => __( 'Footer Menu', 'genesis-jane-james' ),
	],
];