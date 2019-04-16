<?php
/**
 * Sidebar template.
 *
 * @package oCooking
 */

?>
<aside class="sidebar">
	<div class="sidebar__name"><?php bloginfo( 'name' ); ?></div>
	<div class="sidebar__baseline"><?php bloginfo( 'description' ); ?></div>
	<div class="sidebar__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate accusantium inventore, tenetur nisi sint non, animi exercitationem excepturi at laborum facilis ipsa molestias iste incidunt rerum sed. Sunt dolore, hic exercitationem commodi animi, illum rem provident fuga dignissimos aliquam magni earum sit cupiditate fugiat necessitatibus esse tenetur beatae eligendi consectetur!</div>
	<nav class="menu menu--vertical">
		<ul class="menu__list">
			<li class="menu__list__list-item"><a class="menu__list__list-item__link" href="#">Blog</a></li>
			<li class="menu__list__list-item">
				<a class="menu__list__list-item__link" href="#">Types de recettes</a>
				<ul>
					<li><a href="#">Plats de résistances</a></li>
					<li><a href="#">En cas</a></li>
					<li><a href="#">Petit déjeuner</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="" class="recipe-proposal">
		<div class="recipe-proposal__title">Proposer une recette</div>
		<fieldset>
			<div class="form-group">
				<label for="title">Recette</label>
				<input class="form-control" type="text" name="title" id="title" />
			</div>
			<div class="form-group">
				<label for="steps">Instructions</label>
				<textarea class="form-control" name="steps" id="steps"></textarea>
			</div>
		</fieldset>
		<fieldset>
			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="email" name="email" id="email" />
			</div>
			<div class="form-group">
				<input type="checkbox" name="publish-agreement" id="publish-agreement" />
				<label class="d-inline" for="publish-agreement">Je suis d'accord pour que cette recette soit publiée sur oCooking</label>
			</div>
		</fieldset>
		<button type="submit" class="btn btn-green">Proposer</button>
	</form>
</aside>
