<?php
/**
 * Theme configuration file
 *
 * @package oCooking
 */

define( 'OCOOKING_THEME_VERSION', '1.0.1' );
define( 'OCOOKING_THEME_TEXT_DOMAIN', 'ocooking' );

require get_theme_file_path( 'inc/setup.php' );

require get_theme_file_path( 'inc/enqueue-scripts.php' );

require get_theme_file_path( 'inc/menus.php' );

require get_theme_file_path( 'inc/template-tags.php' );
