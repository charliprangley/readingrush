<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
 $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>
<div class="bbp-pagination">
	<div id="pagination-links" class="bbp-pagination-links"><?php
		//Change 15 to number of replies you specified in wpup_bbp_list_replies
		//First find the number of parent posts only and pass that to the custom pagination function
		$replyposts = bbpress()->reply_query->posts;
		$numparentreplies = 0;
		foreach($replyposts as $value){
		if($value->reply_to == 0) {
		    $numparentreplies++;
		  }
		}
		wpup_custom_pagination($numparentreplies,"",$paged, 15); ?>
	</div>
</div>

<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

	<li class="bbp-header">

		<div class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></div><!-- .bbp-reply-author -->

		<div class="bbp-reply-content">

			<?php if ( !bbp_show_lead_topic() ) : ?>

				<?php _e( 'Posts', 'bbpress' ); ?>

				<?php bbp_topic_subscription_link(); ?>

				<?php bbp_user_favorites_link(); ?>

			<?php else : ?>

				<?php _e( 'Replies', 'bbpress' ); ?>

			<?php endif; ?>

		</div><!-- .bbp-reply-content -->

	</li><!-- .bbp-header -->

	<li class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>

			<?php
			//Change 15 to number of replies you want users to see per page
			wpup_bbp_list_replies(array('page' => $paged, 'per_page' => 15));
			?>

		<?php else : ?>

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</li><!-- .bbp-body -->

	<li class="bbp-footer">

		<div class="bbp-reply-author"><?php  _e( 'Author',  'bbpress' ); ?></div>

		<div class="bbp-reply-content">

			<?php if ( !bbp_show_lead_topic() ) : ?>

				<?php _e( 'Posts', 'bbpress' ); ?>

			<?php else : ?>

				<?php _e( 'Replies', 'bbpress' ); ?>

			<?php endif; ?>

		</div><!-- .bbp-reply-content -->

	</li><!-- .bbp-footer -->

</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->
<div class="bbp-pagination">
	<div id="pagination-links" class="bbp-pagination-links"><?php
		//Change 15 to number of replies you specified in wpup_bbp_list_replies
		//First find the number of parent posts only and pass that to the custom pagination function
		$replyposts = bbpress()->reply_query->posts;
		$numparentreplies = 0;
		foreach($replyposts as $value){
		if($value->reply_to == 0) {
		    $numparentreplies++;
		  }
		}
		wpup_custom_pagination($numparentreplies,"",$paged, 15); ?>
	</div>
</div>

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
