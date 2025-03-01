<?php
namespace ova_career_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ova_archive_career extends Widget_Base {


	public function get_name() {
		return 'ova_archive_career';
	}

	public function get_title() {
		return esc_html__( 'Career Archive', 'ova-career' );
	}

	public function get_icon() {
		return 'eicon-text-field';
	}

	public function get_categories() {
		return [ 'career' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'ova-career' ),
			]
		);

		$args = array(
			'taxonomy' => 'cat_career',
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
			$cate_array[] = esc_html__( "No content Category found", "ova-career" );
		}

		$this->add_control(
			'category',
			[
				'label'   => esc_html__('Category', 'ova-career' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => array_merge( $catAll, $cate_array )
			]
		);

		$this->add_control(
			'total_count',
			[
				'label'   => esc_html__('Total', 'ova-career' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8
			]
		);

		$this->add_control(
			'number_column',
			[
				'label' => esc_html__('Number Column', 'ova-career' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'two_column',
				'options' => [
					'one_column'  => esc_html__('Single Column', 'ova-career' ),
					'two_column'  => esc_html__('2 Columns', 'ova-career' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__('OrderBy', 'ova-career' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ID',
				'options' => [
					'ID'  => esc_html__('ID', 'ova-career' ),
					'title'  => esc_html__('Title', 'ova-career' ),
					'date'  => esc_html__('Date', 'ova-career' ),
					'random'  => esc_html__('Randome', 'ova-career' ),
					'ova_career_met_order_career' => esc_html__('Custom Order', 'ova-career' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__('Order', 'ova-career' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__('Ascending', 'ova-career' ),
					'DESC'  => esc_html__('Descending', 'ova-career' ),
				],
			]
		);

		$this->end_controls_section();
        
        // STYLE SECTION
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .item-career .career-title',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__('Color ', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career .career-title' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__('Color hover', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career a:hover .career-title' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__('Margin', 'ova-career' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-career .career-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__('Meta', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'info_meta_typography',
					'selector' => '{{WRAPPER}} .item-career .by-and-categories',
				]
			);

			$this->add_control(
				'color_info_text',
				[
					'label' => esc_html__('Text Color ', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .item-career .by-and-categories' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_info_name',
				[
					'label' => esc_html__('Name Color ', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .item-career .by-and-categories .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_info_category',
				[
					'label' => esc_html__('Category Color ', 'ova-career' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .item-career .by-and-categories .categories a' => 'color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tags',
			[
				'label' => esc_html__('Tags', 'ova-career' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tags_typography',
				'selector' => '{{WRAPPER}} .item-career .tag-wrapper .tag',
			]
		);

		$this->add_control(
			'color_tag',
			[
				'label' => esc_html__('Color ', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career .tag-wrapper .tag' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_tag_active',
			[
				'label' => esc_html__('Active Color', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career .tag-wrapper .tag.from' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bgcolor_tag',
			[
				'label' => esc_html__('Background Color ', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career .tag-wrapper .tag' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bgcolor_tag_active',
			[
				'label' => esc_html__('Active BackgroundColor', 'ova-career' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .item-career .tag-wrapper .tag.from' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_tag',
			[
				'label' => esc_html__('Padding', 'ova-career' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-career .tag-wrapper .tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_ova_archive_career', 'elementor/ova_archive_career.php' );

		ob_start();
		ovacareer_get_template( $template, $settings );
		echo ob_get_clean();
		
	}
}