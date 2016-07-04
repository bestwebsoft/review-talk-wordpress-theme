<?php
/**
 * The template part that shows all header content on single post pages (<head> section, site title)
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset=<?php bloginfo( 'charset' ); ?>>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<?php if ( is_singular() and comments_open() and ( get_option( 'thread_comments' ) == 1 ) ) {
		wp_enqueue_script( 'comment-reply' );
	} ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="review-preloader" class="no-js"><span class="review-spinner"></span></div>
<div class="review-main-container"><!--page wrapper-->
	<div class="review-single-header-container"><!-- SINGLE HEADER -->
		<div class="review-wrapper-1200px"><!--all content <=1200px -->
			<div class="review-top-menu-container"><!-- top menu -->
				<div class="prmenu_container">
					<ul class="menu-toggle">
						<li class="menu-toggle"><a href="#"></a></li>
					</ul>
					<?php wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'container'      => 'false',
						'menu_class'     => 'review-top-menu',
					) ); ?>
				</div>
			</div><!-- end of top menu container -->
			<div class="review-single-logo-container"><!-- site tittle -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		</div><!-- end of 1200px wrapper -->
	</div><!-- end of single header -->
