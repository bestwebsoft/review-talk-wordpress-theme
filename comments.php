<?php
/**
 * The template part that shows comments, pingbacks and comment form.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>
<div class="review-wrapper-1200px">
	<div class="review-comment-list"> <!-- comment list -->
		<hr />
		<h5 id="comments">
			<?php _e( 'Comments', 'review-talk' ); ?> ( <?php comments_number( '0', '1', '%' ); ?> )
			<?php if ( comments_open() ) { ?>
			<a href="#respond"><?php _e( 'Leave a comment >', 'review-talk' ); ?><a>
					<?php } ?>
		</h5>
		<?php wp_list_comments( 'type=comment&callback=review_comment_list' ); ?>
		<ol><?php wp_list_comments( 'type=pings&callback=review_pings' ); ?></ol>
		<div class="review-pagination">
			<?php paginate_comments_links(); /*comments pagination*/ ?>
		</div>
	</div> <!-- end of comment list -->
</div> <!--end of 1200wrapper-->
<div class="review-comment-form"> <!-- comment form -->
	<div class="review-wrapper-1200px">
		<div class="review-comment-placing"> <!--for positioning comment form-->
			<?php $fields = array(
				'author' => '<div class="review-comment-meta">' . '<input  name="author" type="text" placeholder="' . esc_attr( __( 'Name', 'review-talk' ) ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . ' />',
				/*Input for name*/
				'email'  => '<input  name="email" type="text" placeholder="' . esc_attr( __( 'Email', 'review-talk' ) ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . ' />',
				/* Input for email*/
				'url'    => '<input  name="url" type="text" placeholder="' . esc_attr( __( 'URL', 'review-talk' ) ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
				/*Input for website*/
			);
			$args         = array(
				'fields'               => $fields,
				'comment_field'        => '<textarea name="comment" placeholder="' . esc_attr( __( 'Comment text...', 'review-talk' ) ) . '" cols="45" rows="10" aria-required="true"></textarea>',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'title_reply'          => '<p class="">' . ( __( 'Share your thoughts', 'review-talk' ) ) . '</p>',
				'class_submit'         => 'review-submit-comment',
				'label_submit'         => __( 'Submit a comment >', 'review-talk' ),
			);
			comment_form( $args ); ?>
		</div> <!-- end of div comment-placing -->
	</div>
</div>  <!-- end of comment form -->
