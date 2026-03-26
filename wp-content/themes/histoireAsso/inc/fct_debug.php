<?php
/**
 * Outils de Debug
 * Fonctions pour afficher des variables dans la console navigateur
 */

/**
 * Affiche une variable dans la console JavaScript
 * @param mixed $var Variable à afficher
 * @param string $name Nom de la variable (optionnel)
 * @param bool $now Si true, echo immédiatement
 */
function var2console($var, $name = '', $now = false) {
    if ($var === null) {
        $type = 'NULL';
    } elseif (is_bool($var)) {
        $type = $var ? 'true' : 'false';
    } elseif (is_string($var)) {
        $type = '"' . addslashes($var) . '"';
    } elseif (is_array($var) || is_object($var)) {
        $type = json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        $type = $var;
    }

    $label = $name ? $name . ': ' : '';
    $output = "<script>console.log('{$label}', {$type});</script>";

    if ($now) {
        echo $output;
    } else {
        add_action('wp_footer', function() use ($output) {
            echo $output;
        });
    }
}

/**
 * Affiche une string dans la console JavaScript
 * @param string $str String à afficher
 * @param bool $now Si true, echo immédiatement
 */
function str2console($str, $now = false) {
    $output = "<script>console.log('" . addslashes($str) . "');</script>";
    
    if ($now) {
        echo $output;
    } else {
        add_action('wp_footer', function() use ($output) {
            echo $output;
        });
    }
}
