<?php
/**
 * Custom functions
 */


add_action( 'init', 'register_cpt_concert' );

function register_cpt_concert() {
	$labels = array(
		'name' => _x( 'Concerts', 'concert' ),
		'singular_name' => _x( 'Concert', 'concert' ),
		'add_new' => _x( 'Add New', 'concert' ),
		'add_new_item' => _x( 'Add New Concert', 'concert' ),
		'edit_item' => _x( 'Edit Concert', 'concert' ),
		'new_item' => _x( 'New Concert', 'concert' ),
		'view_item' => _x( 'View Concert', 'concert' ),
		'search_items' => _x( 'Search Concerts', 'concert' ),
		'not_found' => _x( 'No concerts found', 'concert' ),
		'not_found_in_trash' => _x( 'No concerts found in Trash', 'concert' ),
		'parent_item_colon' => _x( 'Parent Concert:', 'concert' ),
		'menu_name' => _x( 'Concerts', 'concert' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'taxonomies' => array( ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-location'
	);

	register_post_type( 'concert', $args );
}

add_action( 'init', 'register_cpt_album' );

function register_cpt_album() {
	$labels = array(
		'name' => _x( 'Albums', 'album' ),
		'singular_name' => _x( 'Album', 'album' ),
		'add_new' => _x( 'Add New', 'album' ),
		'add_new_item' => _x( 'Add New Album', 'album' ),
		'edit_item' => _x( 'Edit Album', 'album' ),
		'new_item' => _x( 'New Album', 'album' ),
		'view_item' => _x( 'View Album', 'album' ),
		'search_items' => _x( 'Search Albums', 'album' ),
		'not_found' => _x( 'No albums found', 'album' ),
		'not_found_in_trash' => _x( 'No albums found in Trash', 'album' ),
		'parent_item_colon' => _x( 'Parent Album:', 'album' ),
		'menu_name' => _x( 'Albums', 'album' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'taxonomies' => array( ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-format-audio'
	);

	register_post_type( 'album', $args );
}