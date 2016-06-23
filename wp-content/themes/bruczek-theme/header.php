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
        <div class="container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bruczek_theme_the_custom_logo(); ?>
            </a>
            <div><p><?php bloginfo('name'); ?></p></div>
            <div class="header-phone-number"><p>123 123 3123</p></div>
            <div class="social-icons"></div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle"><?php _e( 'Primary Menu', '_mbbasetheme' ); ?></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- #site-navigation -->
        </div>
    </header>