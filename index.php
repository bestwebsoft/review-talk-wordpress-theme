<?php
/**
 * The template part that shows all content on the page (post, pages etc.).
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

if ( is_page() ) {
	get_header( 'single' ); /*Load single-header.php template*/
} else {
	get_header(); /*Load header.php template*/
} ?>
<div class="review-middle-container"> <!-- container for all content on page -->
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class( 'review-post-content' ); ?>> <!-- container for post content -->
				<div class="review-post-wrapper"><!-- all content <=1200px -->
					<?php if ( ! is_page() ) { ?>
						<div class="avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), '30' ); /*Show author's avatar*/ ?>
						</div>
						<div class="review-post-meta-author">
							<a href=""><?php the_author_posts_link(); /*Show author's name*/ ?></a>
						</div>
					<?php }
					if ( is_page() ) { ?>
						<div class="review-post-title">
							<?php the_title(); /*Show post title*/ ?>
						</div>
					<?php } else { ?>
						<div class="review-post-title">
							<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); /*Show post title*/ ?></a>
						</div>
					<?php } ?>
					<div class="review-post-text"> <!--posts text and content-->
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						the_content(); /*show post/page content*/
						wp_link_pages(); ?>
					</div> <!--end of posts text and content-->
					<div class="review-post-text"> <!--posts tags and categories-->
						<?php the_category( ', ' ); ?>
						<p><?php the_tags(); ?></p>
						<p><?php edit_post_link( __( 'Edit', 'review-talk' ) ); ?></p>
					</div>
					<?php if ( ! is_page() ) { ?>
						<div class="review-post-meta">
							<div class="review-post-meta-extra"> <!--link to post and post comments-->
								<a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a><!--echo post date-->
							</div>
							<div class="review-post-meta-comments">
								<a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments', 'review-talk' ), __( 'One Comment', 'review-talk' ), __( '% Comments', 'review-talk' ) ); ?></a>
							</div>
						</div>
					<?php } ?>
				</div> <!-- end of 1200px wrapper -->
			</div> <!-- end of post -->
			<?php if ( comments_open() && is_page() ) {
				comments_template();
			}
		endwhile;
	else : ?>
		<div class="review-post-content">
			<div class="review-post-wrapper"> <!-- all content <=1200px -->
				<div class="review-post-text">
					<?php get_search_form(); ?>
					<p><?php _e( 'It seems we cannot find what you are looking for. Perhaps you should try again with a different search term.', 'review-talk' ); ?></p>
				</div>
			</div> <!-- end of 1200px wrapper -->
		</div>
	<?php endif;
	get_sidebar(); /*Load sidebar*/ ?>
</div> <!-- end of page content -->
<?php if ( ! is_page() ) { ?>
	<div class="review-pagination"> <!-- Navigation through pages -->
		<?php review_pagination(); ?>
	</div>
<?php }
get_footer(); /*Load footer template*/
