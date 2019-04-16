<?php
/**
 * Styles and scripts configuration
 *
 * @package oCooking
 */

add_action(
	'wp_enqueue_scripts',
	'ocooking_enqueue_scripts'
);

/**
 * Add styles and scripts
 */
function ocooking_enqueue_scripts() {
	wp_enqueue_style(
		'ocooking-style',
		get_theme_file_uri( 'public/css/style.css' ),
		[],
		OCOOKING_THEME_VERSION
	);

	wp_enqueue_script(
		'ocooking-script',
		get_theme_file_uri( 'public/js/app.js' ),
		[],
		OCOOKING_THEME_VERSION,
		true
	);
}
