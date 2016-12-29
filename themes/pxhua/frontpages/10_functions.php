<?php


function twentyhua_10_scripts_styles() {
	// bootstrap
	wp_enqueue_script( 'twentyhua-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20150701', true );
	wp_enqueue_style( 'twentyhua-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20150701' );
	wp_enqueue_style( 'twentyhua-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '20150701' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );
