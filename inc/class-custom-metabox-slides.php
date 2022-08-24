<?php
/**
 * File to add class for meta box
 *
 * @package Wpbrigade
 */

/**
 * Class to add custom meta box
 */
class Custom_Metabox_Slides {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'create_meta_box' ) );
		add_action( 'save_post', array( $this, 'wpbrigade_save_postdata' ) );
	}
	public function create_meta_box() {
		add_meta_box( 'slide_video', 'Slide Video', array( $this, 'meta_box_callback' ), array( 'slides' ), );
	}

	public function meta_box_callback( $post ) {
		$value = get_post_meta( $post->ID, 'wpbrigade_youtube_video', true );
		?>
		<label for="youtube_video">Note: Enter youtube video ID not link: &nbsp&nbsp</label>
		<input id="youtube_video" type="text" size="30" name="youtube_video" value="<?php echo $value; ?>">

		<?php

	}
	public function wpbrigade_save_postdata( $post_id ) {
		if ( array_key_exists( 'youtube_video', $_POST ) ) {
			update_post_meta(
				$post_id,
				'wpbrigade_youtube_video',
				$_POST['youtube_video']
			);
		}
	}
}

new Custom_Metabox_Slides();
