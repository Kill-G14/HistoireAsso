<?php
/**
 * Template: Page générique avec Builder ACF
 */

get_header();

$builder = get_field('builder');
?>

<main class="page-generic">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_title(),
    ]); ?>
    
    <!-- Builder ACF -->
    <?php if (!empty($builder)): ?>
        <?php foreach ($builder as $section): ?>
            <?php get_template_part('template-parts/builder/' . $section['acf_fc_layout'], null, $section); ?>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Contenu standard WordPress (si pas de builder) -->
    <?php if (empty($builder) && have_posts()): ?>
        <div class="container1200px section-spacing">
            <?php while (have_posts()): the_post(); ?>
                <article <?php post_class(); ?>>
                    <div class="page-content body-md">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

<style>
.page-generic {
    min-height: calc(100vh - 200px);
}

.page-content {
    color: var(--on-surface);
    line-height: var(--lh-relaxed);
    max-width: 900px;
    margin: 0 auto;
}

.page-content p {
    margin-bottom: var(--spacing-6);
}

.page-content h2 {
    font-family: var(--font-serif);
    font-size: var(--headline-lg);
    color: var(--primary);
    margin: var(--spacing-10) 0 var(--spacing-6);
}

.page-content h3 {
    font-family: var(--font-serif);
    font-size: var(--headline-sm);
    color: var(--primary);
    margin: var(--spacing-8) 0 var(--spacing-5);
}
</style>
