<?php
/**
 * Handles the Child Theme creation/export functionality.
 *
 * @package Themer Pro
 */
 
/**
 * Create a new Freelancer Child Theme and then place it in Appearance > Themes.
 *
 * @since 1.0.0
 */
function themer_pro_freelancer_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $child_theme_select ) {
	
	$theme_folder_name = themer_pro_sanatize_string( $theme_name, $underscore = false );
	$theme_folders = themer_pro_get_dir_names( get_theme_root() );
	
	if ( ! in_array( $theme_folder_name, $theme_folders ) ) {
		
		themer_pro_cleanup_dir( themer_pro_get_uploads_path() . '/tmp' );
		
		$tmp_path = themer_pro_get_uploads_path() . '/tmp';
		$tmp_theme = $tmp_path . '/' . $theme_folder_name;
		$freelancer_child_dir = THMRPRO_DIR . 'lib/admin/themes/freelancer-child';
		
		if ( $child_theme_select == 'clone-child-theme' )
			$theme_dir = get_stylesheet_directory();
		else
			$theme_dir = THMRPRO_DIR . 'lib/admin/themes/' . $child_theme_select;
		
		if ( $child_theme_select == 'freelancer-child-sass' || $child_theme_select == 'freelancer-child-gulp' )
			themer_pro_copy_dir( $freelancer_child_dir, $tmp_theme );
			
		themer_pro_copy_dir( $theme_dir, $tmp_theme );
		
		if ( $child_theme_select != 'clone-child-theme' ) {
			
			// Scan all files and folders and find/replace any instance of 'freelancer-child' with new Child Theme name.
			$theme_files = themer_pro_rsearch( $tmp_theme . '/', '/.*php/' );
			
			foreach( $theme_files as $file ) {
				
				$file_content = htmlentities( file_get_contents( $file ) );
				$file_content = str_replace( '@package Freelancer Child', '@package ' . $theme_name, $file_content );
				$file_content = str_replace( 'freelancer_child_', themer_pro_sanatize_string( $theme_name, $underscore = true ) . '_', $file_content );
				$file_content = html_entity_decode( $file_content );
				
				$rel_file_path = str_replace( $tmp_theme, '', $file );
				
				themer_pro_write_file( $tmp_theme . '/' . $rel_file_path, $file_content, $stripslashes = false );
				
			}
			// END file/folder scan.
			
		}
		
		// Create new functions.php file for the child theme based on the user-specified information.
		$functions_content = htmlentities( file_get_contents( $tmp_theme . '/functions.php' ) );
		
		$old_theme_name = themer_pro_get_line_of_text( $functions_content, 'FREELANCER_CHILD_THEME_NAME' );
		$new_theme_name = "define( 'FREELANCER_CHILD_THEME_NAME', '" . $theme_name . "' );";
		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_name[0], $new_theme_name );
		
		$old_theme_url = themer_pro_get_line_of_text( $functions_content, 'FREELANCER_CHILD_THEME_URL' );
		$new_theme_url = "define( 'FREELANCER_CHILD_THEME_URL', '" . $theme_uri . "' );";
		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_url[0], $new_theme_url );
		
		$old_theme_version = themer_pro_get_line_of_text( $functions_content, 'FREELANCER_CHILD_THEME_VERSION' );
		$new_theme_version = "define( 'FREELANCER_CHILD_THEME_VERSION', '" . $theme_version_number . "' );";
		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_version[0], $new_theme_version );
		
		$functions_content = html_entity_decode( $functions_content );
		
		themer_pro_write_file( $tmp_theme . '/functions.php', $functions_content, $stripslashes = false );
		// END funcitons.php file creation.
		
		// Create new style.css file for the child theme based on the user-specified information.
		$style_content = htmlentities( file_get_contents( $tmp_theme . '/style.css' ) );
		
		if ( $child_theme_select == 'freelancer-child-sass' )
			$scss_style_content = htmlentities( file_get_contents( $tmp_theme . '/scss/style.scss' ) );

		$style_header = "/*
