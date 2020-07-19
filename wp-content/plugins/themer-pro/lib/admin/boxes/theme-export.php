<?php
/**
 * Builds the Child Theme Export admin content.
 *
 * @package Themer Pro
 */
?>

<div id="themer-pro-settings-nav-export-box" class="themer-pro-optionbox-outer-1col themer-pro-all-options themer-pro-options-display">
<?php	if ( ! empty( $_GET['notice'] ) ) {
			if ( $_GET['notice'] == 'theme-no-name-error' ) {
?>				<div class="notice-box"><strong><?php _e( 'Theme Name Missing Error: You must fill in the "Theme Name" field to create a Child Theme.', 'themer-pro' ); ?></strong></div>
<?php		} elseif ( $_GET['notice'] == 'theme-exists-error' ) {
?>				<div class="notice-box"><strong><?php _e( 'Theme Creation Error: A theme folder with this name already exists in your /wp-content/themes/ direcotory.', 'themer-pro' ); ?></strong></div>
<?php		} elseif ( $_GET['notice'] == 'screenshot-upload-error' ) {
?>				<div class="notice-box"><strong><?php _e( 'Screenshot Upload Error: There was a problem uploading your screenshot image. Make sure it is a .png image file and no more than 2mb in size.', 'themer-pro' ); ?></strong></div>
<?php		} elseif ( $_GET['notice'] == 'theme-creation-success' ) {
?>				<div class="notice-box"><strong><?php _e( 'Child Theme successfully created! You may now activate it', 'themer-pro' ); ?> <a href="<?php echo admin_url() ?>themes.php"><?php _e( 'HERE', 'themer-pro' ); ?></a>.</strong></div>
<?php		} elseif ( $_GET['notice'] == 'theme-creation-success-mu' ) {
?>				<div class="notice-box"><strong><?php _e( 'Child Theme successfully created! To activate it you must first Network Enable it', 'themer-pro' ); ?> <a href="<?php echo network_admin_url() ?>themes.php" target="_blank"><?php _e( 'HERE', 'themer-pro' ); ?></a> <?php _e( 'and then you may activate it', 'themer-pro' ); ?> <a href="<?php echo admin_url() ?>themes.php"><?php _e( 'HERE', 'themer-pro' ); ?></a>.</strong></div>
<?php		} elseif ( $_GET['notice'] == 'themer-pro-unwritable' ) {
?>				<div class="notice-box"><strong><?php _e( 'It appears that some of your files/folders are unwritable to Themer Pro. Please refer to', 'themer-pro' ); ?> <a href="http://themerdocs.cobaltapps.com/article/122-does-themer-pro-have-any-special-file-permissions-requirements-or-recommendations" target="_blank"><?php _e( 'THIS KNOWLEDGEABLE ARTICLE', 'themer-pro' ); ?></a> <?php _e( 'for a possible solution.', 'themer-pro' ); ?></strong></div>
<?php		}
		}
