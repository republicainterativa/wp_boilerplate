<?php
/**
 * @package República Interativa
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
@ini_set( 'memory_limit', '100M' );
header("Content-Type: text/html; charset=UTF-8");

/**
 * Sets up theme default paths
 */
if(!defined('WP_SITE_URL'))   { define('WP_SITE_URL', get_bloginfo('url')); }
if(!defined('WP_THEME_URL'))  { define('WP_THEME_URL', get_stylesheet_directory_uri()); }
if(!defined('WP_SCRIPT_URL')) { define('WP_SCRIPT_URL', WP_THEME_URL . '/assets/js'); }
if(!defined('WP_STYLE_URL'))  { define('WP_STYLE_URL', WP_THEME_URL . '/assets/css'); }
if(!defined('WP_IMAGE_URL'))  { define('WP_IMAGE_URL', WP_THEME_URL . '/assets/img'); }

$functions_path = get_template_directory() . '/functions/';

/**
 * Odin Classes.
 */
// require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
// require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/class-metabox-taxonomy.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
// require_once get_template_directory() . '/core/classes/class-term-meta.php';

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * Require functions partials.
 */
require_once($functions_path . 'general.php');
require_once($functions_path . 'optimize.php');
require_once($functions_path . 'support.php');
require_once($functions_path . 'posttype.php');
require_once($functions_path . 'taxonomies.php');
require_once($functions_path . 'admin.php');
require_once($functions_path . 'republica-options.php');
require_once($functions_path . 'google.php');
require_once($functions_path . 'metabox.php');
require_once($functions_path . 'login.php');

?>