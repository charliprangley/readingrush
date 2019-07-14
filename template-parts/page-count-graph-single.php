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
echo $user_pages_1;
}
echo "does this print";
} else {
//echo 'no posts found';
}

}


?>
