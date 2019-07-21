<?php
$total_pages_day1 = array_sum(get_total_page_count( 'pages_1', 'reading-challenge' ));
$total_pages_day2 = array_sum(get_total_page_count( 'pages_2', 'reading-challenge' ));
$total_pages_day3 = array_sum(get_total_page_count( 'pages_3', 'reading-challenge' ));
$total_pages_day4 = array_sum(get_total_page_count( 'pages_4', 'reading-challenge' ));
$total_pages_day5 = array_sum(get_total_page_count( 'pages_5', 'reading-challenge' ));
$total_pages_day6 = array_sum(get_total_page_count( 'pages_6', 'reading-challenge' ));
$total_pages_day7 = array_sum(get_total_page_count( 'pages_7', 'reading-challenge' ));
$total_page_count_all = (int)$total_pages_day1+(int)$total_pages_day2+(int)$total_pages_day3+(int)$total_pages_day4+(int)$total_pages_day5+(int)$total_pages_day6+(int)$total_pages_day7;
?>
<h5><?php echo $total_page_count_all; ?> pages read by Reading Rushers so far</h5>
<canvas id="bar-chart-all" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart-all"), {
    type: 'bar',
    data: {
      labels: ["DAY ONE", "DAY TWO", "DAY THREE", "DAY FOUR", "DAY FIVE", "DAY SIX", "DAY SEVEN"],
      datasets: [
        {
          label: "Pages read",
          backgroundColor: "#76E7CD",
          data: [<?php echo $total_pages_day1; ?>,<?php echo $total_pages_day2; ?>,<?php echo $total_pages_day3; ?>,<?php echo $total_pages_day4; ?>,<?php echo $total_pages_day5; ?>,<?php echo $total_pages_day6; ?>,<?php echo $total_pages_day7; ?>]
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
