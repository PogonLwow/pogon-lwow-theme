<?php
function mecenasi() {

	$labels = array(
		'name'                => _x( 'Mecenasi', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Mecenas', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Mecenasi', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'Wszystkie', 'text_domain' ),
		'view_item'           => __( 'Zobacz mecenasa', 'text_domain' ),
		'add_new_item'        => __( 'Dodaj nowego mecenasa', 'text_domain' ),
		'add_new'             => __( 'Dodaj', 'text_domain' ),
		'edit_item'           => __( 'Edytuj mecenasa', 'text_domain' ),
		'update_item'         => __( 'Zaktualizuj mecenasa', 'text_domain' ),
		'search_items'        => __( 'Szukaj mecenasa', 'text_domain' ),
		'not_found'           => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'mecenasi', 'text_domain' ),
		'description'         => __( 'Mecenasi', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title'),
        'taxonomies'          => array(''),
        'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
        'menu_icon'           => 'dashicons-businessman',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'mecenasi', $args );
}

// Hook into the 'init' action
add_action( 'init', 'mecenasi', 0 );
 ?>
