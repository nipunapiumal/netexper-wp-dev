<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Testimonial_3 extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_testimonial_3';
	}

	public function get_title() {
		return esc_html__( 'Testimonial 3', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-testimonial3' ];
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
					]
				]
			);

			$repeater = new \Elementor\Repeater();
                
                $repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Through a unique combination of engineering, construction design disciplines and expertise, Concor delivers world class infrastructure solutions.', 'infetech' ),
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
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Robert M. Borne', 'infetech'),
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('CEO & Founder', 'infetech'),
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
							'name_author' => esc_html__('Robert M. Borne', 'infetech'),
						],
						[
							'name_author' => esc_html__('Leslie J. Weller', 'infetech'),
							'job' => esc_html__('Senior Manager', 'infetech'),
						],
						[
							'name_author' => esc_html__('Mike hardson', 'infetech'),
						],
					],
					'title_field' => '{{{ name_author }}}',
				]
			);

		$this->add_control(
			'show_rating',
			[
				'label'   => esc_html__( 'Show Rating', 'infetech' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'infetech' ),
					'no'  => esc_html__( 'No', 'infetech' ),
				],
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
					'default'     => 1,
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
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();


		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__( 'General', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);  

            $this->add_responsive_control(
				'content_max_width',
				[
					'label' => esc_html__( 'Max Width', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 380,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 50,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info' => 'max-width: {{SIZE}}{{UNIT}};',
					],	
				]
			);

            $this->add_control(
				'background_item_color',
				[
					'label'     => esc_html__( 'Background Item', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info' => 'background : {{VALUE}};',	
					],
				]
			);

		    $this->add_responsive_control(
				'background_item_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'background_item_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_content',
					'label' => __( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .owl-item .client_info ',
				]
		    );

		$this->end_controls_section();

		/*************  SECTION  avatar. *******************/
		$this->start_controls_section(
			'section_avatar',
			[
				'label' => esc_html__( 'Avatar', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'avatar_size',
				[
					'label' => esc_html__( 'Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 30,
							'max' => 120,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .client img' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
					],	
				]
			);

			$this->add_responsive_control(
				'avatar_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .client' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		/*************  SECTION NAME AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name',
			[
				'label' => esc_html__( 'Author Name', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .name',
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end section author  ###############

		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_job',
			[
				'label' => esc_html__( 'Job', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .info .name-job .job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section job  ###############

		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info p.evaluate',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info p.evaluate' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info p.evaluate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info p.evaluate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		
		###############  stars style section  ###############
		$this->start_controls_section(
			'section_stars_style',
			[
				'label' => esc_html__( 'Rating Stars', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_rating' => 'yes'
				]
			]
		);

			$this->add_responsive_control(
				'icon_space',
				[
					'label' => esc_html__( 'Spacing', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 20,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .rating-icon i' => 'margin-right: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'stars_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .client_info .rating-icon i' => 'color: {{VALUE}}',
						
					],
				]
			);

		$this->end_controls_section();

		// STYLE QUOTE dot
		$this->start_controls_section(
			'section_dot_control',
			[
				'label' => esc_html__( 'Dot Control', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dot_control' => 'yes',
				],
			]
		);

			$this->add_control(
				'dot_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .owl-dots .owl-dot span' => 'background-color : {{VALUE}};',
					],
					
				]
			);

			$this->add_control(
				'dot_color_active',
				[
					'label'     => esc_html__( 'Color Active', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .owl-dots .owl-dot.active span' => 'background-color : {{VALUE}};',
					],
					
				]
			);

			$this->add_responsive_control(
				'dot_control_size',
				[
					'label' => esc_html__( 'Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'dot_control_active_size',
				[
					'label' => esc_html__( 'Active Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						]
					],
					
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-3 .slide-testimonials-3 .owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}};',
					],
					
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$template = $settings['template'];
		$tab_item = $settings['tab_item'];

		$show_rating = $settings['show_rating'];
			
		$data_options['items'] 				= $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;
		$data_options['rtl']				= is_rtl() ? true: false;

	?>

		<section class="ova-testimonial-3 ova-testimonial-3-<?php echo esc_attr( $template ); ?>">

			<div class="slide-testimonials-3 owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)); ?>">

				<?php if( !empty($tab_item) ) : foreach ($tab_item as $item) : ?>

					<div class="item">

						<div class="client_info">

							<?php if( $item['testimonial'] != '' ) : ?>
								<p class="evaluate">
									<?php echo esc_html($item['testimonial']); ?>
								</p>
							<?php endif; ?>
				
							<div class="info">
                                
                                <?php if($template == 'template2') { ?>
								<div class="avatar-info">
								<?php } ?>
									<div class="client">
										<?php if( $item['image_author'] != '' ) { ?>
											<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','infetech' ); ?>
											<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
										<?php } ?>
									</div>

									<div class="name-job">
										
										<?php if( $item['name_author'] != '' ) { ?>
											<h4 class="name second_font">
												<?php echo esc_html($item['name_author']) ?>
											</h4>
										<?php } ?>

										<?php if( $item['job'] != '' ) { ?>
											<p class="job">
												<?php echo esc_html($item['job']) ?>
											</p>
										<?php } ?>

										<!-- rating -->
										<?php if($show_rating == 'yes') { ?>
											<div class="rating-icon">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
										<?php } ?>
										<!-- end rating -->

									</div>
								<?php if($template == 'template2') { ?>
								</div>
								<?php } ?>

								<?php if($template == 'template2') { ?>
									<i aria-hidden="true" class="quote-icon ovaicon-right-quote"></i>
								<?php } ?>

							</div>
							
						</div>

					</div>

				<?php endforeach; endif; ?>

			</div>

		</section>
		
		<?php
	}

}

$widgets_manager->register( new Infetech_Elementor_Testimonial_3() );