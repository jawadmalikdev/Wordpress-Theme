<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays front page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbrigade
 */

get_header();
?>

<!-- hero section -->
<?php

get_template_part( 'template-parts/main/content', 'slider' );

?>

<!-- main content starting -->

<div class="main-container main-cover">
	<div class="flex-area">
		<div class="main-content">
			<?php
			get_template_part( 'template-parts/main/content', 'sports' );
			get_template_part( 'template-parts/main/content', 'random' );
			get_template_part( 'template-parts/main/content', 'wpposts' );
			get_template_part( 'template-parts/main/content', 'social' );
			get_template_part( 'template-parts/main/content', 'tabs' );
			?>
		</div>

		<aside class="sidebar">
		<?php get_sidebar(); ?>
		</aside>

	</div>
</div>



<?php
get_footer();
?>
