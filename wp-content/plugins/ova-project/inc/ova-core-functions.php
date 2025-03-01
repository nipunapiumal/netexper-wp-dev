<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists( 'ovaproject_locate_template' ) ){
	function ovaproject_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		
		// Set variable to search in ovacoll-templates folder of theme.
		if ( ! $template_path ) :
			$template_path = 'ovaproject-templates/';
		endif;

		// Set default plugin templates path.
		if ( ! $default_path ) :
			$default_path = OVAPROJECT_PLUGIN_PATH . 'templates/'; // Path to the template folder
		endif;

		// Search template file in theme folder.
		$template = locate_template( array(
			$template_path . $template_name
			// $template_name
		) );

		// Get plugins template file.
		if ( ! $template ) :
			$template = $default_path . $template_name;
		endif;

		return apply_filters( 'ovaproject_locate_template', $template, $template_name, $template_path, $default_path );
	}

}


function ovaproject_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
	if ( is_array( $args ) && isset( $args ) ) :
		extract( $args );
	endif;
	$template_file = ovaproject_locate_template( $template_name, $tempate_path, $default_path );
	if ( ! file_exists( $template_file ) ) :
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
		return;
	endif;

	
	include $template_file;
}





add_filter( 'infetech_header_customize', 'infetech_header_customize_project', 10, 1 );
function infetech_header_customize_project( $header ){


	if( is_tax( 'cat_project' ) ||  get_query_var( 'cat_project' ) != '' || is_post_type_archive( 'project' ) ){

	  	$header = get_theme_mod( 'header_archive_project', 'default' );

	}else if( is_singular( 'project' ) ){

		$header = get_theme_mod( 'header_single_project', 'default' );
	}

	return $header;

}


add_filter( 'infetech_header_bg_customize', 'infetech_header_bg_customize_project', 10, 1 );
function infetech_header_bg_customize_project( $bg ){

	if( is_tax( 'cat_project' ) ||  get_query_var( 'cat_project' ) != '' || is_post_type_archive( 'project' ) ){

	  	$bg = get_theme_mod( 'archive_background_project', 'default' );

	}else if( is_singular( 'project' ) ){

		$bg = get_theme_mod( 'single_background_project', 'default' );

		$current_id = get_the_id();
        $header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );

        if( $header_bg_source ){
            $bg = $header_bg_source;
        }
	}


	return $bg;
}

add_filter( 'infetech_footer_customize', 'infetech_footer_customize_project', 10, 1 );
function infetech_footer_customize_project( $footer ){
    
   if( is_tax( 'cat_project' ) ||  get_query_var( 'cat_project' ) != '' || is_post_type_archive( 'project' ) ){

        $footer = get_theme_mod( 'archive_footer_project', '' );

    }else if( is_singular( 'project' ) ){

        $footer = get_theme_mod( 'single_footer_project', '' );
    }

    return $footer;

}
