<?php
/**
 * @copyright (c) 2019.
 * @author            Alan Fuller (support@fullworks)
 * @licence           GPL V3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link                  https://fullworks.net
 *
 * This file is part of  a Fullworks plugin.
 *
 *   This plugin is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This plugin is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with  this plugin.  https://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace Fullworks_Ice_Ide\Admin;

class Admin_Settings extends Admin_Pages {
	protected $settings_page;
	protected $settings_page_id = 'tools_page_fullworks-ice-ide-settings';
	protected $option_group = 'fullworks-ice-ide';
	protected $settings_title;
	/**
	 * @param \Freemius $freemius Freemius SDK.
	 */
	protected $freemius;

	public function __construct( $plugin_name, $version, $freemius ) {
		$this->plugin_name    = $plugin_name;
		$this->version        = $version;
		$this->freemius       = $freemius;
		$this->settings_title = esc_html__( 'ICEcoder Editor', 'fullworks-ice-ide' );
		parent::__construct();
	}

	public function register_settings() {


		/* Add settings menu page */
		$this->settings_page = add_submenu_page(
			'fullworks-ice-ide',
			'Settings', /* Page Title */
			'Settings',                       /* Menu Title */
			'manage_options',                 /* Capability */
			'fullworks-ice-ide',                         /* Page Slug */
			array( $this, 'settings_page' )          /* Settings Page Function Callback */
		);
		register_setting(
			$this->option_group,                         /* Option Group */
			"{$this->option_group}-reset",                   /* Option Name */
			array( $this, 'reset_sanitize' )          /* Sanitize Callback */
		);
	}

	public function delete_options() {
	}

	public function add_meta_boxes() {
		add_meta_box(
			'settings-1',                  /* Meta Box ID */
			__( 'ICEcoder Code Editor', 'fullworks-ice-ide' ),               /* Title */
			array( $this, 'meta_box_1' ),  /* Function Callback */
			$this->settings_page_id,               /* Screen: Our Settings Page */
			'normal',                 /* Context */
			'default'                 /* Priority */
		);
	}

	public function meta_box_1() {
		global $fullworks_ice_ide_fs;
		?>
        <table class="form-table">
            <tbody>
            <tr valign="top" class="alternate">
                <th scope="row"><?php _e( 'Info', 'fullworks-ice-ide' ); ?></th>
                <td>
                    <p>
						<?php _e( 'ICEcoder is a browser based code editor, which provides a modern approach to building websites. By allowing you to code directly within the web browser, online or offline, it means you only need one program (your browser) to develop sites, plus can test on actual web servers. After development, you can also maintain the website easily, all of which make for speedy and smart development.', 'fullworks-ice-ide' ); ?>
                    </p>
                    <p>
						<?php _e( 'ICEcode is a third party application, so for information and features please head over to <a href="https://icecoder.net" target="_blank">https://icecoder.net/</a>', 'fullworks-ice-ide' ); ?>
                    </p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Security', 'fullworks-ice-ide' ); ?></th>
                <td>
                    <p>
						<?php _e( 'You will have to provide a strong password when you first use ICEcoder.  Regardless it is highly recommended that unless this is in a local or secure environment, that you Deactivate and Delete this plugin when not needed. If you want to secure ICEcoder you will find some ideas here <a href="https://fullworks.net/docs/icecoder/security" target="_blank">https://fullworks.net/docs/icecoder/security</a> ', 'fullworks-ice-ide' ); ?>
                    </p>
                </td>
            </tr>
            <tr valign="top" class="alternate">
                <th scope="row"><?php _e( 'Run', 'fullworks-ice-ide' ); ?></th>
                <td>
					<?php
					$target = plugin_dir_url( __DIR__ ) . 'includes/vendor/icecoder/ICEcoder';
					printf( '<a class="button-secondary" href="%1$s" target="_blank">%2$s</a>', $target, __( 'Launch ICEcoder', 'fullworks-ice-ide' ) );
					?>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Quick Link', 'stop-user-enumeration' ); ?></th>
                <td>
					<?php
					if ( ! get_option( 'permalink_structure' ) ) {
						_e( 'If you want a  quick link - you need to set up a permalinks ( settings>permalinks )', 'fullworks-ice-ide' );
					} else {
						printf( '%1$s <a href="%2$s" target="_blank"><strong>%2$s</strong></a>', __( 'Access without logging in via this quick link: ', 'fullworks-ice-ide' ), site_url( 'ICEcoder' ) );
					}
					?>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Donate', 'stop-user-enumeration' ); ?></th>
                <td>
                    <p>
						<?php
						_e( 'Did this plugin get you out of an issue? Did it save you time? Would you love to find this plugin still works and available next time you need it?  It will only be here if you donate, so donate the price of a cup of coffee and cake right now!', 'fullworks-ice-ide' );
						?>
                    </p>
					<?php
					printf( '<a class="button-secondary" href="%1$s" style="font-weight: bold;color: white; background: orangered;">%2$s</a>', $fullworks_ice_ide_fs->get_upgrade_url(), __( 'Donate just $4.99 now!', 'fullworks-ice-ide' ) );
					?>
                </td>
            </tr>
            </tbody>
        </table>
		<?php
	}

	public function sanitize_settings_1( $settings ) {

		return $settings;
	}

}

