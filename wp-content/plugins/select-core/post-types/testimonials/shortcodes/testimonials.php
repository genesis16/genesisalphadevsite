<?php

namespace QodeCore\PostTypes\Testimonials\Shortcodes;


use QodeCore\Lib;

/**
 * Class Testimonials
 * @package QodeCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_testimonials';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Testimonial category filter
		add_filter( 'vc_autocomplete_qodef_testimonials_category_callback', array(
			&$this,
			'testimonialsCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Testimonial category render
		add_filter( 'vc_autocomplete_qodef_testimonials_category_render', array(
			&$this,
			'testimonialsCategoryAutocompleteRender',
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
	 * @see vc_map()
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
				'name'                      => esc_html__( 'Select Testimonials', 'select-core' ),
				'base'                      => $this->base,
				'category' => esc_html__( 'by SELECT', 'select-core' ),
				'icon'                      => 'icon-wpb-testimonials extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'autocomplete',
						'admin_label' => true,
						'heading'     => esc_html__( 'Category', 'select-core' ),
						'param_name'  => 'category',
						'description' => esc_html__( 'Category Slug (leave empty for all)', 'select-core' )
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => esc_html__( 'Number', 'select-core' ),
						'param_name'  => 'number',
						'value'       => '',
						'description' => esc_html__( 'Number of Testimonials', 'select-core' )
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Show Title', 'select-core' ),
						'param_name'  => 'show_title',
						'value'       => array(
							esc_html__( 'Yes', 'select-core' ) => 'yes',
							esc_html__( 'No', 'select-core' ) => 'no'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Show Author', 'select-core' ),
						'param_name'  => 'show_author',
						'value'       => array(
							esc_html__( 'Yes', 'select-core' ) => 'yes',
							esc_html__( 'No', 'select-core' ) => 'no'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Show Author Job Position', 'select-core' ),
						'param_name'  => 'show_position',
						'value'       => array(
							esc_html__( 'Yes', 'select-core' ) => 'yes',
							esc_html__( 'No', 'select-core' ) => 'no',
						),
						'save_always' => true,
						'dependency'  => array( 'element' => 'show_author', 'value' => array( 'yes' ) ),
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Autoplay Timeout', 'select-core' ),
						'param_name'  => 'autoplay_timeout',
						'value'       => array(
							esc_html__( 'Disabled', 'select-core' ) => '0',
							esc_html__( '3s', 'select-core' ) => '3',
							esc_html__( '4s', 'select-core' ) => '4',
							esc_html__( '5s', 'select-core' ) => '5'
						),
						'save_always' => true,
						'admin_label' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Enable Pagination', 'select-core' ),
						'param_name'  => 'pagination',
						'value'       => array(
							esc_html__( 'Yes', 'select-core' ) => 'yes',
							esc_html__( 'No', 'select-core' ) => 'no',
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Skin', 'select-core' ),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__( 'Dark', 'select-core' ) => 'dark',
							esc_html__( 'Light', 'select-core' ) => 'light',
						),
						'save_always' => true,
						'description' => ''
					)
				)
			) );
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

		$args   = array(
			'number'           => '-1',
			'category'         => '',
			'show_title'       => 'yes',
			'show_author'      => 'yes',
			'show_position'    => 'yes',
			'autoplay_timeout' => '0',
			'pagination'       => 'no',
			'skin'             => 'dark'
		);
		$params = shortcode_atts( $args, $atts );

		//Extract params for use in method
		extract( $params );

		$data_attr  = $this->getDataParams( $params );
		$query_args = $this->getQueryParams( $params );

		$html = '';
		$html .= '<div class="qodef-testimonials-holder clearfix">';
		$html .= '<div class="qodef-testimonials ' . $skin . '" ' . $data_attr . '>';

		query_posts( $query_args );
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				$author = get_post_meta( get_the_ID(), 'qodef_testimonial_author', true );
				$text   = get_post_meta( get_the_ID(), 'qodef_testimonial_text', true );
				$title  = get_post_meta( get_the_ID(), 'qodef_testimonial_title', true );
				$job    = get_post_meta( get_the_ID(), 'qodef_testimonial_author_position', true );

				$params['author']     = $author;
				$params['text']       = $text;
				$params['title']      = $title;
				$params['job']        = $job;
				$params['current_id'] = get_the_ID();

				$html .= qode_core_get_shortcode_module_template_part( 'testimonials', 'testimonials-template', '', $params );

			endwhile;
		else:
			$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'select-core' );
		endif;

		wp_reset_query();
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Generates testimonial data attribute array
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getDataParams( $params ) {
		$data_attr = '';
	
		if ( ! empty( $params['autoplay_timeout'] ) || $params['autoplay_timeout'] === "0" ) {
			$data_attr .= ' data-autoplay-timeout ="' . $params['autoplay_timeout'] . '"';
		}

		if ( ! empty( $params['pagination'] ) ) {
			$data_attr .= ' data-pagination ="' . $params['pagination'] . '"';
		}

		return $data_attr;
	}

	/**
	 * Generates testimonials query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getQueryParams( $params ) {

		$args = array(
			'post_type'      => 'testimonials',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => $params['number']
		);

		if ( $params['category'] != '' ) {
			$args['testimonials_category'] = $params['category'];
		}

		return $args;
	}

	/**
	 * Filter testimonial categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function testimonialsCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_testimonial_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'testimonials_category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_testimonial_title'] ) > 0 ) ? esc_html__( 'Category', 'select-core' ) . ': ' . $value['portfolio_testimonial_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find testimonial category by slug
	 *
	 * @param $query
	 *
	 * @return bool|array
	 * @since 4.4
	 *
	 */
	public function testimonialsCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get testimonial category
			$testimonial_category = get_term_by( 'slug', $query, 'testimonials_category' );
			if ( is_object( $testimonial_category ) ) {

				$testimonial_category_slug  = $testimonial_category->slug;
				$testimonial_category_title = $testimonial_category->name;

				$testimonial_category_title_display = '';
				if ( ! empty( $testimonial_category_title ) ) {
					$testimonial_category_title_display = esc_html__( 'Category', 'select-core' ) . ': ' . $testimonial_category_title;
				}

				$data          = array();
				$data['value'] = $testimonial_category_slug;
				$data['label'] = $testimonial_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

}