<?php
/**
 * Single: Actualité
 * Page de détail d'une actualité
 */

get_header();

while (have_posts()): the_post();

$date_publication = get_field('date_publication') ?: get_the_date('Y-m-d');
$auteur = get_field('auteur_article') ?: get_the_author();
$galerie = get_field('galerie');
$categories = get_the_terms(get_the_ID(), 'news_category');
?>

<main class="single-news">
    <!-- Banner avec titre actualité -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_title(),
    ]); ?>
    
    <div class="container1200px section-spacing">
        <article <?php post_class('news-article'); ?>>
            <!-- Meta informations -->
            <div class="news-meta">
                <div class="news-meta-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10z"/>
                    </svg>
                    <time datetime="<?= esc_attr($date_publication); ?>">
                        <?= esc_html(date_i18n('d F Y', strtotime($date_publication))); ?>
                    </time>
                </div>
                
                <div class="news-meta-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span><?= is_array($auteur) ? esc_html($auteur['display_name']) : esc_html($auteur); ?></span>
                </div>
                
                <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                    <div class="news-meta-item">
                        <?php foreach ($categories as $category): ?>
                            <span class="chip"><?= esc_html($category->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Image mise en avant -->
            <?php if (has_post_thumbnail()): ?>
                <div class="news-featured-image">
                    <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Contenu -->
            <div class="news-content body-lg">
                <?php the_content(); ?>
            </div>
            
            <!-- Galerie -->
            <?php if (!empty($galerie) && count($galerie) > 1): ?>
                <div class="news-gallery artifact-carousel">
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
.single-news {
    background-color: var(--background);
}

.news-article {
    max-width: 900px;
    margin: 0 auto;
}

.news-meta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-6);
    margin-bottom: var(--spacing-8);
    padding: var(--spacing-6);
    background-color: var(--surface-container);
    border-radius: var(--radius-md);
}

.news-meta-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    color: var(--on-surface);
    font-size: var(--body-md);
}

.news-meta-item svg {
    color: var(--primary-container);
}

.news-featured-image {
    margin-bottom: var(--spacing-10);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.news-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.news-content {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
    margin-bottom: var(--spacing-12);
}

.news-content p {
    margin-bottom: var(--spacing-6);
}

.gallery-title {
    color: var(--primary);
    text-align: center;
    margin: var(--spacing-12) 0 var(--spacing-8);
}
</style>
