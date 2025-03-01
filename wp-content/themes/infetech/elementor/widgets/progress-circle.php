<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Progress_Circle extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_progress_circle';
	}

	
	public function get_title() {
		return esc_html__( 'Progress Circle', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-spinner';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		wp_enqueue_script( 'progress-circle', get_template_directory_uri().'/assets/libs/circle-progress/circle-progress.min.js', array('jquery'), false, true );
		return [ 'infetech-elementor-progress-circle' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Progress Circle', 'infetech' ),
			]
		);	
			
			
			// Add Class control
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Technology', 'infetech' ),
				]
			);

			$this->add_control(
				'percent',
				[
					'label' => esc_html__( 'Percent', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'default' => [
						'size' => 90,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
				]
			);

			$this->add_control(
				'unit',
				[
					'label' => esc_html__( 'Unit', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '%', 'infetech' ),
				]
			);

			$this->add_control(
				'circle_heading',
				[
					'label' => esc_html__( 'Circle', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			    $this->add_control(
					'linecap',
					[
						'label' => esc_html__( 'LineCap', 'infetech' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'default',
						'options' => [
							'default' => esc_html__('Default', 'infetech'),
							'round'   => esc_html__('Round', 'infetech'),
						]
					]
				);

				$this->add_control(
					'circle_size',
					[
						'label' => esc_html__( 'Size (px)', 'infetech' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'default' => [
							'size' => 144,
						],
						'range' => [
							'px' => [
								'min' => 100,
								'max' => 400,
								'step' => 1,
							],
						],
					]
				);

				$this->add_control(
					'circle_thickness',
					[
						'label' => esc_html__( 'Thickness', 'infetech' ),
						'type' => Controls_Manager::NUMBER,
						'min' => 5,
						'max' => 50,
						'step' => 1,
						'default' => 10		
					]
				);

				$this->add_control(
					'color_circle',
					[
						'label' => esc_html__( 'Color', 'infetech' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#5f2dee'
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
						],
						'default' => 'center',
						'selectors' => [
							'{{WRAPPER}} .ova-progress-circle-wrapper' => 'text-align: {{VALUE}};',
						],
					]
			   );

		$this->end_controls_section();

		/* Begin percent Style */
		$this->start_controls_section(
            'percent_style',
            [
                'label' => esc_html__( 'Percent', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'percent_typography',
					'selector' 	=> '{{WRAPPER}} .ova-progress-circle-wrapper .ova-progress-circle .percent',
				]
			);

			$this->add_control(
				'percent_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress-circle-wrapper .ova-progress-circle .percent' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'percent_border_size',
				[
					'label' => esc_html__( 'Border Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px', '%'],
					'range' => [
						'px' => [
							'min' => 100,
							'max' => 400,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-progress-circle-wrapper .ova-progress-circle:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'percent_border',
					'label' => esc_html__( 'Border', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-progress-circle-wrapper .ova-progress-circle:before',
				]
			);

        $this->end_controls_section();
		/* End percent style */

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
				'title_align',
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
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-progress-circle-wrapper .title' => 'text-align: {{VALUE}};',
					],
				]
			);

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-progress-circle-wrapper .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-progress-circle-wrapper .title' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .ova-progress-circle-wrapper .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
		/* End title style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title          =    $settings['title'];
		$unit           =    $settings['unit'];
		$percent        =    is_numeric( $settings['percent']['size'] ) ? $settings['percent']['size'] : '0';
		$percentage     =    $percent / 100;
		$size           =    is_numeric( $settings['circle_size']['size'] ) ? $settings['circle_size']['size'] : '144';
		$color          =    ( isset( $settings['color_circle'] ) && $settings['color_circle'] !== '' ) ?  $settings['color_circle'] : '#5f2dee' ;
		$thickness      =    $settings['circle_thickness'];
	    $linecap        =    $settings['linecap'];

		 ?>

            <div class="ova-progress-circle-wrapper">
            	
        	    <div class="ova-progress-circle"  
	                data-thickness="<?php echo esc_attr( $thickness ); ?>" 
	                data-size="<?php echo esc_attr( $size ); ?>"
	                data-value="<?php echo esc_attr( $percentage ); ?>"
	                data-color="<?php echo esc_attr( $color ); ?>"
	                data-linecap="<?php echo esc_attr( $linecap ); ?>"
	            >
	                
	                <div class="percent">
	                	<strong></strong>
	            	    <i><?php echo esc_html( $unit ) ; ?></i>
	                </div>
	            </div>

	            <?php if( !empty( $title ) ) : ?>
	        	    <div class="title">
	        	    	<?php echo esc_html( $title ) ; ?>	
	        	    </div>
	        	<?php endif; ?>

            </div>
           
			
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Progress_Circle() );