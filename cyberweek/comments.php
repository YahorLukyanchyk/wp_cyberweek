<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CyberWeek
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

<?php 

$noreplytext = '';
comment_form_title( $noreplytext );

?>

<div class="single-block__comments comments">

    <?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
    <h2 class="comments-title">
        <?php
			$cyberweek_comment_count = get_comments_number();
			if ( '1' === $cyberweek_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 Комментарий &ldquo;%1$s&rdquo;', 'cyberweek' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Комментариев', '%1$s Комментариев', $cyberweek_comment_count, 'comments title', 'cyberweek' ) ),
					number_format_i18n( $cyberweek_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
    </h2><!-- .comments-title -->


    <ol class="comment-list">
        <?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
    </ol><!-- .comment-list -->

    <div class="navigation"><?php paginate_comments_links( [
	'prev_text' => '«', 
	'next_text' => '»'
] ) ?></div>

    <?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
    <p class="no-comments"><?php esc_html_e( 'Комментари к данному посту закрыты.', 'cyberweek' ); ?></p>
    <?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->