<?php if ( !defined( 'ABSPATH' ) ) exit();

	get_header( );

	$id = get_the_ID();

	$avatar      = get_post_meta( $id, 'ova_team_met_avatar', true );
	if ( $avatar == '') {
	    $avatar  =  \Elementor\Utils::get_placeholder_image_src();
	}
	$job         = get_post_meta( $id, 'ova_team_met_job', true );
	$list_social = get_post_meta( $id, 'ova_team_met_group_icon', true );
	$slogans     = get_post_meta( $id, 'ova_team_met_slogans', true );

?>

<div class="row_site">
	<div class="container_site">

		<div class="ova_team_single">

			<div class="info">

				<!-- Image -->
				<div class="img">
					<?php if( ! empty( $avatar ) ){ ?>
						<img src="<?php echo esc_url( $avatar ) ?>" class="img-responsive" alt="<?php echo get_the_title() ?>">
					<?php } ?>
				</div>

				<div class="main_content">

					<h2 class="name">
						<?php echo get_the_title() ?>
					</h2>

					<?php if( ! empty( $job ) ) { ?>
						<div class="job content-contact">
							<?php echo esc_html( $job ) ?>
						</div>
					<?php } ?>

					<?php if( ! empty( $list_social ) ) {  ?>
						<ul class="social">
							<?php
								foreach( $list_social as $social ){

									$class_icon = isset( $social['ova_team_met_class_icon_social'] ) ? $social['ova_team_met_class_icon_social'] : '';
									$link_social = isset( $social['ova_team_met_link_social'] ) ? $social['ova_team_met_link_social'] : '';
									?>
									<li>
										<a href="<?php echo esc_url( $link_social ); ?>" target="_blank">
											<i class="<?php echo esc_attr( $class_icon ) ?>"></i>
										</a>
									</li>
							<?php } ?>
							
						</ul>
					<?php } ?>
                    
                    <?php if( ! empty( $slogans ) ) { ?>
						<div class="slogans">
							<?php printf($slogans); ?>
						</div>
				    <?php } ?>
				</div>

			</div>


		</div>

	</div>
</div>

<div class="description">
	<?php if( have_posts() ) : while( have_posts() ) : the_post();
		the_content();
	endwhile; endif; wp_reset_postdata(); ?>
</div>

<?php get_footer( );