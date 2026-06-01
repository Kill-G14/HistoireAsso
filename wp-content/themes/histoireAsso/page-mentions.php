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