Theme Name: " . $theme_name . "
Theme URI: " . $theme_uri . "
Author: " . $theme_author . "
Author URI: " . $theme_author_uri . "
Description: " . $theme_description . "
Version: " . $theme_version_number . "
Template: freelancer
Template Version: " . FREELANCER_PARENT_THEME_VERSION . "
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: " . $theme_tags . "
*/";

		$style_content = substr( $style_content, strpos( $style_content, '*/' ) + 2 );
		$style_content = html_entity_decode( $style_header . $style_content );
		
		if ( $child_theme_select == 'freelancer-child-sass' ) {
			
			$scss_style_content = substr( $scss_style_content, strpos( $scss_style_content, '*/' ) + 2 );
			$scss_style_content = html_entity_decode( $style_header . $scss_style_content );
			
		}
		
		if ( $child_theme_select == 'freelancer-child-gulp' )
			themer_pro_write_file( $tmp_theme . '/style.css', $style_header, $stripslashes = false );
		else
			themer_pro_write_file( $tmp_theme . '/style.css', $style_content, $stripslashes = false );
		
		if ( $child_theme_select == 'freelancer-child-sass' )
			themer_pro_write_file( $tmp_theme . '/scss/style.scss', $scss_style_content, $stripslashes = false );
		// END style.css file creation.
		
		// Add custom screenshot image file if it has been uploaded.
		if ( file_exists( themer_pro_get_uploads_path() . '/screenshot.png' ) )
			rename( themer_pro_get_uploads_path() . '/screenshot.png', $tmp_theme . '/screenshot.png' );
		
		themer_pro_dir_check( get_theme_root() . '/' . $theme_folder_name );
		themer_pro_copy_dir( $tmp_theme, get_theme_root() . '/' . $theme_folder_name );
		
		themer_pro_delete_dir( $tmp_theme );
		
		if ( is_multisite() )
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success-mu' ) );
		else
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success' ) );
			
		exit();		
		
	} else {
		
		wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-exists-error' ) );
		exit();
		
	}
	
}

/**
 * Create a new Genesis Child Theme and then place it in Appearance > Themes.
 *
 * @since 1.0.0
 */
function themer_pro_genesis_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $remove_starter_packs, $child_theme_select ) {
	
	$theme_folder_name = themer_pro_sanatize_string( $theme_name, $underscore = false );
	$theme_folders = themer_pro_get_dir_names( get_theme_root() );
	
	if ( ! in_array( $theme_folder_name, $theme_folders ) ) {
		
		themer_pro_cleanup_dir( themer_pro_get_uploads_path() . '/tmp' );
		
		$tmp_path = themer_pro_get_uploads_path() . '/tmp';
		$tmp_theme = $tmp_path . '/' . $theme_folder_name;
		$sample_theme_dir = THMRPRO_DIR . 'lib/admin/themes/genesis-sample';
		
		if ( $child_theme_select == 'clone-child-theme' )
			$theme_dir = get_stylesheet_directory();
		else
			$theme_dir = THMRPRO_DIR . 'lib/admin/themes/' . $child_theme_select;
		
		if ( $child_theme_select == 'genesis-sample-sass' || $child_theme_select == 'genesis-sample-gulp' )
			themer_pro_copy_dir( $sample_theme_dir, $tmp_theme );
			
		themer_pro_copy_dir( $theme_dir, $tmp_theme );
		
		if ( $child_theme_select != 'clone-child-theme' ) {
			
			// Scan all files and folders and find/replace any instance of 'genesis-sample' with new Child Theme name.
			$theme_files = themer_pro_rsearch( $tmp_theme . '/', '/.*php/' );
			
			foreach( $theme_files as $file ) {
			    
			    if ( basename( $file ) == 'CHANGELOG.txt' ||
			        basename( $file ) == 'CONTRIBUTING.txt' ||
			        basename( $file ) == 'README.txt' )
			        continue;
				
				$file_content = htmlentities( file_get_contents( $file ) );
				$file_content = str_replace( "'genesis-sample'", "'" . themer_pro_sanatize_string( $theme_name, $underscore = false ) . "'", $file_content );
				$file_content = str_replace( ' * Genesis Sample', ' * ' . $theme_name, $file_content );
				$file_content = str_replace( '@package Genesis Sample', '@package ' . $theme_name, $file_content );
				$file_content = str_replace( ' * @author  StudioPress', ' * @author  ' . $theme_author, $file_content );
				$file_content = str_replace( ' * @link    https://www.studiopress.com/', ' * @link    ' . $theme_author_uri, $file_content );
				$file_content = str_replace( 'genesis_sample_', themer_pro_sanatize_string( $theme_name, $underscore = true ) . '_', $file_content );
				$file_content = html_entity_decode( $file_content );
				
				$rel_file_path = str_replace( $tmp_theme, '', $file );
				
				themer_pro_write_file( $tmp_theme . '/' . $rel_file_path, $file_content, $stripslashes = false );
				
			}
			// END file/folder scan.
			
		}
		
		if ( $child_theme_select == 'clone-child-theme' && defined( 'CHILD_THEME_NAME' ) ) {
		    
    		// Create new functions.php file for the child theme based on the user-specified information.
    		$functions_content = htmlentities( file_get_contents( $tmp_theme . '/functions.php' ) );
    		
    		$old_theme_name = themer_pro_get_line_of_text( $functions_content, 'CHILD_THEME_NAME' );
    		$new_theme_name = "define( 'CHILD_THEME_NAME', '" . $theme_name . "' );";
    		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_name[0], $new_theme_name );
    		
    		$old_theme_url = themer_pro_get_line_of_text( $functions_content, 'CHILD_THEME_URL' );
    		$new_theme_url = "define( 'CHILD_THEME_URL', '" . $theme_uri . "' );";
    		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_url[0], $new_theme_url );
    		
    		$old_theme_version = themer_pro_get_line_of_text( $functions_content, 'CHILD_THEME_VERSION' );
    		$new_theme_version = "define( 'CHILD_THEME_VERSION', '" . $theme_version_number . "' );";
    		$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_version[0], $new_theme_version );
    		
    		$functions_content = html_entity_decode( $functions_content );
    		
    		themer_pro_write_file( $tmp_theme . '/functions.php', $functions_content, $stripslashes = false );
    		// END funcitons.php file creation.
		    
		}
		
		// Create new style.css file for the child theme based on the user-specified information.
		$style_content = htmlentities( file_get_contents( $tmp_theme . '/style.css' ) );
		
		if ( $child_theme_select == 'genesis-sample-sass' )
			$scss_style_content = htmlentities( file_get_contents( $tmp_theme . '/scss/style.scss' ) );
		
		$style_header = "/*
