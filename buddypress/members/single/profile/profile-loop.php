<?php
/**
 * BuddyPress - Members Profile Loop
 *
 * @since 3.0.0
 * @version 3.1.0
 */

?>
<?php if (bp_is_my_profile()) : ?>
<h2 class="screen-heading view-profile-screen"><?php esc_html_e( 'Your Profile', 'buddypress' ); ?></h2>
<?php endif; ?>

<?php bp_nouveau_xprofile_hook( 'before', 'loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php
	while ( bp_profile_groups() ) :
		bp_the_profile_group();
	?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php bp_nouveau_xprofile_hook( 'before', 'field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">
				<div class="row">
					<div class="col-sm-7">
						<h5>Bio</h5>
						<?php bp_profile_field_data('field=bio');?>
						<div class="mt50">
							<h5>Reading Rush TBR</h5>
							<em><?php echo bp_profile_field_data('field=Your Reading Rush To Be Read list'); ?></em>
						</div>
					</div>
					<div class="col-sm-5 profile-socials">
						<h5>Social links</h5>
						<?php if ( $data = bp_get_profile_field_data( 'field=Goodreads profile link' ) ) : ?>
							<a href="<?php echo bp_profile_field_data('field=Goodreads profile link'); ?>" target="_blank">
								<div class="profile-socials__icon">
									<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.9138 22.474C19.3771 22.4451 21.8395 20.7129 23.3007 17.2778H23.377V22.5171C23.377 22.9076 23.3513 23.5129 23.3007 24.3357C23.1965 25.1871 22.918 26.1039 22.4662 27.0854C22.0138 28.009 21.2833 28.7962 20.2763 29.4452C19.2801 30.1521 17.8909 30.5201 16.1065 30.5493C14.3878 30.5493 12.9343 30.1017 11.7445 29.2069C10.5286 28.3264 9.81814 26.8973 9.61191 24.9202H8.10014C8.25518 27.4889 9.07513 29.3223 10.5612 30.4195C12.0085 31.473 13.8446 32 16.0682 32C18.2646 32 19.9778 31.589 21.2055 30.7657C22.4201 29.9719 23.2924 28.9826 23.8229 27.7993C24.3528 26.616 24.6695 25.4896 24.7722 24.4222C24.8507 23.3534 24.8889 22.5889 24.8889 22.1271V0.51982H23.3764V5.28287H23.3C22.7177 3.53689 21.7552 2.21617 20.4104 1.32087C19.0535 0.440586 17.5542 0 15.9132 0C13.0555 0.0579562 10.8845 1.16203 9.39861 3.31288C7.87292 5.44863 7.11108 8.08336 7.11108 11.2153C7.11108 14.4342 7.83453 17.0969 9.28173 19.2042C10.7437 21.3556 12.9534 22.4451 15.9138 22.474ZM10.4465 4.48212C11.6347 2.53333 13.4569 1.52323 15.9139 1.45106C18.4341 1.5236 20.3007 2.50491 21.5167 4.39589C22.7313 6.28702 23.3389 8.56011 23.3389 11.216C23.3389 13.8721 22.7313 16.1306 21.5167 17.9924C20.3007 19.9706 18.4341 20.9806 15.9139 21.0237C13.5356 20.9799 11.725 19.9983 10.4849 18.0792C9.23092 16.2171 8.60433 13.9294 8.60433 11.2157C8.60396 8.6752 9.21797 6.43053 10.4465 4.48212Z" fill="currentColor"/>
									</svg>
								</div>
								View Goodreads profile
							</a>
						<?php endif;?>
						<?php if ( $data = bp_get_profile_field_data( 'field=Twitter username' ) ) : ?>
							<a href="https://twitter.com/<?php echo bp_profile_field_data('field=Twitter username'); ?>" target="_blank">
								<div class="profile-socials__icon">
									<svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M20.6495 5.71254C20.6567 5.91718 20.6609 6.12601 20.6609 6.3359C20.6609 12.6734 15.9155 19.9817 7.23415 19.9817C4.56883 19.9817 2.08828 19.1915 0 17.8262C0.370585 17.8713 0.745299 17.8954 1.12517 17.8954C3.33836 17.8954 5.3709 17.1293 6.98743 15.8417C4.92289 15.8007 3.18146 14.4155 2.58067 12.5087C2.86661 12.5664 3.16081 12.5947 3.46739 12.5947C3.89475 12.5947 4.31386 12.5381 4.70921 12.4268C2.55177 11.9882 0.922849 10.0498 0.922849 7.72535C0.922849 7.70436 0.922849 7.68442 0.926978 7.66343C1.55976 8.02444 2.29061 8.23747 3.06481 8.26161C1.79821 7.40527 0.963108 5.93397 0.963108 4.26957C0.963108 3.39224 1.19743 2.56843 1.60105 1.85902C3.92675 4.76175 7.40757 6.67172 11.3261 6.87216C11.2455 6.51955 11.2053 6.1554 11.2053 5.7776C11.2053 3.12988 13.3183 0.981689 15.9238 0.981689C17.2823 0.981689 18.5076 1.56413 19.3664 2.49392C20.4431 2.28089 21.4557 1.88315 22.3672 1.3301C22.0121 2.453 21.2658 3.39224 20.2903 3.98622C21.2462 3.87183 22.1577 3.61367 23 3.23273C22.3713 4.19191 21.5682 5.03565 20.6495 5.71254Z" fill="currentColor"/>
									</svg>
								</div>
								@<?php echo bp_profile_field_data('field=Twitter username'); ?>
							</a>
						<?php endif;?>
						<?php if ( $data = bp_get_profile_field_data( 'field=Instagram username' ) ) : ?>
							<a href="https://instagram.com/<?php echo bp_profile_field_data('field=Instagram username'); ?>" target="_blank">
								<div class="profile-socials__icon">
									<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M6.32929 0H18.6707C21.9924 0 24.9817 3.20491 24.9817 6.31098V18.6524C24.9817 22.1375 22.1558 24.9634 18.6707 24.9634H6.32929C3.00762 24.9634 0.0183105 21.7585 0.0183105 18.6524V6.31098C0.0183105 2.8259 2.84419 0 6.32929 0ZM6.32929 1.96341C3.92856 1.96341 1.98173 3.91026 1.98173 6.31098V18.6524C1.98173 20.7035 4.12371 23 6.32929 23H18.6707C21.0715 23 23.0183 21.0532 23.0183 18.6524V6.31098C23.0183 4.25989 20.8763 1.96341 18.6707 1.96341H6.32929ZM12.5 18.7761C15.9763 18.7761 18.7944 15.958 18.7944 12.4817C18.7944 9.00548 15.9762 6.18728 12.5 6.18728C9.02379 6.18728 6.20559 9.00548 6.20559 12.4817C6.20559 15.9579 9.02379 18.7761 12.5 18.7761ZM16.831 12.4817C16.831 10.0898 14.8919 8.15069 12.5 8.15069C10.1082 8.15069 8.16901 10.0898 8.16901 12.4817C8.16901 14.8736 10.1082 16.8127 12.5 16.8127C14.8919 16.8127 16.831 14.8737 16.831 12.4817ZM21.0297 6.06667C21.0297 3.85674 17.7142 3.85674 17.7142 6.06667C17.7142 8.2777 21.0297 8.2777 21.0297 6.06667Z" fill="currentColor"/>
									</svg>
								</div>
								@<?php echo bp_profile_field_data('field=Instagram username'); ?>
							</a>
						<?php endif;?>
						<?php if ( $data = bp_get_profile_field_data( 'field=YouTube channel link' ) ) : ?>
							<a href="<?php echo bp_profile_field_data('field=YouTube channel link'); ?>" target="_blank">
								<div class="profile-socials__icon">
									<svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3295 16.4994V7.28795L20.4318 11.8939L12.3295 16.4994ZM30.3522 4.38958C29.9957 3.04811 28.9452 1.99175 27.6115 1.63324C25.194 0.981689 15.5 0.981689 15.5 0.981689C15.5 0.981689 5.80598 0.981689 3.38851 1.63324C2.05481 1.99175 1.00433 3.04811 0.64783 4.38958C0 6.82084 0 11.8937 0 11.8937C0 11.8937 0 16.9664 0.64783 19.3978C1.00433 20.7393 2.05481 21.7956 3.38851 22.1543C5.80598 22.8057 15.5 22.8057 15.5 22.8057C15.5 22.8057 25.194 22.8057 27.6115 22.1543C28.9452 21.7956 29.9957 20.7393 30.3522 19.3978C31 16.9664 31 11.8937 31 11.8937C31 11.8937 31 6.82084 30.3522 4.38958Z" fill="currentColor"/>
									</svg>
								</div>
								View YouTube channel
							</a>
						<?php endif;?>
					</div>
				</div>
				<div class="row mt50">
					<div class="col-sm-12">
						<h5>Stats</h5>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/stats-placeholder.png" alt="stats coming soon" width="613" class="size-full">
					</div>

				</div>
			</div>

			<?php bp_nouveau_xprofile_hook( 'after', 'field_content' ); ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php bp_nouveau_xprofile_hook( '', 'field_buttons' ); ?>

<?php endif; ?>

<?php
bp_nouveau_xprofile_hook( 'after', 'loop_content' );
