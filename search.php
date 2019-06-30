<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package readingrush
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">

		<?php if ( have_posts() ) : ?>
			<h5 class="breadcrumb"><a href="<?php echo site_url();?>/newsfeed">< Back to the newsfeed</a></h5>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'readingrush' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="row flex-wrap newsfeed--posts">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-newsfeed', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	<nav class="pagination">
	<?php pagination_bar(); ?>
	</nav>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
