<?php

add_action( 'wp_head', 'freelancer_woocommerce_product_page_layout' );
/*
 * Set the layout for the WooCommerce 'product' custom post type pages.
 */
function freelancer_woocommerce_product_page_layout() {
    
    if ( 'product' != get_post_type() )
        return;
        
    /*
     * Set it to a full width, no sidebar layout.
     * To change the layout just edit the code below.
     */
    add_filter( 'freelancer_layout', 'freelancer_return_no_sidebar' );
    
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
add_action( 'woocommerce_before_main_content', 'freelancer_woocommerce_wrapper_start' );
/*
 * Conditionally remove the WooCommerce sidebar based on the current
 * Freelancer layout, and set the proper opening WooCommerce HTML tags.
 */
function freelancer_woocommerce_wrapper_start() {
    
	if ( freelancer_layout() != 'right_sidebar' && freelancer_layout() != 'left_sidebar' )
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

    echo '<div class="wrap">';
    echo '<div id="primary" class="content-area">';
    echo '<main id="main" class="site-main" role="main">';
    
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'freelancer_woocommerce_wrapper_end' );
/*
 * Set the proper closing WooCommerce HTML tags (BEFORE the sidebar).
 */
function freelancer_woocommerce_wrapper_end() {

    echo '</main><!-- end .site-main -->';
    echo '</div><!-- end .content-area -->';
    
}

add_action( 'woocommerce_sidebar', 'freelancer_woocommerce_sidebar_wrapper_end', 15 );
/*
 * Set the proper closing WooCommerce HTML tags (AFTER the sidebar).
 */
function freelancer_woocommerce_sidebar_wrapper_end() {

    echo '</div><!-- end .wrap -->';
    
}

add_action( 'after_setup_theme', 'freelancer_woocommerce_support' );
/*
 * Declare that Freelancer fully supports WooCommerce.
 */
function freelancer_woocommerce_support() {
    
    add_theme_support( 'woocommerce' );
    
}
