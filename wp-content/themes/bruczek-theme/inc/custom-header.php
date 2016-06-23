<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 23.06.16
 * Time: 21:23
 */

if ( ! function_exists( 'bruczek_theme_the_custom_logo' ) ) :
    /**
     * Displays the optional custom logo.
     *
     * Does nothing if the custom logo is not available.
     *
     * @since Twenty Fifteen 1.5
     */
    function bruczek_theme_the_custom_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
    }
endif;