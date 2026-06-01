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
