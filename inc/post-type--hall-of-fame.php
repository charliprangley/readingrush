<?php

function hall_of_fame_custom_post() {
  $labels = array(
    'name'               => _x( 'Hall of fame content', 'post type general name' ),
    'singular_name'      => _x( 'Hall of fame content', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add new Hall of fame content' ),
    'edit_item'          => __( 'Edit Hall of fame content' ),
    'new_item'           => __( 'New Hall of fame content' ),
    'all_items'          => __( 'All Hall of fame content' ),
    'view_item'          => __( 'View Hall of fame content' ),
    'search_items'       => __( 'Search Hall of fame content' ),
    'not_found'          => __( 'No Hall of fame content found' ),
    'not_found_in_trash' => __( 'No Hall of fame content found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Hall of fame'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds the Hall of fame content',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'author', 'revisions', 'custom-fields' ),
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-star-filled',
    'exclude_from_search' => true,
    'rewrite' => array('slug'=>'hall-of-fame', 'pages' => true),
  );
  register_post_type( 'hall-of-fame', $args );
  register_taxonomy( 'categories', array('hall-of-fame'), array(
        'hierarchical' => true,
        )
    );
  flush_rewrite_rules();
}
add_action( 'init', 'hall_of_fame_custom_post' );

function hall_of_fame_post_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['team_member'] = array(
    0 => '',
    1 => sprintf( __('Hall of fame content updated. <a href="%s">View Hall of fame</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Hall of fame content updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Hall of fame content restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Hall of fame content published. <a href="%s">View Reaching challenge</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Hall of fame content saved.'),
    8 => sprintf( __('Hall of fame content submitted. <a target="_blank" href="%s">Preview Hall of fame content</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Hall of fame content scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Hall of fame content</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Hall of fame content draft updated. <a target="_blank" href="%s">Preview Hall of fame content</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'hall_of_fame_post_updated_messages' );
