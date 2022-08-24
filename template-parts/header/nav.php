<?php
/**
 * The header nav for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpbrigade
 */

/**
 * Function to get nav menu id
 *
 * @param string $location all the available locations.
 */
function get_menu_id( $location ) {
	$locations = get_nav_menu_locations();
	$menu_id   = $locations[ $location ];
	return ! empty( $menu_id ) ? $menu_id : '';
}
$header_menu_id = get_menu_id( 'wpbrigade-header-menu' );

$header_menus = wp_get_nav_menu_items( $header_menu_id );

/**
 * Getting child menu items.
 *
 * @param array      $menu_array all the menu.
 *
 * @param string/int $parent_id to check parent of child menu items.
 */
function get_child_menu_items( $menu_array, $parent_id ) {
	$child_menus = array();
	if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
		foreach ( $menu_array as $menu ) {
			if ( intval( $menu->menu_item_parent ) === $parent_id ) {
				array_push( $child_menus, $menu );
			}
		}
	}
	return $child_menus;
}

?>

<div class="secondarynav-container">
	<input type="checkbox" id="menu-bar">
	<label for="menu-bar">Menu <img src="<?php echo get_template_directory_uri(); ?>/assets/hamburger.png" alt="">
	</label>

	<div class="responsive-container">


		<?php
		if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
			?>
			<ul class="secondarynav-links-container">
				<?php
				foreach ( $header_menus as $menu_item ) {
					if ( ! $menu_item->menu_item_parent ) {

						$child_menu_items = get_child_menu_items( $header_menus, $menu_item->ID );
						$has_children     = ! empty( $child_menu_items ) && is_array( $child_menu_items );
						$link_target      = ! empty( $menu_item->target ) && '_blank' === $menu_item->target ? '_blank' : '_self';


						if ( ! $has_children ) {
							?>
							<li class="single-link-container">
								<a href="<?php echo esc_url( $menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_attr( $menu_item->title ); ?>">
									<?php echo esc_html( $menu_item->title ); ?>
								</a>
							</li>
							<?php
						} else {
							?>
							<li class="single-link-container">
								<a href="<?php echo esc_url( $menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_attr( $menu_item->title ); ?>">
									<?php echo esc_html( $menu_item->title ); ?>
								</a>
								<ul class="first-dropdown">
									<?php
									foreach ( $child_menu_items as $child_menu_item ) {
										$link_target = ! empty( $child_menu_item->target ) && '_blank' === $child_menu_item->target ? '_blank' : '_self';
										?>
										<li class="first-dropdown-li">
											<a href="<?php echo esc_url( $child_menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="first-dropdown-link">
												<?php echo esc_html( $child_menu_item->title ); ?> </a>
										</li>

										<?php
									}
									?>
								</ul>
							</li>
							<?php
						}
						?>
						<?php
					}
				}
				?>
			</ul>
			<?php
		}
		?>



		<?php get_search_form(); ?>

	</div>
</div>
