<?php
/**
 * Builds the Child Theme Image Manager admin content.
 *
 * @package Themer Pro
 */
?>

<div id="themer-pro-settings-nav-export-box" class="themer-pro-optionbox-outer-1col themer-pro-all-options themer-pro-options-display">
	<div class="themer-pro-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
		<h3 style="border:0;"><?php _e( 'Child Theme Image Uploader', 'themer-pro' ); ?></h3>
		
		<div class="themer-pro-child-theme-export-wrap" style="padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">

			<div class="bg-box" style="margin-right:0; margin-bottom:0;">
				<form id="themer-pro-image-file-upload-form" method="POST" enctype="multipart/form-data">
				    <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
				    <input type="file" multiple="multiple" name="images[]"/>
				    <input class="button rounded-button button-highlighted" type="submit" value="upload"/>
					<?php
					if ( is_dir( $child_images ) ) {
						
						$images_array = isset( $_FILES['images'] ) ? themer_pro_rearray_multi_image_upload( $_FILES['images'] ) : array();
						$upload_message_count = 0;
						
						foreach ( $images_array as $images ) {
							
							$image = new Bulletproof\ThemerProImage( array( 'images' => $images ) );
							$image_upload_name = isset( $images['name'] ) ? $images['name'] : 'temp-image-name';
							$image_upload_name = substr( $image_upload_name, 0, strrpos( $image_upload_name, '.' ) );
							$image->setName( $image_upload_name );
							$image->setSize( 100, 5000000 );
							$image->setLocation( $child_images );
							
							if ( $image['images'] ) {
							
								$upload = $image->upload(); 
								
								if ( $upload_message_count == 0 ) {
								
									echo '<div class="themer-pro-image-file-upload-status">';
										
									if ( $upload )
										echo '<span class="dashicons dashicons-yes"></span>Image Upload Successful!';
									else
										echo '<span class="dashicons dashicons-warning"></span>' . $image['error'];
										
									echo '</div>';
								
								}
								
								$upload_message_count++;
							
							}
							
						}
						
					}
					?>
				</form>
			</div>
		</div>
	</div>
	
	<div class="themer-pro-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
		<h3 style="border:0;"><?php _e( 'Child Theme Images', 'themer-pro' ); ?></h3>
		
		<div class="themer-pro-child-theme-export-wrap" style="padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">

			<div class="bg-box" style="margin-right:0; margin-bottom:0;">
				<form action="/" id="themer-pro-image-file-control-form" name="themer-pro-image-file-control-form">
					<input type="hidden" name="action" value="themer_pro_image_file_control_save" />
					<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'themer-pro-image-file-control' ); ?>" />
					
					<ul class="themer-pro-child-theme-images-list">
						<?php
							foreach( glob( $child_images . '/*' ) as $filename ) {
								
								$image_size = getimagesize( $filename );
								
								echo '<li class="themer-pro-child-theme-images-list-item">';
								echo '<div class="themer-pro-listed-image-header">';
								echo '<input class="themer-pro-listed-image-name" type="text" name="themer[image_name]" value="' . basename( $filename ) . '" title="' . basename( $filename ) . '">';
								echo '<span class="themer-pro-image-rename-button"/>' . __( 'Rename', 'themer-pro' ) . '</span>';
								echo '</div>';
								echo '<div class="themer-pro-listed-image-inner themer-pro-not-faded">';
								echo '<a href="' . $child_images_url . '/' . substr( $filename, strrpos( $filename, '/' ) + 1 ) . '" target="_blank"><img class="themer-pro-listed-image" height="100" width="10" src="' . $child_images_url . '/' . substr( $filename, strrpos( $filename, '/' ) + 1 ) . '"></a>';
								echo '<img class="themer-pro-ajax-save-spinner" src="' . THMRPRO_URL . '/lib/css/images/ajax-save-in-progress.gif" />';
								echo '<span class="themer-pro-saved"></span>';
								echo '</div>';
								echo '<div class="themer-pro-listed-image-info-inner themer-pro-faded">';
								echo '<span class="themer-pro-image-info-item-heading"><span class="dashicons dashicons-info"></span>' . __( 'Image Info', 'themer-pro' ) . '</span>';
								echo '<span class="themer-pro-image-info-item"><span class="dashicons dashicons-admin-links"></span><a href="' . $child_images_url . '/' . substr( $filename, strrpos( $filename, '/' ) + 1 ) . '" target="_blank">' . basename( $filename ) . '</span></a>';
								echo '<span class="themer-pro-image-info-item"><span class="dashicons dashicons-format-image"></span>' . __( 'W: ', 'themer-pro' ) . $image_size[0] . 'px' .  __( ' H: ', 'themer-pro' ) . $image_size[1] . 'px' . '</span>';
								echo '<span class="themer-pro-image-info-item"><span class="dashicons dashicons-format-image"></span>' . __( 'Filesize: ', 'themer-pro' ) . themer_pro_format_size_units( filesize( $filename ) ) . '</span>';
								echo '</div>';
								echo '<div class="themer-pro-listed-image-footer">';
								echo '<span class="themer-pro-image-info-button dashicons dashicons-editor-help"/></span>';
								echo '<span class="themer-pro-image-delete-button dashicons dashicons-no"/></span>';
								echo '</div>';
								echo '</li>';
							    
							}
						?>
					</ul>
					
					<div class="themer-pro-image-delete-all-button-container">
						<span class="button rounded-button button-highlighted themer-pro-image-delete-all-button"/><?php _e( 'Delete ALL Images', 'themer-pro' ); ?></span>
						<img class="themer-pro-ajax-save-spinner" src="<?php echo THMRPRO_URL; ?>/lib/css/images/ajax-save-in-progress.gif" />
						<span class="themer-pro-saved"></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>