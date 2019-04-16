<?php
/**
 * Theme template tags
 *
 * @package oCooking
 */

/**
 * Gets current content ingredient list
 *
 * @return array
 */
function ocooking_get_the_ingredients() {
	$ingredient_list = [];

	if (
		class_exists( 'Post_Type_Recipe' )
		&& taxonomy_exists( Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT )
	) {
		$ingredient_list = get_the_terms(
			get_the_ID(),
			Post_Type_Recipe::TAXONOMY_NAME_INGREDIENT
		);
	}

	return $ingredient_list;
}

/**
 * Displays current content ingredient list
 *
 * @return void
 */
function ocooking_the_ingredients() {
	$ingredient_list = ocooking_get_the_ingredients();

	?>
	<ul class="home-post__ingredients">
		<?php foreach ( $ingredient_list as $ingredient ) : ?>
			<li class="home-post__ingredients__item"><a href="<?php echo esc_attr( get_term_link( $ingredient ) ); ?>" class="badget badge-pill badge-dark"><?php echo esc_html( $ingredient->name ); ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php
}
