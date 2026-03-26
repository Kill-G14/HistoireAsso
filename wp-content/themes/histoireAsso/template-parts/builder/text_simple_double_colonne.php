<?php
/**
 * Builder Component: Text Simple Double Colonne
 * Bloc de texte sur deux colonnes
 */

$title = $args['title'] ?? '';
$colonne_gauche = $args['colonne_gauche'] ?? '';
$colonne_droite = $args['colonne_droite'] ?? '';
?>

<section class="builder-text-double section-spacing">
    <div class="container1200px">
        <?php if (!empty($title)): ?>
            <h2 class="text-double-title headline-lg"><?= esc_html($title); ?></h2>
        <?php endif; ?>
        
        <div class="text-double-grid">
            <?php if (!empty($colonne_gauche)): ?>
                <div class="text-double-col body-md">
                    <?= wp_kses_post($colonne_gauche); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($colonne_droite)): ?>
                <div class="text-double-col body-md">
                    <?= wp_kses_post($colonne_droite); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.builder-text-double {
    background-color: var(--background);
}

.text-double-title {
    color: var(--primary);
    margin-bottom: var(--spacing-10);
    text-align: center;
}

.text-double-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-12);
}

.text-double-col {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
}

.text-double-col p {
    margin-bottom: var(--spacing-6);
}

@media (max-width: 1024px) {
    .text-double-grid {
        grid-template-columns: 1fr;
        gap: var(--spacing-8);
    }
}
</style>
