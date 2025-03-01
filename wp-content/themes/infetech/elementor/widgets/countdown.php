<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Countdown extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_countdown';
	}

	public function get_title() {
		return esc_html__( 'Ova Countdown', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {

		wp_enqueue_script( 'plugin', get_theme_file_uri('/assets/libs/countdown/jquery.plugin.js'), array('jquery'), false, true);
		wp_enqueue_script( 'countdown', get_theme_file_uri('/assets/libs/countdown/jquery.countdown.min.js'), array('jquery'), false, true);

		return [ 'infetech-elementor-countdown' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_countdown',
			[
				'label' => esc_html__( 'Countdown', 'infetech' ),
			]
		);	
			
			$this->add_control(
				'countdown_type',
				[
					'label' 	=> esc_html__( 'Type', 'infetech' ),
					'type' 		=> Controls_Manager::SELECT,
					'options' 	=> [
						'due_date' 	=> esc_html__( 'Due Date', 'infetech' ),
						'evergreen' => esc_html__( 'Evergreen Timer', 'infetech' ),
					],
					'default' => 'due_date',
				]
			);

			$this->add_control(
				'due_date',
				[
					'label' 		=> esc_html__( 'Due Date', 'infetech' ),
					'type' 			=> Controls_Manager::DATE_TIME,
					'default' 		=> gmdate( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
					'description' 	=> sprintf( esc_html__( 'Date set according to your timezone: %s.', 'infetech' ), Utils::get_timezone_string() ),
					'condition' 	=> [
						'countdown_type' => 'due_date',
					],
				]
			);

			$this->add_control(
				'countdown_format',
				[
					'label' 	=> esc_html__( 'Format', 'infetech' ),
					'type' 		=> Controls_Manager::SELECT,
					'options' 	=> [
						'DHMS' 	=> esc_html__( 'Show', 'infetech' ),
						'dhms' 	=> esc_html__( 'Hide', 'infetech' ),
					],
					'default' 	=> 'DHMS',
					'description' => esc_html__( 'Show/Hide if time = 0.', 'infetech' ),
				]
			);

			$this->add_control(
				'evergreen_counter_hours',
				[
					'label' 		=> esc_html__( 'Hours', 'infetech' ),
					'type' 			=> Controls_Manager::NUMBER,
					'default' 		=> 69,
					'placeholder' 	=> esc_html__( 'Hours', 'infetech' ),
					'condition' 	=> [
						'countdown_type' => 'evergreen',
					],
				]
			);

			$this->add_control(
				'evergreen_counter_minutes',
				[
					'label' 		=> esc_html__( 'Minutes', 'infetech' ),
					'type' 			=> Controls_Manager::NUMBER,
					'default' 		=> 96,
					'placeholder' 	=> esc_html__( 'Minutes', 'infetech' ),
					'condition' 	=> [
						'countdown_type' => 'evergreen',
					],
				]
			);

			$this->add_control(
				'show_days',
				[
					'label' 	=> esc_html__( 'Days', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
				]
			);

			$this->add_control(
				'show_hours',
				[
					'label' 	=> esc_html__( 'Hours', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
				]
			);

			$this->add_control(
				'show_minutes',
				[
					'label' 	=> esc_html__( 'Minutes', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
				]
			);

			$this->add_control(
				'show_seconds',
				[
					'label' 	=> esc_html__( 'Seconds', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
				]
			);

			$this->add_control(
				'show_labels',
				[
					'label' 	=> esc_html__( 'Show Label', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'show_separator',
				[
					'label' 	=> esc_html__( 'Show Separator', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'yes',
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
	            'label_align',
	            [
	                'label' 	=> esc_html__( 'Layout', 'infetech' ),
	                'type' 		=> Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'top' 	=> [
	                        'title' => esc_html__( 'Top', 'infetech' ),
	                        'icon' 	=> 'eicon-v-align-top',
	                    ],
	                    'bottom' => [
	                        'title' => esc_html__( 'Bottom', 'infetech' ),
	                        'icon' 	=> 'eicon-v-align-bottom',
	                    ],
	                ],
	            ]
	        );

			$this->add_control(
				'custom_labels',
				[
					'label' 	=> esc_html__( 'Custom Label', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'default' 	=> 'yes',
					'condition' => [
						'show_labels!' => '',
					],
				]
			);

			$this->add_control(
				'label_day',
				[
					'label' 		=> esc_html__( 'Day', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'Day', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Day', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_days' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_days',
				[
					'label' 		=> esc_html__( 'Days', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'DAYS', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Days', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_days' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_hour',
				[
					'label' 		=> esc_html__( 'Hour', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'Hour', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Hour', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_hours' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_hours',
				[
					'label' 		=> esc_html__( 'Hours', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'HOUR', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Hours', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_hours' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_minute',
				[
					'label' 		=> esc_html__( 'Minute', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'Minute', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Minute', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_minutes' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_minutes',
				[
					'label' 		=> esc_html__( 'Minutes', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'MINU', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Minutes', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_minutes' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_second',
				[
					'label' 		=> esc_html__( 'Second', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'Second', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Second', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_seconds' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'label_seconds',
				[
					'label' 		=> esc_html__( 'Seconds', 'infetech' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> esc_html__( 'SECO', 'infetech' ),
					'placeholder' 	=> esc_html__( 'Seconds', 'infetech' ),
					'condition' 	=> [
						'show_labels!' 		=> '',
						'custom_labels!' 	=> '',
						'show_seconds' 		=> 'yes',
					],
				]
			);

			$this->add_control(
				'expire_actions',
				[
					'label' 	=> esc_html__( 'Actions After Expire', 'infetech' ),
					'type' 		=> Controls_Manager::SELECT,
					'options' 	=> [
						'nothing' 	=> esc_html__( 'Nothing', 'infetech' ),
						'hide' 		=> esc_html__( 'Hide', 'infetech' ),
						'redirect' 	=> esc_html__( 'Redirect', 'infetech' ),
						'message' 	=> esc_html__( 'Show Message', 'infetech' ),
					],
				]
			);

			$this->add_control(
				'message_after_expire',
				[
					'label' 	=> esc_html__( 'Message', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'separator' => 'before',
					'dynamic' 	=> [
						'active' => true,
					],
					'default'	=> esc_html__( 'Countdown timeout', 'infetech' ),
					'condition' => [
						'expire_actions' => 'message',
					],
				]
			);

			$this->add_control(
				'expire_redirect_url',
				[
					'label' 	=> esc_html__( 'Redirect URL', 'infetech' ),
					'type' 		=> Controls_Manager::URL,
					'separator' => 'before',
					'options' 	=> false,
					'dynamic' 	=> [
						'active' => true,
					],
					'condition' => [
						'expire_actions' => 'redirect',
					],
				]
			);

			$this->add_control(
				'show_title',
				[
					'label' 	=> esc_html__( 'Title', 'infetech' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'default' 	=> 'no',
				]
			);

			$this->add_control(
				'countdown_title',
				[
					'label' 	=> esc_html__( 'Title', 'infetech' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Add Your Title', 'infetech' ),
					'condition' => [
						'show_title' => 'yes',
					],
				]
			);

		$this->end_controls_section();

		/* Begin Content Style */
		$this->start_controls_section(
            'section_content_style',
            [
                'label' => esc_html__( 'Content', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' 		=> 'content_background',
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'types' 	=> [ 'classic', 'gradient' ],
					'exclude' 	=> [ 'image' ],
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-content-countdown',
				]
			);

			$this->add_responsive_control(
	            'content_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-content-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_group_control(
	            \Elementor\Group_Control_Border::get_type(), [
	                'name' 		=> 'content_border',
	                'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-content-countdown',
	            ]
	        );

	        $this->add_responsive_control(
	            'content_alignment',
	            [
	                'label' 	=> esc_html__( 'Alignment', 'infetech' ),
	                'type' 		=> Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'left' 	=> [
	                        'title' => esc_html__( 'Left', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-left',
	                    ],
	                    'center' 	=> [
	                        'title' => esc_html__( 'Center', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-center',
	                    ],
	                    'right' 	=> [
	                        'title' => esc_html__( 'Right', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-right',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown' => 'text-align: {{VALUE}}',
	                ],
	            ]
	        );

        $this->end_controls_section();

        /* Begin Boxes Style */
		$this->start_controls_section(
            'boxes_style',
            [
                'label' => esc_html__( 'Boxes', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_responsive_control(
				'boxes_width',
				[
					'label' 	=> esc_html__( 'Width', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'boxes_height',
				[
					'label' 	=> esc_html__( 'Height', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
	            'boxes_background',
	            [
	                'label' 	=> esc_html__( 'Background', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

	        $this->add_control(
	            'boxes_background_hover',
	            [
	                'label' 	=> esc_html__( 'Background Hover', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item:hover ' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
	            'boxes_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'boxes_border',
	                'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item',
	            ]
	        );

	        $this->add_control(
	            'boxes_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Boxes Style */

		/* Begin Number Style */
		$this->start_controls_section(
            'number_style',
            [
                'label' => esc_html__( 'Time Number', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'number_typography',
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .ova-number',
				]
			);

			$this->add_control(
	            'number_color',
	            [
	                'label' 	=> esc_html__( 'Color', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .ova-number' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
	            'number_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .ova-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Number Style */

		/* Begin Labels Style */
		$this->start_controls_section(
            'labels_style',
            [
                'label' => esc_html__( 'Labels', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_control(
	            'labels_color',
	            [
	                'label' 	=> esc_html__( 'Color', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .countdown-label' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'labels_typography',
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .countdown-label',
				]
			);

	        $this->add_responsive_control(
	            'labels_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .ova-countdown-item .ova-wrap-time-item .countdown-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Labels Style */

		/* Begin Separator Style */
		$this->start_controls_section(
            'separator_style',
            [
                'label' => esc_html__( 'Separator', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'show_separator' => 'yes'
                ]
            ]
        );

			$this->add_control(
	            'separator_color',
	            [
	                'label' 	=> esc_html__( 'Color', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .countdown-separator' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'separator_typography',
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-countdown .countdown-separator',
				]
			);

	        $this->add_responsive_control(
	            'separator_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown .countdown-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Separator Style */

		/* Begin Message Style */
		$this->start_controls_section(
            'message_style',
            [
                'label' => esc_html__( 'Message', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_control(
	            'message_background',
	            [
	                'label' 	=> esc_html__( 'Background', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_control(
	            'message_color',
	            [
	                'label' 	=> esc_html__( 'Color', 'infetech' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_control(
	            'message_alignment',
	            [
	                'label' 	=> esc_html__( 'Alignment', 'infetech' ),
	                'type' 		=> Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'left' 	=> [
	                        'title' => __( 'Left', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-left',
	                    ],
	                    'right' 	=> [
	                        'title' => __( 'Right', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-right',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'float: {{VALUE}}',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
				'message_width',
				[
					'label' 	=> esc_html__( 'Width', 'infetech' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-warp-countdown .ova-message' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'message_typography',
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-message',
				]
			);

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'message_border',
	                'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-message',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'message_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'message_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'message_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End Message Style */

		/* Begin title style */
		$this->start_controls_section(
			'countdown_title_style',
			[
				'label' => esc_html__( 'Title', 'infetech' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-warp-countdown .ova-countdown-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
	            'countdown_title_alignment',
	            [
	                'label' 	=> esc_html__( 'Alignment', 'infetech' ),
	                'type' 		=> Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'left' 	=> [
	                        'title' => esc_html__( 'Left', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-left',
	                    ],
	                    'center' 	=> [
	                        'title' => esc_html__( 'Center', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-center',
	                    ],
	                    'right' 	=> [
	                        'title' => esc_html__( 'Right', 'infetech' ),
	                        'icon' 	=> 'eicon-text-align-right',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown-title' => 'text-align: {{VALUE}}',
	                ],
	            ]
	        );

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-warp-countdown .ova-countdown-title',
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-warp-countdown .ova-countdown-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();
		/* End title style */
	}

	private function get_evergreen_interval( $settings ) {
		$hours 		= empty( $settings['evergreen_counter_hours'] ) 	? 0 : ( $settings['evergreen_counter_hours'] * HOUR_IN_SECONDS );
		$minutes 	= empty( $settings['evergreen_counter_minutes'] ) 	? 0 : ( $settings['evergreen_counter_minutes'] * MINUTE_IN_SECONDS );
		$evergreen_interval = $hours + $minutes;

		return $evergreen_interval;
	}

	private function get_format( $settings ) {
		$format 		= $settings['countdown_format'];
		$show_day 		= $settings['show_days'];
		$show_hours 	= $settings['show_hours'];
		$show_minutes 	= $settings['show_minutes'];
		$show_seconds 	= $settings['show_seconds'];

		if ( 'yes' != $show_day ) {
			$format = str_replace( array( 'd', 'D' ) , '', $format );
		}

		if ( 'yes' != $show_hours ) {
			$format = str_replace( array( 'h', 'H' ) , '', $format );
		}

		if ( 'yes' != $show_minutes ) {
			$format = str_replace( array( 'm', 'M' ) , '', $format );
		}

		if ( 'yes' != $show_seconds ) {
			$format = str_replace( array( 's', 'S' ) , '', $format );
		}

		return $format;
	}

	private function get_labels( $settings ) {
		$labels = array();

		$label_day 		= $settings['label_day'] 		? $settings['label_day'] 		: 'Day';
		$label_days 	= $settings['label_days'] 		? $settings['label_days'] 		: 'Days';
		$label_hour 	= $settings['label_hour'] 		? $settings['label_hour'] 		: 'Hour';
		$label_hours 	= $settings['label_hours'] 		? $settings['label_hours'] 		: 'Hours';
		$label_minute 	= $settings['label_minute'] 	? $settings['label_minute'] 	: 'Minute';
		$label_minutes 	= $settings['label_minutes'] 	? $settings['label_minutes'] 	: 'Minutes';
		$label_second 	= $settings['label_second'] 	? $settings['label_second'] 	: 'Second';
		$label_seconds 	= $settings['label_seconds'] 	? $settings['label_seconds'] 	: 'Seconds';

		$labels = array(
			'label' 	=> array( 'Year', 'Month', 'Week', $label_day, $label_hour, $label_minute, $label_second ),
			'labels' 	=> array( 'Years', 'Months', 'Weeks', $label_days, $label_hours, $label_minutes, $label_seconds ),
		);
		
		return $labels;
	}

	// Render Template Here
	protected function render() {
		$settings = $this->get_settings();

		$type 		= $settings['countdown_type'];
		$due_date 	= $settings['due_date'];
		
		$time_now 	= current_time('timestamp', 1 );

		if ( 'evergreen' == $type ) {
			$due_date = $this->get_evergreen_interval( $settings ) + $time_now;
		} else {
			// Handle timezone ( Set GMT time )
			$gmt 		= get_gmt_from_date( $due_date . ':00' );
			$due_date 	= strtotime( $gmt );
		}

		$format 		= $this->get_format( $settings );
		$show_labels 	= $settings['show_labels'];

        // Separator
		$show_separator	= $settings['show_separator'];


		$time_countdow 	= $due_date - $time_now;
		$redirect = false;
		if ( $time_countdow <= 0 && ! is_admin() ) {
			$redirect = true;
		}

		// Expire
		$expire_actions = $settings['expire_actions'];
		$message 		= $settings['message_after_expire'];
		$url	 		= $settings['expire_redirect_url']['url'];

		// Custom labels
		$label_align 	= $settings['label_align'];
		$custom_labels 	= $settings['custom_labels'];
		$labels 		= array();
		if ( $custom_labels && $custom_labels == 'yes' ) {
			$labels = $this->get_labels( $settings );
		}

		// Title
		$show_title 	= $settings['show_title'];
		$title 			= $settings['countdown_title'];

		?>
		<div class="ova-warp-countdown">
			<div class="ova-content-countdown">
				<?php if ( 'yes' == $show_title ): ?>
					<h2 class="ova-countdown-title"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<div class="ova-countdown" 
					 data-time='<?php echo esc_attr( $due_date ); ?>'
					 data-format='<?php echo esc_attr( $format ); ?>'
					 data-show-lable='<?php echo esc_attr( $show_labels ); ?>'
					 data-show-separator='<?php echo esc_attr( $show_separator ); ?>'
					 data-message='<?php echo esc_attr( $message ); ?>'
					 data-url='<?php echo esc_url( $url ); ?>'
					 data-expire='<?php echo esc_html( $expire_actions ); ?>'
					 data-redirect='<?php echo esc_attr( $redirect ); ?>'
					 data-labels='<?php echo json_encode( $labels ); ?>'
					 data-label-align='<?php echo esc_html( $label_align ); ?>'>
				</div>

			<?php

			if ( $time_countdow <= 0 ) {
				if ( 'message' == $expire_actions ) {
					echo '<div class="ova-message">' . $message . '</div>';
				}
			}
			
			?>
			</div>
		</div>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Countdown() );