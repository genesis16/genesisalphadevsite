<?php
    /*
        Template Name: Blog: Standard
    */
?>
<?php get_header(); ?>
<?php moments_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
<?php the_content(); ?>
<div class="qodef-container">
    <?php do_action('moments_qodef_after_container_open'); ?>
    <div class="qodef-container-inner" >
        <?php moments_qodef_get_blog('standard'); ?>
    </div>
    <?php do_action('moments_qodef_before_container_close'); ?>
</div>
<?php get_footer(); ?>