<?php
/**
 * Handles the auto-update and license key functionality.
 *
 * @package Themer Pro
 */

// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'THMRPRO_COBALT_APPS_URL', 'https://cobaltapps.com' );

// the name of your product. This should match the download name in EDD exactly
define( 'THMRPRO_THEMER_PRO', 'Themer Pro' );

if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	
	// load our custom updater
	include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
	
}

add_action( 'admin_init', 'themer_pro_sl_plugin_updater', 0 );
/**
 * Create a new instance of the EDD_SL_Theme_Updater class with a unique set of values.
 *
 * @since 1.0.0
 */
function themer_pro_sl_plugin_updater() {
	
	// retrieve our license key from the DB
	$license_key = trim( get_option( 'themer_pro_license_key' ) );

	// setup the updater
	$edd_updater = new EDD_SL_Plugin_Updater( THMRPRO_COBALT_APPS_URL, THMRPRO_DIR . 'themer-pro.php', array(
			'version' 	=> THMRPRO_VERSION, 				// current version number
			'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
			'item_name' => THMRPRO_THEMER_PRO, 	// name of this plugin
			'author' 	=> 'Cobalt Apps'  // author of this plugin
		)
	);
	
}

/**
 * Build the License Options admin section.
 *
 * @since 1.0.0
 */
function themer_pro_license_options() {

	?>
	<div class="bg-box bg-box-licenses">
		
		<?php $license = get_option( 'themer_pro_license_key' ); ?>
		<?php $status = get_option( 'themer_pro_license_status' ); ?>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'themer_pro_license' ); ?>
			<p>
				<?php _e( 'Themer Pro Version: ', 'themer-pro' ); ?><b><code><?php echo esc_attr( THMRPRO_VERSION ) ?></code></b> <a href="<?php echo THMRPRO_URL . 'CHANGELOG.md'; ?>" target="_blank">(<?php _e( 'Change Log', 'themer-pro' ); ?>)</a><br /><?php _e( ' License Key', 'themer-pro' ); ?>
				<input id="themer_pro_license_key" name="themer_pro_license_key" type="password" class="regular-text" value="<?php echo esc_attr_e( $license ); ?>" style="width:100%; max-width:160px;"/>
	
				<?php if ( false !== $license && $license != '' ) { ?>
					<?php if ( $status !== false && $status == 'valid' ) { ?>
						<span style="color:green;"><?php _e('active', 'themer-pro' ); ?></span>
						<?php wp_nonce_field( 'edd_themer_pro_nonce', 'edd_themer_pro_nonce' ); ?>
						<input type="submit" class="button" name="themer_pro_license_deactivate" value="<?php _e('Deactivate License', 'themer-pro' ); ?>"/>
					<?php } else { ?>
						<span style="color:red;"><?php _e('inactive', 'themer-pro' ); ?></span>
						<?php wp_nonce_field( 'edd_themer_pro_nonce', 'edd_themer_pro_nonce' ); ?>
						<input type="submit" class="button" name="themer_pro_license_activate" value="<?php _e('Activate License', 'themer-pro' ); ?>"/>
					<?php } ?>
				<?php } ?>
	
				<input type="submit" name="submit" id="submit" class="button" value="<?php _e( 'Save Changes', 'themer-pro' ); ?>" style="margin-bottom:10px !important;"/>
			</p>
		</form>
		
	</div>
	<?php
	
}

add_action( 'admin_init', 'themer_pro_register_license_option' );
/**
 * Register the themer_pro_license setting.
 *
 * @since 1.0.0
 */
function themer_pro_register_license_option() {
	
	// creates our settings in the options table
	register_setting( 'themer_pro_license', 'themer_pro_license_key', 'themer_pro_sanitize_license' );
	
}

/**
 * Sanatize the Cobalt License option.
 *
 * @since 1.0.0
 */
function themer_pro_sanitize_license( $new ) {
	
	$old = get_option( 'themer_pro_license_key' );
	if ( $old && $old != $new )
		delete_option( 'themer_pro_license_status' ); // new license has been entered, so must reactivate

	return $new;
	
}

/************************************
* this illustrates how to activate
* a license key
*************************************/

add_action( 'admin_init', 'themer_pro_activate_license' );
/**
 * Attempt to activate the currently set license option value.
 *
 * @since 1.0.0
 */
function themer_pro_activate_license() {
	
	// listen for our activate button to be clicked
	if ( isset( $_POST['themer_pro_license_activate'] ) ) {
		
		// run a quick security check
	 	if ( ! check_admin_referer( 'edd_themer_pro_nonce', 'edd_themer_pro_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'themer_pro_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'activate_license',
			'license' 	=> $license,
			'item_name' => urlencode( THMRPRO_THEMER_PRO ), // the name of our product in EDD
			'url'       => home_url()
		);
		
		// Call the custom API.
		$response = wp_remote_post( THMRPRO_COBALT_APPS_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		// $license_data->license will be either "active" or "inactive"

		update_option( 'themer_pro_license_status', $license_data->license );
		
	}
	
}

/***********************************************
* Illustrates how to deactivate a license key.
* This will descrease the site count
***********************************************/

add_action( 'admin_init', 'themer_pro_deactivate_license' );
/**
 * Deactivate the currently active license key.
 *
 * @since 1.0.0
 */
function themer_pro_deactivate_license() {
	
	// listen for our activate button to be clicked
	if ( isset( $_POST['themer_pro_license_deactivate'] ) ) {
		
		// run a quick security check
	 	if ( ! check_admin_referer( 'edd_themer_pro_nonce', 'edd_themer_pro_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'themer_pro_license_key' ) );
			
		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license' 	=> $license,
			'item_name' => urlencode( THMRPRO_THEMER_PRO ), // the name of our product in EDD
			'url'       => home_url()
		);
		
		// Call the custom API.
		$response = wp_remote_post( THMRPRO_COBALT_APPS_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		
		// $license_data->license will be either "deactivated" or "failed"
		if ( $license_data->license == 'deactivated' )
			delete_option( 'themer_pro_license_status' );
			
	}
	
}

add_action( 'admin_init', 'themer_pro_check_license' );
/**
 * Check the current Themer Pro license key with the CobaltApps.com
 * "Manage Sites" status and update the local license status accordingly.
 *
 * @since 1.0.0.2
 */
function themer_pro_check_license() {
	
	if ( ! empty( $_POST['themer_pro_license_key'] ) )
		return; // Don't fire when saving settings
	
	$status = get_transient( 'themer_pro_license_check' );

	// Run the license check a maximum of once per day
	if ( false === $status ) {
		
		// retrieve the license from the database
		$license = trim( get_option( 'themer_pro_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action'=> 'check_license',
			'license' 	=> $license,
			'item_name' => urlencode( THMRPRO_THEMER_PRO ),
			'url'       => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( THMRPRO_COBALT_APPS_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $license_data->license !== false && $license_data->license == 'valid' )
			update_option( 'themer_pro_license_status', 'valid' );
		else
			update_option( 'themer_pro_license_status', 'invalid' );

		set_transient( 'themer_pro_license_check', $license, DAY_IN_SECONDS );

		$status = $license;
		
	}

	return $status;
	
}
