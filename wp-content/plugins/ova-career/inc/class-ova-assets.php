<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'OVACAREER_assets' ) ){
	class OVACAREER_assets{

		public function __construct(){

			/* Add JS, CSS for admin */
			add_action( 'admin_enqueue_scripts', array( $this, 'ovacareer_admin_enqueue_scripts' ), 10, 0 );
            
            /* Add JS, CSS for frontend */
			add_action( 'wp_enqueue_scripts', array( $this, 'ovacareer_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'ova_enqueue_scripts_elementor_career' ) );

		}

        public function ovacareer_admin_enqueue_scripts(){

        	// Map
			if ( get_theme_mod( 'ova_career_google_key_map', false ) ) {
				wp_enqueue_script( 'pw-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.get_theme_mod( 'ova_career_google_key_map', '' ).'&libraries=places', false, true );
			} else {
				wp_enqueue_script( 'pw-google-maps-api','https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places', array('jquery'), false, true );
			}	

			// Add JS
			wp_enqueue_script( 'script-admin-career', OVACAREER_PLUGIN_URI. 'assets/js/script-admin.js', [ 'jquery' ], false, true );	

			// Init Css
			wp_enqueue_style( 'career-admin-style', OVACAREER_PLUGIN_URI.'assets/css/admin-style.css' );
		}

		public function ovacareer_enqueue_scripts(){

			// Map
			if ( get_theme_mod( 'ova_career_google_key_map', false ) ) {
				wp_enqueue_script( 'pw-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.get_theme_mod( 'ova_career_google_key_map', '' ).'&libraries=places', false, true );
			} else {
				wp_enqueue_script( 'pw-google-maps-api','https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places', array('jquery'), false, true );
			}	

			// Add JS
			wp_enqueue_script( 'script-career', OVACAREER_PLUGIN_URI. 'assets/js/script.js', [ 'jquery' ], false, true );

			// Init Css
			wp_enqueue_style( 'career-style', OVACAREER_PLUGIN_URI.'assets/css/style.css' );	

		}

		// Add JS for elementor
		public function ova_enqueue_scripts_elementor_career(){
			wp_enqueue_script( 'script-elementor-career', OVACAREER_PLUGIN_URI. 'assets/js/script-elementor.js', [ 'jquery' ], false, true );
		}


	}
	new OVACAREER_assets();
}