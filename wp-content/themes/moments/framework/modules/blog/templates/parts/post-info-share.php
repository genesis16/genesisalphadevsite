<div class="qodef-blog-share">
	<?php if ( moments_qodef_options()->getOptionValue( 'enable_social_share' ) == 'yes'
	           && moments_qodef_options()->getOptionValue( 'enable_social_share_on_post' ) == 'yes'
	           && moments_qodef_core_installed() ) : ?>
		<?php echo moments_qodef_get_social_share_html(); ?>
	<?php endif; ?>
</div>