<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Ova_Icon_List extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_ova_icon_list';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Icon List', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-bullet-list';
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
					]
				]
			);

			$this->add_control(
				'number_column',
				[
					'label' => esc_html__( 'Number Column', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'one_column',
					'options' => [
						'one_column' => esc_html__('Single Column', 'infetech'),
						'two_column' => esc_html__('2 Columns', 'infetech'),
					]
				]
			);
            
            $repeater_1 = new \Elementor\Repeater();

			$repeater_1->add_control(
				'class_icon_1',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'flaticon flaticon-network',
						'library' 	=> 'flaticon',
					],
				]
			);
				
			$repeater_1->add_control(
				'title_1',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Website Development', 'infetech' ),
				]
			);

			$repeater_1->add_control(
				'link_1',
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
				'items_1',
				[
					'label' => esc_html__( 'List Content', 'infetech' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_1->get_controls(),
					'default' => [
						[	
							'title_1'      => esc_html__( 'Website Development', 'infetech' ),
							'class_icon_1' => [
								'value'    => 'flaticon flaticon-programming',
								'library'  => 'flaticon'
							] 
						],
						[	
							'title_1'      => esc_html__( 'Internal Networking', 'infetech' ),
						],
					],
					'title_field' => '{{{ title_1 }}}',
					'condition' => [
						'template' 	=> 'template1',
					],
				]
			);


			$repeater_2 = new \Elementor\Repeater();

			$repeater_2->add_control(
				'text_number',
				[
					'label' => esc_html__( 'Text Number', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' =>  esc_html__( '01', 'infetech' ),
					
				]
			);

			$repeater_2->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", 'infetech' ),
				]
			);

			$this->add_control(
				'items_2',
				[
					'label' => esc_html__( 'List Content', 'infetech' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_2->get_controls(),
					'default' => [
						[	
							'text_number'  => esc_html__( '01', 'infetech' ),
						],
						[	
							'text_number'  => esc_html__( '02', 'infetech' ),
						],
					],
					'title_field' => '{{{ text_number }}}',
					'condition' => [
						'template' 	=> 'template2',
					],
				]
			);

			$this->add_responsive_control(
				'align',
				[
					'label' 	=> esc_html__( 'Alignment', 'infetech' ),
					'type' 		=> Controls_Manager::CHOOSE,
					'options' 	=> [
						'start' 	=> [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'end' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list' => 'justify-items: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

        //******Title template1 style*****/
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => [
						'template1',
					], 
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-icon-list .item .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .title, {{WRAPPER}} .ova-icon-list .item .title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' => esc_html__( 'Color Hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item:hover .title, {{WRAPPER}} .ova-icon-list .item:hover .title a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******Icon template1 style*****/
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => [
						'template1',
					], 
				]
			]
		);

            $this->add_responsive_control(
				'icon_size',
				[
					'label' 		=> esc_html__( 'Icon Size', 'infetech' ),
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
						'{{WRAPPER}} .ova-icon-list .item .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_icons_style' );
				
				$this->start_controls_tab(
		            'tab_icon_list_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_icon',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item .icon i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_icon',
						[
							'label' => esc_html__( 'Background Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item .icon' => 'background-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_list_hover',
		            [
		                'label' => esc_html__( 'Hover', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_icon_hover',
						[
							'label' => esc_html__( 'Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item:hover .icon i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_icon_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item:hover .icon' => 'background-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		     $this->end_controls_tabs();

			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //******text number template2 style*****/
		$this->start_controls_section(
			'section_text_number_style',
			[
				'label' => esc_html__( 'Text Number', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => [
						'template2',
					], 
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_number_typography',
					'selector' => '{{WRAPPER}} .ova-icon-list .item .text-number-wrapper .text-number',
				]
			);

			$this->add_responsive_control(
				'text_number_bgsize',
				[
					'label' 		=> esc_html__( 'Background Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 65,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .text-number-wrapper .text-number' => 'min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_text_number_style' );
				
				$this->start_controls_tab(
		            'tab_text_number_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_text_number',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item .text-number-wrapper .text-number' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_text_number',
						[
							'label' => esc_html__( 'Background Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item .text-number-wrapper .text-number' => 'background-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_text_number_hover',
		            [
		                'label' => esc_html__( 'Hover', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_text_number_hover',
						[
							'label' => esc_html__( 'Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item:hover .text-number-wrapper .text-number' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bgcolor_text_number_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-list .item:hover .text-number-wrapper .text-number' => 'background-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

			$this->add_responsive_control(
				'margin_text_number',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .text-number-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

         //******Text template2 style*****/
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => [
						'template2',
					], 
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'selector' => '{{WRAPPER}} .ova-icon-list .item .text',
				]
			);

			$this->add_control(
				'color_text',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .text' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_text',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list .item .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

        //****** Ova Icon list item style*****/
		$this->start_controls_section(
			'section_icon_list_style',
			[
				'label' => esc_html__( 'Icon List', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
				'space_beetween',
				[
					'label' 		=> esc_html__( 'Space Beetween', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-list' => 'grid-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

        $template            =    $settings['template'];
        $number_column       =    $settings['number_column'];
		$items_1             =    $settings['items_1'];
        $items_2             =    $settings['items_2'];

		 ?>

		 	<?php if ( $template === 'template1' ) : ?>

	            <div class="ova-icon-list ova-icon-list-<?php echo esc_attr($template) ;?> <?php echo esc_attr($number_column) ;?>">
	            	
			         <?php 
			           foreach( $items_1 as $item_1 ) { 
			               $class_icon =    $item_1['class_icon_1'];
			           	   $title      =    $item_1['title_1'];
						   $link       =    $item_1['link_1'];
						   $nofollow   =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : '';
			               $target     =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '';  
					  
				    ?>

					<div class="item">
						<?php if ( !empty ($class_icon)) : ?>
							<div class="icon">
								<?php 
								    \Elementor\Icons_Manager::render_icon( $class_icon, [ 'aria-hidden' => 'true' ] );
								?> 
							</div>
						<?php endif; ?>

						<?php if ( !empty ($title)) : ?>
							<h3 class="title">
										
			                    <?php if ( $link['url'] != '' ): ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo esc_html( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
										<?php echo esc_html( $title ); ?>
									</a>
							    <?php else: ?>
									<?php echo esc_html( $title ); ?>
							    <?php endif; ?>

							</h3>
						<?php endif; ?>
					</div>

					<?php } ?>

				</div>

			<?php elseif( $template === 'template2' ) : ?>
                 <div class="ova-icon-list ova-icon-list-<?php echo esc_attr($template) ;?> <?php echo esc_attr($number_column) ;?>">
	            	
			         <?php 
			            foreach( $items_2 as $item_2 ) { 
			               $text_number  =    $item_2['text_number'];
			           	   $text         =    $item_2['text']; 
				    ?>

					<div class="item">
						<?php if ( !empty ($text_number)) : ?>
							<div class="text-number-wrapper">
								<span class="text-number">
									<?php echo esc_html( $text_number ); ?>
								</span>
							</div>
						<?php endif; ?>

						<?php if ( !empty ($text)) : ?>
							<p class="text">
								<?php echo esc_html($text) ; ?>
							</p>
						<?php endif; ?>
					</div>

					<?php } ?>

				</div>
		 	<?php endif; ?>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Ova_Icon_List() );