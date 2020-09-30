<?php
if(isset($post_id)){
	$id = $post_id;
}else{
	$id = get_the_ID();
}

if(moments_qodef_options()->getOptionValue('blog_single_navigation') == 'yes'){

	$prev_post = get_previous_post($id);
	$next_post = get_next_post($id);
	$navigation_blog_through_category = moments_qodef_options()->getOptionValue('blog_navigation_through_same_category');

	?>
	<div class="qodef-blog-single-navigation">
		<div class="qodef-blog-single-navigation-inner clearfix">
			<?php if(get_previous_post($id) != ""){ ?>
				<div class="qodef-blog-single-prev-holder">

					<?php if(has_post_thumbnail($prev_post->ID)){
						$prev_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'large');
						?>
						<div class="qodef-blog-single-prev" style="background-image: url(' <?php echo moments_qodef_kses_img($prev_post_image[0]); ?> ')">
							<?php

							if($navigation_blog_through_category == 'yes'){
								previous_post_link('%link',$prev_post_image, true,'','category');
							} else {
								previous_post_link('%link');
							}

							?>
						</div>
					<?php } ?>

					<div class="qodef-blog-single-prev-info">

						<div class="qodef-blog-navigation-info-holder clearfix">
							<h4 itemprop="headings" class="qodef-blog-single-nav-title">
								<a itemprop="url" href="<?php echo get_permalink($prev_post->ID)?>">
									<?php echo esc_attr(get_the_title($prev_post->ID))?>
								</a>
							</h4>
						</div>

						<a itemprop="url" href="<?php echo get_permalink($prev_post->ID)?>" >
							<span class="qodef-blog-navigation-info">
								<?php esc_html_e( 'Previous post', 'moments' )?>
							</span>
						</a>

					</div>

				</div>
			<?php } ?>
			<?php if(get_next_post($id) != ""){ ?>
				<div class="qodef-blog-single-next-holder">
					<div class="qodef-blog-single-next-info clearfix">
						<div class="qodef-blog-navigation-info-holder clearfix">

							<h4 itemprop="headings" class="qodef-blog-single-nav-title">
								<a itemprop="url" href="<?php echo get_permalink($next_post->ID)?>" class="qodef-blog-single-nav-title">
									<?php echo esc_attr(get_the_title($next_post->ID))?>
								</a>
							</h4>

						</div>
						<a itemprop="url" href="<?php echo get_permalink($next_post->ID)?>" >
							<span class="qodef-blog-navigation-info">
								<?php esc_html_e( 'Next post', 'moments' )?>
							</span>
						</a>
					</div>
					<?php if(has_post_thumbnail($next_post->ID)){

						$next_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'large');
						?>
						<div class="qodef-blog-single-next" style="background-image: url(' <?php echo moments_qodef_kses_img($next_post_image[0]); ?> ')">
							<?php

							if($navigation_blog_through_category == 'yes'){
								next_post_link('%link',$next_post_image, true,'','category');
							} else {
								next_post_link('%link');
							}
							?>
						</div>
					<?php } ?>
				</div>

			<?php } ?>
		</div>
	</div>
<?php } ?>