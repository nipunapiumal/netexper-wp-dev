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



add_action( 'cmb2_init', 'ova_project_metaboxes' );
function ova_project_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_project_';
    
    /* Project Settings ***************************************************************************/
    /* ************************************************************************************/
    $project_settings = new_cmb2_box( array(
        'id'            => 'ova_project_settings',
        'title'         => esc_html__( 'Project settings', 'ova-project' ),
        'object_types'  => array( 'project'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        // Sub Title
        $project_settings->add_field( array(
            'name'       => esc_html__( 'Sub Title', 'ova-project' ),
            'id'         => $prefix . 'sub_title',
            'type'    => 'text',
        ) );

         // Clients
        $project_settings->add_field( array(
            'name'       => esc_html__( 'Clients', 'ova-project' ),
            'id'         => $prefix . 'clients',
            'type'    => 'text',
        ) );

        // Date
        $project_settings->add_field( array(
            'name' => esc_html__( 'Date', 'ova-project' ),
            'id'   => $prefix . 'date',
            'type' => 'text_date',
        ) );

        // Value
        $project_settings->add_field( array(
            'name' => esc_html__( 'Value', 'ova-project' ),
            'id'   => $prefix . 'value',
            'type' => 'text',
        ) );

        // Social
        $group_icon = $project_settings->add_field( array(
            'id'          => $prefix . 'group_icon',
            'type'        => 'group',
            'description' => esc_html__( 'List Social', 'ova-project' ),
            'options'     => array(
                'group_title'       => esc_html__( 'Social', 'ova-project' ), 
                'add_button'        => esc_html__( 'Add Social', 'ova-project' ),
                'remove_button'     => esc_html__( 'Remove', 'ova-project' ),
                'sortable'          => true,
               
            ),
        ) );

        $project_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Class icon social', 'ova-project' ),
            'id'   => $prefix . 'class_icon_social',
            'type' => 'text',
        ) );


        $project_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Link social', 'ova-project' ),
            'id'   => $prefix . 'link_social',
            'type' => 'text_url',
        ) );

        $project_settings->add_field( array(
            'name' => esc_html__( 'Custom Link', 'ova-project' ),
            'id'   => $prefix .'custom_link',
            'type' => 'text_url',
            'desc' => esc_html__( 'Redirect to custom link instead of detail project', 'ova-project' ),
        ) );

        $project_settings->add_field( array(
            'name'       => esc_html__( 'Sort Order', 'ova-project' ),
            'id'         => $prefix . 'order_project',
            'desc' => esc_html__( 'Insert Number', 'ova-project' ),
            'type'    => 'text',
            'default' =>'1',
        ) );


    }

