<?php
/**
 * Builder Component: Text + Image
 * Bloc avec texte et image (asymétrique)
 */

$title = $args['title'] ?? '';
$contenu = $args['contenu'] ?? '';
$image = $args['image'] ?? null;
$image_position = $args['image_position'] ?? 'droite'; // gauche ou droite
$background_color = $args['background_color'] ?? '';
?>

<section class="builder-text-image section-spacing" <?php if ($background_color): ?>style="background-color: <?= esc_attr($background_color); ?>;"<?php endif; ?>>
    <div class="container1200px">
        <div class="text-image-grid <?= $image_position === 'gauche' ? 'image-left' : 'image-right'; ?>">
            <div class="text-image-content">
                <?php if (!empty($title)): ?>
                    <h2 class="text-image-title headline-lg"><?= esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if (!empty($contenu)): ?>
                    <div class="text-image-text body-md">
                        <?= wp_kses_post($contenu); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($image)): ?>
                <div class="text-image-visual">
                    <img src="<?= esc_url($image['url']); ?>" 
                         alt="<?= esc_attr($image['alt'] ?: $title); ?>" 
                         class="text-image-photo">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.builder-text-image {
    background-color: var(--surface-container);
}

.text-image-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-12);
    align-items: center;
}

.text-image-grid.image-left {
    direction: ltr;
}

.text-image-grid.image-left .text-image-visual {
    order: -1;
}

.text-image-title {
    color: var(--primary);
    margin-bottom: var(--spacing-6);
}

.text-image-text {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
}

.text-image-text p {
    margin-bottom: var(--spacing-5);
}

.text-image-photo {
    width: 100%;
    height: auto;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

@media (max-width: 1024px) {
    .text-image-grid {
        grid-template-columns: 1fr;
        gap: var(--spacing-8);
    }
    
    .text-image-grid.image-left .text-image-visual {
        order: 0;
    }
}
</style>
