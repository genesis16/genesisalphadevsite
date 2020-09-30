<div class="qodef-message  <?php echo esc_attr( $message_classes ) ?>" <?php echo moments_qodef_get_inline_style( $message_styles ); ?>>
    <div class="qodef-message-inner">
        <div class="qodef-message-text-holder">
            <div class="qodef-message-text">
                <div class="qodef-message-text-inner"><?php echo do_shortcode( $content ); ?></div>
            </div>
			<?php
			if ( $type == 'with_icon' ) {
				$icon_html = select_core_get_shortcode_template_part( 'templates/' . $type, 'message', '', $params );
				if ( function_exists( 'moments_qodef_get_module_part' ) ) {
					print moments_qodef_get_module_part( $icon_html );
				}
			}
			?>
        </div>
        <a href="#" class="qodef-close"><i class="q_font_elegant_icon icon_close" <?php echo moments_qodef_get_inline_style( $close_icon_styles ); ?>></i></a>
    </div>
</div>