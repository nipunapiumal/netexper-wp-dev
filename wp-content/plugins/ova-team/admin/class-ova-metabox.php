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



add_action( 'cmb2_init', 'ova_team_metaboxes' );
function ova_team_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_team_met_';
    
    /* Team Settings ***************************************************************************/
    /* ************************************************************************************/
    $team_settings = new_cmb2_box( array(
        'id'            => 'ovateam_settings',
        'title'         => esc_html__( 'Team settings', 'ova-team' ),
        'object_types'  => array( 'team'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );

        // Avatar
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Avatar', 'ova-team' ),
            'description' => esc_html__( 'Use in Team Detail', 'ova-team' ),
            'id'         => $prefix . 'avatar',
            'type'    => 'file',
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
        ) );

        // Job
        $team_settings->add_field( array(
            'name'       => esc_html__( 'Job', 'ova-team' ),
            'id'         => $prefix . 'job',
            'type'    => 'text',
        ) );

        // Social
        $group_icon = $team_settings->add_field( array(
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

        $team_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Class icon social', 'ova-team' ),
            'id'   => $prefix . 'class_icon_social',
            'type' => 'text',
        ) );

        $team_settings->add_group_field( $group_icon, array(
            'name' => esc_html__( 'Link social', 'ova-team' ),
            'id'   => $prefix . 'link_social',
            'type' => 'text_url',
        ) );

        // Slogans
        $team_settings->add_field( array(
            'name' => esc_html__( 'Slogans', 'ova-team' ),
            'id'   => $prefix . 'slogans',
            'type' => 'wysiwyg',
        ) );

        $team_settings->add_field( array(
            'name'       => esc_html__( 'Sort Order', 'ova-team' ),
            'id'         => $prefix . 'order_team',
            'desc' => esc_html__( 'Insert Number', 'ova-team' ),
            'type'    => 'text',
            'default' =>'1',
        ) );


    }

