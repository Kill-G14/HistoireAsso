<?php
/**
 * Histoire Association Theme — Functions
 * 
 * Charge tous les fichiers de fonctionnalités modulaires
 * depuis le dossier inc/
 */

// Sécurité
if (!defined('ABSPATH')) {
    exit;
}

// Définir les constantes du thème
define('HA_THEME_VERSION', '1.0.0');
define('HA_THEME_DIR', get_template_directory());
define('HA_THEME_URI', get_template_directory_uri());

/**
 * Charger les fichiers de fonctions
 */
require_once HA_THEME_DIR . '/inc/fct_general.php';      // Support thème, scripts, styles
require_once HA_THEME_DIR . '/inc/fct_cpt.php';          // Custom Post Types
require_once HA_THEME_DIR . '/inc/fct_taxonomy.php';     // Taxonomies
require_once HA_THEME_DIR . '/inc/fct_carousel.php';     // Swiper.js
require_once HA_THEME_DIR . '/inc/fct_filtres_event.php'; // Filtres AJAX événements
require_once HA_THEME_DIR . '/inc/fct_forms.php';        // Formulaires Contact & Rejoindre
require_once HA_THEME_DIR . '/inc/fct_debug.php';        // Outils debug
