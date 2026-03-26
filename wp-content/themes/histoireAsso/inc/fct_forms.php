<?php
/**
 * Traitement des Formulaires
 * Handlers pour formulaires de contact et inscription
 */

// Handler formulaire de contact
add_action('wp_ajax_submit_contact_form', 'ha_submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'ha_submit_contact_form');

function ha_submit_contact_form() {
    // Vérifier le nonce
    check_ajax_referer('contact_form_nonce', 'nonce');

    // Récupérer et sanitizer les données
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validation de base
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Tous les champs sont obligatoires.');
        return;
    }

    if (!is_email($email)) {
        wp_send_json_error('L\'adresse email n\'est pas valide.');
        return;
    }

    // Préparer l'email
    $to = get_field('email_contact', 'option') ?: get_option('admin_email');
    $subject = 'Nouveau message de contact - Histoire Association';
    $body = "Nom: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"];

    // Envoyer l'email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success('Votre message a été envoyé avec succès.');
    } else {
        wp_send_json_error('Une erreur est survenue lors de l\'envoi du message.');
    }
}

// Handler formulaire d'inscription
add_action('wp_ajax_submit_join_form', 'ha_submit_join_form');
add_action('wp_ajax_nopriv_submit_join_form', 'ha_submit_join_form');

function ha_submit_join_form() {
    // Vérifier le nonce
    check_ajax_referer('join_form_nonce', 'nonce');

    // Récupérer et sanitizer les données
    $prenom = sanitize_text_field($_POST['prenom']);
    $nom = sanitize_text_field($_POST['nom']);
    $email = sanitize_email($_POST['email']);
    $telephone = sanitize_text_field($_POST['telephone']);
    $motivation = sanitize_textarea_field($_POST['motivation']);

    // Validation de base
    if (empty($prenom) || empty($nom) || empty($email) || empty($motivation)) {
        wp_send_json_error('Les champs Prénom, Nom, Email et Motivation sont obligatoires.');
        return;
    }

    if (!is_email($email)) {
        wp_send_json_error('L\'adresse email n\'est pas valide.');
        return;
    }

    // Préparer l'email
    $to = get_field('email_contact', 'option') ?: get_option('admin_email');
    $subject = 'Nouvelle candidature - Histoire Association';
    $body = "Nouvelle demande d'adhésion:\n\n";
    $body .= "Prénom: {$prenom}\n";
    $body .= "Nom: {$nom}\n";
    $body .= "Email: {$email}\n";
    $body .= "Téléphone: {$telephone}\n\n";
    $body .= "Motivation:\n{$motivation}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"];

    // Envoyer l'email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success('Votre candidature a été envoyée avec succès. Nous vous contacterons prochainement.');
    } else {
        wp_send_json_error('Une erreur est survenue lors de l\'envoi de votre candidature.');
    }
}
