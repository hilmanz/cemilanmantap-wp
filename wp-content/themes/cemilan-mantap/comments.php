<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cemilanmantap
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments comments-area">

	<h3 class="uppercase">Comments</h3>

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<ul class="comments-list">
			<?php
				wp_list_comments( array(
					// 'style'      => 'ul',
					'type' => 'comment',
					'callback' => 'cm_cemilan_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cemilanmantap' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cemilanmantap' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cemilanmantap' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cemilanmantap' ); ?></p>
	<?php
	endif;

	$args_comment = array();
	if( is_singular('cemilan') ):
		$fields = array(
			'author' => '<h5 class="uppercase" style="margin-bottom:0; float:left;"><label for="author">' . __( 'Name' ) . '</label></h5>' . ( $req ? '&nbsp;<span>*</span>' : '' ) .
        		'<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />', 
    		'email'  => '<h5 class="uppercase" style="margin-bottom:0; float:left;"><label for="email">' . __( 'Email' ) . '</label></h5>' . ( $req ? '&nbsp;<span>*</span>' : '' ) . 
                '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
    		'url'    => '' 
    	);
		$comment_field = '<h5 class="uppercase">' .
	                '<label for="comment">' . __( 'Comment' ) . '</label></h5>' .
	                '<textarea id="comment" placeholder="Tulis Komentar" name="comment" rows="3" aria-required="true"></textarea>';
		$args_comment = array(
			'title_reply' => ' ', 
			'label_submit' => 'Submit',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' => $comment_field,
			'comment_notes_before' => ''
		);
	endif;

	comment_form( $args_comment );

	?>
</div><!-- #comments -->