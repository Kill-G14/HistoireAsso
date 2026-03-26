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

<style>
.page-404 {
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--background);
    margin-top: 80px;
}

.error-404-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.error-404-title {
    color: var(--primary-container);
    margin-bottom: var(--spacing-4);
    font-size: 8rem;
    line-height: 1;
}

.error-404-subtitle {
    color: var(--primary);
    margin-bottom: var(--spacing-6);
}

.error-404-text {
    color: var(--on-surface-variant);
    margin-bottom: var(--spacing-10);
}

.error-404-suggestions {
    margin-top: var(--spacing-12);
    padding-top: var(--spacing-8);
    border-top: 1px solid var(--outline-variant);
}

.error-404-suggestions h3 {
    color: var(--primary);
    margin-bottom: var(--spacing-5);
}

.suggestions-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.suggestions-list li {
    margin-bottom: var(--spacing-4);
}

.suggestions-list a {
    color: var(--primary-container);
    font-size: var(--body-lg);
}

@media (max-width: 768px) {
    .error-404-title {
        font-size: 5rem;
    }
}
</style>
