<?php
/**
 * Init and control CPT Products
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild\CPT;

class Town {

    /**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'register' ] );
	}

    /**
	 * Register custom post type.
	 */
	public function register() {

		$labels = array(
            'name'                  => 'Города',
            'singular_name'         => 'Город',
            'menu_name'             => 'Города',
            'name_admin_bar'        => 'Города',
            'archives'              => 'Города',
            'label'                 => 'Города',
            'description'           => 'Город',
			'attributes'            => 'Атрибуты города',
			'parent_item_colon'     => 'Родительский город:',
			'all_items'             => 'Все города',
			'add_new_item'          => 'Добавить новый город',
			'add_new'               => 'Добавить новый',
			'new_item'              => 'Новый город',
			'edit_item'             => 'Редактировать город',
			'update_item'           => 'Обновить город',
			'view_item'             => 'Посмотреть город',
			'view_items'            => 'Посмотреть города',
			'search_items'          => 'Поиск городов',
			'not_found'             => 'Не найдено',
			'not_found_in_trash'    => 'Не найдено в корзине',
			'featured_image'        => 'Изображение',
			'set_featured_image'    => 'Установить изображение',
			'remove_featured_image' => 'Удалить изображение',
			'use_featured_image'    => 'Использовать как изображение записи',
			'insert_into_item'      => 'Вставить в город',
			'uploaded_to_this_item' => 'Загрузить в город',
			'items_list'            => 'Список городов',
			'items_list_navigation' => 'Навигация по городам',
		);

		$args = array(
            'public'                => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => false,
            'query_var'             => true,
            'rewrite'               => true,
            'capability_type'       => 'page',
            'has_archive'           => true,
            'hierarchical'          => false,
            'menu_position'         => 7,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'             => 'dashicons-admin-multisite',
			'publicly_queryable'    => true,
			'show_in_admin_bar'     => true,
			'can_export'            => true,
			'taxonomies'            => [],
			'show_in_rest'          => true,
		);

		register_post_type( 'town', $args );
	}

}