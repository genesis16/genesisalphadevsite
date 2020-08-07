<?php

/**
 * Plugin Name:     Mai Demo Importer
 * Plugin URI:      https://maitheme.com
 * Description:     Easily import Mai Theme demo content and settings.
 * Version:         0.2.0
 *
 * Author:          Mike Hemberger, BizBudding Inc
 * Author URI:      https://bizbudding.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Mai_Demo_Importer Class.
 *
 * @since 0.1.0
 */
final class Mai_Demo_Importer {

	/**
	 * @var    Mai_Demo_Importer The one true Mai_Demo_Importer
	 * @since  0.1.0
	 */
	private static $instance;

	/**
	 * Main Mai_Demo_Importer Instance.
	 *
	 * Insures that only one instance of Mai_Demo_Importer exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since   0.1.0
	 * @static  var array $instance
	 * @uses    Mai_Demo_Importer::setup_constants() Setup the constants needed.
	 * @uses    Mai_Demo_Importer::setup() Activate, deactivate, etc.
	 * @see     Mai_Demo_Importer()
	 * @return  object | Mai_Demo_Importer The one true Mai_Demo_Importer
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			// Setup the init.
			self::$instance = new Mai_Demo_Importer;
			// Methods.
			self::$instance->setup_constants();
			self::$instance->setup();
		}
		return self::$instance;
	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since   0.1.0
	 * @access  protected
	 * @return  void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'mai-demo-importer' ), '1.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @since   0.1.0
	 * @access  protected
	 * @return  void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'mai-demo-importer' ), '1.0' );
	}

	/**
	 * Setup plugin constants.
	 *
	 * @since   0.1.0
	 * @access  private
	 * @return  void
	 */
	private function setup_constants() {

		// Plugin version.
		if ( ! defined( 'MAI_DEMO_IMPORTER_VERSION' ) ) {
			define( 'MAI_DEMO_IMPORTER_VERSION', '0.2.0' );
		}

		// Plugin Folder Path.
		if ( ! defined( 'MAI_DEMO_IMPORTER_DIR' ) ) {
			define( 'MAI_DEMO_IMPORTER_DIR', plugin_dir_path( __FILE__ ) );
		}

		// Plugin Folder URL.
		if ( ! defined( 'MAI_DEMO_IMPORTER_URL' ) ) {
			define( 'MAI_DEMO_IMPORTER_URL', plugin_dir_url( __FILE__ ) );
		}

		// Plugin Includes Path.
		if ( ! defined( 'MAI_DEMO_IMPORTER_INCLUDES_DIR' ) ) {
			define( 'MAI_DEMO_IMPORTER_INCLUDES_DIR', MAI_DEMO_IMPORTER_DIR . 'includes/' );
		}

		// Plugin Includes URL.
		if ( ! defined( 'MAI_DEMO_IMPORTER_INCLUDES_URL' ) ) {
			define( 'MAI_DEMO_IMPORTER_INCLUDES_URL', MAI_DEMO_IMPORTER_URL . 'includes/' );
		}

	}

	/**
	 * Setup the plugin.
	 *
	 * @since   0.1.0
	 *
	 * @return  void
	 */
	public function setup() {
		register_activation_hook( __FILE__,  array( $this, 'activate' ) );
		add_action( 'after_switch_theme',    array( $this, 'theme_switch' ), 30 );
		add_action( 'admin_init',            array( $this, 'updater' ) );
		add_action( 'plugins_loaded',        array( $this, 'run' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'add_action_links' ) );
	}

	/**
	 * Plugin activation.
	 *
	 * @since   0.1.0
	 *
	 * @return  void
	 */
	public function activate() {
		if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
			return;
		}
		set_transient( wp_get_theme()->template . '_merlin_redirect', 1 );
	}

	/**
	 * Delete default merlin transient since we're not using a parent theme.
	 * Maybe redirect right to merlin.
	 *
	 * @since   0.1.0
	 *
	 * @return  void
	 */
	public function theme_switch() {
		$theme = wp_get_theme();
		delete_transient( $theme->template . '_merlin_redirect' );
		if ( ! is_child_theme() ) {
			return;
		}
		if ( ! current_theme_supports( 'mai-theme-engine' ) ) {
			return;
		}
		set_transient( $theme->template . '_merlin_redirect', 1 );
		wp_safe_redirect( admin_url( 'admin.php?page=mai-demo-importer' ) );
	}

	/**
	 * Initialize the updater.
	 *
	 * @since   0.1.0
	 *
	 * @return  void
	 */
	public function updater() {

		// Bail if current user cannot manage plugins.
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		/**
		 * Setup the updater.
		 *
		 * @uses    https://github.com/YahnisElsts/plugin-update-checker/
		 *
		 * @return  void
		 */
		if ( ! class_exists( 'Puc_v4_Factory' ) ) {
			require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'plugin-update-checker/plugin-update-checker.php'; // 4.4
		}

		// Setup the updater.
		$updater = Puc_v4_Factory::buildUpdateChecker( 'https://github.com/maithemewp/mai-demo-importer/', __FILE__, 'mai-demo-importer' );
	}

	/**
	 * Run the plugin.
	 *
	 * @since   0.1.0
	 *
	 * @return  void
	 */
	public function run() {

		if ( ! is_admin() ) {
			return;
		}

		if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
			return;
		}

		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'tgmpa/class-tgm-plugin-activation.php';
		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'tgmpa-config.php';
		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin/vendor/autoload.php';
		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin/class-merlin.php';
		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin-config.php';
		require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin-mai-theme.php';
	}

	/**
	 * Add link in admin plugin list to run the importer.
	 *
	 * @since   0.1.0
	 *
	 * @param   array  The existing plugin action links.
	 *
	 * @return  array  The modified links.
	 */
	function add_action_links ( $links ) {
		$text = __( 'Launch Importer', 'mai-demo-importer' );
		if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
			$text = __( 'Mai Theme Engine is not active!', 'mai-demo-importer' );
		}
		return array_merge( $links, array(
			sprintf( '<a href="%s">%s</a>', menu_page_url( 'mai-demo-importer', false ), $text ),
		) );
	}

}

/**
 * The main function for that returns Mai_Demo_Importer
 *
 * The main function responsible for returning the one true Mai_Demo_Importer
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $plugin = Mai_Demo_Importer(); ?>
 *
 * @since  0.1.0
 *
 * @return object|Mai_Demo_Importer The one true Mai_Demo_Importer Instance.
 */
function Mai_Demo_Importer() {
	return Mai_Demo_Importer::instance();
}

// Get Mai_Demo_Importer Running.
Mai_Demo_Importer();
