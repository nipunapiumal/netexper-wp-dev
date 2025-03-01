<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVACAREER_custom_post_type' ) ) {

	class OVACAREER_custom_post_type{

		public function __construct(){
			add_action( 'init', array( $this, 'OVACAREER_register_post_type_ova_career' ) );
			add_action( 'init', array( $this, 'OVACAREER_register_taxonomy_ova_career' ) );

			 // add icon for cat career
	        add_action('cat_career_add_form_fields', array( $this, 'add_cat_career_class_icon' ) );
	        add_action('cat_career_edit_form_fields', array( $this, 'edit_cat_career_class_icon' ) );
	        add_action('created_term', array( $this, 'save_cat_career_class_icon' ), 10, 3);
	        add_action('edited_term', array( $this, 'save_cat_career_class_icon' ), 10, 3);
		}

		
		function OVACAREER_register_post_type_ova_career() {

			$taxonomies = array('cat_career');

			$labels = array(
				'name'                  => _x( 'Career', 'Post Type General Name', 'ova-career' ),
				'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'ova-career' ),
				'menu_name'             => __( 'Career', 'ova-career' ),
				'name_admin_bar'        => __( 'Career', 'ova-career' ),
				'archives'              => __( 'Item Archives', 'ova-career' ),
				'attributes'            => __( 'Item Attributes', 'ova-career' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ova-career' ),
				'all_items'             => __( 'All Career', 'ova-career' ),
				'add_new_item'          => __( 'Add New Career', 'ova-career' ),
				'add_new'               => __( 'Add New', 'ova-career' ),
				'new_item'              => __( 'New Item', 'ova-career' ),
				'edit_item'             => __( 'Edit Career', 'ova-career' ),
				'view_item'             => __( 'View Item', 'ova-career' ),
				'view_items'            => __( 'View Items', 'ova-career' ),
				'search_items'          => __( 'Search Item', 'ova-career' ),
				'not_found'             => __( 'Not found', 'ova-career' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ova-career' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'ova-career' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' ),
				'taxonomies'          => $taxonomies,
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_rest' 		  => true,
				'menu_position'       => 20,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( 'career', 'URL slug', 'ova-career' ) ),
				'capability_type'     => 'post',
				'menu_icon'    		  => 'dashicons-editor-paste-word'
			);
			register_post_type( 'career', $args );
		}

		function OVACAREER_register_taxonomy_ova_career(){
			

			$labels = array(
				'name'                       => _x( 'Categories Career', 'Post Type General Name', 'ova-career' ),
				'singular_name'              => _x( 'Category Career', 'Post Type Singular Name', 'ova-career' ),
				'menu_name'                  => __( 'Categories', 'ova-career' ),
				'all_items'                  => __( 'All Category Career', 'ova-career' ),
				'parent_item'                => __( 'Parent Item', 'ova-career' ),
				'parent_item_colon'          => __( 'Parent Item:', 'ova-career' ),
				'new_item_name'              => __( 'New Item Name', 'ova-career' ),
				'add_new_item'               => __( 'Add New Category', 'ova-career' ),
				'add_new'                    => __( 'Add New Category', 'ova-career' ),
				'edit_item'                  => __( 'Edit Category', 'ova-career' ),
				'view_item'                  => __( 'View Item', 'ova-career' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'ova-career' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'ova-career' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ova-career' ),
				'popular_items'              => __( 'Popular Items', 'ova-career' ),
				'search_items'               => __( 'Search Items', 'ova-career' ),
				'not_found'                  => __( 'Not Found', 'ova-career' ),
				'no_terms'                   => __( 'No items', 'ova-career' ),
				'items_list'                 => __( 'Items list', 'ova-career' ),
				'items_list_navigation'      => __( 'Items list navigation', 'ova-career' ),

			);
			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'publicly_queryable' => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_in_rest' 		=> true,
				'show_tagcloud'     => false,
				'rewrite'            => array(
					'slug'       => _x( 'cat_career', 'Career Slug', 'ova-career' ),
					'with_front' => false,
					'feeds'      => true,
				),
			);
			register_taxonomy( 'cat_career', array( 'career' ), $args );
		}

		function add_cat_career_class_icon(){
		    ?>
		    <div class="form-field">
				<label><?php esc_html_e( 'Class Icon', 'ova-career' ); ?></label>
				<input type="text" id="cat_career_class_icon" name="cat_career_class_icon" value="" />
				<div class="clear"></div>
			</div>
		    <?php
		}

		function edit_cat_career_class_icon($term) {
		    $class_icon = get_term_meta( $term->term_id, 'class_icon', true );
		?>

			<tr class="form-field">
				<th scope="row" valign="top"><label><?php esc_html_e( 'Class Icon', 'ova-career' ); ?></label></th>
				<td>
					<input type="text" id="cat_career_class_icon" name="cat_career_class_icon" value="<?php echo esc_attr( $class_icon ); ?>" />
					<div class="clear"></div>
				</td>
			</tr>
		   
			<?php 
		}

		function save_cat_career_class_icon($term_id, $tt_id = '', $taxonomy = '') {
		    if ( isset( $_POST['cat_career_class_icon'] ) && 'cat_career' === $taxonomy ) { // WPCS: CSRF ok, input var ok.
				update_term_meta( $term_id, 'class_icon', $_POST['cat_career_class_icon'] ) ; // WPCS: CSRF ok, input var ok.
			}
		}
			
	}

	new OVACAREER_custom_post_type();
}