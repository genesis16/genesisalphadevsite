<?php
/**
 * This file adds functions to the Freelancer Child Theme.
 *
 * @package Freelancer Child
 */
 
// Initialize the Freelancer framework.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Child Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

/*
 * WooCommerce integration.
 *
 * If not needed then delete this include_once code as well as
 * the /lib/woocommerce-integration.php file that it points to.
 */
include_once( get_stylesheet_directory() . '/lib/woocommerce-integration.php' );

// Define Child Theme constants. Do not remove.
define( 'FREELANCER_CHILD_THEME_NAME', 'Freelancer Child' );
define( 'FREELANCER_CHILD_THEME_URL', 'https://cobaltapps.com/downloads/freelancer-framework/' );
define( 'FREELANCER_CHILD_THEME_VERSION', '1.0.1' );

/*
 * Uncomment the constants below to hide the Freelancer settings
 * and/or license admin pages from the WP Dashboard sidebar.
 */
//define( 'FREELANCER_SETTINGS_PAGE_HIDE', true );
//define( 'FREELANCER_LICENSE_PAGE_HIDE', true );

/*
 * Uncomment the constant below to define, and therefore
 * disable, the Freelancer custom icon set styles.
 */
//define( 'FREELANCER_ICONS_DISABLE', true );

/*
 * Uncomment and edit the add_filter code below to add
 * your own custom icon set in place of Freelancer's.
 *
 * NOTE: Do not define the FREELANCER_ICONS_DISABLE
 * constant if you want to use the filter code below.
 */
//add_filter( 'freelancer_icons_url', function() { return get_stylesheet_directory_uri() . '/icons/css/custom-icons.min.css'; } );

add_action( 'wp_enqueue_scripts', 'freelancer_child_enqueue_styles_scripts' );
/*
 * Enqueue Child Theme styles and scripts.
 */
function freelancer_child_enqueue_styles_scripts() {
    
    /* 
     * Example of the freelancer_google_fonts_url function
     * with multiple Google Fonts and multiple subsets.
     * Note that the fonts are required, but subsets are optional
     * and only necessary if you're using non-default/custom subset
     * (i.e.. something other than "latin").
     *
    $google_fonts_url = freelancer_google_fonts_url(
        // An array of Google fonts with their respective styles.
        array(
            'Saira Semi Condensed' => '400,700',
            'Lato'                 => '400,400i,700,700i',
        ),
        // An array of Google font subsets associated with the above fonts.
        array( 'latin-ext', 'vietnamese' )
    );
    */
    
    /*
     * Give a value to the $google_fonts_url variable
     * that is used to enqueue the Google fonts below.
     */
    $google_fonts_url = freelancer_google_fonts_url(
    	array(
    		'Roboto' => '400,400i,700,700i',
    	)
    );
    
    /* # Custom Google Fonts
     * Add Google fonts.
     */
	wp_enqueue_style( 'freelancer-child-fonts', $google_fonts_url, array(), FREELANCER_CHILD_THEME_VERSION );
	
	/* # Custom Scripts
	 * To add custom scripts just create a scripts.js file in your root
	 * child theme folder and then uncomment the code below to enqueue it.
	 */
	//wp_enqueue_script( 'freelancer-child-scripts', get_stylesheet_directory_uri() . '/scripts.js', array( 'jquery' ), FREELANCER_CHILD_THEME_VERSION, true );
	
}
