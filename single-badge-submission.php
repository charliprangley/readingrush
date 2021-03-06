<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package readingrush
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-badges', get_post_type() );

						?>
						<?php if ( comments_open() || get_comments_number() ) :
							comments_template('/badge-comments-form.php');
						endif; ?>
					</div>
				</div>
			</div>
		</div><!-- #primary -->
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		?>
	<?php comments_template('/badge-comments.php'); ?>
<?php endif;
	endwhile; // End of the loop.
?>
<?php
get_footer();
