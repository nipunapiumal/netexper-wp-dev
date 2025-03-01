<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'pre_get_posts', 'ova_career_post_per_page_archive' );
function ova_career_post_per_page_archive( $query ) {
	if ( ( is_post_type_archive( 'career' )  && !is_admin() )  || ( is_tax('cat_career') && !is_admin() ) ) {
		if( $query->is_post_type_archive( 'career' ) || $query->is_tax('cat_career') ) {
			$query->set('post_type', array( 'career' ) );
			$query->set('posts_per_page', get_theme_mod( 'ova_career_total_record', 8 ) );
			$query->set('orderby', 'meta_value_num' );
            $query->set('order', 'ASC' );
            $query->set('meta_type', 'NUMERIC' );
            $query->set('meta_key', 'ova_career_met_order_career' );
		}
	}
}

// Get Career data elementor
function ova_career_get_data_el( $args ){

	$category 	 = $args['category'];
	$total_count = $args['total_count'];

	if( $category == 'all' ){
		$args_new = array(
			'post_type' => 'career',
			'post_status' => 'publish',
			'posts_per_page' => $total_count,
		);
	} else {
		$args_new= array(
			'post_type' => 'career',
			'post_status' => 'publish',
			'posts_per_page' => $total_count,
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_career',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_career_order = [];
	if( $args['orderby'] === 'ova_career_met_order_career' ) {
		$args_career_order = [
			'meta_key'  => $args['orderby'],
			'orderby'   => 'meta_value_num',
			'meta_type' => 'NUMERIC',
			'order'   	=> $args['order'],
		];
	} else { 
		$args_career_order = [
			'orderby' => $args['orderby'],
			'order'	  => $args['order'],
		];
	}

	$args_career = array_merge( $args_new, $args_career_order );

	$careers  = new \WP_Query($args_career);

	return $careers;

}