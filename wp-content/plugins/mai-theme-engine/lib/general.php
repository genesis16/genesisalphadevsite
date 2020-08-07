<?php

/**
 * Add inline logo width CSS.
 *
 * @since   1.8.0
 * @since   1.9.0  Converted to CSS vars for basicScroll.
 *
 * @return  void
 */
add_action( 'wp_head', 'mai_logo_width_css' );
function mai_logo_width_css() {

	// Bail if in the Dasbhoard.
	if ( is_admin() ) {
		return;
	}

	// Values.
	$width         = get_theme_mod( 'custom_logo_width', 180 );
	$top           = get_theme_mod( 'custom_logo_top', 24 );
	$bottom        = get_theme_mod( 'custom_logo_bottom', 24 );
	$shrink_width  = get_theme_mod( 'custom_logo_shrink_width', absint( $width * .7 ) );
	$shrink_top    = get_theme_mod( 'custom_logo_shrink_top', 4 );
	$shrink_bottom = get_theme_mod( 'custom_logo_shrink_bottom', 4 );

	// Pixel values.
	$width_px         = absint( $width ) . 'px';
	$top_px           = intval( $top ) . 'px';
	$bottom_px        = intval( $bottom ) . 'px';
	$shrink_width_px  = absint( $shrink_width ) . 'px';
	$shrink_top_px    = intval( $shrink_top ) . 'px';
	$shrink_bottom_px = intval( $shrink_bottom ) . 'px';

	/**
	 * Set max-width on the logo link.
	 * Stay shrunk on mobile.
	 *
	 * Large values to force whole pixel values via basicScroll.
	 */
	echo "<style>
	:root {
		--header-spacer: 0;
		--text-title: 100%;
		--logo-width: {$width_px};
		--logo-shrink-width: {$shrink_width_px};
		--logo-margin-top: {$top_px};
		--logo-margin-bottom: {$bottom_px};
	}
	.site-title.has-text-title a {
		font-size: var(--text-title);
	}
	@media only screen and (min-width: 769px) {
		.site-title a {
			margin-top: var(--logo-margin-top);
			margin-bottom: var(--logo-margin-bottom);
		}
		.custom-logo-link {
			max-width: var(--logo-width);
		}
	}
	@media only screen and (max-width: 768px) {
		.site-title a {
			margin-top: {$shrink_top_px};
			margin-bottom: {$shrink_bottom_px};
		}
		.custom-logo-link {
			max-width: var(--logo-shrink-width);
		}
	}
	</style>";
}

/**
 * Mobile menu width CSS.
 *
 * @since   1.10.0
 *
 * @return  void
 */
add_action( 'wp_head', 'mai_mobile_menu_width_css' );
function mai_mobile_menu_width_css() {

	// Bail if in the Dasbhoard.
	if ( is_admin() ) {
		return;
	}

	$width = absint( genesis_get_option( 'mobile_menu_width' ) );

	echo "<style>
	@media only screen and (max-width: {$width}px) {
		.header-before,
		.header-left,
		.header-right,
		.nav-primary,
		.nav-secondary {
			display: none;
		}
		.mai-toggle {
			display: block;
		}
	}
	</style>";
}

/**
 * Add body class to enabled specific settings.
 *
 * @since   Unknown.
 *
 * @param   array  $classes  The body classes.
 *
 * @return  array  $classes  The modified classes.
 */
add_filter( 'body_class', 'mai_do_settings_body_classes' );
function mai_do_settings_body_classes( $classes ) {

	// Header style.
	$header_style = genesis_get_option( 'header_style' );
	if ( $header_style && ! is_page_template( 'landing.php' ) ) {
		switch ( $header_style ) {
			case 'sticky':
				$classes[] = 'has-sticky-header';
				break;
			case 'reveal':
				$classes[] = 'has-reveal-header';
				break;
			case 'sticky_shrink':
				$classes[] = 'has-sticky-header';
				$classes[] = 'has-shrink-header';
				$classes[] = 'has-sticky-shrink-header';
				break;
			case 'reveal_shrink':
				$classes[] = 'has-reveal-header';
				$classes[] = 'has-shrink-header';
				$classes[] = 'has-reveal-shrink-header';
			break;
		}
	}

	// Mobile menu class.
	if ( mai_is_side_menu_enabled() ) {
		$classes[] = 'has-side-menu';
	} else {
		$classes[] = 'has-standard-menu';
	}

	return $classes;
}

