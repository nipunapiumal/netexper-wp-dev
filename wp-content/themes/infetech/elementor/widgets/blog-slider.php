<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Blog_Slider extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_blog_slider';
	}

	
	public function get_title() {
		return esc_html__( 'Blog Slider', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-post-slider';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return ['infetech-elementor-blog-slider'];
	}
 

	// Add Your Controll In This Function
	protected function register_controls() {

		$args = array(
		    'orderby' => 'name',
		    'order' => 'ASC'
		);

		$categories   = get_categories($args);
		$cate_array   = array();
		$arrayCateAll = array( 'all' => esc_html__( 'All categories', 'infetech' ) );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array[ esc_html__( 'No content Category found', 'infetech' ) ] = 0;
		}	

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
						'template3' => esc_html__('Template 3', 'infetech'),
						'template4' => esc_html__('Template 4', 'infetech'),
					]
				]
			);

			$this->add_control(
				'category',
				[
					'label' => esc_html__( 'Category', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge($arrayCateAll,$cate_array),
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' => esc_html__( 'Post Total', 'infetech' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 4,
				]
			);

			$this->add_control(
				'orderby',
				[
					'label' 	=> esc_html__('Order By', 'infetech'),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'ID',
					'options' 	=> [
						'ID' 		=> esc_html__('ID', 'infetech'),
						'title' 	=> esc_html__('Title', 'infetech'),
						'date' 		=> esc_html__('Date', 'infetech'),
						'modified' 	=> esc_html__('Modified', 'infetech'),
						'rand' 		=> esc_html__('Rand', 'infetech'),
					]
				]
			);

			$this->add_control(
				'order_by',
				[
					'label' => esc_html__('Order', 'infetech'),
					'type' => Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => esc_html__('Ascending', 'infetech'),
						'desc' => esc_html__('Descending', 'infetech'),
					]
				]
			);

			$this->add_control(
				'text_readmore',
				[
					'label' => esc_html__( 'Text Read More', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Read More', 'infetech'),
				]
			);

			$this->add_control(
				'show_category',
				[
					'label' => esc_html__( 'Show Category', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'template' => ['template1','template4'],
					],
				]
			);

			$this->add_control(
				'show_short_desc',
				[
					'label' => esc_html__( 'Show Short Description', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'template' => 'template1'
					],
				]
			);

			$this->add_control(
				'show_short_desc_v2',
				[
					'label' => esc_html__( 'Show Short Description', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'template' => 'template2'
					],
				]
			);

			$this->add_control(
				'show_date',
				[
					'label' => esc_html__( 'Show Date', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_author',
				[
					'label' => esc_html__( 'Show Author', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'template!' => 'template4',
					],
				]
			);

			$this->add_control(
				'show_comment',
				[
					'label' => esc_html__( 'Show Comment', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			$this->add_control(
				'show_title',
				[
					'label' => esc_html__( 'Show Title', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			$this->add_control(
				'show_read_more',
				[
					'label' => esc_html__( 'Show Read More', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'infetech' ),
					'label_off' => esc_html__( 'Hide', 'infetech' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

		$this->end_controls_section();

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
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,
					'condition' => [
						'template' => 'template1',
					]
				]
			);

			$this->add_control(
				'margin_items_v2',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 0,
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'margin_items_v3',
				[
					'label'   => esc_html__( 'Margin Right Items', 'infetech' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 60,
					'condition' => [
						'template' => 'template4',
					]
				]
			);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 3,
					'condition'	=> [
						'template' => ['template1','template3'],
					],
				]
			);

			$this->add_control(
				'item_number_v2',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 2.5,
					'condition'	=> [
						'template' => 'template2',
					],
				]
			);

			$this->add_control(
				'item_number_v3',
				[
					'label'       => esc_html__( 'Item Number', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'infetech' ),
					'default'     => 3,
					'condition'	=> [
						'template' => 'template4',
					],
				]
			);
	
			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'infetech' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'infetech' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'infetech' ),
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
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => esc_html__( 'Dots(mobile)', 'infetech' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'infetech' ),
						'no'  => esc_html__( 'No', 'infetech' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		 //SECTION IAB STYLE IMAGE
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'image_height',
				[
					'label' 		=> esc_html__( 'Height', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 200,
							'max' => 500,
							'step' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .item .media img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//SECTION IAB STYLE CONTENT
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => 'template4',
				],
			]
		);

			$this->add_control(
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'content_background_color',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'content_box_shadow',
					'selector' => '{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content',
				]
			);

		$this->end_controls_section();

		//SECTION CONTENT STYLE CONTENT TEMPLATE 1
		$this->start_controls_section(
			'section_blog_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'template' => 'template1',
				],
			]
		);

			$this->add_control(
				'bgcolor_content',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_blog_content',
					'label' => esc_html__( 'Box Shadow', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .content',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_blog_content_hover',
					'label' => esc_html__( 'Box Shadow Hover', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content',
				]
			);

			$this->add_responsive_control(
				'padding_content',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_content',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE CONTENT

		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .post-title a',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__( 'Color Title', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .post-title a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__( 'Color Title Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content .post-title a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_title',
			[
				'label' => esc_html__( 'Padding', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__( 'Margin', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		//SECTION TAB STYLE DESC
		$this->start_controls_section(
			'section_short_desc',
			[
				'label' => esc_html__( 'Short Description', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_short_desc' => 'yes'
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'short_desc_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .short_desc',
				]
			);

			$this->add_control(
				'color_short_desc',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .short_desc' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_short_desc_hover',
				[
					'label' => esc_html__( 'Color Hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content .short_desc' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_short_desc',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .short_desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE SHORT DESC

		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__( 'Meta', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .right, {{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .right a',
				]
			);

			$this->add_control(
				'link_color_meta',
				[
					'label' => esc_html__( 'Link Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .right a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'link_color_meta_hover',
				[
					'label' => esc_html__( 'Link Color Hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .right a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'size_icon',
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
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .left' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color_meta',
				[
					'label' => esc_html__( 'Icon Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .left' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .left i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_meta',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider .blog-slider .item .post-meta .item-meta .separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-blog-slider.blog-template4 .blog-slider .item .content .post-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'template' => ['template1','template4'],
					],
				]
			);

			$this->add_responsive_control(
				'column_gap_version_2',
				[
					'label' 		=> esc_html__( 'Column Gap', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 30,
							'max' => 90,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-blog-slider.blog-template2 .blog-slider .item .content .post-meta' => 'column-gap: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'template' => 'template2',
					],
				]
			);

		$this->end_controls_section();

		// CATEGORY TAB
		$this->start_controls_section(
			'cat_section',
			[
				'label' => esc_html__( 'Category', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_category' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a',
			]
		);

		$this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cat_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a:hover' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'cat_padding',
			[
				'label' => esc_html__( 'Padding', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // END Category Tab

		// DATE
		$this->start_controls_section(
			'date_section',
			[
				'label' => esc_html__( 'Date', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_date' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .date',
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'time_typography',
				'selector' => '{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .post-meta .time .right',
				'condition' => [
					'template' => 'template4',
				],
			]
		);

		$this->add_control(
			'time_color',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .post-meta .time .right' => 'color : {{VALUE}};',
				],
				'condition' => [
					'template' => 'template4',
				],
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .date' => 'color : {{VALUE}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'date_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .date:hover' => 'color : {{VALUE}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'bg_date_color',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .date' => 'background-color : {{VALUE}};',
				],
				'condition' => [
					'template' => 'template1',
				],
			]
		);

		$this->add_control(
			'bg_date_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .date:hover' => 'background-color : {{VALUE}};',
				],
				'condition' => [
					'template' => 'template1',
				],
			]
		);

		$this->add_responsive_control(
			'date_padding',
			[
				'label' => esc_html__( 'Padding', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_responsive_control(
			'time_margin',
			[
				'label' => esc_html__( 'Margin', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .post-meta .item-meta.time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'template' => 'template4',
				],
			]
		);

		$this->add_control(
			'heading_background_gradient',
			[
				'label' => esc_html__( 'Background Gradient', 'infetech' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'template' => ['template2','template3'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_gradien',
				'label' => esc_html__( 'Background', 'infetech' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ova-blog-slider.blog-template2 .blog-slider .item .date',
				'condition' => [
					'template' => ['template2','template3'],
				],
			]
		);

		$this->add_control(
			'heading_background_gradient_hover',
			[
				'label' => esc_html__( 'Background Gradient Hover', 'infetech' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'template' => ['template2','template3'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_gradien_hover',
				'label' => esc_html__( 'Background', 'infetech' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .date:hover',
				'condition' => [
					'template' => ['template2','template3'],
				],

			]
		);

		$this->end_controls_section(); // END Date

		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Read More', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_read_more' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .read-more',
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'color_readmore',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .read-more' => 'color : {{VALUE}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'color_readmore_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content .read-more' => 'color : {{VALUE}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .read-more' => 'background-color : {{VALUE}};',
				],
				'condition' => [
					'template' => 'template1',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content .read-more:before' => 'background-color : {{VALUE}};',
				],
				'condition' => [
					'template' => 'template1',
				],
			]
		);

		$this->add_responsive_control(
			'padding_readmore',
			[
				'label' => esc_html__( 'Padding', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'template!' => 'template4',
				],
			]
		);

		$this->add_control(
			'margin_readmore',
			[
				'label' => esc_html__( 'Margin', 'infetech' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'template' => 'template4',
				],
			]
		);

		$this->add_control(
			'heading_background_gradient_v2',
			[
				'label' => esc_html__( 'Background Gradient', 'infetech' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'template' => ['template2','template3'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_gradien_v2',
				'label' => esc_html__( 'Background', 'infetech' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item .content .read-more',
				'condition' => [
					'template' => ['template2','template3'],
				],

			]
		);

		$this->add_control(
			'heading_background_gradient_v2_hover',
			[
				'label' => esc_html__( 'Background Gradient Hover', 'infetech' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'template' => ['template2','template3'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_gradien_hover_v2',
				'label' => esc_html__( 'Background', 'infetech' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ova-blog-slider .blog-slider .item:hover .content .read-more:before',
				'condition' => [
					'template' => ['template2','template3'],
				],

			]
		);

			$this->start_controls_tabs(
				'button_read_more_tabs',
				[
					'condition' => [
						'template' => 'template4',
					],
				]
				
			);

				$this->start_controls_tab(
					'button_read_more_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_readmore_typography',
							'selector' => '{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more .text-read-more',
						]
					);

					$this->add_control(
						'text_readmore_color',
						[
							'label' => esc_html__( 'Text Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more .text-read-more' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_color',
						[
							'label' => esc_html__( 'Icon Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more .icon-read-more i' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_size',
						[
							'label' => esc_html__( 'Icon Size', 'infetech' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
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
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more .icon-read-more i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'icon_readmore_space',
						[
							'label' => esc_html__( 'Space Between', 'infetech' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 200,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item .content .read-more .icon-read-more ' => 'margin-left: {{SIZE}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'button_read_more_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_readmore_hover_typography',
							'selector' => '{{WRAPPER}} .ova-blog-slider.blog-template4 .item:hover .content .read-more .text-read-more',
						]
					);

					$this->add_control(
						'text_readmore_color_hover',
						[
							'label' => esc_html__( 'Text Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item:hover .content .read-more .text-read-more' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_color_hover',
						[
							'label' => esc_html__( 'Icon Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item:hover .content .read-more .icon-read-more i' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'icon_readmore_size_hover',
						[
							'label' => esc_html__( 'Icon Size', 'infetech' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
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
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item:hover .content .read-more .icon-read-more i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'icon_readmore_space_hover',
						[
							'label' => esc_html__( 'Space between', 'infetech' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 200,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-blog-slider.blog-template4 .item:hover .content .read-more .icon-read-more' => 'margin-left: {{SIZE}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

		/* Begin Nav Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Nav Control', 'infetech' ),
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
						'.elementor-widget-container #ova-blog-slider-control button i' => 'font-size: {{SIZE}}{{UNIT}};',
						'.elementor-widget-container #ova-blog-slider-control-2 button i' => 'font-size: {{SIZE}}{{UNIT}};',
						'.elementor-widget-container #ova-blog-slider-control-3 button i' => 'font-size: {{SIZE}}{{UNIT}};',
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
								'.elementor-widget-container #ova-blog-slider-control button i' => 'color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-2 button i' => 'color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-3 button i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_background_nav_icon',
						[
							'label' => esc_html__( 'Background', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.elementor-widget-container #ova-blog-slider-control-2 button' => 'background: {{VALUE}};',
							],
							'condition' => [
								'template!' => ['template1', 'template4'],
							],
						]
					);

					$this->add_control(
						'color_nav_border',
						[
							'label' => esc_html__( 'Color Border', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.elementor-widget-container #ova-blog-slider-control button' => 'border-color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-2 button' => 'border-color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-3 button' => 'border-color : {{VALUE}};',
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
								'.elementor-widget-container #ova-blog-slider-control button:hover i' => 'color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-2 button:hover i' => 'color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-3 button:hover i' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'color_background_hover',
						[
							'label' => esc_html__( 'Background Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.elementor-widget-container #ova-blog-slider-control-2 button:hover' => 'background-color : {{VALUE}};',
							],
							'condition' => [
								'template!' =>  'template4',
							],
						]
					);

					$this->add_control(
						'color_nav_border_hover',
						[
							'label' => esc_html__( 'Color Border Hover', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'.elementor-widget-container #ova-blog-slider-control button:hover' => 'border-color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-2 button:hover' => 'border-color : {{VALUE}};',
								'.elementor-widget-container #ova-blog-slider-control-3 button:hover' => 'border-color : {{VALUE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

            $this->add_responsive_control(
				'nav_margin',
				[
					'label'      => esc_html__( 'Margin', 'infetech' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'.elementor-widget-container #ova-blog-slider-control button, .elementor-widget-container #ova-blog-slider-control-2 button, .elementor-widget-container #ova-blog-slider-control-3 button ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();
        /* End Nav Style */

        //SECTION TAB DOTS
		$this->start_controls_section(
			'section_dots',
			[
				'label' => esc_html__( 'Dots', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dot_control' => 'yes'
				]
			]
		);

			$this->add_responsive_control(
				'dots_width_height',
				[
					'label' 		=> esc_html__( 'Size', 'infetech' ),
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
						'.ova-blog-slider .owl-dots button.owl-dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; ',
					],
				]
			);

			$this->add_control(
				'dot_background',
				[
					'label' => esc_html__( 'Dots Background', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'.ova-blog-slider .owl-dots button.owl-dot' => 'background-color : {{VALUE}};',
					],
				]
			);

			
			$this->add_control(
				'heading_dot_background_gradient',
				[
					'label' => esc_html__( 'Background Gradient', 'infetech' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'dot_active_background_gradien',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-blog-slider .owl-dots button.owl-dot.active',
				]
			);


		$this->end_controls_section();
        /* End Dots Style */
		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();
		$template = $settings['template'];

		$data_options['template'] 			= $template;
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['rtl']				= is_rtl() ? true: false;
		$data_options['dots']           	= $settings['dot_control'] === 'yes' ? true : false;
        //slide
		if($template == 'template1'){
			$data_options['items'] 		= $settings['item_number'];
			$show_short_desc 			= $settings['show_short_desc'];
			$data_options['nav_left'] 	= 'ovaicon-back-2';
			$data_options['nav_right'] 	= 'ovaicon-next-4';
		} elseif( $template == 'template2' ) {
			$data_options['items'] 		= $settings['item_number_v2'];
			$show_short_desc 			= $settings['show_short_desc_v2'];
			$data_options['nav_left'] 	= ' ovaicon-back';
			$data_options['nav_right'] 	= ' ovaicon-next';
			$data_options['margin']     = $settings['margin_items_v2'];
		} elseif($template == 'template3') {
			$data_options['items'] 		= $settings['item_number'];
			$show_short_desc 			= $settings['show_short_desc_v2'];
			$data_options['nav_left'] 	= ' ovaicon-back';
			$data_options['nav_right'] 	= ' ovaicon-next';
			$data_options['margin']     = $settings['margin_items_v2'];
		} else {
			$data_options['items'] 		= $settings['item_number_v3'];
			$show_short_desc 			= $settings['show_short_desc_v2'];
			$data_options['nav_left'] 	= ' ovaicon-back';
			$data_options['nav_right'] 	= ' ovaicon-next';
			$data_options['margin']     = $settings['margin_items_v3'];
		}

        // blog
		$category 	 = $settings['category'];
		$total_count = $settings['total_count'];
		$order 		 = $settings['order_by'];
		$orderby 	 = $settings['orderby'];

		$text_readmore   = $settings['text_readmore'];
		$show_date       = $settings['show_date'];
		$show_author     = $settings['show_author'];
		$show_comment    = $settings['show_comment'];
		$show_title      = $settings['show_title'];
		$show_category   = $settings['show_category'];
		
		$show_read_more  = $settings['show_read_more'];

		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
				'orderby' => $orderby,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
				'orderby' => $orderby,
				'fields'	=> 'ids'
			];
		}

		$blog = new \WP_Query($args);

		 ?>

        <div class="ova-blog-slider blog-<?php echo esc_attr( $template );?>">
         	<ul class="blog-slider owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ; ?>">
         		
				<?php
					if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();

					$excerpt 	 = infetech_custom_text( get_the_excerpt(), 15 ) ;
					if ( ! has_excerpt() ) {
						$excerpt = wp_trim_words( get_the_content(), 15, '' );
					}
					// get first category from post
					$first_category  = wp_get_post_terms( get_the_ID(), 'category' )[0]->name;
				    $category_id     = get_cat_ID($first_category);
				    $category_link   = get_category_link( $category_id );
				?>
					<li class="item">

						<?php if(has_post_thumbnail()){ ?>

						    <div class="media">
					        	<?php 
					        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'large' );
					        	?>
					        	<a class="thumb-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					        		<img src="<?php echo esc_url( $thumbnail ) ?>" alt="<?php the_title(); ?>">
					        		<span class="ova-plus"></span>
					        	</a>
					        	
					        	<?php if( $show_category == 'yes' ) { ?>
					        		
							        	<span class="category">
								        	<a href="<?php echo esc_url($category_link); ?>" title="<?php the_title_attribute(); ?>">
												<?php echo esc_html($first_category); ?>
											</a>
									    </span>

								<?php } ?>

								<?php if( $show_date == 'yes' && $template != 'template4' ){ ?> 
							        <span class="date">
							        	<?php the_time( 'j M'); ?>
							        </span> 
							    <?php } ?>
								
					        </div>

				        <?php } ?>

			            <div class="content">

			            	<?php if( $template == 'template1'||$template == 'template4'): ?>
				            	<ul class="post-meta">

								    <?php if( $show_author == 'yes' && $template == 'template1'){ ?>
										<li class="item-meta wp-author">
									    	<span class="left author">
									    	 	<i class="far fa-user-circle"></i>
									    	</span>
										    <span class="right post-author">
									        	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_title_attribute(); ?>">
									        		<?php the_author_meta( 'display_name' ); ?>
									        	</a>
										    </span>
										    <span class="separator"> <?php echo esc_html('/'); ?></span>
									    </li>
									<?php } ?>
		                            
		                            <?php if( $show_comment == 'yes' && $template != 'template4'){ ?>
										<li class="item-meta comment">

											<span class="left ">
											    <i class="fas fa-comments"></i>
											</span>

											<span class="right link-comment">
												
												<?php comments_popup_link(
													esc_html__(' 0 comments', 'infetech'), 
													esc_html__(' 1 comment', 'infetech'), 
													' % '.esc_html__('comments', 'infetech'),
													'',
													esc_html__( 'comment off', 'infetech' )
												); ?>

											</span>
										</li>
									<?php } ?>

									<?php if( $template == 'template4'): ?>
										
										<?php if( $show_date == 'yes' ){ ?> 
											<li class="item-meta time">

												<span class="left">
												    <i class="far fa-calendar-alt"></i>
												</span>

										        <span class="right">
										        	<?php the_time('j F Y'); ?>
										        </span> 

										    </li>
									    <?php } ?>

										<?php if( $show_comment == 'yes' ){ ?>
											<li class="item-meta comment">

												<span class="left comment">
												    <i class="far fa-comment-dots"></i>
												</span>

												<span class="right link-comment">
													
													<?php comments_popup_link(
														esc_html__('Comments (0)', 'infetech'), 
														esc_html__(' Comments (1)', 'infetech'), 
														esc_html__('Comments', 'infetech').' (%) ',
														'',
														esc_html__( 'comment off', 'infetech' )
													); ?>
													
												</span>
											</li>
										<?php } ?>

									<?php endif; ?>

							    </ul>
							<?php endif; ?>

							<?php if( $show_title == 'yes' ){ ?>
					            <h2 class="post-title">
							        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							          <?php the_title(); ?>
							        </a>
							    </h2>
						    <?php } ?>

						    <?php if( $show_short_desc == 'yes' && $template != 'template4' ){ ?>
							    <div class="short_desc">
							    	<?php echo esc_html( $excerpt ); ?>
							    </div>
							<?php } ?>

							<?php if( $template == 'template2' || $template == 'template3'): ?>
				            	<ul class="post-meta">

								    <?php if( $show_author == 'yes' && $template == 'template2'){ ?>
										<li class="item-meta wp-author">

									    	<span class="left author">
									    	 	<i class="icomoon icomoon-user"></i>
									    	</span>

										    <span class="right post-author">
									        	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_title_attribute(); ?>">
									        		<?php the_author_meta( 'display_name' ); ?>
									        	</a>
										    </span>
										    
									    </li>
									<?php } ?> 

									<?php if( $show_author == 'yes' && $template == 'template3'){ ?>

										<li class="item-meta btn-read-more">
										    <a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										    	<?php  echo esc_html( $text_readmore ); ?>
										    </a>
									    </li>

									<?php } ?>
		                            
		                            <?php if( $show_comment == 'yes' ){ ?>
										<li class="item-meta comment">

											<span class="left comment">
											    <i class="icomoon icomoon-comment"></i>
											</span>

											<span class="right link-comment">
												
												<?php comments_popup_link(
													esc_html__('comment (0)', 'infetech'), 
													esc_html__('comment (1)', 'infetech'), 
													esc_html__('comments', 'infetech').' (%)',
													'',
													esc_html__( 'comment off', 'infetech' )
												); ?>
												
											</span>
											
										</li>
									<?php } ?>

							    </ul>
							<?php endif; ?>

						    <?php if($template == 'template1' || $template == 'template2' ||  $template == 'template4' ){

						    if( $show_read_more == 'yes' ) { ?>
							    <a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							    	<?php if($template == 'template4') : ?>
								    	<span class="text-read-more">
								    <?php endif; ?>
								    	<?php  echo esc_html( $text_readmore ); ?>
								    <?php if($template == 'template4') : ?>
								    	</span>
								    <?php endif; ?>

							    	<?php if($template == 'template4') : ?>
							    		<span class="icon-read-more">
							    			<i class="ovaicon ovaicon-up-arrow"></i>
							    		</span>
							    	<?php endif; ?>
							    </a>
						    <?php } } ?>
					
			            </div>

					</li>	
						
				<?php
					endwhile; endif; wp_reset_postdata();
				?>
			</ul>
        </div> 

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Blog_Slider() );