<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAPROJECT_custom_post_type' ) ) {

	class OVAPROJECT_custom_post_type{

		public function __construct(){
			add_action( 'init', array( $this, 'OVAPROJECT_register_post_type_project' ) );
			add_action( 'init', array( $this, 'OVAPROJECT_register_taxonomy_project' ) );
		}

		
		function OVAPROJECT_register_post_type_project() {

			$taxonomies = array('cat_project');

			$labels = array(
				'name'                  => _x( 'Projects', 'Post Type General Name', 'ova-project' ),
				'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ova-project' ),
				'menu_name'             => __( 'Projects', 'ova-project' ),
				'name_admin_bar'        => __( 'Project', 'ova-project' ),
				'archives'              => __( 'Item Archives', 'ova-project' ),
				'attributes'            => __( 'Item Attributes', 'ova-project' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ova-project' ),
				'all_items'             => __( 'All Projects', 'ova-project' ),
				'add_new_item'          => __( 'Add New Project', 'ova-project' ),
				'add_new'               => __( 'Add New', 'ova-project' ),
				'new_item'              => __( 'New Item', 'ova-project' ),
				'edit_item'             => __( 'Edit Project', 'ova-project' ),
				'view_item'             => __( 'View Item', 'ova-project' ),
				'view_items'            => __( 'View Items', 'ova-project' ),
				'search_items'          => __( 'Search Item', 'ova-project' ),
				'not_found'             => __( 'Not found', 'ova-project' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ova-project' ),
			);

			$args = array(
				'description'         => __( 'Post Type Description', 'ova-project' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'taxonomies'          => $taxonomies,
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( 'project', 'URL slug', 'ova-project' ) ),
				'capability_type'     => 'post',
				'menu_icon'           => 'dashicons-portfolio'
			);
			
			register_post_type( 'project', $args );
		}

		function OVAPROJECT_register_taxonomy_project(){
			
			$labels = array(
				'name'                       => _x( 'Categories Project', 'Post Type General Name', 'ova-project' ),
				'singular_name'              => _x( 'Category Project', 'Post Type Singular Name', 'ova-project' ),
				'menu_name'                  => __( 'Categories', 'ova-project' ),
				'all_items'                  => __( 'All Category Project', 'ova-project' ),
				'parent_item'                => __( 'Parent Item', 'ova-project' ),
				'parent_item_colon'          => __( 'Parent Item:', 'ova-project' ),
				'new_item_name'              => __( 'New Item Name', 'ova-project' ),
				'add_new_item'               => __( 'Add New Category Project', 'ova-project' ),
				'add_new'                    => __( 'Add New Category Project', 'ova-project' ),
				'edit_item'                  => __( 'Edit Category Project', 'ova-project' ),
				'view_item'                  => __( 'View Item', 'ova-project' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'ova-project' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'ova-project' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ova-project' ),
				'popular_items'              => __( 'Popular Items', 'ova-project' ),
				'search_items'               => __( 'Search Items', 'ova-project' ),
				'not_found'                  => __( 'Not Found', 'ova-project' ),
				'no_terms'                   => __( 'No items', 'ova-project' ),
				'items_list'                 => __( 'Items list', 'ova-project' ),
				'items_list_navigation'      => __( 'Items list navigation', 'ova-project' ),

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
					'slug'       => _x( 'cat_project','Project Slug', 'ova-project' ),
					'with_front' => false,
					'feeds'      => true,
				),
			);
			register_taxonomy( 'cat_project', array( 'project' ), $args );
		}
	}

	new OVAPROJECT_custom_post_type();
}