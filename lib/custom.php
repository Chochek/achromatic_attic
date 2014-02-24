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
		'menu_icon' => 'dashicons-format-audio'
	);

	register_post_type( 'concert', $args );
}