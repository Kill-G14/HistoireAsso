# Instructions WordPress + ACF - Architecture Modulaire Blavier

Ce fichier documente les techniques, méthodologies et patterns utilisés dans le projet WordPress Blavier avec Advanced Custom Fields Pro. Ces instructions permettent de reproduire la même logique sur d'autres projets.

---

## 🏗️ Architecture Générale

### Structure des Dossiers du Thème

```
wp-content/themes/mon-theme/
├── assets/
│   └── images/
├── css/
│   ├── general.css
│   ├── card.css
│   ├── carousel.css
│   ├── filtres-bien.css
│   └── page[Nom].css
├── JS/
│   ├── carousel.js
│   ├── filtres-bien.js
│   ├── navbar.js
│   └── faq.js
├── inc/
│   ├── fct_cpt.php              // Custom Post Types
│   ├── fct_taxonomy.php         // Taxonomies personnalisées
│   ├── fct_general.php          // Fonctions générales
│   ├── fct_debug.php            // Outils de debug
│   ├── fct_filtres_[type].php   // Filtres AJAX par CPT
│   └── fct_carousel.php         // Enqueue carousel
├── template-parts/
│   ├── nav.php
│   ├── banner.php
│   ├── accordeon.php
│   ├── button-a.php
│   ├── button-b.php
│   ├── builder/                 // Composants du flexible content
│   │   ├── card.php
│   │   ├── card-bien.php
│   │   ├── card-blog.php
│   │   ├── card-modele-inspiration.php
│   │   ├── cta.php
│   │   ├── text_simple.php
│   │   ├── text_image.php
│   │   ├── text_simple_double_colonne.php
│   │   ├── dernier_arcticle.php
│   │   └── list_event.php
│   ├── cards/
│   ├── filtres-bien.php
│   └── filtres-modele-inspiration.php
├── header.php
├── footer.php
├── functions.php
├── page.php
├── page-[template-name].php     // Templates de pages spécifiques
├── single.php
├── single-[cpt].php              // Singles spécifiques aux CPT
├── archive-[cpt].php             // Archives avec filtres
├── category.php
├── tag.php
├── taxonomy.php
├── 404.php
└── style.css
```

---

## 🧩 Système de Builder Modulaire avec ACF Flexible Content

### Principe Fondamental

Le projet utilise un **champ ACF Flexible Content** nommé `builder` qui permet de construire des pages en empilant des composants réutilisables.

### Configuration ACF

1. **Créer un groupe de champs ACF** :
   - Nom : "Page Builder"
   - Emplacement : Type de contenu = Page (ou CPT souhaité)

2. **Ajouter un champ Flexible Content** :
   - Nom du champ : `builder`
   - Type : Flexible Content
   - Layouts disponibles :
     - `cta` : Call-to-action
     - `text_simple` : Bloc de texte simple
     - `text_image` : Texte + Image
     - `text_simple_double_colonne` : Texte sur deux colonnes
     - `card` : Carte événement/produit
     - `card-bien` : Carte bien immobilier
     - `card-blog` : Carte article de blog
     - `dernier_arcticle` : Liste des derniers articles
     - `list_event` : Liste d'événements

### Template de Page Générique (page.php)

```php
<?php get_header();

$builder = get_field('builder');

?>

<body <?php body_class(); ?>>
    <?php
    get_template_part('template-parts/nav');
    get_template_part('template-parts/banner', null, array(
        'custom_title' => $title
    ));

    if (!empty($builder)) {
        foreach ($builder as $section) {
            get_template_part('template-parts/builder/' . $section['acf_fc_layout'], null, $section);
        }
    }
    ?>

    <div class="container">
        <div class="prose"><?php the_content() ?></div>
    </div>
</body>

<?php get_footer(); ?>
```

**Principe** :

- Récupérer le champ `builder` avec `get_field('builder')`
- Boucler sur chaque section
- Utiliser `get_template_part()` pour charger le composant correspondant
- Le nom du layout (`acf_fc_layout`) correspond au nom du fichier dans `template-parts/builder/`
- Passer `$section` comme `$args` au template part

