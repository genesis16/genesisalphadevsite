<?php
if ( ! function_exists( 'moments_qodef_get_blog' ) ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function moments_qodef_get_blog( $type ) {

		$sidebar = moments_qodef_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar"   => $sidebar
		);
		moments_qodef_get_module_template_part( 'templates/lists/holder', 'blog', '', $params );
	}

}

if ( ! function_exists( 'moments_qodef_get_blog_type' ) ) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function moments_qodef_get_blog_type( $type ) {

		$blog_query = moments_qodef_get_blog_query();

		$paged = moments_qodef_paged();

		if ( moments_qodef_options()->getOptionValue( 'blog_page_range' ) != "" ) {
			$blog_page_range = esc_attr( moments_qodef_options()->getOptionValue( 'blog_page_range' ) );
		} else {
			$blog_page_range = $blog_query->max_num_pages;
		}
		$blog_classes     = moments_qodef_get_blog_holder_classes( $type );
		$blog_data_params = moments_qodef_set_blog_holder_data_params( $type );

		$params = array(
			'blog_query'       => $blog_query,
			'paged'            => $paged,
			'blog_page_range'  => $blog_page_range,
			'blog_type'        => $type,
			'blog_classes'     => $blog_classes,
			'blog_data_params' => $blog_data_params
		);

		moments_qodef_get_module_template_part( 'templates/lists/' . $type, 'blog', '', $params );
	}

}

if ( ! function_exists( 'moments_qodef_get_blog_holder_classes' ) ) {
	/**
	 * Function set blog holder class
	 *
	 * return string
	 */

	function moments_qodef_get_blog_holder_classes( $type ) {


		$show_load_more = moments_qodef_enable_load_more();

		$blog_classes = array(
			'qodef-blog-holder'
		);

		if ( $show_load_more ) {
			$blog_classes[] = 'qodef-blog-load-more';
		}

		switch ( $type ) {

			case 'standard':
				$blog_classes[] = 'qodef-blog-type-standard';
				break;

			case 'standard-whole-post':
				$blog_classes[] = 'qodef-blog-type-standard-whole-post';
				break;

			default:
				$blog_classes[] = 'qodef-blog-type-standard';
				break;
		}

		if ( $type == 'masonry' || $type == 'masonry-full-width' ) {

			$masonry_columns = moments_qodef_get_meta_field_intersect( 'masonry_columns' );

			switch ( $masonry_columns ) {
				case 'four':
					$blog_classes[] = 'qodef-masonry-four-cols';
					break;
				case 'three':
					$blog_classes[] = 'qodef-masonry-three-cols';
					break;
				case 'two':
					$blog_classes[] = 'qodef-masonry-two-cols';
					break;
			}

		}

		return implode( ' ', $blog_classes );
	}

}

if ( ! function_exists( 'moments_qodef_get_blog_query' ) ) {
	/**
	 * Function which create query for blog lists
	 *
	 * @return wp query object
	 */
	function moments_qodef_get_blog_query() {
		global $wp_query;

		$id       = moments_qodef_get_page_id();
		$category = esc_attr( get_post_meta( $id, "qodef_blog_category_meta", true ) );
		if ( esc_attr( get_post_meta( $id, "qodef_show_posts_per_page_meta", true ) ) != "" ) {
			$post_number = esc_attr( get_post_meta( $id, "qodef_show_posts_per_page_meta", true ) );
		} else {
			$post_number = esc_attr( get_option( 'posts_per_page' ) );
		}

		$paged       = moments_qodef_paged();
		$query_array = array(
			'post_type'      => 'post',
			'paged'          => $paged,
			'cat'            => $category,
			'posts_per_page' => $post_number
		);
		if ( is_archive() ) {
			$blog_query = $wp_query;
		} else {
			$blog_query = new WP_Query( $query_array );
		}

		return $blog_query;

	}
}


