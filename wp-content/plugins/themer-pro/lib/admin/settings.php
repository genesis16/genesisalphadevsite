<?php
/**
 * Builds the Settings admin page.
 *
 * @package Themer Pro
 */
 
/**
 * Build the Themer Pro Settings admin page.
 *
 * @since 1.0.0
 */
function themer_pro_settings() {

?>
	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="themer-pro-admin-heading"><?php _e( 'Themer Pro - Settings', 'themer-pro' ); ?></h2>
		
		<div id="themer-pro-admin-wrap">
			
			<div class="themer-pro-settings-wrap">
				<?php require_once( THMRPRO_DIR . 'lib/admin/boxes/settings.php' ); ?>
			</div>
			
		</div>
	</div> <!-- Close Wrap -->
<?php

}

add_action( 'wp_ajax_themer_pro_settings_save', 'themer_pro_settings_save' );
/**
 * Use ajax to update the Themer Pro Settings based on the posted values.
 *
 * @since 1.0.0
 */
function themer_pro_settings_save() {
	
	check_ajax_referer( 'themer-pro-settings', 'security' );
	
	$update = $_POST['themer'];
	update_option( 'themer_pro_settings', $update );
	
	echo 'Settings Updated';
	exit();
	
}

/**
 * Create an array of Themer Pro Settings default values.
 *
 * @since 1.0.0
 * @return an array of Themer Pro Settings default values.
 */
function themer_pro_settings_defaults() {
	
	$defaults = array(
		'enable_frontend_dev_tools' => 0,
		'enable_frontend_hooks_map' => 0,
		'enable_parent_theme_editor' => 0,
		'parent_editor_read_only' => 1,
		'enable_child_theme_editor' => 1,
		'enable_advanced_file_editor_controls' => 0,
		'enable_child_image_manager' => 0,
		'enable_ace_editor_syntax_validation' => 1,
		'ace_editor_key_bindings' => 'ace',
		'ace_editor_font_size' => '13',
		'ace_editor_theme' => 'tomorrow_night_eighties',
	);
	
	return apply_filters( 'themer_pro_settings_defaults', $defaults );
	
}
