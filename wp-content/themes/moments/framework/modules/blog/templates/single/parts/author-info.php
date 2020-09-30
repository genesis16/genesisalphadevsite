<?php
if ( isset( $post_id ) ) {
	$id = $post_id;
} else {
	$id = get_the_ID();
}
$post      = get_post( $id );
$author_id = $post->post_author;

$author_info_box   = esc_attr( moments_qodef_options()->getOptionValue( 'blog_author_info' ) );
$author_info_email = esc_attr( moments_qodef_options()->getOptionValue( 'blog_author_info_email' ) );
$social_networks   = moments_qodef_get_user_custom_fields( $author_id );

?>
<?php if ( $author_info_box === 'yes' && get_the_author_meta( 'description', $author_id ) !== "" ) { ?>

    <div class="qodef-author-description">

        <div class="qodef-author-description-inner">

            <div class="qodef-author-description-image">
				<?php echo moments_qodef_kses_img( get_avatar( get_the_author_meta( 'ID' ), 105 ) ); ?>
            </div>

            <div class="qodef-author-description-text-holder">

                <h5 class="qodef-author-name vcard author">
                    <a itemprop="url" href="<?php echo get_author_posts_url( $author_id ) ?>">
						<span class="fn">
							<?php
							if ( get_the_author_meta( 'first_name', $author_id ) != "" || get_the_author_meta( 'last_name', $author_id ) != "" ) {
								echo esc_attr( get_the_author_meta( 'first_name', $author_id ) ) . " " . esc_attr( get_the_author_meta( 'last_name', $author_id ) );
							} else {
								echo esc_attr( get_the_author_meta( 'display_name', $author_id ) );
							}
							?>
						</span>
                    </a>
                </h5>

				<?php if ( $author_info_email === 'yes' && is_email( get_the_author_meta( 'email', $author_id ) ) ) { ?>

                    <p itemprop="email" class="qodef-author-email">
						<?php echo sanitize_email( get_the_author_meta( 'email', $author_id ) ); ?>
                    </p>

				<?php } ?>
				<?php if ( get_the_author_meta( 'description', $author_id ) != "" ) { ?>

                    <div class="qodef-author-text">
                        <p itemprop="description">
							<?php echo esc_attr( get_the_author_meta( 'description', $author_id ) ); ?>
                        </p>
                    </div>

				<?php } ?>
				<?php if ( is_array( $social_networks ) && count( $social_networks ) ) { ?>

                    <div class="qodef-author-social-holder clearfix">

						<span class="qodef-author-social-text">
							<?php esc_html_e( 'Follow:', 'moments' ); ?>
						</span>

						<?php foreach ( $social_networks as $network ) { ?>
                            <a itemprop="url" href="<?php echo esc_url( $network['link'] ) ?>" target="blank">
                                <span class="<?php echo esc_attr( $network['class'] ) ?>"></span>
                            </a>
						<?php } ?>

                    </div>

				<?php } ?>
            </div>
        </div>

    </div>

<?php } ?>