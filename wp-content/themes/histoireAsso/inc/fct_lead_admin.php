<?php
/**
 * Interface d'administration pour les Leads / Candidatures
 * Colonnes personnalisées, meta boxes, export CSV
 */

// Personnaliser les actions de ligne pour les leads
add_filter('post_row_actions', 'ha_lead_row_actions', 10, 2);

function ha_lead_row_actions($actions, $post) {
    if ($post->post_type === 'lead') {
        // Supprimer toutes les actions par défaut
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
        unset($actions['trash']);
        unset($actions['view']);
        
        // Ajouter les actions personnalisées
        $actions['view'] = '<a href="' . get_edit_post_link($post->ID) . '">Voir la candidature</a>';
        $actions['delete'] = sprintf(
            '<a href="%s" class="submitdelete" onclick="return confirm(\'Voulez-vous vraiment supprimer cette candidature ?\')">Supprimer</a>',
            get_delete_post_link($post->ID, '', true)
        );
    }
    
    return $actions;
}

// Personnaliser les colonnes de la liste des leads
add_filter('manage_lead_posts_columns', 'ha_lead_columns');

function ha_lead_columns($columns) {
    // Retirer les colonnes par défaut
    unset($columns['title']);
    unset($columns['date']);
    
    // Définir les nouvelles colonnes
    $new_columns = [
        'cb' => $columns['cb'], // Checkbox pour sélection multiple
        'lead_prenom' => 'Prénom',
        'lead_nom' => 'Nom',
        'lead_email' => 'Email',
        'lead_telephone' => 'Téléphone',
        'lead_adresse' => 'Adresse',
        'lead_motivation' => 'Motivation',
        'date' => 'Date d\'inscription',
    ];
    
    return $new_columns;
}

// Afficher le contenu des colonnes personnalisées
add_action('manage_lead_posts_custom_column', 'ha_lead_column_content', 10, 2);

function ha_lead_column_content($column, $post_id) {
    switch ($column) {
        case 'lead_prenom':
            echo esc_html(get_post_meta($post_id, 'lead_prenom', true));
            break;
        case 'lead_nom':
            echo esc_html(get_post_meta($post_id, 'lead_nom', true));
            break;
        case 'lead_email':
            $email = get_post_meta($post_id, 'lead_email', true);
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            break;
        case 'lead_telephone':
            $tel = get_post_meta($post_id, 'lead_telephone', true);
            echo '<a href="tel:' . esc_attr($tel) . '">' . esc_html($tel) . '</a>';
            break;
        case 'lead_adresse':
            $adresse = get_post_meta($post_id, 'lead_adresse', true);
            // Afficher seulement les 50 premiers caractères
            echo esc_html(strlen($adresse) > 50 ? substr($adresse, 0, 50) . '...' : $adresse);
            break;
        case 'lead_motivation':
            $motivation = get_post_meta($post_id, 'lead_motivation', true);
            // Afficher seulement les 80 premiers caractères
            echo esc_html(strlen($motivation) > 80 ? substr($motivation, 0, 80) . '...' : $motivation);
            break;
    }
}

// Rendre les colonnes triables
add_filter('manage_edit-lead_sortable_columns', 'ha_lead_sortable_columns');

function ha_lead_sortable_columns($columns) {
    $columns['lead_prenom'] = 'lead_prenom';
    $columns['lead_nom'] = 'lead_nom';
    $columns['lead_email'] = 'lead_email';
    $columns['date'] = 'date';
    
    return $columns;
}

// Gérer le tri des colonnes personnalisées
add_action('pre_get_posts', 'ha_lead_orderby');

function ha_lead_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    
    if ($query->get('post_type') !== 'lead') {
        return;
    }
    
    $orderby = $query->get('orderby');
    
    if ('lead_prenom' === $orderby) {
        $query->set('meta_key', 'lead_prenom');
        $query->set('orderby', 'meta_value');
    } elseif ('lead_nom' === $orderby) {
        $query->set('meta_key', 'lead_nom');
        $query->set('orderby', 'meta_value');
    } elseif ('lead_email' === $orderby) {
        $query->set('meta_key', 'lead_email');
        $query->set('orderby', 'meta_value');
    }
}

// Ajouter une meta box pour afficher les détails du lead
add_action('add_meta_boxes', 'ha_lead_meta_boxes');

function ha_lead_meta_boxes() {
    add_meta_box(
        'lead_details',
        'Informations du candidat',
        'ha_lead_details_callback',
        'lead',
        'normal',
        'high'
    );
}

