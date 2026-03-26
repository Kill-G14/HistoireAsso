# AGENTS.md — Guide Directeur du Projet Histoire Association

**Date de création** : 26 mars 2026  
**Projet** : Site WordPress pour Histoire Association (Reconstitution historique - Tournai)  
**Thème** : histoireAsso  
**Stack technique** : WordPress 6.x + Advanced Custom Fields Pro

---

## 🎯 Vision du Projet

Créer un site web sophistiqué pour une association d'histoire locale qui évoque l'expérience d'une **exposition muséale curatoriale**. Le design system "Digital Archivist" guide chaque décision visuelle et technique.

### Philosophie Esthétique : "Digital Archivist"

- **Pas de kitsch médiéval** (parchemins, sceaux de cire)
- **Sophistication moderne** avec gravitas historique
- **Asymétrie intentionnelle**, profondeur en couches, espace négatif
- **Photographie de haute qualité** comme langage visuel principal

---

## 🎨 Design System — Tokens Principaux

### Palette de Couleurs

```css
--background: #131313; /* Obsidian - fond principal */
--primary: #fff4e0; /* Parchment - texte principal */
--primary-container: #ffd45a; /* Refined Gold - CTA, accents */
--secondary: #ffb4a8; /* Rose pâle */
--secondary-container: #920703; /* Deep Madder - alertes */
--surface: #1c1c1c;
--surface-container-low: #1a1a1a;
--surface-container-highest: #2e2e2e;
--surface-bright: #393939;
--outline-variant: #ffd45a; /* 15-20% opacity pour ghost borders */
```

### Typographie

- **Serif (Headlines)** : Noto Serif — `font-family: 'Noto Serif', serif;`
- **Sans-Serif (Body)** : Work Sans — `font-family: 'Work Sans', sans-serif;`

### Règles de Layout

1. **Interdiction absolue** des bordures 1px solides — utiliser les changements de couleur de fond
2. **Glassmorphisme** pour navigation/modales : `backdrop-blur: 12-20px`, `opacity: 60%`
3. **Espacement généreux** : 2rem (8) à 3rem (12) entre sections
4. **Ombres diffusées** : `box-shadow: 0 20px 40px rgba(0,0,0, 0.4);`

---

## 📐 Architecture Technique WordPress

### Structure des Dossiers

```
wp-content/themes/histoireAsso/
├── assets/images/          # Placeholders et assets statiques
├── css/                    # Stylesheets modulaires
│   ├── general.css         # Reset + tokens design system
│   ├── card.css            # Styles cards universels
│   ├── carousel.css        # Artifact Carousel
│   ├── filtres-event.css   # Filtres événements
│   ├── page-news.css       # Page actualités
│   ├── page-events.css     # Page événements
│   ├── page-contact.css    # Page contact
│   └── page-rejoindre.css  # Page rejoindre
├── JS/                     # Scripts modulaires
│   ├── carousel.js         # Carousel Artifact
│   ├── filtres-event.js    # Filtres AJAX événements
│   └── navbar.js           # Navigation glassmorphisme
├── inc/                    # Fonctions PHP modulaires
│   ├── fct_cpt.php         # Custom Post Types + ACF Options
│   ├── fct_taxonomy.php    # Taxonomies personnalisées
│   ├── fct_general.php     # Enqueue scripts/styles généraux
│   ├── fct_debug.php       # var2console, str2console
│   ├── fct_filtres_event.php  # Filtres AJAX événements
│   └── fct_carousel.php    # Enqueue carousel conditionnel
├── template-parts/         # Composants réutilisables
│   ├── nav.php             # TopAppBar avec glassmorphisme
│   ├── banner.php          # Hero banner pages internes
│   ├── button-a.php        # Bouton Primary (Gold solid)
│   ├── button-b.php        # Bouton Secondary (Ghost)
│   ├── builder/            # Composants ACF Flexible Content
│   │   ├── cta.php
│   │   ├── text_simple.php
│   │   ├── text_image.php
│   │   ├── text_simple_double_colonne.php
│   │   ├── card.php
│   │   ├── card-event.php
│   │   ├── card-news.php
│   │   ├── dernier_article.php
│   │   └── list_event.php
│   └── filtres-event.php   # Template filtres événements
├── header.php              # <head> + ouverture body
├── footer.php              # Footer + CTA global
├── functions.php           # Point d'entrée (includes inc/)
├── page.php                # Template page générique avec builder
├── page-contact.php        # Template Contact (formulaire + carte)
├── page-rejoindre.php      # Template Rejoindre (formulaire inscription)
├── single.php              # Single post standard
├── single-event.php        # Single événement
├── single-news.php         # Single actualité
├── archive-event.php       # Archive événements avec filtres
├── archive-news.php        # Archive actualités
├── 404.php                 # Page erreur
└── style.css               # Stylesheet principal WordPress
```

