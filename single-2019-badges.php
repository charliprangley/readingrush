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
				<div class="col-md-8 col-md-offset-2">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( '/template-parts/content-achievement', get_post_type() );
						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</div><!-- #primary -->
<?php
get_footer();
