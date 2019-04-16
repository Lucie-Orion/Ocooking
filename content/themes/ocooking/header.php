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
			<a class="logo" href="#"><?php bloginfo( 'name' ); ?></a>
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
			<nav class="menu">
				<ul class="menu__list">
					<li class="menu__list__list-item">
						<a class="menu__list__list-item__link" href="#"><i class="fa fa-facebook"></i></a>
					</li>
					<li class="menu__list__list-item">
						<a class="menu__list__list-item__link" href="#"><i class="fa fa-twitter"></i></a>
					</li>
				</ul>
			</nav>
			<a class="ui-button" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</header>
