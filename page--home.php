<?php
/*
Template Name: Home page
 *
 */

get_header();

$readathon_dates = get_field('readathon_dates');


?>

<div class="container">
  <h3 class="dates"><?php echo $readathon_dates; ?></h3>
  <?php
          while ( have_posts() ) : the_post();
          the_title( '<h1>', '</h1>' );
          the_content();
          endwhile; // End of the loop.
          ?>

          <?php
          $total_page_count_day1 = array_sum(get_total_page_count( 'pages_day_1', 'reading-challenge' ));
          echo '<p>Total page count for day 1: '.$total_page_count_day1.'</p>';
          $total_page_count_day2 = array_sum(get_total_page_count( 'pages_day_2', 'reading-challenge' ));
          echo '<p>Total page count for day 2: '.$total_page_count_day2.'</p>';
          $total_page_count_all = $total_page_count_day1+$total_page_count_day2;
          echo '<p>Total page count for day 2: '.$total_page_count_all.'</p>';
          ?>


</div>

<?php
get_footer();
