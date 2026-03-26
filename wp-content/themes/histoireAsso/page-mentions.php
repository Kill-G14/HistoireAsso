<?php
/**
 * Template Name: Mentions Légales
 * Page de mentions légales
 */

get_header();

while (have_posts()): the_post();
?>

<main class="page-mentions">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_title(),
    ]); ?>
    
    <div class="container1200px section-spacing">
        <article <?php post_class('mentions-article'); ?>>
            <!-- Contenu -->
            <div class="mentions-content body-md">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<style>
.page-mentions {
    background-color: var(--background);
}

.mentions-article {
    max-width: 900px;
    margin: 0 auto;
}

.mentions-content {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
}

.mentions-content h2 {
    color: var(--primary);
    margin-top: var(--spacing-10);
    margin-bottom: var(--spacing-6);
}

.mentions-content h3 {
    color: var(--primary-container);
    margin-top: var(--spacing-8);
    margin-bottom: var(--spacing-4);
}

.mentions-content p {
    margin-bottom: var(--spacing-6);
}

.mentions-content ul,
.mentions-content ol {
    margin-bottom: var(--spacing-6);
    padding-left: var(--spacing-8);
}

.mentions-content li {
    margin-bottom: var(--spacing-3);
}

.mentions-content a {
    color: var(--primary-container);
    text-decoration: underline;
}

.mentions-content a:hover {
    color: var(--primary);
}
</style>
