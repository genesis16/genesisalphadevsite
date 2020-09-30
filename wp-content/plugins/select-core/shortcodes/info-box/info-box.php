<?php
namespace MomentsQodef\Modules\Shortcodes\InfoBox;

use MomentsQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class ProductList that represents product list shortcode
 * @package SupremaQodef\Modules\Shortcodes\ProductList
 */
class InfoBox implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_info_box';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Select Info Box', 'select-core'),
            'base'                      => $this->base,
            'category'                  => esc_html__( 'by SELECT', 'select-core' ),
            'icon'                      => 'icon-wpb-info-box extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                moments_qodef_icon_collections()->getVCParamsArray(),
                array(
                    array(
                        'type'          => 'dropdown',
                        'heading' => esc_html__( 'Type', 'select-core' ),
                        'param_name'    => 'type',
                        'value' => array(
                            esc_html__( 'Contained', 'select-core' ) => 'contained',
                            esc_html__( 'Overlapping', 'select-core' ) => 'overlapping'
                        ),
                        'save_always' => true,
                    ),
                    array(
                        'type'       => 'attach_image',
                        'heading' => esc_html__( 'Custom Icon', 'select-core' ),
                        'param_name' => 'custom_icon',
                        'dependency'  => (array('element' => 'type', 'value' => 'contained'))
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'heading' => esc_html__( 'Box Background Color', 'select-core' ),
                        'param_name' => 'box_background_color'
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading' => esc_html__( 'Title', 'select-core' ),
                        'param_name'  => 'title',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading' => esc_html__( 'Title Tag', 'select-core' ),
                        'param_name' => 'title_tag',
                        'value'      => array(
                            ''   => '',
                            esc_html__( 'h2', 'select-core' ) => 'h2',
                            esc_html__( 'h3', 'select-core' ) => 'h3',
                            esc_html__( 'h4', 'select-core' ) => 'h4',
                            esc_html__( 'h5', 'select-core' ) => 'h5',
                            esc_html__( 'h6', 'select-core' ) => 'h6',
                        ),
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading' => esc_html__( 'Text', 'select-core' ),
                        'param_name'  => 'text',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading' => esc_html__( 'Show Link Button', 'select-core' ),
                        'param_name'    => 'show_button',
                        'value' => array(
                            esc_html__( 'No', 'select-core' ) => 'no',
                            esc_html__( 'Yes', 'select-core' ) => 'yes'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading' => esc_html__( 'Link', 'select-core' ),
                        'param_name'  => 'link',
                        'value'       => '',
                        'admin_label' => true,
                        'dependency'  => (array('element' => 'show_button', 'value' => 'yes'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading' => esc_html__( 'Button Text', 'select-core' ),
                        'param_name'  => 'button_text',
                        'value'       => '',
                        'admin_label' => true,
                        'dependency' => array('element' => 'link', 'not_empty' => true),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading' => esc_html__( 'Target', 'select-core' ),
                        'param_name' => 'target',
                        'value'      => array(
                            ''      => '',
                            esc_html__( 'Self', 'select-core' ) => '_self',
                            esc_html__( 'Blank', 'select-core' ) => '_blank'
                        ),
                        'dependency' => array('element' => 'link', 'not_empty' => true),
                    ),
                )
            )
        ));
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'custom_icon' => '',
            'box_background_color' => '',
            'type' => '',
            'title' => '',
            'title_tag' => 'h6',
            'text' => '',
            'show_button' => 'no',
            'link' => '',
            'button_text' => '',
            'target' => ''
        );

        $default_atts = array_merge($default_atts, moments_qodef_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['holder_classes']  = $this->getHolderClasses($params);
        $params['box_style']  = $this->getBoxStyle($params);

        return select_core_get_shortcode_template_part('templates/info-box-template', 'info-box', '', $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = moments_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack'] = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];
            $params_array['type'] = 'circle';
        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {

        $classes = array('qodef-info-box');

        if(!empty($params['custom_icon'])) {
            $classes[] = 'custom-icon';
        }

        if(!empty($params['type'])) {
            $classes[] = 'qodef-' . $params['type'];
        }
        return $classes;
    }

    /**
     * Generates info box style
     *
     * @param $params
     *
     * @return array
     */
    private function getBoxStyle($params) {
        $style = array();
        if(!empty($params['box_background_color'])) {
            $style[] = 'background-color: ' . $params['box_background_color'];
        }

        return $style;
    }
}