<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * @package República Interativa
 */
function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',  /* strip whitespaces after tags, except space */
        '/[^\S ]+\</s',  /* strip whitespaces before tags, except space */
        '/(\s)+/s'       /* shorten multiple whitespace sequences */
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}
//ob_start("sanitize_output");
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Security-Policy" content="style-src 'self' http://fonts.googleapis.com https://fonts.googleapis.com;
                                                        script-src 'self' https://ssl.google-analytics.com https://maps.googleapis.com https://www.google-analytics.com http://www.google-analytics.com;
                                                        font-src 'self' https://fonts.googleapis.com http://fonts.gstatic.com data:">

    <script>
        var baseUrl = "<?php echo WP_SITE_URL ?>";
    </script>
    <!--[if lt IE 9]>
       <script type="text/javascript"> window.location.href = baseUrl + "ie/index.html"; </script>
    <![endif]-->

    <?php
        // General Variables
        $mtitle_default = get_bloginfo('name');
        $title_default  = get_bloginfo('name');
        $home_default   = WP_SITE_URL;
        $keys_default   = '';
        $link_default   = WP_SITE_URL;
        $desc_default   = '';
        $image_default  = WP_THEME_URL . '/screenshot.png';
        if (is_single() || is_page()) {
            global $post;
            $title_default  = get_the_title($post->ID);
            $link_default   = get_permalink();
            $desc_default   = get_post($post->ID);
            $desc_default   = strip_tags( $desc_default->post_content );
            $desc_default   = substr( $desc_default, 0, 250 );
            if (has_post_thumbnail()){
                $image_ID      = get_post_thumbnail_id($post->ID);
                $image_default = wp_get_attachment_image_src($image_ID, 'large');
                $image_default = $image_default[0];
            }
        }

        global $post;
        if (!is_404()) {
            $posttags = wp_get_post_tags( $post->ID );
        }
    ?>

    <!-- Chrome / Firefox OS / Opera -->
    <meta name="theme-color" content="#000000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="<?php echo $mtitle_default; ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link type="text/plain" rel="author" href="<?php echo WP_THEME_URL ?>/humans.txt" />
    <meta name="copyright" content="&copy; Copyright <?php echo date('Y'); ?> - <?php echo $title_default; ?>" />
    <meta name="keywords" content="<?php echo $keys_default; ?>, <?php if($posttags){foreach($posttags as $tag){echo $tag->name . ', ';}}; ?>" />
    <meta name="url" content="<?php WP_SITE_URL ?>">
    <?php if (!is_single()) { ?>
      <meta name="author" content="<?php echo $mtitle_default; ?>">
      <meta name="description" content="<?php echo $desc_default; ?>" />
    <?php } ?>

    <?php
        if(is_single() || is_page() || is_category() || is_home()) {
            echo '<meta name="robots" content="all,noodp" />';
            echo "\n";
        }
        else if(is_archive()) {
            echo '<meta name="robots" content="noarchive,noodp" />';
            echo "\n";
        }
        else if(is_search() || is_404()) {
            echo '<meta name="robots" content="noindex,noarchive" />';
            echo "\n";
        }

        if (wp_is_mobile()) { ?>
            <link rel="apple-touch-startup-image" href="<?php echo WP_IMAGE_URL; ?>/icons/apple-touch-icon.png">

            <link rel="apple-touch-icon" href="<?php echo WP_IMAGE_URL; ?>/icons/apple-touch-icon.png">
            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo WP_IMAGE_URL; ?>/icons/apple-touch-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo WP_IMAGE_URL; ?>/icons/apple-touch-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="144x144" href="<?php echo WP_IMAGE_URL; ?>/icons/apple-touch-icon-144x144.png"> <?php
        }
    ?>

    <link rel="shortcut icon" href="<?php echo WP_IMAGE_URL; ?>/favicon.png" type="image/x-icon">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Código do Schema.org também para o Google+ -->
    <meta itemprop="name" content="<?php echo $title_default; ?>">
    <meta itemprop="description" content="<?php echo $desc_default; ?>">
    <meta itemprop="image" content="<?php echo $image_default; ?>">

    <!-- Open Graph Meta Data -->
    <meta property="og:title" content="<?php echo $title_default; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo $link_default; ?>"/>
    <meta property="og:image" content="<?php echo $image_default; ?>"/>
    <meta property="og:description" content="<?php echo $desc_default; ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo $mtitle_default; ?>">
    <meta name="twitter:title" content="<?php echo $title_default; ?>">
    <meta name="twitter:description" content="<?php echo $desc_default; ?>">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:image" content="<?php echo $image_default; ?>">

    <!-- Google Geo Location Meta Data -->
    <meta name="geo.region" content="BR-BA" />
    <meta name="geo.placename" content="" />
    <meta name="geo.position" content="" />
    <meta name="ICBM" content="" />

    <!-- Dublin Core Meta Data -->
    <meta name="dc.language" content="PT-BR">
    <meta name="dc.creator" content="<?php echo $mtitle_default; ?>">
    <meta name="dc.publisher" content="<?php echo $mtitle_default; ?>">
    <meta name="dc.source" content="<?php echo $home_default; ?>">
    <meta name="dc.relation" content="<?php echo $link_default; ?>">
    <meta name="dc.title" content="<?php echo $title_default; ?>">
    <meta name="dc.keywords" content="<?php echo $keys_default; ?>, <?php if($posttags){foreach($posttags as $tag){echo $tag->name . ', ';}}; ?>">
    <meta name="dc.subject" content="<?php echo $mtitle_default.' - '.$desc_default; ?>">
    <meta name="dc.description" content="<?php echo $desc_default; ?>">

<?php wp_head(); ?>
</head>
    <body <?php body_class(); ?>>