<div class="qodef-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="qodef-progress-title-holder clearfix">
		<span class="qodef-progress-title"><?php echo esc_attr($title)?></span>
		<span class="qodef-progress-number-wrapper" >
			<span class="qodef-progress-number" <?php moments_qodef_inline_style($percentage_box_style); ?>>
				<span class="qodef-percent">0</span>
                <span class="qodef-down-arrow" <?php moments_qodef_inline_style($percentage_box_arrow_style); ?>></span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="qodef-progress-content-outer" <?php moments_qodef_inline_style($bar_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="qodef-progress-content" <?php moments_qodef_inline_style($active_bar_style); ?>></div>
	</div>
</div>	