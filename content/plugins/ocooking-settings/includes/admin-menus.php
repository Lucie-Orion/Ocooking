<?php
/**
 * Adds admin screens
 *
 * @link https://codex.wordpress.org/Administration_Menus
 * @link https://codex.wordpress.org/Settings_API
 */

add_action( 'admin_menu', 'ocooking_admin_menus' );

/** Step 1. */
function ocooking_admin_menus() {
	/**
	 * Add an options submenu
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_options_page
	 */
	add_options_page(
		'oCooking Options',
		'oCooking',
		'manage_options',
		'ocooking-options.php',
		'ocooking_options'
	);
}

/** Step 3. */
function ocooking_options() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
	<div class="wrap">
		<p>Here is where the form would go if I actually had options.</p>

	</div>
	<?php
}