if ( ! function_exists( 'moments_qodef_get_post_format_html' ) ) {

	/**
	 * Function which return html for post formats
	 *
	 * @param $type
	 *
	 * @return post hormat template
	 */

	function moments_qodef_get_post_format_html( $type = "", $ajax = '' ) {

		$post_format = get_post_format();

		$supported_post_formats = array( 'audio', 'video', 'link', 'quote', 'gallery' );

		if ( in_array( $post_format, $supported_post_formats ) ) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$params = array();

		$background_image                 = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$params['background_image_style'] = 'background-image: url(' . esc_url( $background_image[0] ) . ')';

		switch ( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				$params['link_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
				break;
			case 'quote':
				$params['quote_text']  = '';
				$params['quote_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

				$quote_text = get_post_meta( get_the_ID(), 'qodef_post_quote_text_meta', true );
				if ( $quote_text && $quote_text !== '' ) {
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}

		$slug = '';
		if ( $type !== "" ) {
			$slug = $type;
		}

		$params['type'] = $slug;

		$chars_array = moments_qodef_blog_lists_number_of_chars();

		if ( isset( $chars_array[ $type ] ) ) {
			$params['excerpt_length'] = $chars_array[ $type ];
		} else {
			$params['excerpt_length'] = '';
		}

		if ( $ajax == '' ) {
			moments_qodef_get_module_template_part( 'templates/lists/post-formats/' . $post_format, 'blog', $slug, $params );
		}
		if ( $ajax == 'yes' ) {
			return moments_qodef_get_blog_module_template_part( 'templates/lists/post-formats/' . $post_format, $slug, $params );
		}


	}

}

if ( ! function_exists( 'moments_qodef_get_default_blog_list' ) ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function moments_qodef_get_default_blog_list() {

		$blog_list = moments_qodef_options()->getOptionValue( 'blog_list_type' );

		return $blog_list;

	}

}


if ( ! function_exists( 'moments_qodef_pagination' ) ) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function moments_qodef_pagination( $pages = '', $range = 4, $paged = 1 ) {

		$showitems = $range + 1;

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}

		$show_load_more = moments_qodef_enable_load_more();

		$search_template = 'no';
		if ( is_search() ) {
			$search_template = 'yes';
		}


		if ( $pages != 1 ) {
			if ( $show_load_more == 'yes' && $search_template !== 'yes' ) {

				echo moments_qodef_get_load_more_button_html();

			} else {

				echo '<div class="qodef-pagination">';
				echo '<ul class="clearfix">';
				if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
					echo '<li class="qodef-pagination-first-page"><a itemprop="url" href="' . esc_url( get_pagenum_link( 1 ) ) . '"><span class="arrow_carrot-left"></span></a></li>';
				}
				echo "<li class='qodef-pagination-prev";
				if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
					echo " qodef-pagination prev-first";
				}
				echo "'><a itemprop='url' href='" . esc_url( get_pagenum_link( $paged - 1 ) ) . "'><span class='arrow_carrot-left'></span></a></li>";

				echo "<li><ul class='qodef-pagination-numbers clearfix'>";
				for ( $i = 1; $i <= $pages; $i ++ ) {
					if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
						$tmp = ( $paged == $i ) ? "<li class='qodef-pagination-page active'><span>" . $i . "</span></li>" : "<li class='qodef-pagination-page'><a itemprop='url' href='" . get_pagenum_link( $i ) . "' class='inactive'>" . $i . "</a></li>";

						echo moments_qodef_get_module_part( $tmp );
					}
				}
				echo "</ul></li>";

				echo '<li class="qodef-pagination-next';
				if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
					echo ' qodef-pagination-next-last';
				}
				echo '"><a itemprop="url" href="';
				if ( $pages > $paged ) {
					echo esc_url( get_pagenum_link( $paged + 1 ) );
				} else {
					echo esc_url( get_pagenum_link( $paged ) );
				}
				echo '"><span class="arrow_carrot-right"></span></a></li>';
				if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
					echo '<li class="qodef-pagination-last-page"><a itemprop="url" href="' . esc_url( get_pagenum_link( $pages ) ) . '"><span class="arrow_carrot-right"></span></a></li>';
				}
				echo '</ul>';
				echo "</div>";
			}
		}
	}
}