function ha_lead_details_callback($post) {
    // Récupérer les métadonnées
    $prenom = get_post_meta($post->ID, 'lead_prenom', true);
    $nom = get_post_meta($post->ID, 'lead_nom', true);
    $email = get_post_meta($post->ID, 'lead_email', true);
    $telephone = get_post_meta($post->ID, 'lead_telephone', true);
    $adresse = get_post_meta($post->ID, 'lead_adresse', true);
    $motivation = get_post_meta($post->ID, 'lead_motivation', true);
    
    // Afficher les informations
    ?>
    <style>
        .lead-details { font-size: 14px; line-height: 1.8; }
        .lead-details strong { display: inline-block; width: 120px; color: #1e1e1e; }
        .lead-details p { margin: 10px 0; }
        .lead-details .motivation { background: #f0f0f1; padding: 15px; border-radius: 4px; margin-top: 15px; }
    </style>
    
    <div class="lead-details">
        <p><strong>Prénom :</strong> <?= esc_html($prenom); ?></p>
        <p><strong>Nom :</strong> <?= esc_html($nom); ?></p>
        <p><strong>Email :</strong> <a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a></p>
        <p><strong>Téléphone :</strong> <a href="tel:<?= esc_attr($telephone); ?>"><?= esc_html($telephone); ?></a></p>
        <p><strong>Adresse :</strong><br><?= nl2br(esc_html($adresse)); ?></p>
        
        <?php if (!empty($motivation)): ?>
            <div class="motivation">
                <strong>Motivation :</strong><br>
                <?= nl2br(esc_html($motivation)); ?>
            </div>
        <?php endif; ?>
        
        <p style="margin-top: 15px; color: #646970;">
            <strong>Date d'inscription :</strong> <?= get_the_date('d/m/Y à H:i', $post->ID); ?>
        </p>
    </div>
    <?php
}

// Retirer l'éditeur WordPress pour le CPT lead
add_action('init', 'ha_remove_lead_editor');

function ha_remove_lead_editor() {
    remove_post_type_support('lead', 'editor');
}

// Ajouter un bouton d'export CSV dans l'administration
add_action('admin_notices', 'ha_lead_export_button');

function ha_lead_export_button() {
    $screen = get_current_screen();
    
    // Afficher seulement sur la page de liste des leads
    if ($screen && $screen->post_type === 'lead' && $screen->base === 'edit') {
        if (current_user_can('manage_options')) {
            $export_url = admin_url('admin.php?action=export_leads_csv');
            ?>
            <div class="notice notice-info" style="display: flex; align-items: center; justify-content: space-between;">
                <p><strong>Export des candidatures</strong> — Téléchargez toutes les candidatures au format CSV.</p>
                <a href="<?= esc_url(wp_nonce_url($export_url, 'export_leads_csv')); ?>" 
                   class="button button-primary">
                    <span class="dashicons dashicons-download" style="margin-top: 3px;"></span> Exporter en CSV
                </a>
            </div>
            <?php
        }
    }
}

// Handler pour l'export CSV
add_action('admin_action_export_leads_csv', 'ha_export_leads_csv');

function ha_export_leads_csv() {
    // Vérifier les permissions
    if (!current_user_can('manage_options')) {
        wp_die('Vous n\'avez pas les permissions nécessaires.');
    }
    
    // Vérifier le nonce
    check_admin_referer('export_leads_csv');
    
    // Récupérer tous les leads
    $leads = get_posts([
        'post_type' => 'lead',
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    
    // Préparer les headers HTTP pour le téléchargement CSV
    $filename = 'candidatures_' . date('Y-m-d_H-i') . '.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Pragma: no-cache');
    header('Expires: 0');
    
    // Créer le flux de sortie
    $output = fopen('php://output', 'w');
    
    // Ajouter le BOM UTF-8 pour Excel
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // Écrire les en-têtes du CSV
    fputcsv($output, [
        'ID',
        'Date d\'inscription',
        'Prénom',
        'Nom',
        'Email',
        'Téléphone',
        'Adresse',
        'Motivation'
    ], ';');
    
    // Écrire les données de chaque lead
    foreach ($leads as $lead) {
        $row = [
            $lead->ID,
            get_the_date('d/m/Y H:i', $lead->ID),
            get_post_meta($lead->ID, 'lead_prenom', true),
            get_post_meta($lead->ID, 'lead_nom', true),
            get_post_meta($lead->ID, 'lead_email', true),
            get_post_meta($lead->ID, 'lead_telephone', true),
            get_post_meta($lead->ID, 'lead_adresse', true),
            get_post_meta($lead->ID, 'lead_motivation', true),
        ];
        
        fputcsv($output, $row, ';');
    }
    
    fclose($output);
    exit;
}
