<?php
/**
 * Handles the file editor functionality.
 *
 * @package Themer Pro
 */
 
/**
 * Build the advanced file editor controls.
 *
 * @since 1.0.0
 * @return the advanced file editor controls.
 */
function themer_pro_file_editor_controls() {
	
	$controls = '<form action="/" id="themer-pro-file-editor-file-control-form" name="themer-pro-file-editor-file-control-form">';
	$controls .= '<input type="hidden" name="action" value="themer_pro_file_control_save" />';
	$controls .= '<input type="hidden" name="security" value="' . wp_create_nonce( 'themer-pro-file-control' ) . '" />';
	
	$controls .= '<select id="themer-pro-file-editor-control-action" name="themer[control_action]" size="1">';
	$controls .= '<option value="create_file">' . __( 'Create A File', 'themer-pro' ) . '</option>';
	$controls .= '<option value="create_folder">' . __( 'Create A Folder', 'themer-pro' ) . '</option>';
	$controls .= '<option value="rename_file">' . __( 'Rename A File', 'themer-pro' ) . '</option>';
	$controls .= '<option value="rename_folder">' . __( 'Rename A Folder', 'themer-pro' ) . '</option>';
	$controls .= '<option value="delete_file">' . __( 'Delete A File', 'themer-pro' ) . '</option>';
	$controls .= '<option value="delete_folder">' . __( 'Delete A Folder', 'themer-pro' ) . '</option>';
	$controls .= '</select>';
	
	$controls .= '<div id="themer-pro-file-editor-create-file-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'File Name:', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-file-name" type="text" class="themer-pro-file-editor-control-input forbid-chars default-text" name="themer[file_name]" value="" title="' . __( 'example.php', 'themer-pro' ) . '">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Path to file (click a folder to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-file-path" type="text" class="themer-pro-file-editor-control-input" name="themer[file_path]" value="/" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-editor-create-folder-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Folder Name:', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-folder-name" type="text" class="themer-pro-file-editor-control-input forbid-chars default-text" name="themer[folder_name]" value="" title="' . __( 'example-folder', 'themer-pro' ) . '">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Path to folder (click a folder to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-folder-path" type="text" class="themer-pro-file-editor-control-input" name="themer[folder_path]" value="/" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-editor-rename-file-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'New File Name:', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-new-file-name" type="text" class="themer-pro-file-editor-control-input forbid-chars default-text" name="themer[file_name]" value="" title="' . __( 'example.php', 'themer-pro' ) . '">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'File to rename (click a file to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-file-rename" type="text" class="themer-pro-file-editor-control-input" name="themer[file_rename]" value="/" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-editor-rename-folder-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'New Folder Name:', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-new-folder-name" type="text" class="themer-pro-file-editor-control-input forbid-chars default-text" name="themer[folder_name]" value="" title="' . __( 'example-folder', 'themer-pro' ) . '">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Folder to rename (click a folder to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-folder-rename" type="text" class="themer-pro-file-editor-control-input" name="themer[folder_rename]" value="/" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-editor-delete-file-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Path to file (click a file to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-delete-file-path" type="text" class="themer-pro-file-editor-control-input" name="themer[delete_file_path]" value="/example.php" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-editor-delete-folder-container" class="themer-pro-file-editor-control-container">';
	$controls .= '<span class="themer-pro-file-editor-control-text">' . __( 'Path to folder (click a folder to change):', 'themer-pro' ) . '</span>';
	$controls .= '<input id="themer-pro-file-editor-control-delete-folder-path" type="text" class="themer-pro-file-editor-control-input" name="themer[delete_folder_path]" value="/example-folder" readonly>';
	$controls .= '</div>';
	
	$controls .= '<div id="themer-pro-file-control-save-container">';
	$controls .= '<input id="themer-pro-file-control-save-button" type="submit" value="' . __( 'Create File', 'themer-pro' ) . '" name="Submit" alt="Create File" onClick=\'if(this.value == "Delete File"){return confirm("' . __( 'Are you sure you want to delete this file?', 'themer-pro' ) . '")} else if(this.value == "Delete Folder"){return confirm("' . __( 'Are you sure you want to delete this folder?', 'themer-pro' ) . '")}\' class="button-highlighted themer-pro-settings-button button rounded-button"/>';
	$controls .= '<img class="themer-pro-ajax-save-spinner" src="' . THMRPRO_URL . '/lib/css/images/ajax-save-in-progress.gif" />';
	$controls .= '<span class="themer-pro-saved"></span>';
	$controls .= '</div>';
	$controls .= '</form>';
	
	return $controls;
	
}

/**
 * Build a file tree based on a specified directory.
 *
 * @since 1.0.0
 * @return a file tree based on a specified directory.
 */
function themer_pro_file_tree( $directory, $parent = false ) {

	if ( substr( $directory, -1 ) == '/' )
		$directory = substr( $directory, 0, strlen( $directory ) - 1 );

	$code = themer_pro_file_tree_dir( $directory, $parent );
	
	return $code;
	
}

/**
 * Recursively list directories/files based on a specified directory.
 *
 * @since 1.0.0
 * @return a list directories/files based on a specified directory.
 */
function themer_pro_file_tree_dir( $directory, $parent, $first_call = true ) {

	// Get and sort directories and files.
	$file = scandir( $directory );
	natcasesort( $file );
	$files = $dirs = array();
	foreach( $file as $this_file ) {
		
		if ( is_dir( $directory . '/' . $this_file ) )
			$dirs[] = $this_file;
		else
			$files[] = $this_file;
		
	}
	$file = array_merge( $dirs, $files );
	$file_tree = '';
	
	if ( count( $file ) > 2 ) { // Use 2 instead of 0 to account for . and .. "directories"
	
		$theme_name = substr( themer_pro_get_theme_folder_name( $parent ), strrpos( themer_pro_get_theme_folder_name( $parent ), '/' ) );
		
		$editor_controls_height = '';
		if ( ! themer_pro_get_settings( 'enable_advanced_file_editor_controls' ) )
			$editor_controls_height = ' style="height:582px;"';
			
		$file_tree .= '<ul';
		if ( $first_call )
			$file_tree .= ' class="themer-pro-file-tree"' . $editor_controls_height;
			
		$file_tree .= '>';
		if ( $first_call ) {
			
			$file_tree .= '<li id="ctft-root-directory" class="ctft-directory" data-file-name="/"><i class="fa fa-caret-down ctft-directory-icon" aria-hidden="true"></i><a href="#">' . $theme_name . '</a></li>';
			$first_call = false;
			
		}
		foreach( $file as $this_file ) {
			
			if ( substr( $this_file, 0, 1 ) != '.' ) {
				
				$wp_content_folder = substr( WP_CONTENT_DIR, strrpos( WP_CONTENT_DIR, '/' ) + 1 );
				$themes_folder = substr( get_theme_root(), strrpos( get_theme_root(), '/' ) + 1 );
				
				if ( is_dir( $directory . '/' . $this_file ) ) {
					
					$rel_folder_path_array = explode( $wp_content_folder . '/' . $themes_folder . '/' . themer_pro_get_theme_folder_name( $parent ), $directory . '/' . urlencode( $this_file ) );
					$rel_folder_path = $rel_folder_path_array[1];

					$file_tree .= '<li class="ctft-directory" data-file-name="' . $rel_folder_path . '"><i class="fa fa-caret-right ctft-directory-icon" aria-hidden="true"></i><a href="#">' . htmlspecialchars( $this_file ) . '</a>';
					$file_tree .= themer_pro_file_tree_dir( $directory . '/' . $this_file, $parent, $first_call = false );
					$file_tree .= '</li>';
					
				} else {

					$file_ext = substr( $this_file, strrpos( $this_file, '.' ) + 1 );
					$ext = 'ext-' . $file_ext;
					if ( $file_ext == 'js' || $file_ext == 'md' || $file_ext == 'sh' )
						$this_file_in_id = substr( strtolower( $this_file ), 0, -3 );
					elseif ( $file_ext == 'json' || $file_ext == 'less' || $file_ext == 'sass' || $file_ext == 'scss' )
						$this_file_in_id = substr( strtolower( $this_file ), 0, -5 );
					else
						$this_file_in_id = substr( strtolower( $this_file ), 0, -4 );
						
					$file_edit_class = '';
					$file_functions_class = '';
					if ( $file_ext == 'php' || $file_ext == 'css' || $file_ext == 'json' || $file_ext == 'less' || $file_ext == 'sass' || $file_ext == 'scss' || $file_ext == 'js' || $file_ext == 'xml' || $file_ext == 'md' || $file_ext == 'sh' || $file_ext == 'pot' || $file_ext == 'txt' ) {
						
						$file_edit_class = 'ctft-file-edit ';
						$file_functions_class = $this_file == 'functions.php' ? 'ctft-file-functions ' : '';
						
					}
					
					$rel_path_array = explode( $wp_content_folder . '/' . $themes_folder . '/' . themer_pro_get_theme_folder_name( $parent ), $directory . '/' . urlencode( $this_file ) );
					$rel_path = substr( $rel_path_array[1], 1 );
					$li_id_partial = str_replace( array( '/', '.' ), '-', themer_pro_get_string_between( $directory . '/' . $this_file, $wp_content_folder . '/' . $themes_folder . '/' . $theme_name, '.' ) );
						
					$file_tree .= '<li id="themer-pro' . $li_id_partial . '-' . $file_ext . '-textarea-container-li" class="ctft-file ' . $file_edit_class . $file_functions_class . strtolower( $ext ) . '" data-file-name="' . $rel_path . '"><a href=#>' . htmlspecialchars( $this_file ) . '</a></li>';
						
				}
				
			}
			
		}
		$file_tree .= '</ul>';

	}
	
	return $file_tree;
	
}