---

## 🔧 Custom Post Types (CPT)

### 1. CPT `event` (Événements)

**Slug** : `event`  
**Labels** : Événement / Événements  
**Supports** : `title`, `editor`, `thumbnail`, `excerpt`  
**Taxonomies associées** :

- `era` (Ère historique) : hiérarchique
  - Gallo-Romain
  - Moyen-Âge
  - Renaissance
  - XVIIIe siècle
  - XIXe siècle

**Champs ACF** :

- `date_event` (Date Picker)
- `lieu` (Text)
- `description_longue` (Wysiwyg)
- `galerie` (Gallery)

### 2. CPT `news` (Actualités)

**Slug** : `news`  
**Labels** : Actualité / Actualités  
**Supports** : `title`, `editor`, `thumbnail`, `excerpt`, `author`, `comments`  
**Taxonomies associées** :

- `news_category` (Catégorie d'actualité) : hiérarchique
  - Découvertes archéologiques
  - Événements passés
  - Partenariats
  - Vie de l'association

**Champs ACF** :

- `date_publication` (Date Picker)
- `auteur_article` (User)
- `galerie` (Gallery)

---

## 🧩 ACF Configuration

### 1. ACF Options Page

**Nom** : Options du Site  
**Menu slug** : `site-options`  
**Champs globaux** :

- `cta_catalogue` (Group)
  - `titre` (Text)
  - `texte` (Textarea)
  - `lien` (Link)
- `reseaux` (Repeater)
  - `reseau` (Select: Facebook, Instagram, YouTube)
  - `url` (URL)
- `adresse_association` (Text)
- `email_contact` (Email)
- `telephone` (Text)

### 2. Groupe de Champs : Page Builder

**Emplacement** : Type de contenu = Page  
**Champ principal** : `builder` (Flexible Content)

**Layouts disponibles** :

1. **CTA** (`cta`)
   - `title` (Text)
   - `subtitle` (Textarea)
   - `lien` (Link)
   - `background_color` (Color Picker)

2. **Texte Simple** (`text_simple`)
   - `title` (Text)
   - `contenu` (Wysiwyg)

3. **Texte + Image** (`text_image`)
   - `title` (Text)
   - `contenu` (Wysiwyg)
   - `image` (Image)
   - `image_position` (Radio: gauche/droite)
   - `background_color` (Color Picker)

4. **Texte Double Colonne** (`text_simple_double_colonne`)
   - `title` (Text)
   - `colonne_gauche` (Wysiwyg)
   - `colonne_droite` (Wysiwyg)

5. **Card Générique** (`card`)
   - Utilise les champs du post courant

6. **Liste Événements** (`list_event`)
   - `nombre` (Number)
   - `filtrer_par_ere` (Taxonomy: era)

7. **Derniers Articles** (`dernier_article`)
   - `nombre` (Number)

---

## 📋 Pages du Site

### Pages Principales

| Page                    | Template             | Fonctionnalité                    |
| ----------------------- | -------------------- | --------------------------------- |
| Accueil                 | `front-page.php`     | Builder ACF + sections custom     |
| Toutes les infos        | `archive-news.php`   | Archive actualités (grid)         |
| Agenda des événements   | `archive-event.php`  | Archive événements + filtres AJAX |
| Rejoindre l'Association | `page-rejoindre.php` | Formulaire inscription            |
| Nous contacter          | `page-contact.php`   | Formulaire contact + carte        |
| Mentions Légales / RGPD | `page-mentions.php`  | Texte légal                       |
| Page générique          | `page.php`           | Builder ACF flexible              |
| Single événement        | `single-event.php`   | Détail événement                  |
| Single actualité        | `single-news.php`    | Détail actualité                  |
| 404                     | `404.php`            | Page erreur                       |

---

## 🚀 Roadmap de Développement

### Phase 1 : Fondations (SESSION EN COURS)

✅ **Étape 1.1** : Créer la structure de dossiers et fichiers vides
✅ **Étape 1.2** : Créer `functions.php` avec système d'includes
✅ **Étape 1.3** : Configurer les Custom Post Types (`event`, `news`)
✅ **Étape 1.4** : Configurer les Taxonomies (`era`, `news_category`)
✅ **Étape 1.5** : Créer `style.css` avec métadonnées du thème
✅ **Étape 1.6** : Créer `css/general.css` avec tokens design system
✅ **Étape 1.7** : Créer `fct_debug.php` (var2console)
✅ **Étape 1.8** : Créer `fct_general.php` (enqueue scripts/styles)

### Phase 2 : Header, Footer & Navigation

⏳ **Étape 2.1** : Créer `header.php` avec `<head>` WordPress
⏳ **Étape 2.2** : Créer `footer.php` avec CTA global et réseaux sociaux
⏳ **Étape 2.3** : Créer `template-parts/nav.php` (TopAppBar glassmorphisme)
⏳ **Étape 2.4** : Créer `JS/navbar.js` (comportement scroll)

### Phase 3 : Composants Réutilisables

⏳ **Étape 3.1** : Créer `template-parts/banner.php` (hero interne)
⏳ **Étape 3.2** : Créer `template-parts/button-a.php` (Primary Gold)
⏳ **Étape 3.3** : Créer `template-parts/button-b.php` (Secondary Ghost)
⏳ **Étape 3.4** : Créer `css/card.css` (styles cards universels)

### Phase 4 : Système Builder ACF

⏳ **Étape 4.1** : Créer `page.php` (template générique avec builder)
⏳ **Étape 4.2** : Créer composants builder :

- `builder/cta.php`
- `builder/text_simple.php`
- `builder/text_image.php`
- `builder/text_simple_double_colonne.php`
  ⏳ **Étape 4.3** : Créer `builder/card-event.php` avec carousel
  ⏳ **Étape 4.4** : Créer `builder/card-news.php`
  ⏳ **Étape 4.5** : Créer `builder/list_event.php`
  ⏳ **Étape 4.6** : Créer `builder/dernier_article.php`

### Phase 5 : Système Carousel

⏳ **Étape 5.1** : Créer `inc/fct_carousel.php` (enqueue conditionnel)
⏳ **Étape 5.2** : Créer `JS/carousel.js` (Swiper.js ou custom)
⏳ **Étape 5.3** : Créer `css/carousel.css` (Artifact Carousel style)

### Phase 6 : Page Événements + Filtres AJAX

⏳ **Étape 6.1** : Créer `archive-event.php` avec filtres
⏳ **Étape 6.2** : Créer `template-parts/filtres-event.php`
⏳ **Étape 6.3** : Créer `inc/fct_filtres_event.php` (handlers AJAX)
⏳ **Étape 6.4** : Créer `JS/filtres-event.js` (requêtes AJAX)
⏳ **Étape 6.5** : Créer `css/filtres-event.css` (style filtres)
⏳ **Étape 6.6** : Créer `single-event.php` (détail événement)

### Phase 7 : Page Actualités

⏳ **Étape 7.1** : Créer `archive-news.php` (grid d'actualités)
⏳ **Étape 7.2** : Créer `single-news.php` (détail actualité)
⏳ **Étape 7.3** : Créer `css/page-news.css`

### Phase 8 : Formulaires (Contact + Rejoindre)

⏳ **Étape 8.1** : Créer `page-contact.php` (formulaire + carte)
⏳ **Étape 8.2** : Créer `page-rejoindre.php` (formulaire inscription)
⏳ **Étape 8.3** : Créer `inc/fct_forms.php` (traitement formulaires)
⏳ **Étape 8.4** : Créer `css/page-contact.css`
⏳ **Étape 8.5** : Créer `css/page-rejoindre.css`

### Phase 9 : Finalisation

⏳ **Étape 9.1** : Créer `404.php` (page erreur)
⏳ **Étape 9.2** : Tests responsive (mobile, tablet)
⏳ **Étape 9.3** : Tests accessibilité (WCAG)
⏳ **Étape 9.4** : Optimisation performances

---

## ✅ Checklist Fonctionnalités Obligatoires (Projet WordPress)

| #   | Fonctionnalité          | Implémentation                                       | Statut |
| --- | ----------------------- | ---------------------------------------------------- | ------ |
| 1   | Menus de navigation     | `register_nav_menus()` + `template-parts/nav.php`    | ⏳     |
| 2   | Pages & page templates  | `page.php`, `page-contact.php`, `page-rejoindre.php` | ⏳     |
| 3   | Advanced Custom Fields  | ACF Options Page + Builder Flexible Content          | ⏳     |
| 4   | Formulaire de contact   | `page-contact.php` + traitement PHP/AJAX             | ⏳     |
| 5   | Custom Post Type (CPT)  | `event` et `news` dans `fct_cpt.php`                 | ⏳     |
| 6   | Taxonomie personnalisée | `era` et `news_category` dans `fct_taxonomy.php`     | ⏳     |

---

## 📄 Pages & Composants — Mapping PRD

### Page 1 : Toutes les infos (News)

**Fichier** : `archive-news.php`  
**Objectif** : Grille d'actualités style "Dernières Découvertes" homepage  
**Composants utilisés** :

- `template-parts/nav.php`
- `template-parts/banner.php` (titre "Toutes les infos")
- Grid de `card-news.php` (image haute qualité + titre + résumé)
- `footer.php`

**Données ACF sur CPT News** :

- Featured image (obligatoire)
- `date_publication`
- `auteur_article`
- `galerie` (optionnel)

---

### Page 2 : Agenda des événements (Events)

**Fichier** : `archive-event.php`  
**Objectif** : Liste élégante d'événements avec filtres par ère historique  
**Composants utilisés** :

- `template-parts/nav.php`
- `template-parts/banner.php` (titre "Agenda des événements")
- `template-parts/filtres-event.php` (chips ère historique)
- Grid de `card-event.php` (date, titre, lieu, image)
- `footer.php`

**Fonctionnalité AJAX** :

- Filtrer par taxonomie `era`
- Animation de transition des résultats

**Données ACF sur CPT Event** :

- Featured image (optionnel)
- `date_event` (Date Picker)
- `lieu` (Text)
- `description_longue` (Wysiwyg)
- `galerie` (Gallery pour carousel)

---

### Page 3 : Rejoindre l'Association

**Fichier** : `page-rejoindre.php`  
**Template Name** : `Rejoindre`  
**Objectif** : Layout asymétrique image/formulaire  
**Composants utilisés** :

- `template-parts/nav.php`
- Section hero avec grande image historique (gauche) + titre (droite)
- Formulaire d'inscription (nom, prénom, email, téléphone, motivation)
- `template-parts/button-a.php` (CTA "Envoyer ma candidature")
- `footer.php`

**Traitement formulaire** :

- Validation PHP
- Email de notification
- Stockage dans base de données (optionnel)

---

### Page 4 : Nous contacter

**Fichier** : `page-contact.php`  
**Template Name** : `Contact`  
**Objectif** : Split layout formulaire/carte  
**Composants utilisés** :

- `template-parts/nav.php`
- `template-parts/banner.php` (titre "Nous contacter")
- Section split 50/50 :
  - Gauche : Formulaire contact (nom, email, message)
  - Droite : Carte Google Maps (Tournai)
- Informations de contact (adresse, email, téléphone depuis ACF Options)
- `footer.php`

**Traitement formulaire** :

- Validation PHP
- Email vers `info@histoireassociation.be`
- Protection anti-spam (nonce)

---

## 🎨 Composants Design System

### Boutons

#### Primary (button-a.php)

```css
background: #ffd45a; /* Gold */
color: #131313; /* Dark text on gold */
border-radius: 0.125rem; /* Sharp corners */
padding: 1rem 2rem;
font-family: "Work Sans";
font-weight: 600;
```

#### Secondary (button-b.php)

```css
background: transparent;
color: #fff4e0; /* Parchment */
border: 1px solid rgba(255, 212, 90, 0.2); /* Ghost gold border */
border-radius: 0.125rem;
padding: 1rem 2rem;
font-family: "Work Sans";
```

### Cards

#### Card Event

- Surface : `surface-container-low` (#1A1A1A)
- Ombre : `0 20px 40px rgba(0,0,0, 0.4)`
- Image avec gradient overlay (bas 30%)
- Date en typographie Display (Noto Serif, large)
- Border radius : 0.5rem (lg)

#### Card News

- Même structure que Card Event
- Affichage auteur et date de publication
- Excerpt limité à 120 caractères

---

## 🔐 Sécurité & Best Practices

### Échappement des Données

```php
esc_html()     // Pour texte simple
esc_attr()     // Pour attributs HTML
esc_url()      // Pour URLs
wp_kses_post() // Pour HTML riche (wysiwyg)
```

### AJAX WordPress

```php
// Toujours vérifier le nonce
check_ajax_referer('filtrer_events_nonce', 'nonce');

// Sanitizer les entrées
$era = sanitize_text_field($_POST['era']);

// Retourner JSON standardisé
wp_send_json_success($data);
wp_send_json_error('Message erreur');
```

### Enqueue Conditionnel

```php
// Charger JS/CSS uniquement sur pages nécessaires
if (is_post_type_archive('event')) {
    wp_enqueue_script('filtres-event');
}
```

---

## 📊 Prochaines Sessions — Planning

### Session 2 (Prochaine)

- [ ] Finaliser Header & Footer avec glassmorphisme
- [ ] Implémenter navigation sticky avec effet scroll
- [ ] Créer les 4 composants builder de base (CTA, text_simple, text_image, double_colonne)
- [ ] Tester le builder ACF sur une page test

### Session 3

- [ ] Implémenter archive-event.php avec filtres AJAX
- [ ] Créer card-event.php avec carousel
- [ ] Tester système de filtres par ère historique

### Session 4

- [ ] Implémenter archive-news.php
- [ ] Créer page-contact.php avec formulaire + carte
- [ ] Créer page-rejoindre.php avec formulaire inscription

### Session 5 (Dernière avant examen)

- [ ] Tests responsive complets
- [ ] Tests accessibilité
- [ ] Optimisations finales
- [ ] Documentation du projet pour présentation

---

## 🎓 Notes Techniques Importantes

### ACF Flexible Content — Pattern de Base

```php
$builder = get_field('builder');
if (!empty($builder)) {
    foreach ($builder as $section) {
        get_template_part('template-parts/builder/' . $section['acf_fc_layout'], null, $section);
    }
}
```

### Récupération dans Composant Builder

```php
// Dans template-parts/builder/cta.php
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$link = $args['lien'] ?? null;
```

### WP_Query pour Filtres

```php
$args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'date_event',
    'order' => 'ASC'
);

if (!empty($era)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'era',
            'field' => 'slug',
            'terms' => $era
        )
    );
}

$query = new WP_Query($args);
```

---

## 🧪 Checklist Pre-Développement

- [x] Documentation lue et comprise
- [x] Design system analysé (DESIGN.md)
- [x] Architecture technique définie (instructions.md)
- [x] PRD analysé (4 pages principales)
- [x] Roadmap créée (AGENTS.md)
- [ ] ACF Pro installé et activé
- [ ] Structure de dossiers créée
- [ ] Fichiers de base peuplés
- [ ] Thème activé dans WordPress

---

## 📝 Conventions de Nommage

### Fichiers

- **CSS** : `kebab-case.css` (ex: `page-contact.css`)
- **JS** : `camelCase.js` (ex: `filtresEvent.js` ou `filtres-event.js`)
- **PHP** : `snake_case.php` (ex: `fct_general.php`)
- **Templates** : `kebab-case.php` (ex: `page-contact.php`)

### Classes CSS

- **BEM-like** : `.component-element--modifier`
- **Prefixe composant** : `.card-event__title`
- **Utilitaires** : `.container1200px`, `.grid-2col`

### Fonctions PHP

- **Préfixe du thème** : `ha_` (Histoire Association)
- **Exemple** : `ha_register_event_cpt()`, `ha_enqueue_scripts()`

---

## 🎯 Objectif Final

Un site WordPress **entièrement sur mesure** respectant :

1. Les 6 fonctionnalités obligatoires du cours
2. Le design system "Digital Archivist"
3. Les 4 pages du PRD
4. Les best practices ACF + AJAX
5. L'accessibilité WCAG
6. Le responsive design

**Prêt pour l'examen** : Site fonctionnel, élégant, et démontrant une maîtrise technique WordPress avancée.

---

> 💡 **Philosophie de travail** : Construire progressivement, tester à chaque étape, maintenir la cohérence du design system, privilégier la qualité à la quantité.
