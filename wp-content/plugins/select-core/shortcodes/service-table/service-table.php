<?php

namespace MomentsQodef\Modules\Shortcodes\ServiceTable;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ServiceTable implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_service_table';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'                      => esc_html__( 'Select Service Table', 'select-core' ),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-service-table extended-custom-icon',
			'category'                  => esc_html__( 'by SELECT', 'select-core' ),
			'allowed_container_element' => 'vc_row',
			'as_child'                  => array( 'only' => 'qodef_pricing_tables' ),
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Title', 'select-core' ),
					'param_name'  => 'title',
					'value'       => esc_html__( 'Basic Plan', 'select-core' ),
					'description' => ''
				),
				array(
					"type"       => "attach_image",
					"holder"     => "div",
					"class"      => "",
					"heading"    => esc_html__( "Title Image", 'select-core' ),
					"param_name" => "title_image"
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Show Button', 'select-core' ),
					'param_name'  => 'show_button',
					'value'       => array(
						esc_html__( 'Default', 'select-core' ) => '',
						esc_html__( 'Yes', 'select-core' )     => 'yes',
						esc_html__( 'No', 'select-core' )      => 'no'
					),
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Button Text', 'select-core' ),
					'param_name'  => 'button_text',
					'dependency'  => array( 'element' => 'show_button', 'value' => 'yes' )
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Button Link', 'select-core' ),
					'param_name'  => 'link',
					'dependency'  => array( 'element' => 'show_button', 'value' => 'yes' )
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'heading'     => esc_html__( 'Content', 'select-core' ),
					'param_name'  => 'content',
					'value'       => '<li>content content content</li><li>content content content</li><li>content content content</li>',
					'description' => ''
				)
			)
		) );
	}

	public function render( $atts, $content = null ) {

		$args   = array(
			'title'       => 'Basic Service',
			'title_image' => '',
			'show_button' => 'yes',
			'button_text' => 'button',
			'link'        => ''
		);
		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$html                  = '';
		$service_table_clasess = 'qodef-service-table';


		$params['service_table_classes']     = $service_table_clasess;
		$params['service_table_title_style'] = $this->getTitleStyle( $params );
		$params['content']                   = preg_replace( '#^<\/p>|<p>$#', '', $content );

		$html .= select_core_get_shortcode_template_part( 'templates/service-table-template', 'service-table', '', $params );

		return $html;

	}

	/**
	 * Return Service Table title style
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getTitleStyle( $params ) {

		$title_style = array();


		if ( $params['title_image'] !== '' ) {
			$title_style[] = 'background-image: url(' . wp_get_attachment_url( $params['title_image'] ) . ')';
		}

		return implode( ';', $title_style );

	}

}
