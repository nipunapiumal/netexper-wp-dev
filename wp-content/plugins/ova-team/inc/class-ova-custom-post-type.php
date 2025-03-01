<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVATEAM_custom_post_type' ) ) {

	class OVATEAM_custom_post_type{

		public function __construct(){
			add_action( 'init', array( $this, 'OVATEAM_register_post_type_team' ) );
			add_action( 'init', array( $this, 'OVATEAM_register_taxonomy_team' ) );
		}

		
		function OVATEAM_register_post_type_team() {

			$taxonomies = array('cat_team');

			$labels = array(
				'name'                  => _x( 'Teams', 'Post Type General Name', 'ova-team' ),
				'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'ova-team' ),
				'menu_name'             => __( 'Teams', 'ova-team' ),
				'name_admin_bar'        => __( 'Team', 'ova-team' ),
				'archives'              => __( 'Item Archives', 'ova-team' ),
				'attributes'            => __( 'Item Attributes', 'ova-team' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ova-team' ),
				'all_items'             => __( 'All Teams', 'ova-team' ),
				'add_new_item'          => __( 'Add New Team', 'ova-team' ),
				'add_new'               => __( 'Add New', 'ova-team' ),
				'new_item'              => __( 'New Item', 'ova-team' ),
				'edit_item'             => __( 'Edit Team', 'ova-team' ),
				'view_item'             => __( 'View Item', 'ova-team' ),
				'view_items'            => __( 'View Items', 'ova-team' ),
				'search_items'          => __( 'Search Item', 'ova-team' ),
				'not_found'             => __( 'Not found', 'ova-team' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ova-team' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'ova-team' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
				'taxonomies'          => $taxonomies,
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( 'team', 'URL slug', 'ova-team' ) ),
				'capability_type'     => 'post',
				'menu_icon'           => 'dashicons-groups'
			);
			register_post_type( 'team', $args );
		}

		function OVATEAM_register_taxonomy_team(){
			
			$labels = array(
				'name'                       => _x( 'Categories Team', 'Post Type General Name', 'ova-team' ),
				'singular_name'              => _x( 'Category Team', 'Post Type Singular Name', 'ova-team' ),
				'menu_name'                  => __( 'Categories', 'ova-team' ),
				'all_items'                  => __( 'All Category Team', 'ova-team' ),
				'parent_item'                => __( 'Parent Item', 'ova-team' ),
				'parent_item_colon'          => __( 'Parent Item:', 'ova-team' ),
				'new_item_name'              => __( 'New Item Name', 'ova-team' ),
				'add_new_item'               => __( 'Add New Category Team', 'ova-team' ),
				'add_new'                    => __( 'Add New Category Team', 'ova-team' ),
				'edit_item'                  => __( 'Edit Category Team', 'ova-team' ),
				'view_item'                  => __( 'View Item', 'ova-team' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'ova-team' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'ova-team' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ova-team' ),
				'popular_items'              => __( 'Popular Items', 'ova-team' ),
				'search_items'               => __( 'Search Items', 'ova-team' ),
				'not_found'                  => __( 'Not Found', 'ova-team' ),
				'no_terms'                   => __( 'No items', 'ova-team' ),
				'items_list'                 => __( 'Items list', 'ova-team' ),
				'items_list_navigation'      => __( 'Items list navigation', 'ova-team' ),

			);
			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'publicly_queryable' => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => false,
				'rewrite'            => array(
					'slug'       => _x( 'cat_team','Team Slug', 'ova-team' ),
					'with_front' => false,
					'feeds'      => true,
				),
			);
			register_taxonomy( 'cat_team', array( 'team' ), $args );
		}
	}

	new OVATEAM_custom_post_type();
}