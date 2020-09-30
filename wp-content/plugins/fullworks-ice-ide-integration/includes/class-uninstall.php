<?php

/**
 * Fired during plugin uninstall.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 */
namespace Fullworks_Ice_Ide\Includes;

class Uninstall
{
    /**
     * Uninstall specific code
     */
    public static function uninstall()
    {
        /** @var \Freemius $fullworks_ice_ide_fs Freemius global object. */
        global  $fullworks_ice_ide_fs ;
        delete_option( 'fullworks-ice-ide-settings' );
    }

}