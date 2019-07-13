<?php

function badge_submission_custom_post() {
  $labels = array(
    'name'               => _x( 'Badge submissions', 'post type general name' ),
    'singular_name'      => _x( 'Badge submission', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add new Badge submission' ),
    'edit_item'          => __( 'Edit Badge submission' ),
    'new_item'           => __( 'New Badge submission' ),
    'all_items'          => __( 'All Badge submission' ),
    'view_item'          => __( 'View Badge submission' ),
    'search_items'       => __( 'Search Badge submission' ),
    'not_found'          => __( 'No Badge submission found' ),
    'not_found_in_trash' => __( 'No Badge submission found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Badge Submission'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds the Badge submissions',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'author', 'revisions', 'custom-fields', 'comments', 'thumbnail' ),
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-testimonial',
    'exclude_from_search' => true
  );
  register_post_type( 'badge-submission', $args );
  flush_rewrite_rules();
}
add_action( 'init', 'badge_submission_custom_post' );

function badge_submission_post_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['team_member'] = array(
    0 => '',
    1 => sprintf( __('Badge submission updated. <a href="%s">View Reading challenge</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Badge submission updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Badge submission restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Badge submission published. <a href="%s">View Reaching challenge</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Badge submission saved.'),
    8 => sprintf( __('Badge submission submitted. <a target="_blank" href="%s">Preview Badge submission</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Badge submission scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Badge submission</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Badge submission draft updated. <a target="_blank" href="%s">Preview Badge submission</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'badge_submission_post_updated_messages' );
