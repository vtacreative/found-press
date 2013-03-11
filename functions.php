<?php


/*	register and load our javascripts and styles  */
function fp_scripts_styles () {
	/*	js  */
	wp_register_script('3.2js', get_template_directory_uri() . '/js/3.2.min.js', array(), null);
	wp_register_script('mod-2.6.2', get_template_directory_uri() . '/js/vendor/mod-2.6.2.min.js', array(), null);
	wp_register_script('found-app', get_template_directory_uri() . '/js/app.js', array(), null);
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), null);
	wp_enqueue_script('mod-2.6.2');
	wp_enqueue_script('3.2js');
	wp_enqueue_script('found-app');
	wp_enqueue_script('plugins');
	/*	css	 */
	wp_register_style('global', get_stylesheet_uri(), array(), null, 'screen');
	wp_register_style('3.2css', get_template_directory_uri() . '/css/3.2.min.css', array(), null, 'all');
	wp_enqueue_style('3.2css');
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
	add_theme_support('custom-background', array('default-color' => '81d742'));
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
add_action( 'widgets_init', 'fp_widgets_init' );





/*///////////////////////////////
//
//  Custom Post Type: Events
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
 
 
 
/* add events meta box to custom post type page */
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
	$event_date = esc_html(get_post_meta($event->ID, 'event_date', true));
	$link1_url = (get_post_meta($event->ID, 'link1_url', true));	
	$link1_text = esc_html(get_post_meta($event->ID, 'link1_text', true));
	$link2_url = (get_post_meta($event->ID, 'link2_url', true));
	$link2_text = esc_html(get_post_meta($event->ID, 'link2_text', true));
    ?>
    <table>
        <tr>
            <td>Event Date</td>
            <td><input placeholder="Enter event date" type="text" size="80" name="event_date" value="<?php echo $event_date; ?>" /></td>
        </tr>
    </table>
	<!-- <h3>Create Up To 2 Links For Your Event</h3> -->
	<table>
        <tr>
            <td>Link 1 URL</td>
            <td><input placeholder="Enter link 1 address, i.e. http://www.yahoo.com" type="text" size="80" name="link1_url" value="<?php echo $link1_url; ?>" /></td>
        </tr>
        <tr>
            <td>Link 1 Text</td>
            <td><input placeholder="Enter link 1 name, i.e. Yahoo" type="text" size="80" name="link1_text" value="<?php echo $link1_text; ?>" /></td>
        </tr>
        <tr>
            <td>Link 2 URL</td>
            <td><input placeholder="Enter link 2 address, i.e. http://www.google.com" type="text" size="80" name="link2_url" value="<?php echo $link2_url; ?>" /></td>
        </tr>
        <tr>
            <td>Link 2 Text</td>
            <td><input placeholder="Enter link 2 name, i.e. Google" type="text" size="80" name="link2_text" value="<?php echo $link2_text; ?>" /></td>
        </tr>
    </table>
    <?php
}
 
 
/* save our event */
add_action('save_post', 'add_event_fields', 10, 2);
function add_event_fields($event_id, $event) {
	if($event->post_type == 'events') {
		if(isset($_POST['event_date']) && $_POST['event_date'] != '') {
			update_post_meta($event_id, 'event_date', $_POST['event_date']); 
		}
		if(isset($_POST['link1_url']) && $_POST['link1_url'] != '') {
			update_post_meta($event_id, 'link1_url', $_POST['link1_url']); 
		}
		if(isset($_POST['link1_text']) && $_POST['link1_text'] != '') {
			update_post_meta($event_id, 'link1_text', $_POST['link1_text']); 
		}
		if(isset($_POST['link2_url']) && $_POST['link2_url'] != '') {
			update_post_meta($event_id, 'link2_url', $_POST['link2_url']); 
		}
		if(isset($_POST['link2_text']) && $_POST['link2_text'] != '') {
			update_post_meta($event_id, 'link2_text', $_POST['link2_text']); 
		}
	}
}
 
 
/* use single-event.php as our default template */
add_filter('template_include', 'include_template_function', 1);
function include_template_function($template_path) {
	if(get_post_type() == 'events') {
		if(!is_single()) {
			$theme_file = TEMPLATEPATH . '/page-templates/single-events.php';
			$template_path = $theme_file; 
		}
	}
	return $template_path;
}





/*///////////////////////////////
//
//  Custom Post Type: Testimonials
//
///////////////////////////////*/
 
 
/* register a custom post type for testimonials */
add_action('init', 'create_testimonial');
function create_testimonial() {
	register_post_type('testimonials',
	    array(
	      	'labels' => array(
	        'name' => 'Testimonials',
	        'singular_name' => 'Testimonial',
	        'add_new' => 'Add New',
	        'add_new_item' => 'Add New Testimonial',
	        'edit' => 'Edit',
	        'edit_item' => 'Edit Testimonial',
	        'new_item' => 'New Testimonial',
	        'view' => 'View',
	        'view_item' => 'View Testimonial',
	        'search_items' => 'Search Testimonials',
	        'not_found' => 'No Testimonials found',
	        'not_found_in_trash' => 'No Testimonials found in Trash',
	        'parent' => 'Parent Testimonial' 
			),
 
	        'public' => true,
	        'menu_position' => 5,
	        'supports' => array('title', 'editor', 'thumbnail'),
	        'taxonomies' => array(''),
	        'menu_icon' => plugins_url('images/image.png', __FILE__ ),
	        'has_archive' => true
		)
	); 
}
 
 
 
/* add meta box to custom post type page */
add_action('admin_init', 'my_testimonial_admin');
function my_testimonial_admin() {
    add_meta_box(
		'testimonial_meta_box',
        'Testimonial Details',
        'display_testimonial_meta_box',
        'testimonials', 'normal', 'high'); 
}
 
 
 
/* display the meta box */
function display_testimonial_meta_box($testimonial) {
    $testimonial_speaker = esc_html(get_post_meta($testimonial->ID, 'testimonial_speaker', true));
	$testimonial_extra = esc_html(get_post_meta($testimonial->ID, 'testimonial_extra', true));
    ?>
    <table>
        <tr>
            <td style="width: 100%">Speaker</td>
            <td><input placeholder="i.e. James Jameson" type="text" size="80" name="testimonial_speaker" value="<?php echo $testimonial_speaker; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Extra</td>
            <td><input placeholder="anything you want, could be a location or title" type="text" size="80" name="testimonial_extra" value="<?php echo $testimonial_extra; ?>" /></td>
        </tr>
    </table>
    <?php
}
 
 
/* save our testimonial */
add_action('save_post', 'add_testimonial_fields', 10, 2);
function add_testimonial_fields($testimonial_id, $testimonial) {
	if($testimonial->post_type == 'testimonials') {
		if(isset($_POST['testimonial_speaker']) && $_POST['testimonial_speaker'] != '') {
			update_post_meta($testimonial_id, 'testimonial_speaker', $_POST['testimonial_speaker']); 
		}
		if(isset($_POST['testimonial_extra']) && $_POST['testimonial_extra'] != '') {
			update_post_meta($testimonial_id, 'testimonial_extra', $_POST['testimonial_extra']); 
		}
	}
}
 
 
/* use single-testimonial.php as our default template */
add_filter('template_include', 'include_testimonial_template', 1);
function include_testimonial_template($template_path) {
	if(get_post_type() == 'testimonials') {
		if(!is_single()) {
			$theme_file = TEMPLATEPATH . '/page-templates/single-testimonials.php';
			$template_path = $theme_file; 
		}
	}
	return $template_path;
}
