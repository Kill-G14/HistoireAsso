<?php
/**
 * Builder Component: Card News
 * Card pour afficher une actualité
 */

// Récupérer les données ACF
$date_publication = get_field('date_publication') ?: get_the_date('Y-m-d');
$auteur = get_field('auteur_article');
$galerie = get_field('galerie');

// Image principale
$image_url = '';
$image_alt = get_the_title();

if ($galerie && !empty($galerie)) {
    $image_url = $galerie[0]['url'];
    $image_alt = $galerie[0]['alt'] ?: get_the_title();
} elseif (has_post_thumbnail()) {
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
?>

<article class="card card-news">
    <?php if (!empty($image_url)): ?>
        <div class="card-image-container">
            <img src="<?= esc_url($image_url); ?>" 
                 alt="<?= esc_attr($image_alt); ?>" 
                 class="card-image">
        </div>
    <?php endif; ?>
    
    <div class="card-content">
        <!-- Date -->
        <div class="card-meta">
            <time datetime="<?= esc_attr($date_publication); ?>">
                <?= esc_html(date_i18n('d F Y', strtotime($date_publication))); ?>
            </time>
        </div>
        
        <!-- Titre -->
        <h3 class="card-title">
            <a href="<?= esc_url(get_permalink()); ?>">
                <?= esc_html(get_the_title()); ?>
            </a>
        </h3>
        
        <!-- Excerpt -->
        <?php if (has_excerpt()): ?>
            <p class="card-excerpt"><?= esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
        <?php endif; ?>
        
        <!-- Lien -->
        <a href="<?= esc_url(get_permalink()); ?>" class="card-link">
            Lire l'article →
        </a>
        
        <!-- Auteur -->
        <?php if (!empty($auteur)): ?>
            <div class="card-author">
                <span class="card-author-name">Par <?= is_array($auteur) ? esc_html($auteur['display_name']) : esc_html($auteur); ?></span>
            </div>
        <?php endif; ?>
    </div>
</article>
