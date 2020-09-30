<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-post-info">
					<?php moments_qodef_post_info(array('date' => 'yes', 'author' => 'no', 'category' => 'yes', 'comments' => 'no', 'share' => 'no', 'like' => 'no')) ?>
				</div>
                <h5 class="qodef-post-title">
                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php echo esc_html($quote_text); ?>
                    </a>
                </h5>
                <span itemprop="headings" class="qodef-quote-author entry-title">&ndash; <?php the_title(); ?></span>
			</div>
		</div>
	</div>
</article>