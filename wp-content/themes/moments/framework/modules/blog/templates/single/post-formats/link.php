<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-info">
					<?php moments_qodef_post_info( array( 'date'     => 'yes',
					                                      'author'   => 'no',
					                                      'category' => 'yes',
					                                      'comments' => 'no',
					                                      'share'    => 'no',
					                                      'like'     => 'no'
					) ) ?>
                </div>
                <h5 itemprop="headings" class="qodef-post-title entry-title">
                    <a itemprop="url" target="_blank" href="<?php echo esc_url( get_post_meta( get_the_ID(), "qodef_post_link_link_meta", true ) ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h5>
            </div>
        </div>
		<?php the_content(); ?>
    </div>
    <div class="qodef-post-info-bottom clearfix">
		<?php do_action( 'moments_qodef_before_blog_article_closed_tag' ); ?>
    </div>
</article>