<?php
/**
 * Template part to show slides on hero section
 *
 * Making a new wpquery to get slides from
 * custom post type:slides
 *
 * @package wpbrigade
 */

$args      = array(
	'post_type'      => 'slides',
	'posts_per_page' => -1,
	'order'          => 'ASC',
);
$slideloop = new WP_Query( $args );


?>

	<div class="main-container slider-main-container">

		<div class="slider-inner-container">

			<div class="slick-slider-wrap">
				<?php
				if ( $slideloop->have_posts() ) :
					while ( $slideloop->have_posts() ) :
						$slideloop->the_post();
						?>
					<div class="slider-wrapper">

						<div class="slider-content">
							<h1 class="slider-title"><?php the_title(); ?></h1>
							<p class="slider-paragraph"><?php the_content(); ?></p>
						</div>



						<div class="slider-media">
							<img class="slider-image" srcset="<?php the_post_thumbnail( array( 350, 350 ) ); ?>

							<?php
							$the_post_id = get_the_ID();
							$link        = get_post_meta( $the_post_id, 'wpbrigade_youtube_video', true );

							if ( ! empty( $link ) ) {
								?>

								<div class="video-player" data-link="<?php echo $link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icon-play.png" alt="video player icon"></div>

							<?php } ?>

						</div>


					</div>
						<?php
				endwhile;
				else :
					echo '<h1>Please enter slides for slider to work</h1>';

					// ending main query if
				endif;
				?>



			</div>

		</div>

	</div>

<?php
wp_reset_postdata();
?>
