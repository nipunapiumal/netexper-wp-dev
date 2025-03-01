<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'ova_career_metaboxes' );
function ova_career_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_career_met_';
    
    /* Career Settings ***************************************************************************/
    /* ************************************************************************************/
    $career_settings = new_cmb2_box( array(
        'id'            => 'ovacareer_settings',
        'title'         => esc_html__( 'Career Settings', 'ova-career' ),
        'object_types'  => array( 'career'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

        // Carerr Details Image
        $career_settings->add_field( array(
            'name'       => esc_html__( 'Career Detail Banner', 'ova-career' ),
            'description' => esc_html__( 'Use in Career Detail', 'ova-career' ),
            'id'         => $prefix . 'career_banner',
            'type'    => 'file',
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
        ) );

        // Map
        $career_settings->add_field( array(
            'name' => esc_html__( 'Location', 'ova-career' ),
            'id' => $prefix . 'map',
            'type' => 'pw_map',
            'split_values' => true, // Save latitude and longitude as two separate fields
            'desc' => esc_html__( 'Drag the marker to set the exact location', 'ova-career' ),
        ) );

        // Created by
        $career_settings->add_field( array(
            'name'   => esc_html__( 'Created by', 'ova-career' ),
            'id'     => $prefix . 'created_by',
            'type'   => 'text',
        ) );

        // Venue
        $career_settings->add_field( array(
            'name'   => esc_html__( 'Venue', 'ova-career' ),
            'id'     => $prefix . 'venue',
            'type'   => 'text',
        ) );

        // Offered Salary
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Offered Salary', 'ova-career' ),
            'id'      => $prefix . 'salary',
            'type'    => 'text',
        ) );

        // Working From
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Working From', 'ova-career' ),
            'id'      => $prefix . 'working_from',
            'type'    => 'text',
            'description' => esc_html__( 'Example: In House, Remote, ...', 'ova-career' ),
        ) ); 

        // Expiration date
        $career_settings->add_field( array(
            'name' => esc_html__( 'Expiration date', 'ova-career' ), 
            'id'   => $prefix . 'expiration_date',
            'type' => 'text_date',
            'date_format' => get_option('date_format'),
        ) );

        // Experience
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Experience', 'ova-career' ),
            'id'      => $prefix . 'experience',
            'type'    => 'text',
        ) );

        // Gender
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Gender', 'ova-career' ),
            'id'      => $prefix . 'gender',
            'type'    => 'text',
        ) );

        // Qualification
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Qualification', 'ova-career' ),
            'id'      => $prefix . 'qualification',
            'type'    => 'text',
        ) );   

        // Link Apply for this job 
        $career_settings->add_field( array(
            'name' => esc_html__( 'Link to Apply', 'ova-career' ),
            'description' => esc_html__( 'Link used in Career Detail for Apply Now Button', 'ova-career' ),
            'id'   => $prefix . 'link_apply_career',
            'type' => 'text_url',
        ) );

        // Website URL 
        $career_settings->add_field( array(
            'name' => esc_html__( 'Website URL', 'ova-career' ),
            'id'   => $prefix . 'website_url',
            'type' => 'text_url',
        ) );
        
        // Link to Contact Message 
        $career_settings->add_field( array(
            'name' => esc_html__( 'Link to Contact Message', 'ova-career' ),
            'id'   => $prefix . 'link_contact_message',
            'type' => 'text_url',
        ) );

        // Social
        $group_icon = $career_settings->add_field( array(
            'id'          => $prefix . 'group_icon',
            'type'        => 'group',
            'description' => esc_html__( 'List Social', 'ova-team' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Social', 'ova-team' ), 
                'add_button'        => esc_html__( 'Add Social', 'ova-team' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-team' ),
                'sortable'          => true,
               
            ),
        ) );

        $career_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Class icon social', 'ova-team' ),
            'id'   => $prefix . 'class_icon_social',
            'type' => 'text',
        ) );

        $career_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Link social', 'ova-team' ),
            'id'   => $prefix . 'link_social',
            'type' => 'text_url',
        ) );

        // Order
        $career_settings->add_field( array(
            'name'    => esc_html__( 'Sort Order', 'ova-career' ),
            'id'      => $prefix . 'order_career',
            'desc'    => esc_html__( 'Insert Number', 'ova-career' ),
            'type'    => 'text',
            'default' =>'1',
        ) );

}

