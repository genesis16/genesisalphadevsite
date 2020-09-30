<?php

namespace MomentsQodef\Modules\CoverBoxes;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CoverBoxes
 */
class CoverBoxes implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_cover_boxes';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
				'name'                      => 'Cover Boxes',
				'base'                      => $this->getBase(),
				'category'                  => esc_html__( 'by SELECT', 'select-core' ),
				'admin_enqueue_css'         => array( moments_qodef_get_skin_uri() . '/assets/css/qodef-vc-extend.css' ),
				'icon'                      => 'icon-wpb-cover-boxes extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array_merge(
					array(
						array(
							"type"        => "dropdown",
							"holder"      => "div",
							"class"       => "",
							"heading"     => esc_html__( "Active element", 'select-core' ),
							"param_name"  => "active_element",
							"value"       => array(
								esc_html__( "One", 'select-core' ) => "1",
								esc_html__( "Two", 'select-core' ) => "2",
								esc_html__( "Three", 'select-core' ) => "3"
							),
							'save_always' => true,
							'group'       => esc_html__( 'General', 'select-core' )
						)
					),
					array(
						array(
							"type"       => "attach_image",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Image 1", 'select-core' ),
							"param_name" => "image1",
							'group'      => esc_html__( 'Cover box 1', 'select-core' ),
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Title 1", 'select-core' ),
							"param_name" => "title1",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 1', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Text 1", 'select-core' ),
							"param_name" => "text1",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 1', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link 1", 'select-core' ),
							"param_name" => "link1",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 1', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link label 1", 'select-core' ),
							"param_name" => "link_label1",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 1', 'select-core' )
						),
						array(
							"type"        => "dropdown",
							"holder"      => "div",
							"class"       => "",
							"heading"     => esc_html__( "Target 1", 'select-core' ),
							"param_name"  => "target1",
							"value"       => array(
								esc_html__( "Self", 'select-core' ) => "_self",
								esc_html__( "Blank", 'select-core' ) => "_blank"
							),
							'save_always' => true,
							"description" => "",
							'group'       => esc_html__( 'Cover box 1', 'select-core' )
						)
					),
					array(
						array(
							"type"       => "attach_image",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Image 2", 'select-core' ),
							"param_name" => "image2",
							'group'      => esc_html__( 'Cover box 2', 'select-core' ),
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Title 2", 'select-core' ),
							"param_name" => "title2",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 2', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Text 2", 'select-core' ),
							"param_name" => "text2",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 2', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link 2", 'select-core' ),
							"param_name" => "link2",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 2', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link label 2", 'select-core' ),
							"param_name" => "link_label2",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 2', 'select-core' )
						),
						array(
							"type"        => "dropdown",
							"holder"      => "div",
							"class"       => "",
							"heading"     => esc_html__( "Target 2", 'select-core' ),
							"param_name"  => "target2",
							"value"       => array(
								esc_html__( "Self", 'select-core' ) => "_self",
								esc_html__( "Blank", 'select-core' ) => "_blank"
							),
							'save_always' => true,
							"description" => "",
							'group'       => esc_html__( 'Cover box 2', 'select-core' )
						)
					),
					array(
						array(
							"type"       => "attach_image",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Image 3", 'select-core' ),
							"param_name" => "image3",
							'group'      => esc_html__( 'Cover box 3', 'select-core' ),
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Title 3", 'select-core' ),
							"param_name" => "title3",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 3', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Text 3", 'select-core' ),
							"param_name" => "text3",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 3', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link 3", 'select-core' ),
							"param_name" => "link3",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 3', 'select-core' )
						),
						array(
							"type"       => "textfield",
							"holder"     => "div",
							"class"      => "",
							"heading"    => esc_html__( "Link label 3", 'select-core' ),
							"param_name" => "link_label3",
							"value"      => "",
							'group'      => esc_html__( 'Cover box 3', 'select-core' )
						),
						array(
							"type"        => "dropdown",
							"holder"      => "div",
							"class"       => "",
							"heading"     => esc_html__( "Target 3", 'select-core' ),
							"param_name"  => "target3",
							"value"       => array(
								esc_html__( "Self", 'select-core' ) => "_self",
								esc_html__( "Blank", 'select-core' ) => "_blank"
							),
							'save_always' => true,
							"description" => "",
							'group'       => esc_html__( 'Cover box 3', 'select-core' )
						)
					)
				)
			)
		);
	}

	public function render( $atts, $content = null ) {

		$args = array(
			"active_element" => "1",
			"title1"         => "",
			"text1"          => "",
			"image1"         => "",
			"link1"          => "",
			"link_label1"    => "",
			"target1"        => "",
			"title2"         => "",
			"text2"          => "",
			"image2"         => "",
			"link2"          => "",
			"link_label2"    => "",
			"target2"        => "",
			"title3"         => "",
			"text3"          => "",
			"image3"         => "",
			"link3"          => "",
			"link_label3"    => "",
			"target3"        => ""
		);

		$params = shortcode_atts( $args, $atts );

		$params['cover_boxes_data']      = $this->getCoverBoxesData( $params );
		$params['cover_boxes_images']    = $this->getCoverBoxesImages( $params );
		$params['number_of_cover_boxes'] = 3;

		$params['cover_box_classes'] = 'qodef-cover-boxes boxes-three';

		$html = select_core_get_shortcode_template_part( 'templates/cover-boxes-template', 'cover-boxes', '', $params );

		return $html;

	}

	private function getCoverBoxesData( $params ) {
		$coverBoxesData = array();

		if ( $params['active_element'] !== '' ) {
			$coverBoxesData['data-active-element'] = $params['active_element'];
		}

		return $coverBoxesData;
	}

	private function getCoverBoxesImages( $params ) {
		$number_of_cover_boxes = 3;
		$cover_boxes_images[]  = array();

		for ( $x = 1; $x <= $number_of_cover_boxes; $x ++ ) {
			if ( $params[ 'image' . $x ] != '' ) {
				if ( is_numeric( $params[ 'image' . $x ] ) ) {
					$cover_boxes_images[ $x ] = wp_get_attachment_url( $params[ 'image' . $x ] );
				} else {
					$cover_boxes_images[ $x ] = $params[ 'image' . $x ];
				}
			} else {
				$cover_boxes_images[ $x ] = '';
			}
		}

		return $cover_boxes_images;

	}

}