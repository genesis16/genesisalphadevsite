<div itemprop="dateCreated" class="qodef-post-info-date entry-date updated">
	<?php if(!moments_qodef_post_has_title()) { ?>
	<a itemprop="url" href="<?php the_permalink() ?>">
	<?php } ?>
		<?php the_time(get_option('date_format')); ?>
	<?php if(!moments_qodef_post_has_title()) { ?>
	</a>
	<?php } ?>
	<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(moments_qodef_get_page_id()); ?>"/>
</div>