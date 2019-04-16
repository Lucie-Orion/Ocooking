<?php
/**
 * Default template
 *
 * @package oCooking
 */

get_header();

if ( have_posts() ) :
	?>
	<main class="main">
		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<article <?php post_class(); ?>>
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
				<main>
					<?php the_excerpt(); ?>
				</main>
				<footer>
					<a href="<?php the_permalink(); ?>">Lire la suite</a>
				</footer>
			</article>
			<?php
		endwhile;
		?>
	</main>
	<?php
endif;

get_footer();
