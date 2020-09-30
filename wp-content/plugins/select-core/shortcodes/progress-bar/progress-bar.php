<?php
namespace MomentsQodef\Modules\Shortcodes\ProgressBar;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'qodef_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Progress Bar', 'select-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__( 'by SELECT', 'select-core' ),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__( 'Title', 'select-core' ),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__( 'Title Tag', 'select-core' ),
					'param_name' => 'title_tag',
					'value' => array(
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
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__( 'Percentage', 'select-core' ),
					'param_name' => 'percent',
					'description' => ''
				),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Percentage Background Color', 'select-core' ),
                    'param_name' => 'percentage_background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Percentage Color', 'select-core' ),
                    'param_name' => 'percentage_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Active Bar Color', 'select-core' ),
                    'param_name' => 'active_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Inactive Bar Color', 'select-core' ),
                    'param_name' => 'inactive_color',
                    'description' => ''
                )
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h6',
            'percent' => '100',
            'percentage_background_color' => '',
            'percentage_color' => '',
            'inactive_color' => '',
            'active_color' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);

        $params['bar_style'] = $this->getBarStyle($params);
        $params['active_bar_style'] = $this->getActiveBarStyle($params);
        $params['percentage_box_style'] = $this->getPercentageBoxStyle($params);
        $params['percentage_box_arrow_style'] = $this->getPercentageBoxArrowStyle($params);

        //init variables
		$html = select_core_get_shortcode_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}

    /**
     * Generates bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getBarStyle($params) {
        $style = array();
        if(!empty($params['inactive_color'])) {
            $style[] = 'background-color: ' . $params['inactive_color'];
        }
        return $style;
    }

    /**
     * Generates active bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveBarStyle($params) {
        $style = array();
        if(!empty($params['active_color'])) {
            $style[] = 'background-color: ' . $params['active_color'];
        }
        return $style;
    }

    /**
     * Generates percentage box style
     *
     * @param $params
     *
     * @return array
     */
    private function getPercentageBoxStyle($params) {
        $style = array();
        if(!empty($params['percentage_background_color'])) {
            $style[] = 'background-color: ' . $params['percentage_background_color'];
        }
        if(!empty($params['percentage_color'])) {
            $style[] = 'color: ' . $params['percentage_color'];
        }
        return $style;
    }

    /**
     * Generates percentage box arrow style
     *
     * @param $params
     *
     * @return array
     */
    private function getPercentageBoxArrowStyle($params) {
        $style = array();
        if(!empty($params['percentage_background_color'])) {
            $style[] = 'border-top-color: ' . $params['percentage_background_color'];
        }
        return $style;
    }
}