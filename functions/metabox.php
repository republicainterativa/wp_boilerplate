<?php
/**
 * metabox configuration
 *
 * @package República Interativa
 */

/**
 * {{post_type_name}}
 */
function _metabox() {

    $_metabox = new Odin_Metabox(
        '', // metabox id
        '', // metabox title
        '', // {{post_type_name}}
        'normal',
        'high'
    );

    $_metabox->set_fields(
        array(

            array(
                'id'          => '',
                'label'       => __( '', 'odin' ),
                'type'        => '',
                'default'     => '',
                'description' => __( '', 'odin' ),
            ),

        )
    );

}
add_action( 'init', '_metabox', 1 );