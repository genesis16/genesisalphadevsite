<?php
/**
 * Create and hook in the Themer Pro admin menus.
 *
 * @package Themer Pro
 */

add_filter( 'admin_body_class', 'themer_pro_admin_body_classes' );
/**
 * Adds custom classes to the array of admin body classes.
 *
 * @since 1.0.0
 *
 * @return array (Maybe) filtered admin body classes.
 */
function themer_pro_admin_body_classes( $classes ) {

	// Get array of dark Ace Editor themes.
	$ace_themes_dark = themer_pro_ace_editor_dark_themes_array();
	// Get active Ace Editor theme.
	$ace_theme_active = themer_pro_get_settings( 'ace_editor_theme' );
	
	// Conditionally add .themer-pro-ace-active-theme-dark class when dark theme is in use.
	if ( in_array( $ace_theme_active, $ace_themes_dark ) ) {
		
		$screen = get_current_screen();
		if ( $screen->id == 'themer-pro_page_themer-pro-child-editor' || $screen->id == 'themer-pro_page_themer-pro-parent-editor' )
			$classes .= ' themer-pro-ace-active-theme-dark ';
			
	}

	return $classes;
	
}

add_action( 'admin_menu', 'themer_pro_admin_menu' );
/**
 * Create the Themer Pro admin sub menus.
 *
 * @since 1.0.0
 */
function themer_pro_admin_menu() {
	
	add_menu_page( __( 'Themer Pro', 'themer-pro' ), __( 'Themer Pro', 'themer-pro' ), 'manage_options', 'themer-pro-dashboard', 'themer_pro_settings', 'dashicons-editor-code', 59 );
	
	$_themer_pro_settings = add_submenu_page( 'themer-pro-dashboard', __( 'Settings', 'themer-pro' ), __( 'Settings', 'themer-pro' ), 'manage_options', 'themer-pro-dashboard', 'themer_pro_settings' );
	
	add_action( 'admin_print_styles-' . $_themer_pro_settings, 'themer_pro_admin_styles' );
	
	if ( is_child_theme() ) {
		
		if ( themer_pro_get_settings( 'enable_parent_theme_editor' ) ) {
			
			$_themer_pro_theme_editor_options = add_submenu_page( 'themer-pro-dashboard', 'Parent Editor', __( 'Parent Editor', 'themer-pro' ), 'manage_options', 'themer-pro-parent-editor', 'themer_pro_parent_editor_options' );
			
			add_action( 'admin_print_styles-' . $_themer_pro_theme_editor_options, 'themer_pro_admin_styles' );
			add_action( 'admin_print_styles-' . $_themer_pro_theme_editor_options, 'themer_pro_file_editor_admin_styles' );
			
		}
		
		if ( themer_pro_get_settings( 'enable_child_theme_editor' ) ) {
			
			$_themer_pro_child_editor_options = add_submenu_page( 'themer-pro-dashboard', __( 'Child Editor', 'themer-pro' ), __( 'Child Editor', 'themer-pro' ), 'manage_options', 'themer-pro-child-editor', 'themer_pro_child_editor_options' );
			
			add_action( 'admin_print_styles-' . $_themer_pro_child_editor_options, 'themer_pro_admin_styles' );
			add_action( 'admin_print_styles-' . $_themer_pro_child_editor_options, 'themer_pro_file_editor_admin_styles' );
			
		}
		
		if ( themer_pro_get_settings( 'enable_child_image_manager' ) ) {
			
			$_themer_pro_image_manager_options = add_submenu_page( 'themer-pro-dashboard', __( 'Image Manager', 'themer-pro' ), __( 'Image Manager', 'themer-pro' ), 'manage_options', 'themer-pro-image-manager', 'themer_pro_image_manager_options' );
			
			add_action( 'admin_print_styles-' . $_themer_pro_image_manager_options, 'themer_pro_admin_styles' );
			add_action( 'admin_print_styles-' . $_themer_pro_image_manager_options, 'themer_pro_image_manager_admin_styles' );
			
		}
		
	}
	
	$_themer_pro_export = add_submenu_page( 'themer-pro-dashboard', __( 'Theme Creator', 'themer-pro' ), __( 'Theme Creator', 'themer-pro' ), 'manage_options', 'themer-pro-export', 'themer_pro_export' );
	
	add_action( 'admin_print_styles-' . $_themer_pro_export, 'themer_pro_admin_styles' );

}

