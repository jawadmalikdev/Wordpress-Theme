<?php
/**
 *
 * General settings
 *
 * Our main theme options page name: general
 * Storing soical media fields and
 * Theme top bar and bottom bar
 *
 * @package wpbrigade
 */

add_action( 'admin_init', 'general_wpbrigade_settings' );

function general_wpbrigade_settings() {
	// register theme general options.
	register_setting( 'wpbrigade-options-group', 'twitter_handle' );
	register_setting( 'wpbrigade-options-group', 'facebook_handle' );
	register_setting( 'wpbrigade-options-group', 'top_bar' );
	register_setting( 'wpbrigade-options-group', 'bottom_bar' );

	add_settings_section( 'wpbrigade-social-options', 'Manage Social handles', 'wpbrigade_social_section', 'brigade-options' );

	add_settings_field( 'twitter-handle-field', 'Twitter Handle', 'twitter_handle_field_callback', 'brigade-options', 'wpbrigade-social-options' );

	add_settings_field( 'facebook-handle-field', 'Facebook Handle', 'facebook_handle_field_callback', 'brigade-options', 'wpbrigade-social-options' );

	// register theme topbar and bottom bar

	add_settings_section( 'wpbrigade-themeBar-options', 'Manage Theme bars', 'wpbrigade_themeBar_section', 'brigade-options' );

	add_settings_field( 'top-bar-field', 'Top Bar', 'top_bar_field_callback', 'brigade-options', 'wpbrigade-themeBar-options' );

	add_settings_field( 'bottom-bar-field', 'Bottom Bar', 'bottom_bar_field_callback', 'brigade-options', 'wpbrigade-themeBar-options' );

}

function wpbrigade_social_section() {
	echo 'Add social options of you theme here';
}

function twitter_handle_field_callback() {
	$twitter_handle = esc_attr( get_option( 'twitter_handle' ) );
	echo '<input type="text" name="twitter_handle" value="' . $twitter_handle . '" placeholder="Twitter Handle" />';
}
function facebook_handle_field_callback() {
	 $facebook_handle = esc_attr( get_option( 'facebook_handle' ) );
	echo '<input type="text" name="facebook_handle" value="' . $facebook_handle . '" placeholder="Facebook Handle" />';
}

// themebar settings callbacks.

function wpbrigade_themeBar_section() {
	echo 'Add top bar and bottom bar for your theme here';
}

function top_bar_field_callback() {
	 $top_bar = esc_attr( get_option( 'top_bar' ) );
	echo '<textarea  name="top_bar" rows="4" cols="50"> ' . $top_bar . ' </textarea>';
}
function bottom_bar_field_callback() {
	$bottom_bar = esc_attr( get_option( 'bottom_bar' ) );
	echo '<textarea  name="bottom_bar" rows="4" cols="50" > ' . $bottom_bar . ' </textarea>';
}
