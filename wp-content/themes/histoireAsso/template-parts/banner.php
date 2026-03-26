<?php
/**
 * Template Part: Banner (Hero interne)
 * Banner pour pages internes avec titre et sous-titre personnalisables
 */

$custom_title = $args['custom_title'] ?? get_the_title();
$custom_subtitle = $args['custom_subtitle'] ?? '';
$background_image = $args['background_image'] ?? '';
?>

<section class="banner">
    <?php if (!empty($background_image)): ?>
        <div class="banner-background" style="background-image: url('<?= esc_url($background_image); ?>');"></div>
    <?php endif; ?>
    
    <div class="banner-content container1200px">
        <h1 class="banner-title display-lg"><?= esc_html($custom_title); ?></h1>
        
        <?php if (!empty($custom_subtitle)): ?>
            <p class="banner-subtitle body-lg"><?= esc_html($custom_subtitle); ?></p>
        <?php endif; ?>
    </div>
</section>

<style>
/* Banner Styles */
.banner {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-top: 80px; /* Offset pour navbar fixed */
    overflow: hidden;
}

.banner-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    opacity: 0.3;
    z-index: 0;
}

.banner-background::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent, var(--background));
}

.banner-content {
    position: relative;
    z-index: 1;
    padding: var(--spacing-16) var(--spacing-8);
}

.banner-title {
    color: var(--primary);
    margin-bottom: var(--spacing-6);
    letter-spacing: -0.02em;
}

.banner-subtitle {
    color: var(--on-surface-variant);
    max-width: 700px;
    margin: 0 auto;
}

@media (max-width: 768px) {
    .banner {
        min-height: 300px;
        margin-top: 70px;
    }
    
    .banner-content {
        padding: var(--spacing-12) var(--spacing-5);
    }
}
</style>