if ( ! function_exists( 'moments_qodef_post_info' ) ) {
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function moments_qodef_post_info( $config ) {
		$default_config = array(
			'date'     => '',
			'category' => '',
			'author'   => '',
			'comments' => '',
			'like'     => '',
			'share'    => ''
		);

		extract( shortcode_atts( $default_config, $config ) );

		if ( $date == 'yes' ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-date', 'blog' );
		}
		if ( $category == 'yes' ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-category', 'blog' );
		}
		if ( $author == 'yes' ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-author', 'blog' );
		}
		if ( $share == 'yes' ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-share', 'blog' );
		}
		if ( $comments == 'yes' && comments_open() ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-comments', 'blog' );
		}
		if ( $like == 'yes' ) {
			moments_qodef_get_module_template_part( 'templates/parts/post-info-like', 'blog' );
		}
	}
}

if ( ! function_exists( 'moments_qodef_excerpt' ) ) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in qode_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function moments_qodef_excerpt( $excerpt_length = '' ) {
		global $post;

		if ( post_password_required() ) {
			echo get_the_password_form();
		} //does current post has read more tag set?
        elseif ( moments_qodef_post_has_read_more() ) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content( true );
		} //is word count set to something different that 0?
        elseif ( $excerpt_length != '0' ) {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if ( isset( $excerpt_length ) && $excerpt_length != "" ) {
				$word_count = $excerpt_length;

			} elseif ( moments_qodef_options()->getOptionValue( 'number_of_chars' ) != '' ) {
				$word_count = esc_attr( moments_qodef_options()->getOptionValue( 'number_of_chars' ) );
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags( $post->post_content );

			//remove leading dots if those exists
			$clean_excerpt = strlen( $post_excerpt ) && strpos( $post_excerpt, '...' ) ? strstr( $post_excerpt, '...', true ) : $post_excerpt;

			//if clean excerpt has text left
			if ( $clean_excerpt !== '' ) {
				//explode current excerpt to words
				$excerpt_word_array = explode( ' ', $clean_excerpt );

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice( $excerpt_word_array, 0, $word_count );

				//add exerpt postfix
				$excert_postfix = apply_filters( 'moments_qodef_excerpt_postfix', '...' );

				//and finally implode words together
				$excerpt = implode( ' ', $excerpt_word_array ) . $excert_postfix;

				//is excerpt different than empty string?
				if ( $excerpt !== '' ) {
					echo '<p itemprop="description" class="qodef-post-excerpt">' . wp_kses_post( $excerpt ) . '</p>';
				}
			}
		}
	}
}

if ( ! function_exists( 'moments_qodef_get_blog_single' ) ) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function moments_qodef_get_blog_single() {
		$sidebar = moments_qodef_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		moments_qodef_get_module_template_part( 'templates/single/holder', 'blog', '', $params );
	}
}

