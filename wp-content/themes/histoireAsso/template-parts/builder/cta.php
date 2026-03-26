<?php
/**
 * Builder Component: CTA (Call to Action)
 * Bloc CTA avec titre, texte et bouton
 */

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$lien = $args['lien'] ?? null;
$background_color = $args['background_color'] ?? '';
?>

<section class="builder-cta section-spacing" <?php if ($background_color): ?>style="background-color: <?= esc_attr($background_color); ?>;"<?php endif; ?>>
    <div class="container1200px">
        <div class="cta-content">
            <?php if (!empty($title)): ?>
                <h2 class="cta-title headline-lg"><?= esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($subtitle)): ?>
                <p class="cta-subtitle body-lg"><?= esc_html($subtitle); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($lien)): ?>
                <?php get_template_part('template-parts/button-a', null, [
                    'text' => $lien['title'],
                    'url' => $lien['url'],
                    'target' => $lien['target'] ?? '_self',
                ]); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.builder-cta {
    background-color: var(--surface-container);
}

.cta-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    color: var(--primary);
    margin-bottom: var(--spacing-6);
}

.cta-subtitle {
    color: var(--on-surface);
    margin-bottom: var(--spacing-8);
}
</style>
