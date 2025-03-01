<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Ova_Tema_Customize' )){

	class Ova_Tema_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'ova_team_customize_register' ) );
		}

		public function ova_team_customize_register($wp_customize) {

			$this->ova_team_init( $wp_customize );

			do_action( 'ova_team_customize_register', $wp_customize );
		}


		/* Team */
		public function ova_team_init( $wp_customize ){

			$wp_customize->add_section( 'ova_team_section' , array(
				'title'      => esc_html__( 'Team', 'ova-team' ),
				'priority'   => 5,
			) );

			
			$wp_customize->add_setting( 'ova_team_total_record', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => '6',
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 	  
			) );
			
			$wp_customize->add_control('ova_team_total_record', array(
				'label' => esc_html__('Number of posts per page','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'ova_team_total_record',
				'type' =>'number'
			));

			$wp_customize->add_setting( 'ova_team_template', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => 'template1',
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
			) );
			
			$wp_customize->add_control('ova_team_template', array(
				'label' => esc_html__('Template','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'ova_team_template',
				'type' =>'select',
				'choices' => array(
					'template1'     => esc_html__( 'Template 1', 'ova-team' ),
					'template2' 	=> esc_html__( 'Template 2', 'ova-team' ),
					'template3'     => esc_html__( 'Template 3', 'ova-team' ),
				)
			));

			$wp_customize->add_setting( 'ova_team_layout', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => 'three_column',
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name   
			) );

			$wp_customize->add_control('ova_team_layout', array(
				'label' => esc_html__('Layout','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'ova_team_layout',
				'type' =>'select',
				'choices' => array(
					'two_column'     => esc_html__( '2 column', 'ova-team' ),
					'three_column'	 => esc_html__( '3 column', 'ova-team' ),
					'four_column'    => esc_html__( '4 column', 'ova-team' ),
				)
			));	

			$wp_customize->add_setting( 'header_archive_team', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );

			$wp_customize->add_control('header_archive_team', array(
				'label' => esc_html__('Header Archive','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'header_archive_team',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_header', '')
			));

			$wp_customize->add_setting( 'archive_footer_team', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );

			$wp_customize->add_control('archive_footer_team', array(
				'label' => esc_html__('Footer Archive','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'archive_footer_team',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_footer', '')
			));

			$wp_customize->add_setting( 'header_single_team', array(
			  	'type' => 'theme_mod', // or 'option'
			  	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name  
			) );

			$wp_customize->add_control('header_single_team', array(
				'label' => esc_html__('Header Single','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'header_single_team',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_header', '')
			));

			$wp_customize->add_setting( 'single_footer_team', array(
			  	'type' => 'theme_mod', // or 'option'
			 	'capability' => 'edit_theme_options',
			  	'theme_supports' => '', // Rarely needed.
			  	'default' => 'default',
			  	'transport' => 'refresh', // or postMessage
			  	'sanitize_callback' => 'sanitize_text_field' // Get function name   
			) );

			$wp_customize->add_control('single_footer_team', array(
				'label' => esc_html__('Footer Single','ova-team'),
				'section' => 'ova_team_section',
				'settings' => 'single_footer_team',
				'type' =>'select',
				'choices' => apply_filters('infetech_list_footer', '')
			));

		}

	}

}

new Ova_Tema_Customize();