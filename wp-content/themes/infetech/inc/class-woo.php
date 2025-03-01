<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Infetech_Woo') ){

	class Infetech_Woo {

		public function __construct() {

			// Show title archive shop page
			add_filter( 'woocommerce_show_page_title', array( $this, 'infetech_woocommerce_show_title_shop_page' ) );

			// Insert category to loop product
			add_action( 'woocommerce_shop_loop_item_title', array( $this, 'infetech_woocommerce_template_loop_product_cat' ), 5 );


			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			// Remove breadcrumb woo
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
			add_action( 'woocommerce_before_main_content',  array( $this, 'infetech_woocommerce_before_main_content' ), 10 );


			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			add_action( 'woocommerce_sidebar',  array( $this, 'infetech_woocommerce_sidebar' ), 10 );


			/*
			 * Pagination change next, pre text
			 */
			add_filter( 'woocommerce_pagination_args', array( $this, 'infetech_woocommerce_pagination_args' ) );

			/* Change number product related */
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'infetech_change_number_product_related' ) );
			
			/* woo login */
			add_action( 'woocommerce_before_customer_login_form', array( $this, 'infetech_woocommerce_before_customer_login_form' ), 100 );

			// Remove title in Product Detail
			if( get_theme_mod( 'woo_product_detail_show_title', 'yes' ) != 'yes' ){

				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

			}

			// Remove add to cart button in products archive, related
			if( get_theme_mod( 'woo_archive_show_add_to_cart', 'no' ) != 'yes' ){

				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

			}

			// Remove Heading in Content Description Tab Woo
			add_filter('woocommerce_product_description_heading', '__return_null');

			// Resize product gallery image thumbnail
			add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
				return array(
					'width' => 300,
					'height' => 300,
					'crop' => 0,
				);
			} );

			add_action('wp_enqueue_scripts', array( $this, 'infetech_enqueue_scripts_woo' ) );
			

		}


		function infetech_woocommerce_show_title_shop_page( $param ){

			if ( ( is_shop() || is_product_category() || is_product_tag() ) && get_theme_mod( 'woo_archive_show_title', 'yes' ) == 'yes' ) {
				return true;
			}

			return false;
			
		}


		function infetech_woocommerce_template_loop_product_cat(){

			$id = get_the_id();

			$cats  = get_the_terms( $id, 'product_cat') ? get_the_terms( $id, 'product_cat') : '' ;

			$value_cats = array();
			if ( $cats ) {
				foreach ( $cats as $value ) {
					$value_cats[] = is_object($value) && $value->term_id ? '<span class="cat_product">' . $value->name . '</span>' : "";


				}
			}

			echo implode(' ', $value_cats); 
			
		}

		function infetech_woocommerce_before_main_content(){ ?>

			<div class="row_site">
				<div class="container_site">
					<div id="woo_main">
						<?php
						wc_get_template( 'global/wrapper-start.php' );

		}


		
		function infetech_woocommerce_sidebar(){ ?>
			
			</div>
				<?php if( infetech_woo_sidebar() != 'woo_layout_1c' && is_active_sidebar('woo-sidebar') ){ ?>
					<div id="woo_sidebar">
						<?php
							wc_get_template( 'global/sidebar.php' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php }


		function infetech_woocommerce_pagination_args( $array ) { 

			$args = array(
                'next_text' => '<i class="ovaicon-next"></i>',
                'prev_text' => '<i class="ovaicon-back"></i>',
            );

		    $agrs = array_merge( $array, $args );

		    return $agrs; 
		}


		function infetech_change_number_product_related( $agrs ){
			$agrs_setting = [
				'posts_per_page' => apply_filters( 'number_product_realated_posts_per_page', 4 ),
				'columns'        => apply_filters( 'number_product_realated_columns', 4 ),
			];
			$agrs = array_merge( $agrs, $agrs_setting );
			return $agrs;
		}
		
		function infetech_woocommerce_before_customer_login_form(){ ?>
			
			<ul class="ova-login-register-woo">
				<li class="active">
					<a href="javascript:void(0)" data-type="login">
						<?php esc_html_e( 'Login', 'infetech' ); ?>
					</a>
				</li>
				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
				<li>
					<a href="javascript:void(0)" data-type="register">
						<?php esc_html_e( 'Register', 'infetech' ); ?>
					</a>
				</li>
				<?php endif; ?>
			</ul>

		<?php }


		function infetech_enqueue_scripts_woo() {

			if( is_product() ){
				// Carousel
				wp_enqueue_script('fancybox', INFETECH_URI.'/assets/libs/fancybox/fancybox.umd.js', array('jquery'),null,true);
				wp_enqueue_style('fancybox', INFETECH_URI.'/assets/libs/fancybox/fancybox.css', array(), null);
			}
			
		    wp_enqueue_script('infetech-woo', INFETECH_URI.'/assets/js/woo.js', array('jquery'),null,true);
		    
		}	


	}
}
new Infetech_Woo();