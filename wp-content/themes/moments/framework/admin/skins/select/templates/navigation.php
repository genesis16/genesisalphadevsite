<div class="qodef-tabs-navigation-wrapper">
    <ul class="nav nav-tabs">
		<?php
		foreach ( moments_qodef_options()->adminPages as $key => $page ) {
			$slug = "";
			if ( ! empty( $page->slug ) ) {
				$slug = "_tab" . $page->slug;
			}
			?>
            <li<?php if ( $page->slug == $tab ) {
				echo " class=\"active\"";
			} ?>>
                <a href="<?php echo esc_url( get_admin_url() . 'admin.php?page=moments_qodef_theme_menu' . $slug ); ?>">
					<?php if ( $page->icon !== '' ) { ?>
                        <i class="<?php echo esc_attr( $page->icon ); ?> qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr( $page->title ); ?>"></i>
					<?php } ?>
                    <span><?php echo esc_html( $page->title ); ?></span>
                </a>
            </li>
			<?php
		}
		?>
    </ul>
</div> <!-- close div.qodef-tabs-navigation-wrapper -->