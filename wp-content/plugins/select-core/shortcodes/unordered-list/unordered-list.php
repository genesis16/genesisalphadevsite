<?php

namespace MomentsQodef\Modules\Shortcodes\UnorderedList;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface {

	private $base;

	function __construct() {
		$this->base = 'qodef_unordered_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name'                      => esc_html__( 'Select List - Unordered', 'select-core' ),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-unordered-list extended-custom-icon',
			'category'                  => esc_html__( 'by SELECT', 'select-core' ),
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Style', 'select-core' ),
					'param_name'  => 'style',
					'value'       => array(
						esc_html__( 'Circle', 'select-core' ) => 'circle',
						esc_html__( 'Line', 'select-core' )   => 'line'
					),
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Animate List', 'select-core' ),
					'param_name'  => 'animate',
					'value'       => array(
						esc_html__( 'No', 'select-core' )  => 'no',
						esc_html__( 'Yes', 'select-core' ) => 'yes'
					),
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Font Weight', 'select-core' ),
					'param_name'  => 'font_weight',
					'value'       => array(
						esc_html__( 'Default', 'select-core' ) => '',
						esc_html__( 'Light', 'select-core' )   => 'light',
						esc_html__( 'Normal', 'select-core' )  => 'normal',
						esc_html__( 'Bold', 'select-core' )    => 'bold'
					),
					'description' => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Padding left (px)', 'select-core' ),
					'param_name' => 'padding_left',
					'value'      => ''
				),
				array(
					'type'        => 'textarea_html',
					'heading'     => esc_html__( 'Content', 'select-core' ),
					'param_name'  => 'content',
					'value'       => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
					'description' => ''
				)
			)
		) );
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'style'        => '',
			'animate'      => '',
			'font_weight'  => '',
			'padding_left' => ''
		);
		$params = shortcode_atts( $args, $atts );

		//Extract params for use in method
		extract( $params );

		$list_item_classes = "";

		if ( $style != '' ) {
			if ( $style == 'circle' ) {
				$list_item_classes .= ' qodef-circle';
			} elseif ( $style == 'line' ) {
				$list_item_classes .= ' qodef-line';
			}
		}

		if ( $animate == 'yes' ) {
			$list_item_classes .= ' qodef-animate-list';
		}

		$list_style = '';
		if ( $padding_left != '' ) {
			$list_style .= 'padding-left: ' . $padding_left . 'px;';
		}
		$content = preg_replace( '#^<\/p>|<p>$#', '', $content );
		$html    = '<div class="qodef-unordered-list ' . $list_item_classes . '" ' . moments_qodef_get_inline_style( $list_style ) . '>' . do_shortcode( $content ) . '</div>';

		return $html;
	}
}