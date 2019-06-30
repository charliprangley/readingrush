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
				<div class="col-sm-12">
					<h1>Newsfeed</h1>
					<?php get_sidebar(); ?>
				</div>
			</div>
			<div class="row flex-wrap newsfeed--posts">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-newsfeed', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
			</div>
			<nav class="pagination">
			<?php pagination_bar(); ?>
			</nav>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
