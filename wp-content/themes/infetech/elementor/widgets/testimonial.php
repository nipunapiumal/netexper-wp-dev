<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Testimonial extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return ['infetech-elementor-testimonial'];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
			]
		);

		    $this->add_control(
				'template',
				[
					'label' => esc_html__( 'Template', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'template1',
					'options' => [
						'template1' => esc_html__('Template 1', 'infetech'),
						'template2' => esc_html__('Template 2', 'infetech'),
						'template3' => esc_html__('Template 3', 'infetech'),
						'template4' => esc_html__('Template 4', 'infetech'),
					]
				]
			);

			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,

					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'infetech' ),
					]
				);

				$this->add_control(
					'tab_item',
					[
						'label'       => esc_html__( 'Items Testimonial', 'infetech' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Mike Hardson', 'infetech'),
								'job' => esc_html__('Senior Designer', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s refresing to get such a personal touch. Duis aute lorem ipsum is simply free text reprehen.', 'infetech'),
							],
							[
								'name_author' => esc_html__('Aleesha Smith', 'infetech'),
								'job' => esc_html__('Senior Designer', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s refresing to get such a personal touch. Duis aute lorem ipsum is simply free text reprehen.', 'infetech'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'infetech'),
								'job' => esc_html__('Governer Of Canada', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s refresing to get such a personal touch. Duis aute lorem ipsum is simply free text reprehen.', 'infetech'),
							],
						],
						'title_field' => '{{{ name_author }}}',
					]
				);

			$this->add_control(
				'bg_image',
				[
					'label'   => esc_html__( 'Background Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'condition' => [
						'template' => 'template1'
					]
				]
			);
			
		$this->end_controls_section();

		/*****************  END SECTION CONTENT ******************/


		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'infetech' ),
			]
		);

			$this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 100,
					'condition'	  =>[
						'template' =>['template1','template2'],
					],
				]
				
			);

			$this->add_control(
				'margin_items_v2',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 60,
					'condition'	  =>[
						'template' =>'template3',
					],
				]
				
			);

			$this->add_control(
				'margin_items_v3',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 0,
					'condition'	  =>[
						'template' =>'template4',
					],
				]
				
			); 

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 2,
					'condition'	  =>[
						'template' =>['template1','template2'],
					],
				]
			);

			$this->add_control(
				'item_number_v2',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 1,
					'condition'	  =>[
						'template' =>'template3',
					],
				]
			);

			$this->add_control(
				'item_number_v3',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 3,
					'condition'	  =>[
						'template' =>'template4',
					],
				]
			);

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'infetech' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);


			$this->add_control(
				'infinite',
				[
					'label'   => esc_html__( 'Infinite Loop', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => esc_html__( 'Autoplay', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => esc_html__( 'Autoplay Speed', 'infetech' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => esc_html__( 'Smart Speed', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
					'condition' =>[
						'template' => ['template3','template4'],
					]
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
					'condition' =>[
						'template!' => ['template3','template4'],
					]
				]
			);

			$this->add_control(
				'dot_control_v2',
				[
					'label'   => esc_html__( 'Show Dots', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
					'condition' =>[
						'template' => ['template3','template4']
					]
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		/*************  SECTION General. *******************/
		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__( 'General', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);



            $this->add_control(
				'star_heading',
				[
					'label'     => esc_html__( 'Star', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
				]
			);

				$this->add_control(
					'star_color',
					[
						'label'     => esc_html__( 'Color', 'infetech' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .icon-quote i' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_responsive_control(
					'star_margin',
					[
						'label'      => esc_html__( 'Star Margin', 'infetech' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors'  => [
							'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .icon-quote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

		    $this->add_control(
				'linear_bgcolor_heading',
				[
					'label'     => esc_html__( 'Bar Background Gradient', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'template!' => ['template3','template4'],
					],
				]
			);

			    $this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_linear_client',
						'label' => esc_html__( 'Background', 'infetech' ),
						'types' => [ 'gradient' ],
						'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info',
						'condition' => [
							'template!' => ['template3','template4'],
						],
					]
				);

		    $this->add_control(
				'image_linear_bgcolor_heading',
				[
					'label'     => esc_html__( 'Image Background Gradient', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'template!' => ['template3','template4'],
					],

				]
			);

			    $this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_linear_image',
						'label' => esc_html__( 'Background', 'infetech' ),
						'types' => [ 'gradient' ],
						'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .client',
						'condition' => [
							'template!' => ['template3','template4'],
						],
					]
				);

			//version 3
			$this->add_control(
				'linear_version3_bgcolor_heading',
				[
					'label'     => esc_html__( 'Background Gradient', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'template' => 'template3',
					],
				]
			);

			    $this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_linear_client_version_3',
						'label' => esc_html__( 'Background', 'infetech' ),
						'types' => [ 'gradient' ],
						'selector' => '{{WRAPPER}} .ova-testimonial.ova-testimonial-template3 .slide-testimonials .item',
						'condition' => [
							'template' => 'template3',
						],
					]
				);

				$this->add_responsive_control(
					'general_version3__padding',
					[
						'label'      => esc_html__( 'Padding', 'infetech' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors'  => [
							'{{WRAPPER}} .ova-testimonial.ova-testimonial-template3 .slide-testimonials .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						'condition' => [
							'template' => 'template3',
						],
					]
				);

		$this->end_controls_section();
		###############  end section general  ###############

		/*************  SECTION NAME JOB AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name_job',
			[
				'label' => esc_html__( 'Author Name - Job', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_responsive_control(
				'name_job_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'name_job_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info' => 'background-color: {{VALUE}}!important;',
					],
					'condition' => [
						'template!' => ['template3','template4'],
					],
				]
			);

		    $this->add_control(
				'author_name_heading',
				[
					'label'     => esc_html__( 'Author Name', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .name',
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'job_heading',
				[
					'label'     => esc_html__( 'Job', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'template!' => 'template4'
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .job',
					'condition' => [
						'template!' => 'template4'
					],
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info .info .name-job .job' => 'color : {{VALUE}};',
					],
					'condition' => [
						'template!' => 'template4'
					],
				]
			);


		$this->end_controls_section();
		###############  end section name job author  ###############


		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info p.ova-evaluate',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info p.ova-evaluate' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'client_info_content_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template!' => 'template4',
					]
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_version_4',
					'label' => esc_html__( 'Border', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-testimonial.ova-testimonial-template4 .slide-testimonials .client-info',
					'condition' => [
						'template' => 'template4',
					]
				]
			);

			$this->add_control(
				'border_version_4_hover',
				[
					'label' 	=> esc_html__( 'Border Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.ova-testimonial-template4 .slide-testimonials .client-info:hover' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template4',
					]
				]
			);

			$this->add_control(
				'background_image_version_4',
				[
					'label'   => esc_html__( 'Background Default', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
					'condition' => [
						'template' => 'template4'
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_version_4',
					'types' => [ 'classic', 'video' ],
					'selector' => '{{WRAPPER}} .ova-testimonial.ova-testimonial-template4 .slide-testimonials .client-info',
					'condition' => [
						'template' => 'template4',
						'background_image_version_4!' => 'yes'
					]
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############

		/* Begin Dots Style */
		$this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__( 'Dots', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'dot_control' => 'yes',
				]
            ]
        );

            $this->add_responsive_control(
				'dots_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'dot_align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .owl-dots' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_dots_style' );
				
				$this->start_controls_tab(
		            'tab_dots_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'dot_color',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot span' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_responsive_control(
						'dots_width',
						[
							'label' 	=> esc_html__( 'Width', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height',
						[
							'label' 	=> esc_html__( 'Height', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_active',
		            [
		                'label' => esc_html__( 'Active', 'infetech' ),
		            ]
		        );

		             $this->add_control(
						'dot_color_active',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot.active span' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_responsive_control(
						'dots_width_active',
						[
							'label' 	=> esc_html__( 'Width', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height_active',
						[
							'label' 	=> esc_html__( 'Height', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot.active span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius_active',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .ova-testimonial .owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

        $this->end_controls_section();
        /* End Dots Style */

        	/* Begin Nav Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Nav Control', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => ['template3','template4'],
                	'nav_control' => 'yes',
                ]
            ]
        );
            
            $this->add_responsive_control(
				'size_nav_icon',
				[
					'label' 		=> esc_html__( 'Icon Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 30,
							'step' => 1,
						],
					],
					'selectors' => [
						'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button i, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_nav_style' );
				
				$this->start_controls_tab(
		            'tab_nav_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_nav_icon',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button i, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_nav_border',
						[
							'label' => esc_html__( 'Color Border', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button' => 'border-color : {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'nav_width',
						[
							'label' 	=> esc_html__( 'Width', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 20,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button' => 'height: {{SIZE}}{{UNIT}}; width:{{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'nav_right',
						[
							'label' 	=> esc_html__( 'Right', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 20,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav' => 'right: {{SIZE}}{{UNIT}}',
							],
							'condition' => [
								'template' => 'template3',
							]
						]
					);

					$this->add_responsive_control(
						'nav_bottom',
						[
							'label' 	=> esc_html__( 'Bottom', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 20,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav' => 'bottom: {{SIZE}}{{UNIT}}',
							],
							'condition' => [
								'template' => 'template3',
							]
						]
					);

					$this->add_responsive_control(
						'item_padding_version_4',
						[
							'label' 	=> esc_html__( 'Top', 'infetech' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-testimonial.ova-testimonial-template4 .slide-testimonials' => 'padding-top: {{SIZE}}{{UNIT}};margin-top: -{{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'template' => 'template4',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_nav_icon_hover',
						[
							'label' => esc_html__( 'Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button:hover i, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button:hover i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_nav_border_hover',
						[
							'label' => esc_html__( 'Color Border Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button:hover, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button:hover' => 'border-color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_nav_background_hover',
						[
							'label' => esc_html__( 'Background Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button:hover, .ova-testimonial.ova-testimonial-template4 .slide-testimonials .owl-nav button:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

            $this->add_responsive_control(
				'nav_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'.ova-testimonial.ova-testimonial-template3 .slide-testimonials .owl-nav button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
        /* End Nav Style */
	}

	protected function render() {

		$settings = $this->get_settings();
        
        $template     = $settings['template'];
		$tab_item     = $settings['tab_item'];
		$url_bg_image = $settings['bg_image']['url'];
		
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['rtl']				= is_rtl() ? true: false;
		$data_options['template']			= $template;

		if($template=='template2' || $template == 'template1'){

			$data_options['margin']     = $settings['margin_items'];
			$data_options['nav_left'] 	= 'fa-angle-left';
			$data_options['nav_right'] 	= 'fa-angle-right';
			$data_options['dots']       = $settings['dot_control'] === 'yes' ? true : false;
		}

		if($template=='template1' ){
			$data_options['items']      = $settings['item_number'];
		}

		if($template=='template2' ){
			$data_options['items']      = $settings['item_number_v2'];
		}

		if( $template == 'template3'){

			$data_options['items']      = $settings['item_number_v2'];
			$data_options['margin']     = $settings['margin_items_v2'];
			$data_options['nav']        = $settings['nav_control'] === 'yes' ? true : false;
			$data_options['dots']       = $settings['dot_control_v2'] === 'yes' ? true : false;
			$data_options['nav_left'] 	= ' ovaicon-back';
			$data_options['nav_right'] 	= ' ovaicon-next';

		}

		if( $template == 'template4'){
			$data_options['items']      = $settings['item_number_v3'];
			$data_options['margin']     = $settings['margin_items_v3'];
			$data_options['nav']        = $settings['nav_control'] === 'yes' ? true : false;
			$data_options['nav_left'] 	= ' ovaicon-back';
			$data_options['nav_right'] 	= ' ovaicon-next';
			$data_options['dots']       = $settings['dot_control_v2'] === 'yes' ? true : false;
		}
		?>

			<div class="ova-testimonial ova-testimonial-<?php echo esc_attr( $template ); ?>">

				<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ; ?>">
					<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
						<div class="item">
							<?php if($template == 'template4'){   ?>
								
								<?php if( $settings['background_image_version_4'] =='yes'){ ?>
									<div class="client-info background-default">
								<?php } else {?>
									<div class="client-info">
								<?php } ?>

							<?php } else { ?>
								<div class="client-info">
							<?php } ?>
                            <?php if( $template === 'template1' || $template == 'template3' ) :?>
								<div class="icon-quote">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
							<?php endif; ?>

								<?php if( $item['testimonial'] != '' && $template == 'template3' ) : ?>
									<p class="ova-evaluate">
										<?php echo esc_html($item['testimonial']) ; ?>
									</p>
								<?php endif; ?>

								<div class="info">
									<div class="client">
										<?php if( $item['image_author'] != '' ) { ?>
											<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','infetech' ); ?>
											<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
										<?php } ?>
									</div>

									<?php if($template == 'template4'){ ?>
										<div class="name-job">
											<?php if( $item['name_author'] != '' ) { ?>
												<p class="name second_font">
													<?php echo esc_html($item['name_author']) ; ?>
												</p>
											<?php } ?>
											<div class="icon-quote">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
										</div>

										<?php if( $item['testimonial'] != '' && $template == 'template4' ) : ?>
											<p class="ova-evaluate">
												<?php echo esc_html($item['testimonial']) ; ?>
											</p>
										<?php endif; ?>

									<?php } ?>

									<?php if($template =='template2' || $template=='template1' || $template=='template3'){ ?>
									<div class="name-job">
										<?php if( $item['name_author'] != '' ) { ?>
											<p class="name second_font">
												<?php echo esc_html($item['name_author']) ; ?>
											</p>
										<?php } ?>

										<?php if( $item['job'] != '' ) { ?>
											<p class="job">
												<?php echo esc_html($item['job'])  ; ?>
											</p>
										<?php } ?>

										<?php if( $template === 'template2' ) :?>
											<div class="icon-quote">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
										<?php endif; ?>
									</div>
									<?php } ?>
								</div><!-- end info -->

								<?php if($template == 'template1' || $template=='template2'){ ?>
								<?php if( $item['testimonial'] != '' ) : ?>
									<p class="ova-evaluate">
										<?php echo esc_html($item['testimonial']) ; ?>
									</p>
								<?php endif; }?>
								
								<?php if($template==='template1'){ ?>
									<div class="ova-bg-image"  style="background-image: url(<?php echo esc_attr( $url_bg_image );?>)"></div>
								<?php } ?>
							</div>
						</div>
		
					<?php endforeach; endif; ?>
				</div>

			</div>
		
		<?php
	}
	// end render
}

$widgets_manager->register( new Infetech_Elementor_Testimonial() );