### Création d'un Composant Builder

**Exemple : template-parts/builder/cta.php**

```php
<section class="cta">
    <h2><?= $args['title']; ?></h2>
    <p><?= $args['subtitle']; ?></p>
    <a href="<?= $args['link']['url']; ?>"><?= $args['link']['title']; ?></a>
    <hr>
</section>
```

**Exemple : template-parts/builder/text_image.php**

```php
<section class="text-image" style="background: <?= $args['color'] ?>;">
    <div class="container1200px">
        <h2><?= $args['title']; ?></h2>
        <div class="text-image-content">
            <div class="text-image-text"><?= $args['text']; ?></div>
            <img src="<?= $args['image']['url']; ?>" style="width: 400px; height: 275px; object-fit: cover;">
        </div>
        <hr>
    </div>
</section>
```

**Règles** :

- Récupérer les données via `$args['champ_acf']`
- Chaque composant est autonome et réutilisable
- Utiliser des classes CSS préfixées par le nom du composant
- Toujours échapper les données avec `esc_html()`, `esc_url()`, etc.

---

## 📦 Gestion Avancée des Cards avec Grid Conditionnelle

Pour certains layouts (comme FAQ ou Garanties), les cards doivent être affichées en grille, mais seulement quand elles sont consécutives.

### Template avec Grid Conditionnelle

```php
<?php
$builder = get_field('builder');

if (!empty($builder)):
    $card_grid_open = false;

    foreach ($builder as $section):

        // Si c'est une card et que le grid n'est pas ouvert
        if ($section['acf_fc_layout'] == 'card') {
            if (!$card_grid_open) {
                echo '<div class="card-grid" itemscope itemtype="https://schema.org/Event">';
                $card_grid_open = true;
            }
            get_template_part('template-parts/builder/card', null, $section);
        }
        // Si ce n'est pas une card mais que le grid est ouvert
        else {
            if ($card_grid_open) {
                echo '</div>'; // Fermer le grid
                $card_grid_open = false;
            }

            // Afficher les autres composants normalement
            if ($section['acf_fc_layout'] == 'cta') {
                get_template_part('template-parts/builder/cta', null, $section);
            }
            if ($section['acf_fc_layout'] == 'text_simple') {
                get_template_part('template-parts/builder/text_simple', null, $section);
            }
            // ... autres layouts
        }

    endforeach;

    // Fermer le grid s'il est encore ouvert à la fin
    if ($card_grid_open) {
        echo '</div>';
    }

endif;
?>
```

---

## 📝 Custom Post Types & Taxonomies

### Organisation des Fichiers

**inc/fct_taxonomy.php** : Regroupe tous les CPT et leurs taxonomies

### Déclaration d'un Custom Post Type

```php
add_action('init', 'register_bien_post_type');

function register_bien_post_type() {
    register_post_type('bien', [
        'labels' => [
            'name'               => 'Biens en vente',
            'singular_name'      => 'Bien en vente',
            'add_new'            => 'Ajouter un bien',
            'add_new_item'       => 'Ajouter un nouveau bien',
            'edit_item'          => 'Modifier le bien',
            'view_item'          => 'Voir le bien',
            'all_items'          => 'Tous les biens',
            'search_items'       => 'Rechercher un bien',
            'not_found'          => 'Aucun bien trouvé',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'biens-en-vente'],
        'supports'     => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,  // Support Gutenberg
        'menu_icon'    => 'dashicons-building',
    ]);
}
```

### Déclaration des Taxonomies Associées

