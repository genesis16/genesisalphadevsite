<?php

/**
 * Build a grid of content.
 *
 * @access  private
 */
class Mai_Grid {

	private $args;
	private $original_args;
	private $content_type;
	private $aspect_width;
	private $aspect_height;
	private $facetwp = false;

	// All displayed items incase exclude_displayed is true in any instance of grid.
	public static $existing_post_ids = array();
	public static $existing_term_ids = array();

	// Whether facetwp_is_main_query filter has run.
	public static $facetwp_filter = false;

	public function __construct( $args = array() ) {

		// Save original args in a variable for filtering later.
		$this->args = $this->original_args = $args;

		// Parse defaults and args.
		$this->args = shortcode_atts( array(
			'align'                => '',   // "top, left" Comma separted. overrides align_cols and align_text.
			'align_cols'           => '',   // "top, left" Comma separted
			'align_text'           => '',   // "center" Comma separted. for most times one setting makes sense
			'author_after'         => '',
			'author_before'        => '',
			'authors'              => '',   // Comma separated author/user IDs
			'bottom'               => '',   // Bottom margin. none, xxxs, xxs, xs, sm, md, lg, xl, xxl
			'boxed'                => true, // Display in boxed look
			'categories'           => '',   // Comma separated category IDs
			'columns'              => 3,    // "1", "2", "3", "4" or "6".
			'content'              => 'post',  // post_type name (comma separated if multiple), or taxonomy name
			'content_limit'        => '',   // Limit number of words
			'content_type'         => '',
			'context'              => 'flex-grid',
			'date_after'           => '',
			'date_before'          => '',
			'date_format'          => '',
			'date_query_after'     => '',
			'date_query_before'    => '',
			'entry_class'          => '',
			'exclude'              => '',
			'exclude_categories'   => '',  // Comma separated category IDs
			'exclude_current'      => false,
			'exclude_displayed'    => false,
			'facetwp'              => false,
			'grid_title'           => '',
			'grid_title_class'     => '',
			'grid_title_wrap'      => 'h2',
			'gutter'               => 'md',  // xxxs, xxs, xs, sm, md, lg, xl, xxl
			'hide_empty'           => true,
			'ids'                  => '',
			'ignore_sticky_posts'  => true,  // normal WP_Query is false
			'image_align'          => '',
			'image_location'       => 'before_entry',
			'image_size'           => 'one-third',
			'link'                 => true,
			'meta_key'             => '',
			'meta_value'           => '',
			'more_link_text'       => __( 'Read More', 'mai-theme-engine' ),
			'no_content_message'   => '',
			'number'               => 12,
			'offset'               => '0',
			'order'                => '',
			'order_by'             => '',
			'overlay'              => '',
			'parent'               => '',
			'rel'                  => '',
			'row_class'            => '',
			'show'                 => 'image, title',  // image, title, add_to_cart, author, content, date, excerpt, image, more_link, price, meta, title
			'status'               => '',  // Comma separated for multiple
			'tags'                 => '',  // Comma separated tag IDs
			'target'               => '',
			'tax_include_children' => true,
			'tax_operator'         => 'IN',
			'tax_field'            => 'term_id',
			'taxonomy'             => '',
			'terms'                => '',  // Comma-separated or 'current'
			'title_wrap'           => 'h3',
			'top'                  => '',  // Top margin. none, xxxs, xxs, xs, sm, md, lg, xl, xxl
			'class'                => '',
			'id'                   => '',
			'xs'                   => 12, // Span out of 12 column grid. '4' is 1/3 since 4x3=12.
			'sm'                   => '',
			'md'                   => '',
			'lg'                   => '',
			'xl'                   => '',
			'slider'               => false,   // (slider only) Make the columns a slider
			'adaptiveheight'       => false,   // (slider only) Resize to the height of the content in each slide
			'arrows'               => true,    // (slider only) Whether to display arrows
			'autoplay'             => false,   // (slider only) Whether to autoplay the slider
			'center_mode'          => false,   // (slider only) Mobile 'peek'
			'dots'                 => false,   // (slider only) Whether to display dots
			'fade'                 => false,   // (slider only) Fade instead of left/right scroll (works requires slidestoshow 1)
			'infinite'             => true,    // (slider only) Loop slider
			'slidestoscroll'       => $this->get_slidestoscroll_default( $this->args ),  // (slider only) The amount of posts to scroll. Defaults to the amount of columns to show.
			'speed'                => '3000',  // (slider only) Autoplay Speed in milliseconds
		), $this->args, 'grid' );

		// Sanitize args.
		$this->args = array(
			'align'                => mai_sanitize_keys( $this->args['align'] ),
			'align_cols'           => mai_sanitize_keys( $this->args['align_cols'] ),
			'align_text'           => mai_sanitize_keys( $this->args['align_text'] ),
			'author_after'         => esc_html( $this->args['author_after'] ),
			'author_before'        => esc_html( $this->args['author_before'] ),
			'authors'              => $this->args['authors'], // Validated later
			'bottom'               => sanitize_key( $this->args['bottom'] ),
			'boxed'                => filter_var( $this->args['boxed'], FILTER_VALIDATE_BOOLEAN ),
			'categories'           => array_filter( array_map( 'trim', explode( ',', sanitize_text_field( $this->args['categories'] ) ) ) ),
			'columns'              => absint( $this->args['columns'] ),
			'content'              => array_filter( array_map( 'trim', explode( ',', sanitize_text_field( $this->args['content'] ) ) ) ),
			'content_limit'        => absint( $this->args['content_limit'] ),
			'content_type'         => sanitize_text_field( $this->args['content_type'] ),
			'context'              => sanitize_key( $this->args['context'] ),
			'date_after'           => esc_html( $this->args['date_after'] ),
			'date_before'          => esc_html( $this->args['date_before'] ),
			'date_format'          => sanitize_text_field( $this->args['date_format'] ),
			'date_query_after'     => sanitize_text_field( $this->args['date_query_after'] ),
			'date_query_before'    => sanitize_text_field( $this->args['date_query_before'] ),
			'entry_class'          => sanitize_text_field( $this->args['entry_class'] ),
			'exclude'              => array_filter( array_map( 'trim', explode( ',', sanitize_text_field( $this->args['exclude'] ) ) ) ),
			'exclude_categories'   => array_filter( array_map( 'trim', explode( ',', sanitize_text_field( $this->args['exclude_categories'] ) ) ) ),
			'exclude_current'      => filter_var( $this->args['exclude_current'], FILTER_VALIDATE_BOOLEAN ),
			'exclude_displayed'    => filter_var( $this->args['exclude_displayed'], FILTER_VALIDATE_BOOLEAN ),
			'facetwp'              => filter_var( $this->args['facetwp'], FILTER_VALIDATE_BOOLEAN ),
			'grid_title'           => sanitize_text_field( $this->args['grid_title'] ),
			'grid_title_class'     => sanitize_text_field( $this->args['grid_title_class'] ),
			'grid_title_wrap'      => sanitize_key( $this->args['grid_title_wrap'] ),
			'gutter'               => mai_is_valid_gutter( sanitize_key( $this->args['gutter'] ) ) ? sanitize_key( $this->args['gutter'] ) : 'md',
			'hide_empty'           => filter_var( $this->args['hide_empty'], FILTER_VALIDATE_BOOLEAN ),
			'ids'                  => array_filter( array_map( 'absint', explode( ',', sanitize_text_field( $this->args['ids'] ) ) ) ),
			'ignore_sticky_posts'  => filter_var( $this->args['ignore_sticky_posts'], FILTER_VALIDATE_BOOLEAN ),
			'image_align'          => sanitize_key( $this->args['image_align'] ),
			'image_location'       => sanitize_key( $this->args['image_location'] ),
			'image_size'           => sanitize_key( $this->args['image_size'] ),
			'link'                 => filter_var( $this->args['link'], FILTER_VALIDATE_BOOLEAN ),
			'meta_key'             => sanitize_text_field( $this->args['meta_key'] ),
			'meta_value'           => sanitize_text_field( $this->args['meta_value'] ),
			'more_link_text'       => sanitize_text_field( $this->args['more_link_text'] ),
			'no_content_message'   => sanitize_text_field( $this->args['no_content_message'] ),
			'number'               => $this->args['number'], // Validated later, after check for 'all'
			'offset'               => absint( $this->args['offset'] ),
			'order'                => sanitize_key( $this->args['order'] ),
			'order_by'             => sanitize_key( $this->args['order_by'] ),
			'overlay'              => sanitize_key( $this->args['overlay'] ),
			'parent'               => $this->args['parent'], // Validated later, after check for 'current'
			'rel'                  => sanitize_key( $this->args['rel'] ),
			'row_class'            => mai_sanitize_html_classes( $this->args['row_class'] ),
			'show'                 => mai_sanitize_keys( $this->args['show'] ),
			'status'               => array_filter( array_map( 'trim', explode( ',', $this->args['status'] ) ) ),
			'tags'                 => array_filter( array_map( 'trim', explode( ',', sanitize_text_field( $this->args['tags'] ) ) ) ),
			'target'               => sanitize_key( $this->args['target'] ),
			'tax_include_children' => filter_var( $this->args['tax_include_children'], FILTER_VALIDATE_BOOLEAN ),
			'tax_operator'         => $this->args['tax_operator'], // Validated later as one of a few values
			'tax_field'            => sanitize_key( $this->args['tax_field'] ),
			'taxonomy'             => sanitize_key( $this->args['taxonomy'] ),
			'terms'                => $this->args['terms'], // Validated later, after check for 'current'
			'title_wrap'           => sanitize_key( $this->args['title_wrap'] ),
			'top'                  => sanitize_key( $this->args['top'] ),
			'class'                => mai_sanitize_html_classes( $this->args['class'] ),
			'id'                   => sanitize_html_class( $this->args['id'] ),
			'xs'                   => sanitize_key( $this->args['xs'] ),
			'sm'                   => sanitize_key( $this->args['sm'] ),
			'md'                   => sanitize_key( $this->args['md'] ),
			'lg'                   => sanitize_key( $this->args['lg'] ),
			'xl'                   => sanitize_key( $this->args['xl'] ),
			'slider'               => filter_var( $this->args['slider'], FILTER_VALIDATE_BOOLEAN ),
			'adaptiveheight'       => filter_var( $this->args['adaptiveheight'], FILTER_VALIDATE_BOOLEAN ),
			'arrows'               => filter_var( $this->args['arrows'], FILTER_VALIDATE_BOOLEAN ),
			'autoplay'             => filter_var( $this->args['autoplay'], FILTER_VALIDATE_BOOLEAN ),
			'center_mode'          => filter_var( $this->args['center_mode'], FILTER_VALIDATE_BOOLEAN ),
			'dots'                 => filter_var( $this->args['dots'], FILTER_VALIDATE_BOOLEAN ),
			'fade'                 => filter_var( $this->args['fade'], FILTER_VALIDATE_BOOLEAN ),
			'infinite'             => filter_var( $this->args['infinite'], FILTER_VALIDATE_BOOLEAN ),
			'slidestoscroll'       => absint( $this->args['slidestoscroll'] ),
			'speed'                => absint( $this->args['speed'] ),
		);

		/**
		 * Grid args filter.
		 *
		 * @since   1.3.3
		 *
		 * @param   array  $args           The current grid args.
		 * @param   array  $original_args  The original grid args.
		 *
		 * @return  array  The args.
		 */
		$this->args = apply_filters( 'mai_grid_args', $this->args, $this->original_args );

		// Get the content type.
		$this->content_type = $this->get_content_type();
	}

