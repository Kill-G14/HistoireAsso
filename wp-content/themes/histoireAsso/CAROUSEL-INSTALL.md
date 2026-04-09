# 🎠 Module Carousel Intervenants - Installation

## 📦 Fichiers créés

- `acf-carousel-layout.json` — Configuration ACF à importer
- `template-parts/builder/carousel.php` — Template PHP du carousel
- `css/carousel-intervenants.css` — Styles Digital Archivist
- `JS/carousel-intervenants.js` — Navigation interactive

## 🔧 Installation

### Étape 1 : Importer le JSON ACF

1. **WordPress Admin** → **ACF → Tools → Import**
2. Sélectionnez `acf-carousel-layout.json`
3. Cliquez sur **Import**

⚠️ **Important** : Cela crée un groupe temporaire appelé "Carousel Layout - À copier dans Builder"

### Étape 2 : Copier le layout dans votre Builder

Le JSON crée un groupe TEMPORAIRE. Vous devez maintenant copier le layout `carousel` dans votre Builder principal :

#### Méthode manuelle (recommandée) :

1. **ACF → Field Groups → Builder – Contenu Modulaire** → **Modifier**
2. Trouvez le champ **`builder`** (Flexible Content)
3. Cliquez sur **+ Add Layout** (en bas des layouts existants)
4. Configurez le layout :

**Nom du layout :** `carousel`  
**Label :** Carousel Intervenants

**Ajoutez 3 champs :**

##### Champ 1 : Titre de la section

- **Label:** Titre de la section
- **Nom:** `titre_section`
- **Type:** Text
- **Valeur par défaut:** "Nos Intervenants"

##### Champ 2 : Description

- **Label:** Description
- **Nom:** `description`
- **Type:** Textarea
- **Lignes:** 3
- **Valeur par défaut:** "Revivez les grandes époques qui ont façonné notre territoire..."

##### Champ 3 : Slides du carousel

- **Label:** Slides du carousel
- **Nom:** `slides`
- **Type:** Repeater
- **Bouton:** "Ajouter une slide"
- **Min:** 1

**Sous-champs du Repeater :**

| Ordre | Label            | Nom         | Type  | Instructions                        |
| ----- | ---------------- | ----------- | ----- | ----------------------------------- |
| 1     | Image            | `image`     | Image | Image de la période (ratio 3:4)     |
| 2     | Catégorie        | `categorie` | Text  | Ex: "Origines", "Civilisation"      |
| 3     | Titre époque     | `titre`     | Text  | Ex: "La préhistoire", "Les Gaulois" |
| 4     | Lien (optionnel) | `lien`      | Link  | Lien vers page dédiée               |

5. **Update** pour sauvegarder

### Étape 3 : Supprimer le groupe temporaire

1. **ACF → Field Groups**
2. Trouvez **"Carousel Layout - À copier dans Builder"**
3. **Mettre à la corbeille**

### Étape 4 : Vérifier les assets

Les fichiers sont déjà enregistrés dans `inc/fct_general.php` :

- ✅ `css/carousel-intervenants.css`
- ✅ `JS/carousel-intervenants.js`

## 🎨 Utilisation

1. Créer/Éditer une page WordPress
2. Dans le **Builder**, cliquer sur **+ Add Row**
3. Sélectionner **Carousel Intervenants**
4. Remplir les champs :
   - **Titre :** "Nos Intervenants"
   - **Description :** "Revivez les grandes époques..."
   - **Slides :** Ajouter 5-6 slides minimum
     - Image (ratio portrait 3:4)
     - Catégorie : "Origines", "L'Âge du Fer", etc.
     - Titre : "La préhistoire", "Les Gaulois", etc.
     - Lien : Optionnel vers page dédiée

5. **Publier**

## 🎯 Fonctionnalités

Le carousel inclut :

- ✅ Scroll horizontal fluide
- ✅ Navigation par flèches gauche/droite
- ✅ Dots de pagination (mise à jour automatique)
- ✅ Drag-to-scroll sur desktop
- ✅ Touch swipe sur mobile
- ✅ Hover effects sur les cards
- ✅ Line animée au hover
- ✅ Design "Digital Archivist" complet

## 📐 Structure HTML générée

```html
<section class="carousel-intervenants">
  <div class="carousel-header">
    <h2 class="carousel-titre">Nos Intervenants</h2>
    <p class="carousel-description">...</p>
  </div>

  <div class="carousel-container">
    <button class="carousel-nav carousel-nav-prev">←</button>
    <button class="carousel-nav carousel-nav-next">→</button>

    <div class="carousel-wrapper">
      <div class="carousel-slide">
        <div class="carousel-card">
          <img class="carousel-card-image" />
          <div class="carousel-card-overlay"></div>
          <div class="carousel-card-content">
            <span class="carousel-card-categorie">Origines</span>
            <h3 class="carousel-card-titre">La préhistoire</h3>
            <div class="carousel-card-line"></div>
          </div>
        </div>
      </div>
      <!-- Autres slides... -->
    </div>
  </div>

  <div class="carousel-pagination">
    <button class="carousel-dot active"></button>
    <!-- Autres dots... -->
  </div>
</section>
```

## 🎨 Design System

- **Background :** `#0E0E0E` (Surface Container Lowest)
- **Titre :** `#D4AF37` (Gold) - Noto Serif 3.75rem
- **Cards :** Aspect ratio 3:4, border-radius 0.75rem
- **Gradient overlay :** `#0E0E0E` → transparent
- **Navigation :** Boutons ronds or avec glassmorphisme
- **Hover :** Scale image 1.1x, ligne animée 100%

## ✅ Checklist

- [ ] JSON importé dans ACF
- [ ] Layout `carousel` créé dans Builder
- [ ] Champ `slides` (Repeater) avec 4 sous-champs
- [ ] Groupe temporaire supprimé
- [ ] Page test créée avec carousel
- [ ] 5-6 slides ajoutées avec images
- [ ] Navigation fonctionne (flèches + dots)
- [ ] Responsive vérifié (mobile + desktop)

---

**Note :** Le carousel fonctionne parfaitement avec 1 slide, mais l'effet est optimal avec **5-6 slides minimum** comme dans le design original.
