<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$number_column = get_theme_mod( 'ova_team_layout', 'three_column' );
$template      = get_theme_mod( 'ova_team_template', 'template1' );

if ( isset($_GET['template']) ) {
	$template  = $_GET['template'];
}


?>
<div class="row_site">
	<div class="container_site">

		<div class="archive_team ">
			
			<div class="content <?php echo esc_attr( $template ) ?> <?php echo esc_attr( $number_column ) ?>">

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php if( $template === 'template1' ) {
			        	ovateam_get_template( 'parts/item-team.php', $args );

			        } elseif( $template === 'template2' ) {
			        	ovateam_get_template( 'parts/item-team2.php', $args );

			        } elseif( $template === 'template3' ) {
			        	ovateam_get_template( 'parts/item-team3.php', $args );

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
	</div>
</div>

<?php get_footer();