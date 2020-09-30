<?php

if ( ! function_exists( 'moments_qodef_like' ) ) {
	/**
	 * Returns MomentsQodefLike instance
	 *
	 * @return MomentsQodefLike
	 */
	function moments_qodef_like() {
		return MomentsQodefLike::get_instance();
	}

}

function moments_qodef_get_like() {

	echo wp_kses( moments_qodef_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	) );
}

if ( ! function_exists( 'moments_qodef_like_latest_posts' ) ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function moments_qodef_like_latest_posts() {
		return moments_qodef_like()->add_like();
	}

}

if ( ! function_exists( 'moments_qodef_like_portfolio_list' ) ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 *
	 * @return string
	 */
	function moments_qodef_like_portfolio_list( $portfolio_project_id ) {
		return moments_qodef_like()->add_like_portfolio_list( $portfolio_project_id );
	}

}