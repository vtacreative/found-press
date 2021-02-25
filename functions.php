<?php

/*	REGISTER JS & CSS  */
	
function fp_scripts_styles () {
	
	/*	js  */
	wp_register_script('foundation', get_template_directory_uri() . '/js/vendor/foundation.min.js', array(), null, true);
	wp_enqueue_script('foundation');
	
	/*	css	 */
	wp_register_style('foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), null, 'all');
	wp_enqueue_style('foundation');

	/* load our global stylesheet conditionally */
	if (is_child_theme) {
		wp_register_style('global', get_stylesheet_directory_uri() . '/style.css', array(), null, 'screen');
	} else {
		wp_register_style('global', get_template_directory_uri() . '/style.css', array(), null, 'screen');
	}
	wp_enqueue_style('global');
}
add_action('wp_enqueue_scripts', 'fp_scripts_styles', 5); //TODO: possibly alter or delete the $priority parameter






/* REMOVE QUERY STRINGS FROM STATIC RESOURCES */
function remove_query_strings( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_query_strings', 10, 2 );
add_filter( 'script_loader_src', 'remove_query_strings', 10, 2 );



/* ADD TITLE TAG SUPPORT */
add_action( 'after_setup_theme', 'theme_slug_setup' );
function theme_slug_setup() {
	add_theme_support( 'title-tag' );
}





/* FUNCTION TO CREATE ROMAN NUMERALS FROM INTEGERS */
function romanNumerals($num) 
{
	$n = intval($num);
	$res = '';

	/*** roman_numerals array  ***/
	$roman_numerals = array(
	            'M'  => 1000,
	            'CM' => 900,
	            'D'  => 500,
	            'CD' => 400,
	            'C'  => 100,
	            'XC' => 90,
	            'L'  => 50,
	            'XL' => 40,
	            'X'  => 10,
	            'IX' => 9,
	            'V'  => 5,
	            'IV' => 4,
	            'I'  => 1);

	foreach ($roman_numerals as $roman => $number) 
	{
	  /*** divide to get  matches ***/
	  $matches = intval($n / $number);

	  /*** assign the roman char * $matches ***/
	  $res .= str_repeat($roman, $matches);

	  /*** substract from the number ***/
	  $n = $n % $number;
	}

	return $res;
	}





/* DELETE HELLO DOLLY PLUGIN */
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
if (file_exists(WP_PLUGIN_DIR . '/hello.php'))
  delete_plugins(array('hello.php'));








/* REPLACE LOGIN WORDPRESS URL WITH SITE URL */
function fp_login_logo_url() {
	
    return home_url();
}
add_filter( 'login_headerurl', 'fp_login_logo_url' );





/* CHANGE LOGIN IMG TITLE */
function fp_login_img_title() {
	
    return 'The Official Website for ' . COMPANY_NAME;
}
add_filter( 'login_headertitle', 'fp_login_img_title' );





/* SET LOGIN WELCOME MESSAGE */
function fp_login_message() {
	
    return '<p class="fp-welcome">The Official Website for ' . COMPANY_NAME . '</p>';
}
add_filter( 'login_message', 'fp_login_message' );





/* MODIFY DASHBOARD FOOTER */
function fp_modify_dashboard_footer() {
	
	$local_time = date('g:i A', time()+60*60*$diff=-8);
	
	echo '<span id="dashboard-footer">It is currently ' . $local_time . ' on ' . date('l F jS, Y') . '. Your last login was...</span>';
}
add_filter('admin_footer_text', 'fp_modify_dashboard_footer');





/* RESTORE LINK MANAGER THAT EXISTED IN WP < 3.5 */
add_filter( 'pre_option_link_manager_enabled', '__return_true' );





/*  OBSCURE FAILED LOGIN MESSAGE */
function failed_login () {
	
    return 'Your username and/or password is incorrect.';

}
add_filter ('login_errors', 'failed_login');





/*  PREVENT UNAUTHORIZED EDITOR ACCESS */
define ('DISALLOW_FILE_EDIT', true);





/* REMOVE DEFAULT DASHBOARD WIDGETS */
function fp_remove_default_dashboard_widgets() {    
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  /*remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');*/
}
add_action( 'wp_dashboard_setup', 'fp_remove_default_dashboard_widgets' );





/* ADD CUSTOM DASHBOARD WIDGETS */
function fp_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'wptutsplus_dashboard_welcome', 'Welcome', 'fp_add_welcome_widget' );
    wp_add_dashboard_widget( 'wptutsplus_dashboard_links', 'Useful Links', 'fp_add_links_widget' );
}

function fp_add_welcome_widget(){ ?>
 
    This content management system lets you edit the pages and posts on your website.
 
    Your site consists of the following content, which you can access via the menu on the left:
 
    <ul>
        <li><strong>Pages</strong> - static pages which you can edit.</li>
        <li><strong>Posts</strong> - news or blog articles - you can edit these and add more.</li>
        <li><strong>Media</strong> - images and documents which you can upload via the Media menu on the left or within each post or page.</li>
    </ul>
 
    On each editing screen there are instructions to help you add and edit content.
 
<?php }
 
function fp_add_links_widget() { ?>
 
    Some links to resources which will help you manage your site:
 
    <ul>
        <li><a href="http://wordpress.org">The WordPress Codex</a></li>
        <li><a href="http://easywpguide.com">Easy WP Guide</a></li>
        <li><a href="http://www.wpbeginner.com">WP Beginner</a></li>
    </ul>
<?php }
add_action( 'wp_dashboard_setup', 'fp_add_dashboard_widgets' );





/*  TRIM OUTPUT OF wp_head */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');





/*	SUPPORT NATIVE WP CUSTOM BACKGROUND COLOR  */
function fp_setup() {
	
	add_theme_support('custom-background', array('default-color' => 'ffffff'));
	
}
add_action('after_setup_theme', 'fp_setup');





/*  SUPPORT CUSTOM HEADER IMAGE */
require(get_template_directory() . '/inc/custom-header.php');





/*  SUPPORT CUSTOM MENUS */
function fp_menus() {
	
 	register_nav_menus( 
		array(
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu'
		) 
	);
}
add_action('init', 'fp_menus');





/*  SUPPORT FEATURED IMAGES */
add_theme_support('post-thumbnails');





/* CUSTOMIZE EXCERPT CHAR COUNT */
function be_excerpt_length( $length ) { 
	
	$length = '40'; 
	
	return $length;
	 
	}





/*  HIDE ADMIN PANEL FROM FRONT END */
add_filter('show_admin_bar', '__return_false');





/*	GENERATE POST META  */
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





/*	REGISTER WIDGETS  */
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





/*  REMOVE CLASS FROM NAV UL LI */
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

