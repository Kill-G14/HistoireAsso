<?php
/**
 * Template Part: Button Secondary (Ghost style)
 * Bouton secondaire avec bordure ghost
 */

$text = $args['text'] ?? 'Découvrir';
$url = $args['url'] ?? '#';
$target = $args['target'] ?? '_self';
$class = $args['class'] ?? '';
?>

<a href="<?= esc_url($url); ?>" 
   target="<?= esc_attr($target); ?>" 
   class="btn btn-secondary <?= esc_attr($class); ?>">
    <?= esc_html($text); ?>
</a>
