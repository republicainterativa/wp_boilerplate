<?php
/**
 * -----------------------------------------------------------------
 * THEME FEATURES AND CONFIGURATION - Do not change anything here!
 * -----------------------------------------------------------------
 *
 * @package República Interativa
 */

function return_7200( $seconds ) {
    return 1500;
}
add_filter( 'wp_feed_cache_transient_lifetime' , 'return_7200' );

/**
 * remove admin bar
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * add title tag to the theme
 */
add_theme_support( 'title-tag' );

/**
 * block users from plugins page
 */
function block_plugins() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    if ($template_file == 'plugins.php') {
        wp_die('Você não tem permissão para acessar esta página!');
    }
}
add_action( 'admin_init', 'block_plugins', 1 );

/**
 * Disable the theme / plugin text editor in Admin
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * thumb config
 */
add_theme_support('post-thumbnails');

/**
 * menu config
 */
register_nav_menus( array(
    'menu-principal'        => __( 'Menu Principal', 'odin' ),
) );


/**
 * excerpt config
 */
add_post_type_support( 'post', 'excerpt' );

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Add metabox for CTP Archives in wp nav menu
 */

/* inject cpt archives meta box */
add_action( 'admin_head-nav-menus.php', 'inject_cpt_archives_menu_meta_box' );
function inject_cpt_archives_menu_meta_box() {
   add_meta_box( 'add-cpt', __( 'Custom Post Types', 'default' ), 'wp_nav_menu_cpt_archives_meta_box', 'nav-menus',    'side', 'default' );
}
/* render custom post type archives meta box */
function wp_nav_menu_cpt_archives_meta_box() {

    /* get custom post types with archive support */
    $post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );

    /* hydrate the necessary object properties for the walker */
    foreach ( $post_types as &$post_type ) {
        $post_type->classes = array();
        $post_type->type = $post_type->name;
        $post_type->object_id = $post_type->name;
        $post_type->title = $post_type->labels->name . ' ' . __( 'Archive', 'default' );
        $post_type->object = 'cpt-archive';
    }
    $walker = new Walker_Nav_Menu_Checklist( array() ); ?>
    <div id="cpt-archive" class="posttypediv">
        <div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">
            <ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">
                <?php
                  echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
                ?>
            </ul>
        </div><!-- /.tabs-panel -->
    </div>
    <p class="button-controls">
        <span class="add-to-menu">
            <input type="submit" class="button-secondary submit-add-to-menu" value="<?php esc_attr_e('Add to Menu');
            ?>" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />
        </span>
    </p> <?php
}

/* take care of the urls */
add_filter( 'wp_get_nav_menu_items', 'cpt_archive_menu_filter', 10, 3 );
function cpt_archive_menu_filter( $items, $menu, $args ) {

    /* alter the URL for cpt-archive objects */
    foreach ( $items as &$item ) {
        if ( $item->object != 'cpt-archive' ) continue;
        $item->url = get_post_type_archive_link( $item->type );

        /* set current */
        if ( get_query_var( 'post_type' ) == $item->type ) {
            $item->classes []= 'current-menu-item';
            $item->current = true;
        }
    }
    return $items;
}