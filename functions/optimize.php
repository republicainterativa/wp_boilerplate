<?php 
/**
 * Optimization Functions and definitions
 *
 * @package República Interativa
 */

/**
 * Cleanup wp_head().
 */
function head_cleanup() {
    // category feeds.
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds.
    remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link.
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer.
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link.
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link.
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link.
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts.
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version.
    remove_action( 'wp_head', 'wp_generator' );

    // Emoji's
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

add_action( 'init', 'head_cleanup' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param  array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );

/**
 * Remove WP version from RSS.
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Add feed link.
 */
// add_theme_support( 'automatic-feed-links' );

/**
 * Add CPT to the RSS Feed
 */
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('{{post_type_slug}}', 'page');
    return $qv;
}
//add_filter('request', 'myfeed_request');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

?>