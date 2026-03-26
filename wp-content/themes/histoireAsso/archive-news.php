<?php
/**
 * Archive: Actualités
 * Grille d'actualités style "Dernières Découvertes"
 */

get_header();
?>

<main class="archive-news">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => 'Toutes les Infos',
        'custom_subtitle' => 'Actualités, découvertes et vie de l\'association',
    ]); ?>
    
    <div class="container1400px">
        <!-- Grid actualités -->
        <div class="news-grid">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part('template-parts/builder/card-news'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">Aucune actualité pour le moment.</p>
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
