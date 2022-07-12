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
    echo '<script>';
    include( __DIR__ . '/assets/js/main.js' );
    echo '</script>';
}
