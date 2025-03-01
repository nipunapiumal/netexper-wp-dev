<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Heading extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_heading';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Heading', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-heading';
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
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Add Your Sub Title Here', 'infetech' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'Add Your Heading Text Here', 'infetech' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> ''
				]
			);

			$this->add_control(
				'title_link',
				[
					'label' 		=> esc_html__( 'Link', 'infetech' ),
					'type' 			=> Controls_Manager::URL,
					'placeholder' 	=> esc_html__( 'https://your-link.com', 'infetech' ),
					'show_external' => true,
				]
			);

			$this->add_control(
				'html_tag',
				[
					'label' 	=> esc_html__( 'HTML Tag', 'infetech' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'h3',
					'options' 	=> [
						'h1' 	=> esc_html__('H1', 'infetech'),
						'h2' 	=> esc_html__('H2', 'infetech'),
						'h3' 	=> esc_html__('H3', 'infetech'),
						'h4'	=> esc_html__('H4', 'infetech'),
						'h5' 	=> esc_html__('H5', 'infetech'),
						'h6' 	=> esc_html__('H6', 'infetech'),
					]
				]
			);

			$this->add_responsive_control(
				'align',
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
						'justify' => [
							'title' => esc_html__( 'Justified', 'infetech' ),
							'icon' 	=> 'eicon-text-align-justify',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);


		$this->end_controls_section();


		/* Begin Sub Title Style */
		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' 	=> esc_html__( 'Sub Title', 'infetech' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'sub_title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-heading .sub-title',
				]
			);

			$this->add_control(
				'sub_title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'sub_title_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'infetech' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-heading .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-heading .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End Sub Title Style */

		/* Begin Title Style */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-heading .title',
				]
			);

			$this->start_controls_tabs(
				'style_title_tabs'
			);

				$this->start_controls_tab(
					'style_title_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'title_color_link_normal',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-heading .title a, {{WRAPPER}} .ova-heading .title' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'style_title_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_control(
						'title_color_link_hover',
						[
							'label' 	=> esc_html__( 'Color', 'infetech' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-heading .title a:hover, {{WRAPPER}} .ova-heading .title:hover' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'infetech' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ova-heading .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ova-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/* End Title Style */

				//SECTION TAB STYLE DESCRIPTION
		$this->start_controls_section(
			'section_description',
			[
				'label' => esc_html__( 'Description', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' =>[
					'description!' => '',
				],
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_description',
					'label' 	=> esc_html__( 'Typography', 'infetech' ),
					'selector' 	=> '{{WRAPPER}} .ova-heading .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label'	 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .description' => 'color : {{VALUE}};'		
					],
				]
			);

			$this->add_responsive_control(
				'padding_description',
				[
					'label' 	 => esc_html__( 'Padding', 'infetech' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-heading .description ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_description',
				[
					'label' 	 => esc_html__( 'Margin', 'infetech' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-heading .description ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE DESCRIPTION	

		/* Begin Underlined Style */
		$this->start_controls_section(
			'section_underlined_style',
			[
				'label' 	=> esc_html__( 'Underlined', 'infetech' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'underlined_background',
				[
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title .underlined' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'underlined_width',
				[
					'label' 		=> esc_html__( 'Width', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'vw' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title .underlined' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'underlined_height',
				[
					'label' 		=> esc_html__( 'Height', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%', 'vh' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
						'vh' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title .underlined' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'underlined_left',
				[
					'label' 		=> esc_html__( 'Left', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title .underlined' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'underlined_bottom',
				[
					'label' 		=> esc_html__( 'Bottom', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -500,
							'max' => 500,
							'step' => 5,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-heading .sub-title .underlined' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End Underlined Style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title 			= $settings['title'];
		$sub_title 		= $settings['sub_title'];
		$description	= $settings['description']; 
		$title_link 	= $settings['title_link']['url'];
		$target 		= $settings['title_link']['is_external'] ? ' target="_blank"' : '';

		 ?>

			<div class="ova-heading">
				
				<?php if ( !empty($sub_title) ): ?>
					<h2 class="sub-title">
						<span class="underlined"></span>
						<?php echo esc_html( $sub_title ); ?>
					</h2>	
				<?php endif; ?>

				<?php if ( !empty($title) ): ?>

					<?php echo '<'. esc_html( $settings['html_tag'] ) .' class="title">'; ?>
						<?php if ( $title_link != '' ): ?>
							<a href="<?php echo esc_url( $title_link ); ?>"<?php printf( $target ); ?> title="<?php esc_attr($title); ?>">
								<?php echo esc_html( $title ); ?>
							</a>
						<?php else: ?>
							<?php echo esc_html( $title ); ?>
						<?php endif; ?>
					<?php echo '</'. esc_html( $settings['html_tag'] ) .'>' ?>

                <?php endif; ?>

                <?php if( $description ): ?>
					<p class="description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>

			</div>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Heading() );