<?php
/**
 * Builds the Child Theme File Editor admin page.
 *
 * @package Themer Pro
 */
 
/**
 * Build the Themer Pro Child Theme File Editor admin page.
 *
 * @since 1.0.0
 */
function themer_pro_child_editor_options() {
	
	if ( ! empty( $_GET['activefile'] ) ) {
		
		$subdir_id_partial = $_GET['subdir'] != '' ? $_GET['subdir'] . '-' : '';

		?><script type="text/javascript">
			jQuery(document).ready(function($) {
				$('li[title="/<?php echo $_GET['subdir']; ?>"] a').click();
				$('#themer-pro-<?php echo $subdir_id_partial . $_GET['activefile']; ?>-textarea-container-li a').click();
				<?php if ( ! empty( $_GET['fullscreen'] ) ) { ?>
					$('.themer-pro-file-editor-expand').click();
				<?php } ?>
				$('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').after('<a class="themer-pro-file-editor-go-back-button" href="'+document.referrer+'">Go Back</a>');
			});
		</script><?php

	}
	
?>
	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="themer-pro-admin-heading"><?php _e( 'Child Theme Editor', 'themer-pro' ); ?></h2>
		
		<div id="themer-pro-admin-wrap">
			
			<div class="themer-pro-settings-wrap">
				<?php require_once( THMRPRO_DIR . 'lib/admin/boxes/child-editor.php' ); ?>
			</div>
			
		</div>
	</div> <!-- Close Wrap -->
<?php

}

/**
 * Require file editor ajax functionality file.
 */
require_once( THMRPRO_DIR . 'lib/admin/file-editor-ajax.php' );
