<?php
/**
 * Système de Filtres AJAX pour Événements
 * Handlers AJAX et enqueue conditionnel
 */

// Enqueue conditionnel des scripts de filtres
add_action('wp_enqueue_scripts', 'ha_enqueue_filtres_event_scripts');

function ha_enqueue_filtres_event_scripts() {
    if (is_post_type_archive('event')) {
        // CSS Filtres
        wp_enqueue_style('ha-filtres-event', get_template_directory_uri() . '/css/filtres-event.css', [], '1.0.0');
        
        // JS Filtres
        wp_enqueue_script('ha-filtres-event', get_template_directory_uri() . '/JS/filtres-event.js', ['jquery'], '1.0.0', true);
        
        // Localiser le script avec l'URL AJAX et le nonce
        wp_localize_script('ha-filtres-event', 'ajaxFiltresEvent', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('filtrer_events_nonce'),
        ]);
    }
}

// Handlers AJAX
add_action('wp_ajax_filtrer_events', 'ha_ajax_filtrer_events');
add_action('wp_ajax_nopriv_filtrer_events', 'ha_ajax_filtrer_events');

function ha_ajax_filtrer_events() {
    // Vérifier le nonce
    check_ajax_referer('filtrer_events_nonce', 'nonce');

    // Récupérer et sanitizer les paramètres
    $era = isset($_POST['era']) ? sanitize_text_field($_POST['era']) : '';

    // Construire les arguments de la requête
    $args = [
        'post_type' => 'event',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'date_event',
        'order' => 'ASC',
    ];

    // Ajouter le filtre taxonomie si une ère est sélectionnée
    if (!empty($era) && $era !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'era',
                'field' => 'slug',
                'terms' => $era,
            ],
        ];
    }

    // Exécuter la requête
    $query = new WP_Query($args);

    // Générer le HTML
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/builder/card-event');
        }
        wp_reset_postdata();
    } else {
        echo '<p class="no-results">Aucun événement trouvé pour cette période.</p>';
    }

    $html = ob_get_clean();

    // Retourner la réponse JSON
    wp_send_json_success([
        'html' => $html,
        'count' => $query->found_posts,
    ]);
}