```php
add_action('init', 'register_bien_taxonomies');

function register_bien_taxonomies() {
    // Taxonomie hiérarchique (comme catégorie)
    register_taxonomy('region', 'bien', [
        'labels' => [
            'name'              => 'Régions',
            'singular_name'     => 'Région',
            'search_items'      => 'Rechercher une région',
            'all_items'         => 'Toutes les régions',
            'parent_item'       => 'Région parente',
            'parent_item_colon' => 'Région parente :',
            'edit_item'         => 'Modifier la région',
            'update_item'       => 'Mettre à jour la région',
            'add_new_item'      => 'Ajouter une nouvelle région',
            'new_item_name'     => 'Nom de la nouvelle région',
            'menu_name'         => 'Régions',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'region'],
        'show_in_rest'      => true,
    ]);

    register_taxonomy('type_bien', 'bien', [
        // ... même configuration
        'rewrite' => ['slug' => 'type-bien'],
    ]);
}
```

**Règles** :

- Un fichier par logique métier
- Grouper CPT + taxonomies associées
- Toujours ajouter `show_in_rest => true` pour Gutenberg
- Nommer les taxonomies de façon descriptive

---

## 🔍 Système de Filtres AJAX

### Architecture du Système de Filtres

Chaque CPT avec filtres possède :

1. Un fichier de fonctions : `inc/fct_filtres_[cpt].php`
2. Un template de filtres : `template-parts/filtres-[cpt].php`
3. Un JS dédié : `JS/filtres-[cpt].js`
4. Un CSS dédié : `css/filtres-[cpt].css`

### 1. Fichier de Fonctions (inc/fct_filtres_bien.php)

```php
<?php
// Enqueue conditionnel des scripts
function enqueue_filtres_bien_scripts() {
    if (is_post_type_archive('bien')) {
        wp_enqueue_style(
            'filtres-bien-css',
            get_template_directory_uri() . '/css/filtres-bien.css',
            array(),
            '1.0.0'
        );

        wp_enqueue_script(
            'filtres-bien',
            get_template_directory_uri() . '/JS/filtres-bien.js',
            array(),
            '1.0.0',
            true
        );

        // Passer les variables AJAX au JavaScript
        wp_localize_script('filtres-bien', 'ajax_params', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('filtres_bien_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_filtres_bien_scripts');

// Handlers AJAX
add_action('wp_ajax_filtrer_biens', 'ajax_filtrer_biens');
add_action('wp_ajax_nopriv_filtrer_biens', 'ajax_filtrer_biens');

function ajax_filtrer_biens() {
    // Vérifier le nonce
    check_ajax_referer('filtres_bien_nonce', 'nonce');

    // Récupérer et sanitizer les paramètres
    $region = isset($_POST['region']) ? sanitize_text_field($_POST['region']) : '';
    $type_bien = isset($_POST['type_bien']) ? sanitize_text_field($_POST['type_bien']) : '';
    $prix = isset($_POST['prix']) ? sanitize_text_field($_POST['prix']) : '';

    // Construire la requête WP_Query
    $args = array(
        'post_type' => 'bien',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    // Filtrer par taxonomies
    $tax_query = array('relation' => 'AND');

    if (!empty($region)) {
        $tax_query[] = array(
            'taxonomy' => 'region',
            'field'    => 'slug',
            'terms'    => $region,
        );
    }

    if (!empty($type_bien)) {
        $tax_query[] = array(
            'taxonomy' => 'type_bien',
            'field'    => 'slug',
            'terms'    => $type_bien,
        );
    }

    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    }

    // Filtrer par meta (prix)
    if (!empty($prix)) {
        $prix_range = explode('-', $prix);

        $meta_query = array();

        if (count($prix_range) == 2) {
            $prix_min = intval($prix_range[0]);
            $prix_max = intval($prix_range[1]);

            $meta_query[] = array(
                'key'     => 'prix',
                'value'   => array($prix_min, $prix_max),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            );
        } elseif (strpos($prix, '+') !== false) {
            $prix_min = intval(str_replace('+', '', $prix));

            $meta_query[] = array(
                'key'     => 'prix',
                'value'   => $prix_min,
                'type'    => 'NUMERIC',
                'compare' => '>=',
            );
        }

        if (!empty($meta_query)) {
            $args['meta_query'] = $meta_query;
        }
    }

    // Exécuter la requête
    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/builder/card-bien');
        }
        wp_reset_postdata();

        $html = ob_get_clean();
        wp_send_json_success(array('html' => $html, 'count' => $query->found_posts));
    } else {
        ob_get_clean();
        wp_send_json_error(array('message' => 'Aucun bien trouvé.'));
    }
}
```

