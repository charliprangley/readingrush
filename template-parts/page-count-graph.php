<?php
$total_page_count_day1 = array_sum(get_total_page_count( 'pages_day_1', 'reading-challenge' ));
echo '<p>Total page count for day 1: '.$total_page_count_day1.'</p>';
$total_page_count_day2 = array_sum(get_total_page_count( 'pages_day_2', 'reading-challenge' ));
echo '<p>Total page count for day 2: '.$total_page_count_day2.'</p>';
$total_page_count_all = $total_page_count_day1+$total_page_count_day2;
echo '<p>Total page count for day 2: '.$total_page_count_all.'</p>';
?>