Theme Name: " . $theme_name . "
Theme URI: " . $theme_uri . "
Description: " . $theme_description . "
Author: " . $theme_author . "
Author URI: " . $theme_author_uri . "

Version: " . $theme_version_number . "

Tags: " . $theme_tags . "

Template: genesis

License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Text Domain: " . themer_pro_sanatize_string( $theme_name, $underscore = false ) . "
*/";

		$style_content = substr( $style_content, strpos( $style_content, '*/' ) + 2 );
		$style_content = html_entity_decode( $style_header . $style_content );
		
		if ( $child_theme_select == 'genesis-sample-sass' ) {
			
			$scss_style_content = substr( $scss_style_content, strpos( $scss_style_content, '*/' ) + 2 );
			$scss_style_content = html_entity_decode( $style_header . $scss_style_content );
			
		}
		
		if ( $child_theme_select == 'genesis-sample-gulp' )
			themer_pro_write_file( $tmp_theme . '/style.css', $style_header, $stripslashes = false );
		else
			themer_pro_write_file( $tmp_theme . '/style.css', $style_content, $stripslashes = false );
		
		if ( $child_theme_select == 'genesis-sample-sass' )
			themer_pro_write_file( $tmp_theme . '/scss/style.scss', $scss_style_content, $stripslashes = false );
		// END style.css file creation.
		
		if ( $child_theme_select != 'clone-child-theme' ) {
			
			// Create new .pot file for the child theme based on the user-specified information.
			$pot_content = htmlentities( file_get_contents( $tmp_theme . '/languages/genesis-sample.pot' ) );
			
			$old_id_version = themer_pro_get_line_of_text( $pot_content, 'Project-Id-Version' );
			$new_id_version = '"Project-Id-Version: ' . $theme_name . ' ' . $theme_version_number . '\n"';
			$pot_content = themer_pro_replace_line_of_text( $pot_content, $old_id_version[0], $new_id_version );
			
			$pot_content = html_entity_decode( $pot_content );
			
			themer_pro_write_file( $tmp_theme . '/languages/genesis-sample.pot', $pot_content, $stripslashes = false );
			rename( $tmp_theme . '/languages/genesis-sample.pot', $tmp_theme . '/languages/' . themer_pro_sanatize_string( $theme_name, $underscore = false ) . '.pot' );
			// END .pot file creation.
			
		}
		
		// Add custom screenshot image file if it has been uploaded.
		if ( file_exists( themer_pro_get_uploads_path() . '/screenshot.png' ) )
			rename( themer_pro_get_uploads_path() . '/screenshot.png', $tmp_theme . '/screenshot.png' );
			
		if ( $remove_starter_packs == 'yes' && $child_theme_select != 'clone-child-theme' ) {
			
			themer_pro_delete_dir( $tmp_theme . '/config/import' );
			unlink( $tmp_theme . '/config/onboarding.php' );
			unlink( $tmp_theme . '/config/onboarding-shared.php' );
			
		}
		
		themer_pro_dir_check( get_theme_root() . '/' . $theme_folder_name );
		themer_pro_copy_dir( $tmp_theme, get_theme_root() . '/' . $theme_folder_name );
		
		themer_pro_delete_dir( $tmp_theme );
		
		if ( is_multisite() )
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success-mu' ) );
		else
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success' ) );
			
		exit();		
		
	} else {
		
		wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-exists-error' ) );
		exit();
		
	}
	
}

