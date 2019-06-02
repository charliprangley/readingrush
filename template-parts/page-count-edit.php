
			<?php
				$args = array(
			    'post_type'  => 'reading-challenge',
			    'author'     => get_current_user_id(),
				);
				$wp_posts = get_posts($args);

				if (!count($wp_posts)) { ?>

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
		 form to add pages to a users profile

						<?php acf_form(array(
							'post_id'		=> 'new_post',
							'new_post'		=> array(
								'post_type'		=> 'reading-challenge',
								'post_status'		=> 'publish'

							),

							'submit_value'		=> 'Save page counts'
						)); ?>

				</div><!-- #content -->
			</div><!-- #primary -->

<?php } else {

	$user_ID = bp_displayed_user_id();

	$args = array(
		'post_type' => 'reading-challenge',
		'posts_per_page' => -1,
		'post_status' => 'any',
		'author' => $user_ID
	);

	// The Query
	$the_query = new WP_Query($args);

	// The Loop
	if ( $the_query->have_posts() ) {
		$posts_by_user = array();
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$posts_by_user[] = get_the_ID();
			$pages_day_1 = get_field('pages_day_1');
			echo '<p>Page count day 1: '.$pages_day_1.'</p>';
			$pages_day_2 = get_field('pages_day_2');
			echo '<p>Page count day 2: '.$pages_day_2.'</p>';
			$bp_totalpages=$pages_day_1+$pages_day_2;
			echo '<p>Total pages: '.$bp_totalpages.'</p>';
			acf_form();
		}
	} else {
		//echo 'no posts found';
	}

	/* Restore original Post Data */
	wp_reset_postdata();

}


	?>
