<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
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

<div id="comments" class="comments-area badge-submissions">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="col-sm-12">
			<h5 class="comments-title">
				Badge submissions
			</h5><!-- .comments-title -->
</div>
<div class="col-sm-12">
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->
</div>
		<div class="col-sm-12">
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'readingrush' ); ?></p>
			<?php
		endif; ?>
	</div>

<?php	endif; // Check for have_comments().
	?>

</div><!-- #comments -->
