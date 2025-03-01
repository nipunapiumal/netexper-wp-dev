<?php
/*
Plugin Name: Ovatheme Career
Plugin URI: https://themeforest.net/user/ovatheme
Description: Career
Author: Ovatheme
Version: 1.0.2
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ova-career
Domain Path: /languages/
*/

if ( !defined( 'ABSPATH' ) ) exit();


if (!class_exists('OvaCAREER')) {
	
	class OvaCAREER {

		function __construct(){

			if (!defined('OVACAREER_PLUGIN_FILE')) {
                define( 'OVACAREER_PLUGIN_FILE', __FILE__ );   
            }

            if (!defined('OVACAREER_PLUGIN_URI')) {
                define( 'OVACAREER_PLUGIN_URI', plugin_dir_url( __FILE__ ) );   
            }

            if (!defined('OVACAREER_PLUGIN_PATH')) {
                define( 'OVACAREER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   
            }

			

			load_plugin_textdomain( 'ova-career', false, basename( dirname( __FILE__ ) ) .'/languages' );

			$this -> includes();
			$this -> supports();
		}	

		
		function includes() {

			// inc
			require_once( OVACAREER_PLUGIN_PATH.'inc/class-ova-custom-post-type.php' );

			require_once( OVACAREER_PLUGIN_PATH.'inc/class-ova-get-data.php' );

			require_once( OVACAREER_PLUGIN_PATH.'inc/ova-core-functions.php' );
			
			require_once( OVACAREER_PLUGIN_PATH.'inc/class-ova-templates-loaders.php' );

			require_once( OVACAREER_PLUGIN_PATH.'inc/class-ova-assets.php' );

			// admin
			require_once( OVACAREER_PLUGIN_PATH.'admin/class-ova-metabox.php' );
			require_once( OVACAREER_PLUGIN_PATH.'admin/class-cmb2-field-map.php' );


			/* Customize */
			require_once OVACAREER_PLUGIN_PATH.'/inc/class-customize.php';
			

		}


		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVACAREER_PLUGIN_PATH.'elementor/class-ova-register-elementor.php';
			}

		}

	}
}


return new OvaCAREER();