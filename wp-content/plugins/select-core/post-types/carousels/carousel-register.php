<?php

namespace QodeCore\PostTypes\Carousels;

use QodeCore\Lib;

/**
 * Class CarouselRegister
 * @package QodeCore\CPT\Carousels
 */
class CarouselRegister implements Lib\PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	/**
	 * @var string
	 */
	private $taxBase;

	public function __construct() {
		$this->base    = 'carousels';
		$this->taxBase = 'carousels_category';
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
		$menuIcon     = 'dashicons-admin-post';
		if ( qode_core_theme_installed() ) {
			$menuPosition = $moments_qodef_Framework->getSkin()->getMenuItemPosition( 'carousel' );
			$menuIcon     = $moments_qodef_Framework->getSkin()->getMenuIcon( 'carousel' );
		}

		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Select Carousel', 'select-core' ),
					'menu_name'     => esc_html__( 'Select Carousel', 'select-core' ),
					'all_items'     => esc_html__( 'Carousel Items', 'select-core' ),
					'add_new'       => esc_html__( 'Add New Carousel Item', 'select-core' ),
					'singular_name' => esc_html__( 'Carousel Item', 'select-core' ),
					'add_item'      => esc_html__( 'New Carousel Item', 'select-core' ),
					'add_new_item'  => esc_html__( 'Add New Carousel Item', 'select-core' ),
					'edit_item'     => esc_html__( 'Edit Carousel Item', 'select-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'carousels' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title' ),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Carousels', 'select-core' ),
			'singular_name'     => esc_html__( 'Carousel', 'select-core' ),
			'search_items'      => esc_html__( 'Search Carousels', 'select-core' ),
			'all_items'         => esc_html__( 'All Carousels', 'select-core' ),
			'parent_item'       => esc_html__( 'Parent Carousel', 'select-core' ),
			'parent_item_colon' => esc_html__( 'Parent Carousel:', 'select-core' ),
			'edit_item'         => esc_html__( 'Edit Carousel', 'select-core' ),
			'update_item'       => esc_html__( 'Update Carousel', 'select-core' ),
			'add_new_item'      => esc_html__( 'Add New Carousel', 'select-core' ),
			'new_item_name'     => esc_html__( 'New Carousel Name', 'select-core' ),
			'menu_name'         => esc_html__( 'Carousels', 'select-core' ),
		);

		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'carousels-category' ),
		) );
	}

}