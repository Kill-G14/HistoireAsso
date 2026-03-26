<?php
/**
 * Front Page — Page d'accueil
 * Utilise le builder ACF comme page.php
 */

get_header();

while (have_posts()): the_post();
?>

<main class="front-page">
    <?php
    // Builder ACF
    $builder = get_field('builder');
    
    if (!empty($builder)) {
        foreach ($builder as $section) {
            get_template_part('template-parts/builder/' . $section['acf_fc_layout'], null, $section);
        }
    } else {
        // Fallback
        if (has_post_thumbnail()) {
            the_post_thumbnail('full');
        }
        ?>
        <div class="container1200px section-spacing">
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php
    }
    ?>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<style>
.front-page {
    background-color: var(--background);
}
</style>
