(function($) {
	$(function() {
		/* Remove <br> tag between default WordPress gallery items */
		$( "div.gallery br" ).remove();
		/* Show page preloader*/
		$( "#review-preloader" ).removeClass( "no-js" );

		/* Create layout for default page template */
		if ( $( 'body' ).hasClass( 'page-template-default' ) ) {
			$( '.review-post-wrapper' ).wrapInner( '<div id="review-single-post" />' );
		}

		/* Create layout for page template */
		if ( $( 'body' ).hasClass( 'page-template' ) ) {
			$( '.review-header-container' ).nextUntil( '.review-sidebar-container' ).wrapAll( '<div class="review-post-wrapper" />' );
			$( '.review-header-container' ).nextUntil( '.review-footer-container' ).wrapAll( '<div class="review-middle-container" />' ); 
			$( '.review-post-wrapper' ).children().addClass( 'review-narrow' );
			$( '.review-narrow' ).css({
					'line-height': '2',
					'font-size': '18px',
					'font-weight': '300',
					'letter-spacing': '1px',
			});
		}

		/* Create layout for single template */
		if ( $( 'body' ).hasClass( 'single' ) || $( 'body' ).hasClass( 'tax-portfolio_technologies' ) ) {
			$( '.review-header-container' ).nextUntil( '.review-sidebar-container' ).wrapAll( '<div class="review-post-wrapper" />' );
			$( '.review-header-container' ).nextUntil( '.review-footer-container' ).wrapAll( '<div class="review-middle-container" />' ); 
			$( '.review-post-wrapper' ).children().attr( 'id', 'review-single-post' );
			$( '#review-single-post' ).css({
					'line-height': '2',
					'font-size': '18px',
					'font-weight': '300',
					'letter-spacing': '1px',
			});

			/* Make comment form width equal to window width */
			if ( $( 'body' ).hasClass( 'single-post' )|| $( 'body' ).hasClass( 'single-attachment' ) ) {
			} else {
				$(window).resize(function() {
					$( ".review-comment-form" ).width($(window).width());
					if ( $(window).width() >= 1200 ) {
						$( '.review-comment-form' ).css( "margin-left", Math.floor(-($(window).width()-1200)/2 ));
					} else {
						$( '.review-comment-form' ).css( "margin-left", -10 );
					}
				});

				$( ".review-comment-form" ).width($(window).width());
				if ( $(window).width() >= 1200 ) {
					$( '.review-comment-form' ).css( "margin-left", Math.floor(-($(window).width()-1200)/2 ));
				} else {
					$( '.review-comment-form' ).css( "margin-left", -10 );
				}
			}
		}
	});

	/*
	Function for positioning post content and sidebar.
	Make post content wider if there is no right sidebar.
	Works on non singular templates.
	*/
	function contentResize() {
		var sidebarHeight = $( '.review-sidebar-container' ).height();
		var postsHeight = $( '.review-post-content' ).height();
		var fullContentHeight = 0;

		/* Resizing posts if there is right sidebar */
		$( '.review-post-content' ).each(function() {
			if ( sidebarHeight - postsHeight <= 0 ) {
				$(this).find( '.review-post-wrapper' ).toggleClass( 'review-narrow' );
				return false;
			} else if ( sidebarHeight - postsHeight > 0 ) { 
				$(this).find( '.review-post-wrapper' ).toggleClass( 'review-narrow' );
			}
			postsHeight += $(this).height();  
		});
		$( 'body' ).find( '.review-results' ).toggleClass( 'review-narrow' );
		$( '.review-post-content' ).each(function() {
			fullContentHeight += $(this).height();
		});

		/* Adding margin if sidebar longer than content */
		if ( $(window).width() > 640 ) {
			if ( sidebarHeight > fullContentHeight ) {
				$( ".review-post-content:last" ).css( "margin-bottom", ( sidebarHeight - fullContentHeight ) );
			}
		} else {
			$( ".review-post-content:last" ).css( "margin-bottom", 0);
		}

		/* Positioning of content and sidebar */
		if ( $(window).width() >= 1200 ) {
			$( '.review-narrow' ).css( "margin-left", ( $(window).width()-1200)/2 );
			$( '.review-sidebar-container' ).css( "right", ( $(window).width()-1200)/2 );
		}

		/* Positioning of content and sidebar on resize event */
		$(window).resize(function() {
			if ( $(window).width() >= 1200 ) {
				$( '.review-narrow' ).css( "margin-left", ( $(window).width()-1200)/2 );
				$( '.review-sidebar-container' ).css( "right", ( $(window).width()-1200)/2 );
			} else {
				$( '.review-narrow' ).css( "margin-left", 0 );
				$( '.review-sidebar-container' ).css( "right", 0 );
			}

			/* Adding margin to content if sidebar longer than content */
			if ( $(window).width() > 640 ) {
				sidebarHeight = $( '.review-sidebar-container' ).height();
				var fullContentHeight = 0;
				$( '.review-post-content' ).each(function(){
					fullContentHeight += $(this).height();
				});
				if ( sidebarHeight > fullContentHeight ) {
					$( ".review-post-content:last" ).css( "margin-bottom", ( sidebarHeight - fullContentHeight ) );
				}
			} else {
				$( ".review-post-content:last" ).css( "margin-bottom" , 0);
			}
		});
	}

	/*
	Function for positioning post content, comments and sidebar.
	Works on singular templates.
	*/
	function singlecontentResize() {
		var sidebarHeight = $( '.review-sidebar-container' ).height();
		var postsHeight = $( '#review-single-post' ).height();
		var pagesHeight = $( '.review-narrow' ).height();
		var commentlistHeight = $( '.review-comment-list' ).height();
		var contentHeight = ( postsHeight + pagesHeight + commentlistHeight );

		/*
		Adding margin to he content if sidebar longer than content.
		Checks type of page and enabled/disabled comments
		*/
		if ( $(window).width() > 640 ) {
			if ( sidebarHeight > contentHeight ) {
				if ( $( '.review-comment-list' ).length > 0 ) {
					$( ".review-comment-list" ).css( "margin-bottom", (sidebarHeight - contentHeight) );
				} else {
					if ( $( 'body' ).hasClass( 'page-template-default')) {
						$( '.review-post-content:last' ).css( "margin-bottom", (sidebarHeight - contentHeight) );
					} else {
						$( '#review-single-post' ).css( "margin-bottom", (sidebarHeight - contentHeight) );
					}
				}
			}
		} else {
			$( ".review-comment-list" ).css( "margin-bottom", 0 );
		}

		/* Positioning of sidebar */
		if ( $(window).width() >= 1200 ) {
			$( '.review-sidebar-container' ).css( "right", ($(window).width()-1200)/2 );
		}

		$(window).resize(function() {
			if ( $(window).width() >= 1200 ) {
				$( '.review-sidebar-container' ).css( "right", ($(window).width()-1200)/2 );
			} else {
				$( '.review-sidebar-container' ).css( "right", 0 );
			}
		});
	}

	$( document).ready(function(){
		/*Check template type and choose content resize function*/
		if ( $( 'body' ).hasClass( 'home' ) || $( 'body' ).hasClass( 'blog' ) || $( 'body' ).hasClass( 'search' ) || $( 'body' ).hasClass( 'archive' ) || $( 'body' ).hasClass( 'error404' ) ) {
			$(window).load(function() {
				contentResize();
			});
		} else {
			$(window).load(function() {
				singlecontentResize();
				$(window).on( 'resize', singlecontentResize );
			});
		}
		if ( $( 'body' ).hasClass( 'tax-portfolio_technologies' ) ) {
			$(window).load(function() {
				singlecontentResize();
				$(window).on( 'resize', singlecontentResize );
			});
		}

		//change menu icon on click
		$( ".menu-toggle li a" ).click(function() {
			$(this).parent( "li" ).toggleClass('toggled');
		});

		/*dropdown always fit the screen*/
		$('li:has(ul)').addClass('right');
		$( '.prmenu_container > ul > li').hover(function(){
			if( $('.review-main-container').width() < $(this).offset().left + 400 ) {
				$(this).children('ul').css({'left':'auto','right':'0px',});
			}
		});
		$( '.prmenu_container > ul > li ul li').hover(function(){
			var position = $(this).offset();
			if( $('.review-main-container').width() < position.left + 400 ) {
				$(this).find('ul').css({'left':'auto','right':'200px', 'top':'20px',});
				$(this).find('ul li:has(ul)').addClass('left');
				$(this).find('ul').parent().removeClass('right');
				$(this).find('ul').parent().addClass('left');
			} else if( position.left - 200 < 0 ) {
				$(this).find('ul').css({'left':'200px','right':'auto', 'top':'20px',});
				$(this).find('ul li:has(ul)').addClass('right');
				$(this).find('ul').parent().removeClass('left');
				$(this).find('ul').parent().addClass('right');
			}
		});
	});
	/* Remove page preloader when page fully loaded */
	$(window).on('load', function () {
		var $preloader = $('#review-preloader'),
			$spinner   = $preloader.find('.spinner');
		$spinner.fadeOut();
		$preloader.delay(350).fadeOut('slow');
	});	
})(jQuery);
