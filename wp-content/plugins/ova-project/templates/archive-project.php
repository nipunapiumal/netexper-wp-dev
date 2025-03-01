<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$number_column = get_theme_mod( 'ova_project_layout', 'three_column' );


?>
<div class="row_site">
	<div class="container_site">

		<div class="archive_project">
			
			<div class="archive_content <?php echo esc_attr( $number_column ) ?>">

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php 
						$id = get_the_id();

						$thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'infetech_project_thumbnail' );
						if ( $thumbnail == '') {
						    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
						}
					    $sub_title   = get_post_meta( $id, 'ova_project_sub_title', true );
					    $custom_link = get_post_meta( $id, 'ova_project_custom_link', true );
						$permalink   = get_the_permalink($id);

						if( !empty($custom_link) ) {
							$permalink  = $custom_link;
						}
					?>

				<div class="ova-media">

					<a href="<?php echo esc_url($permalink); ?>">
						<div class="mask"></div>
						<div class="project-img">
							<img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php the_title(); ?>">
						</div>
					</a>

				    <div class="content">
				    	
				        <a href="<?php echo esc_url($permalink); ?>">
							<h3 class="title">
								<?php the_title() ?>
							</h3>
						</a>

						<?php if( ! empty( $sub_title ) ) { ?>
							<p class="sub_title">
								<?php echo esc_html( $sub_title ) ?>
							</p>
						<?php } ?>
				    </div>
                    
                    <a href="<?php echo esc_url($permalink); ?>">
						<div class="icon">
					    	<i class="ovaicon ovaicon-next-4"></i>	
						</div>
					</a>
				
				</div>

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