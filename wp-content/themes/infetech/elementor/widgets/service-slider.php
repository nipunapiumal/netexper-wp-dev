<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Service_Slider extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_service_slider';
	}

	public function get_title() {
		return esc_html__( 'Service Slider', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-slider-3d';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.css' );
		wp_enqueue_style( 'slick-carousel-theme', get_template_directory_uri().'/assets/libs/slick/slick-theme.css' );
		wp_enqueue_script( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.min.js', array('jquery'), false, true );
		return [ 'infetech-elementor-service-slider' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
			]
		);	
			
			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'class_icon',
					[
						'label' 	=> esc_html__( 'Icon', 'infetech' ),
						'type' 		=> Controls_Manager::ICONS,
						'default' 	=> [
							'value' 	=> 'flaticon flaticon-server',
							'library' 	=> 'flaticon'
						]
					]
				);

				$repeater->add_control(
					'sub_title',
					[
						'label' => esc_html__( 'Sub Title', 'infetech' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Securityt System', 'infetech' )
					]
				);

				$repeater->add_control(
					'title',
					[
						'label' => esc_html__( 'Title', 'infetech' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Security System', 'infetech' )
					]
				);

				$repeater->add_control(
					'description',
					[
						'label' 	=> esc_html__( 'Description', 'infetech' ),
						'type' 		=> Controls_Manager::TEXTAREA,
						'default' 	=> esc_html__( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech' )
					]
				);

				$repeater->add_control(
					'link',
					[
						'label' => esc_html__( 'Link Button', 'infetech' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
						'default' => [
							'url' => '#',
						],
						'label_block' => true,
					]
				);

			$this->add_control(
				'tab_item',
				[
					'label' 	=> esc_html__( 'Items Testimonial', 'infetech' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields'  	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-research-and-development',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('Product Development', 'infetech'),
							'title' 		=> esc_html__('Product Development', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-technology',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('Digital Marketing', 'infetech'),
							'title' 		=> esc_html__('Digital Marketing', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-security-system-1',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('Security System', 'infetech'),
							'title' 		=> esc_html__('Security System', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-web-development',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('UI/UX Designing', 'infetech'),
							'title' 		=> esc_html__('UI/UX Designing', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-quality',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('Data Analysis', 'infetech'),
							'title' 		=> esc_html__('Data Analysis', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
						[
							'class_icon' 	=> [
								'value' 	=> 'flaticon-research-and-development',
								'library' 	=> 'flaticon'
							],
							'sub_title' 	=> esc_html__('Product Development', 'infetech'),
							'title' 		=> esc_html__('Product Development', 'infetech'),
							'description' 	=> esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even. Vestibulum non sollicitudin diam. Sed malesuada dolor ac sem ipsum ullamcorper.", 'infetech'),
							'link' 			=> [ 'url' => '#' ]
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image Active', 'infetech' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
				]
			);

			$this->add_control(
				'btn_text',
				[
					'label' => esc_html__( 'Button Text', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Learn More', 'infetech' ),
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'infetech' ),
			]
		);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 5,
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
					'default' => 300,
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_service_style',
			[
				'label' => esc_html__( 'Service', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'service_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-list .slick-track' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_items_style',
			[
				'label' => esc_html__( 'Items', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'items_background',
				[
					'label' => esc_html__( 'Background', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'items_background_active',
				[
					'label' => esc_html__( 'Background Active', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item .item-box' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'item_shadow',
					'label' => esc_html__( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box',
				]
			);

			$this->add_responsive_control(
				'items_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'items_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_options',
				[
					'label' => esc_html__( 'Icon Options', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'icon_typography',
						'selector' => '{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box i',
					]
				);

				$this->add_control(
					'icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box i' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'icon_color_active',
					[
						'label' => esc_html__( 'Icon Color Active', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item .item-box i' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'icon_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'title_options',
				[
					'label' => esc_html__( 'Title Options', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'title_typography',
						'selector' => '{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box .sub-title',
					]
				);

				$this->add_control(
					'title_color',
					[
						'label' => esc_html__( 'Title Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box .sub-title' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'title_color_active',
					[
						'label' => esc_html__( 'Title Color Active', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item .item-box .sub-title' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'title_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'bottom_arrow_option',
				[
					'label' => esc_html__( 'Bottom Arrow Options', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_control(
					'bottom_arrow_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item i.ovaicon-download' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'bottom_arrow_background',
					[
						'label' => esc_html__( 'Background', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current:before' => 'border-top-color: {{VALUE}}',
						],
					]
				);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider-content  .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'content_title_options',
				[
					'label' => esc_html__( 'Title Options', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'content_title_typography',
						'selector' => '{{WRAPPER}} .ova-services-slider .services-slider-content .content .content-title',
					]
				);

				$this->add_control(
					'content_title_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider-content .content .content-title' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'content_title_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider-content .content .content-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'content_description_options',
				[
					'label' => esc_html__( 'Description Options', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'content_description_typography',
						'selector' => '{{WRAPPER}} .ova-services-slider .services-slider-content .content .description',
					]
				);

				$this->add_control(
					'content_description_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider-content .content .description' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'content_description_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider-content .content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs(
				'style_tabs_btn'
			);

				$this->start_controls_tab(
					'style_normal_tab_btn',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'btn_background',
						[
							'label' => esc_html__( 'Background', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'btn_color',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'style_hover_tab_btn',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_control(
						'btn_background_hover',
						[
							'label' => esc_html__( 'Background', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn:before' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'btn_color_hover',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn:hover' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_responsive_control(
				'btn_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'btn_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider-content .content a.services-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_active',
			[
				'label' => esc_html__( 'Image Active', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_responsive_control(
				'image_opacity',
				[
					'label' 		=> esc_html__( 'Opacity', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1,
							'step' => 0.1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box img' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_width',
				[
					'label' 		=> esc_html__( 'Width', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
							'step' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 400,
							'step' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide .item .item-box img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'image_position_options',
				[
					'label' => esc_html__( 'Position', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			    $this->add_responsive_control(
					'image_top',
					[
						'label' 		=> esc_html__( 'Top', 'infetech' ),
						'type' 			=> Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'range' => [
							'px' => [
								'min' => -400,
								'max' => 400,
								'step' => 5,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item .item-box img' => 'top: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'image_right',
					[
						'label' 		=> esc_html__( 'Width', 'infetech' ),
						'type' 			=> Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'range' => [
							'px' => [
								'min' => -400,
								'max' => 400,
								'step' => 5,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-services-slider .services-slider .slick-slide.slick-current .item .item-box img' => 'right: {{SIZE}}{{UNIT}};',
						],
					]
				);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$tab_item = $settings['tab_item'];
		$btn_text = $settings['btn_text'];
		$img_url  = isset( $settings['image']['url'] ) ? $settings['image']['url'] : '';
		$img_alt  = isset( $settings['image']['alt'] ) ? $settings['image']['alt'] : '';
		

		$data_options['items']              = $settings['item_number'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];

		?>

		<div class="ova-services-slider">
			<div class="services-slider" data-options="<?php echo esc_attr( json_encode( $data_options ) ); ?>">
				<?php if ( !empty( $tab_item ) && is_array( $tab_item ) ): foreach ( $tab_item as $items ): ?>
					<div class="item">
						<div class="item-box">
							<i class="<?php echo esc_attr( $items['class_icon']['value'] ); ?>"></i>
							<h2 class="sub-title"><?php printf( $items['sub_title'] ); ?></h2>
							<?php if ( $img_url != '' ) : ?>
								<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
							<?php endif; ?>
						</div>
						<i aria-hidden="true" class="ovaicon ovaicon-download"></i>
					</div>
				<?php endforeach; endif; ?>
			</div>
			<div class="services-slider-content">
			<?php if ( !empty( $tab_item ) && is_array( $tab_item ) ): foreach ( $tab_item as $items ): 
				$link 	= ( isset( $items['link']['url'] ) && $items['link']['url'] ) ? $items['link']['url'] : '#';
				$target = ( isset( $items['is_external'] ) && $items['is_external'] !== '' ) ? ' target=_blank' : '';
			?>
				<div class="content">
					<h2 class="content-title"><?php printf( $items['title'] ); ?></h2>
					<p class="description"><?php echo esc_html( $items['description'] ); ?></p>
					<a class="services-btn" href="<?php echo esc_url( $items['link']['url'] ); ?>"<?php printf( $target ); ?> title="<?php echo esc_attr( $btn_text ); ?>">
						<span class="btn-text">
							<?php echo esc_html( $btn_text ); ?>
						</span>
					</a>
				</div>
			<?php endforeach; endif; ?>
			</div>
		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Service_Slider() );