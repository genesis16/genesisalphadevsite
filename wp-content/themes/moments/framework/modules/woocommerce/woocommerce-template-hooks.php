<?php

if ( ! function_exists( 'moments_qodef_woocommerce_products_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function moments_qodef_woocommerce_products_per_page() {

		$products_per_page = 12;

		if ( moments_qodef_options()->getOptionValue( 'qodef_woo_products_per_page' ) ) {
			$products_per_page = moments_qodef_options()->getOptionValue( 'qodef_woo_products_per_page' );
		}

		return $products_per_page;

	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function moments_qodef_woocommerce_related_products_args( $args ) {

		if ( moments_qodef_options()->getOptionValue( 'qodef_woo_product_list_columns' ) ) {

			$related = moments_qodef_options()->getOptionValue( 'qodef_woo_product_list_columns' );
			switch ( $related ) {
				case 'qodef-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'qodef-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;

	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function moments_qodef_woocommerce_template_loop_product_title() {

		$tag = moments_qodef_options()->getOptionValue( 'qodef_products_list_title_tag' );
		the_title( '<' . $tag . ' class="qodef-product-list-product-title">', '</' . $tag . '>' );

	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function moments_qodef_woocommerce_template_single_title() {

		$tag = moments_qodef_options()->getOptionValue( 'qodef_single_product_title_tag' );
		the_title( '<' . $tag . '  itemprop="name" class="qodef-single-product-title">', '</' . $tag . '>' );

	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function moments_qodef_woocommerce_sale_flash() {

		return '<span class="qodef-onsale"><span class="qodef-onsale-inner">' . esc_html__( 'Sale!', 'moments' ) . '</span></span>';

	}

}

if ( ! function_exists( 'moments_qodef_custom_override_checkout_fields' ) ) {
	/**
	 * Overrides placeholder values for checkout fields
	 *
	 * @param array all checkout fields
	 *
	 * @return array checkout fields with overriden values
	 */
	function moments_qodef_custom_override_checkout_fields( $fields ) {
		//billing fields
		$args_billing = array(
			'first_name' => esc_html__( 'First name', 'moments' ),
			'last_name'  => esc_html__( 'Last name', 'moments' ),
			'company'    => esc_html__( 'Company name', 'moments' ),
			'address_1'  => esc_html__( 'Address', 'moments' ),
			'email'      => esc_html__( 'Email', 'moments' ),
			'phone'      => esc_html__( 'Phone', 'moments' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'moments' ),
			'state'      => esc_html__( 'State / County', 'moments' ),
			'city'       => esc_html__( 'City', 'moments' )
		);

		//shipping fields
		$args_shipping = array(
			'first_name' => esc_html__( 'First name', 'moments' ),
			'last_name'  => esc_html__( 'Last name', 'moments' ),
			'company'    => esc_html__( 'Company name', 'moments' ),
			'address_1'  => esc_html__( 'Address', 'moments' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'moments' ),
			'state'      => esc_html__( 'State / County', 'moments' ),
			'city'       => esc_html__( 'City', 'moments' )
		);

		//override billing placeholder values
		foreach ( $args_billing as $key => $value ) {
			$fields["billing"]["billing_{$key}"]["placeholder"] = $value;
		}

		//override shipping placeholder values
		foreach ( $args_shipping as $key => $value ) {
			$fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
		}

		return $fields;
	}

}

if ( ! function_exists( 'moments_qodef_woocommerce_loop_add_to_cart_link' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from qodef_button
	 *
	 * @return mixed|string
	 */
	function moments_qodef_woocommerce_loop_add_to_cart_link() {
		global $product;

		$link                   = $product->add_to_cart_url();
		$type                   = 'solid';
		$text                   = $product->add_to_cart_text();
		$class                  = sprintf( '%s %s product_type_%s',
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
			esc_attr( $product->get_type() )
		);
		$product_id             = esc_attr( $product->get_id() );
		$product_sku            = esc_attr( $product->get_sku() );
		$product_qty            = esc_attr( isset( $quantity ) ? $quantity : 1 );
		$attrs                  = array(
			'rel'              => 'nofollow',
			'data-product_id'  => $product_id,
			'data-product_sku' => $product_sku,
			'data-quantity'    => $product_qty,
		);
		$background_color       = '#ffffff';
		$hover_background_color = '#ffffff';
		$border_color           = '#ffffff';
		$hover_border_color     = '#ffffff';
		$color                  = '#303030';
		$hover_color            = '#c9c9c9';
		$font_weight            = '600';
		$style                  = 'style="color: ' . $color . '; background-color: ' . $background_color . '; border-color: ' . $border_color . '; font-weight: ' . $font_weight . ';"';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html(
				array(
					'link'                   => $link,
					'type'                   => $type,
					'text'                   => $text,
					'custom_class'           => $class,
					'custom_attrs'           => $attrs,
					'background_color'       => $background_color,
					'hover_background_color' => $hover_background_color,
					'border_color'           => $border_color,
					'hover_border_color'     => $hover_border_color,
					'color'                  => $color,
					'hover_color'            => $hover_color,
					'font_weight'            => $font_weight,
				)
			);
		} else {
			$button_html .= '<a ' . $style . ' itemprop="url" href="' . $link . '" class="qodef-btn qodef-btn-medium qodef-btn-' . $type . ' qodef-btn-custom-hover-bg qodef-btn-custom-border-hover qodef-btn-custom-hover-color ' . $class . '" data-hover-bg-color="' . $hover_background_color . '" data-hover-color="' . $hover_color . '" data-hover-border-color="' . $hover_border_color . '" rel="nofollow" data-product_id="' . $product_id . '" data-product_sku="' . $product_sku . '" data-quantity="' . $product_qty . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</a>';
		}

		return $button_html;
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_add_to_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on simple and grouped product single template
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_get_woocommerce_add_to_cart_button() {
		global $product;

		$class = 'single_add_to_cart_button alt';
		$text  = $product->single_add_to_cart_text();

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html(
				array(
					'html_type'    => 'button',
					'custom_class' => $class,
					'text'         => $text,
				)
			);
		} else {
			$button_html .= '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-outline ' . $class . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		print moments_qodef_get_module_part( $button_html );
	}

}

if ( ! function_exists( 'moments_qodef_get_woocommerce_add_to_cart_button_external' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on external product single template
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_get_woocommerce_add_to_cart_button_external() {
		global $product;

		$link  = $product->add_to_cart_url();
		$text  = $product->single_add_to_cart_text();
		$class = 'single_add_to_cart_button alt';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html(
				array(
					'link'         => $link,
					'text'         => $text,
					'custom_class' => $class,
					'custom_attrs' => array(
						'rel' => 'nofollow'
					),
					'target'       => '_blank'
				)
			);
		} else {
			$button_html .= '<a itemprop="url" href="' . $link . '" target="_blank" class="qodef-btn qodef-btn-medium qodef-btn-outline ' . $class . '" rel="nofollow">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</a>';
		}

		print moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_woocommerce_single_variation_add_to_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on variable product single template
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_woocommerce_single_variation_add_to_cart_button() {
		global $product;

		$html = '<div class="variations_button">';
		woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) );

		$text  = $product->single_add_to_cart_text();
		$class = 'single_add_to_cart_button alt';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'    => 'button',
				'text'         => $text,
				'custom_class' => $class,
			) );
		} else {
			$button_html .= '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-outline ' . $class . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		$html .= $button_html;

		$html .= '<input type="hidden" name="add-to-cart" value="' . absint( $product->get_id() ) . '" />';
		$html .= '<input type="hidden" name="product_id" value="' . absint( $product->get_id() ) . '" />';
		$html .= '<input type="hidden" name="variation_id" class="variation_id" value="" />';
		$html .= '</div>';

		print moments_qodef_get_module_part( $html );
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_apply_coupon_button' ) ) {
	/**
	 * Function that overrides default woocommerce apply coupon button
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_get_woocommerce_apply_coupon_button() {
		$text = esc_html__( 'Apply Coupon', 'moments' );
		$name = 'apply_coupon';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'  => 'input',
				'input_name' => $name,
				'text'       => $text,
			) );
		} else {
			$button_html .= '<input type="submit" name="' . $name . '" value="' . $text . '" class="qodef-btn qodef-btn-medium qodef-btn-outline">';
		}

		print moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_update_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce update cart button
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_get_woocommerce_update_cart_button() {
		$text = esc_html__( 'Update Cart', 'moments' );
		$name = 'update_cart';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'  => 'input',
				'input_name' => $name,
				'text'       => $text,
			) );
		} else {
			$button_html .= '<input type="submit" name="' . $name . '" value="' . $text . '" class="qodef-btn qodef-btn-medium qodef-btn-outline">';
		}

		print moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_woocommerce_button_proceed_to_checkout' ) ) {
	/**
	 * Function that overrides default woocommerce proceed to checkout button
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_woocommerce_button_proceed_to_checkout() {
		$link  = wc_get_checkout_url();
		$text  = esc_html__( 'Proceed to Checkout', 'moments' );
		$class = 'checkout-button alt wc-forward';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'link'         => $link,
				'text'         => $text,
				'custom_class' => $class,
			) );
		} else {
			$button_html .= '<a itemprop="url" href="' . $link . '" class="qodef-btn qodef-btn-medium qodef-btn-outline ' . $class . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</a>';
		}

		print moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_update_totals_button' ) ) {
	/**
	 * Function that overrides default woocommerce update totals button
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_get_woocommerce_update_totals_button() {
		$text  = esc_html__( 'Update Totals', 'moments' );
		$name  = 'calc_shipping';
		$value = 1;

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'    => 'button',
				'text'         => $text,
				'custom_attrs' => array(
					'value' => $value,
					'name'  => $name,
				)
			) );
		} else {
			$button_html .= '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-outline" value="' . $value . '" name="' . $name . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		print moments_qodef_get_module_part( $button_html );
	}
}

if ( ! function_exists( 'moments_qodef_woocommerce_pay_order_button_html' ) ) {
	/**
	 * Function that overrides default woocommerce pay order button on checkout page
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_woocommerce_pay_order_button_html() {
		$text = esc_html__( 'Pay for order', 'moments' );
		$id   = 'place_order';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'    => 'input',
				'text'         => $text,
				'custom_class' => 'alt',
				'custom_attrs' => array(
					'id'         => $id,
					'data-value' => $text
				),
			) );
		} else {
			$button_html .= '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-outline" id="' . $id . '" data-value="' . $text . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		return $button_html;
	}
}

if ( ! function_exists( 'moments_qodef_woocommerce_order_button_html' ) ) {
	/**
	 * Function that overrides default woocommerce place order button on checkout page
	 * Uses HTML from qodef_button
	 */
	function moments_qodef_woocommerce_order_button_html() {
		$text  = esc_html__( 'Place Order', 'moments' );
		$class = 'alt';
		$id    = 'place_order';
		$name  = 'woocommerce_checkout_place_order';

		$button_html = '';

		if ( moments_qodef_core_installed() ) {
			$button_html .= moments_qodef_get_button_html( array(
				'html_type'    => 'input',
				'text'         => $text,
				'custom_class' => $class,
				'custom_attrs' => array(
					'id'         => $id,
					'data-value' => $text,
					'name'       => $name,
				),
			) );
		} else {
			$button_html .= '<button type="submit" class="qodef-btn qodef-btn-medium qodef-btn-outline ' . $class . '" id="' . $id . '" name="' . $name . '" data-value="' . $text . '">';
			$button_html .= '<span class="qodef-btn-text">' . $text . '</span>';
			$button_html .= '</button>';
		}

		return $button_html;
	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_out_of_stock' ) ) {
	/**
	 * Function that prints html with out of stock text if product is out of stock
	 */
	function moments_qodef_get_woocommerce_out_of_stock() {

		global $product;

		if ( ! $product->is_in_stock() ) {
			print '<span class="qodef-out-of-stock-button"><span class="qodef-out-of-stock-button-inner">' . esc_html__( "Out of stock!", "moments" ) . '</span></span>';
		}


	}
}

if ( ! function_exists( 'moments_qodef_get_woocommerce_pagination' ) ) {
	/**
	 * Function that returns args for woocommerce pagination
	 */
	function moments_qodef_get_woocommerce_pagination() {
		global $wp_query;
		$navigation = array(
			'base'      => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'    => '',
			'add_args'  => false,
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<span class="arrow_carrot-left"></span>',
			'next_text' => '<span class="arrow_carrot-right"></span>',
			'type'      => 'list',
			'end_size'  => 3,
			'mid_size'  => 3
		);

		return $navigation;
	}
}

if ( ! function_exists( 'moments_qodef_woocommerce_single_add_pretty_photo_for_images' ) ) {
	/**
	 * Function that add necessary html attributes for prettyPhoto
	 */
	function moments_qodef_woocommerce_single_add_pretty_photo_for_images( $html, $attachment_id ) {
		$our_html = '';

		if ( ! empty( $html ) ) {
			$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );

			$attributes = array(
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);

			$our_html .= '<div class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '" data-rel="prettyPhoto[woo_single_pretty_photo]">';
			$our_html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
			$our_html .= '</a></div>';

			$html = $our_html;
		}

		return $html;
	}

	if ( version_compare( WOOCOMMERCE_VERSION, '3.0' ) >= 0 ) {
		add_filter( 'woocommerce_single_product_image_thumbnail_html', 'moments_qodef_woocommerce_single_add_pretty_photo_for_images', 10, 2 );
	}
}