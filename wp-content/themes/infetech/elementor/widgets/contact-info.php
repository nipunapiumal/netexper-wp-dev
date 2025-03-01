<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_contact_info';
	}

	public function get_title() {
		return esc_html__( 'Contact Info', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-email-field';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

	protected function register_controls() {

		/**
		 * Content Tab
		 */
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
					]
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Class Icon', 'infetech' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
				]
			);

			$this->add_control(
				'label',
				[
					'label' => esc_html__( 'Label', 'infetech' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__('Label', 'infetech'),
				]
			);

			$this->add_responsive_control(
				'item_align',
				[
					'label' => esc_html__( 'Vertical Align ', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Top', 'infetech' ),
							'icon' 	=> 'eicon-v-align-top',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-v-align-middle',
						],
						'flex-end' => [
							'title' => esc_html__( 'Bottom', 'infetech' ),
							'icon' 	=> ' eicon-v-align-bottom',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info' => 'align-items: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-h-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> ' eicon-h-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info' => 'justify-content: {{VALUE}};',
					],
				]
			);

			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'type',
					[
						'label' => esc_html__( 'Type', 'infetech' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'email',
						'options' => [
							'email' => esc_html__('Email', 'infetech'),
							'phone' => esc_html__('Phone', 'infetech'),
							'link' => esc_html__('Link', 'infetech'),
							'text' => esc_html__('Text', 'infetech'),
						]
					]
				);

				$repeater->add_control(
					'email_label',
					[
						'label'   => esc_html__( 'Email Label', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'infetech' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);

				$repeater->add_control(
					'email_address',
					[
						'label'   => esc_html__( 'Email Adress', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'infetech' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);


				$repeater->add_control(
					'phone_label',
					[
						'label'   => esc_html__( 'Phone Label', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012 (345) 678', 'infetech' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'phone_address',
					[
						'label'   => esc_html__( 'Phone Adress', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012345678', 'infetech' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'link_label',
					[
						'label'   => esc_html__( 'Link Label', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'https://your-domain.com', 'infetech' ),
						'condition' => [
							'type' => 'link',
						]

					]
				);

				$repeater->add_control(
					'link_address',
					[
						'label'   => esc_html__( 'Link Adress', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'description' => esc_html__( 'https://your-domain.com', 'infetech' ),
						'condition' => [
							'type' => 'link',
						],
						'show_external' => false,
						'default' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],

					]
				);

				$repeater->add_control(
					'text',
					[
						'label'   => esc_html__( 'Text', 'infetech' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'description' => esc_html__( 'Your text', 'infetech' ),
						'condition' => [
							'type' => 'text',
						]

					]
				);

			$this->add_control(
				'items_info',
				[
					'label'       => esc_html__( 'Items Info', 'infetech' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default' => [
						[
							'type' => 'email',
							'email_label' => esc_html__('email@company.com', 'infetech'),
							'email_address' => esc_html__('email@company.com', 'infetech'),
						],
						
					],
					'title_field' => '{{{ type }}}',
				]
			);

		$this->end_controls_section(); 
		// End Content Tab


		/**
		 * Icon Style Tab
		 */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 100,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_bgsize',
				[
					'label' => esc_html__( 'Background Size', 'infetech' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .icon' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .icon' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_bgcolor',
				[
					'label' => esc_html__( 'Background Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .icon' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_bgcolor_template2',
					'types' => [ 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-contact-info .circle',
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .icon, {{WRAPPER}} .ova-contact-info .circle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); // End Icon Style Tab

		/**
		 * Label Style Tab
		 */
		$this->start_controls_section(
			'section_label_style',
			[
				'label' => esc_html__( 'Label', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			
			$this->add_control(
				'label_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'label_typography',
					'selector' => '{{WRAPPER}} .ova-contact-info .contact .label',
				]
			);

			$this->add_responsive_control(
				'label_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'label_align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-h-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> ' eicon-h-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section(); // End Label Style Tab


		/**
		 * Info Style Tab
		 */
		$this->start_controls_section(
			'section_info_style',
			[
				'label' => esc_html__( 'Info', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

			$this->add_control(
				'info_color',
				[
					'label' => esc_html__( 'Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-contact-info .contact .info .item a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'info_color_hover',
				[
					'label' => esc_html__( 'Link Color hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'info_typography',
					'selector' => '{{WRAPPER}} .ova-contact-info .contact .info .item, {{WRAPPER}} .ova-contact-info .contact .info .item a',
				]
			);

			$this->add_responsive_control(
				'info_margin',
				[
					'label' => esc_html__( 'Margin', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_info_align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' 	=> 'eicon-h-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' 	=> ' eicon-h-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Label Style Tab

	}

	protected function render() {

		$settings = $this->get_settings();

		$icon       = $settings['icon'] ? $settings['icon'] : '';
		$label      = $settings['label'] ? $settings['label'] : '';
		$items_info = $settings['items_info'];
		$template   = $settings['template'] ? $settings['template'] : '';
		
		?>
			<div class="ova-contact-info <?php echo esc_attr( $template ); ?>">
				
				<?php if( $icon ){ ?>
					<?php if( $template === "template2" ): ?>
						<div class="circle">
							<div class="icon">
								<i class="<?php echo esc_attr( $icon['value'] ); ?>"></i>
							</div>
						</div>	
				    <?php else :?>
				    	<div class="icon">
							<i class="<?php echo esc_attr( $icon['value'] ); ?>"></i>
						</div>
					<?php endif; ?>
			    <?php } ?>
				
				<div class="contact">
					
					<?php if( $label ){ ?>
						<div class="label">
							<?php echo esc_html( $label ); ?>
						</div>
					<?php } ?>

					<ul class="info">
						<?php foreach( $items_info as $item ):

							$type 	= $item['type'];
							
							?>

								<li class="item">

									<?php switch ( $type ) {

										case 'email':

											$email_address = $item['email_address'];
											$email_label = $item['email_label'];
											if( $email_address && $email_label ){
											?>
												<a href="mailto:<?php echo esc_attr( $email_address ) ?> " title="<?php esc_attr_e( 'address', 'infetech' ); ?>">
													<?php echo esc_html( $email_label ); ?>
												</a>
											<?php
											}
											break;

										case 'phone':

											$phone_address = $item['phone_address'];
											$phone_label = $item['phone_label'];
											if( $phone_address && $phone_label ){
											?>
												<a href="tel:<?php echo esc_attr( $phone_address ) ?> " title="<?php esc_attr_e( 'address', 'infetech' ); ?>">
													<?php echo esc_html( $phone_label ); ?>
												</a>
											<?php
											}
											break;

										case 'link':

											$this->add_render_attribute( 'title' );

											$link_address = $item['link_address']['url'];
											$link_label = $item['link_label'];

											$title = $item['link_label'] ? $item['link_label'] : '';

											if ( ! empty( $item['link_address']['url'] ) ) {

												$this->add_link_attributes( 'url', $item['link_address'] );

												echo sprintf( '<a %1$s title="%2$s">%3$s</a>', $this->get_render_attribute_string( 'url' ), esc_attr( $title ), esc_html($title) );

											}else{

												echo esc_html($title);

											}
											
											break;

										case 'text':
											$text = $item['text'];
											?>
												<?php echo esc_html( $text ); ?>
											<?php
											break;
										default:
											break;
									} ?>
								</li>
							
						<?php endforeach; ?>
					</ul>

				</div>

			</div>

		<?php
	}
// end render
}

$widgets_manager->register( new Infetech_Elementor_Contact_Info() );