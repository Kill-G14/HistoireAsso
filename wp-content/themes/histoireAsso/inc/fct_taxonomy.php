<?php
/**
 * Taxonomies Personnalisées
 * Déclaration des taxonomies pour les CPT
 */

add_action('init', 'ha_register_taxonomies');

function ha_register_taxonomies() {
    
    // Taxonomie Era (Ère historique) pour Events
    register_taxonomy('era', ['event'], [
        'labels' => [
            'name' => 'Ères historiques',
            'singular_name' => 'Ère historique',
            'search_items' => 'Rechercher des ères',
            'all_items' => 'Toutes les ères',
            'edit_item' => 'Modifier l\'ère',
            'update_item' => 'Mettre à jour l\'ère',
            'add_new_item' => 'Ajouter une nouvelle ère',
            'new_item_name' => 'Nom de la nouvelle ère',
            'menu_name' => 'Ères historiques',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'ere'],
        'show_in_rest' => true,
    ]);

    // Taxonomie News Category (Catégorie d'actualité) pour News
    register_taxonomy('news_category', ['news'], [
        'labels' => [
            'name' => 'Catégories d\'actualité',
            'singular_name' => 'Catégorie d\'actualité',
            'search_items' => 'Rechercher des catégories',
            'all_items' => 'Toutes les catégories',
            'edit_item' => 'Modifier la catégorie',
            'update_item' => 'Mettre à jour la catégorie',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Nom de la nouvelle catégorie',
            'menu_name' => 'Catégories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'categorie-actualite'],
        'show_in_rest' => true,
    ]);
}
