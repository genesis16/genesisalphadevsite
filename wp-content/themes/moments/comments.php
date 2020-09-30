<?php $id = moments_qodef_get_page_id(); ?>

<?php if ( comments_open() ) : ?>

    <div class="qodef-comment-holder clearfix" id="comments">
    <div class="qodef-comment-number">
        <div class="qodef-comment-number-inner">

			<?php if ( get_post_meta( $id, 'qodef_page_comments_guestbook_meta', true ) == 'yes' ) { ?>
                <h6><?php esc_html_e( ' Guestbook Entries ', 'moments' ); ?></h6>
			<?php } else { ?>
                <h6><?php comments_number( esc_html__( 'No Comments', 'moments' ), '1' . esc_html__( ' Comment ', 'moments' ), '% ' . esc_html__( ' Comments ', 'moments' ) ); ?></h6>
			<?php } ?>

        </div>
    </div>
    <div class="qodef-comments">
	<?php if ( post_password_required() ) : ?>
        <p class="qodef-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'moments' ); ?></p>
        </div></div>
		<?php
		return;
	endif;
	?>
	<?php if ( have_comments() ) : ?>

        <ul class="qodef-comment-list">
			<?php wp_list_comments( array( 'callback' => 'moments_qodef_comment' ) ); ?>
        </ul>


		<?php // End Comments ?>

	<?php endif; ?>
    </div></div>

	<?php
	$commenter     = wp_get_current_commenter();
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$qodef_consent = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$args = array(
		'id_form'              => 'commentform',
		'id_submit'            => 'submit_comment',
		'title_reply'          => moments_qodef_get_comments_label(),
		'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'moments' ),
		'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'moments' ),
		'label_submit'         => esc_html__( 'Submit', 'moments' ),
		'title_reply_before'   => '<h6 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h6>',
		'comment_field'        => '<textarea id="comment" placeholder="' . esc_attr__( 'Write your comment here...', 'moments' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'fields'               => apply_filters( 'comment_form_default_fields', array(
			'author'  => '<div class="qodef-three-columns clearfix"><div class="qodef-three-columns-inner"><div class="qodef-column"><div class="qodef-column-inner"><input id="author" name="author" placeholder="' . esc_attr__( 'Your full name', 'moments' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
			'url'     => '<div class="qodef-column"><div class="qodef-column-inner"><input id="email" name="email" placeholder="' . esc_attr__( 'E-mail address', 'moments' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
			'email'   => '<div class="qodef-column"><div class="qodef-column-inner"><input id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'moments' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div>',
			'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $qodef_consent . ' />' .
			             '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'moments' ) . '</label></p>',
		) )
	);
	?>
	<?php if ( get_comment_pages_count() > 1 ) {
		?>
        <div class="qodef-comment-pager">
            <p><?php paginate_comments_links(); ?></p>
        </div>
	<?php } ?>
    <div class="qodef-comment-form">
		<?php comment_form( $args ); ?>
    </div>


<?php endif; ?>

