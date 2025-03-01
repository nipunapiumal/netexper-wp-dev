<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Testimonial_2 extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_testimonial_2';
	}

	
	public function get_title() {
		return esc_html__( 'Testimonial 2', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-testimonial';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.css' );
		wp_enqueue_style( 'slick-carousel-theme', get_template_directory_uri().'/assets/libs/slick/slick-theme.css' );
		wp_enqueue_script( 'slick-carousel', get_template_directory_uri().'/assets/libs/slick/slick.min.js', array('jquery'), false, true );
		return ['infetech-elementor-testimonial2'];
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
				'sub_title',
				[
					'label' 	=> esc_html__( 'Sub Title', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Client Testimonials', 'infetech' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( "What They're Talking", 'infetech' ),
				]
			);
			
            $this->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon Quote', 'infetech' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-left-quotes-sign',
						'library' 	=> 'ovaicon',
					],
				]
			);

			// Add Class control
			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,

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
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'infetech' ),
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
								'name_author' => esc_html__('Shirley Smith', 'infetech'),
								'job' => esc_html__('Senior Designer', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum eu fugiat nulla pariatur.', 'infetech'),
							],
							[
								'name_author' => esc_html__('Aleesha Smith', 'infetech'),
								'job' => esc_html__('Senior Designer', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum eu fugiat nulla pariatur.', 'infetech'),
							],
							[
								'name_author' => esc_html__('Mike Hardson', 'infetech'),
								'job' => esc_html__('Developer', 'infetech'),
								'testimonial' => esc_html__('This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum eu fugiat nulla pariatur.', 'infetech'),
							],
						],
						'title_field' => '{{{ name_author }}}',
					]
				);

		$this->end_controls_section();

		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

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

		/****************************  END SECTION ADDITIONAL *********************/

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
					'selector' 	=> '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .sub-title',
				]
			);

			$this->add_control(
				'sub_title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .sub-title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'sub_title_before_color',
				[
					'label' 	=> esc_html__( 'Before Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .sub-title .underlined' => 'background-color: {{VALUE}}',
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
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' 	=> '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .title',
				]
			);


			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .title' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/* End Title Style */

		/* Begin icon quote Style */
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
							'max' => 60,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .client .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);
                     
             $this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .client .icon i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_template5_icon',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient',],
					'selector' => '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .client .icon',
				]
			);

	        $this->add_responsive_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .client .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'icon_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .client .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End icon quote style */

		/*************  SECTION NAME JOB AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name_job',
			[
				'label' => esc_html__( 'Author Name - Job', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		    $this->add_responsive_control(
				'name_job_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .name-job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		    $this->add_control(
				'author_name_heading',
				[
					'label'     => esc_html__( 'Author Name', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .name-job .name',
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'job_heading',
				[
					'label'     => esc_html__( 'Job', 'infetech' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .name-job .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section name job author  ###############


		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'infetech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info p.ova-evaluate',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info p.ova-evaluate' => 'color : {{VALUE}};',
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
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .client-info p.ova-evaluate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############

		/* Begin Nav Arrow Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Arrows Control', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->add_responsive_control(
				'size_nav_icon',
				[
					'label' 		=> esc_html__( 'Icon Size', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 30,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next:before, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev:before' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'arrow_padding',
				[
					'label'      => esc_html__( 'Padding', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'arrow_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_nav_style' );
				
				$this->start_controls_tab(
		            'tab_nav_normal',
		            [
		                'label' => esc_html__( 'Normal', 'infetech' ),
		            ]
		        );

		            $this->add_control(
						'color_nav_icon',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next:before, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev:before' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_nav_border',
						[
							'label' => esc_html__( 'Color Border', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev' => 'border-color : {{VALUE}};',
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
						'color_nav_icon_hover',
						[
							'label' => esc_html__( 'Color Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next:hover:before, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev:hover:before' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_nav_border_hover',
						[
							'label' => esc_html__( 'Color Border Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-next:hover, {{WRAPPER}} .ova-testimonial-2 .slide-testimonials-2 .slick-prev:hover' => 'border-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

        $this->end_controls_section();
        /* End Nav Arrow Style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$tab_item     =    $settings['tab_item'];
		$title 		  =    $settings['title'];
		$sub_title 	  =    $settings['sub_title'];
		$class_icon   =    $settings['class_icon']['value'];
		
		// carousel data option
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplay_speed']     = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['rtl']				= is_rtl() ? true: false;

		 ?>
         
         <div class="ova-testimonial-2">

            <div class="slide-for">
            	<?php if(!empty($tab_item)) : foreach ($tab_item as $k => $item) :  if ($k >= 3) break; ?>
            		<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','infetech' ); ?>
	         	    <div class="small-img">
						<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>">
					</div>	
				<?php endforeach; endif; ?>
			</div>

			<div class="slide-testimonials-2 " data-options="<?php echo esc_attr(json_encode($data_options)) ; ?>">

				<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
					<div class="item">
						<div class="client-info">

							<div class="client">
								<?php if( $item['image_author'] != '' ) { ?>
									<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','infetech' ); ?>
									<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
								<?php } ?>
								<?php if (!empty( $class_icon )): ?>
					            	<div class="icon">
					            		<i class="<?php echo esc_attr( $class_icon ); ?>"></i>
					            	</div>
					            <?php endif;?>
							</div>

							<div class="info">

								<?php if ( $sub_title ): ?>
									<h2 class="sub-title">
										<span class="underlined"></span>
										<?php echo esc_html( $sub_title ); ?>
									</h2>	
								<?php endif; ?>

                                <?php if ( $title ): ?>
								    <h3 class="title">
									   <?php echo esc_html( $title ); ?>
									</h3>
								<?php endif; ?>

								<?php if( $item['testimonial'] != '' ) : ?>
									<p class="ova-evaluate">
										<?php echo esc_html($item['testimonial']) ; ?>
									</p>
								<?php endif; ?>

								<div class="name-job">
									<?php if( $item['name_author'] != '' ) { ?>
										<p class="name second_font">
											<?php echo esc_html($item['name_author']) ; ?>
										</p>
									<?php } ?>

									<?php if( $item['job'] != '' ) { ?>
										<p class="job">
											<?php echo esc_html($item['job'])  ; ?>
										</p>
									<?php } ?>
								</div>
							</div><!-- end info -->

						</div>
					</div>
	
				<?php endforeach; endif; ?>
			</div>

		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Testimonial_2() );