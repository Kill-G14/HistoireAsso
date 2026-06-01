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
