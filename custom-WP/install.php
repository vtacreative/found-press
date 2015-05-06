<?php

/*  REMOVE CLASS FROM NAV UL LI */
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}


switch_theme( 'fp-child' );

/*	SET PERMALINKS TO POST NAME */
update_option( 'permalink_structure', '/%postname%/' );

/*	UPDATE THE DEFAULT SAMPLE PAGE TO FOUND-PRESS HOMEPAGE */
$fp_homepage = array(
	'ID'						=> 2,
	'post_type'			=> 'page',
	'post_name'			=> 'home',
	'post_status'		=> 'publish',
  'post_title'    => 'Home',
);
wp_insert_post( $fp_homepage );
update_post_meta( 2, '_wp_page_template', 'page-templates/featurettes.php' );

/*	MAKE HOMEPAGE DISPLAY STATIC PAGE */
update_option( 'show_on_front', 'page' );

/*	DISPLAY THE SAMPLE PAGE */
update_option( 'page_on_front', 2);

?>