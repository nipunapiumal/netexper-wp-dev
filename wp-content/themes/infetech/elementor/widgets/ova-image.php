<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Ova_Image extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_ova_image';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Image', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-image';
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
				'icon_class',
				[
					'label' 	=> esc_html__( 'Icon', 'infetech' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' => 'icomoon icomoon-chat',
						'library' => 'all',
					],
					'condition' => [
                		'template' => 'template2',
                	],
				]
			);
				
			$this->add_control(
				'image',
				[
					'label'   => esc_html__( 'Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
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
	                'condition' =>[
	                	'template' => 'template1',
	                ]
	            ]
	        );

			$this->add_control(
				'image1',
				[
					'label'   => esc_html__( 'Image 1', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' =>[
	                	'template' => 'template2',
	                ]
				]
			);

			$this->add_control(
				'image2',
				[
					'label'   => esc_html__( 'Image 2', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'condition' =>[
	                	'template' => 'template2',
	                ]
				]
			);

		$this->end_controls_section();


		/* Begin General Style */
		$this->start_controls_section(
            'general_style',
            [
                'label' 	=> esc_html__( 'General', 'infetech' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' => [
            		'template' => 'template2',
            	],
            ]
        );

        	$this->add_control(
				'mix_blend_mode',
				[
					'label' => esc_html__( 'Blend Mode', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'normal'  => esc_html__( 'Normal', 'infetech' ),
						'multiply' => esc_html__( 'Multiply', 'infetech' ),
						'screen' => esc_html__( 'Screen', 'infetech' ),
						'overlay' => esc_html__( 'Overlay', 'infetech' ),
						'darken' => esc_html__( 'Darken', 'infetech' ),
						'lighten' => esc_html__( 'Lighten', 'infetech' ),
						'color' => esc_html__( 'Color', 'infetech' ),
						'luminosity' => esc_html__( 'Luminosity', 'infetech' ),
						'difference' => esc_html__( 'Difference', 'infetech' ),
						'exclusion' => esc_html__( 'exclusion', 'infetech' ),
						'hue' => esc_html__( 'Hue', 'infetech' ),
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize .image-ver2 img' => 'mix-blend-mode: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'general_opacity',
				[
					'label' => esc_html__( 'Opacity', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize .image-ver2 img' => 'opacity: {{SIZE}};',
					],
					
				]
			);


        $this->end_controls_section();

		/* Begin image Style */
		$this->start_controls_section(
            'image_style',
            [
                'label' 	=> esc_html__( 'Image', 'infetech' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' =>[
	               	'template' => 'template1',
	            ]
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
						'{{WRAPPER}} .ova-image-customize a, .ova-image-customize .image-box' => 'max-width: {{SIZE}}{{UNIT}};',
					],
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
						'{{WRAPPER}} .ova-image-customize a, .ova-image-customize .image-box' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
	            'ova_image_video_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-image-customize a img, .ova-image-customize .image-box img, .ova-image-customize .overlay' 		=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_control(
				'image_overlay',
				[
					'label' => esc_html__( 'Overlay', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'image_overlay_color',
				[
					'label'     => esc_html__( 'Overlay', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize .overlay' => 'background-color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'overlay_opacity',
				[
					'label' => esc_html__( 'Overlay Opacity', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 0.3,
					],
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize .overlay' => 'opacity: {{SIZE}};',
					],
					
				]
			);

			$this->add_control(
				'image_overlay_hover',
				[
					'label' => esc_html__( 'Overlay Hover', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			
			$this->add_control(
				'image_overlay_color_hover',
				[
					'label'     => esc_html__( 'Overlay Hover', 'infetech' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize a:hover .overlay, .ova-image-customize .image-box:hover .overlay' => 'background-color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'overlay_opacity_hover',
				[
					'label' => esc_html__( 'Overlay Opacity Hover', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 0.2,
					],
					'range' => [
						'px' => [
							'max' => 1,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-customize a:hover .overlay, .ova-image-customize .image-box:hover .overlay' => 'opacity: {{SIZE}};',
					],
					
				]
			);

			
		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$template = $settings['template'];

		$image_url 	= $settings['image']['url'] ? $settings['image']['url'] : '';
		$link 		= $settings['link']['url'];
		$tg_blank 	= '';
		if ( $settings['link']['is_external'] == 'on' ) {
			$tg_blank = 'target="_blank"';
		}

		$icon 		 = $settings['icon_class'] ? $settings['icon_class'] : '';
		$image_url_a = $settings['image1']['url'] ? $settings['image1']['url'] : '';
		$image_url_b = $settings['image2']['url'] ? $settings['image2']['url'] : '';


		?>
		
		<div class="ova-image-customize">
			<?php if($template == 'template2'){ ?>
				<div class="ova-<?php echo esc_attr($template); ?>">
					<?php } ?>
					<?php if ( $link ): ?>
						<a href="<?php echo esc_url( $link ); ?>" <?php echo esc_html( $tg_blank ); ?>>
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html( $image_url ); ?>" >
							<?php if($template == 'template1'){ ?>
								<span class="overlay"></span>
							<?php } ?>
						</a>
					<?php else: ?>
						<div class="image-box">
							<?php if($template == 'template1'){ ?><img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html( $image_url ); ?>" > <?php } ?>
							<?php if($template == 'template1'){ ?>
								<span class="overlay"></span>
							<?php } ?>
							
						<?php endif; ?>

						<?php if($template == 'template2'){ ?>
							<div class="image-box-2 a">
								<img src="<?php echo esc_url($image_url_a); ?>" alt="<?php echo esc_html( $image_url ); ?>" >
							</div>
							<?php if( $icon ){ ?>
									<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] );?>
							<?php } ?>
							<div class="image-box-2 b">
								<img src="<?php echo esc_url($image_url_b); ?>" alt="<?php echo esc_html( $image_url ); ?>" >
							</div>
							
						</div>
					<?php } ?>
				</div>
				<?php if($template == 'template2'){ ?>
					<div class="image-ver2">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html( $image_url ); ?>" >
					</div>
					
				<?php } ?>
		</div>
		<?php 
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Ova_Image() );