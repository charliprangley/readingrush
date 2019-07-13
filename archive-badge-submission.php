<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
 */

get_header();

$args = array(
	'post_type' => 'badge-submission',
  'orderby' => 'date',
	'order' => 'ASC',
);
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center">

					<?php
					$badges = new WP_Query( $args );
					if ( $badges->have_posts() ) : ?>
						<header class="page-header">
							<h1>Reading Rush badges</h1>
							<p>Complete challenges during the Reading Rush to earn these badges. They'll be displayed on your profile so everyone can see your achievements.</p>
						</header><!-- .page-header -->
					</div>
				</div>
				<div class="row flex-wrap badges">
						<?php
						/* Start the Loop */
						while ( $badges->have_posts() ) :
							$badges->the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-badges-grid', get_post_type() );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
			</div>
			<nav class="pagination">
			<?php pagination_bar(); ?>
			</nav>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
