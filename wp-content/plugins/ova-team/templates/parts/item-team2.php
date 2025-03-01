<?php
   
    if ( isset( $args['id'] ) && $args['id'] ) {
		$id = $args['id'];
	} else {
		$id = get_the_id();
	}

	$avatar = get_post_meta( $id, 'ova_team_met_avatar', true );
	if ( $avatar == '') {
	    $avatar  =  \Elementor\Utils::get_placeholder_image_src();
	}

	$job         = get_post_meta( $id, 'ova_team_met_job', true );
	$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );

	$show_social   = isset( $args['show_social'] )  ? $args['show_social'] 	: 'yes' ;
	$show_name     = isset( $args['show_name'] ) 	? $args['show_name'] 	: 'yes' ;
	$show_job      = isset( $args['show_job'] ) 	? $args['show_job'] 	: 'yes' ;

	$show_link_to  = isset( $args['show_link_to_detail'] )  ? $args['show_link_to_detail'] : 'yes';

?>

	<div class="item-team item-team-2">

		<div class="img">
			
			<!-- Avata -->
			
			<?php if( $show_link_to == 'yes' ): ?>
		    <a href="<?php the_permalink();?>">
		    <?php endif; ?>	

                <div class="img-wrapper">
                	<img src="<?php echo esc_url( $avatar ) ?>" class="img-responsive team-img" alt="<?php the_title() ?>">
                </div>	

		    <?php if( $show_link_to == 'yes' ): ?>
			</a>
		    <?php endif; ?>	

		    <div class="content-and-social">
                
                <?php if ( !empty ($job) && $show_job == 'yes' ) : ?>
					<p class="job">
						<?php echo esc_html($job) ; ?>
					</p>
				<?php endif; ?>
			
				<!-- list Icon -->
				<?php if( $show_social == 'yes' ){ ?>
					<div class="list-icon">

						<?php if( !empty( $list_social ) ) : ?>

							<ul> 
								<?php
									foreach( $list_social as $social ){

										$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
										$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
										?>
										<li class="item">
											<a href="<?php echo esc_url( $link_social ); ?>" target="_blank">
												<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
											</a>
										</li>
								<?php } ?>
								
							</ul>
							
						<?php endif; ?>

				    </div>
			    <?php } ?>
		    </div>

		</div>

		<!-- Info -->
		<?php if( $show_name == 'yes' ){ ?>
			<div class="info">
	            <div class="name-job">
					<h2 class="name">
						<?php if( $show_link_to == 'yes' ): ?>
						 <a href="<?php the_permalink();?>">
						<?php endif; ?>

							<?php the_title(); ?>
							
						<?php if( $show_link_to == 'yes' ): ?>
						</a>
						<?php endif; ?>
					</h2>
	            </div>
			</div>
		<?php } ?>
		
	</div>