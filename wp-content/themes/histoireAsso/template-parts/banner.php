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
