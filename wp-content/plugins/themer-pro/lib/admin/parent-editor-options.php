<?php
/**
 * Builds the Parent Theme File Editor admin page.
 *
 * @package Themer Pro
 */
 
/**
 * Build the Themer Pro Parent Theme File Editor admin page.
 *
 * @since 1.0.0
 */
function themer_pro_parent_editor_options() {

?>
	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="themer-pro-admin-heading"><?php _e( 'Parent Theme Editor', 'themer-pro' ); ?></h2>
		
		<div id="themer-pro-admin-wrap">
			
			<div class="themer-pro-settings-wrap">
				<?php require_once( THMRPRO_DIR . 'lib/admin/boxes/parent-editor.php' ); ?>
			</div>
			
		</div>
	</div> <!-- Close Wrap -->
<?php

}

/**
 * Require file editor ajax functionality file.
 */
require_once( THMRPRO_DIR . 'lib/admin/file-editor-ajax.php' );
