<div id="qodef-testimonials<?php echo esc_attr($current_id) ?>" class="qodef-testimonial-content">
	<?php if (has_post_thumbnail($current_id)) { ?>
		<div class="qodef-testimonial-image-holder">
			<?php esc_html(the_post_thumbnail($current_id)) ?>
		</div>
	<?php } ?>
	<div class="qodef-testimonial-content-inner">
		<div class="qodef-testimonial-text-holder">						
			<div class="qodef-testimonial-text-inner">
				<?php if($show_title == "yes"){ ?>
					<h6 class="qodef-testimonial-title">
						<?php echo esc_attr($title) ?>
					</h6>
				<?php }?>
				<p class="qodef-testimonial-text"><?php echo trim($text) ?></p>
				<?php if ($show_author == "yes") { ?>
					<div class = "qodef-testimonial-author">
						<p class="qodef-testimonial-author-text">
                            &ndash; <?php echo esc_attr($author)?>
						</p>
                        <?php if($show_position == "yes" && $job !== ''){ ?>
                            <span class="qodef-testimonials-job">
                                <?php echo esc_attr($job)?>
                            </span>
                        <?php }?>
					</div>
				<?php } ?>				
			</div>
		</div>
	</div>	
</div>
