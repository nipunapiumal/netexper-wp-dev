<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Infetech_Shortcode') ){
    
    class Infetech_Shortcode {

        public function __construct() {

            add_shortcode( 'infetech-elementor-template', array( $this, 'infetech_elementor_template' ) );
            
        }

        public function infetech_elementor_template( $atts ){

            $atts = extract( shortcode_atts(
            array(
                'id'  => '',
            ), $atts) );

            $args = array(
                'id' => $id
                
            );

            if( did_action( 'elementor/loaded' ) ){
                return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );    
            }
            return;

            
        }

        

    }
}



return new Infetech_Shortcode();