/**
 * Create a new Child Theme and then place it in Appearance > Themes.
 *
 * @since 1.0.0
 */
function themer_pro_default_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $child_theme_select ) {
	
	$theme_folder_name = themer_pro_sanatize_string( $theme_name, $underscore = false );
	$theme_folders = themer_pro_get_dir_names( get_theme_root() );
	
	if ( ! in_array( $theme_folder_name, $theme_folders ) ) {
		
		themer_pro_cleanup_dir( themer_pro_get_uploads_path() . '/tmp' );
		
		// Create new style.css file for the child theme based on the user-specified information.
		$style_header = "/*
 Theme Name:   " . $theme_name . "
 Theme URI:    " . $theme_uri . "
 Description:  " . $theme_description . "
 Author:       " . $theme_author . "
 Author URI:   " . $theme_author_uri . "
 Template:     " . themer_pro_active_theme_check() . "
 Version:      " . $theme_version_number . "
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         " . $theme_tags . "
*/";
			
		if ( $child_theme_select == 'clone-child-theme' ) {
			
			$theme_dir = get_stylesheet_directory();
			$style_content = htmlentities( file_get_contents( $theme_dir . '/style.css' ) );
			$style_content = substr( $style_content, strpos( $style_content, '*/' ) + 2 );
			$style_content = html_entity_decode( $style_header . $style_content );
			
		} else {
			
			$theme_dir = THMRPRO_DIR . 'lib/admin/themes/' . themer_pro_active_theme_check( $child = true );
			$style_content = "

/* Add your custom styles below... */
";
			$style_content = $style_header . $style_content;
			
		}
		// END style.css file creation.
		
		// Create new functions.php file for the child theme based on the user-specified information.
		$functions_content = htmlentities( file_get_contents( $theme_dir . '/functions.php' ) );

		if ( themer_pro_active_theme_check() == 'astra' ) {
			
			$old_theme_version = themer_pro_get_line_of_text( $functions_content, 'ASTRA_CHILD_THEME_VERSION' );
			$new_theme_version = "define( 'ASTRA_CHILD_THEME_VERSION', '" . $theme_version_number . "' );";
			$functions_content = themer_pro_replace_line_of_text( $functions_content, $old_theme_version[0], $new_theme_version );
			
		}
		
		$functions_content = html_entity_decode( $functions_content );
		// END funcitons.php file creation.
	
		$tmp_path = themer_pro_get_uploads_path() . '/tmp';
		$tmp_theme = $tmp_path . '/' . $theme_folder_name;
		themer_pro_copy_dir( $theme_dir, $tmp_theme );
		
		themer_pro_write_file( $tmp_theme . '/functions.php', $functions_content, $stripslashes = false );
		themer_pro_write_file( $tmp_theme . '/style.css', $style_content, $stripslashes = false );
		
		if ( file_exists( themer_pro_get_uploads_path() . '/screenshot.png' ) )
			rename( themer_pro_get_uploads_path() . '/screenshot.png', $tmp_theme . '/screenshot.png' );
		
		themer_pro_dir_check( get_theme_root() . '/' . $theme_folder_name );
		themer_pro_copy_dir( $tmp_theme, get_theme_root() . '/' . $theme_folder_name );
		
		themer_pro_delete_dir( $tmp_theme );
		
		if ( is_multisite() )
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success-mu' ) );
		else
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-creation-success' ) );
			
		exit();		
		
	} else {
		
		wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-exists-error' ) );
		exit();
		
	}
	
}

/**
 * Zip up the currently active Genesis Child Theme and spit it out into the browser for download.
 *
 * @since 1.0.0
 */
function themer_pro_theme_export() {
	
	themer_pro_cleanup_dir( themer_pro_get_uploads_path() . '/tmp' );
	require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );
	
	$theme_folder_name = substr( get_stylesheet_directory(), strrpos( get_stylesheet_directory(), '/' ) + 1 );
	$theme_export_zip = $theme_folder_name . '.zip';
	$tmp_path = themer_pro_get_uploads_path() . '/tmp';
	$tmp_theme = $tmp_path . '/' . $theme_folder_name;
	themer_pro_copy_dir( get_stylesheet_directory(), $tmp_theme );
	
	$themer_pro_pclzip = new PclZip( $tmp_theme . '/' . $theme_export_zip );
	$themer_pro_zipped = $themer_pro_pclzip->create( $tmp_theme, PCLZIP_OPT_REMOVE_PATH, $tmp_path );
	if ( $themer_pro_zipped == 0 )
		die("Error : ".$themer_pro_pclzip->errorInfo(true) );

	if ( ob_get_level() )
		ob_end_clean();

	header( "Cache-Control: public, must-revalidate" );
	header( "Pragma: hack" );
	header( "Content-Type: application/zip" );
	header( "Content-Disposition: attachment; filename=$theme_export_zip" );
	readfile( $tmp_theme . '/' . $theme_export_zip );
	themer_pro_delete_dir( $tmp_theme );
	exit();
	
}

