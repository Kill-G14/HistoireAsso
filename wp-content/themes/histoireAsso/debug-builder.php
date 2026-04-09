<?php
/**
 * DEBUG: Vérifier le builder sur la page d'accueil
 * 
 * Placez ce code temporairement dans front-page.php AVANT la boucle du builder
 * pour voir ce qui est chargé
 */

// À placer après: $builder = get_field('builder');

echo '<pre style="background: #000; color: #0f0; padding: 20px; margin: 20px; border: 2px solid #0f0; position: relative; z-index: 9999;">';
echo "=== DEBUG BUILDER ===\n\n";

if (empty($builder)) {
    echo "❌ PROBLÈME: Le champ 'builder' est vide ou n'existe pas\n\n";
    echo "Vérifications:\n";
    echo "- Le groupe de champs 'Page Builder' est-il actif?\n";
    echo "- Le champ 'builder' existe-t-il?\n";
    echo "- Des layouts ont-ils été ajoutés sur cette page?\n";
} else {
    echo "✅ Builder chargé avec " . count($builder) . " section(s)\n\n";
    
    foreach ($builder as $index => $section) {
        echo "--- Section #" . ($index + 1) . " ---\n";
        echo "Layout: " . $section['acf_fc_layout'] . "\n";
        
        if ($section['acf_fc_layout'] === 'hero') {
            echo "\n📍 HERO DÉTECTÉ:\n";
            echo "  - Background image: " . (isset($section['background_image']) ? '✅ OUI' : '❌ NON') . "\n";
            echo "  - Surtitre: " . ($section['surtitre'] ?? '(vide)') . "\n";
            echo "  - Titre: " . ($section['titre'] ?? '❌ MANQUANT') . "\n";
            echo "  - Bouton primaire: " . (isset($section['bouton_primaire']) ? '✅ OUI' : '❌ NON') . "\n";
            echo "  - Bouton secondaire: " . (isset($section['bouton_secondaire']) ? '✅ OUI' : '❌ NON') . "\n";
            
            if (isset($section['background_image'])) {
                echo "\n🖼️ Image background:\n";
                echo "  URL: " . ($section['background_image']['url'] ?? 'MANQUANT') . "\n";
            }
        }
        
        echo "\n";
    }
}

echo "\n=== FIN DEBUG ===";
echo '</pre>';
?>