	/**
	 * Return the grid HTML.
	 *
	 * @return  string|HTML
	 */
	function render() {

		// Bail if we don't have a valid content type.
		if ( empty( $this->content_type ) ) {
			return;
		}

		$content = '';

		switch ( $this->content_type ) {
			case 'post':
				$content = $this->get_posts();
			break;
			case 'term':
				$content = $this->get_terms();
			break;
			// TODO: $this->get_users( $atts );
			default:
				$content = '';
		}

		// Bail if no content.
		if ( ! $content ) {
			return '';
		}

		// Set attributes.
		$attributes = array(
			'class' => mai_add_classes( $this->args['class'], 'flex-grid' ),
			'id'    => ! empty( $this->args['id'] ) ? $this->args['id'] : '',
		);

		// If this is a facetwp grid, filter the main query.
		if ( $this->facetwp ) {

			// If the filter hasn't run yet.
			if ( ! $this::$facetwp_filter ) {
				/**
				 * Set it as the main query.
				 *
				 * @link  https://facetwp.com/documentation/facetwp_is_main_query/
				 */
				add_filter( 'facetwp_is_main_query', array( $this, 'facetwp_is_main_query' ), 10, 2 );
				// Set the filter flag so this filter doesn't run more than once.
				$this::$facetwp_filter = true;
			}
		}

		return sprintf( '<div %s>%s</div>', genesis_attr( $this->args['context'], $attributes, $this->args ), $content );
	}

