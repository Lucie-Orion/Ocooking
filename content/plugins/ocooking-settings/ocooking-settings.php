<?php
/**
 * OCooking settings plugin.
 *
 * @package oCooking
 *
 * Plugin Name: oCooking Settings
 */

if ( ! defined( 'WPINC' ) ) {
	http_response_code( 404 );
	exit;
}

define( 'OCOOKING_PLUGIN_PATH', __FILE__ );
define( 'OCOOKING_PLUGIN_TEXT_DOMAIN', 'ocooking-settings' );

$plugin_dir_path = plugin_dir_path( OCOOKING_PLUGIN_PATH );

require $plugin_dir_path . 'includes/class-post-type-recipe.php';

require $plugin_dir_path . 'includes/load-textdomain.php';

$post_type_recipe = new Post_Type_Recipe();

register_activation_hook(
	OCOOKING_PLUGIN_PATH,
	function() use ( $post_type_recipe ) {
		$post_type_recipe->register_post_type();
		$post_type_recipe->register_taxonomies();

		flush_rewrite_rules( false );
	}
);

register_deactivation_hook(
	OCOOKING_PLUGIN_PATH,
	function() {
		unregister_post_type( Post_Type_Recipe::NAME );
		unregister_taxonomy( Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT );
		unregister_taxonomy( Post_Type_Recipe::TAXONOMY_NAME_TYPE );

		flush_rewrite_rules( false );
	}
);
