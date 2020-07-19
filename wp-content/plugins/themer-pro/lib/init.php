<?php
/**
 * This is the initialization file for Themer Pro,
 * defining constants, globaling database option arrays
 * and requiring other function files.
 *
 * @package Themer Pro
 */
 
// Require general functions.
require_once( THMRPRO_DIR . 'lib/functions/general.php' );

/**
 * Require files only needed for admin.
 */
if ( is_admin() ) {
	
	require_once( THMRPRO_DIR . 'lib/functions/file-editor.php' );
	require_once( THMRPRO_DIR . 'lib/admin/build-menu.php' );
	require_once( THMRPRO_DIR . 'lib/admin/settings.php' );
	require_once( THMRPRO_DIR . 'lib/admin/export-options.php' );
	require_once( THMRPRO_DIR . 'lib/admin/parent-editor-options.php' );
	require_once( THMRPRO_DIR . 'lib/admin/child-editor-options.php' );
	require_once( THMRPRO_DIR . 'lib/admin/bulletproof/bulletproof.php' );
	require_once( THMRPRO_DIR . 'lib/admin/image-manager-options.php' );
	require_once( THMRPRO_DIR . 'lib/functions/theme-export.php' );
	require_once( THMRPRO_DIR . 'lib/admin/update/edd-updater.php' );
	require_once( THMRPRO_DIR . 'lib/admin/update/update.php' );
	
}

add_action( 'init', 'themer_pro_frontend_dev_tools_init' );
/**
 * Conditionally initialize the frontend dev tools.
 *
 * @since 1.0.0
 */
function themer_pro_frontend_dev_tools_init() {
	
	if ( ! current_user_can( 'administrator' ) || ! is_child_theme() )
		return;
		
	if ( false === themer_pro_devkit_active_check() ) {

		if ( themer_pro_get_settings( 'enable_frontend_dev_tools' ) && ! is_admin() )
			require_once( THMRPRO_DIR . 'lib/functions/fe-dev-tools.php' );
			
		if ( themer_pro_get_settings( 'enable_frontend_dev_tools' ) ) {
			
			add_action( 'wp_ajax_themer_pro_style_editor_save', 'themer_pro_style_editor_save' );
			/**
			 * Use ajax to update the theme styles based on the posted values.
			 *
			 * @since 1.0.0
			 */
			function themer_pro_style_editor_save() {
				
				check_ajax_referer( 'themer-pro-style-editor', 'security' );
		
				if ( $_POST['code_state']  == 'Parse Error' ) {
					
					echo 'Parse Error, Check Code.';
					
				} else {
					
					themer_pro_write_file( $path = get_stylesheet_directory() . '/style.css', $code = $_POST['themer-pro-style-editor']['styles'] );
					
					echo 'Stylesheet Updated';
					
				}
				
				exit();
				
			}
			
		}
	
	}
		
	if ( PHP_VERSION >= 5.3 && themer_pro_get_settings( 'enable_frontend_hooks_map' ) && false !== themer_pro_compatible_theme_check( $frameworks = true ) )
		require_once( THMRPRO_DIR . 'lib/functions/hooks-map.php' );
		
}

// Require the Cobalt Apps Admin Bar Menu code.
require_once( THMRPRO_DIR . 'lib/functions/admin-bar-menu.php' );
