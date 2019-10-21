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

define( 'OCOOKING_PLUGIN_DIRECTORY', 'ocooking-settings' );
define( 'OCOOKING_PLUGIN_PATH', __FILE__ );
define( 'OCOOKING_PLUGIN_TEXT_DOMAIN', 'ocooking-settings' );

$plugin_dir_path = plugin_dir_path( OCOOKING_PLUGIN_PATH );

require $plugin_dir_path . 'includes/class-post-type-recipe.php';

require $plugin_dir_path . 'includes/rest-api.php';

require $plugin_dir_path . 'includes/class-role-cooker.php';

// require $plugin_dir_path . 'includes/admin-menus.php';

require $plugin_dir_path . 'includes/admin-menus-generator.php';

require $plugin_dir_path . 'includes/load-textdomain.php';

$post_type_recipe = new Post_Type_Recipe();

$role_cooker = new Role_Cooker();

register_activation_hook(
	OCOOKING_PLUGIN_PATH,
	function() use ( $post_type_recipe, $role_cooker ) {
		$post_type_recipe->register_post_type();
		$post_type_recipe->register_taxonomies();

		flush_rewrite_rules( false );

		$role_cooker->add_role();
		$post_type_recipe->add_roles_capabilities();
	}
);

register_deactivation_hook(
	OCOOKING_PLUGIN_PATH,
	function() use ( $post_type_recipe, $role_cooker ) {
		unregister_post_type( Post_Type_Recipe::NAME );
		unregister_taxonomy( Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT );
		unregister_taxonomy( Post_Type_Recipe::TAXONOMY_NAME_TYPE );

		flush_rewrite_rules( false );

		$role_cooker->remove_role();
		$post_type_recipe->remove_roles_capabilities();
	}
);
