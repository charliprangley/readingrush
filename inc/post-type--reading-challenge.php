<?php

function reading_challenge_custom_post() {
  $labels = array(
    'name'               => _x( 'Reading challenge data', 'post type general name' ),
    'singular_name'      => _x( 'Reading challenge data', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add new reading challenge data' ),
    'edit_item'          => __( 'Edit Reading challenge data' ),
    'new_item'           => __( 'New Reading challenge data' ),
    'all_items'          => __( 'All Reading challenge data' ),
    'view_item'          => __( 'View Reading challenge data' ),
    'search_items'       => __( 'Search Reading challenge data' ),
    'not_found'          => __( 'No Reading challenge data found' ),
    'not_found_in_trash' => __( 'No Reading challenge data found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Reading Challenge'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds the Reading challenge data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'author', 'revisions', 'custom-fields' ),
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-book',
    'exclude_from_search' => true
  );
  register_post_type( 'reading-challenge', $args );
  register_taxonomy( 'categories', array('reading-challenge'), array(
        'hierarchical' => true,
        )
    );
  flush_rewrite_rules();
}
add_action( 'init', 'reading_challenge_custom_post' );

function reading_challenge_post_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['team_member'] = array(
    0 => '',
    1 => sprintf( __('Reading challenge data updated. <a href="%s">View Reading challenge</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Reading challenge data updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Reading challenge data restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Reading challenge data published. <a href="%s">View Reaching challenge</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Reading challenge data saved.'),
    8 => sprintf( __('Reading challenge data submitted. <a target="_blank" href="%s">Preview Reading challenge data</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Reading challenge data scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Reading challenge data</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Reading challenge data draft updated. <a target="_blank" href="%s">Preview Reading challenge data</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'reading_challenge_post_updated_messages' );
