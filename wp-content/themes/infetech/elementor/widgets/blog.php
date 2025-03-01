<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Infetech_Elementor_Blog extends Widget_Base {

	public function get_name() {
		return 'infetech_elementor_blog';
	}

	public function get_title() {
		return esc_html__( 'Blog', 'infetech' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'infetech' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

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

		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
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
					'default' => 3,
				]
			);

			$this->add_control(
				'number_column',
				[
					'label' => esc_html__( 'Columns', 'infetech' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'columns3',
					'options' => [
						'columns2' => esc_html__( '2 Columns', 'infetech' ),
						'columns3' => esc_html__( '3 Columns', 'infetech' ),
						'columns4' => esc_html__( '4 Columns', 'infetech' ),
					]
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
		//END SECTION CONTENT

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
						'{{WRAPPER}} .ova-blog .item .media img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

        //SECTION CONTENT STYLE CONTENT
		$this->start_controls_section(
			'section_blog_content',
			[
				'label' => esc_html__( 'Content', 'infetech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bgcolor_content',
			[
				'label' => esc_html__( 'Background Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_blog_content',
				'label' => esc_html__( 'Box Shadow', 'infetech' ),
				'selector' => '{{WRAPPER}} .ova-blog .item .content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_blog_content_hover',
				'label' => esc_html__( 'Box Shadow Hover', 'infetech' ),
				'selector' => '{{WRAPPER}} .ova-blog .item:hover .content',
			]
		);

		$this->add_responsive_control(
			'padding_content',
			[
				'label' => esc_html__( 'Padding', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ova-blog .item .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .ova-blog .item .content .post-title a',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content .post-title a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item:hover .content .post-title a' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .content .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE


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
				'selector' => '{{WRAPPER}} .ova-blog .item .content .short_desc',
			]
		);

		$this->add_control(
			'color_short_desc',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content .short_desc' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_short_desc_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item:hover .content .short_desc' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .content .short_desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

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
				'selector' => '{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right, {{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a',
			]
		);

		$this->add_control(
			'link_color_meta',
			[
				'label' => esc_html__( 'Link Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color_meta_hover',
			[
				'label' => esc_html__( 'Link Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a:hover' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .left' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color_meta',
			[
				'label' => esc_html__( 'Icon Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .left' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .ova-blog .item .category a',
			]
		);

		$this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cat_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a:hover' => 'background-color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .ova-blog .item .date',
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .date' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'date_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .date:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_date_color',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .date' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_date_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .date:hover' => 'background-color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-blog .item .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .ova-blog .item .content .read-more',
			]
		);

		$this->add_control(
			'color_readmore',
			[
				'label' => esc_html__( 'Color', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content .read-more' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_readmore_hover',
			[
				'label' => esc_html__( 'Color Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item:hover .content .read-more' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore',
			[
				'label' => esc_html__( 'Background', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content .read-more' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore_hover',
			[
				'label' => esc_html__( 'Background Hover', 'infetech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item:hover .content .read-more:before' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_readmore',
			[
				'label' => esc_html__( 'Margin', 'infetech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .content .read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

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
		$settings = $this->get_settings_for_display();
		
		$category 		 = $settings['category'];
		$total_count 	 = $settings['total_count'];
		$order 			 = $settings['order_by'];
		$orderby 		 = $settings['orderby'];
		$number_column 	 = $settings['number_column'];

		$text_readmore   = $settings['text_readmore'];
		$show_date       = $settings['show_date'];
		$show_author     = $settings['show_author'];
		$show_comment    = $settings['show_comment'];
		$show_title      = $settings['show_title'];
		$show_category   = $settings['show_category'];
		$show_short_desc = $settings['show_short_desc'];
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
		
		<ul class="ova-blog <?php echo esc_attr( $number_column ) ?>">
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
				        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'infetech_thumbnail' );
				        	?>
				        	<a class="thumb-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        		<img src="<?php echo esc_url( $thumbnail ) ?>" alt="<?php the_title(); ?>">
				        		<span class="ova-plus"></span>
				        	</a>
				        	
				        	<?php if( $show_category == 'yes' ){ ?>
				        		<span class="category">
						        	<a href="<?php echo esc_url($category_link); ?>">
										<?php echo esc_html($first_category); ?>
									</a>
							    </span>
							<?php } ?>

							<?php if( $show_date == 'yes' ){ ?> 
						        <span class="date">
						        	<?php the_time( 'j M'); ?>
						        </span> 
						    <?php } ?>
							
				        </div>

			        <?php } ?>

		            <div class="content">
		            	 <ul class="post-meta">

						    <?php if( $show_author == 'yes' ){ ?>
								<li class="item-meta wp-author">
							    	<span class="left author">
							    	 	<i class="far fa-user-circle"></i>
							    	</span>
								    <span class="right post-author">
							        	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_title_attribute(); ?>">
							        		<?php the_author_meta( 'display_name' ); ?>
							        	</a>
								    </span>
								    <span class="separator">/</span>
							    </li>
							<?php } ?>
                            
                            <?php if( $show_comment == 'yes' ){ ?>
								<li class="item-meta comment">
									<span class="left comment">
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

					    </ul>
						

						<?php if( $show_title == 'yes' ){ ?>
				            <h2 class="post-title">
						        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						          <?php the_title(); ?>
						        </a>
						    </h2>
					    <?php } ?>

					    <?php if( $show_short_desc == 'yes' ){ ?>
						    <div class="short_desc">
						    	<?php echo esc_html( $excerpt ); ?>
						    </div>
						<?php } ?>

					    <?php if( $show_read_more == 'yes' ){ ?>
						    <a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						    	<?php  echo esc_html( $text_readmore ); ?>
						    </a>
					    <?php }?>
				
		            </div>

				</li>	
					
			<?php
				endwhile; endif; wp_reset_postdata();
			?>
		</ul>
		
		
		<?php
	}
}

$widgets_manager->register( new Infetech_Elementor_Blog() );