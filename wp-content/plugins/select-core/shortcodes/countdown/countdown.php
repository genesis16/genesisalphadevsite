<?php

namespace MomentsQodef\Modules\Shortcodes\Counter;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Countdown
 */
class Countdown implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_countdown';

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
			'name'                      => esc_html__( 'Select Countdown', 'select-core' ),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__( 'by SELECT', 'select-core' ),
			'admin_enqueue_css'         => array( moments_qodef_get_skin_uri() . '/assets/css/qodef-vc-extend.css' ),
			'icon'                      => 'icon-wpb-countdown extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Year', 'select-core' ),
					'param_name'  => 'year',
					'value'       => array(
						''                                  => '',
						esc_html__( '2016', 'select-core' ) => '2016',
						esc_html__( '2017', 'select-core' ) => '2017',
						esc_html__( '2018', 'select-core' ) => '2018',
						esc_html__( '2019', 'select-core' ) => '2019',
						esc_html__( '2020', 'select-core' ) => '2020'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Month', 'select-core' ),
					'param_name'  => 'month',
					'value'       => array(
						''                                       => '',
						esc_html__( 'January', 'select-core' )   => '1',
						esc_html__( 'February', 'select-core' )  => '2',
						esc_html__( 'March', 'select-core' )     => '3',
						esc_html__( 'April', 'select-core' )     => '4',
						esc_html__( 'May', 'select-core' )       => '5',
						esc_html__( 'June', 'select-core' )      => '6',
						esc_html__( 'July', 'select-core' )      => '7',
						esc_html__( 'August', 'select-core' )    => '8',
						esc_html__( 'September', 'select-core' ) => '9',
						esc_html__( 'October', 'select-core' )   => '10',
						esc_html__( 'November', 'select-core' )  => '11',
						esc_html__( 'December', 'select-core' )  => '12'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Day', 'select-core' ),
					'param_name'  => 'day',
					'value'       => array(
						''                                => '',
						esc_html__( '1', 'select-core' )  => '1',
						esc_html__( '2', 'select-core' )  => '2',
						esc_html__( '3', 'select-core' )  => '3',
						esc_html__( '4', 'select-core' )  => '4',
						esc_html__( '5', 'select-core' )  => '5',
						esc_html__( '6', 'select-core' )  => '6',
						esc_html__( '7', 'select-core' )  => '7',
						esc_html__( '8', 'select-core' )  => '8',
						esc_html__( '9', 'select-core' )  => '9',
						esc_html__( '10', 'select-core' ) => '10',
						esc_html__( '11', 'select-core' ) => '11',
						esc_html__( '12', 'select-core' ) => '12',
						esc_html__( '13', 'select-core' ) => '13',
						esc_html__( '14', 'select-core' ) => '14',
						esc_html__( '15', 'select-core' ) => '15',
						esc_html__( '16', 'select-core' ) => '16',
						esc_html__( '17', 'select-core' ) => '17',
						esc_html__( '18', 'select-core' ) => '18',
						esc_html__( '19', 'select-core' ) => '19',
						esc_html__( '20', 'select-core' ) => '20',
						esc_html__( '21', 'select-core' ) => '21',
						esc_html__( '22', 'select-core' ) => '22',
						esc_html__( '23', 'select-core' ) => '23',
						esc_html__( '24', 'select-core' ) => '24',
						esc_html__( '25', 'select-core' ) => '25',
						esc_html__( '26', 'select-core' ) => '26',
						esc_html__( '27', 'select-core' ) => '27',
						esc_html__( '28', 'select-core' ) => '28',
						esc_html__( '29', 'select-core' ) => '29',
						esc_html__( '30', 'select-core' ) => '30',
						esc_html__( '31', 'select-core' ) => '31',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Hour', 'select-core' ),
					'param_name'  => 'hour',
					'value'       => array(
						''                                => '',
						esc_html__( '0', 'select-core' )  => '0',
						esc_html__( '1', 'select-core' )  => '1',
						esc_html__( '2', 'select-core' )  => '2',
						esc_html__( '3', 'select-core' )  => '3',
						esc_html__( '4', 'select-core' )  => '4',
						esc_html__( '5', 'select-core' )  => '5',
						esc_html__( '6', 'select-core' )  => '6',
						esc_html__( '7', 'select-core' )  => '7',
						esc_html__( '8', 'select-core' )  => '8',
						esc_html__( '9', 'select-core' )  => '9',
						esc_html__( '10', 'select-core' ) => '10',
						esc_html__( '11', 'select-core' ) => '11',
						esc_html__( '12', 'select-core' ) => '12',
						esc_html__( '13', 'select-core' ) => '13',
						esc_html__( '14', 'select-core' ) => '14',
						esc_html__( '15', 'select-core' ) => '15',
						esc_html__( '16', 'select-core' ) => '16',
						esc_html__( '17', 'select-core' ) => '17',
						esc_html__( '18', 'select-core' ) => '18',
						esc_html__( '19', 'select-core' ) => '19',
						esc_html__( '20', 'select-core' ) => '20',
						esc_html__( '21', 'select-core' ) => '21',
						esc_html__( '22', 'select-core' ) => '22',
						esc_html__( '23', 'select-core' ) => '23',
						esc_html__( '24', 'select-core' ) => '24'
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Minute', 'select-core' ),
					'param_name'  => 'minute',
					'value'       => array(
						''                                => '',
						esc_html__( '0', 'select-core' )  => '0',
						esc_html__( '1', 'select-core' )  => '1',
						esc_html__( '2', 'select-core' )  => '2',
						esc_html__( '3', 'select-core' )  => '3',
						esc_html__( '4', 'select-core' )  => '4',
						esc_html__( '5', 'select-core' )  => '5',
						esc_html__( '6', 'select-core' )  => '6',
						esc_html__( '7', 'select-core' )  => '7',
						esc_html__( '8', 'select-core' )  => '8',
						esc_html__( '9', 'select-core' )  => '9',
						esc_html__( '10', 'select-core' ) => '10',
						esc_html__( '11', 'select-core' ) => '11',
						esc_html__( '12', 'select-core' ) => '12',
						esc_html__( '13', 'select-core' ) => '13',
						esc_html__( '14', 'select-core' ) => '14',
						esc_html__( '15', 'select-core' ) => '15',
						esc_html__( '16', 'select-core' ) => '16',
						esc_html__( '17', 'select-core' ) => '17',
						esc_html__( '18', 'select-core' ) => '18',
						esc_html__( '19', 'select-core' ) => '19',
						esc_html__( '20', 'select-core' ) => '20',
						esc_html__( '21', 'select-core' ) => '21',
						esc_html__( '22', 'select-core' ) => '22',
						esc_html__( '23', 'select-core' ) => '23',
						esc_html__( '24', 'select-core' ) => '24',
						esc_html__( '25', 'select-core' ) => '25',
						esc_html__( '26', 'select-core' ) => '26',
						esc_html__( '27', 'select-core' ) => '27',
						esc_html__( '28', 'select-core' ) => '28',
						esc_html__( '29', 'select-core' ) => '29',
						esc_html__( '30', 'select-core' ) => '30',
						esc_html__( '31', 'select-core' ) => '31',
						esc_html__( '32', 'select-core' ) => '32',
						esc_html__( '33', 'select-core' ) => '33',
						esc_html__( '34', 'select-core' ) => '34',
						esc_html__( '35', 'select-core' ) => '35',
						esc_html__( '36', 'select-core' ) => '36',
						esc_html__( '37', 'select-core' ) => '37',
						esc_html__( '38', 'select-core' ) => '38',
						esc_html__( '39', 'select-core' ) => '39',
						esc_html__( '40', 'select-core' ) => '40',
						esc_html__( '41', 'select-core' ) => '41',
						esc_html__( '42', 'select-core' ) => '42',
						esc_html__( '43', 'select-core' ) => '43',
						esc_html__( '44', 'select-core' ) => '44',
						esc_html__( '45', 'select-core' ) => '45',
						esc_html__( '46', 'select-core' ) => '46',
						esc_html__( '47', 'select-core' ) => '47',
						esc_html__( '48', 'select-core' ) => '48',
						esc_html__( '49', 'select-core' ) => '49',
						esc_html__( '50', 'select-core' ) => '50',
						esc_html__( '51', 'select-core' ) => '51',
						esc_html__( '52', 'select-core' ) => '52',
						esc_html__( '53', 'select-core' ) => '53',
						esc_html__( '54', 'select-core' ) => '54',
						esc_html__( '55', 'select-core' ) => '55',
						esc_html__( '56', 'select-core' ) => '56',
						esc_html__( '57', 'select-core' ) => '57',
						esc_html__( '58', 'select-core' ) => '58',
						esc_html__( '59', 'select-core' ) => '59',
						esc_html__( '60', 'select-core' ) => '60',
					),
					'admin_label' => true,
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Month Label', 'select-core' ),
					'param_name'  => 'month_label',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Day Label', 'select-core' ),
					'param_name'  => 'day_label',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Hour Label', 'select-core' ),
					'param_name'  => 'hour_label',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Minute Label', 'select-core' ),
					'param_name'  => 'minute_label',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Second Label', 'select-core' ),
					'param_name'  => 'second_label',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Digit Font Size (px)', 'select-core' ),
					'param_name'  => 'digit_font_size',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Label Font Size (px)', 'select-core' ),
					'param_name'  => 'label_font_size',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' )
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Digit Color', 'select-core' ),
					'param_name'  => 'digit_color',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' )
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Label Color', 'select-core' ),
					'param_name'  => 'label_color',
					'description' => '',
					'group'       => esc_html__( 'Design Options', 'select-core' )
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
			'year'            => '',
			'month'           => '',
			'day'             => '',
			'hour'            => '',
			'minute'          => '',
			'month_label'     => 'Months',
			'day_label'       => 'Days',
			'hour_label'      => 'Hours',
			'minute_label'    => 'Minutes',
			'second_label'    => 'Seconds',
			'digit_font_size' => '',
			'label_font_size' => '',
			'digit_color'     => '',
			'label_color'     => ''
		);

		$params = shortcode_atts( $args, $atts );

		$params['id']             = mt_rand( 1000, 9999 );
		$params['countdown_data'] = $this->getCountdownDataAttr( $params );

		//Get HTML from template
		$html = select_core_get_shortcode_template_part( 'templates/countdown-template', 'countdown', '', $params );

		return $html;

	}

	/**
	 *
	 * Returns array of button data attr
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getCountdownDataAttr( $params ) {
		$data = array();

		$data['data-digit-size']  = esc_html( $params['digit_font_size'] );
		$data['data-label-size']  = esc_html( $params['label_font_size'] );
		$data['data-digit-color'] = $params['digit_color'];
		$data['data-label-color'] = $params['label_color'];

		return $data;
	}
}