<?php do_action( 'moments_qodef_before_mobile_navigation' ); ?>

<?php if ( has_nav_menu( 'main-navigation' ) ) : ?>
    <nav class="qodef-mobile-nav" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'moments' ); ?>">
        <div class="qodef-grid">
			<?php wp_nav_menu( array(
				'theme_location'  => 'main-navigation',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'fallback_cb'     => 'top_navigation_fallback',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'walker'          => new MomentsQodefMobileNavigationWalker()
			) ); ?>
        </div>
    </nav>
<?php endif; ?>

<?php do_action( 'moments_qodef_after_mobile_navigation' ); ?>