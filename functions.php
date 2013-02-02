<?php

function js() {
	wp_register_script('mod-2.6.2', get_template_directory_uri() . '/js/mod-2.6.2.min.js', true);
	wp_register_script('found-3.2', get_template_directory_uri() . '/js/3.2.min.js', true);
	wp_register_script('found-app', get_template_directory_uri() . '/js/app.js', true);
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', true);
	wp_enqueue_script('mod-2.6.2');
	wp_enqueue_script('found-3.2');
	wp_enqueue_script('found-app');
	wp_enqueue_script('plugins');
}
add_action('wp_enqueue_scripts', 'js', 5);

function css() {
	wp_register_style('global', get_template_directory_uri() . '/style.css', null, 0.2, 'screen');
	wp_register_style('foundation3.2', get_template_directory_uri() . '/css/3.2.css', array(), 'all');
	wp_enqueue_style('foundation3.2');
	wp_enqueue_style('global');
}
add_action('wp_enqueue_scripts', 'css');