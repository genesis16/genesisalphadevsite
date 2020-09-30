<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
    <div class="qodef-quantity-buttons quantity hidden">
        <input type="hidden" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>"/>
    </div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'moments' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'moments' );
	?>
    <div class="quantity qodef-quantity-buttons">
        <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
        <span class="qodef-quantity-minus"><span aria-hidden="true" class="icon_minus-06"></span></span>
        <input id="<?php echo esc_attr( $input_id ); ?>"
                type="number"
                step="<?php echo esc_attr( $step ); ?>"
			<?php if ( is_numeric( $min_value ) ) : ?>
                min="<?php echo esc_attr( $min_value ); ?>"
			<?php endif; ?>
			<?php if ( is_numeric( $max_value ) ) : ?>
                max="<?php echo esc_attr( $max_value ); ?>"
			<?php endif; ?>
                name="<?php echo esc_attr( $input_name ); ?>"
                value="<?php echo esc_attr( $input_value ); ?>"
                title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'moments' ) ?>"
                class="input-text qty text qodef-quantity-input"
                size="4"/>
        <span class="qodef-quantity-plus"><span aria-hidden="true" class="icon_plus"></span></span>
    </div>
	<?php
}