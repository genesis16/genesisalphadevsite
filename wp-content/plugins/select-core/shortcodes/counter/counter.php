<?php

namespace MomentsQodef\Modules\Shortcodes\Counter;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_counter';

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
			'name'                      => esc_html__( 'Select Counter', 'select-core' ),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__( 'by SELECT', 'select-core' ),
			'admin_enqueue_css'         => array( moments_qodef_get_skin_uri() . '/assets/css/qodef-vc-extend.css' ),
			'icon'                      => 'icon-wpb-counter extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Type', 'select-core' ),
					'param_name'  => 'type',
					'value'       => array(
						esc_html__( 'Zero Counter', 'select-core' ) => 'zero',
						esc_html__( 'Random Counter', 'select-core' ) => 'random'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Position', 'select-core' ),
					'param_name'  => 'position',
					'value'       => array(
						esc_html__( 'Left', 'select-core' ) => 'left',
						esc_html__( 'Right', 'select-core' ) => 'right',
						esc_html__( 'Center', 'select-core' ) => 'center'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'admin_label' => true,
					'heading'     => esc_html__( 'Digit', 'select-core' ),
					'param_name'  => 'digit',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Digit Font Size (px)', 'select-core' ),
					'param_name'  => 'font_size',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Digit Color', 'select-core' ),
					'param_name'  => 'color',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title Font Size (px)', 'select-core' ),
					'param_name'  => 'title_font_size',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'select-core' ),
					'param_name'  => 'title',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Title Color', 'select-core' ),
					'param_name'  => 'title_color',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' ),
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
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Text', 'select-core' ),
					'param_name'  => 'text',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Padding Bottom(px)', 'select-core' ),
					'param_name'  => 'padding_bottom',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' ),
				),
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
			'type'            => '',
			'position'        => '',
			'digit'           => '',
			'underline_digit' => '',
			'title'           => '',
			'title_tag'       => 'h4',
			'font_size'       => '',
			'title_font_size' => '',
			'color'           => '',
			'title_color'     => '',
			'text'            => '',
			'padding_bottom'  => '',

		);

		$params = shortcode_atts( $args, $atts );

		//get correct heading value. If provided heading isn't valid get the default one
		$headings_array      = array( 'h2', 'h3', 'h4', 'h5', 'h6' );
		$params['title_tag'] = ( in_array( $params['title_tag'], $headings_array ) ) ? $params['title_tag'] : $args['title_tag'];

		$params['counter_holder_styles'] = $this->getCounterHolderStyle( $params );
		$params['counter_styles']        = $this->getCounterStyle( $params );
		$params['counter_title_styles']  = $this->getCounterTitleStyle( $params );

		//Get HTML from template
		$html = select_core_get_shortcode_template_part( 'templates/counter-template', 'counter', '', $params );

		return $html;

	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCounterHolderStyle( $params ) {
		$counterHolderStyle = array();

		if ( $params['padding_bottom'] !== '' ) {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode( ';', $counterHolderStyle );
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCounterStyle( $params ) {
		$counterStyle = array();

		if ( $params['font_size'] !== '' ) {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}

		if ( $params['color'] !== '' ) {
			$counterStyle[] = 'color: ' . $params['color'];
		}

		return implode( ';', $counterStyle );
	}

	/**
	 * Return Title styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCounterTitleStyle( $params ) {
		$counterTitleStyle = array();

		if ( $params['title_font_size'] !== '' ) {
			$counterTitleStyle[] = 'font-size: ' . $params['title_font_size'] . 'px';
		}

		if ( $params['title_color'] !== '' ) {
			$counterTitleStyle[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $counterTitleStyle );
	}

}