### 2. Archive avec Filtres (archive-bien.php)

```php
<?php get_header(); ?>

<body <?php body_class(); ?>>
    <main>
        <header class="banner">
            <h1>Nos Biens en Vente</h1>
        </header>

        <div class="container">
            <!-- Filtres -->
            <?php get_template_part('template-parts/filtres-bien'); ?>

            <!-- Conteneur des résultats -->
            <div id="resultats-biens" class="biens-grid">
                <?php
                // Affichage initial (peut aussi inclure les filtres GET)
                $args = array(
                    'post_type' => 'bien',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/builder/card-bien');
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun bien trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

<?php get_footer(); ?>
```

### 3. JavaScript des Filtres (JS/filtres-bien.js)

```javascript
jQuery(document).ready(function ($) {
  $("#filtres-form").on("submit", function (e) {
    e.preventDefault();

    var region = $("#filtre-region").val();
    var type_bien = $("#filtre-type").val();
    var prix = $("#filtre-prix").val();

    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "filtrer_biens",
        nonce: ajax_params.nonce,
        region: region,
        type_bien: type_bien,
        prix: prix,
      },
      beforeSend: function () {
        $("#resultats-biens").html("<p>Chargement...</p>");
      },
      success: function (response) {
        if (response.success) {
          $("#resultats-biens").html(response.data.html);
          $("#count-resultats").text(response.data.count + " résultats");
        } else {
          $("#resultats-biens").html("<p>" + response.data.message + "</p>");
        }
      },
      error: function () {
        $("#resultats-biens").html("<p>Erreur lors du chargement.</p>");
      },
    });
  });
});
```

**Principes Clés** :

- **Sécurité** : Toujours utiliser nonce et sanitize les données
- **Enqueue Conditionnel** : Charger JS/CSS uniquement sur les pages nécessaires
- **WP_Query Dynamique** : Construire les arguments selon les filtres
- **Output Buffering** : Utiliser `ob_start()` pour capturer le HTML
- **Response Standard** : `wp_send_json_success()` et `wp_send_json_error()`

---

## 🎴 Système de Cards avec Carousel

### 1. Enqueue Conditionnel du Carousel (inc/fct_carousel.php)

```php
<?php
function enqueue_carousel_scripts() {
    if (is_post_type_archive('bien') || is_post_type_archive('modele_inspiration')) {
        wp_enqueue_style(
            'carousel-css',
            get_template_directory_uri() . '/css/carousel.css',
            array(),
            '1.0.0'
        );

        wp_enqueue_script(
            'carousel-js',
            get_template_directory_uri() . '/JS/carousel.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_carousel_scripts');
```

### 2. Template de Card avec Carousel (template-parts/builder/card-bien.php)

