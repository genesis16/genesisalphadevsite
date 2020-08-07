<?php

/**
 * Register the required plugins for this theme.
 *
 * @since  0.1.0
 */
add_action( 'tgmpa_register', function() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => 'Mai Theme Engine',
			'slug'     => 'mai-theme-engine',
			'source'   => 'https://github.com/maithemewp/mai-theme-engine/archive/master.zip',
			'required' => true,
		),
		array(
			'name'      => 'Ninja Forms',
			'slug'      => 'ninja-forms',
			'required'  => false,
		),
		array(
			'name'      => 'Simple Social Icons',
			'slug'      => 'simple-social-icons',
			'required'  => false,
		),
		array(
			'name'      => 'Genesis eNews Extended',
			'slug'      => 'genesis-enews-extended',
			'required'  => false,
		),
	);
	$config = array(
		'id'           => 'mai-demo-importer',      // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                       // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',  // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',         // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                     // Show admin notices or not.
		'dismissable'  => true,                     // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                    // Automatically activate plugins after installation or not.
		'message'      => '',                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
});