	/**
	 * Get the grid posts loop.
	 *
	 * @return  string|HTML
	 */
	function get_posts() {

		// Set up initial query for posts.
		$query_args = array(
			'post_type'           => $this->args['content'],
			'posts_per_page'      => $this->get_number(),
			'ignore_sticky_posts' => $this->args['ignore_sticky_posts'],
			'no_found_rows'       => true,
		);

		// Authors.
		if ( ! empty( $this->args['authors'] ) ) {
			if ( is_singular() && ( 'current' === $this->args['authors'] ) ) {
				$query_args['author__in'] = array( get_the_author_meta( 'ID' ) );
			} else {
				$query_args['author__in'] = explode( ',', sanitize_text_field( $this->args['authors'] ) );
			}
		}

		// Categories.
		if ( ! empty( $this->args['categories'] ) ) {
			$query_args['category__in'] = $this->args['categories'];
		}

		// Date query.
		if ( ! empty( $this->args['date_query_after'] ) || ! empty( $this->args['date_query_before'] ) ) {
			$query_args['date_query'] = array();
			if ( ! empty( $this->args['date_query_after'] ) ) {
				$query_args['date_query']['after'] = $this->args['date_query_after'];
			}
			if ( ! empty( $this->args['date_query_before'] ) ) {
				$query_args['date_query']['before'] = $this->args['date_query_before'];
			}
		}

		// Exclude posts.
		if ( ! empty( $this->args['exclude'] ) ) {
			$query_args['post__not_in'] = $this->args['exclude'];
		}

		// Exclude existing.
		if ( $this->args['exclude_displayed'] && ! empty( $this::$existing_post_ids ) ) {
			if ( isset( $query_args['post__not_in'] ) ) {
				$query_args['post__not_in'] = array_push( $query_args['post__not_in'], $this::$existing_post_ids );
			} else {
				$query_args['post__not_in'] = $this::$existing_post_ids;
			}
		}

		// Categories.
		if ( ! empty( $this->args['exclude_categories'] ) ) {
			$query_args['category__not_in'] = $this->args['exclude_categories'];
		}

		// If exclude current.
		if ( is_singular() && $this->args['exclude_current'] ) {
			// If this query_args is already set.
			if ( isset( $query_args['post__not_in'] ) ) {
				$query_args['post__not_in'] = array_push( $query_args['post__not_in'], get_the_ID() );
			} else {
				$query_args['post__not_in'] = array( get_the_ID() );
			}
		}

		// Post IDs.
		if ( ! empty( $this->args['ids'] ) ) {
			$query_args['post__in'] = $this->args['ids'];
		}

		// Order.
		if ( ! empty( $this->args['order'] ) ) {
			$query_args['order'] = $this->args['order'];
		}
		// If only showing 1 hierarchical post type.
		elseif ( 1 === count( $this->args['content'] ) && is_post_type_hierarchical( $this->args['content'][0] ) ) {
			$query_args['order'] = 'ASC';
		}

		// Orderby.
		if ( ! empty( $this->args['order_by'] ) ) {
			$query_args['orderby'] = $this->args['order_by'];
		}
		// If only showing 1 hierarchical post type.
		elseif ( 1 === count( $this->args['content'] ) && is_post_type_hierarchical( $this->args['content'][0] ) ) {
			// Default sorting to menu order.
			$query_args['orderby'] = 'menu_order';
		}

		// Meta key (for ordering).
		if ( ! empty( $this->args['meta_key'] ) ) {
			$query_args['meta_key'] = $this->args['meta_key'];
		}

		// Meta value (for simple meta queries).
		if ( ! empty( $this->args['meta_value'] ) ) {
			$query_args['meta_value'] = $this->args['meta_value'];
		}

		// Offset. Empty string is sanitized to zero.
		if ( $this->args['offset'] > 0 ) {
			$query_args['offset'] = $this->args['offset'];
		}

		// If post parent attribute, set up parent. Can't check empty() cause may pass 0 or '0';
		if ( '' !== $this->args['parent'] ) {
			if ( is_singular() && 'current' == $this->args['parent'] ) {
				$query_args['post_parent'] = get_the_ID();
			} elseif ( is_numeric( $this->args['parent'] ) ) {
				$query_args['post_parent'] = intval( $this->args['parent'] );
			} elseif ( is_string( $this->args['parent'] ) ) {
				$parent_post = get_page_by_path( $this->args['parent'], 'OBJECT', $this->args['content'] );
				if ( $parent_post ) {
					$query_args['post_parent'] = intval( $parent_post->ID );
				}
			}
		}

		// Status.
		if ( ! empty( $this->args['status'] ) ) {
			$query_args['post_status'] = $this->args['status'];
		}

		// Tags.
		if ( ! empty( $this->args['tags'] ) ) {
			$query_args['tag__in'] = $this->args['tags'];
		}

		// Tax query.
		if ( ! empty( $this->args['taxonomy'] ) && ! empty( $this->args['terms'] ) ) {
			if ( 'current' === $this->args['terms'] ) {
				$terms      = array();
				$post_terms = wp_get_post_terms( get_the_ID(), $this->args['taxonomy'] );
				if ( ! is_wp_error( $post_terms ) ) {
					foreach ( $post_terms as $term ) {
						switch ( $this->args['tax_field'] ) {
							case 'slug':
							$terms[] = $term->slug;
							break;
							case 'term_id':
							$terms[] = $term->term_id;
							break;
						}
					}
				}
			} else {
				// Term string to array.
				$terms = explode( ',', $this->args['terms'] );
			}

			// Force a valid operator.
			if ( ! in_array( $this->args['tax_operator'], array( 'IN', 'NOT IN', 'AND' ) ) ) {
				$this->args['tax_operator'] = 'IN';
			}

			$query_args['tax_query'] = array(
				array(
					'taxonomy'         => $this->args['taxonomy'],
					'field'            => $this->args['tax_field'],
					'terms'            => $terms,
					'operator'         => $this->args['tax_operator'],
					'include_children' => $this->args['tax_include_children'],
				)
			);
		}

		// FacetWP support.
		if ( isset( $this->args['facetwp'] ) && $this->args['facetwp'] ) {
			$this->facetwp = $query_args['facetwp'] = true;
		}

		/**
		 * Filter the arguments passed to WP_Query.
		 *
		 * @since   1.3.3
		 *
		 * @param   array  $query_args     Parsed arguments to pass to WP_Query.
		 * @param   array  $args           The current grid args.
		 * @param   array  $original_args  The original grid args.
		 *
		 * @return  array  The args.
		 */
		$query_args = apply_filters( 'mai_grid_query_args', $query_args, $this->args, $this->original_args );

		// Get our query.
		$query = new WP_Query( $query_args );

		// If posts.
		if ( $query->have_posts() ) {

			// Get it started.
			$html = '';

			$html .= $this->get_grid_title();

			$html .= $this->get_row_open();

				// Loop through posts.
				while ( $query->have_posts() ) : $query->the_post();

					// Add this post to the existing post IDs.
					$this::$existing_post_ids[] = get_the_ID();

					global $post;

					$image_html = $entry_header = $date = $author = $entry_info = $entry_content = $entry_footer = $entry_meta = $image_id = '';

					// Get image vars.
					$do_image = $has_bg_image = false;

					// If showing image, set some helper variables.
					if ( in_array( 'image', $this->args['show'] ) ) {
						$image_id = $this->get_image_id( get_the_ID() );
						if ( $image_id ) {
							$do_image = true;
							if ( $this->is_bg_image() ) {
								$has_bg_image = true;
							}
						}
					}

					// Opening wrap.
					$html .= $this->get_entry_open( $post, $has_bg_image );

						// Set url as a variable.
						$url = $this->get_entry_link( $post );

						// Build the image html.
						if ( $do_image ) {

							$image_html = $this->get_image_html( $image_id, $url, the_title_attribute( 'echo=0' ) );

							if ( $has_bg_image ) {
								$html .= $image_html;
							}
						}

						// Overlay.
						if ( 'bg' === $this->args['image_location'] && mai_is_valid_overlay( $this->args['overlay'] ) ) {
							$html .= mai_get_overlay_html( $this->args['overlay'] );
						}

						// Image.
						if ( 'before_entry' === $this->args['image_location'] ) {
							$html .= $image_html;
						}

						// Date.
						if ( in_array( 'date', $this->args['show'] ) ) {
							/**
							 * If date format is set in shortcode, use that format instead of default Genesis.
							 * Since using G post_date shortcode you can also use 'relative' for '3 days ago'.
							 */
							$date_before    = $this->args['date_before'] ? ' before="' . str_replace( ' ', '&nbsp;', $this->args['date_before'] ) . '"' : '';
							$date_after     = $this->args['date_after'] ? ' after="' . str_replace( ' ', '&nbsp;', $this->args['date_after'] ) . '"' : '';
							$date_format    = $this->args['date_format'] ? ' format="' . $this->args['date_format'] . '"' : '';
							$date_shortcode = sprintf( '[post_date%s%s%s]', $date_before, $date_after, $date_format );
							// Use Genesis output for post date.
							$date = do_shortcode( $date_shortcode );
						}

						// Author.
						if ( in_array( 'author', $this->args['show'] ) ) {
							/**
							 * If author has no link this shortcode defaults to genesis_post_author_shortcode() [post_author].
							 */
							$author_before = $this->args['author_before'] ? ' before="' . str_replace( ' ', '&nbsp;', $this->args['author_before'] ) . '"' : '';
							$author_after  = $this->args['author_after'] ? ' after="' . str_replace( ' ', '&nbsp;', $this->args['author_after'] ) . '"' : '';
							// Can't have a nested link if we have a background image.
							if ( $has_bg_image ) {
								$author_shortcode_name = 'post_author';
							} else {
								$author_shortcode_name = 'post_author_posts_link';
							}
							$author_shortcode = sprintf( '[%s%s%s]', $author_shortcode_name, $author_before, $author_after );
							// Use Genesis output for author, including link.
							$author = do_shortcode( $author_shortcode );
						}

						// Build entry info.
						$entry_info = $date . $author;
						$entry_info = apply_filters( 'mai_flex_entry_info', $entry_info, $this->args, $this->original_args );
						$entry_info = $entry_info ? sprintf( '<p %s>%s</p>', genesis_attr( 'entry-meta-before-content', array(), $this->args ), $entry_info ) : '';

						// Build entry header.
						if ( $this->is_entry_header_image() || in_array( 'title', $this->args['show'] ) || $entry_info ) {

							// Image.
							if ( 'before_title' === $this->args['image_location'] ) {
								$entry_header .= $image_html;
							}

							// Title.
							if ( in_array( 'title', $this->args['show'] ) ) {
								if ( $this->args['link'] ) {
									$title = sprintf( '<a href="%s" title="%s"%s%s>%s</a>', $url, esc_attr( get_the_title() ), $this->get_target(), $this->get_rel(), get_the_title() );
								} else {
									$title = get_the_title();
								}
								$entry_header .= sprintf( '<%s %s>%s</%s>', $this->args['title_wrap'], genesis_attr( 'entry-title', array(), $this->args ), $title, $this->args['title_wrap'] );
							}

							// Image.
							if ( 'after_title' === $this->args['image_location'] ) {
								$entry_header .= $image_html;
							}

							// Entry Meta.
							if ( $entry_info ) {
								$entry_header .= $entry_info;
							}

						}

						// Add filter to the entry header.
						$entry_header = apply_filters( 'mai_flex_entry_header', $entry_header, $this->args, $this->original_args );

						// Add entry header wrap if we have content.
						if ( $entry_header ) {
							$html .= sprintf( '<header %s>%s</header>', genesis_attr( 'entry-header', array(), $this->args ), $entry_header );
						}

						// Excerpt.
						if ( in_array( 'excerpt', $this->args['show'] ) ) {
							$excerpt = get_the_excerpt( $post );
							if ( 'bg' === $this->args['image_location'] ) {
								$excerpt = wp_strip_all_tags( $excerpt );
							}
							$entry_content .= $excerpt;
						}

						// Content.
						if ( in_array( 'content', $this->args['show'] ) ) {
							$content = strip_shortcodes( get_the_content() );
							if ( 'bg' === $this->args['image_location'] ) {
								$content = wp_strip_all_tags( $content );
							}
							$entry_content .= $content;
						}

						// Limit content. Empty string is sanitized to zero.
						if ( $this->args['content_limit'] > 0 ) {
							// Reset the variable while trimming the content. wp_trim_words runs wp_strip_all_tags so we need to do this before re-processing.
							$entry_content = wp_trim_words( $entry_content, $this->args['content_limit'], '&hellip;' );
						}

						// Process excerpt.
						if ( in_array( 'excerpt', $this->args['show'] ) ) {
							$entry_content = $this->get_processed_excerpt( $entry_content );
						}

						// Process content.
						if ( in_array( 'content', $this->args['show'] ) ) {
							$entry_content = $this->get_processed_content( $entry_content );
						}

						// Price.
						if ( in_array( 'price', $this->args['show'] ) ) {
							ob_start();
							woocommerce_template_loop_price();
							$entry_content .= ob_get_clean();
						}

						// Image. This runs at the end because the image was getting stripped content_limit was too low.
						if ( 'before_content' === $this->args['image_location'] ) {
							$entry_content = $image_html . $entry_content;
						}

						// Add filter to the entry content, before more link.
						$entry_content = apply_filters( 'mai_flex_entry_content', $entry_content, $this->args, $this->original_args );

						// More link.
						if ( $this->args['link'] && in_array( 'more_link', $this->args['show'] ) ) {
							$more_link_atts = array();
							if ( $this->args['target'] ) {
								$more_link_atts['target'] = $this->args['target'];
							}
							if ( $this->args['rel'] ) {
								$more_link_atts['rel'] = $this->args['rel'];
							}
							$entry_content .= mai_get_read_more_link( $post, $this->args['more_link_text'], 'post', $more_link_atts );
						}

						// Add to cart link.
						if ( $this->args['link'] && in_array( 'add_to_cart', $this->args['show'] ) ) {
							$entry_content .= $this->get_add_to_cart_link();
						}

						// Add entry content wrap if we have content.
						if ( $entry_content ) {
							$html .= sprintf( '<div %s>%s</div>', genesis_attr( 'entry-content', array(), $this->args ), $entry_content );
						}

						// Meta.
						if ( in_array( 'meta', $this->args['show'] ) ) {
							$entry_meta   = mai_get_the_posts_meta( get_the_ID() );
							$entry_meta   = apply_filters( 'mai_flex_entry_meta', $entry_meta, $this->args, $this->original_args );
							$entry_footer = $entry_meta ? sprintf( '<p class="entry-meta">%s</p>', do_shortcode( $entry_meta ) ) : '';
						}

						// Add filter to the entry footer.
						$entry_footer = apply_filters( 'mai_flex_entry_footer', $entry_footer, $this->args, $this->original_args );

						// Entry footer.
						if ( $entry_footer ) {
							$html .= sprintf( '<footer %s>%s</footer>', genesis_attr( 'entry-footer', array(), $this->args ), $entry_footer );
						}

						// Image.
						if ( ( 'bg' == $this->args['image_location'] ) && $this->args['link'] ) {
							$more_link_atts = array();
							if ( $this->args['target'] ) {
								$more_link_atts['target'] = $this->args['target'];
							}
							if ( $this->args['rel'] ) {
								$more_link_atts['rel'] = $this->args['rel'];
							}
							$html .= mai_get_bg_image_link( $url, get_the_title(), $more_link_atts );
						}

					$html .= $this->get_entry_wrap_close();

				endwhile;

				// Clear duplicate IDs.
				$this::$existing_post_ids = array_unique( $this::$existing_post_ids );

			$html .= $this->get_row_wrap_close();
		}

		// No posts.
		else {
			$no_results = $no_results_open = $no_results_close = '';
			if ( $this->facetwp ) {
				$no_results_open  = '<div class="facetwp-template">';
				$no_results_close = '</div>';
			}
			$no_results = $no_results_open . wpautop( $this->args['no_content_message'] ) . $no_results_close;
			/**
			 * Filter content to display if no posts match the current query.
			 *
			 * @param string $no_posts_message Content to display, returned via {@see wpautop()}.
			 */
			$html = apply_filters( 'mai_grid_no_results', $no_results );
		}

		wp_reset_postdata();
		return $html;
	}

