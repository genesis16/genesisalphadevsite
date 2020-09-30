<div class="qodef-social-share-holder qodef-dropdown">
    <a href="javascript:void(0)" target="_self" class="qodef-social-share-dropdown-opener">
        <i class="social_share"></i>
        <span class="qodef-social-share-title"><?php esc_html_e( 'Share', 'select-core' ) ?></span>
    </a>
    <div class="qodef-social-share-dropdown">
        <ul>
			<?php foreach ( $networks as $net ) {
				if ( function_exists( 'moments_qodef_get_module_part' ) ) {
					print moments_qodef_get_module_part( $net );
				}
			} ?>
        </ul>
    </div>
</div>