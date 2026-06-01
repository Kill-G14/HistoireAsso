<?php
/**
 * Archive générique
 * Pour tous les autres types d'archives
 */

get_header();
?>

<main class="archive-default">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => get_the_archive_title(),
        'custom_subtitle' => get_the_archive_description(),
    ]); ?>
    
    <div class="container1200px section-spacing">
        <div class="archive-grid">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part('template-parts/builder/card'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">Aucun contenu trouvé.</p>
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
