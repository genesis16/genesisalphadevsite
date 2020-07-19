<?php
/**
 * Builds the Parent/Child Theme File Editor Ajax functionality.
 *
 * @package Themer Pro
 */
 
if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ) )
	require_once( THMRPRO_DIR . 'lib/admin/lessphp/lessc.inc.php' );
else if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ) )
	require_once( THMRPRO_DIR . 'lib/admin/scssphp/scss.inc.php' );

use Leafo\ScssPhp\Compiler;

add_action( 'wp_ajax_themer_pro_file_control_save', 'themer_pro_file_control_save' );
/**
 * Use ajax to create/delete Child Theme files and folders.
 *
 * @since 1.0.0
 */
function themer_pro_file_control_save() {
	
	check_ajax_referer( 'themer-pro-file-control', 'security' );
	
	$parent = true;
	
	if ( $_POST['theme_type'] == 'child' )
		$parent = false;
	
	if ( $_POST['action_type'] == 'create_file' ) {
		
		$supported_extensions = array( 'php', 'css', 'json', 'less', 'sass', 'scss', 'js', 'xml', 'md', 'sh', 'txt' );
		$file_ext = substr( $_POST['name'], strrpos( $_POST['name'], '.' ) + 1 );
		
		if ( in_array( $file_ext, $supported_extensions ) ) {
			
			$file_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'] . $_POST['name'];
		
			if ( ! file_exists( $file_path ) ) {
				
				themer_pro_write_file( $file_path, '' );
				echo 'File Created';
				
			} else {
				
				echo 'Error: File Exists';
				
			}
			
		} else {
			
			echo 'Error: Unsupported File Extension';
			
		}
		
	} elseif ( $_POST['action_type'] == 'create_folder' ) {
		
		if ( $_POST['name'] != '' ) {
			
			$folder_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'] . $_POST['name'];
			
			if ( false == themer_pro_dir_check( $folder_path, $check_only = true ) ) {
				
				themer_pro_dir_check( $folder_path );
				echo 'Folder Created';
				
			} else {
				
				echo 'Error: Folder Exists';
				
			}
			
		} else {
			
			echo 'Error: Unsupported Folder Name';
			
		}
		
	} elseif ( $_POST['action_type'] == 'rename_file' ) {
		
		$file_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'];
		$rel_path_explode = explode( '/', $file_path );
		$file_to_rename = array_pop( $rel_path_explode );
		$actual_rel_path = implode( '/', $rel_path_explode );
		
		$supported_extensions = array( 'php', 'css', 'json', 'less', 'sass', 'scss', 'js', 'xml', 'md', 'sh', 'txt' );
		$old_file_ext = substr( $file_to_rename, strrpos( $file_to_rename, '.' ) + 1 );
		$new_file_ext = substr( $_POST['name'], strrpos( $_POST['name'], '.' ) + 1 );
		
		if ( in_array( $new_file_ext, $supported_extensions ) ) {
		
			if ( ! file_exists( $actual_rel_path . '/' . $_POST['name'] ) && $old_file_ext == $new_file_ext ) {
				
				rename( $file_path, $actual_rel_path . '/' . $_POST['name'] );
				echo 'File Renamed';
				
			} elseif ( file_exists( $actual_rel_path . '/' . $_POST['name'] ) ) {
				
				echo 'Error: File Exists';

			} else {
				
				echo 'Error: File Extension Mismatch';
				
			}
			
		} else {
			
			echo 'Error: Unsupported File Extension';
			
		}
		
	} elseif ( $_POST['action_type'] == 'rename_folder' ) {
		
		if ( $_POST['name'] != '' ) {
			
			$folder_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'];
			$rel_path_explode = explode( '/', $folder_path );
			$folder_to_rename = array_pop( $rel_path_explode );
			$actual_rel_path = implode( '/', $rel_path_explode );

			if ( false == themer_pro_dir_check( $actual_rel_path . '/' . $_POST['name'], $check_only = true ) ) {
				
				rename( $folder_path, $actual_rel_path . '/' . $_POST['name'] );
				echo 'Folder Renamed';
				
			} else {
				
				echo 'Error: Folder Exists';

			}
			
		} else {
			
			echo 'Error: Unsupported Folder Name';
			
		}
		
	} elseif ( $_POST['action_type'] == 'delete_file' ) {
		
		$file_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'];
		$file_name = substr( $file_path, strrpos( $file_path, '/' ) + 1 );
		
		if ( file_exists( $file_path ) ) {
			
			if ( $file_name != 'functions.php' && $file_name != 'style.css' && $file_name != 'screenshot.png' ) {
				
				unlink( $file_path );
				
				echo 'File Deleted';				
				
			} else {
				
				echo 'Error: Don\'t Delete This File :)';
				
			}
			
		} else {
			
			echo 'Error: File Does Not Exist';
			
		}		
		
	} elseif ( $_POST['action_type'] == 'delete_folder' ) {
		
		$folder_path = themer_pro_get_theme_directory( $parent ) . $_POST['rel_path'];
		
		if ( $_POST['rel_path'] != '/' && true == themer_pro_dir_check( $folder_path, $check_only = true ) ) {
			
			themer_pro_delete_dir( $folder_path );
			
			echo 'Folder Deleted';
			
		} else {
			
			echo 'Error: Folder Does Not Exist';
			
		}		
		
	}
	
	exit();
	
}

