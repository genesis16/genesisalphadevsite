<?php

namespace MomentsQodef\Modules\Shortcodes\ImageSlider;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageSlider implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_image_slider';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
				'name'                      => esc_html__( 'Image Slider', 'select-core' ),
				'base'                      => $this->base,
				'icon'                      => 'icon-wpb-image-slider extended-custom-icon',
				'category'                  => esc_html__( 'by SELECT', 'select-core' ),
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'attach_images',
						'heading'     => esc_html__( 'Images', 'select-core' ),
						'param_name'  => 'images',
						'description' => esc_html__( 'Select images from media library', 'select-core' )
					),
					array(
						"type"        => "textfield",
						"heading"     => esc_html__( "Custom Links", 'select-core' ),
						"param_name"  => "custom_links",
						"description" => esc_html__( "Enter links for each image here. Divide links with comma.", 'select-core' )
					),
					array(
						"type"       => "textfield",
						"heading"    => esc_html__( "Slider height (px)", 'select-core' ),
						"param_name" => "height",
					),
					array(
						"type"       => "dropdown",
						"holder"     => "div",
						"class"      => "",
						"heading"    => esc_html__( "Highlight active image", 'select-core' ),
						"param_name" => "highlight_active_image",
						"value"      => array(
							""    => "",
							esc_html__( "No", 'select-core' ) => "no",
							esc_html__( "Yes", 'select-core' ) => "yes"
						)
					)
				)
			)
		);
	}

	public function render( $atts, $content = null ) {

		$args   = array(
			'images'                 => '',
			'custom_links'           => '',
			'height'                 => '',
			'highlight_active_image' => 'no'
		);
		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$params['images']        = $this->getSliderImages( $params );
		$params['slider_styles'] = $this->getImageSliderStyle( $params );

		$html               = '';
		$image_slider_class = '';

		if ( $highlight_active_image == 'yes' ) {
			$image_slider_class .= 'qodef-highlight-active';
		}

		$html .= '<div class="qodef-image-slider ' . $image_slider_class . '">';

		$html .= select_core_get_shortcode_template_part( 'templates/image-slider-template', 'image-slider', '', $params );
		$html .= '<div class="controls">';
		$html .= '<a class="prev-slide" href="#"><span class="arrow_carrot-left"></span></a>';
		$html .= '<a class="next-slide" href="#"><span class="arrow_carrot-right"></span></a>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

	private function getImageLinks( $params ) {
		$custom_links_array = array();

		if ( $params['custom_links'] != '' ) {
			$custom_links_array = explode( ',', strip_tags( $params['custom_links'] ) );
		}

		return $custom_links_array;
	}

	private function getSliderImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;

		$image_links_array = $this->getImageLinks( $params );

		if ( $params['images'] !== '' ) {
			$image_ids = explode( ',', $params['images'] );
		}

		foreach ( $image_ids as $id ) {

			$image        = wp_get_attachment_image_src( $id, 'full' );
			$image_alt    = get_post_meta( $id, '_wp_attachment_image_alt', true );
			$image_src    = $image[0];
			$image_width  = $image[1];
			$image_height = $image[2];
			if ( ! empty( $image_links_array[ $i ] ) && $image_links_array[ $i ] != '' ) {
				$image_link = $image_links_array[ $i ];
			} else {
				$image_link = false;
			}

			if ( $params['height'] !== '' ) {
				//get image proportion that will be used to calculate image width
				$proportion = $params['height'] / $image_height;

				//get proper image widht based on slider height and proportion
				$image_width = ceil( $image_width * $proportion );

				$image_height = $params['height'];
			}

			$image = array( $image_src, $image_alt, $this->getImagesSize( $image_width, $image_height ), $image_link );

			$images[ $i ] = $image;
			$i ++;
		}

		return $images;

	}

	private function getImageSliderStyle( $params ) {
		$styles = array();

		if ( $params['height'] != '' ) {
			$styles [] = 'height: ' . $params['height'] . 'px';
		}

		return implode( ';', $styles );
	}

	private function getImagesSize( $width, $height ) {
		$styles = array();

		if ( $width != '' ) {
			$styles[] = 'width:' . $width . 'px';
		}

		if ( $height != '' ) {
			$styles[] = 'height:' . $height . 'px';
		}

		return implode( ';', $styles );
	}
}