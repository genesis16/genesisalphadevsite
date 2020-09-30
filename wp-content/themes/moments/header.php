<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see moments_qodef_header_meta() - hooked with 10
     * @see qode_user_scalable - hooked with 10
     */
    ?>
	<?php if (!moments_qodef_is_ajax_request()) do_action('moments_qodef_header_meta'); ?>

	<?php if (!moments_qodef_is_ajax_request()) wp_head(); ?>
</head>

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
<?php if (!moments_qodef_is_ajax_request()) moments_qodef_get_side_area(); ?>


<?php 
if((!moments_qodef_is_ajax_request()) && moments_qodef_options()->getOptionValue('smooth_page_transitions') == "yes") {
    $ajax_class = 'qodef-mimic-ajax';
?>
<div class="qodef-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
    <div class="qodef-st-loader">
        <div class="qodef-st-loader1">
            <?php moments_qodef_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="qodef-split-loader">
    <div class="qodef-split-line1"></div>
    <div class="qodef-split-line2"></div>

    <div class="qodef-split-line3"></div>
    <div class="qodef-split-line4"></div>
</div>

<div class="qodef-wrapper">
    <div class="qodef-wrapper-inner">
        <?php if (!moments_qodef_is_ajax_request()) moments_qodef_get_header(); ?>

        <?php if ((!moments_qodef_is_ajax_request()) && moments_qodef_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='qodef-back-to-top'  href='#'>
                <span class="qodef-icon-stack">
                     <?php
                        moments_qodef_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php if (!moments_qodef_is_ajax_request()) moments_qodef_get_full_screen_menu(); ?>

        <div class="qodef-content" <?php moments_qodef_content_elem_style_attr(); ?>>
            <?php if(moments_qodef_is_ajax_enabled()) { ?>
            <div class="qodef-meta">
                <?php do_action('moments_qodef_ajax_meta'); ?>
                <span id="qodef-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="qodef-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="qodef-content-inner">