<?php

    $show_link_to = $args['show_link_to_detail'];
    $text_button  = $args['text_button'];

    $data_options['items']              = $args['item_number'];
	$data_options['slideBy']            = $args['slides_to_scroll'];
	$data_options['margin']             = $args['margin_items'];
	$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
	$data_options['loop']               = $args['infinite'] === 'yes' ? true : false;
	$data_options['autoplay']           = $args['autoplay'] === 'yes' ? true : false;
	$data_options['autoplayTimeout']    = $args['autoplay_speed'];
	$data_options['smartSpeed']         = $args['smartspeed'];
	$data_options['dots']               = $args['dot_control'] === 'yes' ? true : false;
	$data_options['nav']                = $args['nav_control'] === 'yes' ? true : false;


	$projects = ovaproject_get_data_project_slider_el( $args );
	$count = 0;

?>

<div class="ova-project-slider-4">

	<div class="content slide-project-4 owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">

		<?php if( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post(); ?>

			<div class="item">
				<?php 
                    $thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'large' );
                    if ( $thumbnail == '') {
					    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
					}
					$id          = get_the_id();
					$sub_title   = get_post_meta( $id, 'ova_project_sub_title', true );
					
					$custom_link = get_post_meta( $id, 'ova_project_custom_link', true );
					$permalink   = get_the_permalink($id);

					if( !empty($custom_link) ) {
						$permalink  = $custom_link;
					}
					$count++;
				?>

				<div class="ova-media">

				    <div class="content">

				    	<div class="text-number">
				    		<?php echo sprintf('%02s', $count) ?>
				    	</div>

				    	<?php if( $show_link_to == 'yes' ): ?>
				        <a href="<?php echo esc_url($permalink); ?>">
					    <?php endif; ?>	

							<h3 class="title">
								<?php the_title() ?>
							</h3>
							
						<?php if( $show_link_to == 'yes' ): ?>
						 </a>
					    <?php endif; ?>	

						<?php if( ! empty( $sub_title ) ) { ?>
							<p class="sub_title">
								<?php echo esc_html( $sub_title ) ?>
							</p>
						<?php } ?>

						<?php if( $show_link_to == 'yes' ): ?>
					        <a href="<?php echo esc_url($permalink); ?>">
						<?php endif; ?>	
							<div class="learn-more-btn">
							   	<?php echo esc_html($text_button); ?> 
							</div>
						<?php if( $show_link_to == 'yes' ): ?>
							</a>
					    <?php endif; ?>
				    </div>
                    
                    <?php if( $show_link_to == 'yes' ): ?>
				        <a href="<?php echo esc_url($permalink); ?>">
					<?php endif; ?>	
						<div class="project-img">
							<img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php the_title(); ?>">
						</div>
					<?php if( $show_link_to == 'yes' ): ?>
						</a>
					<?php endif; ?>

				</div>

			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>