```php
<?php
// Récupérer les données
$gallery = get_field('galerie');
$prix = get_field('prix');
$adresse = get_field('adresse');
$chambres = get_field('chambres');

// Préparer les images
$images = array();
if ($gallery) {
    foreach ($gallery as $image) {
        $images[] = array(
            'url' => $image['url'],
            'alt' => $image['alt'] ? $image['alt'] : get_the_title()
        );
    }
} elseif (has_post_thumbnail()) {
    $images[] = array(
        'url' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'alt' => get_the_title()
    );
}
?>

<article class="card-highlight">
    <!-- Titre -->
    <div class="card-header">
        <h4><?= get_the_title(); ?></h4>
        <?php if ($prix) : ?>
            <span class="card-subtitle">
                <?= number_format($prix, 0, ',', ' '); ?> €
            </span>
        <?php endif; ?>
    </div>

    <!-- Carousel d'images -->
    <div class="card-image-container">
        <div data-type="carousel">
            <?php foreach ($images as $image) : ?>
                <img src="<?= $image['url']; ?>"
                     alt="<?= $image['alt']; ?>"
                     class="card-carousel-image">
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Informations -->
    <div class="card-content">
        <?php if ($adresse) : ?>
            <div class="card-location-row">
                <svg><!-- Icône map --></svg>
                <p><?= $adresse; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($chambres) : ?>
            <div>Chambres : <?= $chambres; ?></div>
        <?php endif; ?>

        <a class="btn" href="<?= get_permalink(); ?>">
            Voir le bien
        </a>
    </div>
</article>
```

**Principes** :

- Récupérer le champ galerie ACF
- Fallback sur featured image si pas de galerie
- Attribut `data-type="carousel"` pour ciblage JS
- Toujours fournir un alt pour l'accessibilité

---

## ⚙️ ACF Options Page

### Configuration (inc/fct_cpt.php)

```php
<?php
add_action('acf/init', function() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page();
    }
});
```

### Utilisation dans les Templates

**footer.php** :

```php
<?php
$cta_catalogue = get_field('cta_catalogue', 'option');
$reseaux = get_field('reseaux', 'option');
$cta_hidden = get_field('cta_hidden');
?>

<footer>
    <?php if ($cta_catalogue && !$cta_hidden) : ?>
        <div class="footer-cta">
            <h2><?php echo esc_html($cta_catalogue['title']); ?></h2>
            <span><?php echo esc_html($cta_catalogue['subtitle']); ?></span>
            <a href="<?php echo esc_url($cta_catalogue['url']); ?>" class="btn">
                <?php echo esc_html($cta_catalogue['title']); ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($reseaux) : ?>
        <ul class="footer-socials">
            <?php if ($reseaux['facebook']) : ?>
                <li><a href="<?php echo esc_url($reseaux['facebook']); ?>" target="_blank">Facebook</a></li>
            <?php endif; ?>
            <?php if ($reseaux['instagram']) : ?>
                <li><a href="<?php echo esc_url($reseaux['instagram']); ?>" target="_blank">Instagram</a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</footer>
```

**Utilisation** :

- `get_field('nom_champ', 'option')` pour récupérer un champ global
- Idéal pour : CTA globaux, réseaux sociaux, infos de contact, paramètres du site

---

## 📄 Templates de Pages Personnalisés

### Template Name dans un Fichier

**page-faq.php** :

```php
<?php
/*
 * Template Name: Page FAQ
 */

get_header();

$listeFaq = get_field('liste_de_faq');
$builder = get_field('builder');
?>

<body <?php body_class(); ?>>
    <?php
    get_template_part('template-parts/nav');

    $title = '<span class="title-notre">Notre</span> ' . get_the_title();
    $subtitle = '<a href="' . home_url('/') . '">Home</a> » FAQ';

    get_template_part('template-parts/banner', null, array(
        'custom_title' => $title,
        'custom_subtitle' => $subtitle
    ));
    ?>

    <!-- Contenu spécifique FAQ -->
    <div class="faq-wrapper">
        <?php if ($listeFaq): ?>
            <?php foreach ($listeFaq as $faq): ?>
                <div class="faq-item">
                    <h3><?= $faq['question']; ?></h3>
                    <div><?= $faq['reponse']; ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Builder sections -->
    <?php if (!empty($builder)): ?>
        <!-- Affichage du builder comme précédemment -->
    <?php endif; ?>
</body>

<?php get_footer(); ?>
```

---

## 🧱 Template Parts & Composants Réutilisables

### Banner avec Arguments (template-parts/banner.php)

