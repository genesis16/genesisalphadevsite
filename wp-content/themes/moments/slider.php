<?php
$slider_shortcode = get_post_meta(moments_qodef_get_page_id(), 'qodef_page_slider_meta', true);
if (!empty($slider_shortcode)) { 
	echo do_shortcode(wp_kses_post($slider_shortcode)); // XSS OK 
} 
?>