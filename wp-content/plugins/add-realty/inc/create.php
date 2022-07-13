<?php
add_action( 'wp_ajax_create_realty', 'create_realty' );

function create_realty() {

    $result = false;
    $link = '';
    if( !empty($_POST) ){

        if( !empty($_POST['realty_name']) ){
            $post_data = array(
                'post_title'    => sanitize_text_field($_POST['realty_name']),
                'post_type'		=> 'realty',
                'post_status'   => 'publish',
                'post_author'   => 1,
            );

            $post_id = wp_insert_post( wp_slash($post_data) );
        }

        if( !is_wp_error($post_id) ){

            $result = true;
            $link = get_permalink($post_id);

            if( '' != $_POST['square'] ){
                update_post_meta( $post_id, 'square', $_POST['square'] );
            }
            if( '' != $_POST['price'] ){
                update_post_meta( $post_id, 'price', $_POST['price'] );
            }
            if( '' != $_POST['living_space'] ){
                update_post_meta( $post_id, 'living_space', $_POST['living_space'] );
            }
            if( '' != $_POST['floor'] ){
                update_post_meta( $post_id, 'floor', $_POST['floor'] );
            }
            if( '' != $_POST['adress_create'] ){
                update_post_meta( $post_id, 'address', $_POST['adress_create'] );
            }
            if( '' != $_POST['type_of_realty'] ){
                wp_set_post_terms( $post_id, array($_POST['type_of_realty']), 'type' );
            }
            if( '' != $_POST['town_of_realty'] ){
                wp_update_post( [ 'ID' => $post_id, 'post_parent' => $_POST['town_of_realty'] ] );
            }
            if( !empty( $_POST['thumb_of_realty'] ) ){
                $thumb_of_realty = explode(", ", $_POST['thumb_of_realty'] );
                update_field( 'thumbs_gallery', $thumb_of_realty, $post_id);
                set_post_thumbnail($post_id, $thumb_of_realty[0]);
            }
        }
    }

    $return = array(
        'success' 	=> $result,
        'link'      => $link,
    );

    wp_send_json($return);
}