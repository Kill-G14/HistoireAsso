<?php
/**
 * Custom Post Types
 * Déclaration des types de contenu personnalisés
 */

// Enregistrement des CPT
add_action('init', 'ha_register_custom_post_types');

function ha_register_custom_post_types() {
    // CPT Event (Événements)
    register_post_type('event', [
        'labels' => [
            'name' => 'Événements',
            'singular_name' => 'Événement',
            'add_new' => 'Ajouter un événement',
            'add_new_item' => 'Ajouter un nouvel événement',
            'edit_item' => 'Modifier l\'événement',
            'new_item' => 'Nouvel événement',
            'view_item' => 'Voir l\'événement',
            'search_items' => 'Rechercher des événements',
            'not_found' => 'Aucun événement trouvé',
            'all_items' => 'Tous les événements',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'evenements'],
        'supports' => ['title', 'editor', 'thumbnail'], // excerpt retiré : auto-généré
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_rest' => true,
    ]);

    // CPT News (Actualités)
    register_post_type('news', [
        'labels' => [
            'name' => 'Actualités',
            'singular_name' => 'Actualité',
            'add_new' => 'Ajouter une actualité',
            'add_new_item' => 'Ajouter une nouvelle actualité',
            'edit_item' => 'Modifier l\'actualité',
            'new_item' => 'Nouvelle actualité',
            'view_item' => 'Voir l\'actualité',
            'search_items' => 'Rechercher des actualités',
            'not_found' => 'Aucune actualité trouvée',
            'all_items' => 'Toutes les actualités',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'actualites'],
        'supports' => ['title', 'editor', 'thumbnail', 'author', 'comments'], // excerpt retiré : auto-généré
        'menu_icon' => 'dashicons-megaphone',
        'show_in_rest' => true,
    ]);

    // CPT Lead (Candidatures / Leads)
    register_post_type('lead', [
        'labels' => [
            'name' => 'Candidatures',
            'singular_name' => 'Candidature',
            'edit_item' => 'Voir la candidature',
            'view_item' => 'Voir la candidature',
            'search_items' => 'Rechercher des candidatures',
            'not_found' => 'Aucune candidature trouvée',
            'all_items' => 'Toutes les candidatures',
        ],
        'public' => false,
        'show_ui' => true,
        'capabilities' => [
            'create_posts' => false, // Retire la capacité d'ajouter
        ],
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'supports' => ['title'],
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => false,
        'has_archive' => false,
    ]);
}

// Enregistrement des métadonnées pour les leads
add_action('init', 'ha_register_lead_meta');

function ha_register_lead_meta() {
    $meta_fields = ['lead_prenom', 'lead_nom', 'lead_adresse', 'lead_telephone', 'lead_email', 'lead_motivation'];
    
    foreach ($meta_fields as $meta_field) {
        register_post_meta('lead', $meta_field, [
            'type' => 'string',
            'single' => true,
            'show_in_rest' => false,
            'sanitize_callback' => 'sanitize_text_field',
        ]);
    }
}

// ACF Options Page
add_action('acf/init', function() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Options du Site',
            'menu_title' => 'Options du Site',
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]);
    }
});