if ( ! function_exists( 'moments_qodef_get_single_html' ) ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function moments_qodef_get_single_html() {

		$post_format            = get_post_format();
		$supported_post_formats = array( 'audio', 'video', 'link', 'quote', 'gallery' );
		if ( in_array( $post_format, $supported_post_formats ) ) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		//Related posts
		$related_posts_params = array();
		$show_related         = ( moments_qodef_options()->getOptionValue( 'blog_single_related_posts' ) == 'yes' ) ? true : false;
		if ( $show_related ) {
			$hasSidebar            = moments_qodef_sidebar_layout();
			$post_id               = get_the_ID();
			$related_post_number   = ( $hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar' ) ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_params  = array(
				'related_posts' => moments_qodef_get_related_post_type( $post_id, $related_posts_options )
			);
		}
		$params = array();
		switch ( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				$params['link_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
				break;
			case 'quote':
				$params['quote_text']  = '';
				$params['quote_image'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );

				$quote_text = get_post_meta( get_the_ID(), 'qodef_post_quote_text_meta', true );
				if ( $quote_text && $quote_text !== '' ) {
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}

		moments_qodef_get_module_template_part( 'templates/single/post-formats/' . $post_format, 'blog', '', $params );
		moments_qodef_get_module_template_part( 'templates/single/parts/author-info', 'blog' );
		moments_qodef_get_module_template_part( 'templates/single/parts/single-navigation', 'blog' );

		if ( $show_related ) {
			moments_qodef_get_module_template_part( 'templates/single/parts/related-posts', 'blog', '', $related_posts_params );
		}

		comments_template( '', true );

	}

}
if ( ! function_exists( 'moments_qodef_additional_post_items' ) ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function moments_qodef_additional_post_items() {

		if ( has_tag() ) {
			moments_qodef_get_module_template_part( 'templates/single/parts/tags', 'blog' );
		}

		moments_qodef_get_module_template_part( 'templates/parts/post-info-share', 'blog' );

		$args_pages = array(
			'before'      => '<div class="qodef-single-links-pages"><div class="qodef-single-links-pages-inner">',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);

		wp_link_pages( $args_pages );

	}

	add_action( 'moments_qodef_before_blog_article_closed_tag', 'moments_qodef_additional_post_items' );
}


if ( ! function_exists( 'moments_qodef_comment' ) ) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function moments_qodef_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;

		$comment_class = 'qodef-comment clearfix';

		if ( $is_author_comment ) {
			$comment_class .= ' qodef-post-author-comment';
		}

		if ( $is_pingback_comment ) {
			$comment_class .= ' qodef-pingback-comment';
		}

		?>

        <li>
        <div class="<?php echo esc_attr( $comment_class ); ?>">
			<?php if ( ! $is_pingback_comment ) { ?>
                <div class="qodef-comment-image"> <?php echo moments_qodef_kses_img( get_avatar( $comment, 69 ) ); ?> </div>
			<?php } ?>
            <div class="qodef-comment-text">
                <h6 class="qodef-comment-name">
					<?php
					if ( $is_pingback_comment ) {
						esc_html_e( 'Pingback:', 'moments' );
					}
					echo wp_kses_post( get_comment_author_link() );
					if ( $is_author_comment ) { ?>
                        <i class="fa fa-user post-author-comment-icon"></i>
					<?php } ?>
                </h6>
				<?php if ( ! $is_pingback_comment ) { ?>
                    <span class="qodef-comment-date"><?php comment_time( get_option( 'date_format' ) ); ?><?php esc_html_e( 'at', 'moments' ); ?><?php comment_time( get_option( 'time_format' ) ); ?></span>
				<?php } ?>
				<?php if ( ! $is_pingback_comment ) { ?>
                    <div class="qodef-text-holder" id="comment-<?php comment_ID(); ?>">
						<?php comment_text(); ?>
                    </div>
                    <div class="qodef-comment-info clearfix">
                        <div class="qodef-actions">
							<?php
							comment_reply_link( array_merge( $args, array(
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							) ) );
							edit_comment_link();
							?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
		<?php //li tag will be closed by WordPress after looping through child elements
	}
}

if ( ! function_exists( 'moments_qodef_blog_archive_pages_classes' ) ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function moments_qodef_blog_archive_pages_classes( $blog_type ) {

		$classes = array();
		if ( in_array( $blog_type, moments_qodef_blog_full_width_types() ) ) {
			$classes['holder'] = 'qodef-full-width';
			$classes['inner']  = 'qodef-full-width-inner';
		} elseif ( in_array( $blog_type, moments_qodef_blog_grid_types() ) ) {
			$classes['holder'] = 'qodef-container';
			$classes['inner']  = 'qodef-container-inner clearfix';
		}

		return $classes;

	}

}

if ( ! function_exists( 'moments_qodef_blog_full_width_types' ) ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function moments_qodef_blog_full_width_types() {

		$types = array( 'masonry-full-width' );

		return $types;

	}

}

if ( ! function_exists( 'moments_qodef_blog_grid_types' ) ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function moments_qodef_blog_grid_types() {

		$types = array( 'standard', 'standard-whole-post' );

		return $types;

	}

}

if ( ! function_exists( 'moments_qodef_blog_types' ) ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function moments_qodef_blog_types() {

		$types = array_merge( moments_qodef_blog_grid_types(), moments_qodef_blog_full_width_types() );

		return $types;

	}

}

if ( ! function_exists( 'moments_qodef_blog_templates' ) ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function moments_qodef_blog_templates() {

		$templates      = array();
		$grid_templates = moments_qodef_blog_grid_types();
		$full_templates = moments_qodef_blog_full_width_types();
		foreach ( $grid_templates as $grid_template ) {
			array_push( $templates, 'blog-' . $grid_template );
		}
		foreach ( $full_templates as $full_template ) {
			array_push( $templates, 'blog-' . $full_template );
		}

		return $templates;

	}

}

if ( ! function_exists( 'moments_qodef_blog_lists_number_of_chars' ) ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function moments_qodef_blog_lists_number_of_chars() {

		$number_of_chars = array();

		if ( moments_qodef_options()->getOptionValue( 'standard_number_of_chars' ) ) {
			$number_of_chars['standard'] = moments_qodef_options()->getOptionValue( 'standard_number_of_chars' );
		}

		return $number_of_chars;

	}

}

if ( ! function_exists( 'moments_qodef_excerpt_length' ) ) {
	/**
	 * Function that changes excerpt length based on theme options
	 *
	 * @param $length int original value
	 *
	 * @return int changed value
	 */
	function moments_qodef_excerpt_length( $length ) {

		if ( moments_qodef_options()->getOptionValue( 'number_of_chars' ) !== '' ) {
			return esc_attr( moments_qodef_options()->getOptionValue( 'number_of_chars' ) );
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'moments_qodef_excerpt_length', 999 );
}

if ( ! function_exists( 'moments_qodef_excerpt_more' ) ) {
	/**
	 * Function that adds three dotes on the end excerpt
	 *
	 * @param $more
	 *
	 * @return string
	 */
	function moments_qodef_excerpt_more( $more ) {
		return '...';
	}

	add_filter( 'excerpt_more', 'moments_qodef_excerpt_more' );
}

if ( ! function_exists( 'moments_qodef_post_has_read_more' ) ) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function moments_qodef_post_has_read_more() {
		global $post;

		return strpos( $post->post_content, '<!--more-->' );
	}
}

if ( ! function_exists( 'moments_qodef_post_has_title' ) ) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function moments_qodef_post_has_title() {
		return get_the_title() !== '';
	}
}

