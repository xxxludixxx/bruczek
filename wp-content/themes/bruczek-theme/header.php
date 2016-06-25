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
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="main-header" class="site-header" role="banner">
        <div class="container-fluid">
                <div class="logo-wrapper">
                <?php bruczek_theme_the_custom_logo(); ?>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 header header-phone-number"><p>+48 74 265 2525</p></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 social-icons">
                    </div>
                </div>
                <div class="row">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </div>
        </div>
    </header>