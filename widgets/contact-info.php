<?php
/**
 * Contact Info Widget
 *
 * Simple widget that allows users to add their contact information.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */
class Review_Contact_Info_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		/* widget actual processes */
		parent::__construct(
			/*id*/
			'review-contact-info-widget',
			/*name*/
			__( 'Contact Info', 'review-talk' ),
			/* Widget description */
			array(
				'description' => __( 'Widget for adding contact information', 'review-talk' ),  /*description displayed in admin*/
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
		$title         = apply_filters( 'widget_title', $instance['title'] );
		$rwci_phonenum = empty( $instance['rwci_phonenum'] ) ? '' : $instance['rwci_phonenum'];
		$rwci_email    = empty( $instance['rwci_email'] ) ? '' : $instance['rwci_email'];
		$rwci_address  = empty( $instance['rwci_address'] ) ? '' : $instance['rwci_address'];
		$rwci_faxnum   = empty( $instance['rwci_faxnum'] ) ? '' : $instance['rwci_faxnum'];
		/* before and after widget arguments are defined by themes */
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$out = array(
			'phone-number'  => $rwci_phonenum,
			'email-address' => $rwci_email,
			'address'       => $rwci_address,
			'fax-number'    => $rwci_faxnum,
		) ?>
		<ul>
			<?php foreach ( $out as $key => $value ) {
				if ( ! empty( $value ) ) { ?>
					<li class="review-contact-info-widget <?php echo $key ?>"><?php echo $value ?>
					<li>
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
		$instance      = wp_parse_args( (array) $instance, array(
				'title'         => '',
				'rwci_email'    => '',
				'rwci_phonenum' => '',
				'rwci_address'  => '',
				'rwci_faxnum'   => '',
			)
		);
		$title         = esc_attr( $instance['title'] );
		$rwci_phonenum = esc_attr( $instance['rwci_phonenum'] );
		$rwci_email    = esc_attr( $instance['rwci_email'] );
		$rwci_address  = esc_attr( $instance['rwci_address'] );
		$rwci_faxnum   = esc_attr( $instance['rwci_faxnum'] ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rwci_phonenum' ); ?>"><?php _e( 'Phone number:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwci_phonenum' ); ?>" name="<?php echo $this->get_field_name( 'rwci_phonenum' ); ?>" type="text" value="<?php echo $rwci_phonenum; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwci_email' ); ?>"><?php _e( 'Email address:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwci_email' ); ?>" name="<?php echo $this->get_field_name( 'rwci_email' ); ?>" type="text" value="<?php echo $rwci_email; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwci_address' ); ?>"><?php _e( 'Address:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwci_address' ); ?>" name="<?php echo $this->get_field_name( 'rwci_address' ); ?>" type="text" value="<?php echo $rwci_address; ?>" />
			<label for="<?php echo $this->get_field_id( 'rwci_faxnum' ); ?>"><?php _e( 'Fax number:', 'review-talk' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'rwci_faxnum' ); ?>" name="<?php echo $this->get_field_name( 'rwci_faxnum' ); ?>" type="text" value="<?php echo $rwci_faxnum; ?>" />
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
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['rwci_phonenum'] = strip_tags( $new_instance['rwci_phonenum'] );
		$instance['rwci_email']    = strip_tags( $new_instance['rwci_email'] );
		$instance['rwci_address']  = strip_tags( $new_instance['rwci_address'] );
		$instance['rwci_faxnum']   = strip_tags( $new_instance['rwci_faxnum'] );

		return $instance;
	}
}

/**
 * Register Widget
 */
function review_contact_info_widget_register() {
	register_widget( 'review_contact_info_widget' );
}

add_action( 'widgets_init', 'review_contact_info_widget_register' );
