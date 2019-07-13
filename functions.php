<?php
/**
 * readingrush functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package readingrush
 */

if ( ! function_exists( 'readingrush_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function readingrush_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on readingrush, use a find and replace
		 * to change 'readingrush' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'readingrush', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'readingrush' ),
			'menu-2' => esc_html__( 'User', 'readingrush' ),
			'menu-3' => esc_html__( 'Challenge', 'readingrush' ),
			'menu-4' => esc_html__( 'Content', 'readingrush' ),
			'menu-5' => esc_html__( 'Account', 'readingrush' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'readingrush_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'readingrush_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function readingrush_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'readingrush_content_width', 640 );
}
add_action( 'after_setup_theme', 'readingrush_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function readingrush_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'readingrush' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'readingrush' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'readingrush_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 if (class_exists('bbPress')) {
 add_action( 'wp_print_styles', 'deregister_bbpress_styles', 15 );
 function deregister_bbpress_styles() {
 wp_deregister_style( 'bbp-default' );
}
}

function readingrush_scripts() {
	wp_enqueue_style( 'bbpress_css', plugins_url().'/bbpress/templates/default/css/bbpress.min.css');
	wp_enqueue_style( 'readingrush-style', get_template_directory_uri() . '/assets/css/styles.min.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js',false,'3.4.1');

	wp_enqueue_script( 'readingrush-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'readingrush-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'readingrush_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom post types
 */
require get_template_directory() . '/inc/post-type--reading-challenge.php';
require get_template_directory() . '/inc/post-type--badge-submissions.php';


/**
 * Adding ACF form to profile page for users
 */
function my_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    $current_user = wp_get_current_user();
    $author = $current_user->user_login; // OR [user_firstname, user_lastname, display_name]
    // Create a new post
    $post = array(
        'post_status'  => 'publish',
        'post_title'  => $author,
        'post_type'  => 'reading-challenge',
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );

/**
 * function for counting pages based on reading-challenge data entry
 */
function get_total_page_count( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) )
        return;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s'
        AND p.post_status = '%s'
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $r;
}

/**
 * Remiving admin bar.
 */

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
show_admin_bar(false);
}
}

if ( ! is_user_logged_in() ) {
    add_filter( 'show_admin_bar', '__return_false' );
}


// /**
//  * disabling the WP rich text editor from buddypress forms.
//  */
// function bp_disable_richtext($enabled, $field_id) {
// 	$enabled = false;
// 	return $enabled;
// }
// add_filter('bp_xprofile_is_richtext_enabled_for_field', 'bp_disable_richtext', 10, 2);

/**
 * Adding stylesheet to login page
 */
 function custom_login()
 {
 echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/assets/css/styles.min.css" />';
 echo '<link rel="stylesheet" href="https://use.typekit.net/euv4bqn.css">';
 }
 add_action('login_head', 'custom_login');


/**
 * Changing the tab order in buddypress profile.
 */
function rt_change_profile_tab_order() {
   global $bp;

   $bp->members->nav->edit_nav( array(
      'position' => 10,
   ), 'profile' );
   $bp->members->nav->edit_nav( array(
      'position' => 30,
   ), 'activity' );
	 $bp->members->nav->edit_nav( array(
			'position' => 40,
	 ), 'forums' );
	 $bp->members->nav->edit_nav( array(
			'position' => 50,
	 ), 'notifications' );
   $bp->members->nav->edit_nav( array(
      'position' => 60,
   ), 'settings' );
}
add_action( 'bp_init', 'rt_change_profile_tab_order', 999 );

/**
 * Adding a custom badges tab in buddypress profile.
 */
function my_prefix_bp_setup_nav() {

    global $bp;

    // Change the name and slug as you wish
    $name = 'Badges earned';
    $slug = 'badges';

    bp_core_new_nav_item( array(
        'name'                  => $name,
        'slug'                  => $slug,
        'screen_function'       => 'my_prefix_screen',
        'position'              => 20,
        'parent_url'            => bp_loggedin_user_domain() . '/' . $slug . '/',
        'parent_slug'           => $bp->profile->slug,
        'default_subnav_slug'   => $slug
    ) );

}
add_action( 'bp_setup_nav', 'my_prefix_bp_setup_nav' );

function my_prefix_screen() {

    // Register title (optional) and content hooks
    add_action( 'bp_template_title', 'my_prefix_title' );

    add_action( 'bp_template_content', 'my_prefix_content' );

    bp_core_load_template( 'buddypress/members/single/plugins' );

}

function my_prefix_title() {

    echo 'Badges Earned';

}

function my_prefix_content() {

    // User displayed ID, to pass to custom shortcodes
    $user_id = bp_displayed_user_id();

    // Here is where you can add anything you want

    // Like GamiPress shortcodes thought the do_shortcode() function

    // Displayed user achievements of all types (hiding the search and filter inputs, and set filter to just completed achievements)
    echo do_shortcode('[gamipress_achievements columns="4" search="no" filter="no" filter_value="completed" user_id="' . $user_id . '" orderby="date" order="DESC" limit="20" points_awarded="no" times_earned="no" toggle="no" steps="no"]');


}


