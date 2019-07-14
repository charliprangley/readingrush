<?php


  $args = array(
    'post_type'  => 'reading-challenge',
    'author'     => bp_displayed_user_id(),
  );
  $wp_posts = get_posts($args);

  if (!count($wp_posts)) { ?>

<p>No pages added yet</p>

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
$user_pages_1 = get_field('pages_1');
$user_pages_2 = get_field('pages_2');
$user_pages_3 = get_field('pages_3');
$user_pages_4 = get_field('pages_4');
$user_pages_5 = get_field('pages_5');
$user_pages_6 = get_field('pages_6');
$user_pages_7 = get_field('pages_7'); ?>
<canvas id="bar-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Day one", "Day two", "Day three", "Day four", "Day five", "Day six", "Day seven"],
      datasets: [
        {
          label: "Pages read",
          // backgroundColor: ["#3e95cd"],
          data: [<?php echo $user_pages_1; ?>,<?php echo $user_pages_2; ?>,<?php echo $user_pages_3; ?>,<?php echo $user_pages_4; ?>,<?php echo $user_pages_5; ?>,<?php echo $user_pages_6; ?>,<?php echo $user_pages_7; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: { display: false },
      scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          callback: function(value) {if (value % 1 === 0) {return value;}}
        }
      }]
    }

    }
});
</script>
<?php }
} else {
//echo 'no posts found';
}

}


?>
