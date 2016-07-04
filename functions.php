<?php
/**
 * This file adds custom theme features and functionality.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */

/*to max oEmbed content*/
if ( ! isset( $content_width ) ) {
	$content_width = 744;
}

function review_theme_features() {
	/* This theme styles the visual editor with editor-style.css to match the theme style. */
	add_editor_style();
	/*enable featured images*/
	add_theme_support( 'post-thumbnails' );
	/*to manage document title*/
	add_theme_support( 'title-tag' );
	/*add rss links to head*/
	add_theme_support( 'automatic-feed-links' );
	/*add the ability to change image in header*/
	$args = array(
		'width'              => 1920,
		'height'             => 600,
		'flex-width'         => true,
		'header-text'        => true,
		'default-text-color' => '#fff',
		'default-image'      => get_template_directory_uri() . '/images/index-1200.jpg',
		'uploads'            => true,
		'wp-head-callback'   => 'review_header_style',
	);
	add_theme_support( 'custom-header', $args );

	/* This theme allows users to set a custom background. */
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $defaults );

	register_default_headers( array(
		'books' => array(
			'url'           => get_template_directory_uri() . '/images/index-1200.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/index-1200.jpg',
			'description'   => _x( 'Books', 'Default header image', 'review-talk' ),
		),
	) );

	load_theme_textdomain( 'review-talk', get_template_directory() . '/languages' );
}

function review_header_style() {

	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	/* If no custom options for text are set, let's bail. */
	if ( empty( $header_image ) && get_theme_support( 'custom-header', 'default-text-color' ) == $text_color ) {
		return;
	}
	/* If we get this far, we have custom styles. */ ?>
	<style type="text/css">
		<?php if ( ! empty( $header_image ) ) : ?>
			.review-header-container {
				position: relative;
				margin: auto;
				width: 100%;
				background: linear-gradient(
					rgba(252, 71, 75, 0.8),
					rgba(252, 71, 75, 0.8)
				), url(<?php header_image(); ?>);
				background: -webkit-linear-gradient(rgba(252, 71, 75, 0.8), rgba(252, 71, 75, 0.8)), url(<?php header_image(); ?>);
			}
		<?php endif;

		if ( get_theme_support( 'custom-header', 'default-text-color' ) != $text_color   ) :  /* If the user has set a custom color for the text use that */ ?>
			.review-logo-container a,
			.review-description-container {
				color: <?php echo '#' . $text_color; ?> !important;
			}
		<?php endif; ?>
	</style>
<?php } /*review_header_style */

function review_register_menu() {
	/* Register Navigation Menu */
	register_nav_menu( 'header-menu', 'Main Menu' );
}

