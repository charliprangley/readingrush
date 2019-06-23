<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package readingrush
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1>Whoops! That page doesn't exist.</h1>
							<p>Try heading <a href="/">back to the homepage</a>.</p>
						</header><!-- .page-header -->
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
