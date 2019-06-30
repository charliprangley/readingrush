<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
 */

?>
<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="color-box color-box--white color-box__newsfeed">
		<div>
				<div class="entry-meta entry-meta--top">
					<div class="posted-on">
						<?php the_time('F jS, Y');?>
					</div>
					<?php the_category();?>
				</div>
				<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
					<div class="entry-meta entry-meta--author">
						<?php
							readingrush_posted_by();
						?>
					</div>
					<?php if (get_the_post_thumbnail()) : ?>
					<div class="thumbnail">
						<?php echo get_the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>
				</div>
			<a href="<?php echo get_permalink(); ?>" class="btn btn-md btn--green">Read post</a>
	</div>
</div>
