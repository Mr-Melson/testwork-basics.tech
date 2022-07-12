<?php
/**
 * Init and control content from WP
 *
 * @package Understrapchild\Core
 */

namespace Understrapchild\Content;

class Control {

    /**
	 * Constructor. Initializes class autoloading.
	 */
	public function __construct() {

		add_filter('acf/format_value/type=wysiwyg', [ $this, 'format_acf_value' ], 10, 3);
		add_filter('acf/format_value/type=textarea', [ $this, 'format_acf_value' ], 10, 3);
		add_filter('acf/format_value/type=text', [ $this, 'format_acf_value' ], 10, 3);
	}

	public function nbsp_callback($matches){
		$newText = substr($matches[0], -1) == " " ? substr($matches[0], 0, -1) . "&nbsp;" : $matches[0];
		return $newText;
	}
	 
	public function nbsp_text($text){
		$regexp = '/(?:^|[^а-яёА-ЯЁ0-9_])(за|из|в|без|а|до|к|я|на|но|по|о|от|что|перед|при|через|с|у|над|об|под|про|для|и|или|со)(?:^|[^а-яёА-ЯЁ0-9_])/u';
	 
		$text = preg_replace_callback($regexp,
				[$this, "nbsp_callback"],
				$text);
	 
		return $text;
	}
	 
	 
	public function format_acf_value( $value, $post_id, $field ) {
		return $this->nbsp_text($value);
	}

}