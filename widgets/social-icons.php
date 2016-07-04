<?php
/**
 * Social Icons Widget
 *
 * Simple social media widget which allow user to add icons. Widget provides ability to add links to
 * your profiles in most popular social networks.
 * Widget uses FontAwesome Icons.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */
class Review_Social_Icons_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		/* widget actual processes*/
		parent::__construct(
			/*id*/
			'review-social-icons-widget',
			/*name*/
			__( 'Social Icons', 'review-talk' ),
			/* Widget description */
			array(
				'description' => __( 'Widget for adding social media icons', 'review-talk' ),  /* description displayed in admin */
			)
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title               = apply_filters( 'widget_title', $instance['title'] );
		$rwsi_behance        = empty( $instance['rwsi_behance'] ) ? '' : $instance['rwsi_behance'];
		$rwsi_bitbucket      = empty( $instance['rwsi_bitbucket'] ) ? '' : $instance['rwsi_bitbucket'];
		$rwsi_btc            = empty( $instance['rwsi_btc'] ) ? '' : $instance['rwsi_btc'];
		$rwsi_codepen        = empty( $instance['rwsi_codepen'] ) ? '' : $instance['rwsi_codepen'];
		$rwsi_delicious      = empty( $instance['rwsi_delicious'] ) ? '' : $instance['rwsi_delicious'];
		$rwsi_deviantart     = empty( $instance['rwsi_deviantart'] ) ? '' : $instance['rwsi_deviantart'];
		$rwsi_digg           = empty( $instance['rwsi_digg'] ) ? '' : $instance['rwsi_digg'];
		$rwsi_dribbble       = empty( $instance['rwsi_dribbble'] ) ? '' : $instance['rwsi_dribbble'];
		$rwsi_dropbox        = empty( $instance['rwsi_dropbox'] ) ? '' : $instance['rwsi_dropbox'];
		$rwsi_facebook       = empty( $instance['rwsi_facebook'] ) ? '' : $instance['rwsi_facebook'];
		$rwsi_flickr         = empty( $instance['rwsi_flickr'] ) ? '' : $instance['rwsi_flickr'];
		$rwsi_foursquare     = empty( $instance['rwsi_foursquare'] ) ? '' : $instance['rwsi_foursquare'];
		$rwsi_github         = empty( $instance['rwsi_github'] ) ? '' : $instance['rwsi_github'];
		$rwsi_google_plus    = empty( $instance['rwsi_google_plus'] ) ? '' : $instance['rwsi_google_plus'];
		$rwsi_instagram      = empty( $instance['rwsi_instagram'] ) ? '' : $instance['rwsi_instagram'];
		$rwsi_lastfm         = empty( $instance['rwsi_lastfm'] ) ? '' : $instance['rwsi_lastfm'];
		$rwsi_linkedin       = empty( $instance['rwsi_linkedin'] ) ? '' : $instance['rwsi_linkedin'];
		$rwsi_odnoklassniki  = empty( $instance['rwsi_odnoklassniki'] ) ? '' : $instance['rwsi_odnoklassniki'];
		$rwsi_pinterest      = empty( $instance['rwsi_pinterest'] ) ? '' : $instance['rwsi_pinterest'];
		$rwsi_reddit         = empty( $instance['rwsi_reddit'] ) ? '' : $instance['rwsi_reddit'];
		$rwsi_rss            = empty( $instance['rwsi_rss'] ) ? '' : $instance['rwsi_rss'];
		$rwsi_skype          = empty( $instance['rwsi_skype'] ) ? '' : $instance['rwsi_skype'];
		$rwsi_slack          = empty( $instance['rwsi_slack'] ) ? '' : $instance['rwsi_slack'];
		$rwsi_slideshare     = empty( $instance['rwsi_slideshare'] ) ? '' : $instance['rwsi_slideshare'];
		$rwsi_soundcloud     = empty( $instance['rwsi_soundcloud'] ) ? '' : $instance['rwsi_soundcloud'];
		$rwsi_spotify        = empty( $instance['rwsi_spotify'] ) ? '' : $instance['rwsi_spotify'];
		$rwsi_stack_exchange = empty( $instance['rwsi_stack_exchange'] ) ? '' : $instance['rwsi_stack_exchange'];
		$rwsi_stack_overflow = empty( $instance['rwsi_stack_overflow'] ) ? '' : $instance['rwsi_stack_overflow'];
		$rwsi_steam          = empty( $instance['rwsi_steam'] ) ? '' : $instance['rwsi_steam'];
		$rwsi_stumbleupon    = empty( $instance['rwsi_stumbleupon'] ) ? '' : $instance['rwsi_stumbleupon'];
		$rwsi_tumblr         = empty( $instance['rwsi_tumblr'] ) ? '' : $instance['rwsi_tumblr'];
		$rwsi_twitch         = empty( $instance['rwsi_twitch'] ) ? '' : $instance['rwsi_twitch'];
		$rwsi_twitter        = empty( $instance['rwsi_twitter'] ) ? '' : $instance['rwsi_twitter'];
		$rwsi_vimeo          = empty( $instance['rwsi_vimeo'] ) ? '' : $instance['rwsi_vimeo'];
		$rwsi_vk             = empty( $instance['rwsi_vk'] ) ? '' : $instance['rwsi_vk'];
		$rwsi_wordpress      = empty( $instance['rwsi_wordpress'] ) ? '' : $instance['rwsi_wordpress'];
		$rwsi_yelp           = empty( $instance['rwsi_yelp'] ) ? '' : $instance['rwsi_yelp'];
		$rwsi_youtube        = empty( $instance['rwsi_youtube'] ) ? '' : $instance['rwsi_youtube'];
		$rwsi_500px          = empty( $instance['rwsi_500px'] ) ? '' : $instance['rwsi_500px'];
		/* before and after widget arguments are defined by themes */
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$out = array(
			'fa-behance'        => $rwsi_behance,
			'fa-bitbucket'      => $rwsi_bitbucket,
			'fa-btc'            => $rwsi_btc,
			'fa-codepen'        => $rwsi_codepen,
			'fa-delicious'      => $rwsi_delicious,
			'fa-deviantart'     => $rwsi_deviantart,
			'fa-digg'           => $rwsi_digg,
			'fa-dribbble'       => $rwsi_dribbble,
			'fa-dropbox'        => $rwsi_dropbox,
			'fa-facebook'       => $rwsi_facebook,
			'fa-flickr'         => $rwsi_flickr,
			'fa-foursquare'     => $rwsi_foursquare,
			'fa-github'         => $rwsi_github,
			'fa-google-plus'    => $rwsi_google_plus,
			'fa-instagram'      => $rwsi_instagram,
			'fa-lastfm'         => $rwsi_lastfm,
			'fa-linkedin'       => $rwsi_linkedin,
			'fa-odnoklassniki'  => $rwsi_odnoklassniki,
			'fa-pinterest'      => $rwsi_pinterest,
			'fa-reddit'         => $rwsi_reddit,
			'fa-rss'            => $rwsi_rss,
			'fa-skype'          => $rwsi_skype,
			'fa-slack'          => $rwsi_slack,
			'fa-slideshare'     => $rwsi_slideshare,
			'fa-soundcloud'     => $rwsi_soundcloud,
			'fa-spotify'        => $rwsi_spotify,
			'fa-stack-exchange' => $rwsi_stack_exchange,
			'fa-stack-overflow' => $rwsi_stack_overflow,
			'fa-steam'          => $rwsi_steam,
			'fa-stumbleupon'    => $rwsi_stumbleupon,
			'fa-tumblr'         => $rwsi_tumblr,
			'fa-twitch'         => $rwsi_twitch,
			'fa-twitter'        => $rwsi_twitter,
			'fa-vimeo-square'   => $rwsi_vimeo,
			'fa-vk'             => $rwsi_vk,
			'fa-wordpress'      => $rwsi_wordpress,
			'fa-yelp'           => $rwsi_yelp,
			'fa-youtube'        => $rwsi_youtube,
			'fa-500px'          => $rwsi_500px,
		)
		/*widget front-end output. Displays items with not empty value.*/ ?>
		<ul>
			<?php foreach ( $out as $key => $value ) {
				if ( ! empty( $value ) ) { ?>
					<li class="review-social-icon-widget">
						<a href="<?php echo esc_url( $value ); ?>" target="_blank">
							<p class="<?php echo $key ?>"></p>
						</a>
					</li>
				<?php }
			} ?>
		</ul>
		<?php echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		/* outputs the options form on admin */
		$instance            = wp_parse_args( (array) $instance, array(
				'title'               => '',
				'rwsi_behance'        => '',
				'rwsi_bitbucket'      => '',
				'rwsi_btc'            => '',
				'rwsi_codepen'        => '',
				'rwsi_delicious'      => '',
				'rwsi_deviantart'     => '',
				'rwsi_digg'           => '',
				'rwsi_dribbble'       => '',
				'rwsi_dropbox'        => '',
				'rwsi_facebook'       => '',
				'rwsi_flickr'         => '',
				'rwsi_foursquare'     => '',
				'rwsi_github'         => '',
				'rwsi_google_plus'    => '',
				'rwsi_instagram'      => '',
				'rwsi_lastfm'         => '',
				'rwsi_linkedin'       => '',
				'rwsi_odnoklassniki'  => '',
				'rwsi_pinterest'      => '',
				'rwsi_reddit'         => '',
				'rwsi_rss'            => '',
				'rwsi_skype'          => '',
				'rwsi_slack'          => '',
				'rwsi_slideshare'     => '',
				'rwsi_soundcloud'     => '',
				'rwsi_spotify'        => '',
				'rwsi_stack_exchange' => '',
				'rwsi_stack_overflow' => '',
				'rwsi_steam'          => '',
				'rwsi_stumbleupon'    => '',
				'rwsi_tumblr'         => '',
				'rwsi_twitch'         => '',
				'rwsi_twitter'        => '',
				'rwsi_vimeo'          => '',
				'rwsi_vk'             => '',
				'rwsi_wordpress'      => '',
				'rwsi_yelp'           => '',
				'rwsi_youtube'        => '',
				'rwsi_500px'          => '',
			)
		);
		$title               = esc_attr( $instance['title'] );
		$rwsi_behance        = esc_attr( $instance['rwsi_behance'] );
		$rwsi_bitbucket      = esc_attr( $instance['rwsi_bitbucket'] );
		$rwsi_btc            = esc_attr( $instance['rwsi_btc'] );
		$rwsi_codepen        = esc_attr( $instance['rwsi_codepen'] );
		$rwsi_delicious      = esc_attr( $instance['rwsi_delicious'] );
		$rwsi_deviantart     = esc_attr( $instance['rwsi_deviantart'] );
		$rwsi_digg           = esc_attr( $instance['rwsi_digg'] );
		$rwsi_dribbble       = esc_attr( $instance['rwsi_dribbble'] );
		$rwsi_dropbox        = esc_attr( $instance['rwsi_dropbox'] );
		$rwsi_facebook       = esc_attr( $instance['rwsi_facebook'] );
		$rwsi_flickr         = esc_attr( $instance['rwsi_flickr'] );
		$rwsi_foursquare     = esc_attr( $instance['rwsi_foursquare'] );
		$rwsi_github         = esc_attr( $instance['rwsi_github'] );
		$rwsi_google_plus    = esc_attr( $instance['rwsi_google_plus'] );
		$rwsi_instagram      = esc_attr( $instance['rwsi_instagram'] );
		$rwsi_lastfm         = esc_attr( $instance['rwsi_lastfm'] );
		$rwsi_linkedin       = esc_attr( $instance['rwsi_linkedin'] );
		$rwsi_odnoklassniki  = esc_attr( $instance['rwsi_odnoklassniki'] );
		$rwsi_pinterest      = esc_attr( $instance['rwsi_pinterest'] );
		$rwsi_reddit         = esc_attr( $instance['rwsi_reddit'] );
		$rwsi_rss            = esc_attr( $instance['rwsi_rss'] );
		$rwsi_skype          = esc_attr( $instance['rwsi_skype'] );
		$rwsi_slack          = esc_attr( $instance['rwsi_slack'] );
		$rwsi_slideshare     = esc_attr( $instance['rwsi_slideshare'] );
		$rwsi_soundcloud     = esc_attr( $instance['rwsi_soundcloud'] );
		$rwsi_spotify        = esc_attr( $instance['rwsi_spotify'] );
		$rwsi_stack_exchange = esc_attr( $instance['rwsi_stack_exchange'] );
		$rwsi_stack_overflow = esc_attr( $instance['rwsi_stack_overflow'] );
		$rwsi_steam          = esc_attr( $instance['rwsi_steam'] );
		$rwsi_stumbleupon    = esc_attr( $instance['rwsi_stumbleupon'] );
		$rwsi_tumblr         = esc_attr( $instance['rwsi_tumblr'] );
		$rwsi_twitch         = esc_attr( $instance['rwsi_twitch'] );
		$rwsi_twitter        = esc_attr( $instance['rwsi_twitter'] );
		$rwsi_vimeo          = esc_attr( $instance['rwsi_vimeo'] );
		$rwsi_vk             = esc_attr( $instance['rwsi_vk'] );
		$rwsi_wordpress      = esc_attr( $instance['rwsi_wordpress'] );
		$rwsi_yelp           = esc_attr( $instance['rwsi_yelp'] );
		$rwsi_youtube        = esc_attr( $instance['rwsi_youtube'] );
		$rwsi_500px          = esc_attr( $instance['rwsi_500px'] ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p><em><?php echo __( 'Enter URL of social services you want to display.', 'review-talk' ) ?></em></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rwsi_behance' ); ?>"><?php echo 'Behance' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_behance' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_behance' ); ?>" type="text" value="<?php echo $rwsi_behance; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_bitbucket' ); ?>"><?php echo 'Bitbucket' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_bitbucket' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_bitbucket' ); ?>" type="text" value="<?php echo $rwsi_bitbucket; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_btc' ); ?>"><?php echo 'BTC' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_btc' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_btc' ); ?>" type="text" value="<?php echo $rwsi_btc; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_codepen' ); ?>"><?php echo 'Codepen' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_codepen' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_codepen' ); ?>" type="text" value="<?php echo $rwsi_codepen; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_delicious' ); ?>"><?php echo 'Delicious' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_delicious' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_delicious' ); ?>" type="text" value="<?php echo $rwsi_delicious; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_deviantart' ); ?>"><?php echo 'Devianart' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_deviantart' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_deviantart' ); ?>" type="text" value="<?php echo $rwsi_deviantart; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_digg' ); ?>"><?php echo 'Digg' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_digg' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_digg' ); ?>" type="text" value="<?php echo $rwsi_digg; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_dribbble' ); ?>"><?php echo 'Dribbble' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_dribbble' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_dribbble' ); ?>" type="text" value="<?php echo $rwsi_dribbble; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_dropbox' ); ?>"><?php echo 'Dropbox' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_dropbox' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_dropbox' ); ?>" type="text" value="<?php echo $rwsi_dropbox; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_facebook' ); ?>"><?php echo 'Facebook' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_facebook' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_facebook' ); ?>" type="text" value="<?php echo $rwsi_facebook; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_flickr' ); ?>"><?php echo 'Flickr' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_flickr' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_flickr' ); ?>" type="text" value="<?php echo $rwsi_flickr; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_foursquare' ); ?>"><?php echo 'Foursquare' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_foursquare' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_foursquare' ); ?>" type="text" value="<?php echo $rwsi_foursquare; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_github' ); ?>"><?php echo 'Github' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_github' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_github' ); ?>" type="text" value="<?php echo $rwsi_github; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_google_plus' ); ?>"><?php echo 'Google+' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_google_plus' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_google_plus' ); ?>" type="text" value="<?php echo $rwsi_google_plus; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_instagram' ); ?>"><?php echo 'Instagram' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_instagram' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_instagram' ); ?>" type="text" value="<?php echo $rwsi_instagram; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_lastfm' ); ?>"><?php echo 'Last.fm' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_lastfm' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_lastfm' ); ?>" type="text" value="<?php echo $rwsi_lastfm; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_linkedin' ); ?>"><?php echo 'LinkedIn' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_linkedin' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_linkedin' ); ?>" type="text" value="<?php echo $rwsi_linkedin; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_odnoklassniki' ); ?>"><?php _e( 'Odnoklassniki', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_odnoklassniki' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_odnoklassniki' ); ?>" type="text" value="<?php echo $rwsi_odnoklassniki; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_pinterest' ); ?>"><?php echo 'Pinterest' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_pinterest' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_pinterest' ); ?>" type="text" value="<?php echo $rwsi_pinterest; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_reddit' ); ?>"><?php echo 'Reddit' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_reddit' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_reddit' ); ?>" type="text" value="<?php echo $rwsi_reddit; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_rss' ); ?>"><?php echo 'RSS' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_rss' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_rss' ); ?>" type="text" value="<?php echo $rwsi_rss; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_skype' ); ?>"><?php echo 'Skype' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_skype' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_skype' ); ?>" type="text" value="<?php echo $rwsi_skype; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_slack' ); ?>"><?php echo 'Slack' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_slack' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_slack' ); ?>" type="text" value="<?php echo $rwsi_slack; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_slideshare' ); ?>"><?php echo 'Slideshare' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_slideshare' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_slideshare' ); ?>" type="text" value="<?php echo $rwsi_slideshare; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_soundcloud' ); ?>"><?php echo 'Soundcloud' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_soundcloud' ); ?>" type="text" value="<?php echo $rwsi_soundcloud; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_spotify' ); ?>"><?php echo 'Spotify' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_spotify' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_spotify' ); ?>" type="text" value="<?php echo $rwsi_spotify; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_stack_exchange' ); ?>"><?php echo 'Stack Exchange' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_stack_exchange' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_stack_exchange' ); ?>" type="text" value="<?php echo $rwsi_stack_exchange; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_stack_overflow' ); ?>"><?php echo 'Stack Overflow' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_stack_overflow' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_stack_overflow' ); ?>" type="text" value="<?php echo $rwsi_stack_overflow; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_steam' ); ?>"><?php echo 'Steam' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_steam' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_steam' ); ?>" type="text" value="<?php echo $rwsi_steam; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_stumbleupon' ); ?>"><?php echo 'Stumbleupon' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_stumbleupon' ); ?>" type="text" value="<?php echo $rwsi_stumbleupon; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_tumblr' ); ?>"><?php echo 'Tumblr' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_tumblr' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_tumblr' ); ?>" type="text" value="<?php echo $rwsi_tumblr; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_twitch' ); ?>"><?php echo 'Twitch' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_twitch' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_twitch' ); ?>" type="text" value="<?php echo $rwsi_twitch; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_twitter' ); ?>"><?php echo 'Twitter' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_twitter' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_twitter' ); ?>" type="text" value="<?php echo $rwsi_twitter; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_vimeo' ); ?>"><?php echo 'Vimeo' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_vimeo' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_vimeo' ); ?>" type="text" value="<?php echo $rwsi_vimeo; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_vk' ); ?>"><?php _e( 'Vkontakte', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_vk' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_vk' ); ?>" type="text" value="<?php echo $rwsi_vk; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_wordpress' ); ?>"><?php echo 'WordPress' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_wordpress' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_wordpress' ); ?>" type="text" value="<?php echo $rwsi_wordpress; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_yelp' ); ?>"><?php echo 'Yelp' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_yelp' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_yelp' ); ?>" type="text" value="<?php echo $rwsi_yelp; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_youtube' ); ?>"><?php echo 'Youtube' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_youtube' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_youtube' ); ?>" type="text" value="<?php echo $rwsi_youtube; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwsi_500px' ); ?>"><?php echo '500px' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwsi_500px' ); ?>" name="<?php echo $this->get_field_name( 'rwsi_500px' ); ?>" type="text" value="<?php echo $rwsi_500px; ?>" />
		</p>
	<?php }

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		/* processes widget options to be saved */
		$instance = $old_instance;
		/* Fields */
		$instance['title']               = strip_tags( $new_instance['title'] );
		$instance['rwsi_behance']        = strip_tags( $new_instance['rwsi_behance'] );
		$instance['rwsi_bitbucket']      = strip_tags( $new_instance['rwsi_bitbucket'] );
		$instance['rwsi_btc']            = strip_tags( $new_instance['rwsi_btc'] );
		$instance['rwsi_codepen']        = strip_tags( $new_instance['rwsi_codepen'] );
		$instance['rwsi_delicious']      = strip_tags( $new_instance['rwsi_delicious'] );
		$instance['rwsi_deviantart']     = strip_tags( $new_instance['rwsi_deviantart'] );
		$instance['rwsi_digg']           = strip_tags( $new_instance['rwsi_digg'] );
		$instance['rwsi_dribbble']       = strip_tags( $new_instance['rwsi_dribbble'] );
		$instance['rwsi_dropbox']        = strip_tags( $new_instance['rwsi_dropbox'] );
		$instance['rwsi_facebook']       = strip_tags( $new_instance['rwsi_facebook'] );
		$instance['rwsi_flickr']         = strip_tags( $new_instance['rwsi_flickr'] );
		$instance['rwsi_foursquare']     = strip_tags( $new_instance['rwsi_foursquare'] );
		$instance['rwsi_github']         = strip_tags( $new_instance['rwsi_github'] );
		$instance['rwsi_google_plus']    = strip_tags( $new_instance['rwsi_google_plus'] );
		$instance['rwsi_instagram']      = strip_tags( $new_instance['rwsi_instagram'] );
		$instance['rwsi_lastfm']         = strip_tags( $new_instance['rwsi_lastfm'] );
		$instance['rwsi_linkedin']       = strip_tags( $new_instance['rwsi_linkedin'] );
		$instance['rwsi_odnoklassniki']  = strip_tags( $new_instance['rwsi_odnoklassniki'] );
		$instance['rwsi_pinterest']      = strip_tags( $new_instance['rwsi_pinterest'] );
		$instance['rwsi_reddit']         = strip_tags( $new_instance['rwsi_reddit'] );
		$instance['rwsi_rss']            = strip_tags( $new_instance['rwsi_rss'] );
		$instance['rwsi_skype']          = strip_tags( $new_instance['rwsi_skype'] );
		$instance['rwsi_slack']          = strip_tags( $new_instance['rwsi_slack'] );
		$instance['rwsi_slideshare']     = strip_tags( $new_instance['rwsi_slideshare'] );
		$instance['rwsi_soundcloud']     = strip_tags( $new_instance['rwsi_soundcloud'] );
		$instance['rwsi_spotify']        = strip_tags( $new_instance['rwsi_spotify'] );
		$instance['rwsi_stack_exchange'] = strip_tags( $new_instance['rwsi_stack_exchange'] );
		$instance['rwsi_stack_overflow'] = strip_tags( $new_instance['rwsi_stack_overflow'] );
		$instance['rwsi_steam']          = strip_tags( $new_instance['rwsi_steam'] );
		$instance['rwsi_stumbleupon']    = strip_tags( $new_instance['rwsi_stumbleupon'] );
		$instance['rwsi_tumblr']         = strip_tags( $new_instance['rwsi_tumblr'] );
		$instance['rwsi_twitch']         = strip_tags( $new_instance['rwsi_twitch'] );
		$instance['rwsi_twitter']        = strip_tags( $new_instance['rwsi_twitter'] );
		$instance['rwsi_vimeo']          = strip_tags( $new_instance['rwsi_vimeo'] );
		$instance['rwsi_vk']             = strip_tags( $new_instance['rwsi_vk'] );
		$instance['rwsi_wordpress']      = strip_tags( $new_instance['rwsi_wordpress'] );
		$instance['rwsi_yelp']           = strip_tags( $new_instance['rwsi_yelp'] );
		$instance['rwsi_youtube']        = strip_tags( $new_instance['rwsi_youtube'] );
		$instance['rwsi_500px']          = strip_tags( $new_instance['rwsi_500px'] );

		return $instance;
	}
}

/**
 * Register Widget
 */
function review_social_icons_widget_register() {
	register_widget( 'review_social_icons_widget' );
}

add_action( 'widgets_init', 'review_social_icons_widget_register' );