```php
<header class="banner">
    <?php
    $custom_title = '';
    $custom_subtitle = '';

    if (isset($args['custom_title'])) {
        $custom_title = $args['custom_title'];
    }

    if (isset($args['custom_subtitle'])) {
        $custom_subtitle = $args['custom_subtitle'];
    }

    if (!empty($custom_title)) {
        echo '<h1>' . $custom_title . '</h1>';
    } else {
        echo '<h1>' . get_the_title() . '</h1>';
    }

    if (!empty($custom_subtitle)) {
        echo '<div class="banner-subtitle">' . $custom_subtitle . '</div>';
    }
    ?>
</header>
```

**Appel** :

```php
get_template_part('template-parts/banner', null, array(
    'custom_title' => 'Mon Titre Personnalisé',
    'custom_subtitle' => 'Mon Sous-titre'
));
```

---

## 🛠️ Outils de Développement

### Fonctions de Debug (inc/fct_debug.php)

```php
<?php
function var2console($var, $name = '', $now = false) {
    if ($var === null)       $type = 'NULL';
    else if (is_bool($var))  $type = 'BOOL';
    else if (is_string($var)) $type = 'STRING[' . strlen($var) . ']';
    else if (is_int($var))    $type = 'INT';
    else if (is_float($var))  $type = 'FLOAT';
    else if (is_array($var))  $type = 'ARRAY[' . count($var) . ']';
    else if (is_object($var)) $type = 'OBJECT';
    else                     $type = '???';

    if (strlen($name)) {
        str2console("$type $name = " . var_export($var, true) . ';', $now);
    } else {
        str2console("$type = " . var_export($var, true) . ';', $now);
    }
}

function str2console($str, $now = false) {
    if ($now) {
        echo "<script type='text/javascript'>\n";
        echo "console.log(", json_encode($str), ");\n";
        echo "</script>";
    } else {
        register_shutdown_function('str2console', $str, true);
    }
}
```

**Utilisation** :

```php
$data = get_field('mon_champ');
var2console($data, 'Mon Champ ACF');
```

---

## 📋 Checklist de Création d'un Nouveau Projet

### 1. Installation de Base

- [ ] Installer WordPress
- [ ] Installer ACF Pro
- [ ] Créer le thème personnalisé

### 2. Structure des Fichiers

- [ ] Créer la structure de dossiers (css/, JS/, inc/, template-parts/, template-parts/builder/, assets/)
- [ ] Créer functions.php avec les includes
- [ ] Créer header.php et footer.php
- [ ] Créer page.php (template de base)
- [ ] Créer style.css

### 3. Configuration ACF

- [ ] Ajouter ACF Options Page (inc/fct_cpt.php)
- [ ] Créer le groupe de champs "Page Builder" avec Flexible Content
- [ ] Créer les layouts de base (cta, text_simple, text_image, card)

### 4. Custom Post Types

- [ ] Créer inc/fct_taxonomy.php
- [ ] Déclarer les CPT nécessaires
- [ ] Déclarer les taxonomies associées
- [ ] Créer les groupes de champs ACF pour chaque CPT
- [ ] Créer single-[cpt].php pour chaque CPT
- [ ] Créer archive-[cpt].php pour chaque CPT

### 5. Composants Builder

Pour chaque Layout ACF :

- [ ] Configurer les champs dans ACF
- [ ] Créer le fichier template-parts/builder/[layout].php
- [ ] Créer le CSS associé (optionnel)
- [ ] Tester l'affichage

### 6. Filtres AJAX (si nécessaire)

Pour chaque CPT avec filtres :

- [ ] Créer inc/fct*filtres*[cpt].php
- [ ] Créer template-parts/filtres-[cpt].php
- [ ] Créer JS/filtres-[cpt].js
- [ ] Créer css/filtres-[cpt].css
- [ ] Ajouter les handlers AJAX
- [ ] Implémenter dans archive-[cpt].php

### 7. Templates Parts Communs

- [ ] template-parts/nav.php
- [ ] template-parts/banner.php
- [ ] template-parts/button-a.php
- [ ] template-parts/button-b.php