if ( ! function_exists( 'moments_qodef_modify_read_more_link' ) ) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function moments_qodef_modify_read_more_link() {
		$link        = get_permalink() . '#more-' . get_the_ID();
		$type        = 'transparent';
		$text        = esc_html__( 'Continue reading', 'moments' );
		$hover_color = ( moments_qodef_options()->getOptionValue( 'first_color' ) !== "" ) ? moments_qodef_options()->getOptionValue( 'first_color' ) : '#f3ddce';

		$button_html = '<div class="qodef-more-link-container">';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'link'        => $link,
				'type'        => $type,
				'text'        => $text,
				'hover_color' => $hover_color
			) );
		} else {
			$button_html .= '<a itemprop="url" href="' . $link . '" class="qodef-btn qodef-btn-medium qodef-btn-' . $type . ' qodef-btn-custom-hover-color" data-hover-color="' . $hover_color . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</a>';
		}

		$button_html .= '</div>';

		return $button_html;
	}

	add_filter( 'the_content_more_link', 'moments_qodef_modify_read_more_link' );
}


if ( ! function_exists( 'moments_qodef_has_blog_widget' ) ) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function moments_qodef_has_blog_widget() {
		$widgets_array = array(
			'qode_latest_posts_widget'
		);

		foreach ( $widgets_array as $widget ) {
			$active_widget = is_active_widget( false, false, $widget );

			if ( $active_widget ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'moments_qodef_has_blog_shortcode' ) ) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function moments_qodef_has_blog_shortcode() {
		$blog_shortcodes = array(
			'qodef_blog_list',
			'qodef_blog_slider',
			'qodef_blog_carousel'
		);

		$slider_field = get_post_meta( moments_qodef_get_page_id(), 'qodef_page_slider_meta', true ); //TODO change

		foreach ( $blog_shortcodes as $blog_shortcode ) {
			$has_shortcode = moments_qodef_has_shortcode( $blog_shortcode ) || moments_qodef_has_shortcode( $blog_shortcode, $slider_field );

			if ( $has_shortcode ) {
				return true;
			}
		}

		return false;
	}
}


