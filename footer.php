<?php
/**
 * The template for displaying the main footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package readingrush
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="flex-row flex-row--stretch flex-row--space">
				<div class="site-footer--links">
					<h5>Challenge</h5>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'challenge', 'container' => false, 'items_wrap' => '<ul class="footer-links">%3$s</ul>' ) ); ?>
				</div>
				<div class="site-footer--links">
					<h5>Content</h5>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-4', 'menu_id' => 'content', 'container' => false, 'items_wrap' => '<ul class="footer-links">%3$s</ul>' ) ); ?>
				</div>
				<div class="site-footer--links">
					<h5>Account</h5>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-5', 'menu_id' => 'account', 'container' => false, 'items_wrap' => '<ul class="footer-links">%3$s</ul>' ) ); ?>
				</div>
				<div class="site-footer--brand">
						<a class="footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>The Reading Rush</span></a>
						<div class="site-footer--social">
							<a href="https://www.youtube.com/thereadingrush">
								<svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3295 16.4994V7.28795L20.4318 11.8939L12.3295 16.4994ZM30.3522 4.38958C29.9957 3.04811 28.9452 1.99175 27.6115 1.63324C25.194 0.981689 15.5 0.981689 15.5 0.981689C15.5 0.981689 5.80598 0.981689 3.38851 1.63324C2.05481 1.99175 1.00433 3.04811 0.64783 4.38958C0 6.82084 0 11.8937 0 11.8937C0 11.8937 0 16.9664 0.64783 19.3978C1.00433 20.7393 2.05481 21.7956 3.38851 22.1543C5.80598 22.8057 15.5 22.8057 15.5 22.8057C15.5 22.8057 25.194 22.8057 27.6115 22.1543C28.9452 21.7956 29.9957 20.7393 30.3522 19.3978C31 16.9664 31 11.8937 31 11.8937C31 11.8937 31 6.82084 30.3522 4.38958Z" fill="currentColor"/>
								</svg>
							</a>
							<a href="https://twitter.com/thereadingrush">
								<svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M20.6495 5.71254C20.6567 5.91718 20.6609 6.12601 20.6609 6.3359C20.6609 12.6734 15.9155 19.9817 7.23415 19.9817C4.56883 19.9817 2.08828 19.1915 0 17.8262C0.370585 17.8713 0.745299 17.8954 1.12517 17.8954C3.33836 17.8954 5.3709 17.1293 6.98743 15.8417C4.92289 15.8007 3.18146 14.4155 2.58067 12.5087C2.86661 12.5664 3.16081 12.5947 3.46739 12.5947C3.89475 12.5947 4.31386 12.5381 4.70921 12.4268C2.55177 11.9882 0.922849 10.0498 0.922849 7.72535C0.922849 7.70436 0.922849 7.68442 0.926978 7.66343C1.55976 8.02444 2.29061 8.23747 3.06481 8.26161C1.79821 7.40527 0.963108 5.93397 0.963108 4.26957C0.963108 3.39224 1.19743 2.56843 1.60105 1.85902C3.92675 4.76175 7.40757 6.67172 11.3261 6.87216C11.2455 6.51955 11.2053 6.1554 11.2053 5.7776C11.2053 3.12988 13.3183 0.981689 15.9238 0.981689C17.2823 0.981689 18.5076 1.56413 19.3664 2.49392C20.4431 2.28089 21.4557 1.88315 22.3672 1.3301C22.0121 2.453 21.2658 3.39224 20.2903 3.98622C21.2462 3.87183 22.1577 3.61367 23 3.23273C22.3713 4.19191 21.5682 5.03565 20.6495 5.71254Z" fill="currentColor"/>
								</svg>
							</a>
							<a href="https://www.instagram.com/thereadingrush/">
								<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M6.32929 0H18.6707C21.9924 0 24.9817 3.20491 24.9817 6.31098V18.6524C24.9817 22.1375 22.1558 24.9634 18.6707 24.9634H6.32929C3.00762 24.9634 0.0183105 21.7585 0.0183105 18.6524V6.31098C0.0183105 2.8259 2.84419 0 6.32929 0ZM6.32929 1.96341C3.92856 1.96341 1.98173 3.91026 1.98173 6.31098V18.6524C1.98173 20.7035 4.12371 23 6.32929 23H18.6707C21.0715 23 23.0183 21.0532 23.0183 18.6524V6.31098C23.0183 4.25989 20.8763 1.96341 18.6707 1.96341H6.32929ZM12.5 18.7761C15.9763 18.7761 18.7944 15.958 18.7944 12.4817C18.7944 9.00548 15.9762 6.18728 12.5 6.18728C9.02379 6.18728 6.20559 9.00548 6.20559 12.4817C6.20559 15.9579 9.02379 18.7761 12.5 18.7761ZM16.831 12.4817C16.831 10.0898 14.8919 8.15069 12.5 8.15069C10.1082 8.15069 8.16901 10.0898 8.16901 12.4817C8.16901 14.8736 10.1082 16.8127 12.5 16.8127C14.8919 16.8127 16.831 14.8737 16.831 12.4817ZM21.0297 6.06667C21.0297 3.85674 17.7142 3.85674 17.7142 6.06667C17.7142 8.2777 21.0297 8.2777 21.0297 6.06667Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					<div class="site-footer--copyright">
						© The Reading Rush 2019
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
