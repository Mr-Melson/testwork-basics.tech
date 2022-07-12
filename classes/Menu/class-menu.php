<?php
/**
 * Init and control CPT Menu
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild\Menu;

class Menu {

    /**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

        add_theme_support( 'menus' );
        add_action( 'after_setup_theme', [ $this, 'theme_register_nav_menu' ] );
        $this->add_option_page();
	}

    public function theme_register_nav_menu() {
        register_nav_menu( 'mainmenu', 'Main Menu' );
        register_nav_menu( 'footer', 'Footer Menu' );
    }

    public function add_option_page() {

        if( function_exists('acf_add_options_page') ) {
	
            acf_add_options_page(array(
                'page_title' 	=> 'Настройки сайта',
                'menu_title'	=> 'Настройки сайта',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
            
        }
    }
}