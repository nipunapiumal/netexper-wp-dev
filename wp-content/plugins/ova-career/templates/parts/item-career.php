<?php if ( !defined( 'ABSPATH' ) ) exit();

    if ( isset( $args['id'] ) && $args['id'] ) {
		$id = $args['id'];
	} else {
		$id = get_the_id();
	}

	$thumbnail   = wp_get_attachment_image_url(get_post_thumbnail_id() , 'thumbnail' );
	if ( $thumbnail == '') {
	    $thumbnail  =  \Elementor\Utils::get_placeholder_image_src();
	}

	$category = get_the_terms($id, 'cat_career');
	$created_by	   = get_post_meta( $id, 'ova_career_met_created_by', true );
	$venue	   	   = get_post_meta( $id, 'ova_career_met_venue', true );
	$salary  	   = get_post_meta( $id, 'ova_career_met_salary', true );
	$working_from  = get_post_meta( $id, 'ova_career_met_working_from', true );

?>

    <div class="item-career">

	   <div class="icon-heart">
    		<i aria-hidden="true" class="fas fa-heart"></i>
    	</div>

    	<div class="top-info">
            
            <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php the_title(); ?>" class="career-thumbnail">

            <div class="right">

            	<a href="<?php the_permalink();?>"> 
	            	<h1 class="career-title">
					    <?php the_title();?>
				    </h1>
			    </a>

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

	</div>