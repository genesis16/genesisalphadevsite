<?php 
/*
Plugin Name: Themer Pro
Version: 1.4.1
Plugin URI: https://cobaltapps.com/downloads/themer-pro-plugin/
Description: The full-blown WordPress Theme IDE built right into your Dashboard.
Author: Cobalt Apps
Author URI: https://cobaltapps.com/
License: GPLv2 or later
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

/**
 * @package Themer Pro
 */
 
// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Create a conditional that checks for compatible themes.
 *
 * @since 1.0.0
 * @return a conditional that checks for compatible themes.
 */
function themer_pro_compatible_theme_check( $frameworks = false ) {
	
	$wp_get_theme = wp_get_theme();
	
	if ( $frameworks ) {
		
		$compatible_themes = array(
			'astra' => 'Astra',
			'bb-theme' => 'Beaver Builder Theme',
			'freelancer' => 'Freelancer',
			'generatepress' => 'GeneratePress',
			'genesis' => 'Genesis',
			'oceanwp' => 'OceanWP',
		);
		
	} else {
		
		$compatible_themes = array(
			'astra' => 'Astra',
			'bb-theme' => 'Beaver Builder Theme',
			'freelancer' => 'Freelancer',
			'generatepress' => 'GeneratePress',
			'genesis' => 'Genesis',
			'oceanwp' => 'OceanWP',
			'twentysixteen' => 'Twenty Sixteen',
			'twentyseventeen' => 'Twenty Seventeen',
			'twentynineteen' => 'Twenty Nineteen',
			'twentytwenty' => 'Twenty Twenty',
		);
		
	}
	
	if ( array_key_exists( $wp_get_theme->get( 'Template' ), $compatible_themes ) || in_array( $wp_get_theme->get( 'Name' ), $compatible_themes ) )
		$compatible_theme = true;
	else
		$compatible_theme = false;

	return $compatible_theme;
	
}

if ( false === themer_pro_compatible_theme_check() ) {
	
	add_action( 'admin_notices', 'themer_pro_requires_compatible_theme_notice' );
	
} else {
	
	/**
	 * Define plugin constants.
	 */
	if ( ! defined( 'THMRPRO_DIR' ) )
		define( 'THMRPRO_DIR', plugin_dir_path( __FILE__ ) );
		
	if ( ! defined( 'THMRPRO_URL' ) )
		define( 'THMRPRO_URL', plugin_dir_url( __FILE__ ) );
		
	// Define the Cobalt Apps WP Admin Bar URL constant.
	if ( ! defined( 'CAABM_URL' ) )
		define( 'CAABM_URL', THMRPRO_URL );
		
	define( 'THMRPRO_VERSION', '1.4.1' );
	
	/**
	 * Require options file.
	 */
	require_once( THMRPRO_DIR . 'lib/functions/options.php' );
	
	/**
	 * Create globals only needed for admin and register activation hook.
	 */
	if ( is_admin() ) {
		
		/**
		 * Require paths file.
		 */
		require_once( THMRPRO_DIR . 'lib/functions/paths.php' );
		
		/**
		 * Determine whether or not specific Themer Pro folders
		 * are writable as well as provide their folder names.
		 *
		 * @since 1.0.0
		 * 
		 * @return Themer Pro folder's writable state and names.
		 */
		function themer_pro_folders_writable_check( $folders = false ) {
			
			// Themer Pro folders that need to be writable.
			$themer_pro_folders = array( themer_pro_get_uploads_path(), themer_pro_get_uploads_path() . '/tmp' );
				
			// Set default Themer Pro folder writable state to "false".
			$themer_pro_writable = false;
			
			foreach( $themer_pro_folders as $themer_pro_folder ) {
				
				if ( is_dir( $themer_pro_folder ) && is_writable( $themer_pro_folder ) )
					$themer_pro_writable = true;
				
			}
			
			if ( false !== $folders )
				return $themer_pro_folders;
			else
				return $themer_pro_writable;
			
		}
		
		// Run Themer Pro activation function.
		register_activation_hook( THMRPRO_DIR . 'lib/admin/update/update.php', 'themer_pro_activate' );
	
	}
	
	add_action( 'after_setup_theme', 'themer_pro_dynamik_check', 14 );
	/**
	 * Check if Dynamik Website Builder is active and respod accordingly.
	 *
	 * @since 1.0.0
	 */
	function themer_pro_dynamik_check() {
		
		if ( defined( 'DYN_FONT_AWESOME_VERSION' ) )
			add_action( 'admin_notices', 'themer_pro_dynamik_incompatible_admin_notice' );
		else
			add_action( 'after_setup_theme', 'themer_pro_init', 15 );
		
	}
	
	/**
	 * Localize and initialize the Themer Pro Plugin.
	 *
	 * @since 1.0.0
	 */
	function themer_pro_init() {
		
		// Localization.
		load_plugin_textdomain( 'themer-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/lib/languages' );
	
		// Include Themer Pro files.
		require_once( THMRPRO_DIR . 'lib/init.php' );
		
	}
	
	/**
	 * Display an admin notice stating that Dynamik Website Builder is incompatible with Themer Pro.
	 *
	 * @since 1.0.0
	 */
	function themer_pro_dynamik_incompatible_admin_notice() {
		
	    ?>
	    <div class="notice notice-error" style="clear:both;">
	        <p><?php _e( 'Dynamik Website Builder is not compatible with the Themer Pro Plugin. To use Themer Pro you must activate a different Genesis Child Theme.', 'themer-pro' ); ?></p>
	    </div>
	    <?php
	    
	}
	
}

function themer_pro_requires_compatible_theme_notice() {

	?>
	<div class="error notice">
		<p><?php echo sprintf( __( 'The Themer Pro Plugin requires one of the following <a href="%s" target="_blank">Compatible Themes</a> to function! Either <a href="%s">activate a compatible theme</a> or <a href="%s">deactivate the Themer Pro Plugin</a>.', 'themer-pro' ), 'https://cobaltapps.com/themer-pro-supported-themes/', admin_url( 'themes.php' ), admin_url( 'plugins.php' ) ); ?></p>
	</div>
	<?php
	
}
