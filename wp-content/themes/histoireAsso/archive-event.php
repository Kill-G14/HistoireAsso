<?php
/**
 * Archive: Événements
 * Liste des événements avec système de filtres par ère
 */

get_header();
?>

<main class="archive-event">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => 'Agenda des Événements',
        'custom_subtitle' => 'Découvrez nos reconstitutions historiques et événements à venir',
    ]); ?>
    
    <div class="container1400px">
        <!-- Filtres -->
        <?php get_template_part('template-parts/filtres-event'); ?>
        
        <!-- Résultats -->
        <div class="filtres-results">
            <div class="events-grid">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php get_template_part('template-parts/builder/card-event'); ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-results">Aucun événement à venir pour le moment.</p>
                <?php endif; ?>
            </div>
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