	/**
	 * Get the grid terms loop.
	 *
	 * @return  string|HTML
	 */
	function get_terms() {

		// Set up initial query for terms.
		$query_args = array(
			'hide_empty' => $this->args['hide_empty'],
			'number'     => $this->get_number(),
			'taxonomy'   => $this->args['content'],
		);

		// Exclude.
		if ( ! empty( $this->args['exclude'] ) ) {
			$query_args['exclude_tree'] = $this->args['exclude'];
		}

		// Exclude existing.
		if ( $this->args['exclude_displayed'] && ! empty( $this::$existing_term_ids ) ) {
			if ( isset( $query_args['exclude_tree'] ) ) {
				$query_args['exclude_tree'] = array_push( $query_args['exclude_tree'], $this::$existing_term_ids );
			} else {
				$query_args['exclude_tree'] = $this::$existing_term_ids;
			}
		}

		// Terms IDs,
		if ( ! empty( $this->args['ids'] ) ) {
			$query_args['include'] = $this->args['ids'];
		}

		// Order.
		if ( ! empty( $this->args['order'] ) ) {
			$query_args['order'] = $this->args['order'];
		}

		// Orderby.
		if ( ! empty( $this->args['order_by'] ) ) {
			$query_args['orderby'] = $this->args['order_by'];
		}

		// Meta key (for ordering).
		if ( ! empty( $this->args['meta_key'] ) ) {
			$query_args['meta_key'] = $this->args['meta_key'];
		}

		// Meta value (for simple meta queries).
		if ( ! empty( $this->args['meta_value'] ) ) {
			$query_args['meta_value'] = $this->args['meta_value'];
		}

		// Offset. Empty string is sanitized to zero.
		if ( $this->args['offset'] > 0 ) {
			$query_args['offset'] = $this->args['offset'];
		}

		// If post parent attribute, set up parent. Can't check empty() cause may pass 0 or '0';
		if ( '' !== $this->args['parent'] ) {
			if ( ( is_category() || is_tag() || is_tax() ) && 'current' === $this->args['parent'] ) {
				$query_args['parent'] = get_queried_object_id();
			} elseif ( is_numeric( $this->args['parent'] ) ) {
				$query_args['parent'] = intval( $this->args['parent'] );
			} elseif ( is_string( $this->args['parent'] ) ) {
				$parent_term = get_term_by( 'slug', $this->args['parent'], $this->args['content'][0] );
				if ( $parent_term ) {
					$query_args['parent'] = intval( $parent_term->term_id );
				}
			}
		}

		/**
		 * Filter the arguments passed to WP_Query.
		 *
		 * @since   1.3.3
		 *
		 * @param   array  $query_args     Parsed arguments to pass to WP_Query.
		 * @param   array  $args           The current grid args.
		 * @param   array  $original_args  The original grid args.
		 *
		 * @return  array  The args.
		 */
		$query_args = apply_filters( 'mai_grid_query_args', $query_args, $this->args, $this->original_args );

		// Get our query.
		$terms = get_terms( $query_args );

		// If terms and not an error.
		if ( $terms && ! is_wp_error( $terms ) ) {

			// Get it started.
			$html = '';

			$html .= $this->get_grid_title();

			$html .= $this->get_row_open();

				// Loop through terms.
				foreach ( $terms as $term ) {

					// Add this term to the existing term IDs.
					$this::$existing_term_ids[] = $term->term_id;

					$image_html = $entry_header = $entry_content = $entry_footer = $image_id = '';

					// Get image vars.
					$do_image = $has_bg_image = false;

					// If showing image, set some helper variables.
					if ( in_array( 'image', $this->args['show'] ) ) {
						$image_id = $this->get_image_id( $term->term_id );
						if ( $image_id ) {
							$do_image = true;
							if ( $this->is_bg_image() ) {
								$has_bg_image = true;
							}
						}
					}

					// Opening wrap.
					$html .= $this->get_entry_open( $term, $has_bg_image );

						// Set url as a variable.
						$url = $this->get_entry_link( $term );

						// Build the image html.
						if ( $do_image ) {

							$image_html = $this->get_image_html( $image_id, $url, esc_attr( $term->name ) );

							if ( $has_bg_image ) {
								$html .= $image_html;
							}
						}

						// Overlay.
						if ( mai_is_valid_overlay( $this->args['overlay'] ) ) {
							$html .= mai_get_overlay_html( $this->args['overlay'] );
						}

						// Image.
						if ( 'before_entry' === $this->args['image_location'] ) {
							$html .= $image_html;
						}

						// Build entry header.
						if ( $this->is_entry_header_image() || in_array( 'title', $this->args['show'] ) ) {

							// Image.
							if ( 'before_title' === $this->args['image_location'] ) {
								$entry_header .= $image_html;
							}

							// Title.
							if ( in_array( 'title', $this->args['show'] ) ) {
								if ( $this->args['link'] ) {
									$title = sprintf( '<a href="%s" title="%s"%s%s>%s</a>', $url, esc_attr( $term->name ), $this->get_target(), $this->get_rel(), $term->name );
								} else {
									$title = $term->name;
								}
								$entry_header .= sprintf( '<%s %s>%s</%s>', $this->args['title_wrap'], genesis_attr( 'entry-title', array(), $this->args ), $title, $this->args['title_wrap'] );
							}

							// Image.
							if ( 'after_title' === $this->args['image_location'] ) {
								$entry_header .= $image_html;
							}

						}

						// Add filter to the entry header.
						$entry_header = apply_filters( 'mai_flex_entry_header', $entry_header, $this->args, $this->original_args );

						// Add entry header wrap if we have content.
						if ( $entry_header ) {
							$html .= sprintf( '<header %s>%s</header>', genesis_attr( 'entry-header', array(), $this->args ), $entry_header );
						}

						// Excerpt/Content.
						if ( in_array( 'excerpt', $this->args['show'] ) || in_array( 'content', $this->args['show'] ) ) {
							$content = strip_shortcodes( term_description( $term->term_id, $term->taxonomy ) );
							if ( 'bg' === $this->args['image_location'] ) {
								$content = wp_strip_all_tags( $content );
							}
							$entry_content .= $content;
						}

						// Limit content. Empty string is sanitized to zero.
						if ( $this->args['content_limit'] > 0 ) {
							// Reset the variable while trimming the content. wp_trim_words runs wp_strip_all_tags so we need to do this before re-processing.
							$entry_content = wp_trim_words( $entry_content, $this->args['content_limit'], '&hellip;' );
						}

						// Process excerpt.
						if ( in_array( 'excerpt', $this->args['show'] ) ) {
							$entry_content = $this->get_processed_excerpt( $entry_content );
						}

						// Process content.
						if ( in_array( 'content', $this->args['show'] ) ) {
							$entry_content = $this->get_processed_content( $entry_content );
						}

						// Image. This runs at the end because the image was getting stripped content_limit was too low.
						if ( 'before_content' === $this->args['image_location'] ) {
							$entry_content = $image_html . $entry_content;
						}

						// Add filter to the entry content, before more link.
						$entry_content = apply_filters( 'mai_flex_entry_content', $entry_content, $this->args, $this->original_args );

						// More link.
						if ( $this->args['link'] && in_array( 'more_link', $this->args['show'] ) ) {
							$more_link_atts = array();
							if ( $this->args['target'] ) {
								$more_link_atts['target'] = $this->args['target'];
							}
							if ( $this->args['rel'] ) {
								$more_link_atts['rel'] = $this->args['rel'];
							}
							$entry_content .= mai_get_read_more_link( $term, $this->args['more_link_text'], 'term', $more_link_atts );
						}

						// Add entry content wrap if we have content.
						if ( $entry_content ) {
							$html .= sprintf( '<div %s>%s</div>', genesis_attr( 'entry-content', array(), $this->args ), $entry_content );
						}

						// Add filter to the entry footer.
						$entry_footer = apply_filters( 'mai_flex_entry_footer', $entry_footer, $this->args, $this->original_args );

						// Entry footer.
						if ( $entry_footer ) {
							$html .= sprintf( '<footer %s>%s</footer>', genesis_attr( 'entry-footer', array(), $this->args ), $entry_footer );
						}

						// Image.
						if ( ( 'bg' == $this->args['image_location'] ) && $this->args['link'] ) {
							$more_link_atts = array();
							if ( $this->args['target'] ) {
								$more_link_atts['target'] = $this->args['target'];
							}
							if ( $this->args['rel'] ) {
								$more_link_atts['rel'] = $this->args['rel'];
							}
							$html .= mai_get_bg_image_link( $url, $term->name, $more_link_atts );
						}

					$html .= $this->get_entry_wrap_close();

				}

				// Clear duplicate IDs.
				$this::$existing_term_ids = array_unique( $this::$existing_term_ids );

			$html .= $this->get_row_wrap_close();

		}

		// No terms.
		else {
			$no_results = $no_results_open = $no_results_close = '';
			if ( $this->facetwp ) {
				$no_results_open  = '<div class="facetwp-template">';
				$no_results_close = '</div>';
			}
			$no_results = $no_results_open . wpautop( $this->args['no_content_message'] ) . $no_results_close;
			/**
			 * Filter content to display if no terms match the current query.
			 *
			 * @param string $no_posts_message Content to display, returned via {@see wpautop()}.
			 */
			$html = apply_filters( 'mai_grid_no_results', $no_results );
		}

		return $html;
	}

