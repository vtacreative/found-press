<?php


/*	register and load our javascripts and styles  */
function fp_scripts_styles () {
	/*	js  */
	wp_register_script('found-3.2', get_template_directory_uri() . '/js/3.2.min.js', true);
	wp_register_script('mod-2.6.2', get_template_directory_uri() . '/js/vendor/mod-2.6.2.min.js', true);
	wp_register_script('found-app', get_template_directory_uri() . '/js/app.js', true);
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', true);
	wp_enqueue_script('mod-2.6.2');
	wp_enqueue_script('found-3.2');
	wp_enqueue_script('found-app');
	wp_enqueue_script('plugins');
	/*	css	 */
	wp_register_style('global', get_template_directory_uri() . '/style.css', null, 0.2, 'screen');
	wp_register_style('foundation3.2', get_template_directory_uri() . '/css/3.2.min.css', array(), 'all');
	wp_enqueue_style('foundation3.2');
	wp_enqueue_style('global');
}
add_action('wp_enqueue_scripts', 'fp_scripts_styles', 5); //TODO: possibly alter or delete the $priority parameter







/*  clean up the output of wp_head */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');






/*	support custom background color  */
function fp_setup() {
	add_theme_support('custom-background', array('default-color' => '81d742'));
}
add_action('after_setup_theme', 'fp_setup');



/* support custom header image */
require(get_template_directory() . '/inc/custom-header.php');



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
add_action( 'widgets_init', 'fp_widgets_init' );






/*///////////////////////////////
//
//	Custom Post Type: Events
//
///////////////////////////////*/

/* register a custom post type for events */
add_action('init', 'create_event');
function create_event() {
	register_post_type('events',
	    array(
	      	'labels' => array(
	        'name' => 'Events',
	        'singular_name' => 'Event',
	        'add_new' => 'Add New',
	        'add_new_item' => 'Add New Event',
	        'edit' => 'Edit',
	        'edit_item' => 'Edit Event',
	        'new_item' => 'New Event',
	        'view' => 'View',
	        'view_item' => 'View Event',
	        'search_items' => 'Search Events',
	        'not_found' => 'No Events found',
	        'not_found_in_trash' => 'No Events found in Trash',
	        'parent' => 'Parent Event' 
			),

	        'public' => true,
	        'menu_position' => 15,
	        'supports' => array('title', 'editor', 'comments', 'thumbnail'),
	        'taxonomies' => array(''),
	        'menu_icon' => plugins_url('images/image.png', __FILE__ ),
	        'has_archive' => true
		)
	); 
}



/* add meta box to custom post type page */
add_action('admin_init', 'my_admin');
function my_admin() {
    add_meta_box(
		'event_meta_box',
        'Event Details',
        'display_event_meta_box',
        'events', 'normal', 'high'); 
}



/* display the meta box */
function display_event_meta_box($event) {
    $event_name = esc_html(get_post_meta($event->ID, 'event_name', true));
    $event_desc = esc_html(get_post_meta($event->ID, 'event_desc', true));
    ?>
    <table>
        <tr>
            <td style="width: 100%">Event Name</td>
            <td><input type="text" size="80" name="event_name" value="<?php echo $event_name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Event Description</td>
            <td><input type="text" size="80" name="event_desc" value="<?php echo $event_desc; ?>" /></td>
        </tr>
    </table>
    <?php
}


/* save our event */
add_action('save_post', 'add_event_fields', 10, 2);
function add_event_fields($event_id, $event) {
	if($event->post_type == 'events') {
		if(isset($_POST['event_name']) && $_POST['event_name'] != '') {
			update_post_meta($event_id, 'event_name', $_POST['event_name']); 
		}
		if(isset($_POST['event_desc']) && $_POST['event_desc'] != '') {
			update_post_meta($event_id, 'event_desc', $_POST['event_desc']); 
		}
	}
}


/* use single-event.php as our default template */
add_filter('template_include', 'include_template_function', 1);
function include_template_function($template_path) {
	if(get_post_type() == 'events') {
		if(is_single()) {
			$theme_file = locate_template(array('single-events.php'));
			$template_path = $theme_file; 
		}
	}
	return $template_path;
}