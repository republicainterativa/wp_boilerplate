<?php
/**
 * Taxonomies configurations
 *
 * @package República Interativa
 */

/**
 * {{tax name}}
 */
function _tax() {
    $_tax = new Odin_Taxonomy(
        '', // name
        '', // slug.
        '' // post type name
    );

    $_tax->set_labels(
        array(
            'menu_name' => __( '', 'odin' )
        )
    );

    $_tax->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}

add_action( 'init', '_tax', 1 );

?>