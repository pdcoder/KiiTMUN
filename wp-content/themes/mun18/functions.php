<?php 

/*
===================================
Enqueue Custom Scripts
===================================
*/
wp_enqueue_script('jquery');

function style_enqueue(){
	wp_enqueue_script('bootsrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '2.0.2', true);
	wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('mycss', get_template_directory_uri().'/assets/css/index.css', array(), '11.1.27', 'all');
	wp_enqueue_script('myjs', get_template_directory_uri().'/assets/js/index.js', array('jquery'), '11.1.27', true);
}
add_action('wp_enqueue_scripts', 'style_enqueue');

function admin_style_enqueue(){
	wp_enqueue_style('myadmincss', get_template_directory_uri().'/assets/css/admin-panel-css.css');
	wp_enqueue_script('myadminjs', get_template_directory_uri().'/assets/js/admin-panel-js.js', array(), null, true);
	wp_enqueue_script('reorderjs', get_template_directory_uri().'/assets/js/reorder.js',  array( 'jquery' , 'jquery-ui-sortable' ), '1.0.0' , true);
	wp_localize_script('reorderjs', 'WP_REGISTRATIONS_FIELD_LISTING', array(
			'security' => wp_create_nonce('wp-registrations-field-order'),
			'success' => __('Registraions Field sort order has been saved.'),
			'failure' => __('There was an error saving the sort order, or you do not have priviledges')
		));
}
add_action('admin_enqueue_scripts', 'admin_style_enqueue');

/*
===========================================
Activate Theme Supports
===========================================
*/

function theme_supports(){
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('menus');
    
    register_nav_menu('primary', 'Primary Header Navigation');

}

add_action('init', 'theme_supports');


/*
===================================================================
Include Walker Class
===================================================================
*/

require get_template_directory() . '/inc/walker_class.php';

/*
===========================================
Flushing Rewrite Rules
===========================================
*/

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'wdocs_flush_rewrites' );
 
 
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'myplugin_flush_rewrites' );
function myplugin_flush_rewrites() {
	custom_post_types2();
	custom_post_types1();
	flush_rewrite_rules();
}

include(dirname(__FILE__).'/inc/committees_admin_menu.php');
include(dirname(__FILE__).'/inc/countries_admin_menu.php');
include(dirname(__FILE__).'/inc/registrations_admin_panel.php');
include(dirname(__FILE__).'/inc/registered_user_list.php');


/*
==============================================
Categories for Images
==============================================
*/

function add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'add_categories_to_attachments' );