<?php 
    /*
    Plugin Name: Mirva
    Plugin URI: http://colensojory.github.io/mirva
    Description: Mirva is a Portfolio custom post type utilising the WordPress Media Library.
    Author: Colenso Jory
    Version: 0.1
    Author URI: http://colensojory.github.io
    */

// Init Custom Post Type - mirva_portfolio
add_action ('init', 'mirva_portfolio_post_type');
function mirva_portfolio_post_type () {
	$labels = array( 
        'name' => __('Artwork', 'mirva'),
        'singular_name' => __('Artwork', 'mirva'),
        'add_new' => __('Add Artwork', 'mirva'),
        'add_new_item' => __('Add Artwork', 'mirva'),
        'edit_item' => __('Edit Artwork','mirva'),
        'edit' => __('Edit', 'mirva'),
        'new_item' => __('New Artwork', 'mirva'),
        'all_items' => __('All Artwork', 'mirva'),
        'view_item' => __('View Artwork', 'mirva'),
        'search_items' => __('Search Portfolio Entries', 'mirva'),
        'not_found' =>  __('No artwork found', 'mirva'),
        'not_found_in_trash' => __('No artwork found in Trash', 'mirva'), 
        'view' =>  __('View Artwork', 'mirva'),
        'parent_item_colon' => '',
        'menu_name' => __('Mirva Portfolio', 'mirva')
    );
	$args = array( 
		'labels' => $labels, 
		'hierarchical' => false, 
		'description' => 'Mirva Portfolio Post Type.', 
		'supports' => array( 'title', 'author', 'thumbnail' ), 
		'public' => true, 
		'show_ui' => true, 
		'show_in_menu' => true, 
		'menu_position' => 5, 
		'show_in_nav_menus' => true, 
		'publicly_queryable' => true, 
		'exclude_from_search' => true, 
		'has_archive' => true, 
		'query_var' => true, 
		'can_export' => true, 
		'rewrite' => array('slug' => 'portfolio'), 
		'capability_type' => 'post'
	); 
	register_post_type( 'mirva_portfolio', $args );
}

// Custom Portfolio Columns
add_filter('manage_edit-mirva_portfolio_columns', 'mirva_add_new_columns');
add_action('manage_posts_custom_column', 'mirva_manage_columns', 10, 2);
function mirva_add_new_columns($portfolio_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['artworkimages'] = __('Thumbnail', 'mirva');
	$new_columns['title'] = __('Title', 'mirva');
	$new_columns['author'] = __('Artist', 'mirva');
	$new_columns['date'] = _x('Date', 'column name');
	return $new_columns;
}

function mirva_manage_columns($column_name, $id) {
	global $wpdb;
	switch ($column_name) {
    case 'artworkimages':
        if( function_exists('the_post_thumbnail') )
            echo the_post_thumbnail( 'admin-list-thumb' );
        else
            echo __('Not supported in this theme', 'mirva' );
        break;
    }
}

?>