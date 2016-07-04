<?php
/**
 * The template part that shows archives content on the page (date archives, tags, categories etc.).
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

get_header(); /*Load header.php template*/ ?>

<div class="review-results">
	<?php /* If this is a category archive */
	if ( is_category() ) { ?>
		<h2 class="review-page-title"><?php _e( 'Category', 'review-talk' ); ?>: <?php single_cat_title(); ?></h2>
		<?php /* If this is a tag archive */
	} elseif ( is_tag() ) { ?>
		<h2 class="review-page-title"><?php _e( 'Tag', 'review-talk' ); ?>: <?php single_tag_title(); ?></h2>
		<?php /* If this is a daily archive */
	} elseif ( is_date() ) { ?>
		<h2 class="review-page-title"><?php _e( 'Archive', 'review-talk' ); ?>: <?php single_month_title( ' ' ); ?></h2>
		<?php /* If this is an author archive */
	} elseif ( is_author() ) { ?>
		<h2 class="review-page-title"><?php _e( 'Author', 'review-talk' ); ?>: <?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
			echo $curauth->nickname; ?> </h2>
		<?php /* If this is an author */
	} ?>
</div>
<div class="review-middle-container"><!-- container for all content on page -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class( 'review-post-content' ); ?>><!-- container for post content -->
				<div class="review-post-wrapper"><!-- all content <=1200px -->
					<div class="avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), '30' ); /*Show author's avatar*/ ?>
					</div>
					<div class="review-post-meta-author">
						<a href=""><?php the_author_posts_link() /*Show author's name*/ ?></a>
					</div>
					<div class="review-post-title">
						<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); /*Show post title*/ ?></a>
					</div>
					<div class="review-post-text"><!--Post excerpt-->
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						the_excerpt();
						wp_link_pages(); ?>
					</div>
					<div class="review-post-text">
						<?php the_category( ', ' ); ?>
						<p><?php the_tags(); ?></p>
					</div>
					<div class="review-post-meta"><!--Post date and comments-->
						<div class="review-post-meta-extra">
							<a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a>
						</div>
						<div class="review-post-meta-comments">
							<a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments', 'review-talk' ), __( 'One Comment', 'review-talk' ), __( '% Comments', 'review-talk' ) ); ?></a>
						</div>
					</div>
				</div><!-- end of 1200px wrapper -->
			</div><!-- end of post -->
		<?php endwhile;
	else : ?>
		<div class="review-post-content">
			<div class="review-post-wrapper"><!-- all content <=1200px -->
				<div class="review-post-text">
					<?php get_search_form(); ?>
					<p><?php _e( 'It seems we cannot find what you are looking for. Perhaps you should try again with a different search term.', 'review-talk' ); ?></p>
				</div>
			</div><!-- end of 1200px wrapper -->
		</div>
	<?php endif; ?>
	<?php get_sidebar(); /*Load sidebar*/ ?>
</div><!-- end of page content -->
<div class="review-pagination"><!-- Navigation through pages -->
	<?php review_pagination(); ?>
</div>
<?php get_footer(); /*Load footer template*/
