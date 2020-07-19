<?php
/**
 * Builds the Child Theme File Editor admin content.
 *
 * @package Themer Pro
 */
?>

<div id="themer-pro-file-editor-settings-nav-child-editor-box" class="themer-pro-optionbox-outer-1col themer-pro-all-options themer-pro-options-display">
	<div class="themer-pro-optionbox-inner-1col">
		<div id="themer-pro-file-tree-editor-container">
			<div id="themer-pro-file-tree-container">
				<div id="themer-pro-file-editor-file-control-settings-icon"<?php if ( ! themer_pro_get_settings( 'enable_advanced_file_editor_controls' ) ) { echo ' style="display:none;"'; } ?>>
					<span class="dashicons dashicons-admin-generic"></span>
				</div>
				<?php echo themer_pro_file_editor_controls(); ?>
				<?php echo themer_pro_file_tree( get_stylesheet_directory() ); ?>
			</div>
			<div id="themer-pro-file-editor-container"></div>
		</div>
	</div>
</div>
