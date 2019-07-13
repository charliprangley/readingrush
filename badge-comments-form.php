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
	comment_form(array('title_reply'=>'Submit your entry to get the badge', 'label_submit'=>'Get the badge'));
	// You can start editing here -- including this comment!
	?>

</div><!-- #comments -->
