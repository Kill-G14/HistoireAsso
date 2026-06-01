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
    
    // CSS Carousel Intervenants
    wp_enqueue_style('ha-carousel-intervenants', get_template_directory_uri() . '/css/carousel-intervenants.css', [], '1.0.0');
    
    // CSS Cards
    wp_enqueue_style('ha-card', get_template_directory_uri() . '/css/card.css', [], '1.0.0');
    
    // CSS Page Contact
    wp_enqueue_style('ha-page-contact', get_template_directory_uri() . '/css/page-contact.css', [], '1.0.0');
    
    // CSS Page Rejoindre
    wp_enqueue_style('ha-page-rejoindre', get_template_directory_uri() . '/css/page-rejoindre.css', [], '1.0.0');
    
    // CSS Banner (utilisé sur toutes les pages internes)
    wp_enqueue_style('ha-banner', get_template_directory_uri() . '/css/banner.css', [], '1.0.0');
    
    // CSS Footer
    wp_enqueue_style('ha-footer', get_template_directory_uri() . '/css/footer.css', [], '1.0.0');
    
    // CSS Pages spécifiques
    if (is_page_template('page-mentions.php')) {
        wp_enqueue_style('ha-page-mentions', get_template_directory_uri() . '/css/page-mentions.css', [], '1.0.0');
    }
    
    if (is_404()) {
        wp_enqueue_style('ha-page-404', get_template_directory_uri() . '/css/page-404.css', [], '1.0.0');
    }
    
    if (is_archive() && !is_post_type_archive(['event', 'news'])) {
        wp_enqueue_style('ha-archive', get_template_directory_uri() . '/css/archive.css', [], '1.0.0');
    }
    
    if (is_page() && !is_page_template()) {
        wp_enqueue_style('ha-page', get_template_directory_uri() . '/css/page.css', [], '1.0.0');
    }
    
    if (is_front_page()) {
        wp_enqueue_style('ha-front-page', get_template_directory_uri() . '/css/front-page.css', [], '1.0.0');
    }
    
    if (is_singular('post') && !is_singular(['event', 'news'])) {
        wp_enqueue_style('ha-single', get_template_directory_uri() . '/css/single.css', [], '1.0.0');
    }
    
    if (is_singular('news')) {
        wp_enqueue_style('ha-single-news', get_template_directory_uri() . '/css/single-news.css', [], '1.0.0');
    }
    
    if (is_singular('event')) {
        wp_enqueue_style('ha-single-event', get_template_directory_uri() . '/css/single-event.css', [], '1.0.0');
    }
    
    if (is_home() || (is_archive() && !is_post_type_archive(['event', 'news']))) {
        wp_enqueue_style('ha-index', get_template_directory_uri() . '/css/index.css', [], '1.0.0');
    }
    
    // CSS Builder Components (chargés conditionnellement selon ACF)
    if (function_exists('have_rows')) {
        if (have_rows('builder')) {
            while (have_rows('builder')) {
                the_row();
                $layout = get_row_layout();
                
                switch ($layout) {
                    case 'text_simple':
                        wp_enqueue_style('ha-builder-text-simple', get_template_directory_uri() . '/css/builder-text_simple.css', [], '1.0.0');
                        break;
                    case 'text_simple_double_colonne':
                        wp_enqueue_style('ha-builder-text-double', get_template_directory_uri() . '/css/builder-text_simple_double_colonne.css', [], '1.0.0');
                        break;
                    case 'text_image':
                        wp_enqueue_style('ha-builder-text-image', get_template_directory_uri() . '/css/builder-text_image.css', [], '1.0.0');
                        break;
                    case 'list_event':
                        wp_enqueue_style('ha-builder-list-event', get_template_directory_uri() . '/css/builder-list_event.css', [], '1.0.0');
                        break;
                    case 'dernier_article':
                        wp_enqueue_style('ha-builder-dernier-article', get_template_directory_uri() . '/css/builder-dernier_article.css', [], '1.0.0');
                        break;
                    case 'cta':
                        wp_enqueue_style('ha-builder-cta', get_template_directory_uri() . '/css/builder-cta.css', [], '1.0.0');
                        break;
                }
            }
        }
    }
    
    // Google Fonts (Noto Serif + Work Sans)
    wp_enqueue_style('ha-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;600;700&family=Work+Sans:wght@300;400;500;600&display=swap', [], null);
    
    // Material Symbols (pour icônes)
    wp_enqueue_style('material-symbols', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', [], null);
    
    // JavaScript Navbar (Vanilla JS)
    wp_enqueue_script('ha-navbar', get_template_directory_uri() . '/JS/navbar.js', [], '1.0.0', true);
    
    // JavaScript Carousel Intervenants
    wp_enqueue_script('ha-carousel-intervenants', get_template_directory_uri() . '/JS/carousel-intervenants.js', [], '1.0.0', true);
    
    // JavaScript Formulaire de Contact (chargement conditionnel)
    if (is_page('contact')) {
        wp_enqueue_script('ha-formulaire-contact', get_template_directory_uri() . '/JS/formulaire-contact.js', [], '1.0.0', true);
        wp_localize_script('ha-formulaire-contact', 'ajax_params', [
            'ajaxurl' => admin_url('admin-ajax.php')
        ]);
    }
    
    // JavaScript Formulaire d'Adhésion (chargement conditionnel)
    if (is_page('recrutement')) {
        wp_enqueue_script('ha-formulaire-adhesion', get_template_directory_uri() . '/JS/formulaire-adhesion.js', [], '1.0.0', true);
        wp_localize_script('ha-formulaire-adhesion', 'ajax_params', [
            'ajaxurl' => admin_url('admin-ajax.php')
        ]);
    }
}
