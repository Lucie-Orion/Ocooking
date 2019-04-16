<?php
/**
 * Footer template
 *
 * @package oCooking
 */

?>
	<footer class="footer">
		<div class="footer__text"><?php bloginfo( 'name' ); ?> par <a class="footer__text__author" href="#">oClock Orion</a>. La meilleure source pour se régaler.</div>
		<div class="copyright"><?php bloginfo( 'name' ); ?> <?php echo esc_html( date( 'Y' ) ); ?></div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
