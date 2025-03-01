<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );


$id = get_the_ID();
$thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'large' );
if ( $thumbnail == '') {
    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
}

$clients     = get_post_meta( $id, 'ova_project_clients', true );
$date        = get_post_meta( $id, 'ova_project_date', true );
$value       = get_post_meta( $id, 'ova_project_value', true );
$list_social = get_post_meta( $id, 'ova_project_group_icon', true );
$category    = get_the_terms($id, 'cat_project');
$prev_post   = get_previous_post();
$next_post   = get_next_post();

// get variable for related project
$current_post_type = get_post_type($id);
$cat_ids = array();

if(!empty($category) && !is_wp_error($category)):
    foreach ($category as $cat_id):
        array_push($cat_ids, $cat_id->term_id);
    endforeach;
endif;

?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_project_single">
             
			<div class="info">

				<!-- Image -->
				<div class="project-img">
					<img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php the_title(); ?>">
				</div>

				<div class="main_content">

					<?php if( ! empty( $clients ) ) { ?>
						<div class="item clients">
							<span class="label">
								<?php echo esc_html__('Clients:','ova-project')?>
							</span>
							<span class="value">
								<?php echo esc_html( $clients ); ?>
							</span>
						</div>
					<?php } ?>

					<?php if( ! empty( $category ) ) { ?>
						<div class="item category">
							<span class="label">
								<?php echo esc_html__('Category:','ova-project')?>
							</span>
							<span class="value">
								<?php 
									$arr_link = array();
									foreach( $category as $cat ) { 
								        $category_link = get_term_link($cat->term_id);
								        if ( $category_link ) {
								        	$link = '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a>';
	                                    	array_push( $arr_link, $link );
								        }
									}
									if ( !empty( $arr_link ) && is_array( $arr_link ) ) {
										echo join(', ', $arr_link);
									}
								?>
							</span>
						</div>
					<?php } ?>

					<?php if( ! empty( $date ) ) { ?>
						<div class="item date">
							<span class="label">
								<?php echo esc_html__('Date:','ova-project')?>
							</span>
							<span class="value">
								<?php echo esc_html( $date ); ?>
							</span>
						</div>
					<?php } ?>

					<?php if( ! empty( $value ) ) { ?>
						<div class="item value-project">
							<span class="label">
								<?php echo esc_html__('Value:','ova-project')?>
							</span>
							<span class="value">
								<?php echo esc_html( $value ); ?>
							</span>
						</div>
					<?php } ?>
					

					<?php if( ! empty( $list_social ) ) {  ?>
						<ul class="social">
							<?php
								foreach( $list_social as $social ){

									$class_icon = isset( $social['ova_project_class_icon_social'] ) ? $social['ova_project_class_icon_social'] : '';
									$link_social = isset( $social['ova_project_link_social'] ) ? $social['ova_project_link_social'] : '';
									?>
									<li>
										<a href="<?php echo esc_url( $link_social ); ?>" target="_blank">
											<i class="<?php echo esc_attr( $class_icon ); ?>"></i>
										</a>
									</li>
							<?php } ?>
							
						</ul>
					<?php } ?>

				</div>

			</div>

			<div class="description">
				<?php if( have_posts() ) : while( have_posts() ) : the_post();
					the_content();
					?>
					<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>

			<?php if( $next_post || $prev_post ) { ?>
			<div class="ova-next-pre-post">
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					?>
					
					<?php
					if($prev_post) {
						?>
						<a class="pre" href="<?php echo esc_attr(get_permalink($prev_post->ID)); ?>" title="<?php esc_html_e('Previous', 'ova-project'); ?>">
							<div class="icon">
								<i class="ovaicon-back-2"></i>
							</div>
							<span class="num-pre">
								<span class="second_font text-label"><?php esc_html_e('Previous', 'ova-project'); ?></span>
							</span>
						</a>
						<?php
					}
					?>

				
					
					<?php
					if($next_post) {
						?>
						<a class="next" href="<?php echo esc_attr(get_permalink($next_post->ID)); ?> " title="<?php esc_html_e('Next', 'ova-project'); ?>">
							<span class="num-next">
								<span class="second_font text-label"><?php esc_html_e('Next', 'ova-project'); ?></span>
							</span>
							<div class="icon">
								<i class="ovaicon-next-4"></i>
							</div>
						</a>
						<?php
					}
					?>
				</div>
			<?php } ?>


			<!-- related project -->
			<?php
			    $query_args = array( 
			    	'tax_query' => array(
						array(
						'taxonomy' => 'cat_project',
						'field' => 'term_id',
						'terms' => $cat_ids
						)
					),
			        'post_type'      => $current_post_type,
			        'post__not_in'    => array($id),
			        'posts_per_page'  => '3',
			        'orderby'        => 'rand',
			    );

			    $related = new WP_Query( $query_args );
			?>

			<?php if ( apply_filters( 'infetech_show_related', true ) ): ?>
				<?php if( $related->have_posts() ) : ?>

					<div class="project-related-wrapper">

						<div class="project-similar-heading">
					    	<p class="sub-title">
								<span class="underlined"></span>
								<?php echo esc_html__( 'Our Completed Projects', 'ova-project' ); ?>
							</p>
							<h3 class="title">
								<?php echo esc_html__( 'Checkout Our Similar Projects', 'ova-project' ); ?>
							</h3>
					    </div>

					    <div class="project-related">	

							<?php while( $related->have_posts()): $related->the_post(); ?>

								<div class="item">
									<?php 
					                    $rel_thumbnail  = wp_get_attachment_image_url(get_post_thumbnail_id() , 'infetech_project_thumbnail' );
					                    if ( $rel_thumbnail == '') {
										    $rel_thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
										}
										$rel_id         = get_the_ID(); 
										$sub_title      = get_post_meta( $rel_id, 'ova_project_sub_title', true );
									?>

									<div class="ova-media">

                                        <a href="<?php the_permalink();?>">
											<div class="project-img">
												<div class="mask"></div>
												<img src="<?php echo esc_url( $rel_thumbnail ); ?>" alt="<?php the_title(); ?>">
											</div>
										</a>

									    <div class="content">
									    
									        <a href="<?php the_permalink();?>">
												<h3 class="title">
													<?php the_title(); ?>
												</h3>
											 </a>
										  
											<?php if( ! empty( $sub_title ) ) { ?>
												<p class="sub_title">
													<?php echo esc_html( $sub_title ); ?>
												</p>
											<?php } ?>
									    </div>			

									</div>

								</div>

					        <?php endwhile; wp_reset_postdata(); ?>		

				        </div>

					</div>	

				<?php endif; ?>
			<?php endif; ?>

		</div>

	</div>
</div>

<?php get_footer( );
