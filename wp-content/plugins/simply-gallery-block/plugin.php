<?php

/**
 * Plugin Name: SimpLy Gallery Block & Lightbox
 * Plugin URI: https://blockslib.com/galleryblock/
 * Description: The highly customizable lightbox for native WordPress galleries, WordPress attachments. And responsive gallery builder for Blocks WordPress Editor. SimpLy Photo Gallery is a suite of beautiful gallery Gutenberg blocks with next gen Lightbox for photographers, artists, writers and content marketers. This blocks set will help you create responsive images gallery with a beautiful lightbox. Three desired layout in one plugin - Masonry, Justified and Grid.
 * Author: GalleryCreator
 * Author URI: https://blockslib.com/
 * Version: 1.3.4
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package SimpLy Gallery Block
 */

/**
 * Exit if accessed directly.
 */

if (!defined('ABSPATH')) {
	exit;
}


$pgc_sgb_version = '1.3.4';
$pgc_sgb_skins_list = array();
$pgc_sgb_skins_presets = array();

function pgc_sgb_getGlobalPresets()
{
	global $pgc_sgb_version,
		$pgc_sgb_skins_list,
		$pgc_sgb_skins_presets;

	/** Skins List */
	$skins_folders = glob(realpath(dirname(__FILE__)) . '/blocks/skins/*.js');
	foreach ($skins_folders as $file) {
		$fileName = substr($file, strrpos($file, "/") + 1);
		$skinSlug = substr($fileName, 0, -3);
		$pgc_sgb_skins_list[$skinSlug] = plugins_url('/blocks/skins/', __FILE__) . $fileName . '?ver=' . $pgc_sgb_version;
		$pgc_sgb_skins_presets[$skinSlug] = get_option($skinSlug);
	}
}
add_action('init', 'pgc_sgb_getGlobalPresets', 1);

function pgc_sgb_update_def_settings()
{
	check_ajax_referer('pgc-sgb-nonce', 'nonce');

	$globaldata  =  stripslashes($_POST['props']);
	$json = json_decode($globaldata);
	$out = array();
	$out['message'] = array();

	foreach ($json as $key => $value) {
		$out['message'][$key] = update_option($key, $value);
	}
	header('Content-Type: application/json; charset=' . get_option('blog_charset'), true);
	echo json_encode($out);
	wp_die();
}
if (wp_doing_ajax()) {
	add_action('wp_ajax_pgc_sgb_update_def_settings', 'pgc_sgb_update_def_settings');
}

require_once plugin_dir_path(__FILE__) . 'blocks/init.php';
require_once plugin_dir_path(__FILE__) . 'plugins/init.php';

add_filter('plugin_row_meta', 'pgc_sgb_reviews', 10, 2);
function pgc_sgb_reviews($meta_fields, $plugin_file_name)
{
	$wp_link = 'https://wordpress.org/support/plugin/simply-gallery-block';
	if (strpos($plugin_file_name, basename(__FILE__))) {
		$meta_fields[] = "<a href='" . $wp_link . "' target='_blank'>Support Forum</a>";
		$svg = "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>";

		$meta_fields[] = '<i class="pgc-sgb-rate-stars">' .
			'<a href="' . $wp_link . '/reviews/?rate=1#new-post" target="_blank">' . $svg . '</a>' .
			'<a href="' . $wp_link . '/reviews/?rate=2#new-post" target="_blank">' . $svg . '</a>' .
			'<a href="' . $wp_link . '/reviews/?rate=3#new-post" target="_blank">' . $svg . '</a>' .
			'<a href="' . $wp_link . '/reviews/?rate=4#new-post" target="_blank">' . $svg . '</a>' .
			'<a href="' . $wp_link . '/reviews/?rate=5#new-post" target="_blank">' . $svg . '</a>' .
			'</i>';
		echo "<style>"
			. ".pgc-sgb-rate-stars{display:inline-block;color:#ffb900;position:relative;top:3px;}"
			. ".pgc-sgb-rate-stars a {color:#ffb900;}"
			. ".pgc-sgb-rate-stars a svg{fill:#ffb900;}"
			. ".pgc-sgb-rate-stars a:hover svg{fill:#ffb900}"
			. ".pgc-sgb-rate-stars a:hover ~ a svg {fill:none;}"
			. "</style>";
	}

	return $meta_fields;
}

/** Multisite */
// function pgc_sgb_unfiltered_html_capability_to_editors( $caps, $cap, $user_id ) {

// 	if ( 'unfiltered_html' === $cap && user_can( $user_id, 'administrator' ) ) {
   
// 	$caps = array( 'unfiltered_html' );
   
// 	}
   
// 	return $caps;
//    }
// add_filter( 'map_meta_cap', 'pgc_sgb_unfiltered_html_capability_to_editors', 1, 3 );