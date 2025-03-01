<?php
/*
Plugin Name: Ovatheme Project
Plugin URI: https://themeforest.net/user/ovatheme
Description: Project
Author: Ovatheme
Version: 1.0.8
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ova-project
Domain Path: /languages/
*/

if ( !defined( 'ABSPATH' ) ) exit();


if (!class_exists('OvaProject')) {
	
	class OvaProject{
		

		function __construct()
		{
			$this -> define_constants();
			$this -> includes();
			$this -> supports();
		}

		function define_constants(){

			if (!defined('OVAPROJECT_PLUGIN_FILE')) {
                define( 'OVAPROJECT_PLUGIN_FILE', __FILE__ );   
            }

            if (!defined('OVAPROJECT_PLUGIN_URI')) {
                define( 'OVAPROJECT_PLUGIN_URI', plugin_dir_url( __FILE__ ) );   
            }

            if (!defined('OVAPROJECT_PLUGIN_PATH')) {
                define( 'OVAPROJECT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   
            }
			
			
			load_plugin_textdomain( 'ova-project', false, basename( dirname( __FILE__ ) ) .'/languages' );
		}

		
		

		function includes() {

			// inc
			require_once( OVAPROJECT_PLUGIN_PATH.'inc/class-ova-custom-post-type.php' );

			require_once( OVAPROJECT_PLUGIN_PATH.'inc/class-ova-get-data.php' );

			require_once( OVAPROJECT_PLUGIN_PATH.'inc/ova-core-functions.php' );
			
			require_once( OVAPROJECT_PLUGIN_PATH.'inc/class-ova-templates-loaders.php' );

			require_once( OVAPROJECT_PLUGIN_PATH.'inc/class-ova-assets.php' );


			// admin
			require_once( OVAPROJECT_PLUGIN_PATH.'admin/class-ova-metabox.php' );

			/* Customize */
			require_once OVAPROJECT_PLUGIN_PATH.'/inc/class-customize.php';

		}


		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVAPROJECT_PLUGIN_PATH.'elementor/class-ova-register-elementor.php';
			}

		}

	}
}


return new OvaProject();