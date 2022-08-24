<?php
/**
 * ADMIN PAGE
 *
 * @package wpbrigade
 */

/**
 * ADMIN PAGE function
 */
function brigade_add_admin_page() {
	$menu_slug = 'brigade-options';

	add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', $menu_slug, 'wpbrigade_options_page_callback', 'dashicons-admin-customizer' );

	// first submenu page

	add_submenu_page( $menu_slug, 'Theme Options', 'General', 'manage_options', $menu_slug, 'wpbrigade_options_page_callback' );

	add_submenu_page(
		'brigade-options',
		'Tabs',            // page title
		'Tabs',       // menu title
		'edit_posts',         // capability
		'edit.php?post_type=tabs',       // menu slug
	);

	add_submenu_page(
		'brigade-options',
		'Slides',            // page title
		'Slides',       // menu title
		'edit_posts',         // capability
		'edit.php?post_type=slides',       // menu slug
	);

}

add_action( 'admin_menu', 'brigade_add_admin_page' );

function wpbrigade_options_page_callback() {
	require_once get_template_directory() . '/inc/template/brigade-options-template.php';
}


