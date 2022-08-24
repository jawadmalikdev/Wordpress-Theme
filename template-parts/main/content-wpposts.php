<?php
/**
 * Template part to show WordPress 3 post's
 *
 * @package wpbrigade
 */

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'order'          => 'DSC',
);

$postloop = new WP_Query( $args );
if ( $postloop->have_posts() ) :

	?>

	<div class="wp-posts-container">
		<?php
		while ( $postloop->have_posts() ) :
			$postloop->the_post();
			?>
			<div class="wp-post">
				<img class="wp-post-image" src="<?php the_post_thumbnail_url(); ?>" alt="">

				<h2 class="wp-post-title"><?php the_title(); ?></h2>
				<p class="wp-post-excerpt">
					<?php echo get_the_excerpt(); ?>
				</p>

				<a href="<?php the_permalink(); ?>">
					<h2 class="wp-post-readmore">
						Read More
					</h2>
				</a>


			</div>

		<?php endwhile; ?>

	</div>
	<?php
endif;
wp_reset_postdata();
?>
