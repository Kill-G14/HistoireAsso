<?php
/**
 * Template: 404 — Page non trouvée
 */

get_header();
?>

<main class="page-404">
    <div class="container1200px section-spacing">
        <div class="error-404-content">
            <h1 class="error-404-title display-lg">404</h1>
            <h2 class="error-404-subtitle headline-lg">Page introuvable</h2>
            <p class="error-404-text body-lg">
                La page que vous cherchez semble avoir été perdue dans les méandres de l'histoire...
            </p>
            
            <?php get_template_part('template-parts/button-a', null, [
                'text' => 'Retour à l\'accueil',
                'url' => home_url('/'),
            ]); ?>
            
            <!-- Suggestions -->
            <div class="error-404-suggestions">
                <h3 class="headline-sm">Pages suggérées :</h3>
                <ul class="suggestions-list">
                    <li><a href="<?= home_url('/evenements'); ?>">Agenda des événements</a></li>
                    <li><a href="<?= home_url('/actualites'); ?>">Toutes les infos</a></li>
                    <li><a href="<?= home_url('/nous-contacter'); ?>">Nous contacter</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
}
</style>
