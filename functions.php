<?php

function responsive_js() {
	wp_register_script('mod-2.6.2', get_stylesheet_directory_uri() . '/js/mod-2.6.2.min.js', true);
	wp_register_script('found-3.2', get_stylesheet_directory_uri() . '/js/3.2.min.js', true);
	wp_register_script('found-app', get_stylesheet_directory_uri() . '/js/app.js', true);
	wp_register_script('plugins', get_stylesheet_directory_uri() . '/js/plugins.js', true);
	wp_enqueue_script('mod-2.6.2');
	wp_enqueue_script('found-3.2');
	wp_enqueue_script('found-app');
	wp_enqueue_script('plugins');
}
add_action('wp_enqueue_scripts', 'responsive_js', 5);

function responsive_css() {
	wp_register_style('found-style', get_stylesheet_directory_uri() . '/css/3.2.css', array(), 'all');
	wp_enqueue_style('found-style');
}
add_action('wp_enqueue_scripts', 'responsive_css');
