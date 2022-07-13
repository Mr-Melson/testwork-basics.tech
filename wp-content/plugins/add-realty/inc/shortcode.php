<?php
add_shortcode( 'add-realty-form', 'add_realty_form_shortcode' );
function add_realty_form_shortcode( $atts ){

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;

    include( __DIR__ . './../template/form.php' );
}