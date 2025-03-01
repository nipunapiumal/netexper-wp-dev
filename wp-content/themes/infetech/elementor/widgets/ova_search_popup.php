<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Infetech_Elementor_Ova_Search_Popup extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_ova_search_popup';
	}

	public function get_title() {
		return esc_html__( 'Search Popup', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'hf' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-ova-search-popup' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_search',
			[
				'label' => esc_html__( 'Search', 'infetech' ),
			]
		);
			
			$this->add_control(
				'color_icon_search',
				[
					'label' => esc_html__( 'Icon Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'color_hover_icon_search',
				[
					'label' => esc_html__( 'Icon Hover Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'size_icon',
				[
					'label' => esc_html__( 'Size Icon', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		?>

			<div class="ova_wrap_search_popup">
				<i class="ovaicon ovaicon-search"></i>
				<div class="ova_search_popup">
					<div class="search-popup__overlay"></div>
					<div class="container">
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'infetech' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'infetech' ) ?>" />
				   			 	<button type="submit" class="search-submit">
				   			 		<i class="ovaicon ovaicon-search"></i>
				   			 	</button>
						</form>									
					</div>
				</div>
			</div>

		<?php
	}

}

$widgets_manager->register( new Infetech_Elementor_Ova_Search_Popup() );