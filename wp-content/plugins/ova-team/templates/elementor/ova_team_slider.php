<?php

	$data_options['items']              = $args['item_number'];
	$data_options['slideBy']            = $args['slides_to_scroll'];
	$data_options['margin']             = $args['margin_items'];
	$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
	$data_options['loop']               = $args['infinite'] === 'yes' ? true : false;
	$data_options['autoplay']           = $args['autoplay'] === 'yes' ? true : false;
	$data_options['autoplayTimeout']    = $args['autoplay_speed'];
	$data_options['smartSpeed']         = $args['smartspeed'];
	$data_options['nav']                = $args['nav_control'] === 'yes' ? true : false;
	$data_options['dots']               = $args['dot_control'] === 'yes' ? true : false;

	$teams = ovateam_get_data_team_el( $args );

?>

<div class="ova-team-slider">

	<div class="content slide-team owl-carousel owl-theme <?php echo esc_attr($template);?>" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">

		<?php if( $teams->have_posts() ) : while ( $teams->have_posts() ) : $teams->the_post(); ?>

            <?php if( $template === 'template1' ) {
	        	ovateam_get_template( 'parts/item-team.php', $args );

	        } elseif( $template === 'template2' ) {
	        	ovateam_get_template( 'parts/item-team2.php', $args );

	        } elseif( $template === 'template3' ) {
	        	ovateam_get_template( 'parts/item-team3.php', $args );

	        } elseif( $template === 'template4' ) {
	        	ovateam_get_template( 'parts/item-team4.php', $args ); 
            
            } elseif( $template === 'template5' ) {
	        	ovateam_get_template( 'parts/item-team5.php', $args );

	        } else {
	        	ovateam_get_template( 'parts/item-team.php', $args );
	        } ?>		

		<?php endwhile; endif; wp_reset_postdata(); ?>

	</div>

</div>