<?php 
/**
 * Adds Youtube_Subs widget.
 */
class Youtube_Subs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'YTSubscribeButton_widget', // Base ID
			esc_html__( 'YT Subscribe Button', 'YTSubscribeButton_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to Display YouTube Subscribers and Subscriber Count', 'YTSubscribeButton_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // Display anything before the widget starts

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Widget's Content Output
		$channel = $instance['channel'];
		$layout = $instance['layout'];
		$count = $instance['count'];
		?>
			<div class="g-ytsubscribe" 
				data-channel="<?=$channel?>" 
				data-layout="<?=$layout?>" 
				data-count="<?=$count?>">	
			</div>

		<?php
		
		echo $args['after_widget']; // Display anything when the widget closes
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Youtube Subs', 'YTSubscribeButton_domain' );
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'techguyweb', 'YTSubscribeButton_domain' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'YTSubscribeButton_domain' );
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'YTSubscribeButton_domain' );
		?>

		<!--Title-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">

			<?php esc_attr_e( 'Title:', 'YTSubscribeButton_domain' ); ?>
			
		</label>

		<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" 
			value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!--Channel-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">

			<?php esc_attr_e( 'Channel:', 'YTSubscribeButton_domain' ); ?>
			
		</label>

		<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" type="text" 
			value="<?php echo esc_attr( $channel ); ?>">
		</p>

		<!--Layout-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">

			<?php esc_attr_e( 'Layout:', 'YTSubscribeButton_domain' ); ?>
			
		</label>

		<select
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">

			<option value="default" <?= ($layout == 'default') ? 'selected' : ''?>>Default</option>
			<option value="full" <?= ($layout == 'full') ? 'selected' : ''?>>Full</option>

		</select>
		</p>

		<!--<CENTER></CENTER>ount-->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">

			<?php esc_attr_e( 'Subscriber Count:', 'YTSubscribeButton_domain' ); ?>
			
		</label>

		<select
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">

			<option value="default" <?= ($count == 'default') ? 'selected' : ''?>>Show</option>
			<option value="hidden" <?= ($count == 'hidden') ? 'selected' : ''?>>Hidden</option>

		</select>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';

		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';

		return $instance;
	}

} // class Youtube_Subs
?>