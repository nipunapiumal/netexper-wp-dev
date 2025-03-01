<?php
/**
 * @package    OVA TEAM by ovatheme
 * @author     Ovatheme
 * @copyright  Copyright (C) 2022 Ovatheme All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace ova_team_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_team extends Widget_Base {

	public function get_name() {
		return 'ova_team';
	}

	public function get_title() {
		return esc_html__( 'Our Team', 'ova-team' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'team' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ova-team' ),
			]
		);

		$this->add_control(
			'template',
			[
				'label' => esc_html__( 'Template', 'ova-team' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'template1',
				'options' => [
					'template1' => esc_html__( 'Template 1', 'ova-team' ),
					'template2' => esc_html__( 'Template 2', 'ova-team' ),
					'template3' => esc_html__( 'Template 3', 'ova-team' ),
					'template4' => esc_html__( 'Template 4', 'ova-team' ),
					'template5' => esc_html__( 'Template 5', 'ova-team' ),
				]
			]
		);

		$args = array(
           'taxonomy' => 'cat_team',
           'orderby' => 'name',
           'order'   => 'ASC'
       	);
	
		$categories = get_categories($args);
		$catAll = array( 'all' => 'All categories');
		$cate_array = array();
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->slug] = $cate->cat_name;
			}
		} else {
			$cate_array["No content Category found"] = esc_html__( 'No content Category found', 'ova-team' );;
		}

		$this->add_control(
			'category',
			[
				'label'   => esc_html__( 'Category', 'ova-team' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__( 'Total', 'ova-team' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8
			]
		);

		$this->add_control(
			'number_column',
			[
				'label' => esc_html__( 'Number Of Column', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'three_column',
				'options' => [
					'one_column'   => esc_html__( 'Single Column', 'ova-team' ),
					'two_column'   => esc_html__( '2 Columns', 'ova-team' ),
					'three_column' => esc_html__( '3 Columns', 'ova-team' ),
					'four_column'  => esc_html__( '4 Columns', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => esc_html__( 'OrderBy', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__( 'ID', 'ova-team' ),
					'title'  => esc_html__( 'Title', 'ova-team' ),
					'ova_team_met_order_team' => esc_html__( 'Custom Order', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'ova-team' ),
					'DESC'  => esc_html__( 'Descending', 'ova-team' ),
				],
			]
		);

		$this->add_control(
			'show_social',
			[
				'label' => esc_html__( 'Show Social', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_name',
			[
				'label' => esc_html__( 'Show Name', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_job',
			[
				'label' => esc_html__( 'Show Job', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_link_to_detail',
			[
				'label' => esc_html__( 'Show Link to Detail', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_line_decoration',
			[
				'label' => esc_html__( 'Show Line Decoration', 'ova-team' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-team' ),
				'label_off' => esc_html__( 'Hide', 'ova-team' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'template' => 'template1'
				]
			]
		);
		
		$this->end_controls_section();

		//******Item team style*****/
		$this->start_controls_section(
			'section_item_team_style',
			[
				'label' => esc_html__( 'Item', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
				'item_column_gap',
				[
					'label' 		=> esc_html__( 'Column Gap', 'ova-team' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-team .content' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_row_gap',
				[
					'label' 		=> esc_html__( 'Row Gap', 'ova-team' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-team .content' => 'grid-row-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();

		// Info Tab Style
		$this->start_controls_section(
			'section_style_info',
			[
				'label' => esc_html__( 'Info', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'Style Info' );

		$this->start_controls_tab(
			'info_normal',
			[
				'label' => esc_html__( 'Normal', 'ova-team' ),
			]
		);

			
			$this->add_control(
				'color_name',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .name-job .name, {{WRAPPER}} .ova-team .content .item-team .info .name-job .name a' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_control(
				'color_job',
				[
					'label' => esc_html__( 'Color Job', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .name-job .job' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-team .content .item-team .img .content-and-social .job' => 'color : {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_tab();

		$this->start_controls_tab(
			'info_hover',
			[
				'label' => esc_html__( 'Hover', 'ova-team' ),
			]
		);
				
			
			$this->add_control(
				'color_name_hover',
				[
					'label' => esc_html__( 'Color Name', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team:hover .info .name-job .name, {{WRAPPER}} .ova-team .content .item-team:hover .info .name-job .name a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_job_hover',
				[
					'label' => esc_html__( 'Color Job', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team:hover .info .name-job .job' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-team .content .item-team:hover .img .content-and-social .job' => 'color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_tab();

	    $this->end_controls_tabs();
		    
		$this->end_controls_section();

		// ICON Tab
        $this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icons', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs( 'Style Icons' );

				$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_icon',
						[
							'label' => esc_html__( 'Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .content .item-team .list-icon ul .item i' => 'color : {{VALUE}};',
							],
						]
					);
                    $this->add_control(
						'background_color_icon',
						[
							'label' => esc_html__( 'Background Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .content .item-team .list-icon' => 'background-color : {{VALUE}};',
							],
							
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'ova-team' ),
					]
				);
					$this->add_control(
						'color_social_icons_hover',
						[
							'label' => esc_html__( 'Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .content .item-team .list-icon .item i:hover' => 'color : {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'bg_color_social_icons_hover',
						[
							'label' => esc_html__( 'Background Color', 'ova-team' ),
							'type' => Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .ova-team:hover .content .item-team .list-icon' => 'background-color : {{VALUE}};',
							],
						]
					);

                $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		//******Share Button style*****/
		$this->start_controls_section(
			'section_share_button_style',
			[
				'label' => esc_html__( 'Share Button', 'ova-team' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => 'template1'
				]
			]
		);

            $this->add_control(
				'icon_share_button_size',
				[
					'label' 		=> esc_html__( 'Icon Size', 'ova-team' ),
					'type' 			=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .share-button i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color_share_button',
				[
					'label' => esc_html__( 'Icon Color', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .share-button i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_share_button',
				[
					'label' => esc_html__( 'Background Color', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team .info .share-button' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_share_button_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'ova-team' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .content .item-team:hover .info .share-button' => 'background-color : {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_team', 'elementor/ova_team.php' );

		ob_start();
		ovateam_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}