	/**
	 * Get the grid title.
	 *
	 * @return  string|HTML
	 */
	function get_grid_title() {
		// Bail if no title
		if ( empty( $this->args['grid_title'] ) ) {
			return;
		}
		$classes = 'heading';
		$classes = mai_add_classes( $this->args['grid_title_class'], $classes );
		return sprintf( '<%s class="%s">%s</%s>', $this->args['grid_title_wrap'], trim($classes), $this->args['grid_title'], $this->args['grid_title_wrap'] );
	}

	/**
	 * Get the content type.
	 *
	 * @return  string|false
	 */
	function get_content_type() {
		// If we already have a value.
		if ( ! empty( $this->args['content_type'] ) ) {
			return $this->args['content_type'];
		}
		// If types are all post types. get_post_type() gets all built in and custom post types.
		if ( array_intersect( $this->args['content'], get_post_types() ) == $this->args['content'] ) {
			return 'post'; // Means any post_type
		}
		// Get public taxonomies.
		$taxos = get_taxonomies( array(
			'public' => true,
		), 'names' );
		// If types are all taxonomies.
		if ( array_intersect( $this->args['content'], $taxos ) == $this->args['content'] ) {
			return 'term';
		}
		// Nada.
		return false;
	}

	/**
	 * Get the grid row opening HTML.
	 *
	 * @return  string|HTML
	 */
	function get_row_open() {

		// Row attributes.
		$attributes = array(
			'class' => mai_add_classes( $this->args['row_class'], 'row' ),
		);

		// If slider.
		if ( $this->args['slider'] ) {

			// Enqueue Slick Carousel.
			wp_enqueue_script( 'mai-slick' );
			wp_enqueue_script( 'mai-slick-init' );

			// Adaptive height requires align middle. Force it.
			if ( $this->args['adaptiveheight'] ) {
				// If align param, this takes precendence.
				if ( $this->args['align'] ) {
					$remove = array( 'top', 'bottom' );
					$this->args['align'] = array_diff( $this->args['align'], $remove );
				}
				// No align param.
				elseif ( $this->args['align_text'] ) {
					// Add horizontal text align classes here since it doesn't work the typical way with adaptive height.
					if ( in_array( 'left', $this->args['align_text'] ) ) {
						$attributes['class'] = mai_add_classes( 'text-xs-left', $attributes['class'] );
					} elseif ( in_array( 'center', $this->args['align_text'] ) ) {
						$attributes['class'] = mai_add_classes( 'text-xs-center', $attributes['class'] );
					} elseif ( in_array( 'right', $this->args['align_text'] ) ) {
						$attributes['class'] = mai_add_classes( 'text-xs-right', $attributes['class'] );
					}
				}
				// Force values.
				if ( ! in_array( 'middle', $this->args['align'] ) ) {
					$this->args['align'][] = 'middle';
				}
				$this->args['align_cols'] = array();
				$this->args['align_text'] = array();
			}

			// Slider wrapper class.
			$attributes['class'] = mai_add_classes( 'mai-slider', $attributes['class'] );

			// Slider HTML data attributes.
			$attributes = $this->add_slider_data_attributes( $attributes );
		}
		// Not on slider.
		else {

			// Add gutter class.
			$attributes['class'] = mai_add_classes( mai_get_gutter_class( $this->args['gutter'] ), $attributes['class'] );

			// Add row align classes.
			$attributes['class'] = mai_add_row_align_classes( $attributes['class'], $this->args );
		}

		// FacetWP.
		if ( $this->args['facetwp'] ) {
			$attributes['class'] = mai_add_classes( 'facetwp-template', $attributes['class'] );
		}

		// WooCommerce.
		if ( class_exists( 'WooCommerce' ) && in_array( 'product', $this->args['content'] ) ) {
			$attributes['class'] .= ' woocommerce';
		}

		// Bring it home.
		return sprintf( '<div %s>', genesis_attr( 'flex-row', $attributes, $this->args ) );
	}

