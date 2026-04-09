<?php
/**
 * Fonctions Générales
 * Enqueue scripts, styles, support thème, menus
 */

// Support du thème
add_action('after_setup_theme', 'ha_theme_support');

function ha_theme_support() {
    // Support des images mises en avant
    add_theme_support('post-thumbnails');
    
    // Support du titre dynamique
    add_theme_support('title-tag');
    
    // Support HTML5
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    
    // Enregistrer les menus
    register_nav_menus([
        'main-menu' => 'Menu Principal',
        'footer-menu' => 'Menu Footer',
    ]);
}

// Enqueue des styles et scripts
add_action('wp_enqueue_scripts', 'ha_enqueue_scripts');

function ha_enqueue_scripts() {
    // Stylesheet principal
    wp_enqueue_style('ha-style', get_stylesheet_uri(), [], '1.0.0');
    
    // CSS General (tokens design system)
    wp_enqueue_style('ha-general', get_template_directory_uri() . '/css/general.css', [], '1.0.0');
    
    // CSS Navigation avec glassmorphisme
    wp_enqueue_style('ha-navigation', get_template_directory_uri() . '/css/navigation.css', [], '1.0.0');
    
    // CSS Hero section
    wp_enqueue_style('ha-hero', get_template_directory_uri() . '/css/hero.css', [], '1.0.0');
    
    // CSS Cards
    wp_enqueue_style('ha-card', get_template_directory_uri() . '/css/card.css', [], '1.0.0');
    
    // Google Fonts (Noto Serif + Work Sans)
    wp_enqueue_style('ha-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;600;700&family=Work+Sans:wght@300;400;500;600&display=swap', [], null);
    
    // Material Symbols (pour icônes)
    wp_enqueue_style('material-symbols', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', [], null);
    
    // JavaScript Navbar (Vanilla JS)
    wp_enqueue_script('ha-navbar', get_template_directory_uri() . '/JS/navbar.js', [], '1.0.0', true);
}
