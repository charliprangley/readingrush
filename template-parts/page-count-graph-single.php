<?php


  $args = array(
    'post_type'  => 'reading-challenge',
    'author'     => bp_displayed_user_id(),
  );
  $wp_posts = get_posts($args);

  if (!count($wp_posts)) { ?>
    <?php if (!bp_is_my_profile()) : ?>
    <p>No pages added yet</p>
    <?php endif; ?>


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
      labels: ["DAY ONE", "DAY TWO", "DAY THREE", "DAY FOUR", "DAY FIVE", "DAY SIX", "DAY SEVEN"],
      datasets: [
        {
          label: "Pages read",
          backgroundColor: "#76E7CD",
          data: [<?php echo $user_pages_1; ?>,<?php echo $user_pages_2; ?>,<?php echo $user_pages_3; ?>,<?php echo $user_pages_4; ?>,<?php echo $user_pages_5; ?>,<?php echo $user_pages_6; ?>,<?php echo $user_pages_7; ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: { display: false },
      scales: {
      yAxes: [{
        gridLines: {
          display: false
        },
        ticks: {
          beginAtZero: true,
          callback: function(value) {if (value % 1 === 0) {return value;}},
          fontFamily: "brandon-grotesque",
          fontStyle: 700,
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        },
        ticks: {
          fontFamily: "brandon-grotesque",
          fontStyle: 700,
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
