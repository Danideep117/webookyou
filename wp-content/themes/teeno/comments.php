<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
		return;
?>
<?php if ( have_comments() ) : ?>
	<h4 class="mb-20"><?php comments_number( esc_html__('0 Comments', 'teeno'), esc_html__('1 Comment', 'teeno'), esc_html__('% Comments', 'teeno') ); ?></h4>
	<div class="comment-box radius-lg mb-40">
        <ol class="comment-list">
			<?php wp_list_comments('callback=teeno_theme_comment'); ?>
		</ol>
    </div>
<?php endif; ?>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<div class="text-center">
		<ul class="pagination">
			<li>
				<?php
				paginate_comments_links( array(
					'prev_text' => wp_specialchars_decode('<i class="ti-angle-left"></i>',ENT_QUOTES), 
					'next_text' => wp_specialchars_decode('<i class="ti-angle-right"></i>',ENT_QUOTES)
				));?>
			</li>
		</ul>
	</div>
<?php endif;?>
<?php
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$comment_args = array(
				'class_container' => '',
				'id_form' => 'commentForm',
				'class_form' => 'comment-form',
				'title_reply'=>esc_html__( 'Leave A Comment', 'teeno' ),
				'title_reply_before' =>'<h4 class="mb-10">',
				'title_reply_after' => '</h4>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' 	=> '<div class="row">
										<div class="col-sm-6">
											<div class="form-group mb-20">
											<input type="text" name="author" class="form-control" placeholder="'.esc_attr__('Name*', 'teeno').'" required="">
											</div>
										</div>',
						 'email' 	=> '<div class="col-sm-6">
						 					<div class="form-group mb-20">
											<input type="email" name="email" class="form-control" placeholder="'.esc_attr__('Email*', 'teeno').'" required="">
											</div>
										</div>
										</div>',
				) ),
					'comment_field' => '<div class="col-12"> <div class="form-group mb-30">
						<textarea class="form-control" name="comment" rows="6" placeholder="'.esc_attr__('Your Comment', 'teeno').'" required=""></textarea>
					</div> </div>', 
				'label_submit' => esc_html__( 'Post A Comment', 'teeno' ),
				'submit_button' =>  '<button type="submit" class="btn btn-lg btn-primary"> %4$s </button>',
				'submit_field' => '%1$s %2$s',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
		)
?>
<div class="comment-reply mb-40">
<?php if ( comments_open() ) : ?>
<?php comment_form($comment_args); ?>
<?php endif; ?>
</div>