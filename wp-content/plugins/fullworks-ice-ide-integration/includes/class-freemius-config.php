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

class Freemius_Config
{
    public function init()
    {
        global  $fullworks_ice_ide_fs ;
        
        if ( !isset( $fullworks_ice_ide_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/vendor/freemius/wordpress-sdk/start.php';
            $fullworks_ice_ide_fs = fs_dynamic_init( array(
                'id'              => '1583',
                'slug'            => 'fullworks-ice-ide-integration',
                'type'            => 'plugin',
                'public_key'      => 'pk_8495b1d0310e4fc3d85a8574e6db5',
                'is_premium'      => false,
                'has_addons'      => false,
                'has_paid_plans'  => true,
                'navigation'      => 'tabs',
                'has_affiliation' => 'selected',
                'menu'            => array(
                'slug'        => 'fullworks-ice-ide-settings',
                'affiliation' => false,
                'parent'      => array(
                'slug' => 'tools.php',
            ),
            ),
                'is_live'         => true,
            ) );
        }
        
        return $fullworks_ice_ide_fs;
    }

}