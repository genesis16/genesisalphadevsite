<?php

namespace QodeCore\PostTypes\Portfolio\Shortcodes;

use QodeCore\Lib;

/**
 * Class PortfolioList
 * @package QodeCore\CPT\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_portfolio_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Filters For autocomplete param:
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		add_filter( 'vc_autocomplete_qodef_portfolio_list_selected_projects_callback', array(
			&$this,
			'portfolioIdAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		add_filter( 'vc_autocomplete_qodef_portfolio_list_selected_projects_render', array(
			&$this,
			'portfolioIdAutocompleteRender',
		), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

		//Portfolio category filter
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		add_filter( 'vc_autocomplete_qodef_portfolio_list_category_callback', array(
			&$this,
			'portfolioCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter( 'vc_autocomplete_qodef_portfolio_list_category_render', array(
			&$this,
			'portfolioCategoryAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {

			$icons_array = array();
			if ( qode_core_theme_installed() ) {
				$icons_array = \MomentsQodefIconCollections::get_instance()->getVCParamsArray();
			}

			vc_map( array(
					'name'                      => esc_html__( 'Select Portfolio List', 'select-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by SELECT', 'select-core' ),
					'icon'                      => 'icon-wpb-portfolio extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Portfolio List Template', 'select-core' ),
							'param_name'  => 'type',
							'value'       => array(
								esc_html__( 'Standard', 'select-core' ) => 'standard',
								esc_html__( 'Gallery', 'select-core' ) => 'gallery',
								esc_html__( 'Pinterest', 'select-core' ) => 'pinterest'
							),
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Title Tag', 'select-core' ),
							'param_name'  => 'title_tag',
							'value'       => array(
								''   => '',
								esc_html__( 'h2', 'select-core' ) => 'h2',
								esc_html__( 'h3', 'select-core' ) => 'h3',
								esc_html__( 'h4', 'select-core' ) => 'h4',
								esc_html__( 'h5', 'select-core' ) => 'h5',
								esc_html__( 'h6', 'select-core' ) => 'h6',
							),
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Image Proportions', 'select-core' ),
							'param_name'  => 'image_size',
							'value'       => array(
								esc_html__( 'Original', 'select-core' ) => 'full',
								esc_html__( 'Square', 'select-core' ) => 'square',
								esc_html__( 'Landscape', 'select-core' ) => 'landscape',
								esc_html__( 'Portrait', 'select-core' ) => 'portrait'
							),
							'save_always' => true,
							'admin_label' => true,
							'description' => '',
							'dependency'  => array( 'element' => 'type', 'value' => array( 'standard', 'gallery' ) )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Show Load More', 'select-core' ),
							'param_name'  => 'show_load_more',
							'value'       => array(
								esc_html__( 'Yes', 'select-core' ) => 'yes',
								esc_html__( 'No', 'select-core' ) => 'no'
							),
							'save_always' => true,
							'admin_label' => true,
							'description' => esc_html__( 'Default value is Yes', 'select-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Order By', 'select-core' ),
							'param_name'  => 'order_by',
							'value'       => array(
								esc_html__( 'Menu Order', 'select-core' ) => 'menu_order',
								esc_html__( 'Title', 'select-core' ) => 'title',
								esc_html__( 'Date', 'select-core' ) => 'date'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Order', 'select-core' ),
							'param_name'  => 'order',
							'value'       => array(
								esc_html__( 'ASC', 'select-core' ) => 'ASC',
								esc_html__( 'DESC', 'select-core' ) => 'DESC',
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'autocomplete',
							'heading'     => esc_html__( 'One-Category Portfolio List', 'select-core' ),
							'param_name'  => 'category',
							'admin_label' => true,
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'select-core' ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Portfolios Per Page', 'select-core' ),
							'param_name'  => 'number',
							'value'       => '-1',
							'admin_label' => true,
							'description' => esc_html__( '(enter -1 to show all)', 'select-core' ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Number of Columns', 'select-core' ),
							'param_name'  => 'columns',
							'value'       => array(
								''      => '',
								esc_html__( 'One', 'select-core' ) => 'one',
								esc_html__( 'Two', 'select-core' ) => 'two',
								esc_html__( 'Three', 'select-core' ) => 'three',
								esc_html__( 'Four', 'select-core' ) => 'four',
								esc_html__( 'Five', 'select-core' ) => 'five',
								esc_html__( 'Six', 'select-core' ) => 'six'
							),
							'admin_label' => true,
							'description' => esc_html__( 'Default value is Three', 'select-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'standard', 'gallery' ) ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Grid Size', 'select-core' ),
							'param_name'  => 'grid_size',
							'value'       => array(
								esc_html__( 'Default', 'select-core' ) => '',
								esc_html__( '3 Columns Grid', 'select-core' ) => 'three',
								esc_html__( '4 Columns Grid', 'select-core' ) => 'four',
								esc_html__( '5 Columns Grid', 'select-core' ) => 'five'
							),
							'admin_label' => true,
							'description' => esc_html__( 'This option is only for Full Width Page Template', 'select-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'pinterest' ) ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'autocomplete',
							'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'select-core' ),
							'param_name'  => 'selected_projects',
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true,
								// In UI show results except selected. NB! You should manually check values in backend
							),
							'description' => esc_html__( 'Input portfolio ID or portfolio title to see suggestions', 'select-core' ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Enable Category Filter', 'select-core' ),
							'param_name'  => 'filter',
							'value'       => array(
								esc_html__( 'No', 'select-core' ) => 'no',
								esc_html__( 'Yes', 'select-core' ) => 'yes'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => esc_html__( 'Default value is No', 'select-core' ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Filter Order By', 'select-core' ),
							'param_name'  => 'filter_order_by',
							'value'       => array(
								esc_html__( 'Name', 'select-core' ) => 'name',
								esc_html__( 'Count', 'select-core' ) => 'count',
								esc_html__( 'Id', 'select-core' ) => 'id',
								esc_html__( 'Slug', 'select-core' ) => 'slug'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => esc_html__( 'Default value is Name', 'select-core' ),
							'dependency'  => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Query and Layout Options', 'select-core' )
						)
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$args = array(
			'type'              => 'standard',
			'columns'           => 'three',
			'grid_size'         => 'three',
			'image_size'        => 'full',
			'order_by'          => 'date',
			'order'             => 'ASC',
			'number'            => '-1',
			'filter'            => 'no',
			'filter_order_by'   => 'name',
			'category'          => '',
			'selected_projects' => '',
			'show_load_more'    => 'yes',
			'title_tag'         => 'h6',
			'next_page'         => '',
			'portfolio_slider'  => '',
			'next_page'         => '',
			'portfolios_shown'  => ''
		);

		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$query_array             = $this->getQueryArray( $params );
		$query_results           = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;

		$classes                  = $this->getPortfolioClasses( $params );
		$data_atts                = $this->getDataAtts( $params );
		$data_atts                .= 'data-max-num-pages = ' . $query_results->max_num_pages;
		$params['masonry_filter'] = '';

		$html = '';

		if ( $filter == 'yes' && $type == 'pinterest' ) {
			$params['filter_categories'] = $this->getFilterCategories( $params );
			$params['masonry_filter']    = 'qodef-masonry-filter';
			$html                        .= qode_core_get_shortcode_module_template_part( 'portfolio', 'portfolio-filter', '', $params );
		}

		$html .= '<div class = "qodef-portfolio-list-holder-outer ' . $classes . '" ' . $data_atts . '>';

		if ( $filter == 'yes' && ( $type == 'standard' || $type == 'gallery' ) ) {
			$params['filter_categories'] = $this->getFilterCategories( $params );
			$html                        .= qode_core_get_shortcode_module_template_part( 'portfolio', 'portfolio-filter', '', $params );
		}

		$html .= '<div class = "qodef-portfolio-list-holder clearfix" >';
		if ( $type == 'pinterest' ) {
			$html .= '<div class="qodef-portfolio-list-masonry-grid-sizer"></div>';
			$html .= '<div class="qodef-portfolio-list-masonry-grid-gutter"></div>';
		}

		if ( $query_results->have_posts() ):
			while ( $query_results->have_posts() ) : $query_results->the_post();

				$params['current_id']    = get_the_ID();
				$params['thumb_size']    = $this->getImageSize( $params );
				$params['icon_html']     = $this->getPortfolioIconsHtml( $params );
				$params['category_html'] = $this->getItemCategoriesHtml( $params );
				$params['categories']    = $this->getItemCategories( $params );
				$params['item_link']     = $this->getItemLink( $params );

				$html .= qode_core_get_shortcode_module_template_part( 'portfolio', $type, '', $params );

			endwhile;

			$i           = 1;
			$columns_num = 3;
			$columns     = $params['columns'];
			switch ( $columns ):
				case 'one':
					$columns_num = 1;
					break;
				case 'two':
					$columns_num = 2;
					break;
				case 'three':
					$columns_num = 3;
					break;
				case 'four':
					$columns_num = 4;
					break;
				case 'five':
					$columns_num = 5;
					break;
				case 'six':
					$columns_num = 6;
					break;
			endswitch;

			while ( $i <= $columns_num ) {
				$i ++;
				if ( $columns != 1 && ( $type == 'standard' ) ) {
					$html .= "<div class='qodef-filler'></div>\n";
				}
			}

		else:

			$html .= '<p>' . esc_html_e( 'Sorry, no posts matched your criteria.', 'select-core' ) . '</p>';

		endif;
		$html .= '</div>'; //close qodef-portfolio-list-holder
		if ( $show_load_more == 'yes' ) {
			$html .= qode_core_get_shortcode_module_template_part( 'portfolio', 'load-more-template', '', $params );
		}
		wp_reset_postdata();
		$html .= '</div>'; // close qodef-portfolio-list-holder-outer

		return $html;
	}

	/**
	 * Generates portfolio list query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueryArray( $params ) {

		$query_array = array();

		$query_array = array(
			'post_type'      => 'portfolio-item',
			'orderby'        => $params['order_by'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);

		if ( ! empty( $params['category'] ) ) {
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}

		$paged = '';
		if ( empty( $params['next_page'] ) ) {
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			}
		}

		if ( ! empty( $params['next_page'] ) ) {
			$query_array['paged'] = $params['next_page'];

		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	/**
	 * Generates portfolio icons html
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getPortfolioIconsHtml( $params ) {

		$html       = '';
		$id         = $params['current_id'];
		$slug_list_ = 'pretty_photo_gallery';

		$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' ); //original size
		$large_image          = $featured_image_array[0];

		$html .= '<div class="qodef-item-icons-holder">';

		$html .= '<a class="qodef-portfolio-lightbox" title="' . get_the_title( $id ) . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']"></a>';


		if ( function_exists( 'moments_qodef_like_portfolio_list' ) ) {
			$html .= moments_qodef_like_portfolio_list( $id );
		}

		$html .= '<a class="qodef-preview" title="' . esc_attr__( 'Go to Project', 'select-core' ) . '" href="' . $this->getItemLink( $params ) . '" data-type="portfolio_list"></a>';

		$html .= '</div>';

		return $html;

	}

	/**
	 * Generates portfolio classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getPortfolioClasses( $params ) {
		$classes   = array();
		$type      = $params['type'];
		$columns   = $params['columns'];
		$grid_size = $params['grid_size'];
		switch ( $type ):
			case 'standard':
				$classes[] = 'qodef-ptf-standard';
				break;
			case 'gallery':
				$classes[] = 'qodef-ptf-gallery';
				break;
			case 'pinterest':
				$classes[] = 'qodef-ptf-pinterest';
				break;
		endswitch;

		if ( empty( $params['portfolio_slider'] ) ) { // portfolio slider mustn't have this classes

			if ( $type == 'standard' || $type == 'gallery' ) {
				switch ( $columns ):
					case 'one':
						$classes[] = 'qodef-ptf-one-column';
						break;
					case 'two':
						$classes[] = 'qodef-ptf-two-columns';
						break;
					case 'three':
						$classes[] = 'qodef-ptf-three-columns';
						break;
					case 'four':
						$classes[] = 'qodef-ptf-four-columns';
						break;
					case 'five':
						$classes[] = 'qodef-ptf-five-columns';
						break;
					case 'six':
						$classes[] = 'qodef-ptf-six-columns';
						break;
				endswitch;
			}
			if ( $params['show_load_more'] == 'yes' ) {
				$classes[] = 'qodef-ptf-load-more';
			}

		}

		if ( $type == "pinterest" ) {
			switch ( $grid_size ):
				case 'three':
					$classes[] = 'qodef-ptf-pinterest-three-columns';
					break;
				case 'four':
					$classes[] = 'qodef-ptf-pinterest-four-columns';
					break;
				case 'five':
					$classes[] = 'qodef-ptf-pinterest-five-columns';
					break;
			endswitch;
		}
		if ( $params['filter'] == 'yes' ) {
			$classes[] = 'qodef-ptf-has-filter';
			if ( $params['type'] == 'pinterest' ) {
				if ( $params['filter'] == 'yes' ) {
					$classes[] = 'qodef-ptf-masonry-filter';
				}
			}
		}

		if ( ! empty( $params['portfolio_slider'] ) && $params['portfolio_slider'] == 'yes' ) {
			$classes[] = 'qodef-portfolio-slider-holder';
		}

		return implode( ' ', $classes );

	}

	/**
	 * Generates portfolio image size
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getImageSize( $params ) {

		$thumb_size = 'full';
		$type       = $params['type'];

		if ( $type == 'standard' || $type == 'gallery' ) {
			if ( ! empty( $params['image_size'] ) ) {
				$image_size = $params['image_size'];

				switch ( $image_size ) {
					case 'landscape':
						$thumb_size = 'moments_qodef_landscape';
						break;
					case 'portrait':
						$thumb_size = 'moments_qodef_portrait';
						break;
					case 'square':
						$thumb_size = 'moments_qodef_square';
						break;
					case 'full':
						$thumb_size = 'full';
						break;
				}
			}
		}

		return $thumb_size;
	}

	/**
	 * Generates portfolio item categories ids.This function is used for filtering
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getItemCategories( $params ) {
		$id                    = $params['current_id'];
		$category_return_array = array();

		$categories = wp_get_post_terms( $id, 'portfolio-category' );

		foreach ( $categories as $cat ) {
			$category_return_array[] = 'portfolio_category_' . $cat->term_id;
		}

		return implode( ' ', $category_return_array );
	}

	/**
	 * Generates portfolio item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml( $params ) {
		$id = $params['current_id'];

		$categories    = wp_get_post_terms( $id, 'portfolio-category' );
		$category_html = '<div class="qodef-ptf-category-holder">';
		$k             = 1;
		foreach ( $categories as $cat ) {
			$category_html .= '<span>' . $cat->name . '</span>';
			if ( count( $categories ) != $k ) {
				$category_html .= ' / ';
			}
			$k ++;
		}
		$category_html .= '</div>';

		return $category_html;
	}

	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 *
	 *
	 *
	 * * @return array
	 */
	public function getFilterCategories( $params ) {

		$cat_id       = 0;
		$top_category = '';

		if ( ! empty( $params['category'] ) ) {

			$top_category = get_term_by( 'slug', $params['category'], 'portfolio-category' );
			if ( isset( $top_category->term_id ) ) {
				$cat_id = $top_category->term_id;
			}

		}

		$order = ( $params['filter_order_by'] == 'count' ) ? 'DESC' : 'ASC';

		$args = array(
			'child_of' => $cat_id,
			'orderby'  => $params['filter_order_by'],
			'order'    => $order
		);

		$filter_categories = get_terms( 'portfolio-category', $args );

		return $filter_categories;

	}

	/**
	 * Generates datta attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts( $params ) {

		$data_attr          = array();
		$data_return_string = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		if ( ! empty( $paged ) ) {
			$data_attr['data-next-page'] = $paged + 1;
		}
		if ( ! empty( $params['type'] ) ) {
			$data_attr['data-type'] = $params['type'];
		}
		if ( ! empty( $params['columns'] ) ) {
			$data_attr['data-columns'] = $params['columns'];
		}
		if ( ! empty( $params['grid_size'] ) ) {
			$data_attr['data-grid-size'] = $params['grid_size'];
		}
		if ( ! empty( $params['order_by'] ) ) {
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if ( ! empty( $params['order'] ) ) {
			$data_attr['data-order'] = $params['order'];
		}
		if ( ! empty( $params['number'] ) ) {
			$data_attr['data-number'] = $params['number'];
		}
		if ( ! empty( $params['image_size'] ) ) {
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if ( ! empty( $params['filter'] ) ) {
			$data_attr['data-filter'] = $params['filter'];
		}
		if ( ! empty( $params['filter_order_by'] ) ) {
			$data_attr['data-filter-order-by'] = $params['filter_order_by'];
		}
		if ( ! empty( $params['category'] ) ) {
			$data_attr['data-category'] = $params['category'];
		}
		if ( ! empty( $params['selected_projects'] ) ) {
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if ( ! empty( $params['show_load_more'] ) ) {
			$data_attr['data-show-load-more'] = $params['show_load_more'];
		}
		if ( ! empty( $params['title_tag'] ) ) {
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if ( ! empty( $params['portfolio_slider'] ) && $params['portfolio_slider'] == 'yes' ) {
			$data_attr['data-items'] = $params['portfolios_shown'];
		}

		foreach ( $data_attr as $key => $value ) {
			if ( $key !== '' ) {
				$data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
			}
		}

		return $data_return_string;
	}

	public function getItemLink( $params ) {

		$id             = $params['current_id'];
		$portfolio_link = get_permalink( $id );
		if ( get_post_meta( $id, 'portfolio_external_link', true ) !== '' ) {
			$portfolio_link = get_post_meta( $id, 'portfolio_external_link', true );
		}

		return $portfolio_link;

	}

	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'select-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'select-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio by id
	 *
	 * @param $query
	 *
	 * @return bool|array
	 * @since 4.4
	 *
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id    = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'select-core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'select-core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'select-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio category by slug
	 *
	 * @param $query
	 *
	 * @return bool|array
	 * @since 4.4
	 *
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {

				$portfolio_category_slug  = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'select-core' ) . ': ' . $portfolio_category_title;
				}

				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

}