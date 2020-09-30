<?php
/**
 * Cover boxes shortcode template
 */
?>

<div <?php moments_qodef_class_attribute( $cover_box_classes ) ?> <?php echo moments_qodef_get_inline_attrs( $cover_boxes_data ); ?>>
    <ul class='clearfix'>
        <li>
            <div class="qodef-box">
                <div class="qodef-box-info-holder">
                    <div class="qodef-box-top-stripe"></div>
                    <a class="qodef-box-thumb" href="<?php echo esc_url( $link1 ); ?>" target="<?php echo esc_attr( $target1 ); ?>">
                        <img alt="<?php echo esc_attr( $title1 ); ?>" src="<?php echo esc_url( $cover_boxes_images[1] ); ?>"/>
                    </a>
                </div>
                <div class='qodef-box-content'>
                    <h6 class="qodef-cover-box-title">
						<?php echo esc_attr( $title1 ); ?>
                    </h6>
                    <p class="qodef-cover-box-text">
						<?php echo esc_attr( $text1 ); ?>
                    </p>
					<?php echo moments_qodef_get_button_html( array(
						'link'   => $link1,
						'text'   => $link_label1,
						'target' => $target1
					) ); ?>
                </div>
            </div>
        </li>
        <li>
            <div class="qodef-box">
                <div class="qodef-box-info-holder">
                    <div class="qodef-box-top-stripe"></div>
                    <a class="qodef-box-thumb" href="<?php echo esc_url( $link2 ); ?>" target="<?php echo esc_attr( $target2 ); ?>">
                        <img alt="<?php echo esc_attr( $title2 ); ?>" src="<?php echo esc_url( $cover_boxes_images[2] ); ?>"/>
                    </a>
                </div>
                <div class='qodef-box-content'>
                    <h6 class="qodef-cover-box-title">
						<?php echo esc_attr( $title2 ); ?>
                    </h6>
                    <p class="qodef-cover-box-text">
						<?php echo esc_attr( $text2 ); ?>
                    </p>
					<?php echo moments_qodef_get_button_html( array(
						'link'   => $link2,
						'text'   => $link_label2,
						'target' => $target2
					) ); ?>
                </div>
            </div>
        </li>
        <li>
            <div class="qodef-box">
                <div class="qodef-box-info-holder">
                    <div class="qodef-box-top-stripe"></div>
                    <a class="qodef-box-thumb" href="<?php echo esc_url( $link3 ); ?>" target="<?php echo esc_attr( $target3 ); ?>">
                        <img alt="<?php echo esc_attr( $title3 ); ?>" src="<?php echo esc_url( $cover_boxes_images[3] ); ?>"/>
                    </a>
                </div>
                <div class='qodef-box-content'>
                    <h6 class="qodef-cover-box-title">
						<?php echo esc_attr( $title3 ); ?>
                    </h6>
                    <p class="qodef-cover-box-text">
						<?php echo esc_attr( $text3 ); ?>
                    </p>
					<?php echo moments_qodef_get_button_html( array(
						'link'   => $link3,
						'text'   => $link_label3,
						'target' => $target3
					) ); ?>
                </div>
            </div>
        </li>
    </ul>
</div>