<?php
/**
 * Handles both the activation and update functionality.
 *
 * @package Themer Pro
 */

add_action( 'admin_init', 'themer_pro_update' );
/**
 * Perform Themer Pro updates based on current version number.
 *
 * @since 1.0.0
 */
function themer_pro_update() {
	
	// Initialize the update sequence.
	themer_pro_activate_pre();
	
	// Don't do anything if we're on the latest version.
	if ( version_compare( get_option( 'themer_pro_version_number' ), THMRPRO_VERSION, '>=' ) )
		return;

	// Update to Themer Pro 1.0.1
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.1', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.1' );
		
	// Update to Themer Pro 1.0.2
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.2', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.2' );
		
	// Update to Themer Pro 1.0.3
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.3', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.3' );
		
	// Update to Themer Pro 1.0.4
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.4', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.4' );
		
	// Update to Themer Pro 1.0.5
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.5', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.5' );
		
	// Update to Themer Pro 1.0.6
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.6', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.6' );
		
	// Update to Themer Pro 1.0.7
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.7', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.7' );
		
	// Update to Themer Pro 1.0.8
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.0.8', '<' ) )
		update_option( 'themer_pro_version_number', '1.0.8' );
		
	// Update to Themer Pro 1.1.0
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.1.0', '<' ) )
		update_option( 'themer_pro_version_number', '1.1.0' );
		
	// Update to Themer Pro 1.1.1
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.1.1', '<' ) )
		update_option( 'themer_pro_version_number', '1.1.1' );
		
	// Update to Themer Pro 1.1.2
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.1.2', '<' ) )
		update_option( 'themer_pro_version_number', '1.1.2' );
		
	// Update to Themer Pro 1.1.3
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.1.3', '<' ) ) {	
		
		$themer_pro_settings = get_option( 'themer_pro_settings' );
		$new_themer_pro_settings = array(
			'ace_editor_key_bindings' => 'ace',
		);
		$themer_pro_settings = wp_parse_args( $new_themer_pro_settings, $themer_pro_settings );
		update_option( 'themer_pro_settings', $themer_pro_settings );
		
		update_option( 'themer_pro_version_number', '1.1.3' );
		
	}
	
	// Update to Themer Pro 1.2.0
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.2.0', '<' ) ) {	
		
		$themer_pro_settings = get_option( 'themer_pro_settings' );
		$new_themer_pro_settings = array(
			'ace_editor_font_size' => '13',
		);
		$themer_pro_settings = wp_parse_args( $new_themer_pro_settings, $themer_pro_settings );
		update_option( 'themer_pro_settings', $themer_pro_settings );
		
		update_option( 'themer_pro_version_number', '1.2.0' );
		
	}

	// Update to Themer Pro 1.3.0
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.0', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.0' );

	// Update to Themer Pro 1.3.1
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.1', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.1' );

	// Update to Themer Pro 1.3.2
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.2', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.2' );

	// Update to Themer Pro 1.3.3
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.3', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.3' );

	// Update to Themer Pro 1.3.4
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.4', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.4' );

	// Update to Themer Pro 1.3.5
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.3.5', '<' ) )
		update_option( 'themer_pro_version_number', '1.3.5' );

	// Update to Themer Pro 1.4.0
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.4.0', '<' ) )
		update_option( 'themer_pro_version_number', '1.4.0' );

	// Update to Themer Pro 1.4.1
	if ( version_compare( get_option( 'themer_pro_version_number' ), '1.4.1', '<' ) )
		update_option( 'themer_pro_version_number', '1.4.1' );
	
	// Finalize the update sequence.
	themer_pro_activate_post();
	
}

/**
 * Perform Themer Pro (pre) activation actions.
 *
 * @since 1.0.0
 */
function themer_pro_activate_pre() {
	
	if ( ! get_option( 'themer_pro_settings' ) )
		update_option( 'themer_pro_settings', themer_pro_settings_defaults() );
		
}

/**
 * Perform Themer Pro (post) activation actions.
 *
 * @since 1.0.0
 */
function themer_pro_activate_post() {

	if ( ! get_option( 'themer_pro_version_number' ) )
		update_option( 'themer_pro_version_number', THMRPRO_VERSION );

	themer_pro_dir_check( themer_pro_get_uploads_path() );
	themer_pro_dir_check( themer_pro_get_uploads_path() . '/tmp' );
	
	if ( false === themer_pro_folders_writable_check() )
		wp_redirect( admin_url( 'admin.php?page=themer-pro-dashboard&notice=themer-pro-unwritable' ) );

}

/**
 * Perform Themer Pro activation actions.
 *
 * @since 1.0.0
 */
function themer_pro_activate() {
	
	themer_pro_activate_pre();
	themer_pro_activate_post();
	
}
