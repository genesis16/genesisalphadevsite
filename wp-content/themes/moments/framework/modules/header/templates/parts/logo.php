<?php do_action( 'moments_qodef_before_site_logo' ); ?>

    <div class="qodef-logo-wrapper">
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php moments_qodef_inline_style( $logo_styles ); ?>>
            <img itemprop="image" class="qodef-normal-logo" src="<?php echo esc_url( $logo_image ); ?>" alt="<?php esc_attr_e( 'Logo', 'moments' ); ?>"/>
			<?php if ( ! empty( $logo_image_dark ) ) { ?>
                <img itemprop="image" class="qodef-dark-logo" src="<?php echo esc_url( $logo_image_dark ); ?>" alt="<?php esc_attr_e( 'Dark logo', 'moments' ); ?>o"/><?php } ?>
			<?php if ( ! empty( $logo_image_light ) ) { ?>
                <img itemprop="image" class="qodef-light-logo" src="<?php echo esc_url( $logo_image_light ); ?>" alt="<?php esc_attr_e( 'Light logo', 'moments' ); ?>"/><?php } ?>
        </a>
    </div>

<?php do_action( 'moments_qodef_after_site_logo' ); ?>