<?php
/**
 * This file houses the general helper functions used
 * throughout the Themer Pro plugin.
 *
 * @package Themer Pro
 */
 
/**
 * Create a conditional that returns the active theme folder names.
 *
 * @since 1.0.0
 * @return the active theme folder names.
 */
function themer_pro_active_theme_check( $child = false ) {
	
	if ( defined( 'ASTRA_THEME_VERSION' ) )
		$active_theme = false != $child ? 'astra-child' : 'astra';
	elseif ( defined( 'FL_THEME_VERSION' ) )
		$active_theme = false != $child ? 'bb-theme-child' : 'bb-theme';
	elseif ( defined( 'FREELANCER_PARENT_THEME_NAME' ) )
		$active_theme = false != $child ? 'freelancer-child' : 'freelancer';
	elseif ( defined( 'GENERATE_VERSION' ) )
		$active_theme = false != $child ? 'generatepress_child' : 'generatepress';
	elseif ( defined( 'PARENT_THEME_NAME' ) && PARENT_THEME_NAME == 'Genesis' )
		$active_theme = false != $child ? 'genesis-sample' : 'genesis';
	elseif ( defined( 'OCEANWP_THEME_VERSION' ) )
		$active_theme = false != $child ? 'oceanwp-child-theme' : 'oceanwp';
	elseif ( function_exists( 'twentysixteen_setup' ) )
		$active_theme = false != $child ? 'twentysixteen-child' : 'twentysixteen';
	elseif ( function_exists( 'twentyseventeen_setup' ) )
		$active_theme = false != $child ? 'twentyseventeen-child' : 'twentyseventeen';
	elseif ( function_exists( 'twentynineteen_setup' ) )
		$active_theme = false != $child ? 'twentynineteen-child' : 'twentynineteen';
	elseif ( function_exists( 'twentytwenty_theme_support' ) )
		$active_theme = false != $child ? 'twentytwenty-child' : 'twentytwenty';
	else
		$active_theme = false;

	return $active_theme;
	
}

/**
 * Create a conditional that checks for an active DevKit Plugin.
 *
 * @since 1.0.6
 * @return a conditional that checks for an active DevKit Plugin.
 */
function themer_pro_devkit_active_check() {
	
	if ( defined( 'GDEVKIT_VERSION') || defined( 'FDEVKIT_VERSION' ) )
		$devkit_active = true;
	else
		$devkit_active = false;

	return $devkit_active;
	
}

/**
 * Build Ace Editor Key Bindings drop-down list.
 *
 * @since 1.1.3
 * @return Ace Editor Key Bindings array.
 */
function themer_pro_ace_editor_key_bindings_array() {
	
	$themer_pro_ace_editor_key_bindings_array = array(
		'Default' => 'ace',
		'Sublime' => 'sublime',
		'Emacs' => 'emacs',
		'Vim' => 'vim',
	);
	
	return $themer_pro_ace_editor_key_bindings_array;
	
}

/**
 * Build Ace Editor Font Size drop-down list.
 *
 * @since 1.2.0
 * @return Ace Editor Font Size array.
 */
function themer_pro_ace_editor_font_size_array() {
	
	$themer_pro_ace_editor_font_size_array = array(
		'10px' => '10',
		'11px' => '11',
		'12px' => '12',
		'13px' => '13',
		'14px' => '14',
		'15px' => '15',
		'16px' => '16',
		'17px' => '17',
		'18px' => '18',
		'19px' => '19',
		'20px' => '20',
	);
	
	return $themer_pro_ace_editor_font_size_array;
	
}
 
/**
 * Build Ace Editor Themes drop-down list.
 *
 * @since 1.0.0
 * @return Ace Editor Themes array.
 */
function themer_pro_ace_editor_themes_array() {
	
	$themer_pro_ace_editor_themes_array = array(
		'Ambiance' => 'ambiance',
		'Chaos' => 'chaos',
		'Chrome' => 'chrome',
		'Clouds' => 'clouds',
		'Clouds Midnight' => 'clouds_midnight',
		'Cobalt' => 'cobalt',
		'Crimson Editor' => 'crimson_editor',
		'Dawn' => 'dawn',
		'Dreamweaver' => 'dreamweaver',
		'Eclipse' => 'eclipse',
		'GitHub' => 'github',
		'Gob' => 'gob',
		'GruvBox' => 'gruvbox',
		'Idle Fingers' => 'idle_fingers',
		'iPlastic' => 'iplastic',
		'Katzenmilch' => 'katzenmilch',
		'KR Theme' => 'kr_theme',
		'Kurior' => 'kurior',
		'Merbivore' => 'merbivore',
		'Merbivore Soft' => 'merbivore_soft',
		'Mono Industrial' => 'mono_industrial',
		'Monokai' => 'monokai',
		'Pastel On Dark' => 'pastel_on_dark',
		'Solarized Dark' => 'solarized_dark',
		'Solarized Light' => 'solarized_light',
		'SQL Server' => 'sql_server',
		'Terminal' => 'terminal',
		'Textmate' => 'textmate',
		'Tomorrow' => 'tomorrow',
		'Tomorrow Night' => 'tomorrow_night',
		'Tomorrow Night Blue' => 'tomorrow_night_blue',
		'Tomorrow Night Bright' => 'tomorrow_night_bright',
		'Tomorrow Night Eighties' => 'tomorrow_night_eighties',
		'Twilight' => 'twilight',
		'Vibrant Ink' => 'vibrant_ink',
		'Xcode' => 'xcode',
	);
	
	return $themer_pro_ace_editor_themes_array;
	
}

