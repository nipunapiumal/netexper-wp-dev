<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class OVATEAM_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();


		if( is_tax( 'cat_team' ) ||  get_query_var( 'cat_team' ) != '' ){
			ovateam_get_template( 'archive-team.php' );
			return false;
		}


		// Is Team Post Type
		if(  $post_type == 'team' ){

			if ( is_post_type_archive( 'team' ) ) { 

				ovateam_get_template( 'archive-team.php' );
				return false;

			} else if ( is_single() ) {

				ovateam_get_template( 'single-team.php' );
				return false;

			}
		}

		if ( $post_type !== 'team' ){
			return $template;
		}
	}
}

new OVATEAM_templates_loader();