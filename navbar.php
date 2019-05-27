<?php
/**
 * Navbar
 *
 */

?>

<nav class="navbar<?php
  if ( is_author() ) :
    echo ' navbar--dark';
  endif;
  if ( is_page() ) :
   $header_font_style = get_field( "header_font_style" );
   if ( $header_font_style === 'dark') :
     echo ' navbar--dark';
   endif;
  endif;
  ?>">
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
