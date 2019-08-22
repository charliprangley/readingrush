<?php
/*
Template Name: Home page
 *
 */

get_header();

$readathon_dates = get_field('readathon_dates');
$intro_video = get_field('intro_video');
$todo_heading = get_field('to_do');
$todo_subheading = get_field('to_do_subheading');
$homepage_hof_title = get_field('homepage_hof_title');
$homepage_hof_subheading = get_field('homepage_hof_subheading');
$homepage_hof_button = get_field('homepage_hof_button');
?>

<div class="container">
  <div class="row flex-row mt50 home-header">
    <div class="col-sm-6">
      <h3 class="dates"><?php echo $readathon_dates; ?></h3>
      <?php if (!is_user_logged_in()) : ?>
        <?php
          while ( have_posts() ) : the_post();
          the_title( '<h1>', '</h1>' );
          the_content();
          endwhile; // End of the loop.
        ?>
        <a href="/register" class="btn btn--purple btn-xl">Sign up now</a>
      <?php elseif (is_user_logged_in()) : ?>
        <?php if (have_rows('loggedin_header') ) : ?>
          <?php while( have_rows('loggedin_header') ): the_row();
          $loggedin_heading = get_sub_field('loggedin_heading');
          $loggedin_subheading = get_sub_field('loggedin_subheading');
          $loggedin_link = get_sub_field('loggedin_button_link');
          $loggedin_button = get_sub_field('loggedin_button_text');
            ?>
            <h1><?php echo $loggedin_heading; ?></h1>
            <p class="large-body"> <?php echo $loggedin_subheading; ?></p>
            <?php if ($loggedin_link) : ?>
              <a href="<?php echo $loggedin_link; ?>" class="btn btn--purple btn-xl"><?php echo $loggedin_button; ?></a>
            <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="col-sm-6">
        <div class="color-box color-box--white text-center">
          <?php get_template_part('template-parts/page-count-graph'); ?>
        </div>
    </div>
  </div>
  <div class="row mt100 shopping-cards flex-row flex-row--stretch">
    <div class="col-md-6">
      <div class="color-box color-box--white color-box--flex">
        <?php if (have_rows('shop_block') ) : ?>
          <?php while( have_rows('shop_block') ): the_row();
          $shop_heading = get_sub_field('shop_heading');
          $shop_content = get_sub_field('shop_content');
          $shop_link = get_sub_field('shop_button_link');
          $shop_button = get_sub_field('shop_button_text');
          $shop_image = get_sub_field('shop_image');
          ?>
          <div class="side-image" style="background-image: url('<?php echo $shop_image; ?>')"></div>
          <div>
            <h4><?php echo $shop_heading; ?></h4>
            <p><?php echo $shop_content; ?></p>
            <a href="<?php echo $shop_link; ?>" class="btn btn--green btn-lg"><?php echo $shop_button; ?></a>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="color-box color-box--white color-box--flex">
        <?php if (have_rows('books_block') ) : ?>
          <?php while( have_rows('books_block') ): the_row();
          $books_heading = get_sub_field('books_heading');
          $books_content = get_sub_field('books_content');
          $books_link = get_sub_field('books_button_link');
          $books_button = get_sub_field('books_button_text');
          $books_image = get_sub_field('books_image');
          ?>
          <div class="side-image" style="background-image: url('<?php echo $books_image; ?>')"></div>
          <div>
            <h4><?php echo $books_heading; ?></h4>
            <p><?php echo $books_content; ?></p>
            <a href="<?php echo $books_link; ?>" class="btn btn--green btn-lg"><?php echo $books_button; ?></a>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
  <?php if (!is_user_logged_in()) : ?>
    <div class="row benefits">
      <?php if (have_rows('benefit_1') ) : ?>
      <div class="col-sm-3">
        <?php while( have_rows('benefit_1') ): the_row(); ?>
          <img class="benefit-icon" src="<?php the_sub_field('benefit_image'); ?>" alt="<?php the_sub_field('benefit_heading'); ?>">
          <h3><?php the_sub_field('benefit_heading'); ?></h3>
          <p><?php the_sub_field('benefit_text'); ?></p>
          <?php endwhile; ?>
      </div>
    <?php endif; // end benefit 1 ?>
    <?php if (have_rows('benefit_2') ) : ?>
    <div class="col-sm-3">
      <?php while( have_rows('benefit_2') ): the_row(); ?>
        <img class="benefit-icon" src="<?php the_sub_field('benefit_image'); ?>" alt="<?php the_sub_field('benefit_heading'); ?>">
        <h3><?php the_sub_field('benefit_heading'); ?></h3>
        <p><?php the_sub_field('benefit_text'); ?></p>
        <?php endwhile; ?>
    </div>
  <?php endif; // end benefit 2 ?>
    <?php if (have_rows('benefit_3') ) : ?>
    <div class="col-sm-3">
      <?php while( have_rows('benefit_3') ): the_row(); ?>
        <img class="benefit-icon" src="<?php the_sub_field('benefit_image'); ?>" alt="<?php the_sub_field('benefit_heading'); ?>">
        <h3><?php the_sub_field('benefit_heading'); ?></h3>
        <p><?php the_sub_field('benefit_text'); ?></p>
        <?php endwhile; ?>
    </div>
    <?php endif; // end benefit 3 ?>
    <?php if (have_rows('benefit_4') ) : ?>
    <div class="col-sm-3">
      <?php while( have_rows('benefit_4') ): the_row(); ?>
        <img class="benefit-icon" src="<?php the_sub_field('benefit_image'); ?>" alt="<?php the_sub_field('benefit_heading'); ?>">
        <h3><?php the_sub_field('benefit_heading'); ?></h3>
        <p><?php the_sub_field('benefit_text'); ?></p>
        <?php endwhile; ?>
    </div>
    <?php endif; // end benefit 4 ?>
    </div>
    <div class="row mt100 mt60-mobile">
      <div class="col-md-6">
        <div class="video-container">
          <?php echo $intro_video; ?>
        </div>
      </div>
      <div class="col-md-6 loggedout-newsfeed">
        <h5>Newsfeed</h5>
        <?php
         // the query
         $the_query = new WP_Query( array(
            'posts_per_page' => 3,
         ));
      ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="newsfeed-strip">
                    <?php
                      the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                      ?>
                  <a href="<?php echo get_permalink(); ?>" class="text-link">Read post ></a>
                </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <a href="/newsfeed" class="text-link">See all newsfeed posts ></a>
      </div>
    </div>
  <?php elseif (is_user_logged_in()) : ?>
    <div class="row mt100 mt60-mobile">
      <div class="col-sm-8 col-sm-offset-2 text-center">
          <h2><?php echo $todo_heading; ?></h2>
          <p><?php echo $todo_subheading; ?></p>
      </div>
    </div>
    <?php if (have_rows('to_do_blocks') ) : ?>
      <?php while( have_rows('to_do_blocks') ): the_row();
      $todo1_icon = get_sub_field('to_do_1_icon');
      $todo1_heading = get_sub_field('to_do_1_heading');
      $todo1_subheading = get_sub_field('to_do_1_subheading');
      $todo1_button_text = get_sub_field('to_do_1_button_text');
      $todo1_button_link = get_sub_field('to_do_1_button_link');
      $todo2_icon = get_sub_field('to_do_2_icon');
      $todo2_heading = get_sub_field('to_do_2_heading');
      $todo2_subheading = get_sub_field('to_do_2_subheading');
      $todo2_button_text = get_sub_field('to_do_2_button_text');
      $todo2_button_link = get_sub_field('to_do_2_button_link');
      $todo3_icon = get_sub_field('to_do_3_icon');
      $todo3_heading = get_sub_field('to_do_3_heading');
      $todo3_subheading = get_sub_field('to_do_3_subheading');
      $todo3_button_text = get_sub_field('to_do_3_button_text');
      $todo3_button_link = get_sub_field('to_do_3_button_link');
      $todo4_icon = get_sub_field('to_do_4_icon');
      $todo4_heading = get_sub_field('to_do_4_heading');
      $todo4_subheading = get_sub_field('to_do_4_subheading');
      $todo4_button_text = get_sub_field('to_do_4_button_text');
      $todo4_button_link = get_sub_field('to_do_4_button_link');
      ?>
      <div class="row to-dos mt15 flex-row flex-row--stretch flex-wrap">
        <div class="col-md-3 col-sm-6">
          <div class="color-box color-box--purple">
            <img src="<?php echo $todo1_icon; ?>">
            <h3><?php echo $todo1_heading; ?></h3>
            <p><?php echo $todo1_subheading; ?></p>
            <a href="<?php echo $todo1_button_link; ?>" class="btn btn-md btn--white__outline"><?php echo $todo1_button_text; ?></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="color-box color-box--purple">
            <img src="<?php echo $todo2_icon; ?>">
            <h3><?php echo $todo2_heading; ?></h3>
            <p><?php echo $todo2_subheading; ?></p>
            <a href="<?php echo $todo2_button_link; ?>" class="btn btn-md btn--white__outline"><?php echo $todo2_button_text; ?></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="color-box color-box--purple">
            <img src="<?php echo $todo3_icon; ?>">
            <h3><?php echo $todo3_heading; ?></h3>
            <p><?php echo $todo3_subheading; ?></p>
            <a href="<?php echo $todo3_button_link; ?>" class="btn btn-md btn--white__outline"><?php echo $todo3_button_text; ?></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="color-box color-box--purple">
            <img src="<?php echo $todo4_icon; ?>">
            <h3><?php echo $todo4_heading; ?></h3>
            <p><?php echo $todo4_subheading; ?></p>
            <a href="<?php echo $todo4_button_link; ?>" class="btn btn-md btn--white__outline"><?php echo $todo4_button_text; ?></a>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
    <?php if (have_rows('daily_challenges') ) : ?>
      <?php while( have_rows('daily_challenges') ): the_row();
      $challenges_heading = get_sub_field('challenges_heading');
      $challenges_subheading = get_sub_field('challenges_subheading');
      $video_title = get_sub_field('video_challenge_title');
      $video_end = get_sub_field('video_challenge_end');
      $video_link = get_sub_field('video_challenge_link');
      $insta_title = get_sub_field('insta_challenge_title');
      $insta_end = get_sub_field('insta_challenge_end');
      $insta_link = get_sub_field('insta_challenge_link');
      ?>
      <?php if ($challenges_heading) : ?>
      <div class="row mt100 mt60-mobile">
        <div class="col-sm-8 col-sm-offset-2 text-center">
          <h2><?php echo $challenges_heading; ?></h2>
          <p><?php echo $challenges_subheading; ?></p>
        </div>
      </div>
    <?php endif; ?>
      <div class="row mt15 daily-challenges">
        <?php if ($video_title) : ?>
        <div class="col-md-6">
          <div class="color-box color-box--blue color-box--flex">
            <div class="challenge-info">
              <span class="challenge-pre-heading"><svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.93986 11.2514V4.57242L14.8146 7.91205L8.93986 11.2514ZM22.0075 2.47097C21.7491 1.4983 20.9874 0.73237 20.0204 0.472423C18.2675 0 11.2386 0 11.2386 0C11.2386 0 4.20976 0 2.45692 0.472423C1.48989 0.73237 0.728213 1.4983 0.469724 2.47097C0 4.23381 0 7.912 0 7.912C0 7.912 0 11.5901 0.469724 13.353C0.728213 14.3257 1.48989 15.0916 2.45692 15.3517C4.20976 15.824 11.2386 15.824 11.2386 15.824C11.2386 15.824 18.2675 15.824 20.0204 15.3517C20.9874 15.0916 21.7491 14.3257 22.0075 13.353C22.4773 11.5901 22.4773 7.912 22.4773 7.912C22.4773 7.912 22.4773 4.23381 22.0075 2.47097Z" fill="#D7F9FF"/>
              </svg> Video Challenge</span>
              <h4><?php echo $video_title; ?></h4>
              <span class="challenge-end-time"><?php echo $video_end; ?></span>
            </div>
            <div>
              <a href="<?php echo $video_link; ?>" class="btn btn-lg btn--white__outline">See challenge</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($insta_title) : ?>
        <div class="col-md-6">
          <div class="color-box color-box--blue color-box--flex">
            <div class="challenge-info">
              <span class="challenge-pre-heading"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.90932 0H13.5702C15.9012 0 17.999 2.2491 17.999 4.42885V13.0897C17.999 15.5354 16.0159 17.5186 13.5702 17.5186H4.90932C2.57827 17.5186 0.480469 15.2695 0.480469 13.0897V4.42885C0.480469 1.98313 2.46358 0 4.90932 0ZM4.909 1.3779C3.22424 1.3779 1.85802 2.74414 1.85802 4.42889V13.0897C1.85802 14.5291 3.3612 16.1407 4.909 16.1407H13.5699C15.2546 16.1407 16.6208 14.7745 16.6208 13.0897V4.42889C16.6208 2.9895 15.1177 1.3779 13.5699 1.3779H4.909ZM9.23956 13.1765C11.6791 13.1765 13.6568 11.1988 13.6568 8.75927C13.6568 6.31976 11.6791 4.34204 9.23956 4.34204C6.80005 4.34204 4.82233 6.31976 4.82233 8.75927C4.82233 11.1988 6.80005 13.1765 9.23956 13.1765ZM12.279 8.75931C12.279 7.08078 10.9181 5.71994 9.2396 5.71994C7.56107 5.71994 6.20023 7.08078 6.20023 8.75931C6.20023 10.4378 7.56107 11.7987 9.2396 11.7987C10.9182 11.7987 12.279 10.4379 12.279 8.75931ZM15.2254 4.25737C15.2254 2.70651 12.8987 2.70651 12.8987 4.25737C12.8987 5.80901 15.2254 5.80901 15.2254 4.25737Z" fill="#D7F9FF"/>
              </svg> Instagram Challenge</span>
              <h4><?php echo $insta_title; ?></h4>
              <span class="challenge-end-time"><?php echo $insta_end; ?></span>
            </div>
            <div>
              <a href="<?php echo $insta_link; ?>" class="btn btn-lg btn--white__outline">See challenge</a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    <?php endwhile; endif; ?>
    <div class="row mt100 mt60-mobile">
      <div class="col-sm-12 text-center">
        <h2>The latest from the newsfeed</h2>
      </div>
    </div>
      <div class="row flex-wrap newsfeed--posts">
        <?php
         // the query
         $the_query = new WP_Query( array(
            'posts_per_page' => 3,
         ));
      ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="col-md-4 col-sm-12 col-xs-12">
            	<div class="color-box color-box--white color-box__newsfeed">
            		<div>
            				<div class="entry-meta entry-meta--top">
            					<div class="posted-on">
            						<?php the_time('F jS, Y');?>
            					</div>
            					<?php the_category();?>
            				</div>
            				<?php
            					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            					?>
            				</div>
            			<a href="<?php echo get_permalink(); ?>" class="btn btn-md btn--green">Read post</a>
            	</div>
            </div>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
      <div class="row text-center mt30">
        <a href="/newsfeed" class="text-link">See all newsfeed posts ></a>
      </div>
  <?php endif; ?>
</div>
<div class="section--light-green">
  <div class="container">
    <div class="row">
      <div class="col-sm-5 center-xs">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/owlcrate-logo.png" class="sponsor-logo">
        <h2><?php echo $homepage_hof_title; ?> </h2>
        <p><?php echo $homepage_hof_subheading; ?></p>
        <a href="<?php echo get_site_url();?>/hall-of-fame" class="btn btn-lg btn--purple"><?php echo $homepage_hof_button; ?></a>
      </div>
      <div class="col-sm-7 hof-images">
        <?php
          $args = array(
            'post_type'   => 'hall-of-fame',
            'post_status' => 'publish',
            'posts_per_page' => 6,
           );

          $hof = new WP_Query( $args );
          if( $hof->have_posts() ) :
          ?>
              <?php
                while( $hof->have_posts() ) :
                  $hof->the_post();
                  $hof_featured_image = get_field('hof_featured_image');
                  ?>
                  <div class="col-sm-4 col-xs-6">
                    <a href="<?php echo get_site_url();?>/hall-of-fame">
                      <div class="hof-item" style="background-image: url('<?php echo $hof_featured_image; ?>')"></div>
                    </a>
                  </div>
                  <?php
                endwhile;
                wp_reset_postdata();
              ?>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
