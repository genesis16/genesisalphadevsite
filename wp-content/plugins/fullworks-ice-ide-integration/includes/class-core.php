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

namespace Fullworks_Ice_Ide\Includes;

use Fullworks_Ice_Ide\Admin\Admin;
use Fullworks_Ice_Ide\Admin\Admin_Settings;
use Fullworks_Ice_Ide\FrontEnd\FrontEnd;

class Core {

	protected $loader;
	protected $plugin_name;
	protected $version;
	/**
	 * @param \Freemius $freemius Object for freemius.
	 */
	protected $fremius;

	public function __construct( $freemius ) {
		$this->plugin_name = 'fullworks-ice-ide';
		$this->version     = FULLWORKS_ICE_IDE_PLUGIN_VERSION;
		$this->freemius    = $freemius;
	}

	public function run() {
		$this->set_locale();
		$this->settings_pages();
		$this->define_public_hooks();
	}

	private function set_locale() {
		load_plugin_textdomain(
			'fullworks-ice-ide',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	private function settings_pages() {
		$settings = new Admin_Settings( $this->plugin_name, $this->version, $this->freemius );
		add_action( 'admin_menu', array( $settings, 'settings_setup' ) );

	}


	private function define_public_hooks() {
		$plugin_public = new FrontEnd( $this->plugin_name, $this->version );
		add_action( 'template_redirect', array( $plugin_public, 'redirect_page') );
	}
}
