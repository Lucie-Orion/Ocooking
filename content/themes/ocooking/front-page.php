<?php
/**
 * Homepage template
 *
 * @package oCooking
 */

get_header();

if (
	class_exists( 'Post_Type_Recipe' )
	&& post_type_exists( Post_Type_Recipe::NAME )
) :
	$last_recipe_query = new WP_Query(
		[
			'post_type'      => Post_Type_Recipe::NAME,
			'posts_per_page' => 1,
		]
	);

	if ( $last_recipe_query->have_posts() ) :
		$last_recipe_query->the_post();
		?>
		<main class="main">
			<article class="home-post">
				<div class="home-post__title-author-container">
					<h2 class="home-post__title"><?php the_title(); ?></h2>
					<span class="home-post__author"><?php printf( esc_html__( 'Préparée par %s', OCOOKING_THEME_TEXT_DOMAIN ), get_the_author() ); ?></span>
				</div>
				<ul class="home-post__informations-list">
					<li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php esc_html_e( 'Préparation', OCOOKING_THEME_TEXT_DOMAIN ); ?></span>&nbsp;
					<?php
					/* translators: %d contains dynamic time, please translate only minutes abbreviation */
					printf( esc_html__( '%d min.', OCOOKING_THEME_TEXT_DOMAIN ), get_field( 'preparation_time' ) ); ?></li>
					<li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php esc_html_e( 'Cuisson', OCOOKING_THEME_TEXT_DOMAIN ); ?></span>&nbsp;
					<?php
					/* translators: %d contains dynamic time, please translate only minutes abbreviation */
					printf( esc_html__( '%d min.', OCOOKING_THEME_TEXT_DOMAIN ), get_field( 'cooking_time' ) ); ?></li>
					<li class="home-post__informations-list__item"><span class="home-post__informations-list__item__name"><?php esc_html_e( 'Prix', OCOOKING_THEME_TEXT_DOMAIN ); ?></span>&nbsp;
					<?php
					/* translators: %d contains dynamic price, please translate only € / pers. */
					printf( esc_html__( '%d € / pers.', OCOOKING_THEME_TEXT_DOMAIN ) , get_field( 'cost_per_person' ) ); ?></li>
				</ul>
				<figure class="home-post__thumbnail">
					<img src="<?php echo esc_attr( the_post_thumbnail_url() ); ?>" alt="" class="home-post__thumbnail__image">
				</figure>
				<div class="home-post__excerpt-container">
					<h3><?php esc_html_e( 'La recette en résumé', OCOOKING_THEME_TEXT_DOMAIN ); ?></h3>
					<p class="home-post__excerpt"><?php the_excerpt(); ?></p>
				</div>
				<?php ocooking_the_ingredients(); ?>
				<div class="home-post__read-next-container">
					<a href="<?php the_permalink(); ?>" class="btn btn-outline-green btn--icon-cutlery"><?php esc_html_e( 'Lire la recette', OCOOKING_THEME_TEXT_DOMAIN ); ?></a>
				</div>
				<div class="home-post__type-container">
					<span class="home-post__footer__type-prefix"><?php esc_html_e( 'Recette visible dans', OCOOKING_THEME_TEXT_DOMAIN ); ?></span> <a class="btn btn-outline-dark" href="#">En cas</a>
				</div>
			</article>
		</main>
		<?php
	endif;
endif;

get_sidebar();

get_footer();

?>
