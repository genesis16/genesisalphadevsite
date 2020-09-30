<?php
/**
 * Custom Font shortcode template
 */
?>

<<?php echo esc_attr( $custom_font_tag ); ?> class="qodef-custom-font-holder" <?php moments_qodef_inline_style( $custom_font_style ); ?> <?php echo esc_attr( $custom_font_data ); ?>>
<?php if ( function_exists( 'moments_qodef_get_module_part' ) ) {
	print moments_qodef_get_module_part( $content_custom_font );
} ?>
</<?php echo esc_attr( $custom_font_tag ); ?>>