	/**
	 * Get the grid row closing HTML.
	 *
	 * @return  string|HTML
	 */
	function get_row_wrap_close() {
		return '</div>';
	}

	/**
	 * Get the grid entry opening HTML.
	 *
	 * @return  string|HTML
	 */
	function get_entry_open( $object, $has_bg_image ) {

		$aspect_html = '';

		// Set the entry classes.
		$attributes = array(
			'class' => mai_add_classes( $this->get_entry_classes() ),
		);

		// Get the align classes.
		if ( $this->is_bg_image() ) {
			// Build aspect ratio inner markup. Can't be flex container or breaks in older Edge (<=16) (18 is current at this time) / FF (<=59) (66 is current at this time).
			$aspect_attributes          = array( 'class' => 'aspect-inner' );
			$aspect_attributes['class'] = mai_add_entry_align_classes( $aspect_attributes['class'], $this->args, $this->get_direction() );
			$aspect_html                = sprintf( '<div class="aspect-outer"><div %s>', genesis_attr( 'aspect-inner', $aspect_attributes, $this->args ) );
		} else {
			$attributes['class'] = mai_add_entry_align_classes( $attributes['class'], $this->args, $this->get_direction() );
		}

		$light_content = false;

		if ( $this->is_bg_image() ) {

			// Get sizes.
			if ( ! ( $this->aspect_width && $this->aspect_height ) ) {
				$sizes = mai_get_image_width_height( $this->args['image_size'] );
				$this->aspect_width  = $sizes[0];
				$this->aspect_height = $sizes[1];
			}

			// Add aspect ratio data attributes.
			$attributes = mai_add_aspect_ratio_attributes( $attributes, $this->aspect_width, $this->aspect_height );

			// Get the object ID.
			$object_id = $this->get_object_id( $object );

			if ( $object_id ) {

				// Don't pass image ID if we're not showing it.
				$image_id = $has_bg_image ? $this->get_image_id( $object_id ) : false;

				if ( $has_bg_image ) {

					$attributes['class'] .= ' has-bg-image';

					// Set dark overlay if we don't have one.
					$this->args['overlay'] = empty( $this->args['overlay'] ) ? 'dark' : $this->args['overlay'];

					// If we don't have a light overlay, content is light.
					if ( 'light' !== $this->args['overlay'] ) {
						$light_content = true;
					}
				}
			}

			if ( $this->has_bg_link() ) {

				// Add has-bg-link class.
				$attributes['class'] .= ' has-bg-link';
			}

		}

		if ( mai_is_valid_overlay( $this->args['overlay'] ) ) {

			// If we have a dark overlay, content is light.
			if ( 'dark' === $this->args['overlay'] ) {
				$light_content = true;
			}

			// Add has-overlay class to the entry.
			$attributes['class'] = mai_add_classes( 'has-overlay', $attributes['class'] );
		}

		// Shade class
		$attributes['class'] .= $light_content ? ' light-content' : '';

		/**
		 * Main entry col wrap.
		 * If we use genesis_attr( 'entry' ) then it resets the classes.
		 */
		return sprintf( '<div %s>%s', genesis_attr( 'flex-entry', $attributes, $this->args ), $aspect_html );
	}

