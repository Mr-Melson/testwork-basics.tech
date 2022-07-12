<?php
/**
 * Init and control CPT Products
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild\CPT;

class Realty {

    /**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'create_taxonomies' ], 90 );
		add_action( 'init', [ $this, 'register' ] );
	}

    /**
	 * Register custom post type.
	 */
	public function register() {

		$labels = array(
            'name'                  => 'Недвижимость',
            'singular_name'         => 'Недвижимость',
            'menu_name'             => 'Недвижимость',
            'name_admin_bar'        => 'Недвижимость',
            'archives'              => 'Недвижимость',
            'label'                 => 'Недвижимость',
            'description'           => 'Недвижимость',
			'attributes'            => 'Атрибуты недвижимости',
			'parent_item_colon'     => 'Родительская запись:',
			'all_items'             => 'Все недвижимость',
			'add_new_item'          => 'Добавить новую недвижимость',
			'add_new'               => 'Добавить новую',
			'new_item'              => 'Новая недвижимость',
			'edit_item'             => 'Редактировать недвижимость',
			'update_item'           => 'Обновить недвижимость',
			'view_item'             => 'Посмотреть недвижимость',
			'view_items'            => 'Посмотреть недвижимость',
			'search_items'          => 'Поиск недвижимости',
			'not_found'             => 'Не найдено',
			'not_found_in_trash'    => 'Не найдено в корзине',
			'featured_image'        => 'Изображение',
			'set_featured_image'    => 'Установить изображение',
			'remove_featured_image' => 'Удалить изображение',
			'use_featured_image'    => 'Использовать как изображение записи',
			'insert_into_item'      => 'Вставить в запись',
			'uploaded_to_this_item' => 'Загрузить в запись',
			'items_list'            => 'Список недвижимости',
			'items_list_navigation' => 'Навигация по недвижимости',
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
			'supports'              => array( 'title', 'thumbnail' ),
			'menu_icon'             => 'dashicons-building',
			'publicly_queryable'    => true,
			'show_in_admin_bar'     => true,
			'can_export'            => true,
			'taxonomies'            => array( 'type' ),
			'show_in_rest'          => true,
		);

		register_post_type( 'realty', $args );
	}

	/**
     * Register taxonomies.
    */
    public function create_taxonomies() {

        register_taxonomy( 'type', ['realty'], array(
            'label'                 => '',
            'labels'                => array(
                'name'              => 'Тип недвижимости',
                'singular_name'     => 'Тип недвижимости',
                'search_items'      => 'Поиск типы недвижимости',
                'all_items'         => 'Все типы недвижимости',
                'view_item '        => 'Просмотр типа недвижимости',
                'parent_item'       => 'Родительский тип недвижимости',
                'parent_item_colon' => 'Родительский тип недвижимости:',
                'edit_item'         => 'Изменить тип недвижимости',
                'update_item'       => 'Обновить тип недвижимости',
                'add_new_item'      => 'Добавить новый тип недвижимости',
                'new_item_name'     => 'Название нового типа недвижимости',
                'menu_name'         => 'Тип недвижимости',
            ),
            'description'           => '',
            'public'                => true,
            'hierarchical'          => false,
            'rewrite'               => false,
            'query_var'             => 'type',
            'capabilities'          => array(),
            'meta_box_cb'           => 'post_categories_meta_box', 
            'show_admin_column'     => true, 
            'show_in_rest'          => true,
            'rest_base'             => null,
        ) );

    }
}