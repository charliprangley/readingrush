<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
 */

?>
<div class="col-md-3 col-sm-4 col-xs-6">
	<div class="badges-grid">
			<div class="thumbnail">
				<?php echo get_the_post_thumbnail(); ?>
			</div>
				<?php
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
					<?php if (get_the_post_thumbnail()) : ?>

				<?php endif; ?>
			<a href="<?php echo get_permalink(); ?>" class="btn btn-md btn--green">Get badge</a>
		</div>
</div>
