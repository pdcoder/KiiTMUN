<?php 

/*
==========================================
Countries Admin Menu
==========================================
*/

function custom_post_types2(){

    $labels = array(
        'name' => 'Countries',
        'singular_name' => 'Countries',
        'add_new' => 'Add New Country',
        'all_items' => 'All Countries',
        'add_new_item' => 'Add New Country',
        'edit_item' => 'Edit Country',
        'new_item' => 'New Country',
        'view_item' => 'View Country',
        'search_item' => 'Search Country',
        'not_found' => 'No Countriess Found',
        'not_found_in_trash' => 'No Countries in Trash',
        'parent_item_colon' => 'Parent Country'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => false,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title'
        ),
        'menu_position' => 5,
        'exclude_from_search' => true
    );

    register_post_type('country', $args);
    
}

add_action('init', 'custom_post_types2');