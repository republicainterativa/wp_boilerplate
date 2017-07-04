<?php
/**
 * ------------------------------------------------------------------------- *
 * GENERAL CONFIGURATION (styles and scripts) - Do not change anything here! *
 * ------------------------------------------------------------------------- *
 *
 * @package República Interativa
 */

/**
 * Load scripts and style.
 */
function enqueue_scripts() {

    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), null, 'all');

    wp_enqueue_style('main-css', WP_STYLE_URL . '/style.css?vrs=1.0', array(), null, false);

    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');

    // wp_register_script('picturefill', WP_SCRIPT_URL . '/picturefill.min.js', array(), null, false);
    // wp_enqueue_script('picturefill');

    wp_register_script('jquery', WP_SCRIPT_URL . '/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery');

    wp_register_script('main', WP_SCRIPT_URL . '/main.min.js', array(), null, true);
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

$current_user = wp_get_current_user();
if ($current_user->user_login != '') {
    // admin styles
    function custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
    }
    add_action( 'admin_enqueue_scripts', 'custom_wp_admin_style' );
}

// login styles
function republica_login_style() {
    wp_enqueue_style( 'core', 'http://republicainterativa.com.br/institucional/admin-form-login/login.css?ver=4.1.1', false ); 
}
add_action( 'login_enqueue_scripts', 'republica_login_style', 10 );