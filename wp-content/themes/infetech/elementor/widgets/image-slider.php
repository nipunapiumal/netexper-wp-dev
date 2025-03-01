<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Image_Slider extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_image_slider';
	}

	public function get_title() {
		return esc_html__( 'Ova Image Slider', 'infetech' );
	}

	public function get_icon() {
		return ' eicon-slider-push';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-image-slider' ];
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
				'list_image',
				[
					'label' => esc_html__( 'Add Images', 'infetech' ),
					'type' => \Elementor\Controls_Manager::GALLERY,
					'default' => [],
				]
			);

		$this->end_controls_section();

		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'infetech' ),
			]
		);

		/***************************  VERSION  ***********************/
			$this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,	
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
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);
			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/
		

		/*************  STYLE SECTION GENERAL  *******************/
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'image_color',
				[
					'label' => esc_html__( ' Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'brightness(1)',
					'options' => [
						'brightness(0) invert(1)' => esc_html__( 'White', 'infetech' ),
						'brightness(1)'  => esc_html__( 'Normal', 'infetech' ),
					],
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel img' => 'filter:{{VALUE}} ;',
					],
				]
			);

			$this->add_control(
				'image_max_width',
				[
					'label' 		=> esc_html__( 'Max Width', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 100,
							'max' 	=> 300,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-images-slider.owl-carousel img' => 'max-width:{{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'image_max_height',
				[
					'label' 		=> esc_html__( 'Max Height', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 100,
							'max' 	=> 300,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-images-slider.owl-carousel img' => 'max-height:{{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'general_image_opacity',
				[
					'label' => esc_html__( ' Opacity', 'infetech' ),
					'type' 	=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel img' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_control(
				'general_image_hover_opacity',
				[
					'label' => esc_html__( 'Hover Opacity', 'infetech' ),
					'type' 	=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-item:hover img' => 'opacity: {{SIZE}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end section GENERAL  ###############
		
		/*************  SECTION DOTs. *******************/
		$this->start_controls_section(
			'section_dot',
			[
				'label' => esc_html__( 'Dots', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dot_control' => 'yes',
				]
			]
		);

			$this->add_control(
				'dot_color',
				[
					'label'     => esc_html__( 'Dot Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-dots button' => 'background-color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'dot_active_color',
				[
					'label'     => esc_html__( 'Dot Active Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-dots button.active' => 'background-color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'dot_width',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 1,
							'max' 	=> 100,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-dots button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'dots_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-dots button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end section dot  ###############
		
		
		/*************  SECTION NAV.  *******************/
		$this->start_controls_section(
			'section_nav',
			[
				'label' => esc_html__( 'Nav', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'nav_control' => 'yes',
				]
			]
		);

			$this->add_responsive_control(
				'nav_top',
				[
					'label' => esc_html__( 'Top', 'infetech' ),
					'type' 	=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav' => 'bottom: calc(100% + {{SIZE}}{{UNIT}})',
					],
				]
			);

			$this->add_control(
				'nav_width',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 1,
							'max' 	=> 100,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			$this->add_control(
				'icon_size_nav',
				[
					'label' 		=> esc_html__( 'Icon Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 1,
							'max' 	=> 100,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);	
			
				$this->add_control(
					'nav_bg_color_',
					[
						'label'     => esc_html__( 'Background', 'infetech' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button' => 'background-color : {{VALUE}};',
						],
					]
				);	

				$this->add_control(
					'nav_bg_color_hover',
					[
						'label'     => esc_html__( 'Background Hover', 'infetech' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button:hover' => 'background-color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'bg_icon_color',
					[
						'label'     => esc_html__( 'Icon', 'infetech' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button i' => 'color : {{VALUE}};',
						],
					]
				);			

				$this->add_control(
					'nav_bg_icon_color_hover',
					[
						'label'     => esc_html__( 'Icon Hover', 'infetech' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-images-slider.owl-carousel .owl-nav button:hover i' => 'color : {{VALUE}};',
						],
					]
				);

		$this->end_controls_section();
		###############  end section nav  ###############
	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

		$list_image 						= 	$settings['list_image'];

		$data_options['items']              = 	$settings['item_number'] ? $settings['item_number'] : 6;
		$data_options['slideBy']            = 	$settings['slides_to_scroll'];
		$data_options['margin']             = 	$settings['margin_items'] ? $settings['margin_items'] : 0;
		$data_options['autoplayHoverPause'] = 	$settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = 	$settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = 	$settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = 	$settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
		$data_options['smartSpeed']         = 	$settings['smartspeed'] ? $settings['smartspeed'] : '500';
		$data_options['dots']               = 	$settings['dot_control'] === 'yes' ? true : false;
		$data_options['nav']               	= 	$settings['nav_control'] === 'yes' ? true : false;
		$data_options['rtl']				= 	is_rtl() ? true: false;

		?>

		<div class="ova-images-slider owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)); ?>" >
			<?php foreach( $list_image as $item): ?>
				<?php 					
                    $alt = get_post_meta($item['id'], '_wp_attachment_image_alt', true) ? get_post_meta($item['id'], '_wp_attachment_image_alt', true) : esc_html__('Image Slide','infetech');  
                    $caption  = wp_get_attachment_caption( $item['id'] );
                        
                    if ( $caption == '') {
                        $caption = $alt;
                    }

				?>
				
				    <div class="item-images-slider">
				    	<img src="<?php echo esc_url( $item['url'] ); ?>" alt="<?php echo esc_attr( $caption ); ?>">
				    </div>

			<?php endforeach; ?>
		</div> 	

		<?php
	}

}
$widgets_manager->register( new Infetech_Elementor_Image_Slider() );