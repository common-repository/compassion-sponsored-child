<?php

/**
 * Plugin Name: Compassion Sponsored Child
 * Plugin URI: https://bitbucket.org/adeptemployees/compassion-sponsored-child
 * Description: A plugin that displays the number of children sponsored through Compassion today and a photo of the most recent child.
 * Version: 1.1
 * Author: Joshua Costello
 * Author URI: http://marketingadept.com
 *
 */

/**
 * Adding support for using a short code to include this in content.
 * Short-code: [compassion_sponsored]
 */
function compassion_sponsored_func() {
	ob_start();
	include dirname(__FILE__) . '/templates/banner.php';
	return ob_get_clean();
}
add_shortcode( 'compassion_sponsored', 'compassion_sponsored_func' );


/**
 * Adding a widget for using the plugin in sidebars.
 */
//including the class from an external file and registering the widget.
include dirname(__FILE__) . '/com-sponsored-child-widget-class.php';
add_action('widgets_init', create_function('', 'return register_widget("wp_compassion_sponsored_child");'));


/**
 * Adding the scripts needed to get the data from Compassion and add proper functionality.
 */
function compassion_scripts() {
	// Register the script like this for a plugin:
	wp_register_script( 'enabler', plugins_url( '/scripts/enabler.js', __FILE__ ) );
    wp_register_script( 'compassion', plugins_url( '/scripts/compassion.js', __FILE__ ));

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'enabler' );
    wp_enqueue_script( 'compassion' );
}
add_action( 'wp_enqueue_scripts', 'compassion_scripts' );


/**
 * Adding the styling for the displays.
 */
function compassion_styles() {
	// Register the style like this for a plugin:
    wp_register_style( 'custom-style', plugins_url( '/css/compassion.css', __FILE__ ) );

    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'compassion_styles' );