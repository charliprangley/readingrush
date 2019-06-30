<?php
/*
Template Name: Home page
 *
 */

get_header();

$readathon_dates = get_field('readathon_dates');
$intro_video = get_field('intro_video');
$loggedin_heading = get_field('loggedin_heading');
$loggedin_subheading = get_field('loggedin_subheading');
$loggedin_link = get_field('loggedin_link');
$loggedin_button = get_field('loggedin_button');



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
      <?php endif; ?>
      <?php if (is_user_logged_in()) : ?>
        <h1><?php echo $loggedin_heading; ?></h1>
        <p class="large-body"> <?php echo $loggedin_subheading; ?></p>
        <?php if ($loggedin_link) : ?>
        <a href="<?php echo $loggedin_link; ?>" class="btn btn--purple btn-xl"><?php echo $loggedin_button; ?></a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="col-sm-6">
      <div class="video-container">
        <?php echo $intro_video; ?>
      </div>
    </div>
  </div>
  <div class="row mt100">
    <div class="col-sm-12">
      <div class="color-box color-box--white color-box--flex">
        <div>
          <h2>Get yourself some Reading Rush merch!</h2>
          <p>Pick up a camper mug or some bookmarks (or both!) to support The Reading Rush and get ready for the readathon.</p>
          <a href="https://thereadingrush.bigcartel.com/" target="_blank" class="btn btn-lg btn--green">Visit the shop</a>
        </div>
        <div class="merch-products">
          <a href="https://thereadingrush.bigcartel.com/product/camper-mug" target="_blank" class="merch-products--img"><img src ="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/merch-mug.jpg" alt="Reading Rush camper mug"></a>
          <a href="https://thereadingrush.bigcartel.com/product/set-of-three-bookmarks" target="_blank" class="merch-products--img"><img src ="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/merch-bookmarks.jpg" alt="Reading Rush bookmark set"></a>
        </div>
      </div>
    </div>
  </div>
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





</div>

<?php
get_footer();
