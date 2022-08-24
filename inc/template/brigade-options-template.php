<?php
/**
 * Template output theme general options page
 *
 * And all the setting field's.
 *
 * @package Wpbrigade
 */

?>
<h1> Wpbrigade Theme Options </h1>

<?php settings_errors(); ?>

<form action="options.php" method="POST">
	<?php do_settings_sections( 'brigade-options' ); ?>
	<?php settings_fields( 'wpbrigade-options-group' ); ?>
	<?php submit_button(); ?>
</form>
