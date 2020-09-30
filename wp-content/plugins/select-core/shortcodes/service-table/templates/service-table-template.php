<div <?php moments_qodef_class_attribute($service_table_classes)?>>
	<div class="qodef-service-table-inner">
		<ul>
            <li class="qodef-table-title" <?php echo moments_qodef_get_inline_style($service_table_title_style); ?>>
                <span class="qodef-title-content"><?php echo esc_html($title) ?></span>
            </li>
			<li class="qodef-table-content">
				<?php
					echo do_shortcode($content);
				?>
			</li>
			<?php 
			if($show_button == "yes" && $button_text !== ''){ ?>
				<li class="qodef-service-button">
					<?php echo moments_qodef_get_button_html(array(
						'link' => $link,
						'text' => $button_text
					)); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
</div>