<?php
/**
 * Builds the Themer Pro Settings admin content.
 *
 * @package Themer Pro
 */
?>

<div id="themer-pro-settings-nav-info-box" class="themer-pro-optionbox-outer-1col themer-pro-all-options themer-pro-options-display">
	<div class="themer-pro-optionbox-2col-left-wrap">
		
<?php	if( ! empty( $_GET['notice'] ) ) {
			if ( $_GET['notice'] == 'themer-pro-unwritable' ) {
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:0 0 15px;padding:15px;"><strong><?php _e( 'It appears that some of your files/folders are unwritable to Themer Pro. To allow Themer Pro to properly function you will need make the files and folders in (and including) the /wp-content/uploads/themer-pro/ directory. If you need assistance with this just contact the Cobalt Apps Support Team through your <a href="https://cobaltapps.com/my-account/" target="_blank">"My Account"</a> page on <a href="https://cobaltapps.com/" target="_blank">CobaltApps.com</a>.', 'themer-pro' ); ?></strong></div>
<?php		}
		}
?>

		<?php if ( false !== themer_pro_devkit_active_check() ) { ?>
		
		<div class="themer-pro-optionbox-outer-2col">
			<div class="themer-pro-optionbox-inner-2col">
				<h4><?php _e( 'DevKit Plugin Active Notice', 'themer-pro' ); ?></h4>
				<div class="bg-box">
					<p>
						<b><?php _e( 'Please Note:', 'themer-pro' ); ?></b> <?php _e( 'Because a DevKit Plugin is active Themer Pro has deactivated its Frontend DEV Tools and Theme Creator functionality to prevent conflicts. All other Themer Pro features should work just fine with this Plugin combo.', 'themer-pro' ); ?>
					</p>
				</div>
			</div>
		</div>
		
		<?php } ?>
		
		<?php if ( themer_pro_active_theme_check() == 'freelancer' ) { ?>
		
		<div class="themer-pro-optionbox-outer-2col">
			<div class="themer-pro-optionbox-inner-2col">
				<h4><?php _e( 'Freelancer Theme Settings', 'themer-pro' ); ?></h4>
				<div class="bg-box">
					<p>
						<?php _e( 'Settings:', 'themer-pro' ); ?> <b><a href="<?php echo admin_url() . 'themes.php?page=freelancer-settings' ?>"><?php _e( 'Appearance > Theme Settings', 'themer-pro' ); ?></a></b>
					</p>

					<p>
						<?php _e( 'License:', 'themer-pro' ); ?> <b><a href="<?php echo admin_url() . 'themes.php?page=freelancer-license' ?>"><?php _e( 'Appearance > Theme License', 'themer-pro' ); ?></a></b>
					</p>
				</div>
			</div>
		</div>
		
		<?php } ?>
		
		<div class="themer-pro-optionbox-outer-2col">
			<div class="themer-pro-optionbox-inner-2col">
				<h4><?php _e( 'Version/License Information', 'themer-pro' ); ?></h4>
				<div class="bg-box">
					<p>
						<?php _e( 'PHP Version:', 'themer-pro' ); ?> <b><code><?php echo PHP_VERSION ?></code></b>
					</p>
					
					<p>
						<?php _e( 'WordPress Version:', 'themer-pro' ); ?> <b><code><?php echo bloginfo('version') ?></code></b>
					</p>
					
					<?php
					$get_parent_theme = wp_get_theme( get_template() );
					$get_child_theme = wp_get_theme();
					?>
					
					<p>
						<?php _e( $get_parent_theme->Name . ' Version:', 'themer-pro' ); ?> <b><code><?php echo esc_attr( $get_parent_theme->Version ) ?></code></b>
					</p>
					
					<?php if ( is_child_theme() ) { ?>
					<p>
						<?php _e( $get_child_theme->Name . ' Version:', 'themer-pro' ); ?> <b><code><?php echo esc_attr( $get_child_theme->Version ) ?></code></b>
					</p>
					<?php } ?>
					
					<?php themer_pro_license_options(); ?>
				</div>
			</div>
		</div>
		
		<div class="themer-pro-optionbox-outer-2col">
			<div class="themer-pro-optionbox-inner-2col">
				<h4><?php _e( 'Links & Resources', 'themer-pro' ); ?></h4>
				<div class="resource-box">
					<p>
						<?php _e( 'Support & Resources:', 'themer-pro' ); ?> <a href="https://cobaltapps.com/my-account/" target="_blank">https://cobaltapps.com/my-account/</a>
					</p>
					
					<p>
						<?php _e( 'Cobalt Apps Docs:', 'themer-pro' ); ?> <a href="https://docs.cobaltapps.com/" target="_blank">https://docs.cobaltapps.com/</a>
					</p>

					<p>
						<?php _e( 'Cobalt Apps YouTube Channel:', 'themer-pro' ); ?> <a href="https://cobaltapps.com/youtube/" target="_blank">https://cobaltapps.com/youtube/</a>
					</p>
					
					<p>
						<?php _e( 'Cobalt Apps Affiliates:', 'themer-pro' ); ?> <a href="https://cobaltapps.com/affiliates/" target="_blank">https://cobaltapps.com/affiliates/</a>
					</p>
					
					<p>
						<?php _e( 'See current Themer Pro supported Themes', 'themer-pro' ); ?> <a href="https://cobaltapps.com/themer-pro-supported-themes/" target="_blank"><?php _e( 'HERE', 'themer-pro' ); ?></a>.
					</p>
				</div>
			</div>
		</div>
	
	</div>

	<div class="themer-pro-optionbox-2col-right-wrap">
		
		<form action="/" id="themer-pro-settings-form" name="themer-pro-settings-form">
		
			<input type="hidden" name="action" value="themer_pro_settings_save" />
			<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'themer-pro-settings' ); ?>" />
		
			<div class="themer-pro-optionbox-outer-2col">
				<div class="themer-pro-optionbox-inner-2col">
					<h4><?php _e( 'General Settings', 'themer-pro' ); ?></h4>
					
					<div class="bg-box">
						
						<?php if ( ! is_child_theme() ) { ?>
						<p>
							<span id="themer-pro-child-not-active-message"><?php echo sprintf( __( 'The following Editor Options require an active Child Theme. You can create one <a href="%s">HERE</a>.', 'themer-pro' ), admin_url() . 'admin.php?page=themer-pro-export' ); ?></span>
						</p>						
						<?php } ?>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-frontend-dev-tools" name="themer[enable_frontend_dev_tools]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_frontend_dev_tools' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-editor-code"></span><?php _e( ' Frontend Dev Tools?', 'themer-pro' ); ?>
						</p>
						
						<?php if ( false !== themer_pro_compatible_theme_check( $frameworks = true ) ) { ?>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-frontend-hooks-map" name="themer[enable_frontend_hooks_map]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_frontend_hooks_map' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-location-alt"></span><?php _e( ' Frontend Hooks Map?', 'themer-pro' ); ?>
						</p>
						
						<?php } ?>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-parent-theme-editor" class="themer-pro-enable-parent-child-editor" name="themer[enable_parent_theme_editor]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_parent_theme_editor' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-category"></span><?php _e( ' Parent Theme Editor?', 'themer-pro' ); ?>
						</p>
						
						<p id="themer-pro-parent-editor-read-only-container" style="display:none;">
							<input type="checkbox" id="themer-pro-parent-editor-read-only" name="themer[parent_editor_read_only]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'parent_editor_read_only' ) ) ); ?> /> <?php _e( 'Make Parent Editor ', 'themer-pro' ); ?><span class="dashicons dashicons-lock"></span><?php _e( ' Read Only?', 'themer-pro' ); ?>
						</p>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-child-theme-editor" class="themer-pro-enable-parent-child-editor" name="themer[enable_child_theme_editor]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_child_theme_editor' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-category"></span><?php _e( ' Child Theme Editor?', 'themer-pro' ); ?>
						</p>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-advanced-file-editor-controls" name="themer[enable_advanced_file_editor_controls]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_advanced_file_editor_controls' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-admin-generic"></span><?php _e( ' Advanced File Editor Controls?', 'themer-pro' ); ?>
						</p>
						
						<p>
							<input type="checkbox" id="themer-pro-enable-child-image-manager" class="themer-pro-enable-parent-child-editor" name="themer[enable_child_image_manager]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_child_image_manager' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-format-image"></span><?php _e( ' Child Theme Image Manager?', 'themer-pro' ); ?>
						</p>
						
						<p>
							<input type="checkbox" id="themer-pro-ace-editor-syntax-validation" name="themer[enable_ace_editor_syntax_validation]" value="1" <?php if ( checked( 1, themer_pro_get_settings( 'enable_ace_editor_syntax_validation' ) ) ); ?> /> <?php _e( 'Enable ', 'themer-pro' ); ?><span class="dashicons dashicons-media-code"></span><?php _e( ' Ace Editor Syntax Validation Checking?', 'themer-pro' ); ?>
						</p>

						<p>
							<span style="font-size:16px"><?php _e( 'Ace Editor:', 'themer-pro' ); ?></span><br>
							<?php _e( 'Key Bindings', 'themer-pro' ); ?>
							<select id="themer-pro-ace-editor-key-bindings" class="themer-pro-settings-select-menu" name="themer[ace_editor_key_bindings]" size="1" style="margin-bottom:5px;">
								<?php themer_pro_build_select_menu_options( themer_pro_ace_editor_key_bindings_array(), themer_pro_get_settings( 'ace_editor_key_bindings' ) ); ?>
							</select><br>
							<?php _e( 'Font Size', 'themer-pro' ); ?>
							<select id="themer-pro-ace-editor-font-size" class="themer-pro-settings-select-menu" name="themer[ace_editor_font_size]" size="1" style="margin-bottom:5px;">
								<?php themer_pro_build_select_menu_options( themer_pro_ace_editor_font_size_array(), themer_pro_get_settings( 'ace_editor_font_size' ) ); ?>
							</select> <?php _e( '(For Editor Font Size changes to take effect you may need to clear your browser cache.)', 'themer-pro' ); ?><br>
							<?php _e( 'Theme', 'themer-pro' ); ?>
							<select id="themer-pro-ace-editor-theme" class="themer-pro-settings-select-menu" name="themer[ace_editor_theme]" size="1">
								<?php themer_pro_build_select_menu_options( themer_pro_ace_editor_themes_array(), themer_pro_get_settings( 'ace_editor_theme' ) ); ?>
							</select>
						</p>
					</div>
					
					<div id="themer-pro-ace-editor-theme-preview">
						<span><?php _e( 'Theme Preview', 'themer-pro' ); ?></span>
						<img src="<?php echo THMRPRO_URL . '/lib/css/images/ace-themes/placeholder.png'; ?>">
					</div>
					
					<div class="themer-pro-settings-save-container">
						<input id="themer-pro-settings-save-button" type="submit" value="<?php _e( 'Save Changes', 'themer-pro' ); ?>" name="Submit" alt="Save Changes"  class="themer-pro-save-button button button-primary"/>
						<img class="themer-pro-ajax-save-spinner" src="<?php echo THMRPRO_URL . '/lib/css/images/ajax-save-in-progress.gif'; ?>" />
						<span class="themer-pro-saved"></span>
					</div>
				</div>
			</div>
		
		</form>

	</div>
</div>