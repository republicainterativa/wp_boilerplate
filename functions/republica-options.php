<?php 
/**
 * General options to config
 *
 * @package República Interativa
 */

function republica_options() {

    $settings = new Odin_Theme_Options(
        'republica_options', // Slug/ID of the Settings Page 
        'Opções gerais', // Settings page name
        'manage_options' // Page capability 
    );

    $settings->set_tabs(
        array(
            array(
                'id' => 'social_media', // Slug/ID of the Settings tab
                'title' => __( 'Redes Sociais', 'odin' ), // Settings tab title
            )
        )
    );

    $settings->set_fields(
        array(

            'republica_social' => array( // Slug/ID of the section
                'tab'   => 'social_media', // Tab ID/Slug
                'title' => __( 'Redes Sociais', 'odin' ), // Section title
                'fields' => array( // Section fields 

                    /**
                     * General opts fields
                     */

                    // facebook
                    array(
                        'id'         => 'facebook',
                        'label'      => __( 'Facebook', 'odin' ),
                        'type'       => 'text',
                        'attributes' => array(
                            'placeholder' => __( 'http://facebook.com/{fb_user}' )
                        ),
                        'description' => __( 'Insira o endereço do Facebook do '.get_bloginfo( 'name' ), 'odin' )
                    ),

                    // twitter
                    array(
                        'id'         => 'twitter',
                        'label'      => __( 'Twitter', 'odin' ),
                        'type'       => 'text',
                        'attributes' => array(
                            'placeholder' => __( 'http://twitter.com/{twitter_user}' )
                        ),
                        'description' => __( 'Insira o endereço do Twitter do '.get_bloginfo( 'name' ), 'odin' )
                    ),

                    // instagram
                    array(
                        'id'         => 'instagram',
                        'label'      => __( 'Instagram', 'odin' ),
                        'type'       => 'text',
                        'attributes' => array(
                            'placeholder' => __( 'http://instagram.com/{instagram_user}' )
                        ),
                        'description' => __( 'Insira o endereço do Instagram do '.get_bloginfo( 'name' ), 'odin' )
                    ),
                )
            ),
        )
    );
}

add_action( 'init', 'republica_options', 1 );