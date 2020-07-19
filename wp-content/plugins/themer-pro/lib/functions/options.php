<?php
/**
 * Builds the Themer Pro Options function.
 *
 * @package Themer Pro
 */
 
/**
 * Get the latest themer_pro_settings array from the database
 * and then cache it, if not otherwise specified, so specific
 * Themer Pro Settings values (or the entire array) can be efficiently accessed.
 *
 * @since 1.0.0
 * @return either the entire themer_pro_settings array or a specific key/value.
 */
function themer_pro_get_settings( $key, $args = false ) {
	
	// Make the following variables static so they retain their values.
	static $options_cache = array();
	static $options_set = false;
	
	// If the $args variable is not false then process the values provided.
	if ( $args ) {
		
		// If the $options_cache variable is not an empty array or the $args['cahed'] key is false
		// then update the $options_cache variable with the latest copy of the themer_pro_settings array.
		if ( empty( $options_cache ) || !$args['cached'] )
			$options_cache = get_option( 'themer_pro_settings' );

		// If the $args['array'] key is not false then return the entire
		// themer_pro_settings array through the $options_cache variable.
		if ( $args['array'] ) {
			
			return $options_cache;
			
		// Otherwise if the $args['array'] key IS false then return nothing.
		// This is useful if you just want to clear the cache (setting the $args['cahed'] key
		// to false, as mentioned above) but don't want to return any actual values.
		} else {
			
			return;
			
		}
		
	}

	// If $options_cache[$key] is set then stripslash and return the cached value for that key.
	if ( isset( $options_cache[$key] ) ) {
		
		return is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
	
	// Otherwise if the $options_set variable is not false, but $options_cache[$key] is NOT set,
	// then give that particular key a blank value and then return it.
	} elseif ( $options_set ) {
		
		$options_cache[$key] = '';
		return $options_cache[$key];

	// Otherwise if none of the above is true then update the $options_cache variable with the
	// latest copy of the themer_pro_settings array and set the $options_set variable to true.
	} else {
		
		$options_cache = get_option( 'themer_pro_settings' );
		$options_set = true;
		
	}
	
	// If $options_cache[$key] is NOT set then give that particular key a blank value.
	if ( !isset( $options_cache[$key] ) ) {
		
		$options_cache[$key] = '';
	
	// Otherwise stripslash the set value.
	} else {
		
		$options_cache[$key] = is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
		
	}

	// Return $options_cache[$key] if it hasn't already been returned above.
	return $options_cache[$key];
	
}
