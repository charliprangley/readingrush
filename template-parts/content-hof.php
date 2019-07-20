<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package readingrush
 */
$hof_featured_image = get_field('hof_featured_image');
$content_link = get_field('content_link');
$hof_button_text = get_field('hof_button_text');
?>
<div class="col-lg-4 col-sm-6 col-xs-12">
	<div class="color-box color-box--white color-box__newsfeed">
		<div>
					<?php if ($hof_featured_image) : ?>
					<a href="<?php echo $content_link; ?>"><div class="hof-thumbnail" style="background-image: url('<?php echo $hof_featured_image; ?>')">
					</div></a>
				<?php endif; ?>
				<p><?php echo the_content(); ?></p>
				</div>
			<a href="<?php echo $content_link; ?>" class="btn btn-md btn--purple"><?php echo $hof_button_text; ?></a>
	</div>
</div>
