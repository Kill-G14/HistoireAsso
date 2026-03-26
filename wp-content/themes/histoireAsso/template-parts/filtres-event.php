<?php
/**
 * Template Part: Filtres Event
 * Système de filtres par ère historique
 */

// Récupérer toutes les ères historiques
$eras = get_terms([
    'taxonomy' => 'era',
    'hide_empty' => true,
]);
?>

<div class="filtres-container">
    <h2 class="filtres-title">Filtrer par période historique</h2>
    
    <div class="filtres-chips">
        <!-- Chip "Tous" -->
        <button class="chip active" data-era="all">
            Tous les événements
        </button>
        
        <?php if (!empty($eras) && !is_wp_error($eras)): ?>
            <?php foreach ($eras as $era): ?>
                <button class="chip" data-era="<?= esc_attr($era->slug); ?>">
                    <?= esc_html($era->name); ?>
                </button>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <p class="results-count">
        <strong><?= wp_count_posts('event')->publish; ?></strong> événements trouvés
    </p>
</div>
