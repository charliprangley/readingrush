<?php
/**
 * BuddyPress Members Directory
 *
 * @version 3.0.0
 */

?>
<h1>Reading Rush Members</h1>
	<?php bp_nouveau_before_members_directory_content(); ?>


	<div class="screen-content">

	<?php bp_get_template_part( 'common/search-and-filters-bar' ); ?>

		<div id="members-dir-list" class="members dir-list" data-bp-list="members">
			<div id="bp-ajax-loader"><?php bp_nouveau_user_feedback( 'directory-members-loading' ); ?></div>
		</div><!-- #members-dir-list -->

		<?php bp_nouveau_after_members_directory_content(); ?>
	</div><!-- // .screen-content -->
