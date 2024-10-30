<?php

class wp_compassion_sponsored_child extends WP_Widget {

	// constructor
	function wp_compassion_sponsored_child() {
		parent::WP_Widget(false, $name = __('Compassion Sponsored Child', 'wp_compassion_sponsored_child') );
	}

	// widget display
	function widget($args, $instance) {
		include dirname(__FILE__) . '/templates/banner.php';
	}
}