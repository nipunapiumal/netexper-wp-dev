<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVAPROJECT_assets' ) ){
	class OVAPROJECT_assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovaproject_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_project' ) );
			
		}



		public function ovaproject_enqueue_scripts(){

			// Init Css
			wp_enqueue_style( 'project_style', OVAPROJECT_PLUGIN_URI.'assets/css/style.css' );			

		}

		// Add JS for elementor
		public function ova_enqueue_scripts_elementor_project(){
			wp_enqueue_script( 'script-elementor-project', OVAPROJECT_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}

	}

	new OVAPROJECT_assets();
}
