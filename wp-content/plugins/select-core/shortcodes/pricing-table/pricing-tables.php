<?php
namespace MomentsQodef\Modules\Shortcodes\PricingTables;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTables implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_pricing_tables';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Select Pricing Tables', 'select-core'),
				'base' => $this->base,
				'as_parent' => array('only' => 'qodef_pricing_table'),
				'content_element' => true,
				'category' => esc_html__( 'by SELECT', 'select-core' ),
				'icon' => 'icon-wpb-pricing-tables extended-custom-icon',
				'show_settings_on_create' => true,
				'params' => array(
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Columns', 'select-core' ),
						'param_name' => 'columns',
						'value' => array(
							esc_html__( 'Two', 'select-core' ) => 'qodef-two-columns',
							esc_html__( 'Three', 'select-core' ) => 'qodef-three-columns',
							esc_html__( 'Four', 'select-core' ) => 'qodef-four-columns',
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__( 'Skin', 'select-core' ),
						'param_name' => 'skin',
						'value' => array(
							esc_html__( 'Dark', 'select-core' ) => 'dark',
							esc_html__( 'Light', 'select-core' ) => 'light'
						),
						'save_always' => true,
						'description' => ''
					)
				),
				'js_view' => 'VcColumnView'
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
			'columns'         => 'qodef-two-columns',
			'skin'         => 'dark'
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		
		$html = '<div class="qodef-pricing-tables clearfix '.$columns.' ' . $skin . '">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}