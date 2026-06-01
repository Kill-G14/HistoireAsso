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
