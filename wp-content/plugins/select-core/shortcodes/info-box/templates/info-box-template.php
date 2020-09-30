<div <?php moments_qodef_class_attribute($holder_classes); ?>>
    <div class="qodef-info-box-holder" <?php moments_qodef_inline_style($box_style); ?>>
        <div class="qodef-info-box-inner">
            <div class="qodef-info-box-icon">
                <?php if($custom_icon != ''): ?>
                    <div class="qodef-custom-icon">
                        <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
                    </div>
                <?php else: ?>
                    <span class="qodef-icon">
                        <?php echo moments_qodef_execute_shortcode('qodef_icon', $icon_parameters); ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="qodef-info-box-title">
                <<?php echo esc_attr($title_tag); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            </div>
            <div class="qodef-info-box-text">
                <p><?php echo esc_html($text); ?></p>
            </div>
            <?php
            if($show_button == "yes" && $button_text !== ''){ ?>
                <div class="qodef-info-box-button">
                    <?php echo moments_qodef_get_button_html(array(
                        'link' => $link,
                        'text' => $button_text,
                        'target' => $target
                    )); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>