<?php
/**
 * Builder Component: Hero Section
 * Design System: Digital Archivist
 */

$background = $args['background_image'];
$surtitre = $args['surtitre'] ?? '';
$titre = $args['titre'];
$btn_primary = $args['bouton_primaire'] ?? null;
$btn_secondary = $args['bouton_secondaire'] ?? null;
?>

<header class="hero-section">
    <!-- Image de fond -->
    <div class="hero-background">
        <?php if ($background): ?>
            <img 
                src="<?= esc_url($background['url']); ?>" 
                alt="<?= esc_attr($background['alt'] ?: 'Hero background'); ?>"
                class="hero-bg-image"
            />
        <?php endif; ?>
        <div class="hero-gradient-overlay"></div>
    </div>

    <!-- Contenu centré -->
    <div class="hero-content">
        <?php if ($surtitre): ?>
            <p class="hero-surtitre"><?= esc_html($surtitre); ?></p>
        <?php endif; ?>

        <h1 class="hero-titre"><?= nl2br(esc_html($titre)); ?></h1>

        <!-- Boutons CTA -->
        <?php if ($btn_primary || $btn_secondary): ?>
            <div class="hero-cta">
                <?php 
                // Bouton primaire
                if ($btn_primary && !empty($btn_primary['texte']) && !empty($btn_primary['lien'])):
                    // Gérer si lien est string (URL) ou array (Link)
                    $lien_primary = is_array($btn_primary['lien']) ? $btn_primary['lien']['url'] : $btn_primary['lien'];
                    $target_primary = is_array($btn_primary['lien']) && !empty($btn_primary['lien']['target']) ? $btn_primary['lien']['target'] : '_self';
                ?>
                    <a href="<?= esc_url($lien_primary); ?>" target="<?= esc_attr($target_primary); ?>" class="hero-btn hero-btn-primary">
                        <?= esc_html($btn_primary['texte']); ?>
                    </a>
                <?php endif; ?>

                <?php 
                // Bouton secondaire
                if ($btn_secondary && !empty($btn_secondary['texte']) && !empty($btn_secondary['lien'])):
                    // Gérer si lien est string (URL) ou array (Link)
                    $lien_secondary = is_array($btn_secondary['lien']) ? $btn_secondary['lien']['url'] : $btn_secondary['lien'];
                    $target_secondary = is_array($btn_secondary['lien']) && !empty($btn_secondary['lien']['target']) ? $btn_secondary['lien']['target'] : '_self';
                ?>
                    <a href="<?= esc_url($lien_secondary); ?>" target="<?= esc_attr($target_secondary); ?>" class="hero-btn hero-btn-secondary">
                        <?= esc_html($btn_secondary['texte']); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="hero-scroll-indicator">
        <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
    </div>
</header>
