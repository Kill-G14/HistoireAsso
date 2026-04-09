# Histoire Association — WordPress Theme

Thème WordPress pour association de reconstitution historique avec système **ACF Flexible Content** et **Design System "Digital Archivist"**.

## 🎨 Design System

### Palette de couleurs

- **Sombre**: `#131313` (Arrière-plan principal)
- **Or**: `#FFD45A` (Accents, CTA, titres)
- **Parchemin**: `#FFF4E0` (Texte principal)
- **Surface Container**: `rgba(255, 212, 90, 0.1)` (Cartes, sections)

### Typographies

- **Noto Serif**: Display, headlines, dates événements
- **Work Sans**: Body text, UI, navigation

### Ombres & Effets

- **Glassmorphism**: Navigation avec `backdrop-filter: blur(10px)`
- **Shadow System**: 3 niveaux (sm, md, lg)
- **Border Radius**: 4px (sm), 8px (md), 12px (lg)

## 📁 Structure du Thème

```
histoireAsso/
├── functions.php              # Chargeur principal
├── style.css                  # Métadonnées WordPress
├── index.php                  # Template fallback
├── header.php                 # HTML head + navigation
├── footer.php                 # Footer global + CTA
├── page.php                   # Template page standard
├── front-page.php             # Page d'accueil
├── archive.php                # Archive générique
├── archive-event.php          # Archive événements + filtres
├── archive-news.php           # Archive actualités
├── single.php                 # Post standard
├── single-event.php           # Détail événement
├── single-news.php            # Détail actualité
├── page-contact.php           # Formulaire contact
├── page-rejoindre.php         # Formulaire adhésion
├── page-mentions.php          # Mentions légales
├── 404.php                    # Page erreur
├── acf-export.json            # ⭐ Config ACF à importer
│
├── inc/                       # Fonctions modulaires
│   ├── fct_general.php        # Theme support, scripts, styles
│   ├── fct_cpt.php            # Custom Post Types
│   ├── fct_taxonomy.php       # Taxonomies
│   ├── fct_carousel.php       # Swiper.js
│   ├── fct_filtres_event.php  # Filtres AJAX
│   ├── fct_forms.php          # Handlers formulaires
│   └── fct_debug.php          # Outils debug
│
├── css/                       # Styles modulaires
│   ├── general.css            # Design tokens + reset
│   ├── card.css               # Système de cards
│   ├── carousel.css           # Swiper customization
│   ├── filtres-event.css      # Interface filtres
│   ├── page-news.css          # Archive news
│   ├── page-events.css        # Archive events
│   ├── page-contact.css       # Page contact
│   └── page-rejoindre.css     # Page adhésion
│
├── JS/                        # Scripts modulaires
│   ├── navbar.js              # Navigation + glassmorphism
│   ├── carousel.js            # Swiper init
│   └── filtres-event.js       # AJAX filtres
│
└── template-parts/            # Composants réutilisables
    ├── nav.php                # Navigation header
    ├── banner.php             # Banner hero
    ├── button-a.php           # Bouton primaire
    ├── button-b.php           # Bouton secondaire
    ├── filtres-event.php      # Chips filtres
    │
    ├── builder/               # ACF Flexible Content
    │   ├── cta.php            # Call-to-action
    │   ├── text_simple.php    # Texte simple
    │   ├── text_image.php     # Texte + Image
    │   ├── text_simple_double_colonne.php
    │   ├── card.php           # Card générique
    │   ├── card-event.php     # Card événement
    │   ├── card-news.php      # Card actualité
    │   ├── list_event.php     # Liste événements
    │   └── dernier_article.php # Dernières news
    │
    └── cards/                 # (Réservé pour variants futurs)
```

## ⚙️ Custom Post Types

### Événements (`event`)

**Champs ACF:**

- `date_event` (Date Picker) — Date de l'événement
- `lieu` (Text) — Localisation
- `galerie` (Gallery) — Photos événement

**Taxonomie:**

- `era` (Ère historique) — Hiérarchique

### Actualités (`news`)

**Champs ACF:**

- `date_publication` (Date Picker) — Date publication
- `auteur_article` (Text) — Auteur de l'article (nom complet)
- `galerie` (Gallery) — Photos actualité

**Note:** Si le champ `auteur_article` est vide, le template affichera automatiquement l'auteur WordPress du post via `get_the_author()`.

**Taxonomie:**

