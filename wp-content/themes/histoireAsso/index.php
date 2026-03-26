<?php
/**
 * Index — Template principal fallback
 * 
 * IMPORTANT: Fichier obligatoire pour WordPress
 * Ce template est utilisé quand aucun autre template spécifique n'existe
 */

get_header();
?>

<main class="index-default">
    <!-- Banner -->
    <?php 
    if (is_home()) {
        get_template_part('template-parts/banner', null, [
            'custom_title' => 'Blog',
            'custom_subtitle' => 'Nos dernières publications',
        ]);
    } elseif (is_archive()) {
        get_template_part('template-parts/banner', null, [
            'custom_title' => get_the_archive_title(),
            'custom_subtitle' => get_the_archive_description(),
        ]);
    } else {
        get_template_part('template-parts/banner', null, [
            'custom_title' => get_bloginfo('name'),
            'custom_subtitle' => get_bloginfo('description'),
        ]);
    }
    ?>
    
    <div class="container1200px section-spacing">
        <div class="posts-grid">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-card-content">
                            <h2 class="post-card-title headline-sm">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-card-meta">
                                <time datetime="<?= esc_attr(get_the_date('Y-m-d')); ?>">
                                    <?= esc_html(get_the_date('d F Y')); ?>
                                </time>
                                <span>•</span>
                                <span>Par <?= esc_html(get_the_author()); ?></span>
                            </div>
                            
                            <div class="post-card-excerpt body-md">
                                <?= wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="post-card-link">
                                Lire la suite →
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">Aucun contenu à afficher.</p>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <?php
        the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => '← Précédent',
            'next_text' => 'Suivant →',
        ]);
        ?>
    </div>
</main>

<?php get_footer(); ?>

<style>
.index-default {
    background-color: var(--background);
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: var(--spacing-8);
    margin-bottom: var(--spacing-10);
}

.post-card {
    background-color: var(--surface-container);
    border-radius: var(--radius-md);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.post-card-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/9;
}

.post-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-card:hover .post-card-image img {
    transform: scale(1.05);
}

.post-card-content {
    padding: var(--spacing-6);
}

.post-card-title {
    margin-bottom: var(--spacing-4);
}

.post-card-title a {
    color: var(--primary);
    text-decoration: none;
}

.post-card-title a:hover {
    color: var(--primary-container);
}

.post-card-meta {
    display: flex;
    gap: var(--spacing-3);
    align-items: center;
    color: var(--on-surface-variant);
    font-size: var(--body-sm);
    margin-bottom: var(--spacing-5);
}

.post-card-excerpt {
    color: var(--on-surface);
    margin-bottom: var(--spacing-5);
}

.post-card-link {
    color: var(--primary-container);
    font-weight: 500;
    text-decoration: none;
}

.post-card-link:hover {
    color: var(--primary);
}

.no-results {
    grid-column: 1 / -1;
    text-align: center;
    color: var(--on-surface-variant);
    font-size: var(--body-lg);
    padding: var(--spacing-12) 0;
}
</style>
