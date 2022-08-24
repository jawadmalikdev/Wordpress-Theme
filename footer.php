<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wpbrigade
 */

?>

<!-- footer content -->

<div class="main-container footer-cover">

	<div class="footer-container">
		<?php

		$sidebars = wp_get_sidebars_widgets();

		if (
			isset( $sidebars['footer_widgets'] ) &&
			! empty( $sidebars['footer_widgets'] )
		) {
			dynamic_sidebar( 'footer_widgets' );
		} else {
			echo '<h1>Please enter footer content in footer sidebar</h1>';
		}


		?>
	</div>
</div>

<!-- footer bar -->
<div class="main-container footerbar">
	<div class="footer-bar">
		<p><?php echo esc_attr( get_option( 'bottom_bar' ) ); ?></p>
	</div>
</div>


<div class="video-overlay" id="video-overlay">
	<img id="video-overlay__close" class="video-overlay__close" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icon-close.png  ?>" alt="close">

	<iframe id="video_iframe" width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=1">
	</iframe>
</div>

<?php wp_footer(); ?>

</body>

</html>
