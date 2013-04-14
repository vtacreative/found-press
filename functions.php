<?php
http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js

/*	register and load our javascripts and styles  */
function fp_scripts_styles () {
	/*	js  */
	wp_register_script('js', get_template_directory_uri() . '/js/4.1.1.min.js', array(), null);
	wp_enqueue_script('js');
	wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', array(), null);
	wp_enqueue_script('modernizr');
	wp_register_script('zepto', get_template_directory_uri() . '/js/vendor/zepto.js', array(), null);
	wp_enqueue_script('zepto');
	/*	css	 */
	wp_register_style('css', get_template_directory_uri() . '/css/4.1.1.min.css', array(), null, 'all');
	wp_enqueue_style('css');
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), null, 'all');
	wp_enqueue_style('normalize');
	wp_register_style('global', get_stylesheet_uri(), array(), null, 'screen');
	wp_enqueue_style('global');
}
add_action('wp_enqueue_scripts', 'fp_scripts_styles', 5); //TODO: possibly alter or delete the $priority parameter


/*  obscure the failed login message */
function failed_login () {
    return 'Your username and/or password is incorrect.';
}
add_filter ('login_errors', 'failed_login');


/*  prevent unauthorized editor access */
define ('DISALLOW_FILE_EDIT', true);



/*  clean up the output of wp_head */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');






/*	support custom background color  */
function fp_setup() {
	add_theme_support('custom-background', array('default-color' => 'ffffff'));
}
add_action('after_setup_theme', 'fp_setup');

/* support custom header image */
require(get_template_directory() . '/inc/custom-header.php');

/*  support custom menus */
function fp_menus() {
 	register_nav_menus( 
	array(
		'header-menu' => 'Header Menu',
		'footer-menu' => 'Footer Menu'
	) );
}
add_action('init', 'fp_menus');

/*  support featured images */
add_theme_support('post-thumbnails');





/*  hide admin bar from front end view */
add_filter('show_admin_bar', '__return_false');






/*	generate post metadata  */
function fp_meta() {
	$categories_list = get_the_category_list(__(', '));
	$tag_list = get_the_tag_list('', __(', '));

	$date = sprintf('<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url(get_permalink()),
		esc_attr(get_the_time()),
		esc_attr(get_the_date('c')),
		esc_html(get_the_date())
	);

	$author = sprintf('<span><a href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url(get_author_posts_url(get_the_author_meta('ID'))),
		esc_attr(sprintf(__('View all posts by %s'), get_the_author())),
		get_the_author()
	);

	// 1 = category, 2 = tag, 3 = date, 4 = author
	if ($tag_list) {
		$utility_text = __('Posted in %1$s and tagged %2$s on %3$s<span> by %4$s</span>.');
	} elseif ($categories_list) {
		$utility_text = __('Posted in %1$s on %3$s<span> by %4$s</span>.');
	} else {
		$utility_text = __('Posted on %3$s<span> by %4$s</span>.');
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}








/*	register widgets  */
function fp_widgets_init() {
	register_sidebar( array(
		'name' => __('Main Sidebar'),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', 'fp_widgets_init');