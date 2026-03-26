<?php
/**
 * Builder Component: Card Event
 * Card pour afficher un événement avec carousel
 */

// Récupérer les données ACF
$date_event = get_field('date_event');
$lieu = get_field('lieu');
$galerie = get_field('galerie');

// Préparer les images pour le carousel
$images = [];
if ($galerie) {
    foreach ($galerie as $image) {
        $images[] = [
            'url' => $image['url'],
            'alt' => $image['alt'] ?: get_the_title(),
        ];
    }
} elseif (has_post_thumbnail()) {
    $images[] = [
        'url' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'alt' => get_the_title(),
    ];
}
?>

<article class="card card-event">
    <?php if (!empty($images)): ?>
        <?php if (count($images) > 1): ?>
            <!-- Carousel si plusieurs images -->
            <div class="card-carousel artifact-carousel">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $image): ?>
                            <div class="swiper-slide">
                                <div class="card-image-container">
                                    <img src="<?= esc_url($image['url']); ?>" 
                                         alt="<?= esc_attr($image['alt']); ?>" 
                                         class="card-image carousel-image">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        <?php else: ?>
            <!-- Image seule -->
            <div class="card-image-container">
                <img src="<?= esc_url($images[0]['url']); ?>" 
                     alt="<?= esc_attr($images[0]['alt']); ?>" 
                     class="card-image">
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <div class="card-content">
        <!-- Date proéminente -->
        <?php if (!empty($date_event)): ?>
            <div class="card-date">
                <?= esc_html(date_i18n('d M Y', strtotime($date_event))); ?>
            </div>
        <?php endif; ?>
        
        <!-- Titre -->
        <h3 class="card-title">
            <a href="<?= esc_url(get_permalink()); ?>">
                <?= esc_html(get_the_title()); ?>
            </a>
        </h3>
        
        <!-- Lieu -->
        <?php if (!empty($lieu)): ?>
            <div class="card-location">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                <?= esc_html($lieu); ?>
            </div>
        <?php endif; ?>
        
        <!-- Excerpt -->
        <?php if (has_excerpt()): ?>
            <p class="card-excerpt"><?= esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
        
        <!-- Lien -->
        <a href="<?= esc_url(get_permalink()); ?>" class="card-link">
            En savoir plus →
        </a>
    </div>
</article>
