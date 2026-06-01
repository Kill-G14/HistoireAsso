<?php
/**
 * Footer du site
 * Inclut le CTA global (ACF Options) et les réseaux sociaux
 */

$cta_catalogue = get_field('cta_catalogue', 'option');
$reseaux = get_field('reseaux', 'option');
$adresse = get_field('adresse_association', 'option');
$email = get_field('email_contact', 'option');
$telephone = get_field('telephone', 'option');
$cta_hidden = get_field('cta_hidden'); // Champ pour cacher le CTA sur certaines pages
?>

<!-- CTA Global (si pas caché) -->
<?php if ($cta_catalogue && empty($cta_hidden)): ?>
    <section class="footer-cta section-spacing">
        <div class="container1200px">
            <div class="cta-content">
                <h2 class="cta-title headline-lg"><?= esc_html($cta_catalogue['titre']); ?></h2>
                <p class="cta-subtitle body-lg"><?= esc_html($cta_catalogue['texte']); ?></p>
                
                <?php if (!empty($cta_catalogue['lien'])): ?>
                    <?php get_template_part('template-parts/button-a', null, [
                        'text' => $cta_catalogue['lien']['title'],
                        'url' => $cta_catalogue['lien']['url'],
                        'target' => $cta_catalogue['lien']['target'] ?? '_self',
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Footer Principal -->
<footer class="site-footer">
    <div class="footer-content container1400px">
        <div class="footer-grid">
            <!-- Colonne 1 : À propos -->
            <div class="footer-col">
                <h3 class="footer-heading">Histoire Association</h3>
                <p class="footer-description">
                    Association de reconstitution historique et d'archéologie expérimentale basée à Tournai.
                </p>
            </div>
            
            <!-- Colonne 2 : Liens -->
            <div class="footer-col">
                <h3 class="footer-heading">Navigation</h3>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'footer-menu',
                    'fallback_cb' => false,
                ]);
                ?>
            </div>
            
            <!-- Colonne 3 : Contact -->
            <div class="footer-col">
                <h3 class="footer-heading">Contact</h3>
                <?php if (!empty($adresse)): ?>
                    <p><?= esc_html($adresse); ?></p>
                <?php endif; ?>
                <?php if (!empty($email)): ?>
                    <p><a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a></p>
                <?php endif; ?>
                <?php if (!empty($telephone)): ?>
                    <p><?= esc_html($telephone); ?></p>
                <?php endif; ?>
            </div>
            
            <!-- Colonne 4 : Réseaux sociaux -->
            <?php if (!empty($reseaux)): ?>
                <div class="footer-col">
                    <h3 class="footer-heading">Suivez-nous</h3>
                    <div class="footer-socials">
                        <?php foreach ($reseaux as $reseau): ?>
                            <a href="<?= esc_url($reseau['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="social-link">
                                <?= esc_html($reseau['reseau']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container1400px">
            <p class="footer-copyright">
                &copy; <?= date('Y'); ?> Histoire Association. Tous droits réservés. 
                <a href="<?= esc_url(home_url('/mentions-legales')); ?>">Mentions légales</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
