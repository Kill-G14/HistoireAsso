<?php
/**
 * Single: Post Standard
 * Template par défaut pour les posts WordPress standard
 */

get_header();

while (have_posts()): the_post();
?>

<main class="single-post">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_title(),
    ]); ?>
    
    <div class="container1200px section-spacing">
        <article <?php post_class('post-article'); ?>>
            <!-- Meta -->
            <div class="post-meta">
                <time datetime="<?= esc_attr(get_the_date('Y-m-d')); ?>">
                    <?= esc_html(get_the_date('d F Y')); ?>
                </time>
                <span class="separator">•</span>
                <span>Par <?= esc_html(get_the_author()); ?></span>
            </div>
            
            <!-- Image mise en avant -->
            <?php if (has_post_thumbnail()): ?>
                <div class="post-featured-image">
                    <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                </div>
            <?php endif; ?>
            
            <!-- Contenu -->
            <div class="post-content body-md">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<style>
.single-post {
    background-color: var(--background);
}

.post-article {
    max-width: 800px;
    margin: 0 auto;
}

.post-meta {
    display: flex;
    gap: var(--spacing-4);
    align-items: center;
    justify-content: center;
    margin-bottom: var(--spacing-8);
    color: var(--on-surface-variant);
    font-size: var(--body-sm);
}

.post-meta .separator {
    color: var(--primary-container);
}

.post-featured-image {
    margin-bottom: var(--spacing-10);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.post-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.post-content {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
}

.post-content p {
    margin-bottom: var(--spacing-6);
}
</style>