add_action( 'wp_ajax_themer_pro_file_tree_file_open', 'themer_pro_file_tree_file_open' );
/**
 * Use ajax to update a specific theme file based on the posted values.
 *
 * @since 1.0.0
 */
function themer_pro_file_tree_file_open() {
	
	check_ajax_referer( 'themer-ajax-nonce', 'security' );
	
	$parent = true;
	
	if ( $_POST['theme_type'] == 'child' )
		$parent = false;

	$handle_pre = file_get_contents( themer_pro_get_theme_directory( $parent ) . '/' . $_POST['file_rel_path'] );
	$handle = $handle_pre === '' ? 'thmr_empty_file' : $handle_pre;
	
	echo $handle;
	exit();
	
}

add_action( 'wp_ajax_themer_pro_file_editor_save', 'themer_pro_file_editor_save' );
/**
 * Use ajax to update a specific theme file based on the posted values.
 *
 * @since 1.0.0
 */
function themer_pro_file_editor_save() {
	
	check_ajax_referer( 'themer-pro-file-edit', 'security' );
	
	if ( $_POST['file_rel_path']  == 'Parse Error' ) {
		
		echo 'Parse Error, Check Code.';
		
	} else {
		
		$parent = true;
		
		if ( $_POST['theme_type'] == 'child' )
			$parent = false;
		
		themer_pro_write_file( $path = themer_pro_get_theme_directory( $parent ) . '/' . $_POST['file_rel_path'], $code = $_POST['themer']['theme_file'] );
		
		if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ) )
			themer_pro_less_php_init();
		else if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ) )
			themer_pro_scss_php_init();
			
		if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ) && true !== themer_pro_less_php_init() )
			echo themer_pro_less_php_init();
		else if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ) && true !== themer_pro_scss_php_init() )
			echo themer_pro_scss_php_init();
		else
			echo 'File Updated';
		
	}
	
	exit();
	
}

/**
 * Initialize the less php functionality.
 *
 * @since 1.1.0
 */
