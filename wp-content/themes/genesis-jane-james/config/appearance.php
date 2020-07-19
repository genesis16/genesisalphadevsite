<?php
/**
 * Genesis jane james appearance settings.
 *
 * @package Genesis jane james
 * @author  Jane James
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$genesis_jane_james_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$genesis_jane_james_link_color = get_theme_mod(
	'genesis_jane_james_link_color',
	$genesis_jane_james_default_colors['link']
);

$genesis_jane_james_accent_color = get_theme_mod(
	'genesis_jane_james_accent_color',
	$genesis_jane_james_default_colors['accent']
);

$genesis_jane_james_link_color_contrast   = genesis_jane_james_color_contrast( $genesis_jane_james_link_color );
$genesis_jane_james_link_color_brightness = genesis_jane_james_color_brightness( $genesis_jane_james_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $genesis_jane_james_link_color,
	'button-color'         => $genesis_jane_james_link_color_contrast,
	'button-outline-hover' => $genesis_jane_james_link_color_brightness,
	'link-color'           => $genesis_jane_james_link_color,
	'default-colors'       => $genesis_jane_james_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'genesis-jane-james' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $genesis_jane_james_link_color,
		],
		[
			'name'  => __( 'Accent color', 'genesis-jane-james' ),
			'slug'  => 'theme-secondary',
			'color' => $genesis_jane_james_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'genesis-jane-james' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'genesis-jane-james' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'genesis-jane-james' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'genesis-jane-james' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
