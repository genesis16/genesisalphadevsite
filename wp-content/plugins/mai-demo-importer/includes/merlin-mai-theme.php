<?php

/**
 * Add the demo import files.
 *
 * @since   0.1.0
 *
 * @return  array  Data for MerlinWP import.
 */
add_filter( 'merlin_import_files', function() {

	$dir = trailingslashit( MAI_DEMO_IMPORTER_DIR );
	$url = trailingslashit( MAI_DEMO_IMPORTER_URL );

	$files = array(
		array(
			'import_file_name'             => 'Mai Business',
			'local_import_file'            => $dir . 'demos/business/business.xml',
			'local_import_widget_file'     => $dir . 'demos/business/business.wie',
			'local_import_customizer_file' => $dir . 'demos/business/business.dat',
			'import_preview_image_url'     => $url . 'demos/business/business.png',
			'import_notice'                => __( 'Mai Business Theme.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/business/',
		),
		array(
			'import_file_name'             => 'Mai Law',
			'local_import_file'            => $dir . 'demos/law/law.xml',
			'local_import_widget_file'     => $dir . 'demos/law/law.wie',
			'local_import_customizer_file' => $dir . 'demos/law/law.dat',
			'import_preview_image_url'     => $url . 'demos/law/law.png',
			'import_notice'                => __( 'Mai Law Theme.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/law/',
		),
		array(
			'import_file_name'             => 'Mai Lifestyle',
			'local_import_file'            => $dir . 'demos/lifestyle/lifestyle.xml',
			'local_import_widget_file'     => $dir . 'demos/lifestyle/lifestyle.wie',
			'local_import_customizer_file' => $dir . 'demos/lifestyle/lifestyle.dat',
			'import_preview_image_url'     => $url . 'demos/lifestyle/lifestyle.png',
			'import_notice'                => __( 'Mai Lifestyle Theme.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://maitheme.com/mai-lifestyle-pro/',
		),
		array(
			'import_file_name'             => 'Mai News',
			'local_import_file'            => $dir . 'demos/news/news.xml',
			'local_import_widget_file'     => $dir . 'demos/news/news.wie',
			'local_import_customizer_file' => $dir . 'demos/news/news.dat',
			'import_preview_image_url'     => $url . 'demos/news/news.png',
			'import_notice'                => __( 'Mai News Theme.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/news/',
		),
	);

	$name = false;

	if ( defined( 'CHILD_THEME_NAME' ) ) {

		switch ( CHILD_THEME_NAME ) {
			case 'Mai Business Theme':
				$name = 'Mai Business';
				break;
			case 'Mai Law Pro':
			case 'Mai Law Theme':
				$name = 'Mai Law';
				break;
			case 'Mai Lifestyle Pro':
			case 'Mai Lifestyle Theme':
				$name = 'Mai Lifestyle';
				break;
			case 'Mai News Theme':
				$name = 'Mai News';
				break;
		}
	}

	if ( $name ) {
		$files = wp_list_filter( $files, array( 'import_file_name' => $name ) );
	}

	return $files;
});

/**
 * Remove the child theme step.
 * This is for a Genesis child theme.
 *
 * @since   0.1.0
 *
 * @return  $array  The merlin import steps.
 */
add_filter( 'genesis_merlin_steps', function( $steps ) {
	unset( $steps['child'] );
	return $steps;
});

/**
 * Clear menu locations and delete the menus before importing content.
 *
 * @since   0.1.0
 *
 * @return  void
 */
add_action( 'import_start', function() {

	// STOP THIS FOR NOW.
	return;

	// Clear the menu locations.
	set_theme_mod( 'nav_menu_locations', array() );

	$locations = array(
		'header_left'  => maiconfigurations_get_menu_by_slug( 'header-left' ),
		'header_right' => maiconfigurations_get_menu_by_slug( 'header-right' ),
		'primary'      => maiconfigurations_get_menu_by_slug( 'primary' ),
		'secondary'    => maiconfigurations_get_menu_by_slug( 'footer' ),
		'mobile'       => maiconfigurations_get_menu_by_slug( 'mobile' ),
	);

	foreach ( $locations as $name => $menu ) {

		if ( ! $menu ) {
			continue;
		}

		wp_delete_nav_menu( $menu );

		Merlin_Logger::get_instance()->info( sprintf( '%s navigation menu deleted.', $name ) );
	}

});

/**
 * Set the menus.
 *
 * @since   0.1.0
 *
 * @return  void
 */
add_action( 'merlin_after_all_import', function( $selected_import_index ) {

	$locations = $nav_menu_locations = array();

	// Get menus.
	$locations['header_left']  = maiconfigurations_get_menu_by_slug( 'header-left' );
	$locations['header_right'] = maiconfigurations_get_menu_by_slug( 'header-right' );
	$locations['primary']      = maiconfigurations_get_menu_by_slug( 'primary' );
	$locations['secondary']    = maiconfigurations_get_menu_by_slug( 'footer' );
	$locations['mobile']       = maiconfigurations_get_menu_by_slug( 'mobile' );

	// Loop through our nav menus.
	foreach ( $locations as $location => $menu ) {

		// Skip if no menu.
		if ( ! $menu ) {
			continue;
		}

		// Set as a valid menu.
		$nav_menu_locations[ $location ] = $menu->term_id;

		Merlin_Logger::get_instance()->info( sprintf( '%s navigation menu set to "%s" location.', $menu->name, $location ) );
	}

	// Bail if no menus.
	if ( ! $nav_menu_locations ) {
		return;
	}

	// Set the menus.
	set_theme_mod( 'nav_menu_locations', $nav_menu_locations );

});

/**
 * Set the permalink structure.
 *
 * @since   0.1.0
 *
 * @return  void
 */
add_action( 'merlin_after_all_import', function( $selected_import_index ) {

	$structure = get_option( 'permalink_structure' );

	if ( $structure ) {
		return;
	}

	update_option( 'permalink_structure', '/%postname%/' );

	Merlin_Logger::get_instance()->info( 'Permalink structure updated.' );
});

/**
 * Set theme specific widget defaults during import.
 * We need to have this option set prior to importing widgets or they do not immediately show up after import.
 *
 * @since   0.1.0
 *
 * @link    https://github.com/richtabor/MerlinWP/issues/129
 *
 * @param   array  $data  The widget import data.
 *
 * @return  array  The widget data.
 */
add_action( 'merlin_widget_importer_before_widgets_import', function( $data ) {

	// Disable existing widgets.
	update_option( 'sidebars_widgets', array() );

	$footer_widgets = 0;

	foreach ( $data as $id => $widgets ) {
		switch ( $id ) {
			case 'footer-1':
				$footer_widgets++;
				break;
			case 'footer-2':
				$footer_widgets++;
				break;
			case 'footer-3':
				$footer_widgets++;
				break;
			case 'footer-4':
				$footer_widgets++;
				break;
			case 'footer-5':
				$footer_widgets++;
				break;
			case 'footer-6':
				$footer_widgets++;
				break;
		}
	}

	// Make sure the theme supports the right amount of footer widgets.
	add_theme_support( 'genesis-footer-widgets', $footer_widgets );

	// Make sure all the footer widgets are registered.
	genesis_register_footer_widget_areas();

	// Set footer widget count option.
	genesis_update_settings( array(
		'footer_widget_count' => $footer_widgets,
	) );

	Merlin_Logger::get_instance()->info( sprintf( 'Footer widget count updated to %s.', $footer_widgets ) );
});

/**
 * Get a menu object by its slug.
 *
 * @since   0.1.0
 *
 * @return  object|false
 */
function maiconfigurations_get_menu_by_slug( $slug ) {

	if ( $menu = get_term_by( 'slug', $slug, 'nav_menu' ) ) {
		return $menu;
	}

	if ( $menu = get_term_by( 'slug', $slug . '-nav', 'nav_menu' ) ) {
		return $menu;
	}

	if ( $menu = get_term_by( 'slug', $slug . '-menu', 'nav_menu' ) ) {
		return $menu;
	}

	return false;
}
