<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Service_4 extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_service_4';
	}

	
	public function get_title() {
		return esc_html__( 'Service 4', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-image-box';
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
					],
				]
			);

			$this->add_control(
				'service_item_active',
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
					],
				]
			);

		    $this->add_control(
				'background_image',
				[
					'label'   => esc_html__( 'Background Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
				]
			);

			$this->add_control(
				'text_number',
				[
					'label' => esc_html__( 'Text Number', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '01', 'infetech' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Gaming and Entertainment', 'infetech' ),
					'condition' =>[
						'template' => 'template1'
					],
				]
			);

			$this->add_control(
				'title_v2',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Product Designing', 'infetech' ),
					'condition' =>[
						'template' => 'template2'
					],
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
				]
			);

			$this->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in form.', 'infetech' ),
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'description_v2',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'We create vibrant, intuitive and minimalist product designs.', 'infetech' ),
					'condition' => [
						'template' => 'template2'
					]
				]
			);

		$this->end_controls_section();

		/* Begin background image Style */
		$this->start_controls_section(
            'bg_image_style',
            [
                'label' => esc_html__( 'Background Image', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
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
							'max' => 0.8,
							'step' => 0.02,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:before' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_control(
				'background_image_overlay_color',
				[
					'label' 	=> esc_html__( 'Overlay Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:before' => 'background-color: {{VALUE}};',
					],
				]
			);

	    $this->end_controls_section();

		/* Begin text number Style */
		$this->start_controls_section(
            'textnumber_style',
            [
                'label' => esc_html__( 'Text Number', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'textnumber_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-4 .text-number-wrapper .text_number',
				]
			);

			$this->add_control(
				'textnumber_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4 .text-number-wrapper .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4 .text-number-wrapper .text_number' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template1'
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_textnumber_bgcolor_gradient',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ova-service-4.service-template2 .text-number-wrapper',
					'condition' => [
						'template' => 'template2'
					],
				]
			);

			$this->add_control(
				'textnumber_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:hover .text-number-wrapper .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:hover .text-number-wrapper .text_number' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template1'
					],
				]
			);

			$this->add_control(
				'heading_background_textnumber_hover',
				[
					'label' => esc_html__( 'Background Hover', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_textnumber_bgcolor_gradient_hover',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ova-service-4.service-template2:hover .text-number-wrapper',
					'condition' => [
						'template' => 'template2'
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
	                    '{{WRAPPER}} .ova-service-4 .text-number-wrapper .text_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();

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
					'selector' 	=> '{{WRAPPER}} .ova-service-4 .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4 .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:hover .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_title',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ova-service-4 .title',
				]
			);

			$this->add_control(
				'heading_background_title_hover',
				[
					'label' => esc_html__( 'Background Hover', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_title_hover',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ova-service-4.service-template2:hover .title',
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-4 .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-service-4 .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'template' => 'template2'
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
					'selector' 	=> '{{WRAPPER}} .ova-service-4 .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4 .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-4:hover .description' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-service-4 .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */
		
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();
		$template 	= $settings['template'];
		$active     = $settings['service_item_active'] == 'yes'  ? 'active' : '';
		if( $template == 'template1'){
			$title            =    $settings['title'];
			$description      =    $settings['description'];
		} else {
			$title            =    $settings['title_v2'];
			$description      =    $settings['description_v2'];
		}
		
		$text_number      =    $settings['text_number'];
		$link             =    $settings['link'];
		$nofollow         =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target           =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : '';

		// get url background image
		$url_bg_image   =   ( isset( $settings['background_image'] ) && $settings['background_image'] ) ? $settings['background_image']['url'] : '';  

		 ?>

		 	<div class="ova-service-4 service-<?php echo esc_attr( $template ); ?> <?php echo esc_attr( $active ); ?>" 
		 	    <?php if (!empty( $url_bg_image )): ?> 
	 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ) ; ?>)"
	 	    	<?php endif;?>
		 	>
                
                <?php if (!empty( $text_number )): ?>
                	<div class="text-number-wrapper">
	            	    <span class="text_number"><?php echo esc_html( $text_number ); ?></span>
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

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Service_4() );