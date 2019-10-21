<?php
/**
 * Create cooker role
 *
 * @package oCooking
 */

class Role_Cooker {
	const NAME = 'cooker';

	/**
	 * Creates cooker role
	 */
	public function add_role() {
		/**
		 * Creates a new role
		 *
		 * @link https://codex.wordpress.org/Function_Reference/add_role
		 */
		add_role(
			self::NAME,
			__(
				'Cuisinier', OCOOKING_PLUGIN_TEXT_DOMAIN
			),
			[
				'read' => true,
			]
		);
	}

	/**
	 * Removes cooker role
	 */
	public function remove_role() {
		/**
		 * Removes exising role
		 *
		 * @link https://codex.wordpress.org/Function_Reference/remove_role
		 */
		remove_role( self::NAME );
	}
}
