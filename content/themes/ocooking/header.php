<?php
/**
 * Header template
 *
 * @package oCooking
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'home' ); ?>>
	<header class="header">
		<div class="header__container header__container--start">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php
			wp_nav_menu(
				[
					'theme_location'  => 'header-menu',
					'container'       => 'nav',
					'container_class' => 'menu',
					'menu_class'      => 'menu__list',
				]
			);
			?>
		</div>
		<div class="header__container header__container--end">
			<?php if ( current_user_can( 'edit_recipe' ) ) : ?>
			<p>Content de vous revoir !</p>
			<?php
			endif;
			$ocooking_social_links = get_option( 'ocooking_social_links' );
			if ( ! empty( $ocooking_social_links ) ) :
			?>
			<nav class="menu">
				<ul class="menu__list">
				<?php
				foreach ( $ocooking_social_links as $social_name => $social_link ) :
					$social_link = trim( $social_link );
					if (
						! empty( $social_link )
						&& filter_var( $social_link, FILTER_VALIDATE_URL )
					) :
					?>
					<li class="menu__list__list-item">
						<a class="menu__list__list-item__link" href="<?php echo esc_attr( $social_link ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $social_name ); ?>"></i></a>
					</li>
					<?php
					endif;
				endforeach;
				?>
				</ul>
			</nav>
			<?php
			endif;
			?>
			<a class="ui-button" href="#"><i class="fa fa-bars"></i></a>
		</div>
		</header>