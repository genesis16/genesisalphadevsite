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

/**
 *
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * Plugin Name:       ICEcoder integration
 * Plugin URI:        http://fullworks.net/
 * Description:       Install ICEcoder within WordPress
 * Version:           2.0.2
 * Author:            Fullworks
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       fullworks-ice-ide
 * Domain Path:       /languages
 *
 * THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.
 * EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM “AS IS” WITHOUT WARRANTY OF ANY KIND,
 * EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.
 * THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.
 * SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.
 *
 * IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING WILL ANY COPYRIGHT HOLDER,
 * OR ANY OTHER PARTY WHO MODIFIES AND/OR CONVEYS THE PROGRAM AS PERMITTED ABOVE,
 * BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
 * OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED
 * INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS),
 * EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
 *
 * @package fullworks-ice-ide
 */

namespace Fullworks_Ice_Ide;

use \Fullworks_Ice_Ide\Includes\Core;
use \Fullworks_Ice_Ide\Includes\Freemius_Config;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
if (!function_exists('Fullworks_Ice_Ide\run_Fullworks_Ice_Ide')) {
    define('FULLWORKS_ICE_IDE_PLUGIN_DIR', plugin_dir_path(__FILE__));
    define('FULLWORKS_ICE_IDE_PLUGIN_VERSION', '2.0.2');

// Include the autoloader so we can dynamically include the classes.
    require_once FULLWORKS_ICE_IDE_PLUGIN_DIR . 'includes/autoloader.php';


    function run_Fullworks_Ice_Ide()
    {
        $freemius = new Freemius_Config();
        $freemius = $freemius->init();
        // Signal that SDK was initiated.
        do_action('fullworks_ice_ide_fs_loaded');
        /**
         * @var \Freemius $freemius freemius SDK.
         */
        $plugin = new Core($freemius);
        $plugin->run();
    }

    run_Fullworks_Ice_Ide();
}  else {
    die( __( 'Cannot execute as the plugin already exists, if you have another version installed deactivate that and try again', 'fullworks-ice-ide' ) );
}

