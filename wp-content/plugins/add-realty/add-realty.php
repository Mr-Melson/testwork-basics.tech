<?php
/**
 * Add Realty
 *
 * Plugin Name: Add Realty
 * Version:     1.0.0
 * Author:      Omelson
 */

add_shortcode( 'add-realty-form', 'add_realty_form_shortcode' );
function add_realty_form_shortcode( $atts ){

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;

    include( __DIR__ . '/template/form.php' );
}

function get_plugin_url() {

    if (function_exists('plugins_url'))
        return trailingslashit(plugins_url(basename(dirname(__FILE__))));

    $path = dirname(__FILE__);
    $path = str_replace("\\", "/", $path);
    $path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path, strpos($path, "wp-content/")));
    return $path;
}

function theme_scripts() {
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
    wp_enqueue_media();
    wp_enqueue_script( "add_realty-main.js", get_plugin_url() . "/assets/js/upload_gallery.js" );
    wp_enqueue_script( "add_realty-main.js", get_plugin_url() . "/assets/js/main.js" );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