/**
 * Build an array of dark Ace Editor themes.
 * Used to determine which way to style the editor
 * containers and other Ace Editor elements to best
 * match the type of theme (light or dark) being used.
 *
 * @since 1.0.0
 * @return an array of dark Ace Editor themes.
 */
function themer_pro_ace_editor_dark_themes_array() {
	
	$themer_pro_ace_editor_dark_themes_array = array(
		'ambiance',
		'chaos',
		'clouds_midnight',
		'cobalt',
		'gob',
		'gruvbox',
		'idle_fingers',
		'kr_theme',
		'merbivore',
		'merbivore_soft',
		'mono_industrial',
		'monokai',
		'pastel_on_dark',
		'solarized_dark',
		'terminal',
		'tomorrow_night',
		'tomorrow_night_blue',
		'tomorrow_night_bright',
		'tomorrow_night_eighties',
		'twilight',
		'vibrant_ink',
	);
	
	return $themer_pro_ace_editor_dark_themes_array;
	
}

/**
 * Build Child Theme Select drop-down list.
 *
 * @since 1.1.0
 * @return Child Theme Select array.
 */
function themer_pro_child_theme_select_array() {
	
	if ( themer_pro_active_theme_check() == 'genesis' ) {
	
		$themer_pro_child_theme_select_array = array(
			'Genesis Sample' => 'genesis-sample',
			'Genesis Sample Sass' => 'genesis-sample-sass',
			'Genesis Sample Gulp' => 'genesis-sample-gulp',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'astra' ) {

		$themer_pro_child_theme_select_array = array(
			'Astra Child' => 'astra_child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'bb-theme' ) {

		$themer_pro_child_theme_select_array = array(
			'BB Child' => 'bb_child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'freelancer' ) {
		
		$themer_pro_child_theme_select_array = array(
			'Freelancer Child' => 'freelancer-child',
			'Freelancer Child Sass' => 'freelancer-child-sass',
			'Freelancer Child Gulp' => 'freelancer-child-gulp',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'generatepress' ) {
		
		$themer_pro_child_theme_select_array = array(
			'GeneratePress Child' => 'generatepress_child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'oceanwp' ) {

		$themer_pro_child_theme_select_array = array(
			'OceanWP Child' => 'oceanwp_child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'twentysixteen' ) {

		$themer_pro_child_theme_select_array = array(
			'Twentysixteen Child' => 'twentysixteen-child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'twentyseventeen' ) {

		$themer_pro_child_theme_select_array = array(
			'Twentyseventeen Child' => 'twentyseventeen-child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'twentynineteen' ) {

		$themer_pro_child_theme_select_array = array(
			'Twentynineteen Child' => 'twentynineteen-child',
		);
		
	} elseif ( themer_pro_active_theme_check() == 'twentytwenty' ) {

		$themer_pro_child_theme_select_array = array(
			'Twentytwenty Child' => 'twentytwenty-child',
		);
		
	}
	
	if ( is_child_theme() )
		$themer_pro_child_theme_select_array['Clone Active Child Theme'] = 'clone-child-theme';
	
	return $themer_pro_child_theme_select_array;
	
}

/**
 * Build the Themer Pro select menu options.
 *
 * @since 1.0.0
 */
function themer_pro_build_select_menu_options( $options_array = array(), $selected = '' ) {
	
	foreach( $options_array as $key => $value ) {
		
		$option = '<option value="' . $value . '"';
			
		if ( $value == $selected )
			$option .= ' selected="selected"';

		$option .= '>' . $key . '</option>';
		
		echo $option;
		
	}
	
}

/**
 * Add a custom WP Admin Bar node, built by the
 * themer_pro_admin_bar_build_node() function.
 *
 * @since 1.0.1
 */
function themer_pro_admin_bar_add_node( $file, $subdir = 'page-templates', $fullscreen = false ) {
	
	add_action( 'wp_head', function() {
		echo '<style type="text/css">' . "\n";
		echo '	/* Themer Pro Admin Bar Edit Link Styles */' . "\n";
		echo '	#wpadminbar #wp-admin-bar-themer-pro-edit > .ab-item:before { content: "\f475"; top: 2px; }' . "\n";
		echo '</style>' . "\n";
	});
	
	add_action( 'admin_bar_menu', function() use ( $file, $subdir, $fullscreen ) {
		themer_pro_admin_bar_build_node( $file, $subdir, $fullscreen );
	}, 999 );
	
}

/**
 * Build a custom WP Admin Bar node to create frontend links
 * to specified Child Editor files in the WP Dashboard.
 *
 * @since 1.0.1
 */
function themer_pro_admin_bar_build_node( $file, $subdir = 'page-templates', $fullscreen = false ) {
	
	global $wp_admin_bar;

	$args = array(
		'id' => 'themer-pro-edit',
		'title' => 'Edit Code',
		'href' => admin_url( 'admin.php?page=themer-pro-child-editor&activefile=' . str_replace( '.', '-', $file ) . '&subdir=' . $subdir . '&fullscreen=' . $fullscreen ),
	);
	$wp_admin_bar->add_node( $args );
	
}

/**
 * Return proper size/unit info (used for image size info).
 *
 * @since 1.0.0
 * @return proper size/unit info.
 */
function themer_pro_format_size_units( $bytes ) {
	
	if ( $bytes >= 1073741824 )
		$bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
	elseif ( $bytes >= 1048576 )
		$bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
	elseif ( $bytes >= 1024 )
		$bytes = number_format( $bytes / 1024, 2 ) . ' KB';
	elseif ( $bytes > 1 )
		$bytes = $bytes . ' bytes';
	elseif ( $bytes == 1 )
		$bytes = $bytes . ' byte';
	else
		$bytes = '0 bytes';
	
	return $bytes;
	
}

/**
 * Rebuild the multi-image file upload array to be
 * better suited for feeding into the image upload script.
 *
 * @since 1.0.0
 * @return a more usable image upload file array.
 */
function themer_pro_rearray_multi_image_upload( $file_post ) {

	$file_array = array();
	$file_count = count( $file_post['name'] );
	$file_keys = array_keys( $file_post );
	
	for ( $i=0; $i<$file_count; $i++ ) {
		
		foreach ( $file_keys as $key ) {
			
			$file_array[$i][$key] = $file_post[$key][$i];
			
		}
		
	}
	
	return $file_array;
	
}

/**
 * Return either the Parent Theme or Active/Child Theme directory.
 *
 * @since 1.0.0
 * @return specified theme directory.
 */
function themer_pro_get_theme_directory( $parent = true ) {
	
	if ( false == $parent )
		$theme_dir = get_stylesheet_directory();
	else
		$theme_dir = get_template_directory();
	
	return $theme_dir;
	
}

/**
 * Return either the Parent Theme or Active/Child Theme folder name.
 *
 * @since 1.0.0
 * @return specified theme folder name.
 */
function themer_pro_get_theme_folder_name( $parent = true ) {
	
	if ( false == $parent ) {
		
		$theme_folder_name = get_stylesheet();
		
	} else {
		
		$template_dir_explode = explode( '/', get_template_directory() );
		$theme_folder_name = array_pop( $template_dir_explode );
		
	}
	
	return $theme_folder_name;
	
}

/**
 * Check if directory exists and try and create it if it does not.
 *
 * @since 1.0.0
 * @return true or false based on the findings of the function.
 */
function themer_pro_dir_check( $dir, $check_only = false ) {
	
	if ( ! is_dir( $dir ) && $check_only == false ) {
		
		mkdir( $dir );
		@chmod( $dir, 0755 );
		
	}
	
	if ( is_dir( $dir ) )
		return true;
	else
		return false;
		
}

/**
 * Scan a specified directory and return the names of the directories inside it.
 *
 * @since 1.0.0
 * @return the names of directories inside a specified directory.
 */
function themer_pro_get_dir_names( $dir ) {
	
	if ( ! is_dir( $dir ) )
		return;
	
	$directories = scandir( $dir );
	$directory_array = array();
	
	foreach( $directories as $directory ) {
		
	    if ( $directory === '.' or $directory === '..' )
	    	continue;
	
	    if ( is_dir( $dir . '/' . $directory ) )
			$directory_array[] = $directory;
			
	}
	
	return $directory_array;
	
}

/**
 * Recursively copy all files and folders from one location to another.
 *
 * @since 1.0.0
 */
function themer_pro_copy_dir( $source, $destination ) {
	
	if ( is_dir( $source ) ) {
		
		if ( ! is_dir( $destination ) )
			@mkdir( $destination, 0755, true );

		$handle = opendir( $source );
		while( false !== ( $readdirectory = readdir( $handle ) ) ) {
			
			if ( $readdirectory == '.' || $readdirectory == '..' )
				continue;

			$pathdir = $source . '/' . $readdirectory; 
			if ( is_dir( $pathdir ) ) {
				
				themer_pro_copy_dir( $pathdir, $destination . '/' . $readdirectory );
				continue;
				
			}
			copy( $pathdir, $destination . '/' . $readdirectory );
			
		}
		closedir( $handle );
		
	} else {
		
		copy( $source, $destination );
		
	}
	
}

/**
 * Recursively delete specific folders.
 *
 * @since 1.0.0
 */
function themer_pro_delete_dir( $dir ) {
	
	if ( ! is_dir( $dir ) )
		return;
	
	$handle = opendir( $dir );
	while( false !== ( $file = readdir( $handle ) ) ) {
		
		if ( is_dir( $dir . '/' . $file ) ) {
			
			if ( ( $file != '.' ) && ( $file != '..' ) )
				themer_pro_delete_dir( $dir . '/' . $file );

		} else {
			
			unlink( $dir . '/' . $file );
			
		}
	}
	closedir( $handle );
	rmdir( $dir );
	
}

/**
 * Delete a specified directory and all contents within it
 * and then add the root folder back in.
 *
 * @since 1.0.0
 */
function themer_pro_cleanup_dir( $dir ) {
	
	themer_pro_delete_dir( $dir );
	themer_pro_dir_check( $dir );
	
}

/**
 * Build an array of all files and folders inside
 * a specific directory based on certain criteria.
 *
 * @since 1.1.0
 * @return an array of all files and folders inside a specific directory.
 */
function themer_pro_rsearch( $folder, $pattern ) {
	
	$dir = new RecursiveDirectoryIterator( $folder, RecursiveDirectoryIterator::SKIP_DOTS );
	$ite = new RecursiveIteratorIterator( $dir );
	$files = new RegexIterator( $ite, $pattern, RegexIterator::GET_MATCH );
	$file_list = array();
	
	foreach( $files as $file )
		$file_list = array_merge( $file_list, $file );
		
	return $file_list;
	
}

/**
 * Return the entire line of text where a specified string exists.
 *
 * @since 1.0.0
 * @return entire line of text where specified string exists.
 */
function themer_pro_get_line_of_text( $file_contents, $string ) {
	
	$pattern = '/^.*\b' . $string . '\b.*$/m';
	$matches = array();
	preg_match( $pattern, $file_contents, $matches );
	
	return $matches;
	
}

/**
 * Return the contents of a string with specified line replaced.
 *
 * @since 1.0.0
 * @return the contents of a string with specified line replaced.
 */
function themer_pro_replace_line_of_text( $content, $old_line, $new_line ) {

	$new_content = str_replace( $old_line, $new_line, $content );
	
	return $new_content;
	
}

function themer_pro_get_string_between( $string, $start, $end ) {
	
	$string = ' ' . $string;
	$ini = strrpos( $string, $start );
	if ( $ini == 0 )
		return '';
		
	$ini += strlen( $start );
	$len = strrpos( $string, $end, $ini ) - $ini;
	
	return substr( $string, $ini, $len );
	
}

/**
 * Sanatize strings of text.
 *
 * @since 1.0.0
 */
function themer_pro_sanatize_string( $string = '', $underscore = false ) {
	
    //lower case everything
    $string = strtolower( $string );
    //make alphaunermic
    $string = preg_replace( "/[^a-z0-9_\s-]/", "", $string );
    //Clean multiple dashes or whitespaces
    $string = preg_replace( "/[\s-]+/", " ", $string );
    if ( false != $underscore ) {
    	
	    // Convert whitespaces and dashes to underscore
	    $string = preg_replace( "/[\s-]/", "_", $string );
	    
    } else {
    	
	    // Convert whitespaces and underscore to dash
	    $string = preg_replace( "/[\s_]/", "-", $string );
	    
	}
    return $string;
    
}

/**
 * Write to a file or create it if it does not exist.
 *
 * @since 1.0.0
 *
 */
function themer_pro_write_file( $path, $code, $stripslashes = true ) {
	
	$handle = @fopen( $path, 'w' );
	
	if ( false == $stripslashes )
		@fwrite( $handle, $code );
	else
		@fwrite( $handle, stripslashes( $code ) );
		
	@fclose( $handle );
	
}
