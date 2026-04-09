# 🎯 Module Hero - Installation

## 📦 Fichiers créés

- `acf-hero-layout.json` — Configuration ACF à importer
- `template-parts/builder/hero.php` — Template PHP du hero
- `css/hero.css` — Styles du hero section

## 🔧 Étapes d'installation

### 1. Importer le layout ACF

1. Aller dans **ACF → Tools** dans WordPress Admin
2. Cliquer sur **Import Field Groups**
3. Sélectionner le fichier `acf-hero-layout.json`
4. Cliquer sur **Import JSON**

⚠️ **Important** : Ce fichier contient uniquement le **layout hero**, pas le groupe de champs flexible content. Vous devez l'ajouter manuellement au flexible content `builder` existant.

### 2. Ajouter le layout au flexible content

1. Aller dans **ACF → Field Groups**
2. Modifier le groupe **"Page Builder"**
3. Trouver le champ **`builder`** (Flexible Content)
4. Cliquer sur **+ Add Layout**
5. Donner le nom : `hero`
6. Ajouter les champs suivants :

**Champs du layout `hero` :**

| Nom du champ        | Type     | Instructions                             |
| ------------------- | -------- | ---------------------------------------- |
| `background_image`  | Image    | Image plein écran (min 1920x1080px)      |
| `surtitre`          | Text     | Texte court au-dessus du titre           |
| `titre`             | Textarea | Grand titre principal (3 lignes)         |
| `bouton_primaire`   | Group    | Contient : `texte` (Text) + `lien` (URL) |
| `bouton_secondaire` | Group    | Contient : `texte` (Text) + `lien` (URL) |

### 3. Vérifier les styles

Les styles sont automatiquement chargés via `inc/fct_general.php` :

- ✅ `css/hero.css` enregistré
- ✅ Material Symbols pour l'icône scroll

### 4. Utiliser le hero sur une page

1. Créer/Éditer une page WordPress
2. Dans le **Builder**, cliquer sur **+ Add Row**
3. Sélectionner le layout **Hero**
4. Remplir les champs :
   - Image de fond
   - Surtitre (optionnel) : ex. "Association d'Histoire de Tournai"
   - Titre : ex. "L'histoire vivante de la région de Tournai et ses environs"
   - Bouton primaire : Texte + URL
   - Bouton secondaire : Texte + URL
5. **Publier**

## 🎨 Design System

Le hero respecte le design "Digital Archivist" :

- **Font** : Noto Serif (headlines) + Work Sans (buttons)
- **Colors** :
  - Background overlay : `#131313` gradient
  - Text : `#FFF4E0` (Parchment)
  - Primary button : `#D4AF37` (Gold)
  - Secondary button : Ghost (border `rgba(255, 212, 90, 0.4)`)
- **Responsive** :
  - Mobile : Titre 3rem, boutons empilés
  - Tablet : Titre 5rem, boutons côte à côte
  - Desktop : Titre 6rem
  - Large : Titre 8rem

## 🔍 Structure HTML générée

```html
<header class="hero-section">
  <div class="hero-background">
    <img class="hero-bg-image" />
    <div class="hero-gradient-overlay"></div>
  </div>

  <div class="hero-content">
    <p class="hero-surtitre">...</p>
    <h1 class="hero-titre">...</h1>
    <div class="hero-cta">
      <a class="hero-btn hero-btn-primary">...</a>
      <a class="hero-btn hero-btn-secondary">...</a>
    </div>
  </div>

  <div class="hero-scroll-indicator">
    <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
  </div>
</header>
```

## ✅ Checklist finale

- [ ] Fichier JSON importé dans ACF
- [ ] Layout `hero` ajouté au flexible content `builder`
- [ ] Champs configurés (image, surtitre, titre, 2 boutons)
- [ ] Page test créée avec le hero
- [ ] Vérification responsive (mobile/tablet/desktop)
- [ ] Material Symbols charge correctement (icône scroll visible)

---

**Note** : Le hero prend 100vh (hauteur plein écran). Placez-le toujours en **premier élément** du builder pour un effet optimal.
