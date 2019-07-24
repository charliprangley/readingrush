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
	'post_type' => 'hall-of-fame',
  'orderby' => 'date',
	'order' => 'DESC',
);
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row mt50">
				<div class="col-sm-8 col-sm-offset-2 text-center">

					<?php
					$hof_archive = new WP_Query( $args );
					if ( $hof_archive->have_posts() ) : ?>

						<header class="page-header">
							<a href="https://owlcrate.com" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/owlcrate-logo.png" class="sponsor-logo"></a>
							<h1>Hall of Famers</h1>
							<p>Welcome to the Reading Rush Hall of Fame, brought to you by <a href="https://owlcrate.com" target="_blank">OwlCrate</a>! Everyday we’re sharing some of our favourite content that you create during the event! Make sure to tag everything you make with <strong>#readingrush</strong> for a chance to be featured! And a big thanks to OwlCrate for supporting our event - they’re picking some favourite content to share every day too!</p>
						</header><!-- .page-header -->
					</div>
				</div>
				<div class="row flex-wrap hof--posts">
						<?php
						/* Start the Loop */
						while ( $hof_archive->have_posts() ) :
							$hof_archive->the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-hof', get_post_type() );

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
