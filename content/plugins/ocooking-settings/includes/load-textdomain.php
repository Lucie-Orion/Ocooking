<?php
/**
 * Load translate files
 *
 * @package oCooking
 */

add_action( 'plugins_loaded', 'ocooking_settings_load_textdomain' );

/**
 * Loads translate files
 */
function ocooking_settings_load_textdomain() {
	/**
	 * Defines translate files directory
	 *
	 * @link
	 */
	load_plugin_textdomain(
		OCOOKING_PLUGIN_TEXT_DOMAIN,
		false,
		OCOOKING_PLUGIN_DIRECTORY . '/languages'
	);
}
