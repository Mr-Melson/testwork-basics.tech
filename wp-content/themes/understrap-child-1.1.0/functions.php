<?php
/**
 * Theme functions main file.
 *
 * @package Understrapchild\Core
 */
define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URL', get_stylesheet_directory_uri() );

require_once THEME_DIR . '/classes/class-core.php';

/**
 * Returns instance of theme's main class.
 *
 * @return Understrapchild
 */
function TC() : \Understrapchild\Core { //phpcs:ignore
	return \Understrapchild\Core::instance();
}
TC();