<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVATEAM_assets' ) ){
	class OVATEAM_assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'ovateam_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_team' ) );
			
		}

		public function ovateam_enqueue_scripts(){

			// Init Css
			wp_enqueue_style( 'team_style', OVATEAM_PLUGIN_URI.'assets/css/style.css' );			

		}

		// Add JS for elementor
		public function ova_enqueue_scripts_elementor_team(){
			wp_enqueue_script( 'script-elementor-team', OVATEAM_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}

	}
	new OVATEAM_assets();
}
