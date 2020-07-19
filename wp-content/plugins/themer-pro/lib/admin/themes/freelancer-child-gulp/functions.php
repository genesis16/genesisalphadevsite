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
	
    // Prevent the default style.css file from unnecessarily loading on the front-end.
    wp_dequeue_style( sanitize_title_with_dashes( FREELANCER_CHILD_THEME_NAME ) );
    wp_deregister_style( sanitize_title_with_dashes( FREELANCER_CHILD_THEME_NAME ) );
	
    /* # Primary Styles
     * Add primary stylesheet.
     */
	wp_enqueue_style( sanitize_title_with_dashes( FREELANCER_CHILD_THEME_NAME ), get_stylesheet_directory_uri() . '/dist/css/style.css', array(), FREELANCER_CHILD_THEME_VERSION );
	
	/* # Custom Scripts
	 * Add custom scripts if they exist.
	 */
    if ( file_exists( get_stylesheet_directory_uri() . '/dist/js/scripts.js' ) )
	    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/dist/js/scripts.js', array( 'jquery' ), FREELANCER_CHILD_THEME_VERSION, true );
	
}

/* # Custom Functions
 * Include the custom functions file on both the front and back-end of the site.
 */
if ( file_exists( get_stylesheet_directory() . '/dist/custom-functions.php' ) )
	include_once( get_stylesheet_directory() . '/dist/custom-functions.php' );

/* # Front-end Functions
 * Include the front-end functions file only on the front-end of the site.
 */
if ( file_exists( get_stylesheet_directory() . '/dist/frontend-functions.php' ) && ! is_admin() )
	include_once( get_stylesheet_directory() . '/dist/frontend-functions.php' );
