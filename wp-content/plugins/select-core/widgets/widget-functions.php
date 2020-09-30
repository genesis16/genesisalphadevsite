<?php

if ( ! function_exists( 'moments_qodef_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 *
	 */
	function moments_qodef_load_widget_class() {
		include_once QODE_CORE_ABS_PATH . '/widgets/widget-class.php';
	}

	add_action( 'moments_qodef_before_options_map', 'moments_qodef_load_widget_class' );
}

if ( ! function_exists( 'moments_qodef_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to moments_qodef_after_options_map action
	 */
	function moments_qodef_load_widgets() {

		foreach ( glob( QODE_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}

		include_once QODE_CORE_ABS_PATH . '/widgets/widget-loader.php';
	}

	add_action( 'moments_qodef_before_options_map', 'moments_qodef_load_widgets' );
}