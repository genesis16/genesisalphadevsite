<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
    <div class="qodef-product-list-widget-image-wrapper">
        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">

			<?php echo moments_qodef_kses_img( $product->get_image() ); ?>

        </a>
    </div>
    <div class="qodef-product-list-widget-info-wrapper">
        <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
			<?php echo moments_qodef_get_module_part( $product->get_image() ); ?>

            <span class="qodef-product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>
        </a>
        <div class="qodef-product-list-widget-price-wrapper">

			<?php echo moments_qodef_get_module_part( $product->get_price_html() ); ?>

        </div>
    </div>
</li>