### 8. Fonctionnalités Générales

- [ ] inc/fct_general.php (support thumbnails, menus, fonts)
- [ ] inc/fct_debug.php (fonctions de debug)
- [ ] Enqueue des styles et scripts

### 9. Options du Site

Dans ACF Options :

- [ ] Groupe "Général" : Logo, nom du site
- [ ] Groupe "Réseaux sociaux" : Facebook, Instagram, Twitter, LinkedIn
- [ ] Groupe "CTA Catalogue" : Titre, sous-titre, lien
- [ ] Groupe "Footer" : Texte, liens, mentions légales

### 10. Tests & Optimisation

- [ ] Tester tous les templates
- [ ] Vérifier la responsivité
- [ ] Tester les filtres AJAX
- [ ] Optimiser les images
- [ ] Vérifier la sécurité (nonces, sanitization)

---

## 🎯 Principes de Code à Respecter

### Sécurité

1. **Toujours échapper les sorties** :

   ```php
   echo esc_html($texte);
   echo esc_url($url);
   echo esc_attr($attribut);
   ```

2. **Sanitize les entrées** :

   ```php
   $valeur = sanitize_text_field($_POST['champ']);
   $email = sanitize_email($_POST['email']);
   ```

3. **Utiliser des Nonces pour AJAX** :
   ```php
   check_ajax_referer('mon_nonce', 'nonce');
   ```

### Organisation

1. **Un fichier = Une responsabilité**
2. **Préfixer les fonctions** : `blavier_nom_fonction()`
3. **Commentaires clairs** : Documenter les fonctions complexes
4. **Nommage cohérent** : `fct_[fonctionnalite].php`, `card-[type].php`

### Performance

1. **Enqueue conditionnel** : Charger les scripts uniquement où nécessaire
2. **Lazy loading** : Différer les images hors viewport
3. **Minification** : Minifier CSS et JS en production
4. **Caching** : Utiliser les transients WordPress pour les requêtes coûteuses

### Accessibilité

1. **Attributs alt sur images**
2. **Aria labels sur boutons/liens**
3. **Structure sémantique** : header, main, footer, article, section
4. **Navigation au clavier** : Tous les éléments interactifs doivent être accessibles

---

## 🔄 Workflow de Développement

### Ajout d'un Nouveau Composant Builder

1. **Dans ACF** : Ajouter un nouveau layout au Flexible Content "builder"
2. **Configurer les champs** : Titre, texte, image, lien, etc.
3. **Créer le template** : `template-parts/builder/mon-composant.php`
4. **Développer le HTML/PHP** : Récupérer les données via `$args`
5. **CSS** : Créer `css/mon-composant.css` ou ajouter dans `general.css`
6. **Tester** : Créer une page test et ajouter le composant

### Ajout d'un Nouveau CPT

1. **Dans inc/fct_taxonomy.php** : Déclarer le CPT et ses taxonomies
2. **Dans ACF** : Créer le groupe de champs pour ce CPT
3. **Créer single-[cpt].php** : Template de détail
4. **Créer archive-[cpt].php** : Template de liste
5. **Card** : Créer `template-parts/builder/card-[cpt].php`
6. **Filtres (optionnel)** :
   - `inc/fct_filtres_[cpt].php`
   - `template-parts/filtres-[cpt].php`
   - `JS/filtres-[cpt].js`
   - `css/filtres-[cpt].css`

---

## 📚 Ressources & Documentation

### ACF Documentation