add_action( 'admin_init', 'themer_pro_admin_init' );
/**
 * Register styles and scripts for the Themer Pro admin menus.
 *
 * @since 1.0.0
 */
function themer_pro_admin_init() {
	
	wp_register_style( 'themer_pro_admin_styles', THMRPRO_URL . 'lib/css/admin.css', array(), THMRPRO_VERSION );
	
	wp_register_script( 'themer_pro_admin', THMRPRO_URL . 'lib/js/admin-options.js', array(), THMRPRO_VERSION );
	wp_register_script( 'themer_pro_file_editor', THMRPRO_URL . 'lib/js/file-editor.js', array(), THMRPRO_VERSION );
	wp_register_script( 'themer_pro_image_manager', THMRPRO_URL . 'lib/js/image-manager.js', array(), THMRPRO_VERSION );
	wp_register_script( 'themer_pro_ace', THMRPRO_URL . 'lib/js/ace/ace.js', array(), THMRPRO_VERSION );
	wp_register_script( 'themer_pro_ace_autocomplete', THMRPRO_URL . 'lib/js/ace/ext-language_tools.js', array(), THMRPRO_VERSION );
	
}

/**
 * Enqueue styles and scripts for the Themer Pro admin menus.
 *
 * @since 1.0.0
 */
function themer_pro_admin_styles() {
	
	wp_enqueue_style( 'themer_pro_admin_styles' );
	
	wp_enqueue_script( 'themer_pro_admin' );
	
	$vars = array(
		'aceEditorThemeImageUrl' => THMRPRO_URL . '/lib/css/images/ace-themes/',
	);
	
	wp_localize_script( 'themer_pro_admin', 'themerAdminL10n', $vars );
	
}

/**
 * Enqueue styles and scripts for the File Editor admin menu.
 *
 * @since 1.0.0
 */
function themer_pro_file_editor_admin_styles() {
	
	wp_enqueue_script( 'themer_pro_file_editor' );
	wp_enqueue_script( 'themer_pro_ace' );
	wp_enqueue_script( 'themer_pro_ace_autocomplete' );
	
	$enable_ace_editor_syntax_validation = themer_pro_get_settings( 'enable_ace_editor_syntax_validation' );
	$ace_editor_syntax_validation = ! empty( $enable_ace_editor_syntax_validation ) ? true : false;
	$screen = get_current_screen();
	$ace_editor_read_only = ( $screen->id == 'themer-pro_page_themer-pro-parent-editor' && themer_pro_get_settings( 'parent_editor_read_only' ) ) ? true : false;
	
	if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ) )
		$build_tools = 'scss';
	elseif ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ) )
		$build_tools = 'less';
	else
		$build_tools = false;
	
	$vars = array(
		'themerAjaxNonce' => wp_create_nonce( 'themer-ajax-nonce' ),
		'aceEditorSyntaxValidation' => $ace_editor_syntax_validation,
		'aceEditorReadOnly' => $ace_editor_read_only,
		'adminUrl' => admin_url(),
		'aceEditorKeyBindings' => themer_pro_get_settings( 'ace_editor_key_bindings' ),
		'aceEditorFontSize' => themer_pro_get_settings( 'ace_editor_font_size' ),
		'aceEditorTheme' => themer_pro_get_settings( 'ace_editor_theme' ),
		'fileEditorNonce' => wp_create_nonce( 'themer-pro-file-edit' ),
		'pluginUrl' => THMRPRO_URL,
		'saveText' => __( 'Save Changes', 'themer-pro' ),
		'readOnlyText' => __( 'Read Only', 'themer-pro' ),
		'copyCodeText' => __( 'Copy Code', 'themer-pro' ),
		'copiedText' => __( 'Copied!', 'themer-pro' ),
		'buildTools' => $build_tools,
	);
	
	wp_localize_script( 'themer_pro_file_editor', 'themerEditorL10n', $vars );
	
}

/**
 * Enqueue styles and scripts for the Image Manager admin menu.
 *
 * @since 1.0.0
 */
function themer_pro_image_manager_admin_styles() {
	
	wp_enqueue_script( 'themer_pro_image_manager' );
	
}
