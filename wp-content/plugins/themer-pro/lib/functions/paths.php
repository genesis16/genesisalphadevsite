<?php
/**
 * Handles file/folder path functionality.
 *
 * @package Themer Pro
 */

/**
 * Get the path of the temporary Themer Pro export folder.
 *
 * @since 1.0.0
 * @return the path of the temporary Themer Pro export folder.
 */
function themer_pro_get_uploads_path() {

    $uploads_dir = wp_upload_dir();
    $dir = $uploads_dir['basedir'] . '/themer-pro';

	return apply_filters( 'themer_pro_get_uploads_path', $dir );
	
}
