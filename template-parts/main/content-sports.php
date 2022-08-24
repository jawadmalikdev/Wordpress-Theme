<?php
/**
 * Template part to show sports custom post type
 *
 * @package wpbrigade
 */

$args = array(
	'post_type'      => 'sports',
	'posts_per_page' => -1,
	'order'          => 'ASC',
);

$sportsloop = new WP_Query( $args );
if ( $sportsloop->have_posts() ) {
	?>

	<!-- custom post type sports posts -->
	<div class="sports-container">
		<?php
		while ( $sportsloop->have_posts() ) :
			$sportsloop->the_post();
			?>
			<div class="sport sport1">
				<img class="sport-image" src='<?php the_post_thumbnail_url(); ?>'>
				<h2 class="sport-title"><?php the_title(); ?></h2>
			</div>

			<?php
		endwhile;
		?>

	</div>

	<?php
} else {
	echo '<div class="sports-not-found">';
	echo '<h1>Please enter sport posts for slider to work</h1>';
	echo '</div>';
}

wp_reset_postdata();
?>

<hr style="margin-top: 2rem; color: #ffffff54;">
