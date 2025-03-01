<?php

	$url_bg_image = $args['background_image']['url'];

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

	$terms = get_terms( array(
	    'taxonomy'   => 'cat_career',
	    'hide_empty' => false,
	) );

?>

<div class="ova-category-career-slider">

	<div class="slide-category-career owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
         
        <?php foreach( $terms as $term) { 

        	$class_icon 	= get_term_meta( $term->term_id, 'class_icon', true );
			$link 			= get_term_link($term->term_id,'cat_career');
			$title 			= $term->name;
			$description 	= $term->description;

        ?>
		    <div class="item-category-career">

                <div class="mask"
                    <?php if (!empty( $url_bg_image )): ?> 
		 	    	 	style="background-image: url(<?php echo esc_attr( $url_bg_image ); ?>)"
		 	    	<?php endif;?>
                >	
                </div>

				<?php if (!empty( $class_icon )): ?>
	            	<div class="icon">
	            		<i aria-hidden="true" class="<?php echo esc_attr($class_icon)?>"></i>
	            	</div>
	            <?php endif;?>
                
				<a href="<?php echo esc_url( $link ); ?> ">
					<h4 class="title">
						<?php echo esc_html( $title ); ?>
					</h4>
				</a>
			

				<?php if (!empty( $description )): ?>
					<p class="description">
						<?php echo esc_html( $description ); ?>
					</p>
				<?php endif;?>

		    </div>

		<?php } ?>

	</div>

</div>