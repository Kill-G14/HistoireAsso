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
    $recipient_email = get_field('email_contact', 'option') ?: get_option('admin_email');
    $subject = 'Nouveau message de contact - Histoire Association';
    $body = "Nom: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"];

    // Envoyer l'email
    $email_sent_successfully = wp_mail($recipient_email, $subject, $body, $headers);

    if ($email_sent_successfully) {
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
    $recipient_email = get_field('email_contact', 'option') ?: get_option('admin_email');
    $subject = 'Nouvelle candidature - Histoire Association';
    $body = "Nouvelle demande d'adhésion:\n\n";
    $body .= "Prénom: {$prenom}\n";
    $body .= "Nom: {$nom}\n";
    $body .= "Email: {$email}\n";
    $body .= "Téléphone: {$telephone}\n\n";
    $body .= "Motivation:\n{$motivation}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}"];

    // Envoyer l'email
    $email_sent_successfully = wp_mail($recipient_email, $subject, $body, $headers);

    if ($email_sent_successfully) {
        wp_send_json_success('Votre candidature a été envoyée avec succès. Nous vous contacterons prochainement.');
    } else {
        wp_send_json_error('Une erreur est survenue lors de l\'envoi de votre candidature.');
    }
}

// Handler formulaire de capture de leads (Recrutement amélioré)
add_action('wp_ajax_submit_lead_form', 'ha_submit_lead_form');
add_action('wp_ajax_nopriv_submit_lead_form', 'ha_submit_lead_form');

function ha_submit_lead_form() {
    // Vérifier le nonce
    check_ajax_referer('lead_form_nonce', 'nonce');

    // Récupérer et sanitizer les données
    $prenom = sanitize_text_field($_POST['prenom']);
    $nom = sanitize_text_field($_POST['nom']);
    $email = sanitize_email($_POST['email']);
    $telephone = sanitize_text_field($_POST['telephone']);
    $adresse = sanitize_textarea_field($_POST['adresse']);
    $motivation = isset($_POST['motivation']) ? sanitize_textarea_field($_POST['motivation']) : '';

    // Validation de base
    if (empty($prenom) || empty($nom) || empty($email) || empty($telephone) || empty($adresse)) {
        wp_send_json_error('Tous les champs obligatoires doivent être remplis.');
        return;
    }

    if (!is_email($email)) {
        wp_send_json_error('L\'adresse email n\'est pas valide.');
        return;
    }

    // Enregistrer le lead en base de données
    $lead_data = [
        'post_type' => 'lead',
        'post_title' => $prenom . ' ' . $nom,
        'post_status' => 'publish',
        'meta_input' => [
            'lead_prenom' => $prenom,
            'lead_nom' => $nom,
            'lead_email' => $email,
            'lead_telephone' => $telephone,
            'lead_adresse' => $adresse,
            'lead_motivation' => $motivation,
        ],
    ];

    $lead_id = wp_insert_post($lead_data);

    if (is_wp_error($lead_id)) {
        wp_send_json_error('Une erreur est survenue lors de l\'enregistrement de votre candidature.');
        return;
    }

    // Email de confirmation au prospect
    $prospect_subject = 'Confirmation de votre candidature - Histoire Association';
    $prospect_body = "Bonjour $prenom,\n\n";
    $prospect_body .= "Merci pour votre intérêt ! Nous avons bien reçu votre candidature.\n\n";
    $prospect_body .= "Récapitulatif de vos informations :\n";
    $prospect_body .= "- Nom : $nom\n";
    $prospect_body .= "- Prénom : $prenom\n";
    $prospect_body .= "- Adresse : $adresse\n";
    $prospect_body .= "- Téléphone : $telephone\n";
    $prospect_body .= "- Email : $email\n\n";
    $prospect_body .= "Nous vous recontacterons prochainement.\n\n";
    $prospect_body .= "Cordialement,\n";
    $prospect_body .= "L'équipe Histoire Association";
    
    $prospect_headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Histoire Association <' . get_option('admin_email') . '>'
    ];

    wp_mail($email, $prospect_subject, $prospect_body, $prospect_headers);

    // Email de notification à l'administrateur
    $admin_email = get_field('email_contact', 'option') ?: get_option('admin_email');
    $admin_subject = 'Nouvelle candidature - ' . $prenom . ' ' . $nom;
    $admin_body = "Une nouvelle candidature a été soumise :\n\n";
    $admin_body .= "Informations du candidat :\n";
    $admin_body .= "- Prénom : $prenom\n";
    $admin_body .= "- Nom : $nom\n";
    $admin_body .= "- Adresse : $adresse\n";
    $admin_body .= "- Téléphone : $telephone\n";
    $admin_body .= "- Email : $email\n";
    if (!empty($motivation)) {
        $admin_body .= "\nMotivation :\n$motivation\n";
    }
    $admin_body .= "\nDate et heure : " . current_time('d/m/Y') . " à " . current_time('H:i') . "\n\n";
    $admin_body .= "Consulter toutes les candidatures dans l'administration WordPress.";
    
    $admin_headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email
    ];

    wp_mail($admin_email, $admin_subject, $admin_body, $admin_headers);

    // Réponse de succès
    wp_send_json_success('Votre candidature a été enregistrée avec succès ! Un email de confirmation vous a été envoyé.');
}
