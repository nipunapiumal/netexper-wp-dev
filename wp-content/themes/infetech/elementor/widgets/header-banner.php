<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Infetech_Elementor_Header_Banner extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infetech_elementor_header_banner';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Header Banner', 'infetech' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hf' ];
	}

	

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
			]
		);

			
			$this->add_control(
				'header_boxed_content',
				[
					'label'        => esc_html__( 'Display Boxed Content', 'infetech' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);

			$this->add_control(
				'header_bg_source',
				[
					'label'        => esc_html__( 'Display Background by Feature Image in Post/Page', 'infetech' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);


			// Background Color
			$this->add_control(
				'cover_color',
				[
					'label' => esc_html__( 'Background Cover Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => 'rgba(0,0,0,0.51)',
					'description' => esc_html__( 'You can add background image in Advanced Tab', 'infetech' ),
					'selectors' => [
						'{{WRAPPER}} .cover_color' => 'background-color: {{VALUE}};',
					],
					'separator' => 'after'
				]
			);

			// Title
			$this->add_control(
				'show_title',
				[
					'label'        => esc_html__( 'Show Title', 'infetech' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .header_banner_el .header_title',
				]
			);
			
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Title Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'title_padding',
				[
					'label' => esc_html__( 'Title Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'title_tag',
				[
					'label' => esc_html__( 'Choose Title Format', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'h1' => esc_html__('H1', 'infetech'),
						'h2' => esc_html__('H2', 'infetech'),
						'h3' => esc_html__('H3', 'infetech'),
						'h4' => esc_html__('H4', 'infetech'),
						'h5' => esc_html__('H5', 'infetech'),
						'h6' => esc_html__('H6', 'infetech'),
						'div' => esc_html__('DIV', 'infetech'),
					],
					'default' => 'h1'
				]
			);

			

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_title',
					'label' => esc_html__( 'Title Typo', 'infetech' ),
					'selector'	=> '{{WRAPPER}} .header_banner_el .header_title',

				]
			);


			// Breadcrumbs
			$this->add_control(
				'show_breadcrumbs',
				[
					'label'        => esc_html__( 'Show Breadcrumbs', 'infetech' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .header_breadcrumbs',
					'separator' => 'before'
				]
			);
			
			$this->add_control(
				'breadcrumbs_color',
				[
					'label' => esc_html__( 'Breadcrumbs Color', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li .separator i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'breadcrumbs_color_hover',
				[
					'label' => esc_html__( 'Breadcrumbs Color hover', 'infetech' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .header_banner_el ul.breadcrumb li a:hover' => 'color: {{VALUE}};',
					],
				]
			);

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_breadcrumbs_typo',
					'label' => esc_html__( 'Breadcrumbs Typography', 'infetech' ),
					'selector'	=> '{{WRAPPER}} .header_banner_el ul.breadcrumb li',
					
				]
			);

			$this->add_responsive_control(
				'breadcrumbs_padding',
				[
					'label' => esc_html__( 'Breadcrumbs Padding', 'infetech' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .header_banner_el .header_breadcrumbs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			


			// Style
			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'infetech' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'infetech' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'infetech' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'infetech' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
					'default'	=> 'center',
					'separator' => 'before'
				]
			);
			

			$this->add_control(
				'class',
				[
					'label' => esc_html__( 'Class', 'infetech' ),
					'type' => Controls_Manager::TEXT,
				]
			);

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

		$class_bg = $attr_style = '';
		if( $settings['header_bg_source'] == 'yes' ){
			$current_id = infetech_get_current_id();
			$header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );	
			$class_bg = 'bg_feature_img';
			$attr_style = 'style="background: url( '.$header_bg_source.' )" ';
		}

		 ?>
		 	<!-- Display when you choose background per Post -->
		 	<div class="wrap_header_banner <?php echo esc_attr($class_bg).' '.$settings['align']; ?> " <?php printf( '%s', $attr_style ); ?> >

		 		<?php if( $settings['header_boxed_content'] == 'yes' ){ ?><div class="row_site"><div class="container_site"><?php } ?>
			 	
				 	<div class="cover_color"></div>

					<div class="header_banner_el <?php echo esc_attr( $settings['class'] ); ?>">
						
						<?php if( $settings['show_title'] == 'yes' ){ ?>
							
							<?php add_filter( 'infetech_show_singular_title', '__return_false' ); ?>

							<?php $title_tag = $settings['title_tag']; ?>
							<<?php echo esc_html( $title_tag ); ?> class=" header_title">
								<?php echo get_template_part( 'template-parts/parts/breadcrumbs_title' ); ?>
							</<?php echo esc_html( $title_tag ); ?>>
								
						<?php } ?>


						<?php if( $settings['show_breadcrumbs'] == 'yes' ){ ?>
							<div class="header_breadcrumbs">
								<?php echo get_template_part( 'template-parts/parts/breadcrumbs' ); ?>
							</div>
						<?php } ?>

					</div>

				<?php if( $settings['header_boxed_content'] == 'yes' ){ ?> </div></div> <?php } ?>

			</div>
		<?php
	}

	
}
$widgets_manager->register( new Infetech_Elementor_Header_Banner() );