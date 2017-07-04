<?php
/**
 * Post type configuration
 *
 * @package República Interativa
 */


/**
 * {{post_type_name}}
 */
function _cpt() {
    $_cpt = new Odin_Post_Type(
        'Slider', // name
        'slider' // slug
    );

    $_cpt->set_labels(
        array(
            'menu_name'          => __( '', 'odin' )
        )
    );

    $_cpt->set_arguments(
        array(
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'       => true,
            'show_in_nav_menus'  => false,
            'menu_icon'          => ''
        )
    );
}
add_action( 'init', '_cpt', 1 );