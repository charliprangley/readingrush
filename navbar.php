<?php
/**
 * Navbar
 *
 */

?>

<nav class="navbar">
  <div class="container">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>The Reading Rush</span></a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
     <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'container' => false, 'items_wrap' => '<ul class="nav navbar-nav navbar-right %2$s">%3$s</ul>' ) ); ?>
   </div><!--/.nav-collapse -->
  </div>
</nav>
<?php if (is_user_logged_in()) : ?>
<div class ="sub-navbar">
  <div class="container">
    <div class="sub-navbar--purple">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sub-navbar" aria-expanded="false" aria-controls="sub-navbar">
         <span class="sr-only">Toggle navigation</span>
         Menu
       </button>
       <?php
         global $current_user;
         wp_get_current_user();
         echo '<div class="avatar">' . get_avatar( $current_user->ID, 28 ) . '</div>';
         echo 'Hello, '. $current_user->first_name . '!';
         ?>
     </div>
     <div id="sub-navbar" class="navbar-collapse collapse">
       <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'usery-menu', 'container' => false, 'items_wrap' => '<ul class="nav navbar-nav navbar-right %2$s">%3$s</ul>' ) ); ?>
     </div><!--/.nav-collapse -->
   </div>
  </div>
</div>
<?php endif; ?>
