<?php
/**
 * Template part for displaying random post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbrigade
 */

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 1,
	'orderby'        => 'rand',
);

$randomloop = new WP_Query( $args );
if ( $randomloop->have_posts() ) :
	while ( $randomloop->have_posts() ) :
		$randomloop->the_post();

		?>
		<!-- random post -->

		<div class="random-post-container">
			<div class="random-post-content">
				<h1 class="random-post-title">
					<?php the_title(); ?>
				</h1>
				<p class="random-post-excerpt">
					<?php echo get_the_excerpt(); ?>
				</p>

			</div>
			<div class="random-post-image">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>

		<?php
	endwhile;
endif;
wp_reset_postdata();
?>