/**
 * Add singular body class to the head.
 *
 * @param   array  $classes  The body classes.
 *
 * @return  array  $classes  The modified classes.
 */
add_filter( 'body_class', 'mai_singular_body_class' );
function mai_singular_body_class( $classes ) {
	if ( ! is_singular() ) {
		return $classes;
	}
	$classes[] = 'singular';
	return $classes;
}

/**
 * Add no-js body class to the head.
 * This get's changed to "js" if JS is enabled.
 *
 * @link https://www.paulirish.com/2009/avoiding-the-fouc-v3/
 *
 * @param   array  $classes  The body classes.
 *
 * @return  array  $classes  The modified classes.
 */
add_filter( 'body_class', 'mai_js_detection_body_class' );
function mai_js_detection_body_class( $classes ) {
	$classes[] = 'no-js';
	return $classes;
}

/**
 * Remove the .no-js class from the html element via JS.
 * This allows styles targetting browsers without JS.
 *
 * Props Gary Jones for the initial push to start doing this
 * Props Sal Ferrarello for introducing me to this solution
 *
 * @link https://github.com/GaryJones/genesis-js-no-js/
 * @link https://www.paulirish.com/2009/avoiding-the-fouc-v3/
 */
add_action( 'genesis_before', 'mai_js_detection_script', 8 );
function mai_js_detection_script() {
	?>
	<script>
		//<![CDATA[
		( function() {
			var c = document.body.classList;
			c.remove( 'no-js' );
			c.add( 'js' );
		})();
		//]]>
	</script>
	<?php
}

/**
 * Maybe run the genesis_attr() filters on boxed elements from settings.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @return  void
 */
add_action( 'genesis_before', 'mai_do_boxed_elements' );
function mai_do_boxed_elements() {

	$elements = genesis_get_option( 'boxed_elements' );

	if ( ! $elements ) {
		return;
	}

	$boxed = array(
		'site_container'       => 'site-container',
		'content_sidebar_wrap' => 'content-sidebar-wrap',
		'content'              => 'content',
		'sidebar'              => 'sidebar-primary',
		'sidebar_widgets'      => '',
		'sidebar_alt'          => 'sidebar-secondary',
		'sidebar_alt_widgets'  => '',
		'after_entry_widgets'  => '',
		'author_box'           => 'author-box',
		'adjacent_entry_nav'   => 'adjacent-entry-pagination',
		'comment_wrap'         => 'entry-comments',
		'comment_respond'      => '',
		'pings'                => '',
	);

	foreach ( (array) $elements as $element ) {

		if ( isset( $boxed[ $element ] ) ) {

			$name = $boxed[ $element ];

			add_filter( "genesis_attr_{$boxed[ $element ]}", function( $attributes ) use ( $name ) {
				$attributes['class'] .= ' boxed';
				return $attributes;
			});

		}

	}
}

/**
 * Maybe add has-boxed-children class if content/entry or sidebar/widgets have boxed setting enabled.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @param   $attributes  The existing attributes.
 *
 * @return  $attributes  The modifed attributes.
 */
add_filter( 'genesis_attr_content-sidebar-wrap', 'mai_boxed_content_sidebar_wrap' );
function mai_boxed_content_sidebar_wrap( $attributes ) {

	$elements = genesis_get_option( 'boxed_elements' );

	// Bail if no boxed elements.
	if ( ! $elements ) {
		return $attributes;
	}

	// Check for boxed content and sidebar elements. Intentially not checking for secondary sidebar.
	$content_wrap = (bool) in_array( 'content', $elements );
	$entry        = (bool) array_intersect( $elements, array( 'entry_singular', 'entry_archive' ) );
	$content      = (bool) $content_wrap || $entry;
	$sidebar      = (bool) array_intersect( $elements, array( 'sidebar', 'sidebar_widgets' ) );

	// If seamless.
	if ( ! ( $content || $sidebar ) ) {
		// Add class to show all children are seamless.
		$attributes['class'] .= ' no-boxed-children';
	}
	// If only content or sidebar has a boxed child.
	elseif ( ( $content && ! $sidebar ) || ( ! $content && $sidebar ) ) {
		// Add class to show all children have boxes.
		$attributes['class'] .= ' has-boxed-child';
	}
	// If content and sidebar have boxed children.
	elseif ( $content && $sidebar ) {
		// Add class to show all children have boxes.
		$attributes['class'] .= ' has-boxed-children';
	}

	return $attributes;
}

