<?php
/**
 * File for date widget
 *
 * @package Wpbrigade
 */

/**
 * Class to date widget for theme
 */
class Date_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'date_widget',
			// Widget name will appear in UI
			'date & time',
			// Widget description
			array( 'description' => 'date and time widget' ),
		);
	}

	// Creating widget front-end.
	// This is where the action happens.
	public function widget( $args, $instance ) {
		$title    = $instance['title'];
		$timezone = $instance['timezone'];
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// code for front display
		date_default_timezone_set( "$timezone" );

		?>
		<div class="datetime-content">
			<h1 class="date">
				<?php echo date( 'D \, M j \, Y ' ); ?>
			</h1>
			<p class="time">
				<?php echo date( 'G:i:s a' ); ?>
			</p>
		</div>

		<?php

		echo $args['after_widget'];
	}

	// Widget Backend.
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = 'wpbrigade date';
		}
		if ( isset( $instance['timezone'] ) ) {
			$timezone = $instance['timezone'];
		} else {
			$timezone = 'Asia/Karachi';
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'timezone' ); ?>"><?php _e( 'timezone:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'timezone' ); ?>" name="<?php echo $this->get_field_name( 'timezone' ); ?>" type="text" value="<?php echo esc_attr( $timezone ); ?>" />
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['timezone'] = ( ! empty( $new_instance['timezone'] ) ) ? strip_tags( $new_instance['timezone'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

/**
 * Register and load the widget.
 */
function date_load_widget() {
	register_widget( 'Date_Widget' );
}
add_action( 'widgets_init', 'date_load_widget' );
