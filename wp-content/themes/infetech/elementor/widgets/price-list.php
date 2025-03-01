<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Price_List extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_price_list';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Price List', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-price-list';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ 'infetech-elementor-price-list' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
			]
		);	

		    $this->add_control(
				'active_position_number',
				[
					'label' => esc_html__( 'Pricing Active Position', 'infetech' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 3,
					'step' => 1,
					'default' => 0,
					'description' => esc_html__( '( Example : 0 is first price list )', 'infetech' ),
				]
			);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'infetech' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
				]
			);

			$repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Website Development', 'infetech' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'infetech' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Passages of Ipsum available, but the majority have suffered alteration some form injected humour or randomised words', 'infetech' ),
				]
			);

			$repeater->add_control(
				'currency_unit',
				[
					'label' => esc_html__( 'Currency Unit', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '$', 'infetech' ),
				]
			);

			$repeater->add_control(
				'price',
				[
					'label' => esc_html__( 'Price', 'infetech' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 39,
				]
			);

			$repeater->add_control(
				'period',
				[
					'label' => esc_html__( 'Period', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '/month', 'infetech' ),
				]
			);

			$this->add_control(
				'items',
				[
					'label' => esc_html__( 'List Price', 'infetech' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[	
							'link' => [
								'url' => '#basic-plan',
							],
							'title'  => esc_html__( 'Basic Plan', 'infetech' ),
							'price'  => esc_html__( '19', 'infetech' ),
						],
						[	
							'link' => [
								'url' => '#standard-plan',
							],
							'title'  => esc_html__( 'Standard Plan', 'infetech' ),
							'price'  => esc_html__( '48', 'infetech' ),
						],
						[	
							'link' => [
								'url' => '#premium-plan',
							],
							'title'  => esc_html__( 'Premium Plan', 'infetech' ),
							'price'  => esc_html__( '93', 'infetech' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->add_control(
				'text_btn',
				[
					'label' => esc_html__( 'Text Button', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Choose Plan', 'infetech' ),
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_section',
			[
				'label' => esc_html__( 'General', 'infetech' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'general_padding',
				[
					'label' => esc_html__( 'Padding','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'general_margin',
				[
					'label' => esc_html__( 'Margin','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs(
				'general_tabs'
			);

				$this->start_controls_tab(
					'general_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'general_background_color',
						[
							'label' => esc_html__( 'Background Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-price-list .item-price-list' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'general_border',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'general_box_shadow',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'general_active_tab',
					[
						'label' => esc_html__( 'Active', 'infetech' ),
					]
				);

					$this->add_control(
						'general_background_color_active',
						[
							'label' => esc_html__( 'Background Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-price-list .item-price-list.active' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'general_border_active',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list.active',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'general_box_shadow_active',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list.active',
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'title_margin',
				[
					'label' => esc_html__( 'Margin','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'price_section',
				[
					'label' => esc_html__( 'Price', 'infetech' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'price_typography',
					'selector' => '{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .ova-price',
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .ova-price' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'price_margin',
				[
					'label' => esc_html__( 'Margin','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .ova-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'period_options',
					[
						'label' => esc_html__( 'Period', 'infetech' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'period_typography',
					'selector' => '{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .period',
				]
			);

			$this->add_control(
				'period_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .period' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'period_margin',
				[
					'label' => esc_html__( 'Margin','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .top-content .price-wrapper .period' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'description_section',
				[
					'label' => esc_html__( 'Description', 'infetech' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .ova-price-list .item-price-list .content .pricing-description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .pricing-description' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'description_margin',
				[
					'label' => esc_html__( 'Margin','infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .content .pricing-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'dot_section',
			[
				'label' => esc_html__( 'Dot', 'infetech' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'dot_size',
				[
					'label' => esc_html__( 'Size', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%'],
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
						'{{WRAPPER}} .ova-price-list .item-price-list .dot' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'top',
				[
					'label' => esc_html__( 'Top', 'infetech' ),
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
						'{{WRAPPER}} .ova-price-list .item-price-list .dot' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'left',
				[
					'label' => esc_html__( 'Left', 'infetech' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .dot' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .item-price-list .dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


			$this->start_controls_tabs(
				'dot_tabs'
			);

				$this->start_controls_tab(
					'dot_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'infetech' ),
					]
				);

					$this->add_control(
						'dot_color',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-price-list .item-price-list .dot' => 'background-color: {{VALUE}}',
								
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'dot_border',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list .dot',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'dot_active_tab',
					[
						'label' => esc_html__( 'Active', 'infetech' ),
					]
				);

					$this->add_control(
						'dot_color_active',
						[
							'label' => esc_html__( 'Color', 'infetech' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-price-list .item-price-list.active .dot' => 'background-color: {{VALUE}}',
								
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'dot_border_active',
							'selector' => '{{WRAPPER}} .ova-price-list .item-price-list.active .dot',
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
				[
					'label' => esc_html__( 'Button', 'infetech' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'selector' => '{{WRAPPER}} .ova-price-list .choose-plan-button',
				]
			);

			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color Hover', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_background_color',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_background_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'infetech' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button:after' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_padding',
				[
					'label' => esc_html__( 'Padding', 'infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'button_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova-price-list .choose-plan-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings 		= $this->get_settings();
        $items    		= $settings['items'];
        $text_btn 		= $settings['text_btn'];

        $active_position_number	= $settings['active_position_number'];

		 ?>

            <div class="ova-price-list">
            	
		        <?php foreach( $items as $k => $item ) { 
		           	$title       	= $item['title'];
		           	$description 	= $item['description'];
		           	$currency_unit  = $item['currency_unit'];
		           	$price  		= $item['price'];
		           	$period  		= $item['period'];

					$data_options['link']  		= $item['link']['url'];
					$data_options['nofollow']   = ( isset( $item['link']['nofollow'] ) && $item['link']['nofollow'] == 'on') ? 'nofollow' : '';
		            $data_options['target']  	= ( isset( $item['link']['is_external'] ) && $item['link']['is_external'] == 'on' ) ? '_blank' :  '';

			    ?>

					<div class="item-price-list <?php if($k == $active_position_number)  echo esc_attr("active");?>"
						 data-options="<?php echo esc_attr(json_encode($data_options)) ; ?>"
					>
					
						<div class="dot"></div>

						<div class="content">

							<div class="top-content">

								<?php if ( !empty ($title)) : ?>

									<h3 class="title">
										<?php echo esc_html( $title ); ?>
									</h3>

								<?php endif; ?>

								<div class="price-wrapper">

						            <?php if( !empty( $price ) ) :?>

						                <div class="ova-price">

						                	<span><?php echo esc_html( $currency_unit ) ;?></span><?php echo esc_html($price) ; ?>

						                </div>

						                <span class="period"><?php echo esc_html( $period ) ;?></span>

						            <?php endif; ?>
				                </div>

							</div>
							
							<?php if( !empty( $description ) ) : ?>

				                <p class="pricing-description">
				                	<?php echo esc_html( $description ) ; ?>
				                </p>

			                <?php endif; ?>
							
						</div>

					</div>

				<?php } ?>
		
				<a href="" class="choose-plan-button"  rel="" target="_self">
					<?php echo esc_html( $text_btn ); ?>
				</a>	

			</div>

		<?php
	}
	
}
$widgets_manager->register( new Infetech_Elementor_Price_List() );