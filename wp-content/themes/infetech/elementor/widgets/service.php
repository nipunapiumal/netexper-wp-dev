<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Service extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_service';
	}

	
	public function get_title() {
		return esc_html__( 'Service', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-image-bold';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-service' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Service', 'infetech' ),
			]
		);	

			// Add Class control
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

			$this->add_control(
				'class_main_icon',
				[
					'label' => esc_html__( 'Main Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon-infetech-recovery',
						'library' 	=> 'all',
					],
					'condition' => [
						'template' => 'template3'
					]
				]
			);

			$this->add_control(
				'image_service',
				[
					'label'   => esc_html__( 'Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-technology',
						'library' 	=> 'flaticon',
					],
				]
			);
				
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Perfect solutions that business demands', 'infetech' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'condition' => [
						'template' => ['template1' , 'template4'],
					]
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Title', 'infetech' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
					'show_label' => true,
				]
			);

			$this->add_control(
				'background_image_box',
				[
					'label'   => esc_html__( 'Box Background Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'condition' => [
						'template' => [
							'template4',
						]
					],
					'separator' => 'before'
				]
			);

		$this->end_controls_section();

		/* Begin image overlay hover template1 Style */
		$this->start_controls_section(
            'image_overlay_style',
            [
                'label' => esc_html__( 'Image Overlay', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'image_overlay_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .image-service:before' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'background_image_opacity',
				[
					'label' 		=> esc_html__( 'Opacity', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 0.6,
							'step' => 0.02,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .image-service:before' => 'opacity: {{SIZE}};',
					],
				]
			);

			// 2 Triangle Background 
	        $this->add_responsive_control(
	            'triangle1_tempalte2',
	            [
	                'label' 		=> esc_html__( 'Triangle1', 'infetech' ),
	                'type' 			=> Controls_Manager::HEADING,
	                'condition' => [
						'template' => 'template2'
					]
	            ]
	        );

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_triangle1',
						'label' => esc_html__( 'Background Triangle1', 'infetech' ),
						'types' => [ 'gradient' ],
						'selector' => '{{WRAPPER}} .ova-service-template2 .image-service .triangle-topleft-1',
						'condition' => [
							'template' => 'template2'
						]
					]
				);

				$this->add_responsive_control(
					'triangle1_opacity',
					[
						'label' 		=> esc_html__( 'Opacity', 'infetech' ),
						'type' 			=> Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1,
								'step' => 0.5,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-service-template2 .image-service .triangle-topleft-1' => 'opacity: {{SIZE}};',
						],
						'condition' => [
							'template' => 'template2'
						]
					]
				);

		     $this->add_responsive_control(
	            'triangle2_tempalte2',
	            [
	                'label' 		=> esc_html__( 'Triangle2', 'infetech' ),
	                'type' 			=> Controls_Manager::HEADING,
	                'condition' => [
						'template' => 'template2'
					]
	            ]
	        );

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_triangle2',
						'label' => esc_html__( 'Background Triangle2', 'infetech' ),
						'types' => [ 'gradient' ],
						'selector' => '{{WRAPPER}} .ova-service-template2 .image-service .triangle-topleft-2',
						'condition' => [
							'template' => 'template2'
						]
					]
				);

				$this->add_responsive_control(
					'triangle2_opacity',
					[
						'label' 		=> esc_html__( 'Opacity', 'infetech' ),
						'type' 			=> Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1,
								'step' => 0.5,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-service-template2 .image-service .triangle-topleft-2' => 'opacity: {{SIZE}};',
						],
						'condition' => [
							'template' => 'template2'
						]
					]
				);

        $this->end_controls_section();

        /* Begin main icon template3 Style */
		$this->start_controls_section(
            'main_icon_style',
            [
                'label' => esc_html__( 'Main Icon', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => 'template3'
                ]
            ]
        );
            
			$this->add_responsive_control(
				'size_main_icon',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .main-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-service .main-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_main_icon_style' );
				
				$this->start_controls_tab(
		            'tab_main_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );
                     
                     $this->add_control(
						'main_icon_color',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service .main-icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'main_icon_bgcolor',
						[
							'label' 	=> esc_html__( 'Background Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service .main-icon' => 'background-color: {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_main_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'infetech' ),
		            ]
		        );

		             $this->add_control(
						'main_icon_color_hover',
						[
							'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service:hover .main-icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'main_icon_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service:hover .main-icon' => 'background-color: {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

	        $this->add_responsive_control(
	            'main_icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .main-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	         $this->add_responsive_control(
	            'main_icon_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .main-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End main icon style */

		/* Begin icon Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .icon i, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ova-service .content-service-wrapper .icon svg, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_bg_size',
				[
					'label' => esc_html__( 'Background Size', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .icon, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service .icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_icon_style' );
				
				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );
                     
                     $this->add_control(
						'icon_color',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service .content-service-wrapper .icon i, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor',
						[
							'label' 	=> esc_html__( 'Background Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service .content-service-wrapper .icon, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service .icon' => 'background-color: {{VALUE}};',
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
						'icon_color_hover',
						[
							'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service:hover .content-service-wrapper .icon i, {{WRAPPER}} .ova-service:hover .content-service-wrapper .content-service .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service:hover .content-service-wrapper .icon, {{WRAPPER}} .ova-service:hover .content-service-wrapper .content-service .icon' => 'background-color: {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

	        $this->add_responsive_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .content-service-wrapper .icon, {{WRAPPER}} .ova-service-template2 .content-service-wrapper .content-service .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'icon_box_shadow',
					'selector' => '{{WRAPPER}} .ova-service .content-service-wrapper .icon',
					'condition' => [
						'template' => 'template1',
					],
				]
			);

	        $this->add_control(
				'icon_position',
				[
					'label' => esc_html__( 'Position', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'template' => 'template1',
					],
				]
			);

	        $this->add_responsive_control(
				'icon_position_top',
				[
					'label' => esc_html__( 'Top', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .icon' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'template' => 'template1',
					],
				]
			);

			$this->add_responsive_control(
				'icon_position_right',
				[
					'label' => esc_html__( 'Right', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .icon' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'template' => 'template1',
					],
				]
			);

        $this->end_controls_section();
		/* End icon style */

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service .content-service-wrapper .content-service .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service:hover .content-service-wrapper .content-service .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .content-service-wrapper .content-service .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control(
				'title_text_align',
				[
					'label' => esc_html__( 'Text Align', 'infetech' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service .title' => 'text-align: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End title style */

		/* Begin DESCRIPTION Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => ['template1' , 'template4'],
                ],
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service .content-service-wrapper .content-service .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service:hover .content-service-wrapper .content-service .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'description_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .content-service-wrapper .content-service .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control(
				'description_text_align',
				[
					'label' => esc_html__( 'Text Align', 'infetech' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service .description' => 'text-align: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End DESCRIPTION style */

		/* Begin content service Style */
		$this->start_controls_section(
            'content_service_style',
            [
                'label' => esc_html__( 'Content', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'content_service_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service' => 'background-color: {{VALUE}};',
					],
				]
			);
            
            $this->add_control(
				'content_service_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service .content-service-wrapper .content-service:after' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'content_service_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .content-service-wrapper .content-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_service_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service .content-service-wrapper .content-service' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'content_service_border',
					'selector' => '{{WRAPPER}} .ova-service .content-service-wrapper .content-service',
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-service .content-service-wrapper .content-service',
				]
			);

         $this->end_controls_section();
		/* End content service style */

	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$template         = $settings['template'];

		$title            = $settings['title'];
		$description      = ( isset( $settings['description'] ) && $settings['description'] ) ? $settings['description'] : '';
		$class_icon       = $settings['class_icon']['value'];
		$link             = $settings['link'];
		$nofollow         = ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target           = ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : '';

		$class_main_icon  = $settings['class_main_icon']['value'];

		// get url image
		$url 	 = $settings['image_service']['url'];
		if ( empty( $url ) ) {
			return;
		}
		$alt_img = ( isset( $settings['image_service']['alt'] ) &&  $settings['image_service']['alt'] !== '' ) 
		           ? $settings['image_service']['alt'] : $title ; 

		$url_bg_image = ( isset( $settings['background_image_box'] ) && $settings['background_image_box'] ) ? $settings['background_image_box']['url'] : '';

		?>
           
           	<?php if( $template === 'template1' ) :?>

	            <div class="ova-service ova-service-<?php echo esc_attr( $template ); ?>">

	            	<div class="image-service">
						<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
                    </div>

                    <div class="content-service-wrapper">
                    	<?php if (!empty( $class_icon )): ?>
			            	<div class="icon">
			            		<?php 
								    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
								?>
			            	</div>
			          	<?php endif;?>
			          	
                    	<div class="content-service">
				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h4 class="title">
										<?php echo esc_html( $title ); ?>
									</h4>
								<?php endif;?>
								<?php if (!empty( $description )): ?>
					            	<p class="description">
					            		<?php echo esc_html( $description ); ?>
					            	</p>
					          	<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
	                    </div> 
                    </div>

			    </div>

		 	<?php elseif( $template === 'template2' ) :?>

		 	    <div class="ova-service ova-service-<?php echo esc_attr( $template ); ?>">

                    <div class="image-service">
						<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
						<div class="triangle-topleft-1"></div>
			    	    <div class="triangle-topleft-2"></div>
                    </div>

                    <div class="content-service-wrapper">
                    	<div class="content-service">
				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h4 class="title">
										<?php echo esc_html( $title ); ?>
									</h4>
								<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>

							<?php if (!empty( $class_icon )): ?>
								<?php if(!empty( $link['url'])) : ?>
								  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
							    <?php endif; ?>
					            	<div class="icon">
					            		<?php 
										    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
										?>
					            	</div>
					            <?php if(!empty( $link['url'])) : ?>
									</a>
								<?php endif; ?>
				            <?php endif;?>
	                    </div> 
                    </div>
		     
			    </div>

			<?php elseif( $template === 'template3' ) :?>

				<div class="ova-service ova-service-<?php echo esc_attr( $template ); ?>">

					<?php if (!empty( $class_main_icon )): ?>
		            	<div class="main-icon">
		            		<?php 
							    \Elementor\Icons_Manager::render_icon( $settings['class_main_icon'], [ 'aria-hidden' => 'true' ] );
							?>
		            	</div>
		          	<?php endif;?>

	            	<div class="image-service">
						<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
                    </div>

                    <div class="content-service-wrapper">	
                    	<div class="content-service">
				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h4 class="title">
										<?php echo esc_html( $title ); ?>
									</h4>
								<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
	                    </div> 
	                    <?php if (!empty( $class_icon )): ?>
	                    	<?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>
			            	<div class="icon">
			            		<?php 
								    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
								?>
			            	</div>
			            	<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
			          	<?php endif;?>
                    </div>

			    </div>

			<?php elseif( $template === 'template4' ) :?>

				<div class="ova-service ova-service-<?php echo esc_attr( $template ); ?>">

	            	<div class="image-service">
						<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
                    </div>

                    <div class="content-service-wrapper">

                    	<?php if (!empty( $class_icon )): ?>
	                    	<?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>
			            	<div class="icon">
			            		<?php 
								    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
								?>
			            	</div>
			            	<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
			          	<?php endif;?>
			          	
                    	<div class="content-service">

				 	    	<div class="mask"
			                    <?php if (!empty( $url_bg_image )): ?> 
					 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ) ; ?>)"
					 	    	<?php endif;?>
		                    ></div>

				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?>>
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h4 class="title">
										<?php echo esc_html( $title ); ?>
									</h4>
								<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
							<?php if (!empty( $description )): ?>
				            	<p class="description">
				            		<?php echo esc_html( $description ); ?>
				            	</p>
				          	<?php endif;?>

	                    </div> 

                    </div>

			    </div>
			    
			<?php endif;?>
		 	
		<?php
	}
}

$widgets_manager->register( new Infetech_Elementor_Service() );