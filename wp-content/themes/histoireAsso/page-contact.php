<?php
/**
 * Template Name: Contact
 * Page de contact avec formulaire et carte
 */

get_header();

// Récupérer infos de contact depuis ACF Options
$adresse = get_field('adresse_association', 'option');
$email = get_field('email_contact', 'option');
$telephone = get_field('telephone', 'option');
?>

<main class="page-contact">
    <!-- Banner -->
    <?php get_template_part('template-parts/banner', null, [
        'custom_title' => 'Nous Contacter',
        'custom_subtitle' => 'Une question ? N\'hésitez pas à nous écrire',
    ]); ?>
    
    <div class="container1200px section-spacing">
        <div class="contact-split">
            <!-- Formulaire -->
            <div class="contact-form-section">
                <h2>Envoyez-nous un message</h2>
                
                <form id="contact-form" class="contact-form">
                    <div class="form-field">
                        <label for="contact-name" class="form-label">Nom complet *</label>
                        <input type="text" 
                               id="contact-name" 
                               name="name" 
                               class="form-input" 
                               required>
                    </div>
                    
                    <div class="form-field">
                        <label for="contact-email" class="form-label">Email *</label>
                        <input type="email" 
                               id="contact-email" 
                               name="email" 
                               class="form-input" 
                               required>
                    </div>
                    
                    <div class="form-field">
                        <label for="contact-message" class="form-label">Message *</label>
                        <textarea id="contact-message" 
                                  name="message" 
                                  class="form-textarea" 
                                  required></textarea>
                    </div>
                    
                    <input type="hidden" name="nonce" value="<?= wp_create_nonce('contact_form_nonce'); ?>">
                    
                    <?php get_template_part('template-parts/button-a', null, [
                        'text' => 'Envoyer',
                        'url' => '#',
                        'class' => 'submit-btn',
                    ]); ?>
                    
                    <div class="form-response"></div>
                </form>
            </div>
            
            <!-- Carte et infos -->
            <div class="contact-map-section">
                <h2>Où nous trouver</h2>
                
                <!-- Carte (placeholder) -->
                <div class="map-container">
                    <p>Carte Google Maps — Tournai, Belgique</p>
                    <!-- TODO: Intégrer iframe Google Maps -->
                </div>
                
                <!-- Informations de contact -->
                <div class="contact-info">
                    <?php if (!empty($adresse)): ?>
                        <div class="contact-info-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span><?= esc_html($adresse); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($email)): ?>
                        <div class="contact-info-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($telephone)): ?>
                        <div class="contact-info-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <a href="tel:<?= esc_attr($telephone); ?>"><?= esc_html($telephone); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('#contact-form').on('submit', function(e) {
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
                action: 'submit_contact_form',
                name: $('#contact-name').val(),
                email: $('#contact-email').val(),
                message: $('#contact-message').val(),
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
