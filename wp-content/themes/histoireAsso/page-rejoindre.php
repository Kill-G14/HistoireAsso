<?php
/**
 * Template Name: Rejoindre
 * Page d'inscription à l'association
 */

get_header();
?>

<main class="page-rejoindre">
    <!-- Hero asymétrique -->
    <section class="rejoindre-hero container1400px">
        <div class="rejoindre-hero-image">
            <?php if (has_post_thumbnail()): ?>
                <?= get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            <?php else: ?>
                <img src="<?= get_template_directory_uri(); ?>/assets/images/placeholder-hero.jpg" alt="Rejoindre l'association">
            <?php endif; ?>
        </div>
        
        <div class="rejoindre-hero-content">
            <h1>Rejoindre l'Association</h1>
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
                    <label for="join-telephone" class="form-label">Téléphone</label>
                    <input type="tel" id="join-telephone" name="telephone" class="form-input">
                </div>
            </div>
            
            <div class="form-field">
                <label for="join-motivation" class="form-label">Parlez-nous de votre motivation *</label>
                <textarea id="join-motivation" name="motivation" class="form-textarea" required></textarea>
            </div>
            
            <input type="hidden" name="nonce" value="<?= wp_create_nonce('join_form_nonce'); ?>">
            
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

<script>
jQuery(document).ready(function($) {
    $('#join-form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $response = $('.form-response');
        const $submitBtn = $form.find('.submit-btn');
        
        // Désactiver le bouton
        $submitBtn.css('opacity', '0.6').css('pointer-events', 'none');
        
        // Requête AJAX
        $.ajax({
            url: '<?= admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'submit_join_form',
                prenom: $('#join-prenom').val(),
                nom: $('#join-nom').val(),
                email: $('#join-email').val(),
                telephone: $('#join-telephone').val(),
                motivation: $('#join-motivation').val(),
                nonce: $('input[name="nonce"]').val()
            },
            success: function(response) {
                if (response.success) {
                    $response.removeClass('error').addClass('success').text(response.data).fadeIn();
                    $form[0].reset();
                } else {
                    $response.removeClass('success').addClass('error').text(response.data).fadeIn();
                }
            },
            error: function() {
                $response.removeClass('success').addClass('error').text('Une erreur est survenue.').fadeIn();
            },
            complete: function() {
                $submitBtn.css('opacity', '1').css('pointer-events', 'auto');
            }
        });
    });
});
</script>