function themer_pro_less_php_init() {
	
	// Execute the less php init function if the Cobalt SCSS presets .json file exists.
	if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ) ) {
		
	    $less_presets = json_decode( file_get_contents( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-less.json' ), true );
	    
	    if ( is_array( $less_presets ) ) {
	
		    foreach( $less_presets as $key ) {
		    	
		    	if ( isset( $key['Import Path'] ) && isset( $key['Formatter'] ) && isset( $key['PreCSS File Path'] ) && isset( $key['CSS File Path'] ) && file_exists( themer_pro_get_theme_directory( $parent = false ) . $key['PreCSS File Path'] ) ) {
		    		
		    		if ( $key['Formatter'] == 'lessjs' || $key['Formatter'] == 'compressed' || $key['Formatter'] == 'classic' )
		    			$less_php_formatter = $key['Formatter'];
		    		else
		    			$less_php_formatter = 'lessjs';
		    		
			        try {
			
						$less = new lessc;
						$less->setPreserveComments(true);
						$less->addImportDir( themer_pro_get_theme_directory( $parent = false ) . $key['Import Path'] );
						$less->setFormatter( $less_php_formatter );
						
						$lessIn = file_get_contents( themer_pro_get_theme_directory( $parent = false ) . $key['PreCSS File Path'] );
						$cssOut = $less->compile( $lessIn );
			            file_put_contents( themer_pro_get_theme_directory( $parent = false ) . $key['CSS File Path'], $cssOut );
			
			        } catch ( \Exception $e ) {
			
			            return '<div id="themer-pro-less-php-error-message-container"><div id="themer-pro-less-php-error-message"><h1>LESS Compile Error:</h1>' . $e . '</div></div>';
			            	
			            syslog( LOG_ERR, 'lessphp: Unable to compile content' );
			
			        }
		    		
		    	} else {
		    		
		    		return '<div id="themer-pro-less-php-error-message-container"><div id="themer-pro-less-php-error-message" style="text-align:center;"><h1>LESS Compile Error:</h1>Check cobalt-less.json file for correct configuration.</div></div>';
		    		
		    	}
		
		    }
	    
		} else {
			
			return '<div id="themer-pro-less-php-error-message-container"><div id="themer-pro-less-php-error-message" style="text-align:center;"><h1>LESS Compile Error:</h1>Check cobalt-less.json file for correct configuration.</div></div>';
			
		}
		
	}
    
    return true;
    
}

/**
 * Initialize the scss php functionality.
 *
 * @since 1.1.0
 */
function themer_pro_scss_php_init() {
	
	// Execute the scss php init function if the Cobalt SCSS presets .json file exists.
	if ( file_exists( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ) ) {
		
	    $scss_presets = json_decode( file_get_contents( themer_pro_get_theme_directory( $parent = false ) . '/cobalt-scss.json' ), true );
	    
	    if ( is_array( $scss_presets ) ) {
	
		    foreach( $scss_presets as $key ) {
		    	
		    	if ( isset( $key['Import Path'] ) && isset( $key['Formatter'] ) && isset( $key['PreCSS File Path'] ) && isset( $key['CSS File Path'] ) && file_exists( themer_pro_get_theme_directory( $parent = false ) . $key['PreCSS File Path'] ) ) {
		    		
		    		$formatters = array( 'Expanded', 'Nested', 'Compressed', 'Compact', 'Crunched' );
		    		
		    		if ( in_array( $key['Formatter'], $formatters ) )
		    			$scss_php_formatter = $key['Formatter'];
		    		else
		    			$scss_php_formatter = 'Expanded';
		    		
			        try {
			
			            $scss = new Compiler();
			            $scss->addImportPath( themer_pro_get_theme_directory( $parent = false ) . $key['Import Path'] );
			            $scss->setFormatter( 'Leafo\ScssPhp\Formatter\\' . $scss_php_formatter );
			
			            $scssIn = file_get_contents( themer_pro_get_theme_directory( $parent = false ) . $key['PreCSS File Path'] );
			            $cssOut = $scss->compile( $scssIn );
			            file_put_contents( themer_pro_get_theme_directory( $parent = false ) . $key['CSS File Path'], $cssOut );
			
			        } catch ( \Exception $e ) {
			
			            return '<div id="themer-pro-scss-php-error-message-container"><div id="themer-pro-scss-php-error-message"><h1>SCSS Compile Error:</h1>' . $e . '</div></div>';
			            	
			            syslog( LOG_ERR, 'scssphp: Unable to compile content' );
			
			        }
		    		
		    	} else {
		    		
					return '<div id="themer-pro-scss-php-error-message-container"><div id="themer-pro-scss-php-error-message" style="text-align:center;"><h1>SCSS Compile Error:</h1>Check cobalt-scss.json file for correct configuration.</div></div>';
		    		
		    	}
		
		    }
	    
		} else {
			
			return '<div id="themer-pro-scss-php-error-message-container"><div id="themer-pro-scss-php-error-message" style="text-align:center;"><h1>SCSS Compile Error:</h1>Check cobalt-scss.json file for correct configuration.</div></div>';
			
		}
		
	}
    
    return true;
    
}
