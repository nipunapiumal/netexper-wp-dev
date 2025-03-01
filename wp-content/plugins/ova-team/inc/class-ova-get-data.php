<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'pre_get_posts', 'ovateam_post_per_page_archive' );

function ovateam_post_per_page_archive( $query ) {

	if ( ( is_post_type_archive( 'team' )  && !is_admin() )  || ( is_tax('cat_team') && !is_admin() ) ) {

		if( $query->is_post_type_archive( 'team' ) || $query->is_tax('cat_team') ) {
			$query->set('post_type', array( 'team' ) );
			$query->set('posts_per_page', get_theme_mod( 'ova_team_total_record', 8 ) );
			$query->set('orderby', 'ID' );
            $query->set('order', 'ASC' );
		}
	}
}


function ovateam_get_data_team_el( $args ){

	$category = $args['category'];

	if( $category == 'all' ){
		$args_new = array(
			'post_type' => 'team',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
		);
	} else {
		$args_new = array(
			'post_type' => 'team',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_team',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_team_order = [];
	if( $args['orderby_post'] === 'ova_team_met_order_team' ) {
		$args_team_order = [
			'meta_key'   => $args['orderby_post'],
			'orderby'    => 'meta_value_num',
			'meta_type' => 'NUMERIC',
			'order'   => $args['order'],
		];
	} else { 
		$args_team_order = [
			'orderby' => $args['orderby_post'],
			'order'   => $args['order'],
		];
	}

	$args_team = array_merge( $args_new, $args_team_order );

	$teams  = new \WP_Query($args_team);

	return $teams;

}