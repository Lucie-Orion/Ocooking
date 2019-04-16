<?php
/**
 * Custom Post Type Recipe class
 *
 * @package oCooking
 */
class Post_Type_Recipe {
	const NAME = 'recipe';

	const TAXONOMY_NAME_INGREDIENT = 'recipe_ingredient';
	const TAXONOMY_NAME_TYPE       = 'recipe_type';

	/**
	 * Class construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );

		add_action( 'init', [ $this, 'register_taxonomies' ] );
	}

	/**
	 * Register post type method
	 *
	 * @return void
	 */
	public function register_post_type() {
		register_post_type(
			self::NAME,
			[
				'labels' => [ // Les textes d'affichage dans le backoffice.
					'name'               => __( 'Recettes', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'singular_name'      => __( 'Recette', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'add_new_item'       => __( 'Ajouter une nouvelle recette', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'edit_item'          => __( 'Editer la recette', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'new_item'           => __( 'Nouvelle recette', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'view_item'          => __( 'Voir la recette', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'view_items'         => __( 'Voir les recettes', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'search_items'       => __( 'Rechercher des recettes', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'not_found'          => __( 'Aucune recette trouvée', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'not_found_in_trash' => __( 'Aucune recette trouvée dans la corbeille', OCOOKING_PLUGIN_TEXT_DOMAIN ),
					'all_items'          => __( 'Toutes les recettes', OCOOKING_PLUGIN_TEXT_DOMAIN ),
				],
				'public'        => true,
				'menu_position' => 4,
				'menu_icon'     => 'dashicons-carrot',
				'hierarchical'  => false,
				'supports'      => [
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'author',
					'comments',
					'revisions',
				],
				'has_archive'      => true,
				'can_export'       => true,
				'delete_with_user' => false,
				'show_in_rest'     => true,
			]
		);
	}

	/**
	 * Register taxonomies method
	 *
	 * @return void
	 */
	public function register_taxonomies() {
		register_taxonomy(
			self::TAXONOMY_NAME_INGREDIENT,
			self::NAME,
			[
				'labels' => [
					'name'                       => __( 'Ingrédients', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'singular_name'              => __( 'Ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'all_items'                  => __( 'Tous les ingrédients', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'edit_item'                  => __( 'Editer un ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'view_item'                  => __( 'Voir un ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'update_item'                => __( 'Mise à jour d\'un ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'add_new_item'               => __( 'Ajouter un nouvel ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'new_item_name'              => __( 'Nom du nouvel ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'search_items'               => __( 'Rechercher des ingrédients', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'popular_items'              => __( 'Ingrédients populaires', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'separate_items_with_commas' => __( 'Séparer les ingrédients avec une virgule', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'add_or_remove_items'        => __( 'Ajouter ou supprimer un ingrédient', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'choose_from_most_used'      => __( 'Choisir un ingrédient parmi les plus utilisés', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'not_found'                  => __( 'Aucun ingrédient trouvé', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'back_to_items'              => __( 'Retour aux ingrédients', OCOOKING_PLUGIN_TEXT_DOMAIN ),
				],
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => false,
			]
		);

		register_taxonomy(
			self::TAXONOMY_NAME_TYPE,
			self::NAME,
			[
				'labels' => [
					'name'                       => __( 'Types', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'singular_name'              => __( 'Type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'all_items'                  => __( 'Tous les types', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'edit_item'                  => __( 'Editer un type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'view_item'                  => __( 'Voir un type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'update_item'                => __( 'Mise à jour d\'un type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'add_new_item'               => __( 'Ajouter un nouveau type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'new_item_name'              => __( 'Nom du nouveau type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'search_items'               => __( 'Rechercher des types', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'popular_items'              => __( 'Types populaires', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'separate_items_with_commas' => __( 'Séparer les types avec une virgule', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'add_or_remove_items'        => __( 'Ajouter ou supprimer un type', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'choose_from_most_used'      => __( 'Choisir un type parmi les plus utilisés', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'not_found'                  => __( 'Aucun type trouvé', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'back_to_items'              => __( 'Retour aux types', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'parent_item'                => __( 'Type parent', OCOOKING_PLUGIN_TEXT_DOMAIN ),
                    'parent_item_colon'          => __( 'Type parent :', OCOOKING_PLUGIN_TEXT_DOMAIN ),
				],
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => true,
			]
		);
	}
}
