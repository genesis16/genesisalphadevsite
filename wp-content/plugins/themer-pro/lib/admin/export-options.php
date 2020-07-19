<?php
/**
 * Builds the Theme Export admin page.
 *
 * @package Themer Pro
 */
 
/**
 * Build the Themer Pro Theme Export admin page.
 *
 * @since 1.0.0
 */
function themer_pro_export() {
	
	$active_theme = wp_get_theme( themer_pro_active_theme_check( $child = true ), $theme_root = THMRPRO_DIR . 'lib/admin/themes' );
?>
	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="themer-pro-admin-heading"><?php _e( 'Child Theme Creator', 'themer-pro' ); ?></h2>
		
		<div id="themer-pro-admin-wrap">
			
			<div class="themer-pro-settings-wrap">
				<?php require_once( THMRPRO_DIR . 'lib/admin/boxes/theme-export.php' ); ?>
			</div>
			
		</div>
	</div> <!-- Close Wrap -->
<?php

}