- `news_category` (Catégorie d'actualité) — Non-hiérarchique

## 🔧 ACF Flexible Content Layouts

Le champ `builder` (Flexible Content) supporte 9 layouts. Voici la configuration complète de chaque layout :

---

### 1. Layout: **cta**

**Description:** Call-to-action centré avec titre, texte et bouton

**Sous-champs ACF:**

- `title` (Text) — Titre du CTA
- `subtitle` (Textarea) — Sous-titre / description
- `lien` (Link) — Lien du bouton (URL + texte + target)
- `background_color` (Color Picker) — Couleur de fond (optionnel)

---

### 2. Layout: **text_simple**

**Description:** Bloc de texte simple avec titre et contenu riche

**Sous-champs ACF:**

- `title` (Text) — Titre de la section
- `contenu` (WYSIWYG Editor) — Contenu texte riche

---

### 3. Layout: **text_image**

**Description:** Bloc asymétrique avec texte et image côte à côte

**Sous-champs ACF:**

- `title` (Text) — Titre de la section
- `contenu` (WYSIWYG Editor) — Contenu texte
- `image` (Image) — Image à afficher
- `image_position` (Select) — Position de l'image
  - Choices: `gauche` | `droite`
  - Default Value: `droite`
- `background_color` (Color Picker) — Couleur de fond (optionnel)

---

### 4. Layout: **text_simple_double_colonne**

**Description:** Texte sur deux colonnes avec titre centré

**Sous-champs ACF:**

- `title` (Text) — Titre de la section
- `colonne_gauche` (WYSIWYG Editor) — Contenu colonne gauche
- `colonne_droite` (WYSIWYG Editor) — Contenu colonne droite

---

### 5. Layout: **card**

**Description:** Card générique utilisant les données WordPress du post

**Sous-champs ACF:** Aucun

**Données utilisées automatiquement:**

- Image mise en avant WordPress
- Titre du post
- Extrait du post
- Lien permanent

---

### 6. Layout: **card-event**

**Description:** Card événement avec carousel pour galerie photos

**Sous-champs ACF:** Aucun _(utilise les champs du CPT `event`)_

**Champs requis sur le CPT `event`:**

- `date_event` (Date Picker)
- `lieu` (Text)
- `galerie` (Gallery)

---

### 7. Layout: **card-news**

**Description:** Card actualité avec auteur et date de publication

**Sous-champs ACF:** Aucun _(utilise les champs du CPT `news`)_

**Champs requis sur le CPT `news`:**

- `date_publication` (Date Picker)
- `auteur_article` (Text)
- `galerie` (Gallery)

---

### 8. Layout: **list_event**

**Description:** Liste d'événements à venir (WP_Query dynamique)

**Sous-champs ACF:**

- `nombre` (Number) — Nombre d'événements à afficher
  - Default Value: 3
- `filtrer_par_ere` (Taxonomy) — Filtrer par ère historique (optionnel)
  - Taxonomy: `era`
  - Return Format: ID

---

### 9. Layout: **dernier_article**

**Description:** Liste des dernières actualités (WP_Query dynamique)

**Sous-champs ACF:**

- `nombre` (Number) — Nombre d'actualités à afficher
  - Default Value: 3

## 🎯 Pages PRD

1. **Page d'accueil** (front-page.php) — Builder ACF
2. **Toutes les infos** (archive-news.php) — Grid actualités
3. **Agenda des événements** (archive-event.php) — Filtres par ère
4. **Nous contacter** (page-contact.php) — Formulaire + carte
5. **Rejoindre** (page-rejoindre.php) — Hero asymétrique + form
6. **Mentions légales** (page-mentions.php) — Contenu standard

## 🚀 Installation

1. **Uploader le thème** dans `wp-content/themes/`
2. **Activer le thème** depuis WordPress Admin → Apparence → Thèmes
3. **Installer ACF Pro** (requis)
4. **Importer la config ACF automatiquement:**
   - Aller dans **ACF → Tools → Import Field Groups**
   - Cliquer sur **Choose File**
   - Sélectionner le fichier `acf-export.json` (dans le dossier du thème)
   - Cliquer sur **Import JSON**
   - ✅ Tous les champs sont maintenant créés!
5. **Configurer les menus** dans Apparence → Menus
6. **Remplir ACF Options** dans Histoire Asso Settings

## 🔌 Dépendances

### Requises

- WordPress 6.0+
- PHP 7.4+
- Advanced Custom Fields Pro

### Recommandées

- jQuery (inclus avec WordPress)

### CDN (auto-chargé)

- Google Fonts (Noto Serif, Work Sans)
- Swiper.js 11.x (conditionnellement)

## 📝 Configuration ACF

### 🚀 Import Automatique (Recommandé)

**Utilisez le fichier `acf-export.json` pour créer automatiquement tous les champs:**

1. Dans WordPress Admin, aller dans **ACF → Tools → Import Field Groups**
2. Cliquer sur **Choose File** et sélectionner `acf-export.json` (dans le dossier du thème)
3. Cliquer sur **Import JSON**
4. ✅ Tous les champs sont créés automatiquement!

Le fichier JSON crée:

- ✅ Champs du CPT **Événements** (date_event, lieu, galerie)
- ✅ Champs du CPT **Actualités** (date_publication, auteur_article, galerie)
- ✅ **Builder** Flexible Content avec 9 layouts sur les pages
- ✅ **Options Page** avec tous les champs (CTA, footer, contact)

---

### 📋 Configuration Manuelle (Alternative)

Si vous préférez créer les champs manuellement:

#### Options Page

Créer les champs suivants dans **Histoire Asso Settings**:

**Section CTA Catalogue:**

- `cta_catalogue_titre` (Text)
- `cta_catalogue_texte` (Textarea)
- `cta_catalogue_lien` (Link)

**Section Footer:**

- `footer_apropos` (Textarea)
- `footer_liens_rapides` (Repeater: lien_text, lien_url)
- `footer_reseaux` (Repeater: reseau_nom, reseau_url, reseau_icon)

**Section Contact:**

- `adresse_association` (Text)
- `email_contact` (Email)
- `telephone` (Text)
- `email_rejoindre` (Email)

---

### CPT Événements

Créer un **Field Group** pour le post type `event` avec:

- `date_event` (Date Picker)
- `lieu` (Text)
- `galerie` (Gallery)

### CPT Actualités

Créer un **Field Group** pour le post type `news` avec:

- `date_publication` (Date Picker)
- `auteur_article` (Text)
- `galerie` (Gallery)

---

### Flexible Content (Builder)

Créer un champ `builder` (Flexible Content) avec les 9 layouts listés ci-dessus.

## 🎨 Utilisation du Builder

Dans WordPress Admin, éditer une page et ajouter des layouts depuis le champ "Builder":

```
[+ Ajouter une ligne]
  → CTA
  → Text Simple
  → Text + Image
  → Liste Événements
  → etc.
```

Chaque layout a ses propres sous-champs configurables.

## 🌐 Menus WordPress

Enregistrer un menu dans **Apparence → Menus** et l'assigner à `main-menu`.

Structure suggérée:

- Accueil
- Événements (archive-event.php)
- Actualités (archive-news.php)
- Contact (page-contact.php)
- Rejoindre (page-rejoindre.php)

## 🐛 Mode Debug

Activer le mode debug dans `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Utiliser les fonctions de debug:

```php
var2console($variable, 'Mon Debug'); // Dans console navigateur
str2console('Message debug');
```

## 📦 Production

Avant mise en production:

1. Désactiver `WP_DEBUG`
2. Supprimer `fct_debug.php` ou commenter l'include
3. Minifier CSS/JS (optionnel)
4. Optimiser les images
5. Configurer cache (plugin recommandé)

## 🔐 Sécurité

- Tous les AJAX hooks utilisent `wp_nonce`
- Validation/sanitization sur tous les formulaires
- Échappement de toutes les sorties (`esc_html`, `esc_url`, `esc_attr`)
- Prefix `ha_` sur toutes les fonctions
- Vérification `!defined('ABSPATH')` dans functions.php

## 📚 Ressources

- [AGENTS.md](AGENTS.md) — Roadmap complète du projet
- [DESIGN.md](DESIGN.md) — Spécifications Design System
- [instructions.md](instructions.md) — Architecture ACF
- [product_requirements_document.md](product_requirements_document.md) — Cahier des charges

## ✅ Checklist Post-Installation

- [ ] Thème activé
- [ ] ACF Pro installé et activé
- [ ] Configuration ACF importée
- [ ] Menu principal créé et assigné
- [ ] ACF Options remplies (footer, contact)
- [ ] Page d'accueil définie (Réglages → Lecture)
- [ ] Permaliens configurés (/%postname%/)
- [ ] Test de tous les formulaires
- [ ] Test des filtres événements
- [ ] Vérification responsive mobile

## 🆘 Support

Pour questions ou bugs, contacter le développeur via le repository du projet.

---

**Version:** 1.0.0  
**Dernière mise à jour:** 2024  
**Auteur:** Histoire Association Dev Team