/**
 * Adding a custom pages tab in buddypress profile.
 */

// function profile_tab_pages() {
//       global $bp;
//
//       bp_core_new_nav_item( array(
//             'name' => 'Update pages and books',
//             'slug' => 'pages',
//             'screen_function' => 'pages_screen',
//             'position' => 70,
//             'parent_url'      => bp_loggedin_user_domain() . '/pages/',
//             'parent_slug'     => $bp->profile->slug,
//             'default_subnav_slug' => 'pages',
// 						'show_for_displayed_user' => FALSE
//       ) );
// }
// add_action( 'bp_setup_nav', 'profile_tab_pages' );


function pages_screen() {

    // Add title and content here - last is to call the members plugin.php template.
    add_action( 'bp_template_title', 'pages_title' );
    add_action( 'bp_template_content', 'pages_content' );
    bp_core_load_template( 'buddypress/members/single/plugins' );
}
function pages_title() {
    echo 'Update pages';
}

function pages_content() {
	include "template-parts/page-count-graph.php";
    include "template-parts/page-count-edit.php";
}

/**
 * Hiding the profile visibility settings tab.
 */

function bpfr_hide_visibility_tab() {
	if( bp_is_active( 'xprofile' ) )

		bp_core_remove_subnav_item( 'settings', 'profile' );

}
add_action( 'bp_ready', 'bpfr_hide_visibility_tab' );

/**
 * Hiding homepage from forum breadcrumbs.
 */
function mycustom_breadcrumb_options() {
	// Home - default = true
	$args['include_home']    = false;
	// Forum root - default = true
	$args['include_root']    = true;
	// Current - default = true
	$args['include_current'] = true;

	return $args;
}

add_filter('bbp_before_get_breadcrumb_parse_args', 'mycustom_breadcrumb_options' );

/**
* changing spelling of favorite.
*/
add_filter( 'gettext', 'translate_strings', 999, 3 );

function translate_strings( $translated, $text, $domain ) {

// STRING 1
$translated = str_ireplace( 'Favorite', 'Favourite', $translated );

return $translated;
}

function add_topic_description() {
	    	echo bbp_topic_excerpt();
}

add_action('bbp_theme_after_topic_title','add_topic_description');

/**
 * Putting pagination in forum
 */

 function wpup_bbp_list_replies( $args = array() ) {

    // Reset the reply depth
    bbpress()->reply_query->reply_depth = 0;

    // In reply loop
    bbpress()->reply_query->in_the_loop = true;

    $r = bbp_parse_args( $args, array(
        'walker'       => null,
        'max_depth'    => bbp_thread_replies_depth(),
        'style'        => 'ul',
        'callback'     => null,
        'end_callback' => null
    ), 'list_replies' );

    // Get replies to loop through in $_replies
    $walker = new BBP_Walker_Reply;
    $walker->paged_walk( bbpress()->reply_query->posts, $r['max_depth'], $r['page'], $r['per_page'], $r );

    bbpress()->max_num_pages = $walker->max_pages;
    bbpress()->reply_query->in_the_loop = false;
}

//Custom Pagination function
function wpup_custom_pagination($numreplies='', $pagerange='', $paged='', $repliesperpage='') {

  /**
   * $pagerange
   * How many pages to display after the current page
   * Used in combination with 'shaw_all' => false
   */
  if (empty($pagerange)) {
    $pagerange = 3;
  }

  /**
   * $numreplies
   * What is the total number of replies in the current topic
   * $numpages
   * Calculate total number of pages to display based on number of replies and replies per page
   */
  if ($numreplies != '') {
    $numpages = ceil($numreplies / $repliesperpage);
  }

  //assign value of 1 to $paged variable in case it's not passed on
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
 $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&lt;'),
    'next_text'       => __('&gt;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

}

/**
 * Remove widget title
 **/

 // REMOVE WIDGET TITLE IF IT BEGINS WITH EXCLAMATION POINT
add_filter( 'widget_title', 'remove_widget_title' );
function remove_widget_title( $widget_title ) {
    if ( substr ( $widget_title, 0, 1 ) == '!' )
        return;
    else
        return ( $widget_title );
}

/**
 * pagination on blog arcive pages
 **/

function pagination_bar() {
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

/**
 * Show only updates on activity page
 */

 function bp_activity_do_not_save( $activity_object ) {

 	$exclude = array(
 	        'updated_profile',
 	        'new_member',
 	        'new_avatar',
 	        'friendship_created',
 	        'joined_group'
 	    );

 	if( in_array( $activity_object->type, $exclude ) ) {
 		$activity_object->type = false;
 	}
 }
 add_action('bp_activity_before_save', 'bp_activity_do_not_save', 10, 1 );