	/**
	 * Get the grid entry closing HTML.
	 *
	 * @return  string|HTML
	 */
	function get_entry_wrap_close() {
		$aspect_html = $this->is_bg_image() ? '</div></div>' : '';
		return sprintf( '%s</div>', $aspect_html );
	}

	/**
	 * Add slider data attributes to the attributes array.
	 *
	 * @param   array  $attributes  The existing attributes array.
	 *
	 * @return  array  The modified $attributes.
	 */
	function add_slider_data_attributes( $attributes ) {
		$attributes['data-adaptiveheight'] = $this->args['adaptiveheight'] ? 'true' : 'false';
		$attributes['data-arrows']         = $this->args['arrows'] ? 'true' : 'false';
		$attributes['data-autoplay']       = $this->args['autoplay'] ? 'true' : 'false';
		$attributes['data-center']         = in_array( 'center', $this->args['align'] ) ? 'true' : 'false';
		$attributes['data-centermode']     = $this->args['center_mode'] ? 'true' : 'false';
		$attributes['data-dots']           = $this->args['dots'] ? 'true' : 'false';
		$attributes['data-fade']           = $this->args['fade'] ? 'true' : 'false';
		$attributes['data-infinite']       = $this->args['infinite'] ? 'true' : 'false';
		$attributes['data-middle']         = in_array( 'middle', $this->args['align'] ) ? 'true' : 'false';
		$attributes['data-slidestoscroll'] = $this->args['slidestoscroll'];
		$attributes['data-slidestoshow']   = $this->args['columns'];
		$attributes['data-speed']          = $this->args['speed'];
		$attributes['data-gutter']         = mai_get_gutter_size( $this->args['gutter'] );
		return $attributes;
	}

	/**
	 * Get default slidestoscroll.
	 * First check slidestoscroll, then columns, then fallback to default.
	 *
	 * Can't use $this->args cause not set yet. This is for defaults.
	 *
	 * @param   array  $args  The initial grid args.
	 *
	 * @return  string|int  The amount of slides to scroll. Sanitized later.
	 */
	function get_slidestoscroll_default( $args ) {
		$slidestoscroll = 3;
		if ( isset( $args['slidestoscroll'] ) ) {
			$slidestoscroll = $args['slidestoscroll'];
		} elseif ( isset( $args['columns'] ) ) {
			$slidestoscroll = $args['columns'];
		}
		return $slidestoscroll;
	}

	/**
	 * Get the flex entry classes.
	 *
	 * @return  string  The HTML ready classes.
	 */
	function get_entry_classes() {

		// We need classes to be an array so we can use them in get_post_class().
		$classes = array( 'flex-entry', 'entry' );

		// If not a slider.
		if ( ! $this->args['slider'] ) {
			// Add Flexington columns.
			$classes[] = 'col';
			$classes   = array_merge( $classes, mai_get_col_classes_by_breaks( $this->args, mai_get_size_by_columns( $this->args['columns'] ), $return = 'array' ) );
		} else {
			// Add slide class.
			$classes[] = 'mai-slide';
		}

		// If image is not aligned.
		if ( mai_is_valid_image_align( $this->args['image_align'] ) ) {
			$classes[] = 'has-image-' . $this->args['image_align'];
		}

		// Add top margin classes.
		if ( mai_is_valid_top( $this->args['top'] ) ) {
			$top = mai_get_top_class( $this->args['top'] );
			if ( $top ) {
				$classes[] = $top;
			}
		}

		// Add bottom margin classes.
		if ( mai_is_valid_bottom( $this->args['bottom'] ) ) {
			$bottom = mai_get_bottom_class( $this->args['bottom'] );
			if ( $bottom ) {
				$classes[] = $bottom;
			}
		}

		// Add any custom classes.
		if ( $this->args['entry_class'] ) {
			$classes = array_merge( $classes, explode( ' ', $this->args['entry_class'] ) );
		}

		// If dealing with a post object.
		if ( 'post' === $this->content_type ) {

			/**
			 * Merge our new classes with the default WP generated classes.
			 * Also removes potential duplicate flex-entry since we need it even if slider.
			 */
			$classes = get_post_class( $classes, get_the_ID() );
		}

		// Remove boxed class if boxed param is false. It may be added regardless because of post_class filter.
		if ( ! $this->args['boxed'] ) {
			$classes = array_diff( $classes, array( 'boxed' ) );
		} else {
			$classes[] = 'boxed';
		}

		// Remove duplicates and sanitize.
		$classes = array_map( 'sanitize_html_class', array_unique( $classes ) );

		// Turn array into a string of space separated classes.
		return implode( ' ', $classes );
	}

	/**
	 * Get the flex direction.
	 * Used by the align functions.
	 *
	 * @return  string  'columns' or 'row'.
	 */
	function get_direction() {
		if ( $this->is_vertically_aligned() ) {
			return 'column';
		}
		return 'row';
	}

	/**
	 * Check if column is vertically aligned.
	 * True if we have a bg image, or no aligned image, or text is vertically aligned.
	 *
	 * @return  bool
	 */
	function is_vertically_aligned() {
		return 'bg' === $this->args['image_location'] || ( 'center' === $this->args['image_align'] ) || ! in_array( $this->args['image_align'], array( 'left', 'right' ) ) || array_intersect( array( 'top', 'middle', 'bottom' ), $this->args['align_text'] );
	}

	/**
	 * Get the ID from an object.
	 *
	 * @param   object     The object to get the id from.
	 *
	 * @return  int|false  The object ID, or false if not a valid content type.
	 */
	function get_object_id( $object ) {
		switch ( $this->content_type ) {
			case 'post':
				$id = $object->ID;
			break;
			case 'term':
				$id = $object->term_id;
			break;
			case 'user':
				$id = $object->ID;
			break;
			default:
				$id = false;
		}
		return $id;
	}

	/**
	 * Get a link for a given entry.
	 *
	 * @param   object|int  $object_or_id  The object or object ID, either from $post, $term, or $user.
	 *
	 * @return  int|string  The image ID or empty string.
	 */
	function get_entry_link( $object_or_id ) {
		switch ( $this->content_type ) {
			case 'post':
				$link = get_permalink( $object_or_id );
			break;
			case 'term':
				$link = get_term_link( $object_or_id );
			break;
			default:
				$link = '';
		}
		return $link;
	}

