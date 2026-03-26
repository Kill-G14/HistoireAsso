<?php
/**
 * Builder Component: Liste Événements
 * Affiche une liste d'événements (utilisable dans le builder)
 */

$nombre = $args['nombre'] ?? 3;
$filtrer_par_ere = $args['filtrer_par_ere'] ?? null;

// Arguments WP_Query
$query_args = [
    'post_type' => 'event',
    'posts_per_page' => $nombre,
    'orderby' => 'meta_value',
    'meta_key' => 'date_event',
    'order' => 'ASC',
];

// Filtre par ère si spécifié
if (!empty($filtrer_par_ere)) {
    $query_args['tax_query'] = [
        [
            'taxonomy' => 'era',
            'field' => 'term_id',
            'terms' => $filtrer_par_ere,
        ],
    ];
}

$events_query = new WP_Query($query_args);
?>

<section class="builder-list-event section-spacing">
    <div class="container1200px">
        <h2 class="section-title headline-lg">Prochains Événements</h2>
        
        <?php if ($events_query->have_posts()): ?>
            <div class="events-grid">
                <?php while ($events_query->have_posts()): $events_query->the_post(); ?>
                    <?php get_template_part('template-parts/builder/card-event'); ?>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="no-results">Aucun événement à venir pour le moment.</p>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<style>
.builder-list-event {
    background-color: var(--surface-container-low);
}

.builder-list-event .section-title {
    color: var(--primary);
    text-align: center;
    margin-bottom: var(--spacing-12);
}
</style>
