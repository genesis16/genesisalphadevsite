<?php

/**
 * Filter the Genesis Theme Settings customizer panel settings and add our new beta update setting.
 * Allows all Mai plugins to be updated to beta releases.
 *
 * @since   1.8.0
 *
 * @param   array  The existing customizer config.
 *
 * @return  array  The modified config.
 */
add_filter( 'genesis_customizer_theme_settings_config', 'mai_customizer_theme_settings_config' );
function mai_customizer_theme_settings_config( $config ) {

	// Bail if these settings are not set.
	if ( ! isset( $config['genesis']['sections']['genesis_updates']['controls'] ) ) {
		return $config;
	}

	// Add our new settings.
	$config['genesis']['sections']['genesis_updates']['controls']['mai_tester'] = array(
		'label'       => __( 'Mai Beta Tester', 'mai-theme-engine' ),
		'description' => __( 'Check this box to enable beta updates of all Mai plugins and add-ons.', 'mai-theme-engine' ),
		'section'     => 'genesis_updates',
		'type'        => 'checkbox',
		'settings'    => array(
			'default' => 0,
		),
	);

	return $config;
}
