<?php
$icon_html = moments_qodef_icon_collections()->renderIcon( $icon, $icon_pack, $params );
?>
<div class="qodef-icon-list-item">
    <div class="qodef-icon-list-icon-holder">
        <div class="qodef-icon-list-icon-holder-inner clearfix">
			<?php
			if ( function_exists( 'moments_qodef_get_module_part' ) ) {
				print moments_qodef_get_module_part( $icon_html );
			}
			?>
        </div>
    </div>
    <p class="qodef-icon-list-text" <?php echo moments_qodef_get_inline_style( $title_style ) ?> > <?php echo esc_attr( $title ) ?></p>
</div>