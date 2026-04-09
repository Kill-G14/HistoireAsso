<?php
/**
 * Builder Component: Carousel Intervenants
 * Design System: Digital Archivist
 */

$titre = $args['titre_section'] ?? 'Nos Intervenants';
$description = $args['description'] ?? '';
$slides = $args['slides'] ?? [];
?>

<section class="carousel-intervenants">
    <div class="carousel-header">
        <h2 class="carousel-titre"><?= esc_html($titre); ?></h2>
        <?php if ($description): ?>
            <p class="carousel-description"><?= esc_html($description); ?></p>
        <?php endif; ?>
    </div>

    <div class="carousel-container">
        <!-- Navigation Arrows -->
        <button class="carousel-nav carousel-nav-prev" aria-label="Slide précédent">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        
        <button class="carousel-nav carousel-nav-next" aria-label="Slide suivant">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>

        <!-- Carousel Wrapper -->
        <div class="carousel-wrapper">
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $index => $slide): 
                    $image = $slide['image'];
                    $categorie = $slide['categorie'] ?? '';
                    $titre_slide = $slide['titre'];
                    $lien = $slide['lien'] ?? null;
                    
                    // Gérer lien array ou string
                    $url = null;
                    $target = '_self';
                    if ($lien) {
                        if (is_array($lien)) {
                            $url = $lien['url'] ?? null;
                            $target = $lien['target'] ?? '_self';
                        } else {
                            $url = $lien;
                        }
                    }
                ?>
                    <div class="carousel-slide">
                        <?php if ($url): ?>
                            <a href="<?= esc_url($url); ?>" target="<?= esc_attr($target); ?>" class="carousel-card">
                        <?php else: ?>
                            <div class="carousel-card">
                        <?php endif; ?>
                        
                            <!-- Image de fond -->
                            <img 
                                src="<?= esc_url($image['url']); ?>" 
                                alt="<?= esc_attr($image['alt'] ?: $titre_slide); ?>"
                                class="carousel-card-image"
                            />
                            
                            <!-- Gradient overlay -->
                            <div class="carousel-card-overlay"></div>
                            
                            <!-- Contenu -->
                            <div class="carousel-card-content">
                                <?php if ($categorie): ?>
                                    <span class="carousel-card-categorie"><?= esc_html($categorie); ?></span>
                                <?php endif; ?>
                                <h3 class="carousel-card-titre"><?= esc_html($titre_slide); ?></h3>
                                <div class="carousel-card-line"></div>
                            </div>
                            
                        <?php if ($url): ?>
                            </a>
                        <?php else: ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination Dots -->
    <?php if (count($slides) > 1): ?>
        <div class="carousel-pagination">
            <?php foreach ($slides as $index => $slide): ?>
                <button 
                    class="carousel-dot <?= $index === 0 ? 'active' : ''; ?>" 
                    data-slide="<?= $index; ?>"
                    aria-label="Aller au slide <?= $index + 1; ?>"
                ></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
