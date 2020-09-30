<?php
/*
Template Name: Landing Page
*/
$sidebar = moments_qodef_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * moments_qodef_header_meta hook
         *
         * @see moments_qodef_header_meta() - hooked with 10
         * @see qode_user_scalable_meta() - hooked with 10
         */
        if (!moments_qodef_is_ajax_request()) do_action('moments_qodef_header_meta');
        ?>

        <?php if (!moments_qodef_is_ajax_request()) wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php 
if ((!moments_qodef_is_ajax_request()) && moments_qodef_options()->getOptionValue('smooth_page_transitions') == "yes") {
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

<div class="qodef-wrapper">
	<div class="qodef-wrapper-inner">
		<div class="qodef-content">
            <?php if(moments_qodef_is_ajax_enabled()) { ?>
            <div class="qodef-meta">
                <?php do_action('moments_qodef_ajax_meta'); ?>
                <span id="qodef-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="qodef-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
			<div class="qodef-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="qodef-full-width">
					<div class="qodef-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('moments_qodef_page_after_content'); ?>
							<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
								<div <?php echo moments_qodef_sidebar_columns_class(); ?>>
									<div class="qodef-column1 qodef-content-left-from-sidebar">
										<div class="qodef-column-inner">
											<?php the_content(); ?>
											<?php do_action('moments_qodef_page_after_content'); ?>
										</div>
									</div>
									<div class="qodef-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
								<div <?php echo moments_qodef_sidebar_columns_class(); ?>>
									<div class="qodef-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="qodef-column2 qodef-content-right-from-sidebar">
										<div class="qodef-column-inner">
											<?php the_content(); ?>
											<?php do_action('moments_qodef_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>