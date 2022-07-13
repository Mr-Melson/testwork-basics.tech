<?php
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
    wp_enqueue_script( "add_realty-upload_gallery.js", get_plugin_url() . "./../add-realty/assets/js/upload_gallery.js" );
    wp_enqueue_script( "add_realty-main.js", get_plugin_url() . "./../add-realty/assets/js/main.js" );

    wp_enqueue_style( "add_realty-main-css", get_plugin_url() . "./../add-realty/assets/css/main.css" );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );