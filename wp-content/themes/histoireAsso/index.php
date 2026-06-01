<?php
/**
 * Index — Template principal fallback
 * 
 * IMPORTANT: Fichier obligatoire pour WordPress
 * Ce template est utilisé quand aucun autre template spécifique n'existe
 */

get_header();
?>

<main class="index-default">
    <!-- Banner -->
    <?php 
    if (is_home()) {
        get_template_part('template-parts/banner', null, [
            'custom_title' => 'Blog',
            'custom_subtitle' => 'Nos dernières publications',
        ]);
    } elseif (is_archive()) {
        get_template_part('template-parts/banner', null, [
            'custom_title' => get_the_archive_title(),
            'custom_subtitle' => get_the_archive_description(),
        ]);
    } else {
        get_template_part('template-parts/banner', null, [
            'custom_title' => get_bloginfo('name'),
            'custom_subtitle' => get_bloginfo('description'),
        ]);
    }
    ?>
    
    <div class="container1200px section-spacing">
        <div class="posts-grid">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-card-content">
                            <h2 class="post-card-title headline-sm">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-card-meta">
                                <time datetime="<?= esc_attr(get_the_date('Y-m-d')); ?>">
                                    <?= esc_html(get_the_date('d F Y')); ?>
                                </time>
                                <span>•</span>
                                <span>Par <?= esc_html(get_the_author()); ?></span>
                            </div>
                            
                            <div class="post-card-excerpt body-md">
                                <?= wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="post-card-link">
                                Lire la suite →
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">Aucun contenu à afficher.</p>
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
