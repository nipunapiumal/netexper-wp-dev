<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Infetech_Elementor_Service_3 extends Widget_Base {

	
	public function get_name() {
		return 'infetech_elementor_service_3';
	}

	
	public function get_title() {
		return esc_html__( 'Service 3', 'infetech' );
	}

	
	public function get_icon() {
		return 'eicon-editor-list-ul';
	}

	
	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
			]
		);	
			
			
			// Add Class control

		    $this->add_control(
				'number_column',
				[
					'label' => esc_html__( 'Number Column', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'three_column',
					'options' => [
						'one_column' => esc_html__('Single Column', 'infetech'),
						'two_column' => esc_html__('2 Columns', 'infetech'),
						'three_column' => esc_html__('3 Columns', 'infetech'),
					]
				]
			);
            
            $repeater = new \Elementor\Repeater();

		    $repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Image', 'infetech' ),
					'type'    => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					]
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'infetech' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'infetech' ),
					'show_label' => true,
				]
			);

			$repeater->add_control(
				'text_number',
				[
					'label' => esc_html__( 'Drop Cap', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'G', 'infetech' ),
				]
			);

			$repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'infetech' ),
					'type' => Controls_Manager::TEXT,
					'default' => 'Gaming and Entertainment',
					'description' 	=> esc_html__( 'Can use <br> tag html for line breaks', 'infetech' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' 	=> esc_html__( 'Description', 'infetech' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'default' 	=> esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in form.', 'infetech' ),
				]
			);

			$repeater->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_image_info_service_3',
					'label' => esc_html__( 'Background', 'infetech' ),
					'types' => [ 'classic' ],
					'selector' => '{{WRAPPER}} .ova-service-3 {{CURRENT_ITEM}} .mask',
				]
			);

			$repeater->add_responsive_control(
				'background_image_opacity',
				[
					'label' 		=> esc_html__( 'Background Image Opacity', 'infetech' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1,
							'step' => 0.05,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .mask' => 'opacity: {{SIZE}};',
					],
				]
			);

			$this->add_control(
				'items',
				[
					'label' => esc_html__( 'Items Service', 'infetech' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[	
							'text_number'  => esc_html__( 'G', 'infetech' ),
							'title'        => 'Gaming and <br> Entertainment', 'infetech',
							'description'  => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in form.', 'infetech' ),
						],
						[	
							'text_number'  => esc_html__( 'B', 'infetech' ),
							'title'        => 'Business and <br> Finance',
							'description'  => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in form.', 'infetech' ),
						],
						[	
							'text_number'  => esc_html__( 'T', 'infetech' ),
							'title'        => 'Information <br> Technology',
							'description'  => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in form.', 'infetech' ),
						],
					],
					'title_field' => '{{{ title }}}',
				]
			);

		$this->end_controls_section();

		/* Begin text number (Drop Cap) Style */
		$this->start_controls_section(
            'textnumber_style',
            [
                'label' => esc_html__( 'Drop Cap', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'textnumber_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-3 .item-service-3 .image-service-3 .text_number',
				]
			);

			$this->add_control(
				'textnumber_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .image-service-3 .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .image-service-3 .text_number' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3:hover .image-service-3 .text_number' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'textnumber_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3:hover .image-service-3 .text_number' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'textnumber_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-3 .item-service-3 .image-service-3 .text_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'text_number_border',
					'label' => esc_html__( 'Border', 'infetech' ),
					'selector' => '{{WRAPPER}} .ova-service-3 .item-service-3 .image-service-3 .text_number',
				]
			);

        $this->end_controls_section();

		/* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-3 .item-service-3 .info .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .info .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3:hover .info .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-3 .item-service-3 .info .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-service-3 .item-service-3 .info .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .info .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'description_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3:hover .info .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'description_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'infetech' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-service-3 .item-service-3 .info .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		/* Begin Background Style */
		$this->start_controls_section(
            'shape_service_style',
            [
                'label' => esc_html__( 'Background', 'infetech' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_control(
				'square_bgcolor',
				[
					'label' 	=> esc_html__( 'Square Background', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .info .square' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'service_info_bgcolor',
				[
					'label' 	=> esc_html__( 'Background', 'infetech' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-service-3 .item-service-3 .info' => 'background-color: {{VALUE}};',
					],
				]
			);

         $this->end_controls_section();

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$number_column    =    $settings['number_column'];
		$items            =    $settings['items']; 

		?>

		 	<div class="ova-service-3 <?php echo esc_attr( $number_column ); ?>">

		 		<?php 
		           foreach( $items as $item ) { 

		              	$item_id 	      =    'elementor-repeater-item-' . $item['_id'];
		                $title            =    $item['title'];
						$text_number      =    $item['text_number'];
						$description      =    $item['description'];
						$link             =    $item['link'];
						$nofollow         =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
						$target           =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : '';

						// get url image
						$url 	 = $item['image']['url'];
						if ( empty( $url ) ) {
							return;
						}
						$alt_img = ( isset( $item['image']['alt'] ) &&  $item['image']['alt'] !== '' ) 
						           ? $item['image']['alt'] : $title ; 

						$url_bg_image   =   ( isset( $item['background_image'] ) && $item['background_image'] ) ? $item['background_image']['url'] : '';   
				  
			    ?>

				    <div class="item-service-3 <?php echo esc_attr( $item_id ); ?>">

	                    <div class="image-service-3">
				 			<?php if (!empty( $text_number )): ?>
				            	<span class="text_number"><?php echo esc_html( $text_number ); ?></span>
				          	<?php endif;?>
			                
			                <?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
								<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $alt_img ); ?>">
				            <?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>
				 		</div>

				 		<div class="info">

				 			<div class="mask"></div>

				 			<div class="square"></div>
				 			<?php if(!empty( $link['url'])) : ?>
							  <a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo esc_attr( $target ); ?> <?php echo esc_attr( $nofollow ); ?> title="<?php echo esc_attr( $title ); ?>">
						    <?php endif; ?>
					            <?php if (!empty( $title )): ?>
									<h4 class="title">
										<?php printf( $title ); ?>
									</h4>
								<?php endif;?>
							<?php if(!empty( $link['url'])) : ?>
								</a>
							<?php endif; ?>

							<?php if (!empty( $description )): ?>
								<p class="description">
									<?php echo esc_html( $description ); ?>
								</p>
							<?php endif;?>  
				 		</div>

	                </div>

	            <?php } ?>

		    </div>

		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Service_3() );