<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php moments_qodef_inline_style($button_styles); ?> <?php moments_qodef_class_attribute($button_classes); ?> <?php echo moments_qodef_get_inline_attrs($button_data); ?> <?php echo moments_qodef_get_inline_attrs($button_custom_attrs); ?>>
    <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo moments_qodef_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>