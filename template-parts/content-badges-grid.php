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
					the_title( '<h4 class="entry-title">', '</h4>' );
					?>

		</div>
</div>
