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
					'name'               => 'Recettes',
					'singular_name'      => 'Recette',
					'add_new_item'       => 'Ajouter une nouvelle recette',
					'edit_item'          => 'Editer la recette',
					'new_item'           => 'Nouvelle recette',
					'view_item'          => 'Voir la recette',
					'view_items'         => 'Voir les recettes',
					'search_items'       => 'Rechercher des recettes',
					'not_found'          => 'Aucune recette trouvée',
					'not_found_in_trash' => 'Aucune recette trouvée dans la corbeille',
					'all_items'          => 'Toutes les recettes',
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
					'name'                       => 'Ingrédients',
					'singular_name'              => 'Ingrédient',
					'all_items'                  => 'Tous les ingrédients',
					'edit_item'                  => 'Editer un ingrédient',
					'view_item'                  => 'Voir un ingrédient',
					'update_item'                => 'Mise à jour d\'un ingrédient',
					'add_new_item'               => 'Ajouter un nouvel ingrédient',
					'new_item_name'              => 'Nom du nouvel ingrédient',
					'search_items'               => 'Rechercher des ingrédients',
					'popular_items'              => 'Ingrédients populaires',
					'separate_items_with_commas' => 'Séparer les ingrédients avec une virgule',
					'add_or_remove_items'        => 'Ajouter ou supprimer un ingrédient',
					'choose_from_most_used'      => 'Choisir un ingrédient parmi les plus utilisés',
					'not_found'                  => 'Aucun ingrédient trouvé',
					'back_to_items'              => 'Retour aux ingrédients'
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
					'name'                       => 'Types',
					'singular_name'              => 'Type',
					'all_items'                  => 'Tous les types',
					'edit_item'                  => 'Editer un type',
					'view_item'                  => 'Voir un type',
					'update_item'                => 'Mise à jour d\'un type',
					'add_new_item'               => 'Ajouter un nouveau type',
					'new_item_name'              => 'Nom du nouveau type',
					'search_items'               => 'Rechercher des types',
					'popular_items'              => 'Types populaires',
					'separate_items_with_commas' => 'Séparer les types avec une virgule',
					'add_or_remove_items'        => 'Ajouter ou supprimer un type',
					'choose_from_most_used'      => 'Choisir un type parmi les plus utilisés',
					'not_found'                  => 'Aucun type trouvé',
					'back_to_items'              => 'Retour aux types',
					'parent_item'                => 'Type parent',
					'parent_item_colon'          => 'Type parent :',
				],
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => true,
			]
		);
	}
}
