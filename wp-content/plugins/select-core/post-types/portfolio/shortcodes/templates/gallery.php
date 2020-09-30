<?php // This line is needed for mixItUp gutter ?>
    <article class="qodef-portfolio-item <?php if ( $portfolio_slider != 'yes' ) {
		print 'mix';
	} ?> <?php echo esc_attr( $categories ) ?>">
        <a class="qodef-portfolio-link" href="<?php echo esc_url( $item_link ); ?>"></a>
        <div class="qodef-item-image-holder">
			<?php
			echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
			?>
        </div>
        <div class="qodef-item-text-overlay">
            <div class="qodef-item-text-overlay-inner">
                <div class="qodef-item-text-holder">
                    <<?php echo esc_attr( $title_tag ) ?> class="qodef-item-title">
					<?php echo esc_attr( get_the_title() ); ?>
                </<?php echo esc_attr( $title_tag ) ?>>
				<?php
				if ( function_exists( 'moments_qodef_get_module_part' ) ) {
					echo moments_qodef_get_module_part( $category_html );
				}
				?>
            </div>
        </div>
        </div>
    </article>
<?php // This line is needed for mixItUp gutter ?>