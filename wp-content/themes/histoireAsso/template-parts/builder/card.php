<?php
/**
 * Builder Component: Card Générique
 * Card générique utilisant les données du post courant
 */
?>

<article class="card">
    <?php if (has_post_thumbnail()): ?>
        <div class="card-image-container">
            <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
                 alt="<?= esc_attr(get_the_title()); ?>" 
                 class="card-image">
        </div>
    <?php endif; ?>
    
    <div class="card-content">
        <!-- Titre -->
        <h3 class="card-title">
            <a href="<?= esc_url(get_permalink()); ?>">
                <?= esc_html(get_the_title()); ?>
            </a>
        </h3>
        
        <!-- Date -->
        <div class="card-meta">
            <time datetime="<?= esc_attr(get_the_date('Y-m-d')); ?>">
                <?= esc_html(get_the_date('d F Y')); ?>
            </time>
        </div>
        
        <!-- Excerpt -->
        <?php if (has_excerpt()): ?>
            <p class="card-excerpt"><?= esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
        <?php endif; ?>
        
        <!-- Lien -->
        <a href="<?= esc_url(get_permalink()); ?>" class="card-link">
            Découvrir →
        </a>
    </div>
</article>
