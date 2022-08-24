<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpbrigade
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>

	<!-- adding facebook sdk -->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="eYop7nQJ"></script>

	<?php wp_body_open(); ?>

	<div class="main-container topbar">
		<div class="top-bar">
			<p> <?php echo esc_attr( get_option( 'top_bar' ) ); ?></p>
			<img class="close-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icon-close.png" alt="close icon">
		</div>
	</div>

	<!-- util nav bar -->


	<div class="main-container utilnavbar">
		<div class="utilnav-container">

			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo           = wp_get_attachment_image_src( $custom_logo_id );
			}
			?>
			<a href="<?php echo esc_url( site_url() ); ?>"><img src="<?php echo esc_url( $logo[0] ); ?>" alt="logo"></a>



			<div class="utilnav-links-container">
				<a href="#" class="utilnav-link utilnav-link-1">MEMBERSHIP</a>
				<a href="#" class="utilnav-link utilnav-link-2">ACCOUNT</a>
			</div>


		</div>
	</div>


	<!-- secondary nav bar -->

	<div class="main-container secondarynavbar">

		<?php get_template_part( 'template-parts/header/nav' ); ?>



	</div>
