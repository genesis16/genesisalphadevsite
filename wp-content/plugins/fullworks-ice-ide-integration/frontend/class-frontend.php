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

namespace Fullworks_Ice_Ide\FrontEnd;


class FrontEnd {

	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
	public function redirect_page() {
		$currenturl = (is_ssl())?'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']:'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$currenturl_relative = wp_make_link_relative($currenturl);
		$target=plugin_dir_url( __DIR__ ).'includes/vendor/icecoder/ICEcoder';
		if ( '/ICEcoder' == $currenturl_relative) {
			wp_safe_redirect( $target );
			exit();
		}
	}

}
