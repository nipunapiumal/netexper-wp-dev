<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$number_column = get_theme_mod( 'ova_career_layout', 'two_column' );

?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_archive_career archive_career">

			<div class="career-content <?php echo esc_attr( $number_column ) ?>">

				<?php if( have_posts() ) : while ( have_posts() ) : the_post();
					
					ovacareer_get_template( 'parts/item-career.php', $args );

				endwhile; endif; wp_reset_postdata(); ?>

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
			
	</div>
</div>

<?php get_footer();