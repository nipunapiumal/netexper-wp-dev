<?php

$number_column = $args['number_column'];

$teams = ovateam_get_data_team_el( $args );

?>
		
	<div class="ova-team ">      

		<div class="content <?php echo esc_attr( $number_column ) ?>">

			<?php if($teams->have_posts() ) : while ( $teams->have_posts() ) : $teams->the_post(); ?>

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
		
		<?php 
    		 $args = array(
                'type'      => 'list',
                'next_text' => '<i class="ovaicon-next"></i>',
                'prev_text' => '<i class="ovaicon-back"></i>',
            );

            the_posts_pagination($args);
    	 ?>
	

	</div>