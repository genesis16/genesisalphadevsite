<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="qodef-blockquote-shortcode" <?php moments_qodef_inline_style($blockquote_style); ?> >
	<span class="qodef-icon-quotations-holder">
		<?php echo moments_qodef_icon_collections()->getQuoteIcon("font_elegant", true); ?>
	</span>
	<<?php echo esc_attr($blockquote_title_tag); ?> class="qodef-blockquote-text">
	<span><?php echo esc_attr($text); ?></span>
	</<?php echo esc_attr($blockquote_title_tag);?>>
</blockquote>