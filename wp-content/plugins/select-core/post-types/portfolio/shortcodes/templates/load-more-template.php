<?php if ( $query_results->max_num_pages > 1 ) { ?>
    <div class="qodef-ptf-list-paging">
		<span class="qodef-ptf-list-load-more">
			<?php
			echo moments_qodef_get_button_html( array(
				'link' => 'javascript: void(0)',
				'text' => esc_html__( 'Show more', 'select-core' ),
			) );
			?>
		</span>
    </div>
<?php }