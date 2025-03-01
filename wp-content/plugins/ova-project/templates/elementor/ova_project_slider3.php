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


	$projects = ovaproject_get_data_project_slider_el( $args );

?>

<div class="ova-project-slider-3">

	<div class="content slide-project-3 owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">

		<?php if( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post(); ?>

			<div class="item">
				<?php 
                    $thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'infetech_thumbnail' );
                    if ( $thumbnail == '') {
					    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
					}
					$id          = get_the_id();
					$sub_title   = get_post_meta( $id, 'ova_project_sub_title', true );
					if ( function_exists('infetech_custom_text') ) {
						$excerpt = infetech_custom_text( get_the_excerpt(), 17 );
					}
					if ( ! has_excerpt() ) {
						$excerpt = wp_trim_words( get_the_content(), 17, '...' );
					}

					$custom_link = get_post_meta( $id, 'ova_project_custom_link', true );
					$permalink   = get_the_permalink($id);

					if( !empty($custom_link) ) {
						$permalink  = $custom_link;
					}
				?>

				<div class="ova-media">

				    <div class="content">
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

					<?php if( ! empty( $excerpt ) ) { ?>
						<p class="excerpt">
							<?php echo esc_html( $excerpt ) ?>
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

			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

</div>