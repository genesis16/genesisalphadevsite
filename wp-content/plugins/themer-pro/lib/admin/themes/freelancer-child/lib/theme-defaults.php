<?php
/**
 * This file adds theme settings unique to this Freelancer Child Theme.
 *
 * @package Freelancer Child
 */

add_filter( 'freelancer_default_settings', 'freelancer_child_default_settings' );
/**
* Updates child theme settings on reset.
* 
* Uncomment and adjust according to child theme requirements.
*
* @since 1.0.0
*/
function freelancer_child_default_settings( $defaults ) {

	//$defaults['site_layout'] = 'right_sidebar';
	//$defaults['pages_layout'] = 'no_sidebar_narrow';
	//$defaults['custom_logo_support'] = 0;
	//$defaults['custom_logo_image'] = 'logo.png';
	//$defaults['custom_logo_width'] = 200;
	//$defaults['custom_logo_height'] = 60;
	//$defaults['remove_site_title'] = 0;
	//$defaults['remove_site_description'] = 0;
	//$defaults['archive_content_type'] = 'full_content';
	//$defaults['archive_excerpt_length'] = 55;
	//$defaults['archive_featured_image'] = 0;
	//$defaults['archive_featured_image_size'] = 'thumbnail';
	//$defaults['archive_featured_image_alignment'] = 'alignnone';
	//$defaults['post_author_info'] = 1;
	//$defaults['post_comments'] = 1;
	//$defaults['page_comments'] = 0;
	//$defaults['header_scripts'] = '';
	//$defaults['footer_scripts'] = '';

	return $defaults;

}

add_action( 'after_switch_theme', 'freelancer_update_child_default_settings' );
/**
* Updates child theme settings on activation.
* 
* Uncomment and adjust according to child theme requirements.
*
* @since 1.0.0
*/
function freelancer_update_child_default_settings() {

	if ( function_exists( 'freelancer_update_settings' ) ) {

		freelancer_update_settings( array(
            //'site_layout' => 'right_sidebar',
            //'pages_layout' => 'no_sidebar_narrow',
            //'custom_logo_support' => 0,
            //'custom_logo_image' => 'logo.png',
            //'custom_logo_width' => 200,
            //'custom_logo_height' => 60,
            //'remove_site_title' => 0,
            //'remove_site_description' => 0,
            //'archive_content_type' => 'full_content',
            //'archive_excerpt_length' => 55,
            //'archive_featured_image' => 0,
            //'archive_featured_image_size' => 'thumbnail',
            //'archive_featured_image_alignment' => 'alignnone',
            //'post_author_info' => 1,
            //'post_comments' => 1,
            //'page_comments' => 0,
            //'header_scripts' => '',
            //'footer_scripts' => '',
		) );

	}

}
