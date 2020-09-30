<span class="clearfix qodef-title-holder">
	<span class="qodef-accordion-mark qodef-left-mark">
		<span class="qodef-accordion-mark-icon">
			<span class="ion-plus"></span>
			<span class="ion-minus"></span>
		</span>
	</span>
	<span class="qodef-tab-title">
		<span class="qodef-tab-title-inner">
			<?php echo esc_attr($title)?>
		</span>
	</span>
</span>
<div class="qodef-accordion-content">
	<div class="qodef-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>