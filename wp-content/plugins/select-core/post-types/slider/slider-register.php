<?php
namespace QodeCore\PostTypes\Slider;

use QodeCore\Lib;

/**
 * Class SliderRegister
 * @package QodeCore\CPT\Slider
 */
class SliderRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'slides';
        $this->taxBase = 'slides_category';
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $moments_qodef_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';

        if(qode_core_theme_installed()) {
            $menuPosition = $moments_qodef_Framework->getSkin()->getMenuItemPosition('slider');
            $menuIcon = $moments_qodef_Framework->getSkin()->getMenuIcon('slider');
        }

        register_post_type($this->base,
            array(
                'labels' 		=> array(
                    'name' 				=> esc_html__('Select Slider','select-core' ),
                    'menu_name'	=> esc_html__('Select Slider','select-core' ),
                    'all_items'	=> esc_html__('Slides','select-core' ),
                    'add_new' =>  esc_html__('Add New Slide','select-core'),
                    'singular_name' 	=> esc_html__('Slide','select-core' ),
                    'add_item'			=> esc_html__('New Slide','select-core'),
                    'add_new_item' 		=> esc_html__('Add New Slide','select-core'),
                    'edit_item' 		=> esc_html__('Edit Slide','select-core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'slides'),
                'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail', 'page-attributes'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__( 'Sliders', 'select-core' ),
            'singular_name' => esc_html__( 'Slider', 'select-core' ),
            'search_items' =>  esc_html__( 'Search Sliders','select-core' ),
            'all_items' => esc_html__( 'All Sliders','select-core' ),
            'parent_item' => esc_html__( 'Parent Slider','select-core' ),
            'parent_item_colon' => esc_html__( 'Parent Slider:','select-core' ),
            'edit_item' => esc_html__( 'Edit Slider','select-core' ),
            'update_item' => esc_html__( 'Update Slider','select-core' ),
            'add_new_item' => esc_html__( 'Add New Slider','select-core' ),
            'new_item_name' => esc_html__( 'New Slider Name','select-core' ),
            'menu_name' => esc_html__( 'Sliders','select-core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'slides-category' ),
        ));
    }
}