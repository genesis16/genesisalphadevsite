<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php moments_qodef_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-post-info">
					<?php moments_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'yes', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
                <?php moments_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php
                if($type == 'standard') {
                    moments_qodef_excerpt($excerpt_length);
                    $args_pages = array(
                        'before' => '<div class="qodef-single-links-pages"><div class="qodef-single-links-pages-inner">',
                        'after' => '</div></div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '%'
                    );

                    wp_link_pages($args_pages);
                }
                else if($type == 'standard-whole-post') { ?>
                <div class="qodef-post-list-content">
                    <?php the_content(); ?>
                </div>
                <?php }	?>
			</div>
		</div>
        <div class="qodef-post-info-bottom clearfix">
            <?php if($type == 'standard') { ?>
            <div class="qodef-post-read-more-button">
                <?php moments_qodef_read_more_button(); ?>
            </div>
            <?php }	?>
            <?php moments_qodef_post_info(array('date' => 'no', 'author' => 'no', 'category' => 'no', 'comments' => 'no', 'share' => 'yes', 'like' => 'no')) ?>
        </div>
	</div>
</article>