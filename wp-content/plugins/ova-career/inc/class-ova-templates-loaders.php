<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVACAREER_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();


		if( is_tax( 'cat_career' ) ||  get_query_var( 'cat_career' ) != '' ){
			
			ovacareer_get_template( 'archive-career.php' );
			return false;
		}


		// Is Team Post Type
		if(  $post_type == 'career' ){

			if ( is_post_type_archive( 'career' ) ) { 

				ovacareer_get_template( 'archive-career.php' );
				return false;

			} else if ( is_single() ) {

				ovacareer_get_template( 'single-career.php' );
				return false;

			}
		}


		return $template;
	}
}

new OVACAREER_templates_loader();
