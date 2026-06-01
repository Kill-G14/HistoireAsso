<?php
/**
 * Template Name: Recrutement
 * Page d'inscription à l'association
 */

get_header();
?>

<main class="page-rejoindre">
    <!-- Hero asymétrique -->
    <section class="rejoindre-hero container1400px">
        <?php if (has_post_thumbnail()): ?>
            <div class="rejoindre-hero-image">
                <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            </div>
        <?php endif; ?>
        
        <div class="rejoindre-hero-content <?php echo !has_post_thumbnail() ? 'full-width' : ''; ?>">
            <h1>Recrutement</h1>
            <p>
                Passionné(e) d'histoire et de reconstitution historique ? 
                Rejoignez notre communauté et participez à nos événements et découvertes archéologiques.
            </p>
            
            <?php get_template_part('template-parts/button-b', null, [
                'text' => 'Découvrir nos activités',
                'url' => home_url('/evenements'),
            ]); ?>
        </div>
    </section>
    
    <!-- Formulaire d'inscription -->
    <section class="rejoindre-form-section container1200px">
        <h2>Formulaire de candidature</h2>
        
        <form id="join-form" class="join-form">
            <div class="form-row">
                <div class="form-field">
                    <label for="join-prenom" class="form-label">Prénom *</label>
                    <input type="text" id="join-prenom" name="prenom" class="form-input" required>
                </div>
                
                <div class="form-field">
                    <label for="join-nom" class="form-label">Nom *</label>
                    <input type="text" id="join-nom" name="nom" class="form-input" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-field">
                    <label for="join-email" class="form-label">Email *</label>
                    <input type="email" id="join-email" name="email" class="form-input" required>
                </div>
                
                <div class="form-field">
                    <label for="join-telephone" class="form-label">Téléphone *</label>
                    <input type="tel" id="join-telephone" name="telephone" class="form-input" required>
                </div>
            </div>
            
            <div class="form-field">
                <label for="join-adresse" class="form-label">Adresse *</label>
                <textarea id="join-adresse" name="adresse" class="form-textarea" rows="3" required></textarea>
            </div>
            
            <div class="form-field">
                <label for="join-motivation" class="form-label">Parlez-nous de votre motivation *</label>
                <textarea id="join-motivation" name="motivation" class="form-textarea" required></textarea>
            </div>
            
            <input type="hidden" name="nonce" value="<?= wp_create_nonce('lead_form_nonce'); ?>">
            
            <?php get_template_part('template-parts/button-a', null, [
                'text' => 'Envoyer ma candidature',
                'url' => '#',
                'class' => 'submit-btn',
            ]); ?>
            
            <div class="form-response"></div>
        </form>
    </section>
</main>

<?php get_footer(); ?>
