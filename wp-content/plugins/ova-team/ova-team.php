<?php
/*
Plugin Name: Ovatheme Team
Plugin URI: https://themeforest.net/user/ovatheme
Description: Team
Author: Ovatheme
Version: 1.0.8
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ova-team
Domain Path: /languages/
*/

if ( !defined( 'ABSPATH' ) ) exit();


if (!class_exists('OvaTeam')) {
	
	class OvaTeam{
		

		function __construct()
		{
			$this -> define_constants();
			$this -> includes();
			$this -> supports();
		}

		function define_constants(){

			if (!defined('OVATEAM_PLUGIN_FILE')) {
                define( 'OVATEAM_PLUGIN_FILE', __FILE__ );   
            }

            if (!defined('OVATEAM_PLUGIN_URI')) {
                define( 'OVATEAM_PLUGIN_URI', plugin_dir_url( __FILE__ ) );   
            }

            if (!defined('OVATEAM_PLUGIN_PATH')) {
                define( 'OVATEAM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   
            }
			
			
			load_plugin_textdomain( 'ova-team', false, basename( dirname( __FILE__ ) ) .'/languages' );
		}

		
		

		function includes() {

			// inc
			require_once( OVATEAM_PLUGIN_PATH.'inc/class-ova-custom-post-type.php' );

			require_once( OVATEAM_PLUGIN_PATH.'inc/class-ova-get-data.php' );

			require_once( OVATEAM_PLUGIN_PATH.'inc/ova-core-functions.php' );
			
			require_once( OVATEAM_PLUGIN_PATH.'inc/class-ova-templates-loaders.php' );

			require_once( OVATEAM_PLUGIN_PATH.'inc/class-ova-assets.php' );


			// admin
			require_once( OVATEAM_PLUGIN_PATH.'admin/class-ova-metabox.php' );

			/* Customize */
			require_once OVATEAM_PLUGIN_PATH.'/inc/class-customize.php';

		}


		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVATEAM_PLUGIN_PATH.'elementor/class-ova-register-elementor.php';
			}

		}

	}
}


return new OvaTeam();