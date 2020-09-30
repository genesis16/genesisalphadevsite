<?php
$blog_archive_pages_classes = moments_qodef_blog_archive_pages_classes(moments_qodef_get_default_blog_list());
?>
<?php get_header(); ?>
<?php moments_qodef_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
	<?php do_action('moments_qodef_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php moments_qodef_get_blog(moments_qodef_get_default_blog_list()); ?>
	</div>
	<?php do_action('moments_qodef_before_container_close'); ?>
</div>
<?php get_footer(); ?>
