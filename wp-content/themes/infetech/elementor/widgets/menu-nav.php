<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Menu_Nav extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_menu_nav';
	}

	public function get_title() {
		return esc_html__( 'Menu', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-nav-menu';
	}

	public function get_categories() {
		return [ 'hf' ];
	}
	

	protected function register_controls() {


		/* Global Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_menu_type',
			[
				'label' => esc_html__( 'Global', 'infetech' ),
			]
		);


			$menus = \wp_get_nav_menus();
			$list_menu = array();
			foreach ($menus as $menu) {
				$list_menu[$menu->slug] = $menu->name;
			}

			$this->add_control(
				'menu_slug',
				[
					'label' => esc_html__( 'Select Menu', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'options' => $list_menu,
					'default' => '',
					'prefix_class' => 'elementor-view-',
				]
			);
				
		$this->end_controls_section();	


		/* Parent Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Parent Menu', 'infetech' ),
			]
		);

			// Typography Parent Menu
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'menu_typography',
					'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} ul li a'
				]
			);

			$this->add_responsive_control(
				'menu_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'menu_li_padding',
				[
					'label' => esc_html__( 'Item Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} ul.menu > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'menu_a_padding',
				[
					'label' => esc_html__( 'Content Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


			// Control Tabs
			$this->start_controls_tabs(
				'style_parent_menu_tabs'
			);

				// Normal Tab
				$this->start_controls_tab(
					'style_parent_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'link_color',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li > a' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'line_color',
						[
							'label' => esc_html__( 'Line Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .main-navigation ul.menu > li > a:before' => 'background-color: {{VALUE}};',
							],
							'description' => esc_html__( '( Use with class ova-menu-custom-line )', 'infetech' ),
						]
					);

				$this->end_controls_tab();

				// Hover Tab
				$this->start_controls_tab(
					'style_parent_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_control(
						'link_color_hover',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li > a:hover' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

				// Active Tab
				$this->start_controls_tab(
					'style_parent_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'infetech' ),
					]
				);

					$this->add_control(
						'link_color_active',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li.current-menu-item > a' => 'color: {{VALUE}};',
							]
							
						]
					);

					$this->add_control(
						'custom_line_width',
						[
							'label' => esc_html__( 'Line Width', 'infetech' ),
							'description' => esc_html__( '( Use with class ova-menu-custom-line )', 'infetech' ),
							'type' => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 30,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								]
							],
							'selectors' => [
								'{{WRAPPER}} .main-navigation ul li.menu-item.current-menu-item > a:before' => 'width: {{SIZE}}{{UNIT}}',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		/* Sub Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_submenu_content',
			[
				'label' => esc_html__( 'Sub Menu', 'infetech' ),
			]
		);	

			// Typography SubMenu
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'submenu_typography',
					'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} ul.sub-menu li a'
				]
			);

			// Background Submenu
			$this->add_control(
				'submenu_bg_color',
				[
					'label' => esc_html__( 'Background', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} ul.sub-menu' => 'background-color: {{VALUE}};',
					]
					
				]
			);

			// Background Item Hover In Submenu
			$this->add_control(
				'submenu_bg_item_hover_color',
				[
					'label' => esc_html__( 'Background Item Hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} ul.sub-menu li a:hover' => 'background-color: {{VALUE}};',
					]
					
				]
			);

			// Control Tabs
			$this->start_controls_tabs(
				'style_sub_menu_tabs'
			);

				// Normal Tab
				$this->start_controls_tab(
					'style_sub_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'submenu_link_color',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

				// Hover Tab
				$this->start_controls_tab(
					'style_sub_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'infetech' ),
					]
				);

					$this->add_control(
						'submenu_link_color_hover',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li a:hover' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();


				// Active Tab
				$this->start_controls_tab(
					'style_sub_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'infetech' ),
					]
				);

					$this->add_control(
						'submenu_link_color_active',
						[
							'label' => esc_html__( 'Menu Color', 'infetech' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li.current-menu-item > a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		
		$settings = $this->get_settings();
		
		?>

		<nav class="main-navigation">
            <button class="menu-toggle">
            	<span>
            		<?php echo esc_html__( 'Menu', 'infetech' ); ?>
            	</span>
            </button>
			<?php
				wp_nav_menu( [
					'theme_location'  => $settings['menu_slug'],
					'container_class' => 'primary-navigation',
					'menu'              => $settings['menu_slug'],
				] );
			?>
        </nav>
		

	<?php }

	
}


$widgets_manager->register( new Infetech_Elementor_Menu_Nav() );