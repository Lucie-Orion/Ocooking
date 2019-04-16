<?php
/**
 * Theme setup
 *
 * @package oCooking
 */

add_action(
	'after_setup_theme',
	'ocooking_setup'
);

/**
 * Add configuration instructions
 */
function ocooking_setup() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
}

add_action(
	'after_setup_theme',
	'ocooking_load_textdomain'
);

/**
 * Loads translations file
 *
 * @link https://codex.wordpress.org/I18n_for_WordPress_Developers
 *
 * Outil d'extraction des textes à traduire
 * @link https://github.com/grappler/i18n
 */
function ocooking_load_textdomain() {
	/**
	 * Configures translations files directory.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain(
		OCOOKING_THEME_TEXT_DOMAIN,
		get_template_directory() . '/languages'
	);
}
