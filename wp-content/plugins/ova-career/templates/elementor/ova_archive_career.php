<?php if ( !defined( 'ABSPATH' ) ) exit();
    
    $number_column = $args['number_column'];

	$career = ova_career_get_data_el( $args );

?>

<div class="ova_archive_career">
			
	<div class="career-content <?php echo esc_attr( $number_column ) ?>">

		<?php if( $career->have_posts() ) : while ( $career->have_posts() ) : $career->the_post();

			ovacareer_get_template( 'parts/item-career.php', $args );

        endwhile; endif; wp_reset_postdata(); ?>

	</div>

</div>