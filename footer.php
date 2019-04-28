<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package readingrush
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
						<?php
						$total_page_count_day1 = array_sum(get_total_page_count( 'pages_day_1', 'reading-challenge' ));
						echo '<p>Total page count for day 1: '.$total_page_count_day1.'</p>';
						$total_page_count_day2 = array_sum(get_total_page_count( 'pages_day_2', 'reading-challenge' ));
						echo '<p>Total page count for day 2: '.$total_page_count_day2.'</p>';
						$total_page_count_all = $total_page_count_day1+$total_page_count_day2;
						echo '<p>Total page count for day 2: '.$total_page_count_all.'</p>'; 
						?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'readingrush' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'readingrush' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'readingrush' ), 'readingrush', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
