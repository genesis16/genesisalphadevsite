<?php

namespace MomentsQodef\Modules\Shortcodes\ImageGallery;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface {

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'qodef_image_gallery';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
			'name'                      => esc_html__( 'Select Image Gallery', 'select-core' ),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__( 'by SELECT', 'select-core' ),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'attach_images',
					'heading'     => esc_html__( 'Images', 'select-core' ),
					'param_name'  => 'images',
					'description' => esc_html__( 'Select images from media library', 'select-core' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Size', 'select-core' ),
					'param_name'  => 'image_size',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'select-core' )
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Gallery Type', 'select-core' ),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__( 'Slider', 'select-core' )     => 'slider',
						esc_html__( 'Image Grid', 'select-core' ) => 'image_grid'
					),
					'description' => esc_html__( 'Select gallery type', 'select-core' ),
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Slide duration', 'select-core' ),
					'admin_label' => true,
					'param_name'  => 'autoplay',
					'value'       => array(
						esc_html__( '3', 'select-core' )       => '3',
						esc_html__( '5', 'select-core' )       => '5',
						esc_html__( '10', 'select-core' )      => '10',
						esc_html__( 'Disable', 'select-core' ) => '0'
					),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'slider'
						)
					),
					'description' => esc_html__( 'Auto rotate slides each X seconds', 'select-core' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Column Number', 'select-core' ),
					'param_name'  => 'column_number',
					'value'       => array( 2, 3, 4, 5 ),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'image_grid'
						)
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Open PrettyPhoto on click', 'select-core' ),
					'param_name'  => 'pretty_photo',
					'value'       => array(
						esc_html__( 'No', 'select-core' )  => 'no',
						esc_html__( 'Yes', 'select-core' ) => 'yes'
					),
					'save_always' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Grayscale Images', 'select-core' ),
					'param_name'  => 'grayscale',
					'value'       => array(
						esc_html__( 'No', 'select-core' )  => 'no',
						esc_html__( 'Yes', 'select-core' ) => 'yes'
					),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'image_grid'
						)
					)
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Show Navigation Arrows', 'select-core' ),
					'param_name'  => 'navigation',
					'value'       => array(
						esc_html__( 'Yes', 'select-core' ) => 'yes',
						esc_html__( 'No', 'select-core' )  => 'no'
					),
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'slider'
						)
					),
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Show Pagination', 'select-core' ),
					'param_name'  => 'pagination',
					'value'       => array(
						esc_html__( 'Yes', 'select-core' ) => 'yes',
						esc_html__( 'No', 'select-core' )  => 'no'
					),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'slider'
						)
					)
				)
			)
		) );

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
			'images'        => '',
			'image_size'    => 'thumbnail',
			'type'          => 'slider',
			'autoplay'      => '3',
			'pretty_photo'  => '',
			'column_number' => '',
			'grayscale'     => '',
			'navigation'    => 'yes',
			'pagination'    => 'yes'
		);

		$params                    = shortcode_atts( $args, $atts );
		$params['slider_data']     = $this->getSliderData( $params );
		$params['image_size']      = $this->getImageSize( $params['image_size'] );
		$params['images']          = $this->getGalleryImages( $params );
		$params['pretty_photo']    = ( $params['pretty_photo'] == 'yes' ) ? true : false;
		$params['columns']         = 'qodef-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ( $params['grayscale'] == 'yes' ) ? 'qodef-grayscale' : '';

		if ( $params['type'] == 'image_grid' ) {
			$template = 'gallery-grid';
		} elseif ( $params['type'] == 'slider' ) {
			$template = 'gallery-slider';
		}

		$html = select_core_get_shortcode_template_part( 'templates/' . $template, 'imagegallery', '', $params );

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getGalleryImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;

		if ( $params['images'] !== '' ) {
			$image_ids = explode( ',', $params['images'] );
		}

		foreach ( $image_ids as $id ) {

			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['title']    = get_the_title( $id );

			$images[ $i ] = $image;
			$i ++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 *
	 * @return array
	 */
	private function getImageSize( $image_size ) {

		$image_size = trim( $image_size );
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getSliderData( $params ) {

		$slider_data = array();

		$slider_data['data-autoplay']   = ( $params['autoplay'] !== '' ) ? $params['autoplay'] : '';
		$slider_data['data-navigation'] = ( $params['navigation'] !== '' ) ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ( $params['pagination'] !== '' ) ? $params['pagination'] : '';

		return $slider_data;

	}

}