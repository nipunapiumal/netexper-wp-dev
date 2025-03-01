<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Video extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_video';
	}

	
	public function get_title() {
		return esc_html__( 'Video', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-play-o';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-video' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		/* Begin section icon */
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'infetech' ),
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
				'icon_class',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' => 'fa fa-play',
						'library' => 'all',
					],
					'condition' => [
                		'template' => 'template1',
                	],
				]
			);

			$this->add_control(
				'icon_class_v2',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' => 'icomoon icomoon-play-button',
						'library' => 'icomoon',
					],
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);

			$this->add_control(
				'image_v2',
				[
					'label' => esc_html__( 'Choose Image', 'infetech' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);

			$this->add_control(
				'image_overlay',
				[
					'label' 	=> esc_html__( 'Overlay', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'no',
					'condition' => [
						'template' => 'template2',
					],
				]
			);

			$this->add_responsive_control(
				'position_action_play',
				[
					'label' => esc_html__( 'Position Play', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'relative' => [
							'title' => esc_html__( 'Relative', 'infetech' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'absolute' => [
							'title' => esc_html__( 'Absolute', 'infetech' ),
							'icon' 	=> 'eicon-text-align-center',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-video.video-template2 .icon-content-view' => 'position: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template2',
					],
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-video .icon-content-view' => 'justify-content: {{VALUE}};',
						'{{WRAPPER}} .ova-video' 					=> 'justify-content: {{VALUE}};',
					],
				]
			);


			$this->add_control(
				'icon_url_video',
				[
					'label' 	=> esc_html__( 'URL Video', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'placeholder' 	=> esc_html__( 'Enter your URL', 'infetech' ) . ' (YouTube)',
					'default' 		=> 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				]
			);

			$this->add_control(
				'icon_text',
				[
					'label' 	=> esc_html__( 'Text', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Watch our few minutes video', 'infetech' ),
					'condition' => [
                		'template' => 'template1',
                	],
				]
			);

			$this->add_control(
	            'link',
	            [
	                'label' 	=> esc_html__( 'Link', 'infetech' ),
	                'type' 		=> Controls_Manager::URL,
	                'dynamic' 	=> [
	                    'active' => true,
	                ],
	                'condition' => [
	                	'icon_url_video' 	=> '',
	                	'template' 			=> 'template1',
	                ],
	            ]
	        );

	        $this->add_control(
				'video_options',
				[
					'label' 	=> esc_html__( 'Video Options', 'infetech' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_video',
				[
					'label' 	=> esc_html__( 'Autoplay', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'mute_video',
				[
					'label' 	=> esc_html__( 'Mute', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'loop_video',
				[
					'label' 	=> esc_html__( 'Loop', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'player_controls_video',
				[
					'label' 	=> esc_html__( 'Player Controls', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'modest_branding_video',
				[
					'label' 	=> esc_html__( 'Modest Branding', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'show_info_video',
				[
					'label' 	=> esc_html__( 'Show Info', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'infetech' ),
					'label_off' => esc_html__( 'No', 'infetech' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

		$this->end_controls_section();
		/* End section icon */

		/* Begin section icon style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
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
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'infetech' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content',
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
			                'label' 	=> esc_html__( 'Color', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content:hover i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        	$this->add_control(
			            'icon_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video .icon-content-view .content:hover' => 'background-color: {{VALUE}};',
			                ],     
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'infetech' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content:hover',
						]
					);

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'icon_width',
				[
					'label' 	=> esc_html__( 'Width', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .icon-content-view .content' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'icon_height',
				[
					'label' 	=> esc_html__( 'Height', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video .icon-content-view .content' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content i',
				]
			);

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'icon_before_border',
	                'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content:before',
	                'separator' => 'before',  
	            ]
	        );

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'icon_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'infetech' ),
					'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .content',
				]
			);

	        $this->add_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-video .icon-content-view .content'	=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-video .icon-content-view .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
                		'template' => 'template1',
                	],
	            ]
	        );

	    $this->end_controls_section();

	    /* Begin text Style */
		$this->start_controls_section(
            'text_style',
            [
                'label' 	=> esc_html__( 'Text', 'infetech' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => 'template1',
                ],
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_typography',
					'selector' 	=> '{{WRAPPER}} .ova-video .icon-content-view .ova-text',
				]
			);

			$this->add_control(
				'text_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-video .icon-content-view .ova-text, {{WRAPPER}} .ova-video .icon-content-view .ova-text a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'text_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-video .icon-content-view .ova-text:hover a, {{WRAPPER}} .ova-video .icon-content-view .ova-text:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'text_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-video .icon-content-view .ova-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End text style */

		/* Begin image Style */
		$this->start_controls_section(
            'image_style',
            [
                'label' 	=> esc_html__( 'Image', 'infetech' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => 'template2',
                ],
            ]
        );
        
        	$this->add_responsive_control(
				'image_width',
				[
					'label' 	=> esc_html__( 'Max Width', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 700,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video.video-template2 .image' => 'max-width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'image_height',
				[
					'label' 	=> esc_html__( 'Height', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 700,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video.video-template2 .image' => 'height: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_responsive_control(
				'image_transform',
				[
					'label' 	=> esc_html__( 'Transform', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'deg',
					],
					'range' => [
						'deg' => [
							'min' => -360,
							'max' => 360,
						],
						
					],
					'size_units' 	=> [ 'deg' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-video.video-template2 .image' => 'transform: rotate({{SIZE}}{{UNIT}});',
					],
					'separator' => 'before'
				]
			);

			$this->add_control(
	            'ova_image_video_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-video.video-template2 .image' 		=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'image_border_v2',
	                'selector' 	=> '{{WRAPPER}} .ova-video.video-template2 .image',
	                'separator' => 'before',
	                'condition' => [
	                	'template' => 'template2',
	                ],
	            ]
	        );
 			
 			$this->start_controls_tabs(
				'style_overlay_tabs'
			);

				$this->start_controls_tab(
					'style_overlay_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
						'condition' => [
		                	'image_overlay' => 'yes',
		                ],
					]
				);

					$this->add_control(
			            'image_overlay_background',
			            [
			                'label' 	=> esc_html__( 'Overlay', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video.video-template2 .image .overlay' => 'background-color: {{VALUE}};',
			                ],
			                'condition' => [
			                	'image_overlay' => 'yes',
			                ],
			            ]
			        );

			        $this->add_control(
						'overlay_image_video_opacity',
						[
							'label' => esc_html__( 'Overlay Opacity', 'infetech' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-video.video-template2 .image .overlay' => 'opacity: {{SIZE}};',
							],
							'condition' => [
			                	'image_overlay' => 'yes',
			                ],
							
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'style_overlay_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
						'condition' => [
		                	'image_overlay' => 'yes',
		                ],
					]
				);

					$this->add_control(
			            'image_hover_overlay_background',
			            [
			                'label' 	=> esc_html__( 'Overlay', 'infetech' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-video.video-template2 .image:hover .overlay' => 'background: {{VALUE}};',
			                ],
			                'condition' => [
			                	'image_overlay' => 'yes',
			                ],
			            ]
			        );

			        $this->add_control(
						'overlay_hover_image_video_opacity',
						[
							'label' => esc_html__( 'Overlay Opacity', 'infetech' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-video.video-template2 .image:hover .overlay' => 'opacity: {{SIZE}};',
							],
							'condition' => [
			                	'image_overlay' => 'yes',
			                ],
							
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

        $this->end_controls_section();
		/* End image style */
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$template = $settings['template'];

		if($template == 'template1'){
			$icon = $settings['icon_class'] ? $settings['icon_class'] : '';
		} else {
			$icon 		= $settings['icon_class_v2'] ? $settings['icon_class_v2'] : '';
			$url_image 	= $settings['image_v2']['url'];
		}

		$url_video 	= $settings['icon_url_video'];
		$icon_text 	= $settings['icon_text'];
		$link 		= $settings['link']['url'];
		$tg_blank 	= '';
		if ( $settings['link']['is_external'] == 'on' ) {
			$tg_blank = 'target="_blank"';
		}

		if ( ! $link ) {
			$url = $link;
		}

		$autoplay 	= $settings['autoplay_video'];
		$mute 		= $settings['mute_video'];
		$loop 		= $settings['loop_video'];
		$controls 	= $settings['player_controls_video'];
		$modest 	= $settings['modest_branding_video'];
		$show_info 	= $settings['show_info_video'];
		$overlay 	= $settings['image_overlay'];
		 ?>
         
         <div class="ova-video video-<?php echo esc_html($template); ?>">

         	<?php if ( $template==='template2' ): ?>
         		<div class="image">
         				<?php if( $url_image ){ ?>
						<img src="<?php echo esc_url($settings['image_v2']['url']) ?>" alt="<?php echo esc_attr( $url_video ); ?>" style="">
						<?php } ?>
					<?php if($overlay == 'yes'){ ?>
						<div class="overlay"></div>
					<?php } ?>

					<?php if( $template == 'template2'){ ?>
					<div class="icon-content-view video_active">
						<?php if ( ! empty( $url_video ) ) : ?>
							<div class="content video-btn" 
									data-src="<?php echo esc_url( $url_video ); ?>" 
									data-autoplay="<?php echo esc_attr( $autoplay ); ?>" 
									data-mute="<?php echo esc_attr( $mute ); ?>" 
									data-loop="<?php echo esc_attr( $loop ); ?>" 
									data-controls="<?php echo esc_attr( $controls ); ?>" 
									data-modest="<?php echo esc_attr( $modest ); ?>" 
									data-show_info="<?php echo esc_attr( $show_info ); ?>">
								<?php if( $icon ){ ?>
										<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );?>
								<?php } ?>
							</div>
						<?php else: ?>
							<div class="content">
								<?php if( $icon ){ ?>
										<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );?>
								<?php } ?>
							</div>
						<?php endif; ?>

					</div>
					<?php } ?>

				</div>
			<?php endif; ?>

			<?php if( $template == 'template1'){ ?>
			<div class="icon-content-view video_active">
				<?php if ( ! empty( $url_video ) ) : ?>
					<div class="content video-btn" 
							data-src="<?php echo esc_url( $url_video ); ?>" 
							data-autoplay="<?php echo esc_attr( $autoplay ); ?>" 
							data-mute="<?php echo esc_attr( $mute ); ?>" 
							data-loop="<?php echo esc_attr( $loop ); ?>" 
							data-controls="<?php echo esc_attr( $controls ); ?>" 
							data-modest="<?php echo esc_attr( $modest ); ?>" 
							data-show_info="<?php echo esc_attr( $show_info ); ?>">
						<?php if( $icon ){ ?>
								<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );?>
						<?php } ?>
					</div>
				<?php else: ?>
					<div class="content">
						<?php if( $icon ){ ?>
								<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );?>
						<?php } ?>
					</div>
				<?php endif; ?>
				<?php if ( $icon_text && $template == 'template1' ): ?>
					<p class="ova-text">
						<?php if ( $url ): ?>
							<a href="<?php echo esc_url( $url ); ?>" <?php echo esc_html( $tg_blank ); ?>>
								<?php echo esc_html( $icon_text ); ?>
							</a>
						<?php else: ?>
							<?php echo esc_html( $icon_text ); ?>
						<?php endif; ?>
					</p>
				<?php endif; ?>
			</div>
			<?php } ?>

			<div class="modal-container">
				<div class="modal">
					<i class="ovaicon-cancel"></i>
					<iframe class="modal-video" allow="autoplay"></iframe>
				</div>
			</div>
		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Video() );