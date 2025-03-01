<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Progress extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_progress';
	}

	public function get_title() {
		return esc_html__( 'Ova Progress', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {

		return [ 'infetech-elementor-progress' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		/* Begin progress */
		$this->start_controls_section(
			'section_progress',
			[
				'label' => esc_html__( 'Progress', 'infetech' ),
			]
		);

			$this->add_control(
				'title',
				[
					'label' 		=> esc_html__( 'Title', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'placeholder' 	=> esc_html__( 'Enter your title', 'infetech' ),
					'default' 		=> esc_html__( 'Qualityi Services', 'infetech' ),
					'label_block' 	=> true,
				]
			);

			$this->add_control(
				'percent',
				[
					'label' 	=> esc_html__( 'Percent', 'infetech' ),
					'type' 		=> Controls_Manager::NUMBER,
					'min' 		=> 0,
					'max' 		=> 100,
					'step' 		=> 1,
					'default' 	=> 78,
				]
			);

			$this->add_control(
	            'show_percent',
	            [
	                'label' 	=> esc_html__( 'Show Percent', 'infetech' ),
	                'type' 		=> Controls_Manager::SWITCHER,
	                'default' 	=> 'yes',
	            ]
	        );

		$this->end_controls_section();
		/* End progress */

		/* Begin general style */
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'general_background_color',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
	            'general_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-progress' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
	            'general_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-progress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();
		/* End general */

		/* Begin title style */
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
					'selector' 	=> '{{WRAPPER}} .ova-progress .ova-progress-title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-progress-title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-progress .ova-progress-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();
		/* End title style */

		/* Begin percentage style */
		$this->start_controls_section(
			'section_percentage_style',
			[
				'label' => esc_html__( 'Percentage', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_percent' => 'yes',
				],
			]
		);

		    $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'percentage_typography',
					'selector' 	=> '{{WRAPPER}} .ova-progress .ova-percent-view .percentage',
				]
			);

			$this->add_control(
				'percentage_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view .percentage' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'percentage_bottom',
				[
					'label' 		=> esc_html__( 'Bottom', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' 	=> -100,
							'max' 	=> 100,
							'step' 	=> 5,
						],
						'%' => [
							'min' 	=> -100,
							'max' 	=> 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view .percentage' => 'bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

		$this->end_controls_section();
		/* End percentage style */

		/* Begin progress style */
		$this->start_controls_section(
			'section_progress_style',
			[
				'label' => esc_html__( 'Progress Bar', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);      

			$this->add_responsive_control(
				'progress_height',
				[
					'label' 	=> esc_html__( 'Height', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view' => 'height: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'progress_bg',
				[
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view' => 'background-color: {{VALUE}};',
					],
				]
			);

	        $this->add_control(
	            'progress_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-progress .ova-percent-view' 				=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                    '{{WRAPPER}} .ova-progress .ova-percent-view .ova-percent' 	=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();
		/* End progress style */

		/* Begin percent style */
		$this->start_controls_section(
			'section_percent_style',
			[
				'label' => esc_html__( 'Percent Bar', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'percent_height',
				[
					'label' 	=> esc_html__( 'Height', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view .ova-percent' => 'height: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'percent_bg',
				[
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress .ova-percent-view .ova-percent' => 'background: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		/* End percent style */

	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

		$title 				= $settings['title'];
		$percent 			= $settings['percent'];
		$show_percent 		= $settings['show_percent'];

		?>

		<div class="ova-progress">
			<?php if ( $title !== '' ): ?>
				<h4 class="ova-progress-title"><?php echo esc_html( $title ); ?></h4>
			<?php endif; ?>
			<div class="ova-percent-view" >
				<?php if( $show_percent == 'yes' ) : ?>
					<span class="percentage" >
						<?php echo esc_html( $percent ).esc_html('%','infetech'); ?>
					</span>
				<?php endif; ?>

				<div class="ova-percent" data-percent="<?php echo esc_html( $percent ); ?>"></div>
			</div>
		</div>
		 	
		<?php
	}
}
$widgets_manager->register( new Infetech_Elementor_Progress() );