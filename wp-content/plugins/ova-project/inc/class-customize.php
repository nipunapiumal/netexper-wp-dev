<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Ova_Project_Customize' )){

	class Ova_Project_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'ova_project_customize_register' ) );
		}

		public function ova_project_customize_register($wp_customize) {

			$this->ova_project_init( $wp_customize );

			do_action( 'ova_project_customize_register', $wp_customize );
		}


		/* Project */
		public function ova_project_init( $wp_customize ){

			$wp_customize->add_section( 'ova_project_section' , array(
				'title'      => esc_html__( 'Project', 'ova-project' ),
				'priority'   => 5,
			) );

			
			$wp_customize->add_setting( 'ova_project_total_record', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => '6',
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name   
			) );
			
			$wp_customize->add_control('ova_project_total_record', array(
				'label' => esc_html__('Number of posts per page','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'ova_project_total_record',
				'type' =>'number'
			));


			$wp_customize->add_setting( 'ova_project_layout', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => 'three_column',
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );

			$wp_customize->add_control('ova_project_layout', array(
				'label' => esc_html__('Layout','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'ova_project_layout',
				'type' =>'select',
				'choices' => array(
					'two_column'   => esc_html__( '2 column', 'ova-project' ),
					'three_column' => esc_html__( '3 column', 'ova-project' ),
					'four_column'  => esc_html__( '4 column', 'ova-project' ),
				)
			));

			$wp_customize->add_setting( 'header_archive_project', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );

			$wp_customize->add_control('header_archive_project', array(
				'label' => esc_html__('Header Archive','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'header_archive_project',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_header', '')
			));

			$wp_customize->add_setting( 'archive_footer_project', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );
			
			$wp_customize->add_control('archive_footer_project', array(
				'label' => esc_html__('Footer Archive','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'archive_footer_project',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_footer', '')
			));

			$wp_customize->add_setting( 'header_single_project', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name 
			) );

			$wp_customize->add_control('header_single_project', array(
				'label' => esc_html__('Header Single','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'header_single_project',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_header', '')
			));

			$wp_customize->add_setting( 'single_footer_project', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );

			$wp_customize->add_control('single_footer_project', array(
				'label' => esc_html__('Footer Single','ova-project'),
				'section' => 'ova_project_section',
				'settings' => 'single_footer_project',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_footer', '')
			));

		}

	}

}

new Ova_Project_Customize();