<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$id = get_the_ID();

$thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'thumbnail' );
if ( $thumbnail == '') {
    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
}

$category = get_the_terms($id, 'cat_career');

$career_banner   = get_post_meta( $id, 'ova_career_met_career_banner', true );
if ( $career_banner == '') {
	$career_banner  =  \Elementor\Utils::get_placeholder_image_src();
}

$created_by	     = get_post_meta( $id, 'ova_career_met_created_by', true );
$venue	   	     = get_post_meta( $id, 'ova_career_met_venue', true );
$salary  	     = get_post_meta( $id, 'ova_career_met_salary', true );
$working_from    = get_post_meta( $id, 'ova_career_met_working_from', true );
$date_posted     = get_the_date(get_option('date_format'),$id);
$expiration_date = get_post_meta( $id, 'ova_career_met_expiration_date', true );
$experience      = get_post_meta( $id, 'ova_career_met_experience', true );
$gender          = get_post_meta( $id, 'ova_career_met_gender', true );
$qualification   = get_post_meta( $id, 'ova_career_met_qualification', true );
$link_contact    = get_post_meta( $id, 'ova_career_met_link_contact_message', true );
$list_social 	 = get_post_meta( $id, 'ova_career_met_group_icon', true );

// website
$website_url    = get_post_meta( $id, 'ova_career_met_website_url', true );
if( str_contains( $website_url,'://' ) ) {
	$website_name = substr($website_url, strpos($website_url, "//") + 2);
} else {
	$website_name = '';
}
    

// Calculate days left to apply
$current_timestamp 			= time();
$expiration_date_timestamp  = strtotime($expiration_date);

$days_left_to_apply = ceil( ($expiration_date_timestamp - $current_timestamp)/86400 ) ;


// social
$social = get_post_meta( $id, 'ova_career_met_group_social', true );

// link button apply
$link_apply   = get_post_meta( $id, 'ova_career_met_link_apply_career', true );
$apply_target = apply_filters('ova_career_single_ft_apply_target','_blank');

// gallery
$career_gallery_ids = get_post_meta($id, 'ova_met_gallery_id', true) ? get_post_meta($id, 'ova_met_gallery_id', true) : '';

// map
$map = get_post_meta( $id, 'ova_career_met_map', true );
if ( ($map == '') || ($map['latitude'] == '') || ($map['longitude'] == '') )  {
	$map = [];
	$map['latitude']  =  39.177972; 
	$map['longitude'] = -100.36375;
}

// get variable for related career
$current_post_type = get_post_type($id);
$cat_ids = array();

if(!empty($category) && !is_wp_error($category)):
    foreach ($category as $cat_id):
        array_push($cat_ids, $cat_id->term_id);
    endforeach;
endif;

?>

