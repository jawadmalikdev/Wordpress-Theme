<?php
/**
 * To implement tabs creating custom post type
 * For storing tab data
 *
 * Also registering slide custom post type
 * Slide post type will also have custom meta box
 *
 * @package wpbrigade
 */

/**
 * Fuction for tabs custom post type
 */
function tabs_custom_type() {
	$labels = array(
		'name'          => 'Tabs',
		'singular_name' => 'Tab',
		'add_new_item'  => 'add tab content',
		'edit_item'     => 'Edit Tab',
		'view_item'     => 'View Tab',
		'not_found'     => 'no tabs content found',
	);
	$args   = array(
		'labels'              => $labels,
		'public'              => true,
		'exclude_from_search' => true,
		'show_in_menu'        => false,
	);

	register_post_type( 'tabs', $args );
}

add_action( 'init', 'tabs_custom_type' );


/**
 * Fuction to register slide custom post type
 */
function slides_custom_type() {
	$labels = array(
		'name'          => 'Slides',
		'singular_name' => 'Slide',
		'add_new_item'  => 'add Slide content',
		'edit_item'     => 'Edit Slide',
		'view_item'     => 'View Slide',
		'not_found'     => 'no Slides found',
	);
	$args   = array(
		'labels'              => $labels,
		'public'              => true,
		'supports'            => array(
			'title',
			'editor',
			'thumbnail',
		),
		'exclude_from_search' => true,
		'show_in_menu'        => false,
	);

	register_post_type( 'slides', $args );
}

add_action( 'init', 'slides_custom_type' );
