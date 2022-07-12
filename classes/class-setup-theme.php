<?php
/**
 * Setup theme features and core functions.
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild;

/**
 * Setup theme main features
 *
 * @package Understrapchild
 */
class Setup_Theme {

	const THEME_ID = 'Understrapchild';

	/**
	 * Identifier to determine which assets to load
	 *
	 * @var string
	 */
	public $assets_id = null;

	/**
	 * Constructor.
	 */
	public function __construct() {

		define( 'THEME_VSN', 'v1.0.0' );

		add_theme_support( 'post-thumbnails' );
		add_filter( 'template_include', [ $this, 'set_assets' ], PHP_INT_MAX );

		add_theme_support( 'woocommerce' );

		add_filter( 'wp_check_filetype_and_ext', [ $this, 'fix_svg_mime_type' ], 10, 5 );
		add_filter( 'upload_mimes', [ $this, 'upload_allow_types' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'theme_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'theme_styles' ] );

		add_action( 'admin_menu', [ $this, 'wpexplorer_remove_menus' ] );

        add_filter( 'autoptimize_filter_imgopt_lazyload_cssoutput', function () {
            return '<style>.no-js .lazyload{display:none;}.lazyload,.lazyloading{opacity:0;}.lazyloaded{opacity:1;transition:opacity 300ms;}</style>';
        });
	}

	/**
	 * Reads Assets ID from template header and sets releveant class variable.
	 * Post meta 'assets_id' if set will override value from template.
	 *
	 * @param string $template - template name.
	 * @return string
	 */
	public function set_assets( $template ) {

		$data = get_file_data( $template, [ 'assetsID' => 'Assets ID' ] );

		if ( $data['assetsID'] ) {
			$this->assets_id = $data['assetsID'];
		} else {
			$this->assets_id = 'index';
		}

		if ( is_singular() ) {
			global $post;
			if ( get_post_meta( $post->ID, 'assets_id', true ) ) {
				$this->assets_id = get_post_meta( $post->ID, 'assets_id', true );
			}
		}

		return $template;
	}

	/**
	 * Register theme styles.
	 *
	 * @return void
	 */
	public function theme_styles() {

		wp_enqueue_style( self::THEME_ID . "-app-css", THEME_URL . "/assets/css/swiper-bundle.min.css", [], THEME_VSN, 'all' );
		wp_enqueue_style( self::THEME_ID . "-app-css", THEME_URL . "/assets/css/main.css", [], THEME_VSN, 'all' );
	}

	/**
	 * Register theme scripts.
	 *
	 * @return void
	 */
	public function theme_scripts() {

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true );
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( self::THEME_ID . "main.js", THEME_URL . "/assets/js/swiper-bundle.min.js", [], THEME_VSN, true );
		wp_enqueue_script( self::THEME_ID . "main.js", THEME_URL . "/assets/js/main.js", [], THEME_VSN, true );
	}

	public function upload_allow_types( $mimes ) {

		// разрешаем новые типы
		$mimes['svg']  = 'image/svg';
		$mimes['svg']  = 'image/svg+xml';
		$mimes['txt']  = 'text/plain';
		$mimes['pdf']  = 'application/pdf';
		$mimes['doc']  = 'application/msword';
		$mimes['docx']  = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

		return $mimes;
	}

	public function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

		// WP 5.1 +
		if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
			$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
		else
			$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

		// mime тип был обнулен, поправим его
		// а также проверим право пользователя
		if( $dosvg ){

			// разрешим
			if( current_user_can('manage_options') ){

				$data['ext']  = 'svg';
				$data['type'] = 'image/svg+xml';
			}
			// запретим
			else {
				$data['ext'] = $type_and_ext['type'] = false;
			}

		}

		return $data;
	}

	public function wpexplorer_remove_menus() {
		remove_menu_page( 'edit.php' );
	}

}
