<?php
if ( ! function_exists( 'moments_core_dashboard_load_files' ) ) {
	function moments_core_dashboard_load_files() {
        require_once QODE_CORE_ABS_PATH . '/core-dashboard/core-dashboard.php';
        require_once QODE_CORE_ABS_PATH . '/core-dashboard/rest/include.php';
        require_once QODE_CORE_ABS_PATH . '/core-dashboard/registration-rest.php';
        require_once QODE_CORE_ABS_PATH . '/core-dashboard/sub-pages/sub-page.php';

		foreach (glob(QODE_CORE_ABS_PATH . '/core-dashboard/sub-pages/*/load.php') as $subpages) {
			include_once $subpages;
		}
	}

	add_action('after_setup_theme', 'moments_core_dashboard_load_files');
}