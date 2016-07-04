<?php
/**
 * The template part that shows content of single post (post content, comment form etc.).
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

get_header( 'single' ); ?>
<div class="review-middle-container"><!-- container for all content on page -->
	<div class="review-wrapper-1200px">
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="review-single-post" class="review-post-content"><!--start of single post-->
				<div class="avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), '30' ); /*Show author's avatar*/ ?>
				</div>
				<div class="review-post-meta-author">
					<a href=""><?php the_author_posts_link(); /*Show author's name*/ ?></a>
				</div>
				<div class="review-post-title">
					<?php the_title(); /*Show post title*/ ?>
				</div>
				<div class="review-post-icon"></div>
				<div class="review-post-text"><!--post text and content-->
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					the_content(); /*show post/page content*/
					wp_link_pages(); ?>
				</div><!--end of post text and content-->
				<div class="review-post-text"><!--post tags and categories-->
					<?php the_category( ', ' ); ?>
					<p><?php the_tags(); ?></p>
					<p><?php edit_post_link( __( 'Edit', 'review-talk' ) ); ?></p>
				</div>
				<div class="review-post-navigation">
					<?php the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '&#8592; Next post', 'review-talk' ) . '</span> ' .
														 '<span class="screen-reader-text">' . __( 'Next post', 'review-talk' ) . '</span> ',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous post &#8594;', 'review-talk' ) . '</span> ' .
														 '<span class="screen-reader-text">' . __( 'Previous post', 'review-talk' ) . '</span> ',
						)
					); ?>
				</div>
				<div class="review-post-meta"><!--post date and comments number-->
					<div class="review-post-meta-extra">
						<?php /*Link to the archive page*/
						$archive_year  = get_the_date( 'Y' );
						$archive_month = get_the_date( 'm' ); ?>
						<a href="<?php echo esc_url( get_month_link( $archive_year, $archive_month ) ); ?>"><?php echo get_the_date(); ?></a><!--echo post date-->
					</div>
					<div class="review-post-meta-comments">
						<a href="#respond"><?php comments_number( __( 'No comments', 'review-talk' ), __( 'One Comment', 'review-talk' ), __( '% Comments', 'review-talk' ) ); ?></a>
					</div>
				</div>
			</div><!--end of single post-->
		<?php endwhile; /*end of the loop.*/ ?>
	</div><!--end of 1200wrapper-->
	<?php if ( comments_open() ) {
		comments_template();
	}
	get_sidebar(); ?>
</div><!-- end of page content -->
<?php get_footer();
