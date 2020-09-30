<?php

if ( ! function_exists( 'moments_qodef_register_widgets' ) ) {
	function moments_qodef_register_widgets() {
		$widgets = array(
			'MomentsQodefFullScreenMenuOpener',
			'MomentsQodefLatestPosts',
			'MomentsQodefSearchOpener',
			'MomentsQodefSideAreaOpener',
			'MomentsQodefSocialIconWidget',
			'MomentsQodefSeparatorWidget'
		);

		if ( moments_qodef_is_woocommerce_installed() ) {
			$widgets[] = 'MomentsQodefWoocommerceDropdownCart';
		}

		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
}

add_action( 'widgets_init', 'moments_qodef_register_widgets' );