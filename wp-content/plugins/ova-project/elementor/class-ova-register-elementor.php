<?php

namespace ova_project_elementor;

use ova_project_elementor\widgets\ova_project;
use ova_project_elementor\widgets\ova_project_slider;
use ova_project_elementor\widgets\ova_project_slider2;
use ova_project_elementor\widgets\ova_project_slider3;
use ova_project_elementor\widgets\ova_project_slider4;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Ova_Project_Register_Elementor {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {

	     // Register Ovatheme Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'add_ovatheme_category' ) );
		
		add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );

	}

	
	public function add_ovatheme_category(  ) {

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'project',
	        [
	            'title' => esc_html__( 'Project', 'ova-project' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	}


	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {

		require OVAPROJECT_PLUGIN_PATH . 'elementor/widgets/ova_project.php';
		require OVAPROJECT_PLUGIN_PATH . 'elementor/widgets/ova_project_slider.php';
		require OVAPROJECT_PLUGIN_PATH . 'elementor/widgets/ova_project_slider2.php';
		require OVAPROJECT_PLUGIN_PATH . 'elementor/widgets/ova_project_slider3.php';
		require OVAPROJECT_PLUGIN_PATH . 'elementor/widgets/ova_project_slider4.php';

	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register( new ova_project() );
		\Elementor\Plugin::instance()->widgets_manager->register( new ova_project_slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new ova_project_slider2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new ova_project_slider3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new ova_project_slider4() );

	}
	    
	

}

new Ova_Project_Register_Elementor();