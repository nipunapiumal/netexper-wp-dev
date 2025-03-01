<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Service_2 extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_service_2';
	}

	
	public function get_title() {
		return esc_html__( 'Service 2', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-text-align-left';
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
				'label' => esc_html__( 'Service 2', 'infetech' ),
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
						'template5' => esc_html__('Template 5', 'infetech'),
						'template6' => esc_html__('Template 6', 'infetech'),
					]
				]
			);

			$this->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'fa4compatibility' => 'old_icon',
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-server',
						'library' 	=> 'flaticon',
					],
					'condition' => [
						'template!' => 'template2'
					]
				]
			);

			$this->add_control(
				'text_number',
				[
					'label' => esc_html__( 'Text Number', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '01', 'infetech' ),
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Services 01', 'infetech' ),
					'condition' => [
						'template' => ['template4','template5','template6']
					]
				]
			);
				
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'IT Consultancy', 'infetech' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Lorem ipsum is simply free text available many variations not pass of majority.', 'infetech' ),
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Title', 'infetech' ),
					'type' => Controls_Manager::URL,
					'default' => [
						'url' => '#',
					],
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
					'label' => esc_html__( 'Text Button', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Read More', 'infetech' ),
					'condition' => [
						'template!' => ['template1','template2']
					]
				]
			);

			$this->add_control(
				'background_image_box',
				[
					'label'   => esc_html__( 'Box Background Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'condition' => [
						'template' => ['template3', 'template4']
					],
					'separator' => 'before'
				]
			);

		$this->end_controls_section();

		/* Begin content service Style */
		$this->start_controls_section(
            'content_service_style',
            [
                'label' => esc_html__( 'Content service 2', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'content_service_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2' => 'background-color: {{VALUE}};',
					],
				]
			);
            
            $this->add_control(
				'content_service_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:after' => 'background-color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-service-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-service-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-service-2  ',
				]
			);

         $this->end_controls_section();
		/* End content service style */

		/* Begin shape Style */
		$this->start_controls_section(
            'shape_service_style',
            [
                'label' => esc_html__( 'Shape', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
				'trapezoid1_color',
				[
					'label' 	=> esc_html__( 'Trapezoid 1 Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .trapezoid-topleft-1' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'trapezoid2_color',
				[
					'label' 	=> esc_html__( 'Trapezoid 2 Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .trapezoid-topleft-2' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template1'
					]
				]
			);

            $this->add_control(
				'triangle1_boder_color',
				[
					'label' 	=> esc_html__( 'Triangle 1 Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .triangle-topleft-1' => 'border-top-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'triangle2_boder_color',
				[
					'label' 	=> esc_html__( 'Triangle 2 Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .triangle-topleft-2' => 'border-top-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'square_bgcolor',
				[
					'label' 	=> esc_html__( 'Square Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .square' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template!' => 'template1'
					]
				]
			);

			$this->add_control(
				'triangle_color',
				[
					'label' 	=> esc_html__( 'Triangle Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .triangle-topleft' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template5'
					]
				]
			);

			$this->add_control(
				'triangle_color_hover',
				[
					'label' 	=> esc_html__( 'Triangle Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:hover .triangle-topleft' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template5'
					]
				]
			);

         $this->end_controls_section();

		/* Begin icon template1 Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'template!' => 'template2'
				]
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> ['px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'bg_size_icon',
				[
					'label' 		=> esc_html__( 'Background Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> ['px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .ova-service-2 .icon i, {{WRAPPER}} .ova-service-2-template2 .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor',
						[
							'label' 	=> esc_html__( 'Background Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2 .icon, {{WRAPPER}} .ova-service-2-template2  .icon' => 'background-color: {{VALUE}};',
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
								'{{WRAPPER}} .ova-service-2:hover .icon i, {{WRAPPER}} .ova-service-2:hover .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2:hover .icon, {{WRAPPER}} .ova-service-2:hover .icon' => 'background-color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-service-2 .icon, {{WRAPPER}} .ova-service-2-template2 .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End icon style */

		/* Begin text number template2 Style */
		$this->start_controls_section(
            'textnumber_style',
            [
                'label' => esc_html__( 'Text number', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                 'condition' => [
					'template' => 'template2'
				]
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'textnumber_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-2 .text_number',
				]
			);

			$this->add_control(
				'textnumber_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:hover .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'textnumber_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-2 .text_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();

        /* Begin sub title Style */
		$this->start_controls_section(
            'sub_title_style',
            [
                'label' => esc_html__( 'Sub Title', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => ['template4','template5','template6']
                ]
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'sub_title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-2 .sub-title',
				]
			);

			$this->add_control(
				'sub_title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .sub-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'sub_title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:hover .sub-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'sub_title_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-2 .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End sub title style */

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
					'selector' 	=> '{{WRAPPER}} .ova-service-2 .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:hover .title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-service-2 .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' 	=> '{{WRAPPER}} .ova-service-2 .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2 .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-2:hover .description' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-service-2 .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Button', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template!' => ['template1','template2']
				]
			]
		);

			$this->start_controls_tabs(
				'button_read_more_tabs',
			);

				$this->start_controls_tab(
					'button_read_more_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_readmore_typography',
							'selector' => '{{WRAPPER}} .ova-service-2 .service-button .text-button',
						]
					);

					$this->add_control(
						'text_readmore_color',
						[
							'label' => esc_html__( 'Text Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2 .service-button .text-button' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_color',
						[
							'label' => esc_html__( 'Icon Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2 .service-button i' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_size',
						[
							'label' => esc_html__( 'Icon Size', 'infetech' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-service-2 .service-button i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'button_read_more_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_control(
						'text_readmore_color_hover',
						[
							'label' => esc_html__( 'Text Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2:hover .service-button .text-button' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_color_hover',
						[
							'label' => esc_html__( 'Icon Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-service-2:hover .service-button i' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE
		
	}

	// Render Template Here
	protected function render() {

		$settings 	   = $this->get_settings();

		$template      = $settings['template'];

		$sub_title     = isset( $settings['sub_title'] ) ? $settings['sub_title'] : '';
		$title         = isset( $settings['title'] ) ? $settings['title'] : '';
		$text_number   = isset( $settings['text_number'] ) ? $settings['text_number'] : '';
		$description   = $settings['description'];
		$link          = $settings['link'];
		$nofollow      = ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target        = ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : '';

		$text_button   = isset( $settings['text_button'] ) ? $settings['text_button'] : '';
		$url_bg_image  = ( isset( $settings['background_image_box'] ) && $settings['background_image_box'] ) ? $settings['background_image_box']['url'] : ''; 

		 ?>

		 	<?php if( $template === 'template1' ) :?>

	            <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
			            <?php if (!empty( $title )): ?>
							<h3 class="title"><?php echo esc_html( $title ); ?></h3>
						<?php endif;?>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>

					<?php if (!empty( $description )): ?>
						<p class="description">
							<?php echo esc_html( $description ); ?>
						</p>
					<?php endif;?>
	                     
	            	<div class="icon">
	            		<?php 
						    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
						?>   		
	            	</div>
		          	
		          	<div class="trapezoid-topleft-1"></div>
			    	<div class="trapezoid-topleft-2"></div>

			    </div>

		 	<?php elseif( $template === 'template2' ) :?>

		 	    <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">
                
		 	    	<div class="square"></div>

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
			            <?php if (!empty( $title )): ?>
							<h3 class="title"><?php echo esc_html( $title ); ?></h3>
						<?php endif;?>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>

		            <?php if (!empty( $description )): ?>
						<p class="description">
							<?php echo esc_html( $description ); ?>
						</p>
					<?php endif;?>

					<?php if (!empty( $text_number )): ?>
		            	<span class="text_number">
		            		<?php echo esc_html( $text_number ); ?>
		            	</span>
		            <?php endif;?>

		            <div class="triangle-topleft-1"></div>
			    	<div class="triangle-topleft-2"></div>
		     
			    </div>

			<?php elseif( $template === 'template3' ) :?>
                
                <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">

                	<div class="mask"
	                    <?php if (!empty( $url_bg_image )): ?> 
			 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ) ; ?>)"
			 	    	<?php endif;?>
                    ></div>
                
		 	    	<div class="square"></div>

		 	    	<div class="icon">
	            		<?php 
						    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
						?>   		
	            	</div>

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
			            <?php if (!empty( $title )): ?>
							<h3 class="title"><?php echo esc_html( $title ); ?></h3>
						<?php endif;?>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>

		            <?php if (!empty( $description )): ?>
						<p class="description">
							<?php echo esc_html( $description ); ?>
						</p>
					<?php endif;?>

					<?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
				        <div class="service-button">
				        	<?php if (!empty( $text_button )): ?>
								<span class="text-button">
									<?php echo esc_html( $text_button ); ?>
								</span>
							<?php endif;?>
							<i class="ovaicon ovaicon-next-4"></i>
				        </div>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>
		     
			    </div>

			<?php elseif( $template === 'template4' ) :?>
                
                <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">

                	<div class="mask"
	                    <?php if (!empty( $url_bg_image )): ?> 
			 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ) ; ?>)"
			 	    	<?php endif;?>
                    ></div>
                
		 	    	<div class="square"></div>

		 	    	<div class="service-flex-wrapper">
		 	    		<div class="icon">
		            		<?php 
							    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
							?>   		
		            	</div>
		 	    		<div class="flex-right">
		 	    			<?php if (!empty( $sub_title )): ?>
								<span class="sub-title">
									<?php echo esc_html( $sub_title ); ?>
								</span>
							<?php endif;?>

				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h3 class="title"><?php echo esc_html( $title ); ?></h3>
								<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>

				            <?php if (!empty( $description )): ?>
								<p class="description">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif;?>

							<?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
						        <div class="service-button">
						        	<?php if (!empty( $text_button )): ?>
										<span class="text-button">
											<?php echo esc_html( $text_button ); ?>
										</span>
									<?php endif;?>
									<i class="ovaicon ovaicon-next-4"></i>
						        </div>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
		 	    		</div>
		 	    	</div>
		     
			    </div>

			<?php elseif( $template === 'template5' ) :?>
                
                <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">
                
		 	    	<div class="square"></div>

	 	    		<div class="icon">
	            		<?php 
						    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
						?>   		
	            	</div>

 	    			<?php if (!empty( $sub_title )): ?>
						<span class="sub-title">
							<?php echo esc_html( $sub_title ); ?>
						</span>
					<?php endif;?>

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
			            <?php if (!empty( $title )): ?>
							<h3 class="title"><?php echo esc_html( $title ); ?></h3>
						<?php endif;?>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>

		            <?php if (!empty( $description )): ?>
						<p class="description">
							<?php echo esc_html( $description ); ?>
						</p>
					<?php endif;?>

					<?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
				    <?php endif; ?>
				        <div class="service-button">
				        	<?php if (!empty( $text_button )): ?>
								<span class="text-button">
									<?php echo esc_html( $text_button ); ?>
								</span>
							<?php endif;?>
							<i class="ovaicon ovaicon-next-4"></i>
				        </div>
					<?php if(!empty( $link['url'])) : ?>
						</a>
					<?php endif; ?>
		 	   
		     		<div class="triangle-topleft triangle-topleft-3"></div>
			    	<div class="triangle-topleft triangle-topleft-4"></div>
			    	<div class="triangle-topleft triangle-topleft-5"></div>

			    </div>

			<?php elseif( $template === 'template6' ) :?>
                
                <div class="ova-service-2 ova-service-2-<?php echo esc_attr( $template ); ?>">
                
		 	    	<div class="square"></div>

		 	    	<div class="service-flex-wrapper">

		 	    		<div class="icon">
		            		<?php 
							    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
							?>   		
		            	</div>

		 	    		<div class="flex-center">
		 	    			<?php if (!empty( $sub_title )): ?>
								<span class="sub-title">
									<?php echo esc_html( $sub_title ); ?>
								</span>
							<?php endif;?>

				            <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h3 class="title"><?php echo esc_html( $title ); ?></h3>
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

		 	    		<?php if(!empty( $link['url'])) : ?>
						  <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
					    <?php endif; ?>
					        <div class="service-button">
					        	<?php if (!empty( $text_button )): ?>
									<span class="text-button">
										<?php echo esc_html( $text_button ); ?>
									</span>
								<?php endif;?>
								<i class="ovaicon ovaicon-next-4"></i>
					        </div>
						<?php if(!empty( $link['url'])) : ?>
							</a>
						<?php endif; ?>

		 	    	</div>
		     
			    </div>

			<?php endif;?>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Service_2() );