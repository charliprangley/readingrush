<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header entry-header__newsfeed">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-content">
				<?php echo get_the_excerpt() ?>
			</div><!-- .entry-content -->
			<div class="entry-meta">
				<?php
				readingrush_posted_on();
				readingrush_posted_by();
				the_category();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


</article><!-- #post-<?php the_ID(); ?> -->
