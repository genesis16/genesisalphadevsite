<?php
/**
 * Builds the Image Manager admin page.
 *
 * @package Themer Pro
 */
 
/**
 * Build the Themer Pro Image Manager admin page.
 *
 * @since 1.0.0
 */
function themer_pro_image_manager_options() {

$child_images = get_stylesheet_directory() . '/images';
$child_images_url = get_stylesheet_directory_uri() . '/images';
?>
	<div class="wrap">
		
		<div id="icon-options-general" class="icon32"></div>
		
		<h2 id="themer-pro-admin-heading"><?php _e( 'Child Theme Image Manager', 'themer-pro' ); ?></h2>
		
		<div id="themer-pro-admin-wrap">
			
			<div class="themer-pro-settings-wrap">
				<?php
				if ( is_dir( $child_images ) ) {
					require_once( THMRPRO_DIR . 'lib/admin/boxes/image-manager.php' );
				} else {
					echo '<div id="themer-pro-image-manager-missing-folder-message"><p>' . __( 'Your Child Theme does not have a root /images/ folder. To use this feature you must first create one.', 'themer-pro' ) . '</p></div>';
				}
				?>
			</div>
			
		</div>
	</div> <!-- Close Wrap -->
<?php

}

add_action( 'wp_ajax_themer_pro_image_file_control_save', 'themer_pro_image_file_control_save' );
/**
 * Use ajax to rename/delete Child Theme image files.
 *
 * @since 1.0.0
 */
function themer_pro_image_file_control_save() {
	
	check_ajax_referer( 'themer-pro-image-file-control', 'security' );
	
	if ( $_POST['action_type'] == 'rename' ) {
		
		$image_path = get_stylesheet_directory() . '/images/';
		$image_file = $image_path . $_POST['name'];
		
		$supported_extensions = array( 'jpg', 'png', 'gif', 'ico' );
		$old_file_ext = substr( $_POST['name'], strrpos( $_POST['name'], '.' ) + 1 );
		$new_file_ext = substr( $_POST['new_name'], strrpos( $_POST['new_name'], '.' ) + 1 );
		
		if ( in_array( $new_file_ext, $supported_extensions ) ) {
		
			if ( file_exists( $image_file ) && $old_file_ext == $new_file_ext ) {
				
				rename( $image_file, $image_path . $_POST['new_name'] );
				echo 'Image Renamed';
				
			} elseif ( file_exists( $image_file ) && $old_file_ext != $new_file_ext ) {
				
				echo 'Error: File Extension Mismatch';

			} else {
				
				echo 'Error: Image File Does Not Exist';
				
			}
			
		} else {
			
			echo 'Error: Unsupported File Extension';
			
		}
		
	} elseif ( $_POST['action_type'] == 'delete' ) {
		
		$image_path = get_stylesheet_directory() . '/images/' . $_POST['name'];
		
		if ( file_exists( $image_path ) ) {

			unlink( $image_path );
			echo 'Image Deleted';
			
		} else {
			
			echo 'Error: Image File Does Not Exist';
			
		}		
		
	} elseif ( $_POST['action_type'] == 'delete_all' ) {
		
		$images_folder_path = get_stylesheet_directory() . '/images/';
		$images_exist = false;
		
		foreach( glob( $images_folder_path . '*' ) as $filename ) {
			
			if ( file_exists( $images_folder_path . basename( $filename ) ) )
				unlink( $images_folder_path . basename( $filename ) );
				
			$images_exist = true;
		    
		}
		
		if ( false != $images_exist )
			echo 'All Images Deleted';
		else
			echo 'Error: No Images To Delete';
		
	}
	
	exit();
	
}
