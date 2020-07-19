<?php
/**
 * Handles the frontend css sandbox functionality.
 *
 * @package Themer Pro
 */
 
add_action( 'wp_head', 'themer_pro_css_echo' );
/**
 * Echo the active theme's styles into the <head>.
 *
 * @since 1.0.0
 */
function themer_pro_css_echo() {

	$styles = file_get_contents( get_stylesheet_directory() . '/style.css' );
	$styles = str_replace( 'url(images', 'url(' . get_stylesheet_directory_uri() . '/images', $styles );
	$styles = str_replace( 'url(\'images', 'url(\'' . get_stylesheet_directory_uri() . '/images', $styles );
	$styles = str_replace( 'url("images', 'url("' . get_stylesheet_directory_uri() . '/images', $styles );
	$styles = str_replace( 'url(config/import/images', 'url(' . get_stylesheet_directory_uri() . '/config/import/images', $styles );
	$styles = str_replace( 'url(\'config/import/images', 'url(\'' . get_stylesheet_directory_uri() . '/config/import/images', $styles );
	$styles = str_replace( 'url("config/import/images', 'url("' . get_stylesheet_directory_uri() . '/config/import/images', $styles );
	$output = "\n\n<!-- Begin echoed style.css -->\n<style id=\"theme-styles-echo\" type=\"text/css\">\n" . $styles . "</style>\n<!-- End echoed style.css -->\n";
	
	echo $output;
	
}

add_action( 'wp_enqueue_scripts', 'themer_pro_dequeue_style', 1001 );
/**
 * Dequeue the active theme's styles for Themer Pro support.
 * 
 * Hooked to the wp_enqueue_scripts action, with a late priority (1001),
 * so that it is after the style was enqueued.
 * 
 * @since 1.0.0
 */
function themer_pro_dequeue_style() {

	if ( themer_pro_active_theme_check() == 'astra' )
		wp_dequeue_style( 'astra-child-theme-css' );
	elseif ( themer_pro_active_theme_check() == 'bb-theme' )
		wp_dequeue_style( 'fl-child-theme' );
	elseif ( themer_pro_active_theme_check() == 'freelancer' && defined( 'FREELANCER_CHILD_THEME_NAME' ) )
		wp_dequeue_style( themer_pro_sanatize_string( FREELANCER_CHILD_THEME_NAME, $underscore = false ) );
	elseif ( themer_pro_active_theme_check() == 'generatepress' )
		wp_dequeue_style( 'generate-child' );
	elseif ( themer_pro_active_theme_check() == 'genesis' )
		wp_dequeue_style( genesis_get_theme_handle() );
	elseif ( themer_pro_active_theme_check() == 'oceanwp' )
		wp_dequeue_style( 'oceanwp-style' );
	elseif ( themer_pro_active_theme_check() == 'twentysixteen' || themer_pro_active_theme_check() == 'twentyseventeen' || themer_pro_active_theme_check() == 'twentynineteen' || themer_pro_active_theme_check() == 'twentytwenty' )
		wp_dequeue_style( 'child-style' );
		
}

add_action( 'wp_enqueue_scripts', 'themer_pro_fe_dev_tools_enqueue_scripts' );
/**
 * Enqueue frontend css sandbox styles and scripts.
 *
 * @since 1.0.0
 */
function themer_pro_fe_dev_tools_enqueue_scripts() {

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'themer_pro_fe_dev_tools_styles', THMRPRO_URL . 'lib/css/fe-dev-tools.css' );
	wp_enqueue_style( 'themer_pro_jquery_ui_css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css', false, THMRPRO_VERSION, false );
	wp_enqueue_script( 'jquery-ui-resizable' );
	wp_enqueue_script( 'themer_pro_fe_dev_tools_scripts', THMRPRO_URL . 'lib/js/fe-dev-tools.js', array( 'jquery', 'jquery-ui-draggable' ), THMRPRO_VERSION, true );
	wp_enqueue_script( 'themer_pro_ace', THMRPRO_URL . 'lib/js/ace/ace.js', array(), THMRPRO_VERSION, true );
	wp_enqueue_script( 'themer_pro_ace_autocomplete', THMRPRO_URL . 'lib/js/ace/ext-language_tools.js', array(), THMRPRO_VERSION, true );
	
	$enable_ace_editor_syntax_validation = themer_pro_get_settings( 'enable_ace_editor_syntax_validation' );
	$ace_editor_syntax_validation = ! empty( $enable_ace_editor_syntax_validation ) ? true : false;
	if ( themer_pro_active_theme_check() == 'genesis' )
		$genesis_theme_handle = genesis_get_theme_handle();
	else
		$genesis_theme_handle = '';
	
	$vars = array(
		'aceEditorSyntaxValidation' => $ace_editor_syntax_validation,
		'aceEditorKeyBindings' => themer_pro_get_settings( 'ace_editor_key_bindings' ),
		'aceEditorFontSize' => themer_pro_get_settings( 'ace_editor_font_size' ),
		'aceEditorTheme' => themer_pro_get_settings( 'ace_editor_theme' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'styleEditorNonce' => wp_create_nonce( 'themer-pro-style-editor' ),
		'saveButtonText' => __( 'Save Changes', 'themer-pro' ),
		'saveSpinner' => THMRPRO_URL . '/lib/css/images/ajax-save-in-progress.gif',
		'childStyles' => esc_textarea( file_get_contents( get_stylesheet_directory() . '/style.css' ) ),
		'childImagesUrl' => 'url(' . get_stylesheet_directory_uri() . '/images',
		'childImagesUrlSingleQuotes' => 'url(\'' . get_stylesheet_directory_uri() . '/images',
		'childImagesUrlDoubleQuotes' => 'url("' . get_stylesheet_directory_uri() . '/images',
		'childConfigImagesUrl' => 'url(' . get_stylesheet_directory_uri() . '/config/import/images',
		'childConfigImagesUrlSingleQuotes' => 'url(\'' . get_stylesheet_directory_uri() . '/config/import/images',
		'childConfigImagesUrlDoubleQuotes' => 'url("' . get_stylesheet_directory_uri() . '/config/import/images',
		'cssSandboxHeading' => __( 'CSS Sandbox', 'themer-pro' ),
		'cssSandboxCopied' => __( 'CSS Copied!', 'themer-pro' ),
		'htmlSandboxHeading' => __( 'HTML Sandbox', 'themer-pro' ),
		'htmlSandboxCopied' => __( 'HTML Copied!', 'themer-pro' ),
		'htmlTitleCopyCss' => __( 'Copy CSS', 'themer-pro' ),
		'htmlTitleCopyHtml' => __( 'Copy HTML', 'themer-pro' ),
		'htmlTitleOpenStyle' => __( 'Open Style Editor', 'themer-pro' ),
		'htmlTitleOpenCss' => __( 'Open CSS Sandbox', 'themer-pro' ),
		'htmlTitleOpenHtml' => __( 'Open HTML Sandbox', 'themer-pro' ),
		'htmlTitleUndoResize' => __( 'Undo Textarea Resize', 'themer-pro' ),
		'htmlTitleClearTextarea' => __( 'Clear The Textarea', 'themer-pro' ),
		'htmlTitleWrapOn' => __( 'Turn Text Wrap On', 'themer-pro' ),
		'htmlTitleWrapOff' => __( 'Turn Text Wrap Off', 'themer-pro' ),
		'genesisThemeHandle' => $genesis_theme_handle,
	);
	
	wp_localize_script( 'themer_pro_fe_dev_tools_scripts', 'themerDevToolsL10n', $vars );
		
}
