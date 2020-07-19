<?php
/**
 * Builds the Parent Theme File Editor admin content.
 *
 * @package Themer Pro
 */
?>

<div id="themer-pro-file-editor-settings-nav-file-editor-box" class="themer-pro-optionbox-outer-1col themer-pro-all-options themer-pro-options-display">
	<div class="themer-pro-optionbox-inner-1col">
		<div id="themer-pro-file-tree-editor-container">
			<div id="themer-pro-file-tree-container">
				<div id="themer-pro-file-editor-file-control-settings-icon"<?php if ( ! themer_pro_get_settings( 'enable_advanced_file_editor_controls' ) ) { echo ' style="display:none;"'; } ?>>
					<?php if ( ! themer_pro_get_settings( 'parent_editor_read_only' ) ) { ?>
					<span class="dashicons dashicons-admin-generic"></span>
					<?php } ?>
				</div>
				<?php echo themer_pro_file_editor_controls(); ?>
				<?php echo themer_pro_file_tree( get_template_directory(), $parent = true ); ?>
			</div>
			<div id="themer-pro-file-editor-container"></div>
		</div>
	</div>
</div>
