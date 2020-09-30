<li class="qodef-blog-list-item clearfix">
	<div class="qodef-blog-list-item-inner">
		<div class="qodef-item-image">
			<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
				<?php
					 echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>
		<div class="qodef-item-text-holder">
			<<?php echo esc_html( $title_tag)?> itemprop="headings" class="qodef-item-title entry-title">
				<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>

            <?php if($show_date == 'yes' || $show_category == 'yes' || $show_author == 'yes' || $show_comments == 'yes' || $show_likes == 'yes') { ?>
            <div class="qodef-item-info-section">
                <?php moments_qodef_post_info(array(
                    'date' => $show_date,
                    'category' => $show_category,
                    'author' => $show_author,
                    'comments' => $show_comments,
                    'like' => $show_likes
                )) ?>
            </div>
            <?php } ?>
			
			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p itemprop="description" class="qodef-excerpt"><?php echo esc_html($excerpt)?><?php esc_html_e( '...', 'select-core' ); ?></p>
			<?php } ?>

            <?php
                moments_qodef_read_more_button('','qodef-blog-list-button');
            ?>
		</div>
	</div>	
</li>