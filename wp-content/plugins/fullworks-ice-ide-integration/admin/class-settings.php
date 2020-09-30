<?php

namespace Fullworks_Ice_Ide\Admin;

use  CMB2_Tabs ;
use  WP_Filesystem ;
use  Fullworks_Ice_Ide\Includes\Core ;
/**
 * Class Settings
 * @package Fullworks_Ice_Ide\Admin
 */
class Settings
{
    private  $options_key = "fullworks-ice-ide-settings" ;
    /**
     * Settings constructor.
     *
     * @param string $plugin_name
     * @param string $version plugin version.
     * @param \Freemius $freemius Freemius SDK.
     */
    public function __construct( $plugin_name, $version, $freemiusSDK )
    {
        // Init CMB2 ( consider if needed elsewhere )
        require_once FULLWORKS_ICE_IDE_PLUGIN_DIR . 'includes/vendor/cmb2/init.php';
        require_once FULLWORKS_ICE_IDE_PLUGIN_DIR . 'includes/vendor/cmb2-extensions/cmb2-tabs/cmb2-tabs.php';
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->freemiusSDK = $freemiusSDK;
    }
    
    public function register_settings()
    {
        $options = array(
            'id'           => 'fullworks-ice-ide_option_metabox',
            'title'        => esc_html__( 'ICEcoder', 'fullworks-ice-ide' ),
            'tabs'         => array(
            'info'   => array(
            'label' => __( 'Info', 'fullworks-ice-ide' ),
            'icon'  => 'dashicons-info',
        ),
            'ice'    => array(
            'label' => __( 'ICE', 'fullworks-ice-ide' ),
            'icon'  => 'dashicons-editor-code',
        ),
            'system' => array(
            'label' => __( 'System Check', 'fullworks-ice-ide' ),
            'icon'  => 'dashicons-editor-spellcheck',
        ),
        ),
            "tab_style"    => "default",
            'object_types' => array( 'options-page' ),
            'option_key'   => $this->options_key,
            'icon_url'     => 'dashicons-editor-code',
            'capability'   => 'manage_options',
        );
        $cmb_options = new_cmb2_box( $options );
        $donate_button = "\n<a href=\"https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=K33558NPCEZV2\"><img src=\"https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal – The safer, easier way to pay online!\"></a>";
        $infomsg = sprintf(
            __( '<p> Welcome to the free ICEcoder installation plugin.  ICEcoder has been loaded and you can now access it using the ICE tab.</p>
        <p>ICEcoder informtion and support can be found here <a href="https://icecoder.net/" target="_blank">https://icecoder.net/</a></p>
        <p>To remove ICEcoder, deactivate and delete this plugin</p>
        <p>Support this plugin by upgrading from the Free Blogger plan to the Commercial Site plan, or donate using the donate button</p>
        <h3>Commercial Plan benefits</h3>
        <ul style="list-style-type:disc;list-style-position: inside;">
                <li>Get rid of the donate button and link %2$s</li>
                <li>Removes this info page</li>
				<li>Extra security using htaccess</li>
				<li>Support the plugin</li>
				<li>Unlimited localhost sites on all plans</li>
				<li>Plugin support</li>
				<li>From Only <strong>$4.99</strong></li>
				<p><a class="button button-secondary"href="%3$s">Upgrade Now!!!</a></p>
			</ul>', 'fullworks-ice-ide' ),
            $this->freemiusSDK->get_trial_url(),
            $donate_button,
            $this->freemiusSDK->get_upgrade_url()
        );
        $cmb_options->add_field( array(
            'before'        => '<h2>Information</h2>',
            'after_field'   => $infomsg,
            'id'            => 'info_text',
            'type'          => 'title',
            'tab'           => 'info',
            'render_row_cb' => array( 'CMB2_Tabs', 'tabs_render_row_cb' ),
        ) );
        $cmb_options->add_field( array(
            'name'          => __( 'Launch ICEcoder', 'fullworks-ice-ide' ),
            'desc'          => __( 'Launches ICEcoder in a new tab, click on the icon', 'fullworks-ice-ide' ),
            'id'            => 'launch_ide',
            'type'          => 'title',
            'after_field'   => '<p><a href="' . site_url( '?ICE=true' ) . '" target="_blank"><img src="' . plugin_dir_url( dirname( __FILE__ ) ) . 'includes/vendor/icecoder/ICEcoder/images/ice-coder.png' . '" alt="ICE IDE - No Icon - see security tab"></a></p>',
            'after'         => sprintf( '<p>On production systems ensure you have added security and proceed with care, always make sure you have a backup before working on a live system. You use these tools at your own risk.</p><p>If you are using a caching plugin or on Cloudflare, remember to switch it to development mode</p>' ),
            'tab'           => 'ice',
            'render_row_cb' => array( 'CMB2_Tabs', 'tabs_render_row_cb' ),
        ) );
        $cmb_options->add_field( array(
            'name'          => __( 'System Check', 'fullworks-ice-ide' ),
            'desc'          => __( 'Runs ICEcoder test program', 'fullworks-ice-ide' ),
            'id'            => 'system_check',
            'type'          => 'title',
            'after_field'   => '<p><a class= "button button-secondary" href="' . plugin_dir_url( dirname( __FILE__ ) ) . 'includes/vendor/icecoder/ICEcoder/test.php' . '" target="_blank">RUN TEST</a></p>',
            'after'         => __( '<p>You can run this ICEcoder test program to check the system</p>' ),
            'tab'           => 'system',
            'render_row_cb' => array( 'CMB2_Tabs', 'tabs_render_row_cb' ),
        ) );
    }

}