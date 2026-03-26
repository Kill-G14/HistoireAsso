<?php
/**
 * Template Part: Button Primary (Gold solid)
 * Bouton principal avec fond gold
 */

$text = $args['text'] ?? 'En savoir plus';
$url = $args['url'] ?? '#';
$target = $args['target'] ?? '_self';
$class = $args['class'] ?? '';
?>

<a href="<?= esc_url($url); ?>" 
   target="<?= esc_attr($target); ?>" 
   class="btn btn-primary <?= esc_attr($class); ?>">
    <?= esc_html($text); ?>
</a>
