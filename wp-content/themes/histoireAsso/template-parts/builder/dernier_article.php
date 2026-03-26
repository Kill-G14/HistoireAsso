<?php
/**
 * Builder Component: Derniers Articles (News)
 * Affiche les dernières actualités
 */

$nombre = $args['nombre'] ?? 3;

// Arguments WP_Query
$query_args = [
    'post_type' => 'news',
    'posts_per_page' => $nombre,
    'orderby' => 'date',
    'order' => 'DESC',
];

$news_query = new WP_Query($query_args);
?>

<section class="builder-dernier-article section-spacing">
    <div class="container1200px">
        <h2 class="section-title headline-lg">Dernières Actualités</h2>
        
        <?php if ($news_query->have_posts()): ?>
            <div class="news-grid">
                <?php while ($news_query->have_posts()): $news_query->the_post(); ?>
                    <?php get_template_part('template-parts/builder/card-news'); ?>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="no-results">Aucune actualité pour le moment.</p>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<style>
.builder-dernier-article {
    background-color: var(--background);
}

.builder-dernier-article .section-title {
    color: var(--primary);
    text-align: center;
    margin-bottom: var(--spacing-12);
}
</style>
