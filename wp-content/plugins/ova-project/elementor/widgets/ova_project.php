<?php
namespace ova_project_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_project extends Widget_Base {

	public function get_name() {
		return 'ova_project';
	}

	public function get_title() {
		return esc_html__( 'Project Grid', 'ova-project' );
	}

	public function get_icon() {
		return 'eicon-folder-o';
	}

	public function get_categories() {
		return [ 'project' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ova-project' ),
			]
		);

		$args = array(
           'taxonomy' => 'cat_project',
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
			$cate_array["No content Category found"] = esc_html('No category found','ova-project');
		}

		$this->add_control(
			'category',
			[
				'label'   => __( 'Category', 'ova-project' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'template',
			[
				'label' => esc_html__( 'Template', 'ova-project' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'template1',
				'options' => [
					'template1' => esc_html__('Template 1', 'ova-project'),
					'template2' => esc_html__('Template 2', 'ova-project'),
				]
			]
		);

		$this->add_control(
			'number_column',
			[
				'label' => esc_html__( 'Number Column', 'ova-project' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'three_column',
				'options' => [
					'two_column' => esc_html__('2 Columns', 'ova-project'),
					'three_column' => esc_html__('3 Column', 'ova-project'),
					'four_column' => esc_html__('4 Column', 'ova-project'),
				]
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__( 'Total', 'ova-project' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => esc_html__( 'OrderBy', 'ova-project' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__( 'ID', 'ova-project' ),
					'title'  => esc_html__( 'Title', 'ova-project' ),
					'date'  => esc_html__( 'Date', 'ova-project' ),
					'rand'  => esc_html__( 'Random', 'ova-project' ),
					'ova_project_order_project' => esc_html__( 'Custom Order', 'ova-project' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'ova-project' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'ova-project' ),
					'DESC'  => esc_html__( 'Descending', 'ova-project' ),
				],
			]
		);

		$this->add_control(
			'show_link_to_detail',
			[
				'label' => esc_html__( 'Show Link to Detail', 'ova-project' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'ova-project' ),
				'label_off' => esc_html__( 'Hide', 'ova-project' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		

        $this->end_controls_section();

        /* Begin image Style */
		$this->start_controls_section(
            'image_overlay_style',
            [
                'label' => esc_html__( 'Image', 'ova-project' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
				'height_image',
				[
					'label' 		=> esc_html__( 'Height', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 300,
							'max' => 600,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-project .ova-media .project-img img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

            $this->add_control(
				'overlay_heading_1',
				[
					'label' 	=> esc_html__( 'Overlay', 'ova-project' ),
					'type' 		=> Controls_Manager::HEADING,
				]
			);

            $this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'overlay_image',
					'label' => esc_html__( 'Overlay', 'ova-project' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-project .item .ova-media .mask',
				]
			);

        $this->end_controls_section();

        /* Begin content Style */
		$this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__( 'Content', 'ova-project' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs(
				'content_tabs'
			);

				$this->start_controls_tab(
					'content_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'ova-project' ),
					]
				);

				    $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'bg_content',
							'label' => esc_html__( 'Overlay', 'ova-project' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .ova-project .item .ova-media .content',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'content_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'ova-project' ),
					]
				);

				    $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'bg_content_hover',
							'label' => esc_html__( 'Overlay', 'ova-project' ),
							'types' => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .ova-project .item:hover .ova-media .content',
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();			

			$this->add_responsive_control(
	            'content_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'ova-project' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-project .item .ova-media .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End content style */

        /* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'ova-project' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-project .slide-project-2 .item .ova-media .content .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'ova-project' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-project .item .ova-media .content .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'ova-project' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-project .item:hover .ova-media .content .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'ova-project' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-project .item .ova-media .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin sub_title Style */
		$this->start_controls_section(
            'sub_title_style',
            [
                'label' => esc_html__( 'Sub Title', 'ova-project' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'sub_title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-project .item .ova-media .content .sub_title',
				]
			);

			$this->add_control(
				'sub_title_color',
				[
					'label' 	=> esc_html__( 'Color', 'ova-project' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-project .item .ova-media .content .sub_title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'sub_title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'ova-project' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-project .item:hover .ova-media .content .sub_title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'sub_title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'ova-project' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-project .item .ova-media .content .sub_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End sub_title style */

		/* Begin icon Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'ova-project' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'template' => 'template2'
                ]
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'ova-project' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-project .item .ova-media .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_icon_style' );
				
				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'ova-project' ),
		            ]
		        );
                     
                     $this->add_control(
						'icon_color',
						[
							'label' 	=> esc_html__( 'Color', 'ova-project' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-project .item .ova-media .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor',
						[
							'label' 	=> esc_html__( 'Border Color', 'ova-project' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-project .item .ova-media .icon' => 'border-color: {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'ova-project' ),
		            ]
		        );

		             $this->add_control(
						'icon_color_hover',
						[
							'label' 	=> esc_html__( 'Color Hover', 'ova-project' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-project .item:hover .ova-media .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'icon_bgcolor_hover',
						[
							'label' 	=> esc_html__( 'Border Color Hover', 'ova-project' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-project .item:hover .ova-media .icon' => 'border-color: {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

	        $this->add_responsive_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'ova-project' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-project .item .ova-media .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End icon style */

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'elementor_ova_project', 'elementor/ova_project.php' );

		ob_start();
		ovaproject_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}