/**
 * Maybe add has-boxed class if sidebar or widgets have boxed setting enabled.
 *
 * @since   1.10.0
 *
 * @access  private
 *
 * @param   $attributes  The existing attributes.
 *
 * @return  $attributes  The modifed attributes.
 */
add_filter( 'genesis_attr_sidebar-primary', 'mai_boxed_sidebar_primary' );
function mai_boxed_sidebar_primary( $attributes ) {

	$elements = genesis_get_option( 'boxed_elements' );

	// Bail if no boxed elements.
	if ( ! $elements ) {
		return $attributes;
	}

	// Check if any sidebar elements are boxed.
	$sidebar = (bool) array_intersect( $elements, array( 'sidebar', 'sidebar_widgets' ) );

	// Bail if no boxed sidebar elements.
	if ( ! $sidebar ) {
		return $attributes;
	}

	// Add class to show something is boxed.
	$attributes['class'] .= ' has-boxed';

	return $attributes;
}

/**
 * Maybe add the has-boxed-site-container class body.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @param   array   $classes  An array of body class names.
 *
 * @return  array   The modified array of body class names.
 */
add_filter( 'body_class', 'mai_boxed_body' );
function mai_boxed_body( $classes ) {
	$elements = (array) genesis_get_option( 'boxed_elements' );
	if ( in_array( 'site_container', $elements ) ) {
		$classes[] = 'has-boxed-site-container';
	}
	return $classes;
}

/**
 * Maybe add the boxed class to entries.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @param   array   $classes  An array of post class names.
 * @param   string  $class    An array of additional class names added to the post.
 * @param   int     $post_id  The post ID.
 *
 * @return  array   The modified array of post class names.
 */
add_filter( 'post_class', 'mai_boxed_entry', 10, 3 );
function mai_boxed_entry( $classes, $class, $post_id ) {
	global $wp_query;
	// Keeps out of secondary loops.
	if ( ! $wp_query->is_main_query() ) {
		return $classes;
	}
	$elements = (array) genesis_get_option( 'boxed_elements' );
	if ( ( is_singular() && in_array( 'entry_singular', $elements ) ) || ( mai_is_content_archive() && in_array( 'entry_archive', $elements ) ) ) {
		$classes[] = 'boxed';
	}
	return $classes;
}

/**
 * Maybe add the boxed class to comments.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @param   array   $classes     An array of comment class names.
 * @param   string  $class       An array of additional class names added to the comment.
 * @param   int     $comment_id  The comment ID.
 *
 * @return  array   The modified array of post class names.
 */
add_filter( 'comment_class', 'mai_boxed_comment', 10, 3 );
function mai_boxed_comment( $classes, $class, $comment_id ) {
	$elements = (array) genesis_get_option( 'boxed_elements' );
	if ( in_array( 'comment', $elements ) ) {
		$classes[] = 'boxed';
	}
	return $classes;
}

/**
 * Adds boxed class to the adjacent post link.
 *
 * The dynamic portion of the hook name, `$adjacent`, refers to the type
 * of adjacency, 'next' or 'previous'.
 *
 * @since  1.3.0
 *
 * @access  private
 *
 * @param   string   $output    The adjacent post link.
 * @param   string   $format    Link anchor format.
 * @param   string   $link      Link permalink format.
 * @param   WP_Post  $post      The adjacent post.
 * @param   string   $adjacent  Whether the post is previous or next.
 *
 * @return  string   The modified output.
 */
add_filter( 'previous_post_link', 'mai_boxed_adjacent_entry_nav', 10, 5 );
add_filter( 'next_post_link', 'mai_boxed_adjacent_entry_nav', 10, 5 );
function mai_boxed_adjacent_entry_nav( $output, $format, $link, $post, $adjacent ) {
	$elements = genesis_get_option( 'boxed_elements' );
	if ( ! in_array( 'adjacent_entry_nav', (array) $elements ) ) {
		return $output;
	}
	$output = str_replace( '<a href', '<a class="boxed" href', $output );
	return $output;
}

