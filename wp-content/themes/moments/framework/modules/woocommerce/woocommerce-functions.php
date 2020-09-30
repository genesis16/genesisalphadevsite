<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'moments_qodef_woocommerce_body_class' ) ) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function moments_qodef_woocommerce_body_class( $classes ) {
		if ( moments_qodef_is_woocommerce_page() ) {
			$classes[] = 'qodef-woocommerce-page';
			if ( is_singular( 'product' ) ) {
				$classes[] = 'qodef-woocommerce-single-page';
			}
		}

		return $classes;
	}

	add_filter( 'body_class', 'moments_qodef_woocommerce_body_class' );

}

if ( ! function_exists( 'moments_qodef_woocommerce_columns_class' ) ) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function moments_qodef_woocommerce_columns_class( $classes ) {

		if ( in_array( 'woocommerce', $classes ) ) {

			$products_list_number = moments_qodef_options()->getOptionValue( 'qodef_woo_product_list_columns' );
			$classes[]            = $products_list_number;

		}

		return $classes;
	}

	add_filter( 'body_class', 'moments_qodef_woocommerce_columns_class' );
}

if ( ! function_exists( 'moments_qodef_is_woocommerce_page' ) ) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function moments_qodef_is_woocommerce_page() {
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			return is_woocommerce();
		} elseif ( function_exists( 'is_cart' ) && is_cart() ) {
			return is_cart();
		} elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
			return is_checkout();
		} elseif ( function_exists( 'is_account_page' ) && is_account_page() ) {
			return is_account_page();
		}
	}
}

if ( ! function_exists( 'moments_qodef_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function moments_qodef_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_product() );
	}
}

if ( ! function_exists( 'moments_qodef_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function moments_qodef_get_woo_shop_page_id() {
		if ( moments_qodef_is_woocommerce_installed() ) {
			return get_option( 'woocommerce_shop_page_id' );
		}
	}
}

if ( ! function_exists( 'moments_qodef_is_product_category' ) ) {
	function moments_qodef_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'moments_qodef_is_product_tag' ) ) {
	function moments_qodef_is_product_tag() {
		return function_exists( 'is_product_tag' ) && is_product_tag();
	}
}

if ( ! function_exists( 'moments_qodef_load_woo_assets' ) ) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @return bool
	 * @see moments_qodef_has_woocommerce_shortcode()
	 * @see moments_qodef_has_woocommerce_widgets()
	 * @see moments_qodef_is_woocommerce_page()
	 */

	function moments_qodef_load_woo_assets() {
		return moments_qodef_is_woocommerce_installed() && ( moments_qodef_is_woocommerce_page() ||
		                                                     moments_qodef_has_woocommerce_shortcode() || moments_qodef_has_woocommerce_widgets() );
	}
}

if ( ! function_exists( 'moments_qodef_has_woocommerce_shortcode' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function moments_qodef_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking',
			'add_to_cart',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = moments_qodef_has_shortcode( $woocommerce_shortcode );

			if ( $has_shortcode ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'moments_qodef_has_woocommerce_widgets' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function moments_qodef_has_woocommerce_widgets() {
		$widgets_array = array(
			'qodef_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach ( $widgets_array as $widget ) {
			$active_widget = is_active_widget( false, false, $widget );

			if ( $active_widget ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_pages' ) ) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function moments_qodef_get_woocommerce_pages() {
		$woo_pages_array = array();

		if ( moments_qodef_is_woocommerce_installed() ) {
			if ( get_option( 'woocommerce_shop_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_shop_page_id' ) );
			}
			if ( get_option( 'woocommerce_cart_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_cart_page_id' ) );
			}
			if ( get_option( 'woocommerce_checkout_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_checkout_page_id' ) );
			}
			if ( get_option( 'woocommerce_pay_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_pay_page_id ' ) );
			}
			if ( get_option( 'woocommerce_thanks_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_thanks_page_id ' ) );
			}
			if ( get_option( 'woocommerce_myaccount_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_myaccount_page_id ' ) );
			}
			if ( get_option( 'woocommerce_edit_address_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_edit_address_page_id ' ) );
			}
			if ( get_option( 'woocommerce_view_order_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_view_order_page_id ' ) );
			}
			if ( get_option( 'woocommerce_terms_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_terms_page_id ' ) );
			}

			$woo_products = get_posts( array(
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => '-1'
			) );

			foreach ( $woo_products as $product ) {
				$woo_pages_array[] = get_permalink( $product->ID );
			}
		}

		return $woo_pages_array;
	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_share' ) ) {
	/**
	 * Function that social share for product page
	 * Return array array of WooCommerce pages
	 */
	function moments_qodef_woocommerce_share() {
		if ( moments_qodef_is_woocommerce_installed() ) {
			if ( moments_qodef_options()->getOptionValue( 'enable_social_share' ) == 'yes'
			     && moments_qodef_options()->getOptionValue( 'enable_social_share_on_product' ) == 'yes'
			     && moments_qodef_core_installed() ) :
				$html = '<div class="qodef-woocommerce-single-share">';
				$html .= '<span class="qodef-woocommerce-single-share-label">';
				$html .= esc_html__( 'Share:', 'moments' );
				$html .= '</span>';
				$html .= moments_qodef_get_social_share_html();
				$html .= '</div>';
				print moments_qodef_get_module_part( $html );
			endif;
		}
	}

}