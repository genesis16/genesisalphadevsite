<?php

namespace MomentsQodef\Modules\Shortcodes\PricingTable;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qodef_pricing_table';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'                      => esc_html__( 'Select Pricing Table', 'select-core' ),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-pricing-table extended-custom-icon',
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
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Price', 'select-core' ),
					'param_name'  => 'price',
					'description' => esc_html__( 'Default value is 100', 'select-core' )
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Currency', 'select-core' ),
					'param_name'  => 'currency',
					'description' => esc_html__( 'Default mark is $', 'select-core' )
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Price Period', 'select-core' ),
					'param_name'  => 'price_period',
					'description' => esc_html__( 'Default label is monthly', 'select-core' )
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
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Active', 'select-core' ),
					'param_name'  => 'active',
					'value'       => array(
						esc_html__( 'No', 'select-core' )  => 'no',
						esc_html__( 'Yes', 'select-core' ) => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Active text', 'select-core' ),
					'param_name'  => 'active_text',
					'description' => esc_html__( 'Best choice', 'select-core' ),
					'dependency'  => array( 'element' => 'active', 'value' => 'yes' )
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
			'title'        => 'Basic Plan',
			'price'        => '100',
			'currency'     => '$',
			'price_period' => 'Monthly',
			'active'       => 'no',
			'active_text'  => 'Best choice',
			'show_button'  => 'yes',
			'link'         => '',
			'button_text'  => 'button'
		);
		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$html                  = '';
		$pricing_table_clasess = 'qodef-price-table';

		if ( $active == 'yes' ) {
			$pricing_table_clasess .= ' qodef-active';
		}

		$params['pricing_table_classes'] = $pricing_table_clasess;
		$params['content']               = preg_replace( '#^<\/p>|<p>$#', '', $content );

		$html .= select_core_get_shortcode_template_part( 'templates/pricing-table-template', 'pricing-table', '', $params );

		return $html;

	}

}