if ( ! function_exists( 'moments_qodef_load_blog_assets' ) ) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @return bool
	 * @see moments_qodef_is_ajax_enabled_is_blog_template()
	 * @see is_home()
	 * @see is_single()
	 * @see qode_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see qode_has_blog_widget()
	 * @see moments_qodef_is_ajax_enabled()
	 */
	function moments_qodef_load_blog_assets() {
		return moments_qodef_is_ajax_enabled() || moments_qodef_is_blog_template() || is_home() || is_single() || moments_qodef_has_blog_shortcode() || is_archive() || is_search() || moments_qodef_has_blog_widget();
	}
}

if ( ! function_exists( 'moments_qodef_is_blog_template' ) ) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 * @param string current page. Optional parameter.
	 *
	 * @return bool
	 *
	 * @see moments_qodef_get_page_template_name()
	 */
	function moments_qodef_is_blog_template( $current_page = '' ) {

		if ( $current_page == '' ) {
			$current_page = moments_qodef_get_page_template_name();
		}

		$blog_templates = moments_qodef_blog_templates();

		return in_array( $current_page, $blog_templates );
	}
}

if ( ! function_exists( 'moments_qodef_read_more_button' ) ) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function moments_qodef_read_more_button( $option = '', $class = '' ) {
		$button_html = '';

		if ( $option != '' ) {
			$show_read_more_button = moments_qodef_options()->getOptionValue( $option ) == 'yes';
		} else {
			$show_read_more_button = 'yes';
		}

		$type        = 'transparent';
		$link        = get_the_permalink();
		$text        = esc_html__( 'Read more', 'moments' );
		$hover_color = ( moments_qodef_options()->getOptionValue( 'first_color' ) !== "" ) ? moments_qodef_options()->getOptionValue( 'first_color' ) : '#f3ddce';

		if ( $show_read_more_button && ! moments_qodef_post_has_read_more() && ! post_password_required() ) {
			if ( moments_qodef_core_installed() ) {
				$button_html .= moments_qodef_get_button_html( array(
					'link'         => $link,
					'type'         => $type,
					'text'         => $text,
					'custom_class' => $class,
					'hover_color'  => $hover_color
				) );
			} else {
				$button_html .= '<a itemprop="url" href="' . $link . '" class="qodef-btn qodef-btn-medium qodef-btn-' . $type . ' qodef-btn-custom-hover-color ' . $class . '" data-hover-color="' . $hover_color . '">';
				$button_html .= ' <span class="qodef-btn-text">' . $text . '</span>';
				$button_html .= '</a>';
			}
		}

		echo moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_set_blog_holder_data_params' ) ) {
	/**
	 * Function which set data params on blog holder div
	 */
	function moments_qodef_set_blog_holder_data_params( $type ) {

		$show_load_more = moments_qodef_enable_load_more();
		if ( $show_load_more ) {
			$current_query = moments_qodef_get_blog_query();

			$data_params        = array();
			$data_return_string = '';

			$data_params['data-blog-type'] = $type;

			$paged = moments_qodef_paged();

			if ( get_post_meta( get_the_ID(), "qodef_show_posts_per_page_meta", true ) != "" ) {
				$posts_number = get_post_meta( get_the_ID(), "qodef_show_posts_per_page_meta", true );
			} else {
				$posts_number = get_option( 'posts_per_page' );
			}
			$category = get_post_meta( moments_qodef_get_page_id(), 'qodef_blog_category_meta', true );


			//set data params
			$data_params['data-next-page'] = $paged + 1;
			$data_params['data-max-pages'] = $current_query->max_num_pages;

			if ( $posts_number != '' ) {
				$data_params['data-post-number'] = $posts_number;
			}

			if ( $category != '' ) {
				$data_params['data-category'] = $category;
			}

			if ( is_archive() ) {
				if ( is_category() ) {
					$cat_id                               = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if ( is_author() ) {
					$author_id                          = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
				}
				if ( is_tag() ) {
					$current_tag_id                  = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if ( is_date() ) {
					$day   = get_query_var( 'day' );
					$month = get_query_var( 'monthnum' );
					$year  = get_query_var( 'year' );

					$data_params['data-archive-day']   = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year']  = $year;
				}
			}
			if ( is_search() ) {
				$search_query                              = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}

			foreach ( $data_params as $key => $value ) {
				if ( $key !== '' ) {
					$data_return_string .= $key . '= ' . esc_attr( $value ) . ' ';
				}
			}

			return $data_return_string;

		}
	}
}

if ( ! function_exists( 'moments_qodef_enable_load_more' ) ) {
	/**
	 * Function that check if load more is enabled
	 *
	 * return boolean
	 */
	function moments_qodef_enable_load_more() {
		$enable_load_more = false;

		if ( moments_qodef_options()->getOptionValue( 'pagination' ) == 'yes' ) {

			if ( moments_qodef_options()->getOptionValue( 'pagination_type' ) == 'load_more_pagination' ) {

				$enable_load_more = true;

			}

		}

		return $enable_load_more;
	}
}

if ( ! function_exists( 'moments_qodef_set_ajax_url' ) ) {
	/**
	 * load themes ajax functionality
	 *
	 */
	function moments_qodef_set_ajax_url() {
		echo '<script type="application/javascript">var QodefAjaxUrl = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'wp_enqueue_scripts', 'moments_qodef_set_ajax_url' );

}

/**
 * Loads more function for blog posts.
 *
 */
if ( ! function_exists( 'moments_qodef_blog_load_more' ) ) {
	function moments_qodef_blog_load_more() {
		$return_obj       = array();
		$paged            = $post_number = $category = $blog_type = '';
		$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';

		check_ajax_referer( 'qodef_blog_load_more_nonce_' . sanitize_text_field( $_POST['blog_load_more_id'] ), 'blog_load_more_nonce' );

		if ( isset( $_POST['nextPage'] ) ) {
			$paged = $_POST['nextPage'];
		}
		if ( isset( $_POST['number'] ) ) {
			$post_number = $_POST['number'];
		}
		if ( isset( $_POST['category'] ) ) {
			$category = $_POST['category'];
		}
		if ( isset( $_POST['blogType'] ) ) {
			$blog_type = $_POST['blogType'];
		}
		if ( isset( $_POST['archiveCategory'] ) ) {
			$archive_category = $_POST['archiveCategory'];
		}
		if ( isset( $_POST['archiveAuthor'] ) ) {
			$archive_author = $_POST['archiveAuthor'];
		}
		if ( isset( $_POST['archiveTag'] ) ) {
			$archive_tag = $_POST['archiveTag'];
		}
		if ( isset( $_POST['archiveDay'] ) ) {
			$archive_day = $_POST['archiveDay'];
		}
		if ( isset( $_POST['archiveMonth'] ) ) {
			$archive_month = $_POST['archiveMonth'];
		}
		if ( isset( $_POST['archiveYear'] ) ) {
			$archive_year = $_POST['archiveYear'];
		}

		$html = '';

		$query_array = array(
			'post_type'      => 'post',
			'paged'          => $paged,
			'posts_per_page' => $post_number
		);

		if ( $category != '' ) {
			$query_array['cat'] = $category;
		}
		if ( $archive_category != '' ) {
			$query_array['cat'] = $archive_category;
		}
		if ( $archive_author != '' ) {
			$query_array['author'] = $archive_author;
		}
		if ( $archive_tag != '' ) {
			$query_array['tag'] = $archive_tag;
		}
		if ( $archive_day != '' && $archive_month != '' && $archive_year != '' ) {
			$query_array['day']      = $archive_day;
			$query_array['monthnum'] = $archive_month;
			$query_array['year']     = $archive_year;
		}

		$query_results = new \WP_Query( $query_array );

		if ( $query_results->have_posts() ):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$html .= moments_qodef_get_post_format_html( $blog_type, 'yes' );
			endwhile;
		else:
			$html .= '<p>' . esc_html__( 'Sorry, no posts matched your criteria.', 'moments' ) . '</p>';
		endif;

		$return_obj = array(
			'html' => $html,
		);

		echo json_encode( $return_obj );
		exit;
	}
}

add_action( 'wp_ajax_nopriv_moments_qodef_blog_load_more', 'moments_qodef_blog_load_more' );
add_action( 'wp_ajax_moments_qodef_blog_load_more', 'moments_qodef_blog_load_more' );

if ( ! function_exists( 'moments_qodef_get_max_number_of_pages' ) ) {
	/**
	 * Function that return max number of posts/pages for pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function moments_qodef_get_max_number_of_pages() {
		global $wp_query;

		$max_number_of_pages = 10; //default value

		if ( $wp_query ) {
			$max_number_of_pages = $wp_query->max_num_pages;
		}

		return $max_number_of_pages;
	}
}

if ( ! function_exists( 'moments_qodef_get_blog_page_range' ) ) {
	/**
	 * Function that return current page for blog list pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function moments_qodef_get_blog_page_range() {
		global $wp_query;

		if ( moments_qodef_options()->getOptionValue( 'blog_page_range' ) != "" ) {
			$blog_page_range = esc_attr( moments_qodef_options()->getOptionValue( 'blog_page_range' ) );
		} else {
			$blog_page_range = $wp_query->max_num_pages;
		}

		return $blog_page_range;
	}
}

if ( ! function_exists( 'moments_qodef_comment_form_submit_button' ) ) {
	function moments_qodef_comment_form_submit_button( $submit_button ) {
		$button_html = '';

		$type  = 'solid';
		$text  = esc_html__( 'Submit', 'moments' );
		$class = 'submit';

		if ( moments_qodef_core_installed() ) {
			$button_html = moments_qodef_get_button_html( array(
				'html_type'    => 'button',
				'type'         => $type,
				'text'         => $text,
				'custom_class' => $class,
				'custom_attrs' => array(
					'id' => 'submit_comment'
				)
			) );
		} else {
			$button_html = '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-' . $type . ' ' . $class . '" id="submit_comment">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		return $button_html;
	}

	add_filter( 'comment_form_submit_button', 'moments_qodef_comment_form_submit_button' );

}
if ( ! function_exists( 'moments_qodef_get_load_more_button_html' ) ) {
	function moments_qodef_get_load_more_button_html() {
		$link = '#';
		$type = 'solid';
		$text = esc_html( 'Load More', 'moments' );

		$button_html = '<div class= "qodef-load-more-ajax-pagination">';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'link' => $link,
				'type' => $type,
				'text' => $text,
			) );
		} else {
			$button_html .= '<a itemprop="url" href="' . $link . '" class="qodef-btn qodef-btn-medium qodef-btn-' . $type . ' qodef-btn-custom-hover-color">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</a>';
		}

		$unique_id = rand( 1000, 9999 );

		$button_html .= wp_nonce_field( 'qodef_blog_load_more_nonce_' . $unique_id, 'qodef_blog_load_more_nonce_' . $unique_id );
		$button_html .= '</div>';

		return $button_html;
	}
}