<?php
/**
 * General Custom Post types
 * sports and events
 *
 * @package wpbrigade
 */

/**
 * Fuction for sports custom post type
 */
function sports_custom_type() {
	$labels = array(
		'name'          => 'Sports',
		'singular_name' => 'Sport',
		'add_new_item'  => 'Add new sport',
		'edit_item'     => 'Edit Sport',
		'view_item'     => 'View Sport',
		'not_found'     => 'no Sports found',
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
		'menu_icon'           => 'dashicons-games',
	);

	register_post_type( 'sports', $args );
}

add_action( 'init', 'sports_custom_type' );


/**
 * Register event post type
 */
function events_custom_type() {
	$labels = array(
		'name'          => 'Events',
		'singular_name' => 'Event',
		'add_new_item'  => 'Add new Event',
		'edit_item'     => 'Edit Event',
		'view_item'     => 'View Event',
		'not_found'     => 'no Events found',
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
		'menu_icon'           => 'dashicons-location',
	);

	register_post_type( 'events', $args );
}

add_action( 'init', 'events_custom_type' );
