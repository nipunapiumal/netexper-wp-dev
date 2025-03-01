<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'pre_get_posts', 'ovaproject_post_per_page_archive' );

function ovaproject_post_per_page_archive( $query ) {

	if ( ( is_post_type_archive( 'project' )  && !is_admin() )  || ( is_tax('cat_project') && !is_admin() ) ) {

		if( $query->is_post_type_archive( 'project' ) || $query->is_tax('cat_project') ) {
			$query->set('post_type', array( 'project' ) );
			$query->set('posts_per_page', get_theme_mod( 'ova_project_total_record', 8 ) );
			$query->set('orderby', 'meta_value_num' );
            $query->set('order', 'ASC' );
            $query->set('meta_type', 'NUMERIC' );
            $query->set('meta_key', 'ova_project_order_project' );
		}
	}
}


function ovaproject_get_data_project_el( $args ){

	$category = $args['category'];

	if( $category == 'all' ){
		$args_new = array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
		);
	} else {
		$args_new = array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_project',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_project_order = [];
	if( $args['orderby_post'] === 'ova_project_order_project' ) {
		$args_project_order = [
			'meta_key'   => $args['orderby_post'],
			'orderby'    => 'meta_value_num',
			'meta_type'  => 'NUMERIC',
			'order'   	 => $args['order'],
		];
	} else { 
		$args_project_order = [
			'orderby' => $args['orderby_post'],
			'order'   => $args['order'],
		];
	}

	$args_project 	= array_merge( $args_new, $args_project_order );

	$projects  		= new \WP_Query($args_project);

	return $projects;

}


function ovaproject_get_data_project_slider_el( $args ){

	$category = $args['category'];

	if( $category == 'all' ){
		$args_new	= array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
		);
	} else {
		$args_new	= array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_project',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_project_order = [];
	if( $args['orderby_post'] === 'ova_project_order_project' ) {
		$args_project_order = [
			'meta_key'   => $args['orderby_post'],
			'orderby'    => 'meta_value_num',
			'meta_type'  => 'NUMERIC',
			'order'   	 => $args['order'],
		];
	} else { 
		$args_project_order = [
			'orderby'  => $args['orderby_post'],
			'order'    => $args['order'],
		];
	}

	$args_project 	= array_merge( $args_new, $args_project_order );

	$projects  		= new \WP_Query($args_project);

	return $projects;

}


function ovaproject_get_data_project_slider_2_el( $args ){

	$category = $args['category'];

	
	if( $category == 'all' ){
		$args_new = array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
		);
	} else {
		$args_new = array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'posts_per_page' => $args['total_count'],
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_project',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_project_order = [];
	if( $args['orderby_post'] === 'ova_project_order_project' ) {
		$args_project_order = [
			'meta_key'   => $args['orderby_post'],
			'orderby'    => 'meta_value_num',
			'meta_type'  => 'NUMERIC',
			'order'      => $args['order'],
		];
	} else { 
		$args_project_order = [
			'orderby'  => $args['orderby_post'],
			'order'    => $args['order'],
		];
	}

	$args_project 	= array_merge( $args_new, $args_project_order );

	$projects  		= new \WP_Query($args_project);

	return $projects;
}