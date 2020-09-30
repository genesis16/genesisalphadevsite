<?php
if(!function_exists('moments_qodef_design_styles')) {
    /**
     * Generates general custom styles
     */
    function moments_qodef_design_styles() {

        $preload_background_styles = array();

        if(moments_qodef_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.moments_qodef_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(QODE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo moments_qodef_dynamic_css('.qodef-preload-background', $preload_background_styles);

		if (moments_qodef_options()->getOptionValue('google_fonts')){
			$font_family = moments_qodef_options()->getOptionValue('google_fonts');
			if(moments_qodef_is_font_option_valid($font_family)) {
				echo moments_qodef_dynamic_css('body', array('font-family' => moments_qodef_get_font_option_val($font_family)));
			}
		}

        if(moments_qodef_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                '.qodef-main-menu ul li.qodef-active-item a',
                '.qodef-main-menu ul li:hover a',
                '.qodef-mobile-header .qodef-mobile-nav a:hover',
                '.qodef-mobile-header .qodef-mobile-nav h4:hover',
                '.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
                '.qodef-title.qodef-breadcrumb-type .qodef-title-holder .qodef-breadcrumbs .qodef-current',
                '.qodef-title.qodef-breadcrumb-type .qodef-title-holder .qodef-breadcrumbs a:hover',
                '.qodef-side-menu-button-opener:hover',
                'nav.qodef-fullscreen-menu ul li a:hover',
                'nav.qodef-fullscreen-menu ul li ul li a',
                '.qodef-team .qodef-team-social .qodef-icon-shortcode i:hover',
                '.qodef-team .qodef-team-social .qodef-icon-shortcode span:hover',
                '.qodef-ordered-list ol>li:before',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder-inner .font_elegant',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder-inner i',
                '.qodef-blog-list-holder .qodef-item-info-section',
                '.qodef-blog-list-holder .qodef-item-info-section span',
                '.qodef-blog-list-holder .qodef-item-info-section>div a',
                '.qodef-blog-list-holder .qodef-item-info-section>div:before',
                '.qodef-video-button-play .qodef-video-button-wrapper:hover',
                '.qodef-dropcaps',
                '.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown ul li a:hover',
                '.qodef-social-share-holder.qodef-list li a:hover',
                '.qodef-twitter-widget li .qodef-social-twitter',
                '.qodef-sidebar .widget ul li a:hover',
                '.qodef-sidebar .widget td a:hover',
                '.qodef-sidebar .widget.widget_product_tag_cloud a:hover',
                '.qodef-sidebar .widget.widget_tag_cloud a:hover',
                '.qodef-blog-holder article .qodef-post-info a',
                '.qodef-blog-holder article.sticky .qodef-post-title a',
                '.qodef-filter-blog-holder li.qodef-active',
                '.qodef-blog-holder.qodef-blog-single .qodef-author-description .qodef-author-social-holder a:hover',
                '.qodef-blog-holder.qodef-blog-single .qodef-blog-single-navigation .qodef-blog-navigation-info:hover',
                '.qodef-blog-holder.qodef-blog-single .qodef-single-tags-holder .qodef-tags a:hover',
                '.qodef-woocommerce-page .products .product .added_to_cart',
                '.woocommerce .products .product .added_to_cart',
                '.qodef-single-product-summary .entry-summary .qodef-woocommerce-single-share .qodef-social-share-holder a:hover',
                '.qodef-single-product-summary .group_table td.label a:hover',
                '.qodef-woocommerce-page .qodef-cart-totals .cart_totals #shipping_method label:after',
                '.woocommerce .qodef-cart-totals .cart_totals #shipping_method label:after',
                '.qodef-woocommerce-page .cart-empty',
                '.woocommerce .cart-empty',
                '.qodef-woocommerce-page .cart-empty:before',
                '.woocommerce .cart-empty:before',
                '.qodef-woocommerce-page .return-to-shop .button.wc-backward:hover',
                '.woocommerce .return-to-shop .button.wc-backward:hover',
                '.qodef-woocommerce-page .woocommerce-checkout label[for=ship-to-different-address-checkbox]:after',
                '.qodef-woocommerce-page .woocommerce-checkout label[for=createaccount]:after',
                '.woocommerce .woocommerce-checkout label[for=ship-to-different-address-checkbox]:after',
                '.woocommerce .woocommerce-checkout label[for=createaccount]:after',
                '.qodef-woocommerce-page .woocommerce-checkout .woocommerce-checkout-review-order-table thead tr th',
                '.woocommerce .woocommerce-checkout .woocommerce-checkout-review-order-table thead tr th',
                '.qodef-woocommerce-page .woocommerce-checkout .woocommerce-checkout-review-order-table tfoot tr th',
                '.woocommerce .woocommerce-checkout .woocommerce-checkout-review-order-table tfoot tr th',
                '.qodef-woocommerce-page .woocommerce-checkout .woocommerce-checkout-review-order-table tfoot #shipping_method label:after',
                '.woocommerce .woocommerce-checkout .woocommerce-checkout-review-order-table tfoot #shipping_method label:after',
                '.qodef-woocommerce-page .woocommerce-checkout .woocommerce-checkout-payment .wc_payment_methods label:after',
                '.woocommerce .woocommerce-checkout .woocommerce-checkout-payment .wc_payment_methods label:after',
                '.qodef-woocommerce-page.woocommerce-account .myaccount_user a',
                '.qodef-woocommerce-page.woocommerce-account .my_account_orders thead th',
                '.qodef-woocommerce-page.woocommerce-account .address .title a',
                '.qodef-woocommerce-page.woocommerce-account .edit-account fieldset legend',
                '.qodef-woocommerce-page.woocommerce-account .track_order p.form-row-first label',
                '.qodef-woocommerce-page.woocommerce-account .track_order p.form-row-last label',
                '.qodef-woocommerce-page.woocommerce-account #customer_login .col-1 label[for=rememberme]:after',
                '.qodef-woocommerce-page.woocommerce-account.woocommerce-view-order .order-info',
                '.qodef-woocommerce-page.woocommerce-account.woocommerce-view-order .order_details thead th',
                '.qodef-woocommerce-page.woocommerce-account.woocommerce-view-order .order_details tfoot th',
                '.qodef-woocommerce-page.woocommerce-account.woocommerce-view-order .customer_details tbody th',
                '.qodef-woocommerce-page.woocommerce-checkout.woocommerce-order-received .woocommerce-thankyou-order-received',
                '.qodef-woocommerce-page.woocommerce-checkout.woocommerce-order-received .shop_table.order_details thead th',
                '.qodef-woocommerce-page.woocommerce-checkout.woocommerce-order-received .shop_table.order_details tfoot th',
                '.qodef-woocommerce-page.woocommerce-checkout.woocommerce-order-received .customer_details tbody th',
                '.qodef-woocommerce-page .woocommerce-MyAccount-navigation ul li.is-active a',
                '.qodef-woocommerce-page .woocommerce-MyAccount-navigation ul li a:hover',
                '.qodef-shopping-cart-dropdown span.qodef-total span',
                '.qodef-main-menu>ul>li>a .qodef-featured-icon',
                '.qodef-drop-down .second .inner .qodef-featured-icon'
            );

            $color_important_selector = array(

            );

            $background_color_selector = array(
                '.qodef-st-loader .pulse',
                '.qodef-st-loader .double_pulse .double-bounce1',
                '.qodef-st-loader .double_pulse .double-bounce2',
                '.qodef-st-loader .cube',
                '.qodef-st-loader .rotating_cubes .cube1',
                '.qodef-st-loader .rotating_cubes .cube2',
                '.qodef-st-loader .stripes>div',
                '.qodef-st-loader .wave>div',
                '.qodef-st-loader .two_rotating_circles .dot1',
                '.qodef-st-loader .two_rotating_circles .dot2',
                '.qodef-st-loader .five_rotating_circles .container1>div',
                '.qodef-st-loader .five_rotating_circles .container2>div',
                '.qodef-st-loader .five_rotating_circles .container3>div',
                '.qodef-st-loader .atom .ball-1:before',
                '.qodef-st-loader .atom .ball-2:before',
                '.qodef-st-loader .atom .ball-3:before',
                '.qodef-st-loader .atom .ball-4:before',
                '.qodef-st-loader .clock .ball:before',
                '.qodef-st-loader .mitosis .ball',
                '.qodef-st-loader .lines .line1',
                '.qodef-st-loader .lines .line2',
                '.qodef-st-loader .lines .line3',
                '.qodef-st-loader .lines .line4',
                '.qodef-st-loader .fussion .ball',
                '.qodef-st-loader .fussion .ball-1',
                '.qodef-st-loader .fussion .ball-2',
                '.qodef-st-loader .fussion .ball-3',
                '.qodef-st-loader .fussion .ball-4',
                '.qodef-st-loader .wave_circles .ball',
                '.qodef-st-loader .pulse_circles .ball',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '#qodef-back-to-top>span',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:before',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:after',
                '.qodef-title',
                'footer .widget #searchform input[type=submit]:hover',
                'footer .widget .qodef-footer-subscription-form input[type=submit]:hover',
                'footer .widget .woocommerce-product-search input[type=submit]:hover',
                '.qodef-fullscreen-menu-opener:hover .qodef-line',
                '.qodef-fullscreen-menu-opener.opened:hover .qodef-line:after',
                '.qodef-fullscreen-menu-opener.opened:hover .qodef-line:before',
                '.qodef-icon-shortcode.circle',
                '.qodef-icon-shortcode.square',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content',
                '.qodef-pie-chart-doughnut-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-pie-chart-pie-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-active',
                '.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-hover',
                '.qodef-btn.qodef-btn-solid',
                '.qodef-dropcaps.qodef-circle',
                '.qodef-dropcaps.qodef-square',
                '.qodef-portfolio-list-holder article .qodef-item-icons-holder a',
                '.qodef-service-table .qodef-service-table-inner ul li.qodef-table-title',
                '.qodef-sidebar .widget.widget_product_search #searchform input[type=submit]:hover',
                '.qodef-sidebar .widget.widget_product_search .woocommerce-product-search input[type=submit]:hover',
                '.qodef-sidebar .widget.widget_search #searchform input[type=submit]:hover',
                '.qodef-sidebar .widget.widget_search .woocommerce-product-search input[type=submit]:hover',
                '.qodef-sidebar .widget.widget_price_filter .ui-slider-handle',
                '.qodef-sidebar .widget.widget_price_filter .price_slider_amount .button:hover',
                '.qodef-woocommerce-page .product .qodef-onsale',
                '.qodef-woocommerce-page .product .qodef-out-of-stock-button',
                '.woocommerce .product .qodef-onsale',
                '.woocommerce .product .qodef-out-of-stock-button',
                '.qodef-woocommerce-page .product .qodef-out-of-stock-button',
                '.woocommerce .product .qodef-out-of-stock-button',
                '.qodef-woocommerce-page .return-to-shop .button.wc-backward',
                '.woocommerce .return-to-shop .button.wc-backward',
                '.qodef-woocommerce-page.woocommerce-account .track_order p:first-child',
                '.qodef-woocommerce-page.woocommerce-account.woocommerce-view-order .order-info mark',
                '.qodef-shopping-cart-outer .qodef-shopping-cart-header .qodef-cart-label',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .checkout:hover',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .view-cart:hover'
            );

            $background_color_important_selector = array(
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover',
                '.woocommerce input[type=submit].qodef-btn.qodef-btn-solid:hover',
                '.woocommerce form.checkout_coupon input[type=submit]:hover',
                '.woocommerce form.edit-account input[type=submit]:hover',
                '.woocommerce form.login input[type=submit]:hover',
                '.woocommerce form.lost_reset_password input[type=submit]:hover',
                '.woocommerce form.register input[type=submit]:hover',
                '.woocommerce form.track_order input[type=submit]:hover',
                '.woocommerce input[name=save_address]:hover',
                '.qodef-woocommerce-page .woocommerce-error a:hover',
                '.qodef-woocommerce-page .woocommerce-info a:hover',
                '.qodef-woocommerce-page .woocommerce-message a:hover',
                '.woocommerce .woocommerce-error a:hover',
                '.woocommerce .woocommerce-info a:hover',
                '.woocommerce .woocommerce-message a:hover',
                '.woocommerce-page .woocommerce-error a:hover',
                '.woocommerce-page .woocommerce-info a:hover',
                '.woocommerce-page .woocommerce-message a:hover',
                '.qodef-woocommerce-page .qodef-cart-totals .cart_totals .shipping-calculator-button:hover',
                '.qodef-woocommerce-page .qodef-cart-totals .cart_totals .shipping-calculator-form .qodef-btn.qodef-btn-solid:hover',
                '.woocommerce .qodef-cart-totals .cart_totals .shipping-calculator-button:hover',
                '.woocommerce .qodef-cart-totals .cart_totals .shipping-calculator-form .qodef-btn.qodef-btn-solid:hover'
            );

            $border_color_selector = array(
                '.qodef-st-loader .pulse_circles .ball',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-active',
                '.qodef-accordion-holder.qodef-boxed .qodef-title-holder.ui-state-hover',
                '.qodef-btn.qodef-btn-solid',
                '.qodef-portfolio-list-holder article .qodef-item-icons-holder a',
                '.qodef-sidebar .widget.widget_price_filter .price_slider_amount .button:hover',
                '.qodef-woocommerce-page .return-to-shop .button.wc-backward',
                '.woocommerce .return-to-shop .button.wc-backward',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .checkout:hover',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .view-cart:hover'
            );

            $border_color_important_selector = array(
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover',
                '.woocommerce input[type=submit].qodef-btn.qodef-btn-solid:hover',
                '.woocommerce form.checkout_coupon input[type=submit]:hover',
                '.woocommerce form.edit-account input[type=submit]:hover',
                '.woocommerce form.login input[type=submit]:hover',
                '.woocommerce form.lost_reset_password input[type=submit]:hover',
                '.woocommerce form.register input[type=submit]:hover',
                '.woocommerce form.track_order input[type=submit]:hover',
                '.woocommerce input[name=save_address]:hover',
                '.qodef-woocommerce-page .woocommerce-error a:hover',
                '.qodef-woocommerce-page .woocommerce-info a:hover',
                '.qodef-woocommerce-page .woocommerce-message a:hover',
                '.woocommerce .woocommerce-error a:hover',
                '.woocommerce .woocommerce-info a:hover',
                '.woocommerce .woocommerce-message a:hover',
                '.woocommerce-page .woocommerce-error a:hover',
                '.woocommerce-page .woocommerce-info a:hover',
                '.woocommerce-page .woocommerce-message a:hover',
                '.qodef-woocommerce-page .qodef-cart-totals .cart_totals .shipping-calculator-button:hover',
                '.qodef-woocommerce-page .qodef-cart-totals .cart_totals .shipping-calculator-form .qodef-btn.qodef-btn-solid:hover',
                '.woocommerce .qodef-cart-totals .cart_totals .shipping-calculator-button:hover',
                '.woocommerce .qodef-cart-totals .cart_totals .shipping-calculator-form .qodef-btn.qodef-btn-solid:hover'
            );

            $border_top_color_selector = array(
                '.qodef-drop-down .second'
            );

            $border_bottom_color_selector = array (
                '.qodef-sidebar .widget ul li a:hover',
                '.qodef-woocommerce-page.woocommerce-account #customer_login .col-1 .lost_password a:hover:after'
            );

            echo moments_qodef_dynamic_css($color_selector, array('color' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css($color_important_selector, array('color' => moments_qodef_options()->getOptionValue('first_color').'!important'));
            echo moments_qodef_dynamic_css('::selection', array('background' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css('::-moz-selection', array('background' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css($background_color_selector, array('background-color' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css($background_color_important_selector, array('background-color' => moments_qodef_options()->getOptionValue('first_color').'!important'));
            echo moments_qodef_dynamic_css($border_color_selector, array('border-color' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css($border_color_important_selector, array('border-color' => moments_qodef_options()->getOptionValue('first_color').'!important'));
            echo moments_qodef_dynamic_css($border_top_color_selector, array('border-top-color' => moments_qodef_options()->getOptionValue('first_color')));
            echo moments_qodef_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => moments_qodef_options()->getOptionValue('first_color')));
        }

		if (moments_qodef_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
                '.qodef-content .qodef-content-inner > .qodef-container',
                '.qodef-content .qodef-content-inner > .qodef-full-width'
			);
			echo moments_qodef_dynamic_css($background_color_selector, array('background-color' => moments_qodef_options()->getOptionValue('page_background_color')));
		}

		if (moments_qodef_options()->getOptionValue('selection_color')) {
			echo moments_qodef_dynamic_css('::selection', array('background' => moments_qodef_options()->getOptionValue('selection_color')));
			echo moments_qodef_dynamic_css('::-moz-selection', array('background' => moments_qodef_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (moments_qodef_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = moments_qodef_options()->getOptionValue('page_background_color_in_box');
		}

		if (moments_qodef_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(moments_qodef_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (moments_qodef_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(moments_qodef_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (moments_qodef_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (moments_qodef_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo moments_qodef_dynamic_css('.qodef-boxed .qodef-wrapper', $boxed_background_style);
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_design_styles');
}

if (!function_exists('moments_qodef_h1_styles')) {

    function moments_qodef_h1_styles() {

        $h1_styles = array();

        if(moments_qodef_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = moments_qodef_options()->getOptionValue('h1_color');
        }
        if(moments_qodef_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h1_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = moments_qodef_options()->getOptionValue('h1_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = moments_qodef_options()->getOptionValue('h1_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = moments_qodef_options()->getOptionValue('h1_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo moments_qodef_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h1_styles');
}

if (!function_exists('moments_qodef_h2_styles')) {

    function moments_qodef_h2_styles() {

        $h2_styles = array();

        if(moments_qodef_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = moments_qodef_options()->getOptionValue('h2_color');
        }
        if(moments_qodef_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h2_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = moments_qodef_options()->getOptionValue('h2_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = moments_qodef_options()->getOptionValue('h2_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = moments_qodef_options()->getOptionValue('h2_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo moments_qodef_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h2_styles');
}

if (!function_exists('moments_qodef_h3_styles')) {

    function moments_qodef_h3_styles() {

        $h3_styles = array();

        if(moments_qodef_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = moments_qodef_options()->getOptionValue('h3_color');
        }
        if(moments_qodef_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h3_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = moments_qodef_options()->getOptionValue('h3_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = moments_qodef_options()->getOptionValue('h3_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = moments_qodef_options()->getOptionValue('h3_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo moments_qodef_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h3_styles');
}

if (!function_exists('moments_qodef_h4_styles')) {

    function moments_qodef_h4_styles() {

        $h4_styles = array();

        if(moments_qodef_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = moments_qodef_options()->getOptionValue('h4_color');
        }
        if(moments_qodef_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h4_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = moments_qodef_options()->getOptionValue('h4_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = moments_qodef_options()->getOptionValue('h4_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = moments_qodef_options()->getOptionValue('h4_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo moments_qodef_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h4_styles');
}

if (!function_exists('moments_qodef_h5_styles')) {

    function moments_qodef_h5_styles() {

        $h5_styles = array();

        if(moments_qodef_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = moments_qodef_options()->getOptionValue('h5_color');
        }
        if(moments_qodef_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h5_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = moments_qodef_options()->getOptionValue('h5_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = moments_qodef_options()->getOptionValue('h5_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = moments_qodef_options()->getOptionValue('h5_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo moments_qodef_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h5_styles');
}

if (!function_exists('moments_qodef_h6_styles')) {

    function moments_qodef_h6_styles() {

        $h6_styles = array();

        if(moments_qodef_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = moments_qodef_options()->getOptionValue('h6_color');
        }
        if(moments_qodef_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('h6_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = moments_qodef_options()->getOptionValue('h6_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = moments_qodef_options()->getOptionValue('h6_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = moments_qodef_options()->getOptionValue('h6_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo moments_qodef_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_h6_styles');
}

if (!function_exists('moments_qodef_text_styles')) {

    function moments_qodef_text_styles() {

        $text_styles = array();

        if(moments_qodef_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = moments_qodef_options()->getOptionValue('text_color');
        }
        if(moments_qodef_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = moments_qodef_get_formatted_font_family(moments_qodef_options()->getOptionValue('text_google_fonts'));
        }
        if(moments_qodef_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('text_fontsize')).'px';
        }
        if(moments_qodef_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('text_lineheight')).'px';
        }
        if(moments_qodef_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = moments_qodef_options()->getOptionValue('text_texttransform');
        }
        if(moments_qodef_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = moments_qodef_options()->getOptionValue('text_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = moments_qodef_options()->getOptionValue('text_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = moments_qodef_filter_px(moments_qodef_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo moments_qodef_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_text_styles');
}

if (!function_exists('moments_qodef_link_styles')) {

    function moments_qodef_link_styles() {

        $link_styles = array();

        if(moments_qodef_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = moments_qodef_options()->getOptionValue('link_color');
        }
        if(moments_qodef_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = moments_qodef_options()->getOptionValue('link_fontstyle');
        }
        if(moments_qodef_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = moments_qodef_options()->getOptionValue('link_fontweight');
        }
        if(moments_qodef_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = moments_qodef_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo moments_qodef_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_link_styles');
}

if (!function_exists('moments_qodef_link_hover_styles')) {

    function moments_qodef_link_hover_styles() {

        $link_hover_styles = array();

        if(moments_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = moments_qodef_options()->getOptionValue('link_hovercolor');
        }
        if(moments_qodef_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = moments_qodef_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo moments_qodef_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(moments_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = moments_qodef_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo moments_qodef_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_link_hover_styles');
}

if (!function_exists('moments_qodef_smooth_page_transition_styles')) {

    function moments_qodef_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(moments_qodef_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = moments_qodef_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.qodef-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo moments_qodef_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(moments_qodef_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = moments_qodef_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.qodef-st-loader .pulse', 
            '.qodef-st-loader .double_pulse .double-bounce1', 
            '.qodef-st-loader .double_pulse .double-bounce2', 
            '.qodef-st-loader .cube', 
            '.qodef-st-loader .rotating_cubes .cube1', 
            '.qodef-st-loader .rotating_cubes .cube2', 
            '.qodef-st-loader .stripes > div', 
            '.qodef-st-loader .wave > div', 
            '.qodef-st-loader .two_rotating_circles .dot1', 
            '.qodef-st-loader .two_rotating_circles .dot2', 
            '.qodef-st-loader .five_rotating_circles .container1 > div', 
            '.qodef-st-loader .five_rotating_circles .container2 > div', 
            '.qodef-st-loader .five_rotating_circles .container3 > div', 
            '.qodef-st-loader .atom .ball-1:before', 
            '.qodef-st-loader .atom .ball-2:before', 
            '.qodef-st-loader .atom .ball-3:before', 
            '.qodef-st-loader .atom .ball-4:before', 
            '.qodef-st-loader .clock .ball:before', 
            '.qodef-st-loader .mitosis .ball', 
            '.qodef-st-loader .lines .line1', 
            '.qodef-st-loader .lines .line2', 
            '.qodef-st-loader .lines .line3', 
            '.qodef-st-loader .lines .line4', 
            '.qodef-st-loader .fussion .ball', 
            '.qodef-st-loader .fussion .ball-1', 
            '.qodef-st-loader .fussion .ball-2', 
            '.qodef-st-loader .fussion .ball-3', 
            '.qodef-st-loader .fussion .ball-4', 
            '.qodef-st-loader .wave_circles .ball', 
            '.qodef-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
            echo moments_qodef_dynamic_css($spinner_selectors, $spinner_style);
        }


        //Overlapping diamonds custom style

        $diamond_first_style = array();

        if(moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_1') !== '') {
            $diamond_first_style['background-color'] = moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_1');
        }

        $diamond_first_selector = array(
            '.overlapping-diamonds-first'
        );

        if (!empty($spinner_style)) {
            echo moments_qodef_dynamic_css($diamond_first_selector, $diamond_first_style);
        }

        $diamond_second_style = array();

        if(moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_2') !== '') {
            $diamond_second_style['background-color'] = moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_2');
        }

        $diamond_second_selector = array(
            '.overlapping-diamonds-second'
        );

        if (!empty($spinner_style)) {
            echo moments_qodef_dynamic_css($diamond_second_selector, $diamond_second_style);
        }

        $diamond_blend_style = array();

        if(moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_overlap') !== '') {
            $diamond_blend_style['background-color'] = moments_qodef_options()->getOptionValue('smooth_pt_spinner_multiple_color_overlap');
        }

        $diamond_blend_selector = array(
            '.overlapping-diamonds-blend'
        );

        if (!empty($spinner_style)) {
            echo moments_qodef_dynamic_css($diamond_blend_selector, $diamond_blend_style);
        }
    }

    add_action('moments_qodef_style_dynamic', 'moments_qodef_smooth_page_transition_styles');
}