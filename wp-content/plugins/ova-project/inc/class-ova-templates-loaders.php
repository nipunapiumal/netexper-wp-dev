<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVAPROJECT_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();

		if( is_tax( 'cat_project' ) ||  get_query_var( 'cat_project' ) != '' ){
			
			ovaproject_get_template( 'archive-project.php' );
			return false;
		}


		// Is Project Post Type
		if(  $post_type == 'project' ){

			if ( is_post_type_archive( 'project' ) ) { 

				ovaproject_get_template( 'archive-project.php' );
				return false;

			} else if ( is_single() ) {

				ovaproject_get_template( 'single-project.php' );
				return false;

			}
		}

		if ( $post_type !== 'project' ){
			return $template;
		}
	}
}

new OVAPROJECT_templates_loader();
