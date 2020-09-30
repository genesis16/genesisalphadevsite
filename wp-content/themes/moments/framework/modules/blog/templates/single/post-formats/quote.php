<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner clearfix">
				<div class="qodef-post-info">
					<?php moments_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'yes', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
                <h5 class="qodef-post-title">
                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php echo esc_html($quote_text); ?>
                    </a>
                </h5>
                <span class="quote_author entry-title" itemprop="headings">&ndash; <?php the_title(); ?></span>
			</div>
		</div>
        <?php the_content(); ?>
	</div>
    <div class="qodef-post-info-bottom clearfix">
        <?php do_action('moments_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>