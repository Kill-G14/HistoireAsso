<?php
/**
 * Single: Événement
 * Page de détail d'un événement
 */

get_header();

while (have_posts()): the_post();

$date_event = get_field('date_event');
$lieu = get_field('lieu');
$galerie = get_field('galerie');
$eras = get_the_terms(get_the_ID(), 'era');
?>

<main class="single-event">
    <!-- Banner avec titre événement -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_title(),
    ]); ?>
    
    <div class="container1200px section-spacing">
        <article <?php post_class('event-article'); ?>>
            <!-- Meta informations -->
            <div class="event-meta">
                <?php if (!empty($date_event)): ?>
                    <div class="event-meta-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zM9 14H7v-2h2v2zm4 0h-2v-2h2v2zm4 0h-2v-2h2v2z"/>
                        </svg>
                        <strong><?= esc_html(date_i18n('d F Y', strtotime($date_event))); ?></strong>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($lieu)): ?>
                    <div class="event-meta-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <?= esc_html($lieu); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($eras) && !is_wp_error($eras)): ?>
                    <div class="event-meta-item">
                        <?php foreach ($eras as $era): ?>
                            <span class="chip"><?= esc_html($era->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Image mise en avant -->
            <?php if (has_post_thumbnail()): ?>
                <div class="event-featured-image">
                    <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Contenu -->
            <div class="event-content body-lg">
                <?php the_content(); ?>
            </div>
            
            <!-- Galerie -->
            <?php if (!empty($galerie) && count($galerie) > 1): ?>
                <div class="event-gallery artifact-carousel">
                    <h3 class="gallery-title headline-md">Galerie Photos</h3>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($galerie as $image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= esc_url($image['url']); ?>" 
                                         alt="<?= esc_attr($image['alt'] ?: get_the_title()); ?>" 
                                         class="carousel-image">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endif; ?>
        </article>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<style>
.single-event {
    background-color: var(--background);
}

.event-article {
    max-width: 900px;
    margin: 0 auto;
}

.event-meta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-6);
    margin-bottom: var(--spacing-8);
    padding: var(--spacing-6);
    background-color: var(--surface-container);
    border-radius: var(--radius-md);
}

.event-meta-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    color: var(--on-surface);
    font-size: var(--body-md);
}

.event-meta-item svg {
    color: var(--primary-container);
}

.event-featured-image {
    margin-bottom: var(--spacing-10);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.event-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.event-content {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
    margin-bottom: var(--spacing-12);
}

.event-content p {
    margin-bottom: var(--spacing-6);
}

.gallery-title {
    color: var(--primary);
    text-align: center;
    margin-bottom: var(--spacing-8);
}
</style>
