<?php

/**
 * Widget that adds social icon
 *
 * Class Social_Icon_Widget
 */
class MomentsQodefSocialIconWidget extends MomentsQodefWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'qode_social_icon_widget', // Base ID
			'Select Social Icon Widget' // Name
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array_merge(
			moments_qodef_icon_collections()->getSocialIconWidgetParamsArray(),
			array(
				array(
					'type'        => 'textfield',
					'title'       => 'Link',
					'name'        => 'link',
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'title'       => 'Target',
					'name'        => 'target',
					'options'     => array(
						'_self'  => 'Same Window',
						'_blank' => 'New Window'
					),
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'title'       => 'Type',
					'name'        => 'type',
					'options'     => array(
						'normal' => 'Normal',
						'circle' => 'Circle',
						'square' => 'Square'
					),
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Text Size (px)',
					'name'        => 'text_size',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Color',
					'name'        => 'color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Hover Color',
					'name'        => 'hover_color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Border Width',
					'name'        => 'border_width',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Border Color',
					'name'        => 'border_color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Hover Border Color',
					'name'        => 'hover_border_color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Background Color',
					'name'        => 'background_color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Hover Background Color',
					'name'        => 'hover_background_color',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'title'       => 'Margin',
					'name'        => 'margin',
					'description' => esc_html__( 'Margin (top right bottom left)', 'moments' )
				)
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {

		$icon_params = array();

		if ( ! empty( $instance['icon_pack'] ) && $instance['icon_pack'] !== '' ) {
			$icon_params['icon_pack'] = $instance['icon_pack'];
		}
		if ( ! empty( $instance['fa_icon'] ) && $instance['fa_icon'] !== '' ) {
			$icon_params['fa_icon'] = $instance['fa_icon'];
		}
		if ( ! empty( $instance['fe_icon'] ) && $instance['fe_icon'] !== '' ) {
			$icon_params['fe_icon'] = $instance['fe_icon'];
		}
		if ( ! empty( $instance['ion_icon'] ) && $instance['ion_icon'] !== '' ) {
			$icon_params['ion_icon'] = $instance['ion_icon'];
		}
		if ( ! empty( $instance['simple_line_icons'] ) && $instance['simple_line_icons'] !== '' ) {
			$icon_params['simple_line_icons'] = $instance['simple_line_icons'];
		}
		if ( ! empty( $instance['type'] ) && $instance['type'] !== '' ) {
			$icon_params['type'] = $instance['type'];
		}
		if ( ! empty( $instance['color'] ) && $instance['color'] !== '' ) {
			$icon_params['icon_color'] = $instance['color'];
		}
		if ( ! empty( $instance['hover_color'] ) && $instance['hover_color'] !== '' ) {
			$icon_params['hover_icon_color'] = $instance['hover_color'];
		}
		if ( ! empty( $instance['link'] ) && $instance['link'] !== '' ) {
			$icon_params['link'] = $instance['link'];
		}
		if ( ! empty( $instance['target'] ) && $instance['target'] !== '' ) {
			$icon_params['target'] = $instance['target'];
		}
		if ( ! empty( $instance['margin'] ) && $instance['margin'] !== '' ) {
			$icon_params['margin'] = $instance['margin'];
		}
		if ( ! empty( $instance['text_size'] ) && $instance['text_size'] !== '' ) {
			$icon_params['custom_size'] = $instance['text_size'];
		}
		if ( ! empty( $instance['border_width'] ) && $instance['border_width'] !== '' ) {
			$icon_params['border_width'] = $instance['border_width'];
		}
		if ( ! empty( $instance['border_color'] ) && $instance['border_color'] !== '' ) {
			$icon_params['border_color'] = $instance['border_color'];
		}
		if ( ! empty( $instance['hover_border_color'] ) && $instance['hover_border_color'] !== '' ) {
			$icon_params['hover_border_color'] = $instance['hover_border_color'];
		}
		if ( ! empty( $instance['background_color'] ) && $instance['background_color'] !== '' ) {
			$icon_params['background_color'] = $instance['background_color'];
		}
		if ( ! empty( $instance['hover_background_color'] ) && $instance['hover_background_color'] !== '' ) {
			$icon_params['hover_background_color'] = $instance['hover_background_color'];
		}

		print wp_kses_post( $args['before_widget'] );
		echo moments_qodef_execute_shortcode( 'qodef_icon', $icon_params );
		print wp_kses_post( $args['after_widget'] );

	}
}