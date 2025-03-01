<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Ova_Image_Box extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_ova_image_box';
	}

	public function get_title() {
		return esc_html__( 'Ova Image Box', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
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
				'image',
				[
					'label' => esc_html__( 'Image', 'infetech' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-check-circle',
						'library' => 'fa-solid',
					],
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Graph', 'infetech' ),
					'placeholder' => esc_html__( 'Type your title here', 'infetech' ),
				]
			);

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
					'options' => [ 'url', 'is_external', 'nofollow' ],
					'default' => [
						'url' => '',
						'is_external' => false,
						'nofollow' => false,
					],
					'dynamic' => [
						'active' => true,
					],
				]
			);

			$this->add_control(
				'tag',
				[
					'label' => esc_html__( 'HTML Tag', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h2',
					'options' => [
						'h1' => esc_html__( 'H1', 'infetech' ),
						'h2' => esc_html__( 'H2', 'infetech' ),
						'h3' => esc_html__( 'H3', 'infetech' ),
						'h4' => esc_html__( 'H4', 'infetech' ),
						'h5' => esc_html__( 'H5', 'infetech' ),
						'h6' => esc_html__( 'H6', 'infetech' ),
						'div' => esc_html__( 'div', 'infetech' ),
						'span' => esc_html__( 'span', 'infetech' ),
						'p' => esc_html__( 'p', 'infetech' ),
					],
				]
			);

			$this->add_control(
				'image_v2',
				[
					'label' => esc_html__( 'Image 2', 'infetech' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'condition' => [
						'template' => 'template2'
					]
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
						'{{WRAPPER}} .ova-image-box' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_section',
			[
				'label' => esc_html__( 'General', 'infetech' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		   $this->add_responsive_control(
				'general_max_width',
				[
					'label' => esc_html__( 'Max Width', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 600,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-box' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'general_background_color',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'general_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .ova-image-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'general_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .ova-image-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'general_border',
					'selector' => '{{WRAPPER}} .ova-image-box',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'general_box_shadow',
					'selector' => '{{WRAPPER}} .ova-image-box',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'icon_options',
				[
					'label' => esc_html__( 'Icon', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

				$this->add_responsive_control(
					'icon_size',
					[
						'label' => esc_html__( 'Size', 'infetech' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em', 'rem' ],
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
							'{{WRAPPER}} .ova-image-box .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'icon_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .icon i' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'icon_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem' ],
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'title_options',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'title_typography',
						'selector' => '{{WRAPPER}} .ova-image-box .title',
					]
				);

				$this->add_control(
					'title_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .title' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'title_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem' ],
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->add_control(
				'sub_title_options',
				[
					'label' => esc_html__( 'Sub Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'sub_title_typography',
						'selector' => '{{WRAPPER}} .ova-image-box .sub-title',
					]
				);

				$this->add_control(
					'sub_title_color',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .sub-title' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_responsive_control(
					'sub_title_margin',
					[
						'label' => esc_html__( 'Margin', 'infetech' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem' ],
						'selectors' => [
							'{{WRAPPER}} .ova-image-box .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$template    =  $settings['template'];

		$title 		 = 	$settings['title'];
		$tag 		 = 	$settings['tag'];
		$sub_title   = 	$settings['sub_title'];	

		$image 		 = 	$settings['image'];
		$url		 = 	$settings['image']['url'];
		$image_alt 	 =  ( isset( $settings['image']['alt']) &&  $settings['image']['alt'] != '' ) ?  $settings['image']['alt'] : $title;

		$image_v2 	  =  isset( $settings['image_v2'] ) ? $settings['image_v2'] : '' ;
		$url_v2		  =  isset( $settings['image_v2'] ) ? $settings['image_v2']['url'] : '';
		$image_alt_v2 =  ( isset( $settings['image_v2']['alt']) &&  $settings['image_v2']['alt'] != '' ) ?  $settings['image_v2']['alt'] : $title;

		$link        =  $settings['link'];
		$nofollow    =  ( isset( $link['nofollow'] ) && $link['nofollow'] == 'on' ) ? 'nofollow' : '';
		$target      =  ( isset( $link['is_external'] ) && $link['is_external'] == 'on' ) ? '_blank' : '_self';

		?>

		<div class="ova-image-box ova-image-box-<?php echo esc_attr( $template ); ?>">
            
            <?php if($template == 'template1') { ?>

				<div class="title-icon">

					<?php if( !empty($settings['icon']['value']) ) { ?>
						<div class="icon">
		            		<i class="<?php echo esc_attr($settings['icon']['value'])?>" aria-hidden="true"></i>  		
		            	</div>
					<?php } ?>

					<?php if( !empty($link['url'])) : ?>
						<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($nofollow);?>">
					<?php endif; ?>

						<?php if( !empty( $title ) ) { ?>
							<<?php echo esc_html( $tag ); ?> class="title"><?php echo esc_html( $title ); ?></<?php echo esc_html( $tag ); ?>>
						<?php } ?>

					<?php if( !empty($link['url'])) : ?>
						</a>
					<?php endif; ?>

				</div>

				<?php if( !empty( $sub_title ) ) : ?>
					<p class="sub-title">
						<?php echo esc_html($sub_title);?>
					</p>
				<?php endif; ?>	

			<?php } ?>
			


			<?php if( !empty( $url ) ) : ?>
				<img class="img" src="<?php echo esc_attr( $url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
			<?php endif; ?>	
            

			<?php if($template == 'template2') { ?>

				<?php if( !empty($link['url'])) : ?>
					<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($nofollow);?>">
				<?php endif; ?>

					<?php if( !empty( $title ) ) { ?>
						<<?php echo esc_html( $tag ); ?> class="title"><?php echo esc_html( $title ); ?></<?php echo esc_html( $tag ); ?>>
					<?php } ?>

				<?php if( !empty($link['url'])) : ?>
					</a>
				<?php endif; ?>

				<?php if( !empty( $sub_title ) ) : ?>
					<p class="sub-title">
						<?php echo esc_html($sub_title);?>
					</p>
				<?php endif; ?>	

			<?php } ?>
			

			<?php if( ($template == 'template2') && !empty( $url_v2 ) ) : ?>
				<img class="img2" src="<?php echo esc_attr( $url_v2 ); ?>" alt="<?php echo esc_attr( $image_alt_v2 ); ?>">
			<?php endif; ?>	

		</div>

		<?php
	}
}

$widgets_manager->register( new Infetech_Elementor_Ova_Image_Box() );