add_action( 'admin_init', 'themer_pro_import_export_check' );
/**
 * Check for Import/Export $_POST actions and react appropriately.
 *
 * @since 1.0.0
 */
function themer_pro_import_export_check() {
	
	if ( current_user_can( 'manage_options' ) ) {
	
		if ( ! empty( $_POST['action'] ) && $_POST['action'] == 'themer_pro_theme_create' ) {
			
			if ( $_POST['theme_name'] != '' ) {
				
				if ( ! empty( $_FILES['screenshot_upload']['name'] ) )
					themer_pro_screenshot_upload();
				
				$theme_dir = themer_pro_active_theme_check( $child = true );
				$active_theme = $_POST['child_theme_select'] == 'clone-child-theme' ? wp_get_theme() : wp_get_theme( $theme_dir, $theme_root = THMRPRO_DIR . 'lib/admin/themes' );
				
				$theme_name = $_POST['theme_name'] != '' ? $_POST['theme_name'] : $active_theme->get( 'Name' );
				$theme_uri = $_POST['theme_uri'] != '' ? $_POST['theme_uri'] : $active_theme->get( 'ThemeURI' );
				$theme_description = $_POST['theme_description'] != '' ? $_POST['theme_description'] : $active_theme->get( 'Description' );
				$theme_author = $_POST['theme_author'] != '' ? $_POST['theme_author'] : $active_theme->get( 'Author' );
				$theme_author_uri = $_POST['theme_author_uri'] != '' ? $_POST['theme_author_uri'] : $active_theme->get( 'AuthorURI' );
				$theme_version_number = $_POST['theme_version_number'] != '' ? $_POST['theme_version_number'] : $active_theme->get( 'Version' );
				$theme_tags = $_POST['theme_tags'] != '' ? $_POST['theme_tags'] : implode( ', ', $active_theme->get( 'Tags' ) );
				$remove_starter_packs = isset( $_POST['remove_starter_packs'] ) ? 'yes' : 'no';
				$child_theme_select = $_POST['child_theme_select'];
				
				if ( themer_pro_active_theme_check() == 'freelancer' )
					themer_pro_freelancer_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $child_theme_select );
				elseif ( themer_pro_active_theme_check() == 'genesis' )
					themer_pro_genesis_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $remove_starter_packs, $child_theme_select );
				else
					themer_pro_default_theme_create( $theme_name, $theme_uri, $theme_description, $theme_author, $theme_author_uri, $theme_version_number, $theme_tags, $child_theme_select );			
				
			} else {
				
				wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=theme-no-name-error' ) );
				exit();			
				
			}
		
		}
		
		if ( ! empty( $_POST['action'] ) && $_POST['action'] == 'themer_pro_theme_export' ) {
			
			themer_pro_theme_export();
		
		}
		
	}
	
}

/**
 * Upload a .png file and name it screenshot.png to be added to a newly created Child Theme.
 *
 * @since 1.0.0
 */
function themer_pro_screenshot_upload() {

	$target_file = themer_pro_get_uploads_path() . '/screenshot.png';
	$upload_check = true;
	
	// Check to make sure the image has a .png extension.
	$image_file_explode = explode( '.', basename( $_FILES['screenshot_upload']['name'] ) );
	$image_file_type = array_pop( $image_file_explode );
	if ( $image_file_type != 'png' )
		$upload_check = false;
		
	$image = new Bulletproof\ThemerProImage( $_FILES );
	$image->setName( 'screenshot' );
	$image->setSize( 100, 2000000 );
	$image->setLocation( themer_pro_get_uploads_path() );
	
	if ( $image['screenshot_upload'] ) {
			
		// If everything checks out, try to upload the image
		if ( $upload_check && $upload = $image->upload() ) {
		
			echo '';
		
		} else {
		
			wp_redirect( admin_url( 'admin.php?page=themer-pro-export&notice=screenshot-upload-error' ) );
			exit();
		
		}
	
	}
	
}
