<?php
/**
 * The template part that shows all header content (<head> section, site title, site description, header image)
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */
?><!DOCTYPE html>
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
	<div class="review-header-container"><!-- header -->
		<div class="review-wrapper-1200px"><!--1200px wrapper-->
			<div class="review-top-menu-container"><!-- top menu -->
				<div class="prmenu_container">
					<ul class="menu-toggle">
						<li class="menu-toggle"><a href="#"></a></li>
					</ul>
					<?php wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'container'      => '',
						'menu_class'     => 'review-top-menu',
					) ); ?>
				</div>
			</div><!-- end of top menu container -->
			<div class="review-logo-container"><!-- site tittle -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
			<div class="review-description-container"> <!-- site description -->
				<?php bloginfo( 'description' ); ?>
			</div>
		</div><!-- end of1200px wrapper-->
	</div><!-- end of main header -->
