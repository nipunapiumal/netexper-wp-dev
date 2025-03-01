<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Pricing extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_pricing';
	}

	
	public function get_title() {
		return esc_html__( 'Pricing', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-price-table';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
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
					]
				]
			);


			$this->add_control(
				'active',
				[
					'label' => esc_html__( 'Active', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'infetech' ),
					'label_off' => esc_html__( 'Off', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);


			$this->add_control(
				'class_icon',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' => 'flaticon flaticon-web',
						'library' => 'flaticon',
					],
					'condition' => [
                		'template' => 'template1',
                	],
				]
			);

			$this->add_control(
				'class_icon2',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' => 'icomoon icomoon-innovation',
						'library' => 'icomoon',
					],
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);
				
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Basic Plan', 'infetech' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Designed for businesses with basic IT requirements', 'infetech' ),
				]
			);

			$this->add_control(
				'currency_unit',
				[
					'label' => esc_html__( 'Currency Unit', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '$', 'infetech' ),
				]
			);

			$this->add_control(
				'price',
				[
					'label' => esc_html__( 'Price', 'infetech' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 39,
				]
			);

			$this->add_control(
				'period',
				[
					'label' => esc_html__( 'Period', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '/month', 'infetech' ),
				]
			);

			$this->add_control(
				'title_service',
				[
					'label' => esc_html__( 'Title Service', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'All Basic services include:', 'infetech' ),
					'condition' => [
                		'template' => 'template1',
                	],
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon_text_service',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-fast-forward',
						'library' 	=> 'ovaicon',
					],
					'condition' => [
                		'template' => 'template1',
                	],
				]
			);

			$repeater->add_control(
				'class_icon_text_service_v2',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'fas fa-check-circle',
						'library' 	=> 'all',
					],
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);
				
			$repeater->add_control(
				'text_service',
				[
					'label' => esc_html__( 'Text Service', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Add list text service', 'infetech' ),
				]
			);

			$this->add_control(
				'list_service_text',
				[
					'label' => esc_html__( 'List Text Service', 'infetech' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[	
							'text_service'      => esc_html__( '24/7 system monitoring', 'infetech' ),
						],
						[	
							'text_service'      => esc_html__( 'Security management', 'infetech' ),
						],
						[	
							'text_service'      => esc_html__( 'Patch management', 'infetech' ),
						],
						[	
							'text_service'      => esc_html__( 'Remote support', 'infetech' ),
						],
					],
					'title_field' => '{{{ text_service }}}',
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'infetech' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
					'show_label' => true,
				]
			);

			$this->add_control(
				'text_button',
				[
					'label' 	=> esc_html__( 'Text Button', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Free trial', 'infetech' ),
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_image_pricing',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic' ],
					'selector' => '{{WRAPPER}} .ova-pricing .mask',
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'background_image_opacity',
				[
					'label' 		=> esc_html__( 'Background Image Opacity', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1,
							'step' => 0.05,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .mask' => 'opacity: {{SIZE}};',
					],
				]
			);

		$this->end_controls_section();

		/* Begin content Style */
		$this->start_controls_section(
            'content_pricing_style',
            [
                'label' => esc_html__( 'Content', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'content_pricing_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing' => 'background-color: {{VALUE}};',
					],
				]
			);
            
            $this->add_control(
				'content_pricing_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:before' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'content_pricing_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control(
				'pricing_hover_animation',
				[
					'label' => __( 'Hover Animation', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
					'prefix_class' => 'elementor-animation-',
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-pricing',
				]
			);

			$this->add_responsive_control(
	            'content_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing.pricing-template2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
	            		'template' => 'template2',
	            	],
	            ]
	        );

        $this->end_controls_section();
		/* End content style */

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
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'description_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

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
							'max' => 150,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon-price i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);
               
            $this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon-price i' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova-pricing.pricing-template2 .icon-box i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .icon-price i' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova-pricing.pricing-template2:hover .icon-box i' => 'color: {{VALUE}};',
					],
				]
			);


        $this->end_controls_section();
		/* End icon style */

		/* Begin price Style */
		$this->start_controls_section(
            'price_style',
            [
                'label' => esc_html__( 'Price', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'price_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .icon-price .ova-price',
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon-price .ova-price' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'price_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .icon-price .ova-price' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End price style */

		/* Begin period Style */
		$this->start_controls_section(
            'period_style',
            [
                'label' => esc_html__( 'Period', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'period_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .icon-price .period',
				]
			);

			$this->add_control(
				'period_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon-price .period' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'period_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .icon-price .period' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End period style */

		/* Begin title service Style */
		$this->start_controls_section(
            'title_service_style',
            [
                'label' => esc_html__( 'Title Service', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
            		'template' => 'template1',
            	],
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_service_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-service .pricing-title-service',
				]
			);

			$this->add_control(
				'title_service_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-service .pricing-title-service' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_service_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-service .pricing-title-service' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End title service style */

		/* Begin list text service Style */
		$this->start_controls_section(
            'list_text_service_style',
            [
                'label' => esc_html__( 'List Text Service', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );   

            $this->add_responsive_control(
				'space_between_text_service',
				[
					'label' 		=> esc_html__( 'Space Between', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

            $this->add_control(
				'list_text_service_icon_heading',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> Controls_Manager::HEADING,
				]
			);

				$this->add_responsive_control(
					'size_icon_service',
					[
						'label' 		=> esc_html__( 'Size', 'infetech' ),
						'type' 			=> Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 35,
								'step' => 1,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
	               
	            $this->add_control(
					'icon_service_color',
					[
						'label' 	=> esc_html__( 'Color', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li i' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'icon_service_color_hover',
					[
						'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-pricing:hover .pricing-service .pricing-service-list li i' => 'color: {{VALUE}};',
						],
					]
				);

            $this->add_control(
				'list_text_service_heading',
				[
					'label' 	=> esc_html__( 'Text Service', 'infetech' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

	            $this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' 		=> 'list_text_service_typography',
						'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li .text_service',
					]
				);

				$this->add_control(
					'list_text_service_color',
					[
						'label' 	=> esc_html__( 'Color', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}}  .ova-pricing .pricing-service .pricing-service-list li .text_service' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'list_text_service_color_hover',
					[
						'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}}  .ova-pricing:hover .pricing-service .pricing-service-list li .text_service' => 'color: {{VALUE}};',
						],
					]
				);

        $this->end_controls_section();
		/* End list text service style */

		/* Begin button Style */
		$this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__( 'Button', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_button_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-btn',
				]
			);
            
            $this->add_control(
				'button_text_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn' => 'color: {{VALUE}};',
					],
				]
			);

			 $this->add_control(
				'button_text_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-btn' => 'color: {{VALUE}};',
					],
				]
			);

            $this->add_control(
				'button_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn' => 'background-color: {{VALUE}};',
					],
					'condition' =>[
						'template' => 'template1',
					],
				]
			);
            
            $this->add_control(
				'button_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-btn:after' => 'background-color: {{VALUE}};',
					],
					'condition' =>[
						'template' => 'template1',
					],
				]
			);

			$this->add_responsive_control(
	            'button_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'button_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-btn, {{WRAPPER}} .ova-pricing .pricing-btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End button style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$template = $settings['template'];

		$active 		   =  	$settings['active'] == 'yes' ? 'active' : '';
		$title             =    $settings['title'];
		$description       =    $settings['description'];
		$currency_unit     =    $settings['currency_unit'];
		$price             =    $settings['price'];
		$period            =    $settings['period'];
		
		$title_service     =    $settings['title_service'];
		$list_service_text =    $settings['list_service_text'];

		$text_button       =    $settings['text_button'];
		$link              =    $settings['link'];
		$nofollow          =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target            =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : ''; 

		if($template == 'template1'){
			$class_icon        = 	$settings['class_icon'] ? $settings['class_icon'] : '';
		}elseif($template == 'template2'){
			$class_icon        = 	$settings['class_icon2'] ? $settings['class_icon2'] : '';
		}

		 ?>
           

           <div class="ova-pricing pricing-<?php echo esc_attr( $template ); ?> <?php echo esc_attr( $active ); ?>">
           		<?php if($template == 'template1'){ ?>
           	    <div class="mask"></div>
           	    <?php } ?>

           	    <?php if( $class_icon && $template == 'template2' ) { ?>
           	    	<div class="icon-box">
					<?php } ?>

           	    <?php if( !empty( $title ) ) : ?>
	                <h3 class="pricing-title">
	                	<?php echo esc_html( $title ) ; ?>
	                </h3>
                <?php endif; ?>

                <?php if( $class_icon && $template == 'template2') { ?>
                	<i class="<?php echo esc_attr( $class_icon['value'] ); ?>"></i>
                	</div>
                <?php } ?>

                <?php if( !empty( $description ) ) : ?>
	                <h3 class="pricing-description">
	                	<?php echo esc_html( $description ) ; ?>
	                </h3>
                <?php endif; ?>
                
                <div class="icon-price">
                	<?php if( $class_icon && $template == 'template1'){ ?>
						<i class="<?php echo esc_attr( $class_icon['value'] ); ?>"></i>
					<?php } ?>

		            <?php if( !empty( $price ) ) :?>
		                <div class="ova-price"><sup><?php echo esc_html( $currency_unit ) ;?></sup><?php echo esc_html( $price ) ;?></div>
		                <span class="period"><?php echo esc_html( $period ) ;?></span>
		            <?php endif; ?>
                </div>

                <div class="pricing-service">
                	<?php if( !empty( $title_service ) && $template == 'template1' ) : ?>
	                    <p class="pricing-title-service">
	                        <?php echo esc_html( $title_service ) ;?>
	                    </p>
	                <?php endif; ?>

	                <?php if( $list_service_text != '' ): ?>
	                    <ul class="pricing-service-list">
	                    	<?php foreach( $list_service_text as $list_st ) { 
	                    		if( $template == 'template1'){
	                    			$class_icon_text_service = $list_st['class_icon_text_service']['value'];
	                    		} else {
	                    			$class_icon_text_service = $list_st['class_icon_text_service_v2']['value'];
	                    		}
                                
	                    	?>
		                        <li>
		                            <i class="<?php echo esc_attr( $class_icon_text_service ) ; ?>"></i>
		                            <span class="text_service"><?php echo esc_html( $list_st['text_service'] ) ; ?></span> 
		                        </li>
	                       <?php } ?>
	                    </ul>
	                <?php endif; ?>
                </div>

                <?php if( !empty( $text_button ) ) : ?>
	                <a <?php if( !empty( $link['url'] ) ) : ?> href="<?php echo esc_url( $link['url'] ) ;?>" <?php endif; ?> 
	                    class="pricing-btn" <?php echo esc_attr( $nofollow ) ;?> <?php echo esc_attr( $target ) ;?> title="<?php echo esc_attr( $text_button ); ?>">
                        <span class="text-button">
                        	<?php echo esc_html( $text_button ) ;?>
                        </span>
	                </a>
	            <?php endif; ?>

            </div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Pricing() );