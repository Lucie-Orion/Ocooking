<?php
/**
 * Menus configuration
 *
 * @package oCooking
 */

add_action(
	'after_setup_theme',
	'ocooking_register_nav_menus'
);

/**
 * Registers nav menus
 */
function ocooking_register_nav_menus() {
	register_nav_menus(
		[
			'main-menu'   => 'Menu dans l\'overlay',
			'header-menu' => 'Menu de l\'en-tête',
			'social-menu' => 'Menu des réseaux sociaux',
		]
	);
}

add_filter(
	'nav_menu_css_class',
	'ocooking_list_item_class'
);

/**
 * Adds class to menu's li tags
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_css_class
 *
 * @param array $classes List of classes.
 *
 * @return array
 */
function ocooking_list_item_class( $classes ) {
	$classes[] = 'menu__list__list-item';

	return $classes;
}

add_filter(
	'nav_menu_link_attributes',
	'ocooking_menu_link_attributes'
);

/**
 * Adds attributes to menu's a tags
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/nav_menu_link_attributes
 *
 * @param array $attributes List of a tag's attributes.
 *
 * @return array
 */
function ocooking_menu_link_attributes( $attributes ) {
	if ( ! isset( $attributes['class'] ) ) {
		$attributes['class'] = '';
	}

	$attributes['class'] .= ' menu__list__list-item__link';

	$attributes['class'] = trim( $attributes['class'] );

	return $attributes;
}