	/**
	 * Get the target HTML for links.
	 *
	 * @return  string  The link target or empty string.
	 */
	function get_target() {
		return ! empty( $this->args['target'] ) ? sprintf( ' target="%s"', $this->args['target'] ) : '';
	}

	/**
	 * Get the rel HTML for links.
	 *
	 * @return  string  The link rel or empty string.
	 */
	function get_rel() {
		return ! empty( $this->args['rel'] ) ? sprintf( ' rel="%s"', $this->args['rel'] ) : '';
	}

	/**
	 * Get the add to cart link with screen reader text.
	 *
	 * @return  string|HTML
	 */
	function get_add_to_cart_link() {
		$link = '';
		if ( class_exists( 'WooCommerce' ) ) {
			ob_start();
			woocommerce_template_loop_add_to_cart();
			$link = ob_get_clean();
		}
		return $link ? sprintf( '<p class="more-link-wrap">%s</p>', $link ) : '';
	}

	/**
	 * Get a type of content main image ID.
	 * Needs to be used in the loop, so it can get the correct content type ID.
	 *
	 * @param   int   $object_id   The object ID, either $post_id, $term_id, or $user_id. Can't be object if term, so safer to always use ID.
	 *
	 * @return  int  The image ID.
	 */
	function get_image_id( $object_id ) {
		switch ( $this->content_type ) {
			case 'post':
				$image_id = get_post_thumbnail_id( $object_id );
			break;
			case 'term':
				$key      = ( class_exists( 'WooCommerce' ) && in_array( 'product_cat', $this->args['content'] ) ) ? 'thumbnail_id' : 'banner_id';
				$image_id = get_term_meta( $object_id, $key, true );
			break;
			case 'user':
				$image_id = get_user_meta( $object_id, 'banner_id', true ); // Not used yet.
			break;
			default:
				$image_id = '';
		}
		return $image_id;
	}

	/**
	 * Whether the main entry element should be a link or not.
	 *
	 * @return  bool
	 */
	function has_bg_link() {
		if ( $this->is_bg_image() && $this->args['link'] ) {
			return true;
		}
		return false;
	}

	/**
	 * If the grid is set to show image as a background.
	 *
	 * @return  bool
	 */
	function is_bg_image() {
		if ( 'bg' === $this->args['image_location'] ) {
			return true;
		}
		return false;
	}

	/**
	 * If image location is in the header.
	 *
	 * @return  bool
	 */
	function is_entry_header_image() {
		switch ( $this->args['image_location'] ) {
			case 'before_title':
			case 'after_title':
				$return = true;
			break;
			default:
				$return = false;
		}
		return $return;
	}

	/**
	 * Build the image HTML with location/align classes.
	 *
	 * @param   int     $image_id   The image ID.
	 * @param   string  $url        The url to link to, if 'link' param is true.
	 * @param   string  $att_title  The title to be used as the wrapping element attribute.
	 *
	 * @return  string}HTML  The image HTML.
	 */
	function get_image_html( $image_id, $url, $att_title ) {
		$has_bg_image  = ( 'bg' === $this->args['image_location'] );
		$image_classes = 'wp-post-image';
		$image_classes = $has_bg_image ? $image_classes . ' bg-image' : $image_classes;
		// add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		$image         = wp_get_attachment_image( $image_id, $this->args['image_size'], false, array( 'class' => $image_classes ) );
		// remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		// $image         = wp_image_add_srcset_and_sizes( $image, wp_get_attachment_metadata( $image_id ), $image_id );
		$sources       = mai_get_picture_sources( $image_id, $this->args['image_size'] );
		$picture_atts  = $has_bg_image ? ' class="bg-picture"' : '';
		$image         = sprintf( '<picture%s>%s%s</picture>', $picture_atts, $sources, $image );

		if ( $has_bg_image ) {
			return $image;
		}

		$attributes    = array();
		// Add the default class and add location as a class to the image link.
		$attributes['class'] = 'entry-image-link';
		if ( $this->args['image_location'] ) {
			$attributes['class'] .= sprintf( ' entry-image-%s', str_replace( '_', '-', $this->args['image_location'] ) );
		}
		if ( mai_is_valid_image_align( $this->args['image_align'] ) ) {
			switch ( $this->args['image_align'] ) {
				case 'left':
					$attributes['class'] .= ' alignleft';
				break;
				case 'center':
					$attributes['class'] .= ' aligncenter';
				break;
				case 'right':
					$attributes['class'] .= ' alignright';
				break;
			}
		} elseif ( $has_bg_image ) {
			// $attributes['class'] .= ' bg-image';
		} else {
			$attributes['class'] .= ' alignnone';
		}
		$attributes['title'] = $att_title;
		if ( $this->args['link'] ) {
			$attributes['href'] = $url;
			if ( $this->args['target'] ) {
				$attributes['target'] = $this->args['target'];
			}
			if ( $this->args['rel'] ) {
				$attributes['rel'] = $this->args['rel'];
			}
			$image_wrap = 'a';
		} else {
			$image_wrap = 'span';
		}
		$html = sprintf( '<%s %s>%s</%s>', $image_wrap, genesis_attr( 'flex-entry-image-link', $attributes, $this->args ), $image, $image_wrap );
		return apply_filters( 'mai_entry_image_link', $html, $this->args, $this->original_args );
	}

	/**
	 * Get the number of items to show.
	 * If all, return the appropriate value depending on content type.
	 *
	 * @return  int  The number of items.
	 */
	function get_number() {
		if ( 'all' === $this->args['number'] ) {
			switch ( $this->content_type ) {
				case 'post':
					$number = -1; // wp_query uses -1 for all.
				break;
				case 'term':
					$number = 0;  // get_terms() uses 0 for all.
				break;
				default:
					$number = 100; // Just to be safe, cause we may add user later.
			}
		} else {
			$number = $this->args['number'];
		}
		return intval( $number );
	}

	/**
	 * Get the processed excerpt, in the order WP core does things on the_excerpt filter.
	 *
	 * @since   1.6.2
	 *
	 * @return  string|HTML
	 */
	function get_processed_excerpt( $excerpt ) {
		$excerpt = wptexturize( $excerpt );
		$excerpt = convert_smilies( $excerpt );
		$excerpt = convert_chars( $excerpt );
		$excerpt = wpautop( $excerpt );
		$excerpt = shortcode_unautop( $excerpt );
		return $excerpt;
	}

	/**
	 * Get the processed content, in the order WP core does things on the_content filter.
	 *
	 * @since   1.6.2
	 *
	 * @return  string|HTML
	 */
	function get_processed_content( $content ) {
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );
		$content = wp_make_content_images_responsive( $content );
		return $content;
	}

	/**
	 * Allow FacetWP to work with custom templates and WP_Query.
	 * by checking for a new 'facetwp' => true, parameter in the query.
	 *
	 * @uses    FacetWP
	 *
	 * @param   bool    $is_main_query  boolean  Whether FacetWP should use the current query
	 * @param   object  $query          The WP_Query object
	 *
	 * @return  bool
	 */
	function facetwp_is_main_query( $is_main_query, $query ) {
		if ( $this->facetwp && isset( $query->query_vars['facetwp'] ) ) {
			$is_main_query = true;
		}
		return $is_main_query;
	}

}
