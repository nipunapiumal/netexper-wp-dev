<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Ova_Icon_Box extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_ova_icon_box';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Icon Box', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-icon-box';
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
				'label' => esc_html__( 'Ova Icon Box', 'infetech' ),
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
				'version',
				[
					'label' => esc_html__( 'Version', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'version1',
					'description' => esc_html__( '( Version of Template 2 )', 'infetech' ),
					'options' => [
						'version1' => esc_html__('Version 1', 'infetech'),
						'version2' => esc_html__('Version 2', 'infetech'),
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'icon_box_active',
				[
					'label'   => esc_html__( 'Active Mode', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'condition' => [
						'template' => 'template2'
					]
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
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Digital Marketing', 'infetech' ),
					'condition' => [
						'template' => [
							'template1',
							'template2',
							'template4',
						]
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
					'condition' => [
						'template' => [
							'template1',
							'template2',
							'template4',
						]
					]
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Lorem Ipsum has been the industry text ever since then.', 'infetech' ),
					'condition' => [
						'template' => [
							'template1',
							'template2',
						]
					]
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' 	=> esc_html__( 'Alignment', 'infetech' ),
					'type' 		=> Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' 	=> [
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
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box, {{WRAPPER}} .ova-icon-box-template3' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'background_image_box',
				[
					'label'   => esc_html__( 'Box Background Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'condition' => [
						'template' => [
							'template2',
						]
					],
					'separator' => 'before'
				]
			);


		$this->end_controls_section();

		/* Begin icon Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'template!' => 'template3'
				]
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
						'{{WRAPPER}} .ova-icon-box .icon i, {{WRAPPER}} .ova-icon-box-template4 i, {{WRAPPER}} .ova-icon-box-template3 #ova-icon-box-mainicon' => 'font-size: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .ova-icon-box .icon i, {{WRAPPER}} .ova-icon-box-template4 i, {{WRAPPER}} .ova-icon-box-template3 #ova-icon-box-mainicon' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor',
						[
							'label' 	=> esc_html__( 'Background Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-box .icon' => 'background-color: {{VALUE}};',
							],
							'condition' => [
								'template' => [
									'template1',
									'template2'
								]
							]
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
								'{{WRAPPER}} .ova-icon-box:hover .icon i, {{WRAPPER}} .ova-icon-box-template4:hover i, {{WRAPPER}} .ova-icon-box-template3:hover #ova-icon-box-mainicon, {{WRAPPER}} .ova-icon-box-active .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-box .icon:after, {{WRAPPER}} .ova-icon-box-active .icon' => 'background-color: {{VALUE}};',
							],
							'condition' => [
								'template' => [
									'template1',
									'template2'
								]
							]
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
	                    '{{WRAPPER}} .ova-icon-box .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'template' => [
							'template1',
							'template2',
						]
					],
	            ]
	        );

        $this->end_controls_section();
		/* End icon style */

		/* Begin icon template3 Style */
		$this->start_controls_section(
            'icon_template3_style',
            [
                'label' => esc_html__( 'Icon', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'template' => 'template3'
				]
            ]
        );                 

			$this->add_responsive_control(
				'size_icon_template3',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box-template3 .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_template3_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box-template3 .icon i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_template3_icon_i',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-icon-box-template3 .icon i',
				]
			);

			$this->add_responsive_control(
	            'icon_padding_template3',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon-box-template3 .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
	            'icon_border_radius_template3',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon-box-template3 .icon, {{WRAPPER}} .ova-icon-box-template3 .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_control(
				'icon_template3_background_heading',
				[
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

            $this->add_responsive_control(
				'bgsize_icon_tempalte3',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box-template3 .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_template3_icon',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-icon-box-template3 .icon',
				]
			);


        $this->end_controls_section();
		/* End icon template3 style */

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'template!' => 'template3'
				]
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon-box .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box:hover .title, {{WRAPPER}} .ova-icon-box-active .title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-icon-box .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'condition' => [
					'template' => [
						'template1',
						'template2',
					]
				]
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon-box .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box:hover .description, {{WRAPPER}} .ova-icon-box-active .description' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-icon-box .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		/* Begin Icon Box Style */
		$this->start_controls_section(
            'icon_box_style',
            [
                'label' => esc_html__( 'Ova Icon Box', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
					'template!' => 'template3'
				]
            ]
        );

            $this->start_controls_tabs( 'tabs__style' );
				
				$this->start_controls_tab(
		            'tab_icon_box_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'card_bgcolor',
						[
							'label' 	=> esc_html__( 'Background Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-box' => 'background-color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow_card',
							'label' => __( 'Box Shadow', 'infetech' ),
							'selector' => '{{WRAPPER}} .ova-icon-box',
						]
				    );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_box_hover',
		            [
		                'label' => esc_html__( 'Hover', 'infetech' ),
		            ]
		        );

				    $this->add_control(
						'card_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-box:hover:after, {{WRAPPER}} .ova-icon-box-active:after' => 'background-color: {{VALUE}};',
							],
						]
					);

					 $this->add_control(
						'card_bgcolor_template2_version2_hover',
						[
							'label' 	=> esc_html__( 'Background Color Version 2 Hover', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-box.ova-icon-box-template2.version2.ova-icon-box-active:hover:after' => 'background-color: {{VALUE}};',
							],
							'condition' => [
								'template' => 'template2'
							]
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow_card_hover',
							'label' => __( 'Box Shadow Hover', 'infetech' ),
							'selector' => '{{WRAPPER}} .ova-icon-box:hover',
						]
				    );

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

			$this->add_control(
				'card_hover_animation',
				[
					'label' => __( 'Hover Animation', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
					'prefix_class' => 'elementor-animation-',
					'default'      => 'float',
					'separator'    => 'before'
				]
			);

		    $this->add_responsive_control(
	            'card_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
            
            // Box Background Image
	        $this->add_responsive_control(
	            'box_background_image_heading',
	            [
	                'label' 		=> esc_html__( 'Box Background Image', 'infetech' ),
	                'type' 			=> Controls_Manager::HEADING,
	                'condition' => [
						'template' => [
							'template2',
						]
					],
					'separator' => 'before'
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
							'max' => 0.5,
							'step' => 0.02,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box:hover .mask' => 'opacity: {{SIZE}};',
						'{{WRAPPER}} .ova-icon-box.ova-icon-box-active .mask' => 'opacity: {{SIZE}};',
					],
					'condition' => [
						'template' => [
							'template2',
						]
					]
				]
			);

			// 2 Triangle Background 
	        $this->add_responsive_control(
	            'triangle_tempalte4',
	            [
	                'label' 		=> esc_html__( 'Triangle Hover', 'infetech' ),
	                'type' 			=> Controls_Manager::HEADING,
	                'condition' => [
						'template' => 'template4'
					]
	            ]
	        );

	            $this->add_control(
					'triangle1_boder_color',
					[
						'label' 	=> esc_html__( 'Triangle 1 Color', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-icon-box-template4 .triangle-topleft-1' => 'border-top-color: {{VALUE}};',
						],
						 'condition' => [
							'template' => 'template4'
						]
					]
				);

				$this->add_control(
					'triangle2_boder_color',
					[
						'label' 	=> esc_html__( 'Triangle 2 Color', 'infetech' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-icon-box-template4 .triangle-topleft-2' => 'border-top-color: {{VALUE}};',
						],
						 'condition' => [
							'template' => 'template4'
						]
					]
				);

        $this->end_controls_section();
		/* End icon box style */
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$template         =    $settings['template'];
		$version          =    isset( $settings['version'] ) 		 ? $settings['version'] 		: 'version1';
		$active           =    isset( $settings['icon_box_active'] ) ? $settings['icon_box_active'] : '';

		$title            =    $settings['title'];
		$description      =    $settings['description'];
		$class_icon       =    $settings['class_icon']['value'];
		$link             =    $settings['link'];
		$nofollow         =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target           =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : '';

		$url_bg_image     =    ( isset( $settings['background_image_box'] ) && $settings['background_image_box'] ) ? $settings['background_image_box']['url'] : '';  

		 ?>
            
            <?php if( $template === 'template1' ) :?>

	            <div class="ova-icon-box ova-icon-box-<?php echo esc_attr( $template ); ?>">
	                <?php if (!empty( $class_icon )): ?>
		            	<div class="icon">
		            		<?php 
							    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
							?>
		            	</div>
		            <?php endif;?>

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
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

		 	<?php elseif( $template === 'template2' ) :?>

		 	    <div class="ova-icon-box ova-icon-box-<?php echo esc_attr( $template ); ?> <?php echo esc_attr( $version ); ?> <?php if( $active === 'yes' ) echo 'ova-icon-box-active'?>">

                    <div class="mask"
	                    <?php if (!empty( $url_bg_image )): ?> 
			 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ) ; ?>)"
			 	    	<?php endif;?>
                    >	
                    </div>

                    <?php if( $version == 'version2'): ?>
						<?php if (!empty( $class_icon )): ?>
			            	<div class="icon">
			            		<?php 
								    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
								?>
			            	</div>
			            <?php endif;?>
			        <?php endif; ?>
                    
                    <div class="box-info">
                    	<?php if(!empty( $link['url'])) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
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
                    
                    <?php if( $version == 'version1'): ?>
						<?php if (!empty( $class_icon )): ?>
			            	<div class="icon">
			            		<?php 
								    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
								?>
			            	</div>
			            <?php endif;?>
			        <?php endif; ?>
			    </div>

			<?php elseif( $template === 'template3' ) :?>

			    <div class="ova-icon-box-<?php echo esc_attr( $template ); ?>">

                    <?php if (!empty( $class_icon )): ?>
                    	<div class="icon">
                    		<?php 
							    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
							?> 
                    	</div>
		            <?php endif;?>

			    </div>

			<?php elseif( $template === 'template4' ) :?>

			    <div class="ova-icon-box ova-icon-box-<?php echo esc_attr( $template ); ?>">
			    	<div class="triangle-topleft-1"></div>
			    	<div class="triangle-topleft-2"></div>

                    <?php if (!empty( $class_icon )): ?>
		            	<?php 
						    \Elementor\Icons_Manager::render_icon( $settings['class_icon'], [ 'aria-hidden' => 'true' ] );
						?> 
		            <?php endif;?>

		            <?php if(!empty( $link['url'])) : ?>
					  <a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
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

			<?php endif;?>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Ova_Icon_Box() );