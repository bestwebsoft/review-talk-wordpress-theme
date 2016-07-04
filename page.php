<?php
/**
 * The template part that shows content of page (page content, comment form etc.).
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

get_header( 'single' ); ?>
<div class="review-middle-container"><!-- container for all content on page -->
	<div class="review-wrapper-1200px">
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="review-single-post" class="review-post-content"><!--start of page-->
				<div class="review-post-title">
					<?php the_title(); /*Show page title*/ ?>
				</div>
				<div class="review-post-text"><!--page content-->
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					the_content(); /*show post/page content*/ ?>
				</div><!--end of page content-->
				<div class="review-post-text"><!--page edit link-->
					<p><?php edit_post_link( __( 'Edit', 'review-talk' ) ); ?></p>
				</div>
			</div><!--end of page-->
		<?php endwhile; /*end of the loop.*/ ?>
	</div><!--end of 1200wrapper-->
	<?php if ( comments_open() ) {
		comments_template();
	}
	get_sidebar(); ?>
</div><!-- end of page content -->
<?php get_footer();
