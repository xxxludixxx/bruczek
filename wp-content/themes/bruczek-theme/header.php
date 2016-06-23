<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 23.06.16
 * Time: 19:26
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="main-header" class="site-header" role="banner">
        <div class="">

        </div>
    </header>