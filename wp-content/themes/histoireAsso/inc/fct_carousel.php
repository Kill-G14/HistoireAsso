<?php
/**
 * Enqueue Carousel (Conditionnel)
 * Charge les scripts/styles du carousel uniquement sur les archives
 */

add_action('wp_enqueue_scripts', 'ha_enqueue_carousel_scripts');

function ha_enqueue_carousel_scripts() {
    // Charger uniquement sur les archives event et news
    if (is_post_type_archive('event') || is_post_type_archive('news')) {
        
        // Swiper.js CDN (version 11)
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11.0.0', true);
        
        // CSS Carousel personnalisé
        wp_enqueue_style('ha-carousel', get_template_directory_uri() . '/css/carousel.css', ['swiper-css'], '1.0.0');
        
        // JS Carousel personnalisé
        wp_enqueue_script('ha-carousel', get_template_directory_uri() . '/JS/carousel.js', ['swiper-js'], '1.0.0', true);
    }
}
