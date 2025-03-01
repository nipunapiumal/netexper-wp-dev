<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Text_Marquee extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_text_marquee';
	}

	public function get_title() {
		return esc_html__( 'Text Marquee', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-animation-text';
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
			
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => esc_html__( 'Text', 'infetech' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Your Text' , 'infetech' ),
					'show_label' => true,
				]
			);

			$repeater->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_content',
					'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
				]
			);

			$repeater->add_control(
				'color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
					],
				]
			);

			$repeater->add_group_control(
				\Elementor\Group_Control_Text_Stroke::get_type(),
				[
					'name' => 'text_stroke_item',
					'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
				]
			);

			$this->add_control(
				'items',
				[
					'label' => esc_html__( 'Items', 'infetech' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'text' => esc_html__( '25', 'infetech' ),
						],
						[
							'text' => esc_html__( 'Years', 'infetech' ),
						],
						[
							'text' => esc_html__( 'Of','infetech' ),
						],
						[
							'text' => esc_html__( 'Experience', 'infetech' ),
						],
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_section_style',
			[
				'label' => esc_html__( 'Text', 'infetech' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .ova-text-marquee .content .text',
				]
			);

			$this->add_control(
				'text_color',
				[
					'label' => esc_html__( 'Text Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-text-marquee .content .text' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Stroke::get_type(),
				[
					'name' => 'text_stroke',
					'selector' => '{{WRAPPER}} .ova-text-marquee .content .text',
				]
			);

			$this->add_responsive_control(
				'space_between',
				[
					'label' => esc_html__( 'Space Between', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-text-marquee .spacing' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'time_duration',
				[
					'label' => esc_html__( 'Time Duration', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'normal',
					'options' => [
						'slow' => esc_html__( 'Slow', 'infetech' ),
						'normal' => esc_html__( 'Normal', 'infetech' ),
						'fast' => esc_html__( 'Fast', 'infetech' ),
					],
				]
			);

		$this->end_controls_section();
	}

	// Render Template Here
	protected function render() {

		$settings	= $this->get_settings();
		$items 		= $settings['items'];

		$time_duration = $settings['time_duration'];

		?>

			<div class="ova-text-marquee duration-<?php echo esc_attr($time_duration); ?>">

				<?php if( is_array($items) && $items ) : ?>

					<div class="content content-wrapper">

					  	<?php foreach($items as $item) { 
							$item_id  = 'elementor-repeater-item-' . $item['_id'];
							$text  	  =  $item['text'];
						?>

							<span class="text <?php echo esc_attr( $item_id ); ?>">
								<?php echo esc_html( $text ) . ' '; ?>	
							</span>

						<?php } ?>													

					</div>

					<div class="spacing"></div>

					<div class="content content-wrapper-2">

					  	<?php foreach($items as $item) { 
							$item_id  = 'elementor-repeater-item-' . $item['_id'];
							$text  	  =  $item['text'];
						?>

							<span class="text <?php echo esc_attr( $item_id ); ?>">
								<?php echo esc_html( $text ) . ' '; ?>	
							</span>

						<?php } ?>											

					</div>

				<?php endif; ?>

			</div>

		<?php
	}
}

$widgets_manager->register( new Infetech_Elementor_Text_Marquee() );