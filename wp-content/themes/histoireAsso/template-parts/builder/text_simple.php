<?php
/**
 * Builder Component: Text Simple
 * Bloc de texte simple avec titre et contenu
 */

$title = $args['title'] ?? '';
$contenu = $args['contenu'] ?? '';
?>

<section class="builder-text-simple section-spacing">
    <div class="container1200px">
        <?php if (!empty($title)): ?>
            <h2 class="text-simple-title headline-lg"><?= esc_html($title); ?></h2>
        <?php endif; ?>
        
        <?php if (!empty($contenu)): ?>
            <div class="text-simple-content body-md">
                <?= wp_kses_post($contenu); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.builder-text-simple {
    background-color: var(--background);
}

.text-simple-title {
    color: var(--primary);
    margin-bottom: var(--spacing-8);
    text-align: center;
}

.text-simple-content {
    color: var(--on-surface);
    max-width: 900px;
    margin: 0 auto;
    line-height: var(--lh-relaxed);
}

.text-simple-content p {
    margin-bottom: var(--spacing-6);
}

.text-simple-content h3 {
    font-family: var(--font-serif);
    font-size: var(--headline-sm);
    color: var(--primary);
    margin: var(--spacing-8) 0 var(--spacing-4);
}
</style>