function review_sidebar() {
	/* Register Sidebar */
	/* Register the primary sidebar. */
	register_sidebar(
		array(
			'id'            => 'review-sidebar',
			'name'          => __( 'Main Sidebar', 'review-talk' ),
			'description'   => __( 'Single right sidebar', 'review-talk' ),
			'before_widget' => '<div class="review-sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="review-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	/* Footer widget areas */
	/* First footer widget area, located in the footer. Empty by default. */
	register_sidebar(
		array(
			'name'          => __( 'First Footer Widget Area', 'review-talk' ),
			'id'            => 'left-footer-widget-area',
			'description'   => __( 'left footer widget area', 'review-talk' ),
			'before_widget' => '<div class="review-footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="review-footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	/* Second Footer Widget Area, located in the footer. Empty by default. */
	register_sidebar(
		array(
			'name'          => __( 'Second Footer Widget Area', 'review-talk' ),
			'id'            => 'middle-footer-widget-area',
			'description'   => __( 'middle footer widget area', 'review-talk' ),
			'before_widget' => '<div class="review-footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="review-footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	/* Third Footer Widget Area, located in the footer. Empty by default. */
	register_sidebar(
		array(
			'name'          => __( 'Third Footer Widget Area', 'review-talk' ),
			'id'            => 'right-footer-widget-area',
			'description'   => __( 'right footer widget area', 'review-talk' ),
			'before_widget' => '<div class="review-footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="review-footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);
}

/**
 * Add social icons widget.
 */
require get_template_directory() . '/widgets/social-icons.php';
/**
 * Add contact info widget.
 */
require get_template_directory() . '/widgets/contact-info.php';

/* Enqueue scripts and stylesheet for a theme: */
function review_scripts_enqueue() {
	/* Enqueue scripts for a theme: */
	wp_enqueue_script( 'reviewscript', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	wp_enqueue_script( 'prmenu', get_template_directory_uri() . '/js/jquery.prmenu.js', array( 'jquery' ) );
	wp_enqueue_script( 'filestyle', get_template_directory_uri() . '/js/jquery-filestyle.js', array( 'jquery' ) );
	wp_enqueue_script( 'formstyler', get_template_directory_uri() . '/js/jquery.formstyler.js', array( 'jquery' ) );
	wp_enqueue_script( 'hideshare', get_template_directory_uri() . '/js/hideshare.js', array( 'jquery' ) );
	/* Enqueue the stylesheet for a theme: */
	wp_enqueue_style( 'review', get_stylesheet_uri() );
	/* Enqueue FontAwesome icons font */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome-4.4.0/css/font-awesome.min.css' );
}

if ( ! function_exists( 'review_comment_list' ) ) :
	function review_comment_list( $comment, $args, $depth ) {
		/*Comment list layout */
		$GLOBALS['comment'] = $comment; ?>
		<div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"> <!-----Comment layout---->
			<div class="review-comment-author-avatar"><!-- AVATAR -->
				<?php echo get_avatar( $comment, $size = '60', $default = '' ); ?>
			</div>
			<div class="review-comment-list-meta"> <!-- Comment author and date -->
			<span> <!-- author name and link -->
				<a href="<?php the_author_meta( 'user_url' ); ?>"><?php printf( '%s', get_comment_author_link() ) ?></a>
				<?php edit_comment_link( __( '(Edit)', 'review-talk' ), '  ', '' ) ?>
			</span>
			<span class="review-comment-list-date"> <!-- comment date -->
				<?php printf( __( 'on %1$s, %2$s ', 'review-talk' ), get_comment_date(), get_comment_time() ) ?>
			</span>
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<br />
					<span class="review-unapproved"><?php _e( 'Your comment is awaiting moderation.', 'review-talk' ) ?></span>
					<br />
				<?php endif; ?>
			</div>  <!-- end of comment author and date -->
			<div class="review-comment-text"> <!--- Comment text -->
				<?php comment_text() ?>
			</div>
			<br />
			<div class="review-reply">  <!--- Reply form -->
				<?php comment_reply_link( array_merge( $args, array(
					'reply_text' => __( 'REPLY', 'review-talk' ),
					'depth'      => $depth,
					'max_depth'  => $args['max_depth'],
				) ) ); ?>
			</div>
			<div class="review-share"> <!--- Share link -->
				<a class="share" href="#"><?php _e( 'SHARE', 'review-talk' ) ?></a>
			</div>
		</div>
	<?php }
endif;

if ( ! function_exists( 'review_pings' ) ) :
	/*Displaying pingbacks*/
	function review_pings( $comment, $args, $depth ) {
		/* Custom callback to list pings */
		$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
		<div class="review-comment-list-meta">
				<span class="review-comment-list-date">
					<?php printf( __( 'By %1$s on %2$s at %3$s', 'review-talk' ),
						get_comment_author_link(),
						get_comment_date(),
						get_comment_time() );
					edit_comment_link( __( '(Edit)', 'review-talk' ), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
				</span>
			<?php if ( '0' == $comment->comment_approved ) { ?>
				<br />
				<span class="review-unapproved"><?php _e( 'Your trackback is awaiting moderation.', 'review-talk' ) ?></span>
			<?php } ?>
		</div>
		<div class="review-comment-text">
			<?php comment_text() ?>
		</div>
	<?php }
endif;/* end custom_pings */

if ( ! function_exists( 'review_pagination' ) ) :
	/*Theme pagination*/
	function review_pagination() {
		global $wp_query;
		$big = 999999999; /* need an unlikely integer */
		echo paginate_links(
			array(
				'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'             => '?paged=%#%',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'total'              => $wp_query->max_num_pages,
				'show_all'           => false,
				'end_size'           => 0,
				'mid_size'           => 1,
				'prev_next'          => true,
				'prev_text'          => ( '&#8592;' ),
				'next_text'          => ( '&#8594;' ),
				'type'               => 'plain',
				'add_args'           => false,
				'add_fragment'       => '',
				'before_page_number' => '',
				'after_page_number'  => '',
			)
		);
	}
endif;

/*custom excerpt settings*/
function review_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'review-talk' ) . '</a>';
}

/* custom theme features */
add_action( 'after_setup_theme', 'review_theme_features' );
/* custom navigation menu */
add_action( 'init', 'review_register_menu' );
/* init widgets */
add_action( 'widgets_init', 'review_sidebar' );
/* enqueue theme scripts and stylesheet */
add_action( 'wp_enqueue_scripts', 'review_scripts_enqueue' );
/* custom excerpt */
add_filter( 'excerpt_more', 'review_excerpt_more' );
