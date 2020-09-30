<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php moments_qodef_get_module_template_part('templates/single/parts/gallery', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner clearfix">
				<div class="qodef-post-info">
					<?php moments_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'yes', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
                <?php moments_qodef_get_module_template_part('templates/single/parts/title', 'blog'); ?>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
    <div class="qodef-post-info-bottom clearfix">
        <?php do_action('moments_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>