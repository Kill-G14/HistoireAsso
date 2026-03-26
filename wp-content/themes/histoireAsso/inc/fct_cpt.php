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
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
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
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'],
        'menu_icon' => 'dashicons-megaphone',
        'show_in_rest' => true,
    ]);
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
