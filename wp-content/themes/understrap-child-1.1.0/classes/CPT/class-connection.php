<?php
/**
 * Init and control CPT Products
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild\CPT;

class Connection {

    /**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

		add_action('add_meta_boxes', function () {
			add_meta_box( 'town', 'Город', [ $this, 'town_metabox' ], 'realty', 'side', 'low' );
		}, 1);

		add_action('add_meta_boxes', function(){
			add_meta_box( 'realty', 'Недвижимость в городе', [ $this, 'realty_metabox' ], 'town', 'side', 'low'  );
		}, 1);
	}

    /**
	 * Add town metabox to realty
	 */
	public function town_metabox( $post ) {

		$towns = get_posts(array( 'post_type'=>'town', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

		if( $towns ){
			echo '<div style="max-height:200px; overflow-y:auto;"><ul>';

			foreach( $towns as $town ){
				echo '
				<li>
					<label>
						<input type="radio" name="post_parent" value="'. $town->ID .'" '. checked($town->ID, $post->post_parent, 0) .'> '. esc_html($town->post_title) .'
					</label>
				</li>
				';
			}

			echo '</ul></div>';
		}
		else
			echo 'Команд нет...';
	}

	/**
	 * Add realty metabox to town
	 */
	public function realty_metabox( $post ) {

		$realties = get_posts(array( 'post_type'=>'realty', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

		if( $realties ){
			foreach( $realties as $realty ){
				echo '<a href="' . get_edit_post_link( $realty->ID ) . '">'.$realty->post_title.'</a>';
			}
		}
		else
			echo 'Игроков нет...';
	}

}