/**
 * Maybe add boxed classes to widgets.
 *
 * Note: The filter is evaluated on both the front end and back end,
 * including for the Inactive Widgets sidebar on the Widgets screen.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @see    register_sidebar()
 *
 * @param  array  $params {
 *     @type array $args  {
 *         An array of widget display arguments.
 *
 *         @type string $name          Name of the sidebar the widget is assigned to.
 *         @type string $id            ID of the sidebar the widget is assigned to.
 *         @type string $description   The sidebar description.
 *         @type string $class         CSS class applied to the sidebar container.
 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
 *         @type string $after_title   HTML markup to append to the widget title when displayed.
 *         @type string $widget_id     ID of the widget.
 *         @type string $widget_name   Name of the widget.
 *     }
 *     @type array $widget_args {
 *         An array of multi-widget arguments.
 *
 *         @type int $number Number increment used for multiples of the same widget.
 *     }
 * }
 *
 * @return  array  The modified params.
 */
add_filter( 'dynamic_sidebar_params', 'mai_boxed_widgets' );
function mai_boxed_widgets( $params ) {
	if ( is_admin() ) {
		return $params;
	}
	if ( ! $params ) {
		return;
	}
	$sidebars = array(
		'sidebar'     => 'sidebar_widgets',
		'sidebar-alt' => 'sidebar_alt_widgets',
		'after-entry' => 'after_entry_widgets',
	);
	if ( ! ( isset( $sidebars[ $params[0]['id'] ] ) && in_array( $sidebars[ $params[0]['id'] ], (array) genesis_get_option( 'boxed_elements' ) ) ) ) {
		return $params;
	}
	$params[0]['before_widget'] = str_replace( 'class="widget ', 'class="widget boxed ', $params[0]['before_widget'] );
	return $params;
}

/**
 * Maybe add boxed wrap and classes to comment form.
 *
 * @since   1.3.0
 *
 * @access  private
 *
 * @return  void
 */
add_action( 'comment_form_before', 'mai_boxed_comment_form', 99 );
function mai_boxed_comment_form() {

	$elements = genesis_get_option( 'boxed_elements' );

	if ( ! in_array( 'comment_respond', (array) $elements ) ) {
		return;
	}

	echo '<div class="comment-respond-wrap boxed">';

	add_action( 'comment_form_after', function() {
		echo '</div>';
	}, 0 );
}

/**
 * Set max srcset width to the size of the actual image being displayed.
 *
 * @since   1.11.0
 *
 * @return  integer
 */
add_filter( 'max_srcset_image_width', 'mai_srcset_image_width', 10, 2 );
function mai_srcset_image_width( $size, $size_array ) {
	return isset( $size_array[0] ) && ! empty( $size_array[0] ) ? $size_array[0] : $size;
}

/**
 * Add srcset markup to images retreived via `genesis_get_image()` function.
 *
 * @since   1.8.0
 *
 * @return  string|HTML
 */
add_filter( 'genesis_get_image', 'mai_genesis_get_image_srcset', 10, 6 );
function mai_genesis_get_image_srcset( $output, $args, $id, $html, $url, $src ) {
	if ( 'html' !== mb_strtolower( $args['format'] ) ) {
		return $output;
	}
	if ( ! $output ) {
		return $output;
	}
	return wp_image_add_srcset_and_sizes( $output, wp_get_attachment_metadata( $id ), $id );
}

// Add more link in the image wrap.
add_filter( 'genesis_markup_entry-image-link_content', function( $content, $args ) {
	$image_id = get_post_thumbnail_id();
	if ( ! $image_id ) {
		return $content;
	}
	$image_size = mai_get_archive_setting( 'image_size', true, genesis_get_option( 'image_size' ) );
	$sources    = $image_id ? mai_get_picture_sources( $image_id, $image_size ) : '';
	return sprintf( '<picture>%s%s</picture>', $sources, $content );
}, 8, 2 );

/**
 * Disable/hide all the markup when using a "hidden" context.
 *
 * @since   1.11.0
 *
 * @return  string
 */
add_filter( 'genesis_markup_hidden_open',    '__return_empty_string' );
add_filter( 'genesis_markup_hidden_content', '__return_empty_string' );
add_filter( 'genesis_markup_hidden_close',   '__return_empty_string' );
