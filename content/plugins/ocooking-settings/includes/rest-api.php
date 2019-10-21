<?php
/**
 * Modifies REST API
 *
 * @package oCooking
 * @link https://developer.wordpress.org/rest-api/extending-the-rest-api/modifying-responses/
 */
add_action( 'rest_api_init', 'ocooking_register_rest_fields' );
function ocooking_register_rest_fields() {
	/**
	 * Adds a field to the REST API
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_rest_field/
	 */
	register_rest_field(
		Post_Type_Recipe::NAME,
		'media_thumbnail_url',
		[
			'get_callback' => 'ocooking_get_media_thumbnail_url'
		]
	);
	register_rest_field(
		Post_Type_Recipe::NAME,
		'recipe_ingredient_name',
		[
			'get_callback' => 'ocooking_get_ingredient_names'
		]
	);
	register_rest_field(
		Post_Type_Recipe::NAME,
		'preparation_time',
		[
			'get_callback' => 'ocooking_get_recipe_metadata'
		]
	);
	register_rest_field(
		Post_Type_Recipe::NAME,
		'cooking_time',
		[
			'get_callback' => 'ocooking_get_recipe_metadata'
		]
	);
	register_rest_field(
		Post_Type_Recipe::NAME,
		'cost_per_person',
		[
			'get_callback' => 'ocooking_get_recipe_metadata'
		]
	);
}
function ocooking_get_media_thumbnail_url( $recipe ) {
	$media_id = $recipe['featured_media'];
	$media_image = wp_get_attachment_image_src( $media_id, 'thumbnail' );
	$thumbnail_url = $media_image[0];
	return $thumbnail_url;
}
function ocooking_get_ingredient_names( $recipe ) {
	$ingredient_names = [];
	if ( ! empty( $recipe[Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT] ) ) {
		/**
		 * Gets terms
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_terms/
		 */
		$ingredientTermList = get_terms([
			'taxonomy'   => Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT,
			'term_taxonomy_id' => $recipe[Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT]
		]);
		if ( ! empty( $ingredientTermList ) ) {
			foreach ( $ingredientTermList as $ingredientTerm ) {
				$ingredient_names[] = $ingredientTerm->name;
			}
		}
	}
	return $ingredient_names;
}
function ocooking_get_recipe_metadata( $recipe, $field_name ) {
	$metadata_value = get_post_meta(
		$recipe['id'],
		$field_name,
		true
	);
	return $metadata_value;
}
function ocooking_get_recipe_preparation_time( $recipe ) {
	var_dump( func_get_args() );
	exit;
	$preparation_time = get_post_meta(
		$recipe['id'],
		'preparation_time',
		true
	);
	return $preparation_time;
}