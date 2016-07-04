<?php
/**
 * The template part that shows footer area of the page.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */ ?>

<div class="review-footer-container">
	<div class="review-wrapper-1200px"> <!-- all content <= 1200px -->
		<div class="review-widget-footer-area"> <!-- footer widget area -->
			<div id="review-widget-area-1">
				<?php if ( is_active_sidebar( 'left-footer-widget-area' ) ) {
					dynamic_sidebar( 'left-footer-widget-area' );
				} ?>
			</div>
			<div id="review-widget-area-2">
				<?php if ( is_active_sidebar( 'middle-footer-widget-area' ) ) {
					dynamic_sidebar( 'middle-footer-widget-area' );
				} ?>
			</div>
			<div id="review-widget-area-3">
				<?php if ( is_active_sidebar( 'right-footer-widget-area' ) ) {
					dynamic_sidebar( 'right-footer-widget-area' );
				} ?>
			</div>
		</div> <!-- end of footer widget area -->
		<div class="review-copyright-container">
			<p>
				<?php printf(
					__( 'Copyright &copy; %1$s %2$s', 'review-talk' ),
					date_i18n( 'Y' ),
					get_bloginfo( 'name' )
				); ?>
			</p>
			<p><?php printf( __( 'Powered by %1$s and %2$s', 'review-talk' ), '<a href="' . esc_url( wp_get_theme()->get( 'AuthorURI' ) ) . '">BestWebLayout</a>', '<a href="' . esc_url( 'http://wordpress.org' ) . '">WordPress</a>' ); ?></p>
		</div>
	</div> <!-- end of 1200px wrapper -->
</div> <!-- end of footer -->
</div> <!-- end of .review-main-container -->
<?php wp_footer(); ?>
</body>
</html>