?>
	<?php if ( false !== themer_pro_devkit_active_check() ) { ?>
	
		<div class="themer-pro-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
			<div class="themer-pro-child-theme-export-wrap" style="padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">
				<div class="themer-pro-child-theme-export-2col-left" style="width:100%;margin:0;">
					<div id="readme-box" style="margin-right:0; margin-bottom:0;">
						<p style="font-size:16px;">
							<?php _e( 'Because a DevKit Plugin is currently active this feature has been disabled to prevent conflicts. To use this function you must first', 'themer-pro' ); ?>
							<a href="<?php echo admin_url(); ?>plugins.php"><?php _e( 'deactive the DevKit Plugin', 'themer-pro' ); ?></a>.
						</p>
					</div>
				</div>
			</div>
		</div>
	
	<?php } else { ?>
	
		<div class="themer-pro-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
			<h3 style="border:0;"><?php _e( 'Child Theme Creator', 'themer-pro' ); ?></h3>
		
			<div class="themer-pro-child-theme-export-wrap" style="padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">
				<div class="themer-pro-child-theme-export-2col-left">
					<div id="readme-box" style="margin-right:0; margin-bottom:0;">
						<p style="font-size:16px;">
							<?php _e( 'This tool creates a new Child Theme based on the content of these form fields and then places it in', 'themer-pro' ); ?>
							<a href="<?php echo admin_url() ?>themes.php"><?php _e( 'Appearance > Themes', 'themer-pro' ); ?></a>.
						</p>
						<p style="font-size:16px;">
							<?php _e( 'All that is required is that you fill in the "Theme Name" field and then click the "Create Child Theme" button. Any other fields that are not filled in will simply use the default values.', 'themer-pro' ); ?>
						</p>
						<?php if ( themer_pro_active_theme_check() == 'genesis' ) { ?>
    					<p style="font-size:16px;">
    						<?php _e( 'By default the Genesis Sample Theme, which is used to create the custom Genesis Child Themes, includes Genesis Starter Packs. This means that upon activation you are taken to an admin page where you can select which Plugins, static homepage, images, and menu content you would like added to your site. If you prefer setting these things up for yourself then be sure to select the "Remove Starter Pack functionality" option before creating your Child Theme.', 'themer-pro' ); ?>
    					</p>
    					<?php } ?>
						<p style="font-size:16px;">
							<?php _e( 'Note that if you select the option to clone the currently active Child Theme then all the files inside that Child Theme will be included with your new Child Theme. Otherwise a stock Child Theme will be created.', 'themer-pro' ); ?>
						</p>
						<p style="font-size:16px;">
							<?php _e( 'Also note that if you do not select a custom screenshot image to be included with your custom Child Theme then a default one will be used. (Image must be in .png format, and no larger than 2mb in size.)', 'themer-pro' ); ?>
						</p>
					</div>
				</div>
				
				<div class="themer-pro-child-theme-export-2col-right">
					<div class="bg-box" style="margin-right:0; margin-bottom:0;">
					<form id="themer-pro-theme-creator-form" method="post" enctype="multipart/form-data">
						<p>
							<input type="text" class="default-text" id="theme-name" name="theme_name" value="" title="<?php _e( $active_theme->get( 'Name' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Theme Name *', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-uri" name="theme_uri" value="" title="<?php _e( $active_theme->get( 'ThemeURI' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Theme URI', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-description" name="theme_description" value="" title="<?php _e( $active_theme->get( 'Description' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Description', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-author" name="theme_author" value="" title="<?php _e( $active_theme->get( 'Author' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Author', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-author-uri" name="theme_author_uri" value="" title="<?php _e( $active_theme->get( 'AuthorURI' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Author URI', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-version-number" name="theme_version_number" value="" title="<?php _e( $active_theme->get( 'Version' ), 'themer-pro' ); ?>" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Version #', 'themer-pro' ); ?><br />
							<input type="text" class="default-text" id="theme-tags" name="theme_tags" value="" title="<?php _e( implode( ', ', $active_theme->get( 'Tags' ) ), 'themer-pro' ); ?>" style="width:190px;" /> <?php _e( 'Tags', 'themer-pro' ); ?><br /><br />
							
							<?php if ( themer_pro_active_theme_check() == 'genesis' ) { ?>
							<input type="checkbox" id="remove-starter-packs" name="remove_starter_packs" value="1" > <?php _e( 'Remove Starter Pack functionality?', 'themer-pro' ); ?> <span id="remove-starter-packs-not-available"></span><br /><br />
							<?php } ?>
							
							<?php _e( 'Select Child Theme Type', 'themer-pro' ); ?><br />
							<select id="themer-pro-child-theme-select" class="themer-pro-settings-select-menu" name="child_theme_select" size="1">
								<?php themer_pro_build_select_menu_options( themer_pro_child_theme_select_array(), '' ); ?>
							</select>
							
							<div id="themer-pro-screenshot-image-upload-container">
							    <span><?php _e( 'Select Screenshot Image:', 'themer-pro' ); ?></span><br />
							    <input type="file" name="screenshot_upload" id="screenshot_upload">							
							</div><br />
							
							<div id="themer-pro-theme-creator-button-container">
								<input type="submit" name="clicked_button" value="<?php _e( 'Create Child Theme', 'themer-pro' ); ?>" class="button-highlighted themer-pro-settings-button button rounded-button"/>
								<input type="hidden" name="action" value="themer_pro_theme_create">
								<img class="themer-pro-ajax-save-spinner" src="<?php echo THMRPRO_URL . '/lib/css/images/ajax-save-in-progress.gif'; ?>" />							
							</div>
						</p>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="themer-pro-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
			<h3 style="border:0;"><?php _e( 'Child Theme Export', 'themer-pro' ); ?></h3>
					
			<div class="themer-pro-child-theme-export-wrap" style="padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">
				<div class="themer-pro-child-theme-export-2col-left">
					<div id="readme-box" style="margin-right:0; margin-bottom:0;">
						<p>
							<?php _e( 'This feature simply zips up the currently active Child Theme and then downloads it to your computer. Ideal for backup or transferring to a new WordPress installation.', 'themer-pro' ); ?>
						</p>
					</div>
				</div>
				
				<div class="themer-pro-child-theme-export-2col-right">
					<div class="bg-box" style="margin-right:0; margin-bottom:0;">
					<form id="themer-pro-theme-export-form" method="post" enctype="multipart/form-data">
						<p>
							<input type="submit" name="clicked_button" value="<?php _e( 'Download Child Theme', 'themer-pro' ); ?>" class="button-highlighted themer-pro-settings-button button rounded-button"/>
							<input type="hidden" name="action" value="themer_pro_theme_export">
						</p>
					</form>
					</div>
				</div>
			</div>
		</div>
	
	<?php } ?>
		
</div>