- [ACF Flexible Content](https://www.advancedcustomfields.com/resources/flexible-content/)
- [ACF Options Page](https://www.advancedcustomfields.com/resources/options-page/)
- [ACF get_field()](https://www.advancedcustomfields.com/resources/get_field/)

### WordPress Codex

- [register_post_type()](https://developer.wordpress.org/reference/functions/register_post_type/)
- [register_taxonomy()](https://developer.wordpress.org/reference/functions/register_taxonomy/)
- [WP_Query](https://developer.wordpress.org/reference/classes/wp_query/)
- [get_template_part()](https://developer.wordpress.org/reference/functions/get_template_part/)

### Hooks WordPress

- `wp_enqueue_scripts` : Enqueue CSS/JS frontend
- `init` : Enregistrer CPT et taxonomies
- `acf/init` : Hook spécifique ACF
- `wp_ajax_[action]` : Handler AJAX connecté
- `wp_ajax_nopriv_[action]` : Handler AJAX non-connecté

---

## 🚀 Améliorations Possibles

### Performance

- Implémenter un système de cache pour les requêtes complexes
- Lazy loading des images
- CDN pour les assets statiques

### Fonctionnalités

- Système de recherche globale
- Filtres sauvegardés dans l'URL
- Pagination AJAX
- Système de favoris
- Comparateur de biens

### SEO

- Breadcrumbs automatiques
- Schema.org markup complet
- Sitemap XML
- Open Graph tags

### UX

- Loading states sur filtres AJAX
- Animations de transition
- Skeleton screens
- Messages d'erreur informatifs

---

## 📝 Notes Importantes

### Conventions de Nommage

| Élément       | Convention                 | Exemple                    |
| ------------- | -------------------------- | -------------------------- |
| Fichier inc/  | `fct_[fonctionnalite].php` | `fct_filtres_bien.php`     |
| Template Part | `[nom]-[type].php`         | `card-bien.php`            |
| CPT           | snake_case                 | `modele_inspiration`       |
| Taxonomie     | snake_case                 | `type_bien`                |
| Champ ACF     | snake_case                 | `galerie_images`           |
| Fonction PHP  | prefix_nom                 | `blavier_register_menus()` |
| Hook AJAX     | prefixe_action             | `filtrer_biens`            |
| Class CSS     | kebab-case                 | `.card-highlight`          |
| ID CSS        | kebab-case                 | `#resultats-biens`         |

### Points d'Attention

1. **Toujours faire `wp_reset_postdata()`** après une WP_Query personnalisée
2. **Vérifier l'existence des champs ACF** avant de les afficher
3. **Utiliser `get_template_directory_uri()`** pour les chemins d'assets
4. **Ne pas oublier `body_class()`** dans le tag body
5. **Appeler `wp_head()` avant `</head>`** et `wp_footer()` avant `</body>`

---

## 🎨 Structure CSS Recommandée

```css
/* === VARIABLES === */
:root {
    --color-primary: #...;
    --color-secondary: #...;
    --font-main: 'Montserrat', sans-serif;
    --container-width: 1200px;
}

/* === RESET & BASE === */
* { box-sizing: border-box; }

/* === LAYOUT === */
.container { max-width: var(--container-width); margin: 0 auto; }
.container1200px { max-width: 1200px; margin: 0 auto; }

/* === COMPOSANTS === */
.card-highlight { ... }
.cta { ... }
.banner { ... }

/* === UTILITAIRES === */
.btn { ... }
.prose { ... }

/* === RESPONSIVE === */
@media (max-width: 768px) { ... }
```

---

## ✅ Validation Finale

Avant de livrer un projet :

- [ ] Toutes les données sont échappées/sanitizées
- [ ] Tous les nonces AJAX sont vérifiés
- [ ] Pas d'erreurs PHP (en mode `WP_DEBUG`)
- [ ] Tous les assets sont enqueued correctement
- [ ] Le thème fonctionne sans ACF (graceful degradation)
- [ ] Le code est commenté et organisé
- [ ] Les images sont optimisées
- [ ] Le site est responsive
- [ ] Les formulaires sont sécurisés
- [ ] La navigation fonctionne au clavier
- [ ] Le HTML est valide (W3C validator)

---

**Créé le** : Mars 2026  
**Projet de référence** : Blavier Themes  
**Version** : 1.0

---

_Ce document doit être mis à jour à chaque ajout de pattern ou technique significative au projet._