<div class="career_single_container">

	<div class="career_banner">
		<img src="<?php echo esc_url($career_banner);?>" alt="<?php the_title();?>">
	</div>

	<div class="row_site">
		<div class="container_site">

			<div class="ova_career_single">

	            <div class="main_content">

	            	<div class="icon-heart">
	            		<i aria-hidden="true" class="fas fa-heart"></i>
	            	</div>

	            	<div class="top-info">
                        
                        <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php the_title(); ?>" class="career-thumbnail">

                        <div class="right">
                        	
                        	<h1 class="career-title">
							    <?php the_title();?>
						    </h1>

						    <div class="by-and-categories">
						    	<div class="by">
						    		<span class="text">
						    			<?php esc_html_e( 'By', 'ova-career'); ?> 
						    		</span>
						    		<span class="name">
						    			<?php echo esc_html($created_by); ?> 
						    		</span>
						    		<span class="text">
						    			<?php esc_html_e( 'in', 'ova-career'); ?> 
						    		</span>
						    	</div>
						    		
						    	<div class="categories">
						    		<span class="value">
						    			<?php $category_first_link = get_term_link($category[0]->term_id);
									        if ( $category_first_link ) {
									        	echo '<a href="'.esc_url( $category_first_link ).'" title="'.esc_attr($category[0]->name).'">'.$category[0]->name.'</a>';
									        }
										?>
						    		</span>
						    	</div>
						    </div>

						    <div class="tag-wrapper">
						    	<span class="tag from">
						    		<?php echo esc_html($working_from); ?>
						    	</span>
						    	<span class="tag location">
						    		<i aria-hidden="true" class="flaticon-infetech-placeholder"></i>
						    		<?php echo esc_html($venue); ?>
						    	</span>
						    	<span class="tag salary">
						    		<i aria-hidden="true" class="flaticon-new-dollar"></i>
						    		<?php echo esc_html($salary); ?>
						    	</span>
						    </div>
                        </div>
					   
	            	</div>

	            	<div class="content">
					
						<?php if( have_posts() ) : while( have_posts() ) : the_post();
							the_content();
				 		?>	
				 		<?php endwhile; endif; wp_reset_postdata(); ?>

					</div>

					<div class="share-social-icons">
						<span class="text-share">
							<?php esc_html_e('Share job Post:','ova-career'); ?>
						</span>
			        	<?php apply_filters( 'ova_share_social', get_the_permalink(), get_the_title()  ); ?>
			        </div>
                    
                    <!-- Gallery -->
			        <?php if ( !empty($career_gallery_ids) ) : ?>
			        	<div class="career-gallery-wrapper">
			        		<h4 class="heading">
							    <?php esc_html_e('Photo & Gallery','ova-career') ;?>
						    </h4>
						    <div class="career_gallery">
								<?php foreach( $career_gallery_ids as $gallery_id ):
									$gallery_alt   = get_post_meta($gallery_id, '_wp_attachment_image_alt', true);
						    	    $gallery_title = get_the_title( $gallery_id );
						    	    $gallery_url   = wp_get_attachment_image_url( $gallery_id, 'aovis_thumbnail' );
						    	  
									if ( ! $gallery_alt ) {
										$gallery_alt = get_the_title( $gallery_id );
									}

								?>
									<a class="gallery-fancybox" 
										data-src="<?php echo esc_url( $gallery_url ); ?>" 
										data-fancybox="career-gallery-fancybox" 
										data-caption="<?php echo esc_attr( $gallery_alt ); ?>">
					  					<img src="<?php echo esc_url($gallery_url); ?>" alt="<?php echo esc_attr($gallery_alt); ?>" title="<?php echo esc_attr($gallery_title); ?>">
				  						<div class="blur-bg">
				  							<div class="icon">
				  								<i aria-hidden="true" class="ovaicon ovaicon-plus-1"></i>
				  							</div>
				  						</div>
					  				</a>
								<?php endforeach; ?>
							</div>
			        	</div>
					<?php endif; ?>

					 <!-- Map -->
			        <?php if( $map ): ?>
				        <div class="career_map">
						    <div id="ova_career_admin_show_map" data-zoom="<?php esc_attr_e( get_theme_mod( 'ova_career_zoom_map_default', 17 ) ); ?>">
						        <div class="marker" data-lat="<?php echo esc_attr( $map['latitude'] ); ?>" data-lng="<?php echo esc_attr( $map['longitude'] ); ?>"></div>
						    </div>
						</div>
					<?php endif; ?>

					<!-- related career -->
					<?php
					    $query_args = array( 
					    	'tax_query' => array(
								array(
								'taxonomy' => 'cat_career',
								'field' => 'term_id',
								'terms' => $cat_ids
								)
							),
					        'post_type'       => $current_post_type,
					        'post__not_in'    => array($id),
					        'posts_per_page'  => '3',
					        'orderby'         => 'rand',
					    );

					    $related = new WP_Query( $query_args );
					?>

					<?php if ( apply_filters( 'ova_career_show_related', true ) ): ?>
						<?php if( $related->have_posts() ) : ?>

							<div class="career-related-wrapper">

								<h4 class="heading heading-related-career">
								    <?php esc_html_e('Similar Jobs','ova-career') ;?>
							    </h4>

								<?php while( $related->have_posts()): $related->the_post();
									ovacareer_get_template( 'parts/item-career.php' );
						        endwhile; wp_reset_postdata(); ?>		

							</div>	

						<?php endif; ?>
					<?php endif; ?>

	            </div>

                
                <!-- Sidebar -->
	            <div class="career_sidebar">

	            	<div class="top-sidebar">
	            		<h4 class="heading heading-sidebar">
						    <?php esc_html_e('Interested in this job?','ova-career') ;?>
					    </h4>

					    <div class="apply">
					    	<?php if( $days_left_to_apply > 0 ) { ?>
						    	<span class="days">
						    		<?php echo esc_html($days_left_to_apply);?>
						    	</span>
						    	<span class="text">
						    		<?php echo esc_html__('days left to apply','ova-career') ;?>
						    	</span>
						    <?php } else { ?>
						    	<span class="text">
						    		<?php echo esc_html__('Application deadline has expired','ova-career') ;?>
						    	</span>
						    <?php } ?>
					    </div>

					    <!-- Apply Button -->
			            <?php if( !empty( $link_apply ) ) : ?>
		                	<a href="<?php echo esc_attr($link_apply);?>" target="<?php echo esc_attr($apply_target); ?>" class="button-apply">
		                		<?php esc_html_e('Apply Now','ova-career') ;?>
		                	</a>
			            <?php endif; ?>
	            	</div>

	            	<div class="middle-bottom-sidebar">
	            		<h4 class="heading">
						    <?php esc_html_e('Overview','ova-career') ;?>
					    </h4>

					    <ul class="listing-info-bar"> 
					    	<?php if(!empty($category)) { ?>
								<li>
						    		<i aria-hidden="true" class="flaticon-new-peace-sign"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Categories','ova-career') ;?>
								    </span>
									<span class="details-content">
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
						    	</li>
					    	<?php } ?>
					    	<li>
					    		<i aria-hidden="true" class="flaticon-new-calendar"></i>
					    		<span class="text">
							    	 <?php esc_html_e('Date Posted','ova-career') ;?>
							    </span>
								<span class="details-content">
									<?php echo esc_html($date_posted); ?>
								</span>
					    	</li>
					    	<?php if(!empty($map['address'])) { ?>
						    	<li>
						    		<i aria-hidden="true" class="flaticon-infetech-placeholder"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Location','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $map['address'] ); ?>
									</span>
						    	</li>
						    <?php } ?>
						    <?php if(!empty($salary)) { ?>
						    	<li>
						    		<i aria-hidden="true" class="flaticon-new-money"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Offered Salary','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $salary ); ?>
									</span>
						    	</li>
						    <?php } ?>
						    <?php if(!empty($expiration_date)) { ?>
						    	<li>
						    		<i aria-hidden="true" class="flaticon-new-calendar"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Expiration date','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $expiration_date ); ?>
									</span>
						    	</li>
						    <?php } ?>
						    <?php if(!empty($experience)) { ?>
						    	<li>
						    		<i aria-hidden="true" class="flaticon-new-increase"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Experience','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $experience ); ?>
									</span>
						    	</li>
						    <?php } ?>
						    <?php if(!empty($gender)) { ?>
						    	<li>
						    		<i aria-hidden="true" class="ovaicon ovaicon-user-1"></i>
						    		<span class="text">
								    	 <?php esc_html_e('Gender','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $gender ); ?>
									</span>
						    	</li>
					    	<?php } ?>
					    	<?php if(!empty($qualification)) { ?>
						    	<li>
						    		<i aria-hidden="true" class="flaticon-new-graduation"></i>
						    		<span class="text">
								    	<?php esc_html_e('Qualification','ova-career') ;?>
								    </span>
									<span class="details-content">
										<?php echo esc_html( $qualification ); ?>
									</span>
						    	</li>
						    <?php } ?>
					    </ul>
                        
                        <!-- Website -->
			            <?php if( !empty( $website_url ) && !empty( $website_name ) ) : ?>
		                	<a href="<?php echo esc_attr($website_url);?>" target="_blank" class="website">
		                		<?php esc_html_e($website_name) ;?>
		                		<i aria-hidden="true" class="flaticon-new-link"></i>
		                	</a>
			            <?php endif; ?>

			             <!-- Link to Contact Message -->
			            <?php if( !empty( $link_contact ) ) : ?>
		                	<a href="<?php echo esc_attr($link_contact);?>" target="_blank" class="message">
		                		<?php echo esc_html__('Send us message','ova-career') ;?>
		                		<i aria-hidden="true" class="flaticon-new-paper-plane"></i>
		                	</a>
			            <?php endif; ?>

			            <?php if( ! empty( $list_social ) ) {  ?>
							<ul class="social">
								<?php
									foreach( $list_social as $social ){

										$class_icon = isset( $social['ova_career_met_class_icon_social'] ) ? $social['ova_career_met_class_icon_social'] : '';
										$link_social = isset( $social['ova_career_met_link_social'] ) ? $social['ova_career_met_link_social'] : '';
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

			</div>
			
		</div>
		
	</div>

</div>


<?php get_footer( );