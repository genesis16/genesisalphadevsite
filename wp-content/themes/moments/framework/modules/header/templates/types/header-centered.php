<?php do_action('moments_qodef_before_page_header'); ?>
<?php $widget_area = moments_qodef_get_header_widget_area(); ?>
<header class="qodef-page-header">
    <?php if($show_fixed_wrapper) : ?>
        <div class="qodef-fixed-wrapper">
    <?php endif; ?>
    <div class="qodef-menu-area" <?php moments_qodef_inline_style($menu_area_centered_background_color); ?>>
        <?php if($menu_area_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
			<?php do_action( 'moments_qodef_after_header_menu_area_html_open' )?>
            <div class="qodef-vertical-align-containers">
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <?php if(!$hide_logo) {
                            moments_qodef_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-center">
                    <div class="qodef-position-center-inner">
                        <?php moments_qodef_get_main_menu(); ?>
                    </div>
                </div>

                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
                        <?php if (is_active_sidebar($widget_area)) {
                            dynamic_sidebar($widget_area);
                        } ?>
                    </div>
                </div>
            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        moments_qodef_get_sticky_header();
    } ?>
</header>

<?php do_action('moments_qodef_after_page_header'); ?>

