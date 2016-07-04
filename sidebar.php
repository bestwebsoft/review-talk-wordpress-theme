<?php
/**
 * The template part that shows main sidebar.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */ ?>

<div class="review-sidebar-container">
	<?php if ( is_active_sidebar( 'review-sidebar' ) ) :
		dynamic_sidebar( 'review-sidebar' );
	else : /* is_active_sidebar */ ?>
		<div class="review-sidebar-widget">
			<h4 class="review-widget-title"><?php _e( 'recent posts', 'review-talk' ); ?></h4>
			<ul>
				<?php $args   = array(
					'numberposts' => 3,
				);
				$recent_posts = wp_get_recent_posts( $args );
				foreach ( $recent_posts as $recent ) : ?>
					<li class="recentposts">
						<a href="<?php echo get_permalink( $recent['ID'] ); ?>" title="Look <?php echo esc_attr( $recent['post_title'] ); ?>"><?php echo $recent['post_title']; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="review-sidebar-widget">
			<h4 class="review-widget-title"><?php _e( 'recent comments', 'review-talk' ); ?></h4>
			<ul id="recentcomments">
				<?php $args = array(
					'number' => 3,
				);
				$comments   = get_comments( $args );
				foreach ( $comments as $comment ) : ?>
					<li class="recentcomments">
						<span class="comment-author-link">
							<?php if ( esc_url( $comment->comment_author_url ) ) : ?>
								<a href="<?php echo esc_url( $comment->comment_author_url ) ?>"></a>
							<?php endif;
							echo $comment->comment_author; ?>
						</span>
						<?php _e( '&nbsp;on&nbsp;', 'review-talk' ) ?>
						<a href="<?php echo get_permalink( $comment->comment_post_ID ); ?>"><?php echo get_the_title( $comment->comment_post_ID ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="review-sidebar-widget">
			<h4 class="review-widget-title"><?php _e( 'archive', 'review-talk' ); ?></h4>
			<ul>
				<?php $args = array(
					'type'            => 'monthly',
					'limit'           => '3',
					'format'          => 'html',
					'show_post_count' => true,
				);
				wp_get_archives( $args ); ?>
			</ul>
		</div>
		<div class="review-sidebar-widget">
			<h4 class="review-widget-title"><?php _e( 'categories', 'review-talk' ); ?></h4>
			<ul>
				<?php $args = array(
					'show_count'   => '1',
					'hide_empty'   => '1',
					'title_li'     => '',
					'hierarchical' => '0',
					'number'       => '5',
				);
				wp_list_categories( $args ); ?>
			</ul>
		</div><!-- end of sidebar-widget-->
		<div class="review-sidebar-widget">
			<h4 class="review-widget-title"><?php _e( 'Search', 'review-talk' ); ?></h4>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div><!--end of sidebar-->
