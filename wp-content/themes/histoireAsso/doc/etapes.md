# 📋 Guide Étape par Étape - Finalisation du Site WordPress

> **Temps estimé restant : 1h45**  
> **Temps déjà effectué : 50 min (Recrutement + Taxonomies + Header/Footer ✅)**  
> Pour apprenti WordPress débutant — Chaque étape est détaillée

---

## 📊 État des Lieux Actuel

### ✅ Ce qui est DÉJÀ FAIT

- [x] Thème activé et structure complète
- [x] ACF Pro installé et champs importés
- [x] Custom Post Types (Événements + Actualités) créés
- [x] Taxonomies (Ère historique + Catégories) créées
- [x] Page d'accueil : Hero + Text+Image + Carousel Intervenants
- [x] Menu header avec liens fonctionnels et affichage réparé
- [x] Page Recrutement créée et template configuré
- [x] Termes de taxonomie créés (5 ères historiques + 4 catégories)
- [x] Footer navigation configuré et fonctionnel
- [x] Infos contact remplies dans ACF Options (adresse, email, téléphone)
- [x] 3 événements créés avec dates, lieux, galeries et ères historiques
- [x] Système de filtres d'événements par ère fonctionnel

### ⚠️ Ce qui RESTE À FAIRE

- [ ] Remplir ACF Options Page (CTA Catalogue, Réseaux sociaux, Liens rapides)
- [ ] Créer 5 actualités de test
- [ ] Compléter la page d'accueil (ajouter 3 blocs builder)
- [ ] Finaliser la page Mentions Légales
- [ ] Tester les formulaires Contact et Adhésion

---

## ✅ PRIORITÉ 1 : TERMINÉE - Page Recrutement créée

### Ce qui a été fait :

- ✅ Page "Recrutement" créée dans WordPress
- ✅ Template `page-recrutement.php` configuré
- ✅ Slug `/recrutement/` défini
- ✅ Lien du menu fonctionnel
- ✅ Plus de 404 !

**URL fonctionnelle :** http://localhost:10022/recrutement/

---

## ✅ PRIORITÉ 2 : TERMINÉE - Configuration Taxonomies & Navigation

### Ce qui a été fait :

- ✅ 5 Ères historiques créées (Préhistoire, Gaulois, Gallo-Romains, Moyen-Âge, Renaissance)
- ✅ 4+ Catégories d'actualité créées
- ✅ Header navigation réparé et fonctionnel
- ✅ Footer navigation configuré
- ✅ Infos contact affichées dans le footer (adresse, email, téléphone)

---

## 🎯 PRIORITÉ 2 BIS : Configuration Taxonomies (15 minutes) - ✅ DÉJÀ FAIT

### ✅ Étape 2.1 : Créer les Ères Historiques - FAIT

✅ **Terminé !** Les 5 ères historiques ont été créées avec succès.

---

### ✅ Étape 2.2 : Créer les Catégories d'Actualité - FAIT

✅ **Terminé !** Les catégories d'actualité ont été créées avec succès.

---

## 🎯 PRIORITÉ 3 : ACF Options Page (20 minutes)

Ces infos apparaissent sur toutes les pages (footer, CTA global).

### Étape 3.1 : Remplir les Options Globales

1. **Va dans :** Histoire Asso Settings (dans le menu admin à gauche)

---

#### Section 1 : CTA Catalogue (apparaît avant le footer)

**Champs à remplir :**

- **Titre CTA :**

  ```
  Découvrez Notre Catalogue d'Ateliers
  ```

- **Texte CTA :**

  ```
  Plus de 50 ateliers pédagogiques sur l'histoire de Tournai et ses environs. De la préhistoire à la Renaissance.
  ```

- **Lien CTA :**
  - Texte du lien : `Voir nos ateliers`
  - URL : `/evenements` (ou lien vers ta page événements)
  - Ouvrir dans : Même onglet

---

#### Section 2 : Footer

**À propos de l'association :**

```
Association de reconstitution historique et d'archéologie expérimentale basée à Tournai. Nous redonnons vie à l'histoire de notre région à travers des événements, ateliers et recherches.
```

**Liens Rapides** (Repeater - ajoute 3 lignes) :

| Texte du lien    | URL du lien     |
| ---------------- | --------------- |
| Toutes les infos | /actualites     |
| Agenda           | /evenements     |
| Nous contacter   | /nous-contacter |

**Réseaux Sociaux** (Repeater - ajoute 2 lignes) :

| Nom du réseau | URL                                    | Icône     |
| ------------- | -------------------------------------- | --------- |
| Facebook      | https://facebook.com/histoireasso      | facebook  |
| Instagram     | https://instagram.com/histoire_tournai | instagram |

_(Si les URLs n'existent pas encore, mets des liens de test)_

---

#### ✅ Section 3 : Informations de Contact - FAIT

✅ **Terminé !** Les informations suivantes ont été remplies et s'affichent correctement dans le footer :

- ✅ Adresse : Place de Tournai, 7500 Tournai, Belgique
- ✅ Email : info@histoireassociation.be
- ✅ Téléphone : +32 69 12 34 56

**Il reste à remplir :** Email pour adhésion (optionnel)

---

**⚠️ Reste à faire dans ACF Options :**

- Section 1 : CTA Catalogue
- Section 2 : Footer (À propos, Liens rapides, Réseaux sociaux)

---

## 🎯 PRIORITÉ 4 : Créer du Contenu (60 minutes)

### Étape 4.1 : Créer 5 Événements (30 min)

#### Modèle pour chaque événement :

1. **Va dans :** Événements → Ajouter

2. **Remplis les champs :**

**ÉVÉNEMENT 1 :**

- **Titre :** `Reconstitution Gallo-Romaine à Tournai`
- **Contenu (éditeur) :**

  ```
  Plongez dans l'histoire de Tournai à l'époque gallo-romaine !

  Venez découvrir la vie quotidienne des habitants de l'antique Turnacum à travers des reconstitutions authentiques, des démonstrations d'artisanat et des ateliers interactifs pour toute la famille.

  Au programme :
  - Démonstrations de forge et poterie
  - Présentation des équipements militaires
  - Atelier cuisine romaine
  - Visite guidée des vestiges
  ```

- **Champs ACF (dans l'encadré "Événement - Informations") :**
  - **Date de l'événement :** Choisis une date future (ex : 15/07/2026)
  - **Lieu :** `Tournai, Place de l'Évêché`
  - **Galerie Photos :** Upload 2-3 photos (cherche sur Unsplash : "roman reenactment")

- **Taxonomie (à droite) :**
  - **Ères historiques :** Coche `Les Gallo-Romains`

- **Image mise en avant (à droite) :**
  - Upload une photo principale

- **Clique sur :** Publier

---

**ÉVÉNEMENT 2 :**

- **Titre :** `Marché Médiéval de Tournai`
- **Contenu :**

  ```
  Remontez le temps jusqu'au Moyen-Âge avec notre grand marché médiéval !

  Artisans, jongleurs, musiciens et combattants vous attendent pour un week-end hors du temps au cœur de la cité tournaisienne.
  ```

- **Date :** (future)
- **Lieu :** `Tournai, Grand-Place`
- **Ère historique :** `Le Moyen-Âge`
- Galerie + Image mise en avant

---

**ÉVÉNEMENT 3 :**

- **Titre :** `Démonstration de Tir à l'Arc Préhistorique`
- **Contenu :**

  ```
  Découvrez les techniques de chasse de nos ancêtres préhistoriques !

  Initiation au tir à l'arc primitif, démonstration de taille de silex et fabrication d'outils en os. Un voyage de 10 000 ans dans le passé.
  ```

- **Date :** (future)
- **Lieu :** `Tournai, Parc Communal`
- **Ère historique :** `La Préhistoire`

---

**ÉVÉNEMENT 4 :**

- **Titre :** `Festival Renaissance : Musique et Costumes du XVIe siècle`
- **Contenu :**

  ```
  Célébrez la Renaissance avec concerts, danses et costumes d'époque.

  Musiciens et danseurs vous feront revivre l'âge d'or de Tournai sous Charles Quint.
  ```

- **Date :** (future)
- **Lieu :** `Tournai, Cathédrale Notre-Dame`
- **Ère historique :** `La Renaissance`

---

**ÉVÉNEMENT 5 :**

- **Titre :** `Campement Gaulois : Immersion dans l'Âge du Fer`
- **Contenu :**

  ```
  Explorez un authentique campement gaulois reconstitué !

  Artisanat, cuisine, forge et démonstrations guerrières vous attendent pour comprendre la vie des Nerviens, ancêtres des Tournaisiens.
  ```

- **Date :** (future)
- **Lieu :** `Tournai, Musée d'Histoire et d'Archéologie`
- **Ère historique :** `Les Gaulois`

---

✅ **Vérification :** Va sur `/evenements` → Tu dois voir tes 5 événements listés

---

### Étape 4.2 : Créer 5 Actualités (30 min)

#### Modèle pour chaque actualité :

1. **Va dans :** Actualités → Ajouter

**ACTUALITÉ 1 :**

- **Titre :** `Découverte d'une Nécropole Mérovingienne à Tournai`
- **Contenu :**

  ```
  Une découverte archéologique majeure vient d'être réalisée près de Tournai !

  Lors de fouilles préventives menées par notre équipe en collaboration avec l'Agence Wallonne du Patrimoine, une nécropole mérovingienne datant du VIe siècle a été mise au jour.

  Les premières analyses révèlent la présence d'au moins 45 sépultures, dont certaines contiennent des objets funéraires d'une grande richesse : fibules, scramasaxes (épées courtes), et verrerie importée du Rhin.

  Cette découverte confirme l'importance de Tournai à l'époque mérovingienne, alors capitale du royaume de Childéric Ier.
  ```

- **Champs ACF :**
  - **Date de publication :** (date récente, ex : 20/05/2026)
  - **Auteur de l'article :** `Dr. Sophie Delattre`
  - **Galerie :** 2-3 photos (cherche "archaeological dig" ou "merovingian")

- **Catégorie :** `Découvertes Archéologiques`
- **Image mise en avant**
- **Publier**

---

**ACTUALITÉ 2 :**

- **Titre :** `Retour sur notre Reconstitution du Siège de Tournai (1340)`
- **Contenu :**

  ```
  Plus de 200 passionnés se sont réunis le week-end dernier pour reconstituer le siège de Tournai par Édouard III d'Angleterre.

  Cet événement historique majeur de la Guerre de Cent Ans a été restitué avec un souci du détail impressionnant : costumes d'époque, armement authentique, et tactiques militaires médiévales.

  Un grand merci à tous les participants et au public qui a répondu présent !
  ```

- **Date :** (récente)
- **Auteur :** `Marc Vanderhoeven`
- **Catégorie :** `Événements Passés`

---

**ACTUALITÉ 3 :**

- **Titre :** `Nouvel Atelier : Cuisine Romaine pour Enfants`
- **Contenu :**

  ```
  Nous lançons un nouvel atelier pédagogique destiné aux 8-12 ans : la cuisine romaine !

  Les jeunes apprentis découvriront les recettes et techniques culinaires de l'Antiquité : moretum (fromage aux herbes), libum (gâteau au miel), et mulsum (vin miellé).

  Inscriptions ouvertes dès maintenant. Places limitées à 15 enfants par session.
  ```

- **Date :** (récente)
- **Auteur :** `Lucie Fontaine`
- **Catégorie :** `Ateliers Pédagogiques`

---

**ACTUALITÉ 4 :**

- **Titre :** `L'Association Histoire célèbre ses 15 ans`
- **Contenu :**

  ```
  C'est avec fierté que nous célébrons cette année les 15 ans de notre association !

  Depuis 2011, nous œuvrons pour faire découvrir et revivre l'histoire de Tournai à travers reconstitutions, fouilles et ateliers pédagogiques.

  Merci à tous nos membres, partenaires et au public pour votre soutien indéfectible.
  ```

- **Date :** (récente)
- **Auteur :** `Jean-François Delmotte, Président`
- **Catégorie :** `Vie de l'Association`

---

**ACTUALITÉ 5 :**

- **Titre :** `Partenariat avec l'Université de Tournai`
- **Contenu :**

  ```
  Nous sommes fiers d'annoncer un nouveau partenariat avec le département d'Histoire et Archéologie de l'Université de Tournai.

  Cette collaboration permettra à nos membres d'accéder à des formations spécialisées et de participer à des fouilles universitaires.

  Un bel exemple de synergie entre passionnés et chercheurs académiques !
  ```

- **Date :** (récente)
- **Auteur :** `Dr. Sophie Delattre`
- **Catégorie :** `Vie de l'Association`

---

✅ **Vérification :** Va sur `/actualites` → Tu dois voir tes 5 actualités

---

## 🎯 PRIORITÉ 5 : Finaliser la Page d'Accueil (15 minutes)

Tu as déjà Hero + Text+Image + Carousel. Ajoutons les derniers blocs.

### Étape 5.1 : Compléter le Builder de la Page d'Accueil

1. **Va dans :** Pages → Accueil → Modifier

2. **Dans le Builder ACF (en bas de page), ajoute après le Carousel :**

#### Bloc 4 : Liste des Événements à Venir

- **Layout :** Clique sur `+ Ajouter une ligne` → Sélectionne **`list_event`**
- **Nombre d'événements à afficher :** `3`
- **Filtrer par ère :** (laisse vide pour afficher toutes les ères)

#### Bloc 5 : Derniers Articles

- **Layout :** `+ Ajouter une ligne` → **`dernier_article`**
- **Nombre d'articles à afficher :** `3`

#### Bloc 6 : CTA Final

- **Layout :** `+ Ajouter une ligne` → **`cta`**
- **Titre :** `Rejoignez Notre Communauté`
- **Sous-titre :** `Passionné d'histoire ? Venez partager votre intérêt avec nous et participer à nos événements uniques.`
- **Lien :**
  - Texte : `Devenir Membre`
  - URL : `/recrutement`
  - Ouvrir dans : Même onglet

3. **Mettre à jour** la page

✅ **Test :** Visite la page d'accueil → Tu dois voir 6 blocs au total

---

## 🎯 PRIORITÉ 6 : Page Mentions Légales (15 minutes)

### Étape 6.1 : Créer/Compléter la Page

1. **Va dans :** Pages → Recherche "Mentions" ou Ajouter une nouvelle

2. **Configure :**
   - **Titre :** `Mentions Légales`
   - **Template :** Sélectionne **"Mentions"** (si disponible) sinon utilise le template par défaut

3. **Contenu (copie-colle ce texte) :**

```markdown
## Mentions Légales

### Éditeur du Site

**Histoire Association**  
Association sans but lucratif (ASBL)  
Siège social : Place de Tournai, 7500 Tournai, Belgique  
Email : info@histoireassociation.be  
Téléphone : +32 69 12 34 56  
Numéro d'entreprise : BE 0123.456.789

### Hébergement

Ce site est hébergé par :  
**Local by Flywheel** (développement) / **[Ton hébergeur de production]**

### Propriété Intellectuelle

Le contenu de ce site (textes, images, photographies) est protégé par le droit d'auteur. Toute reproduction sans autorisation est interdite.

Les photographies de reconstitutions historiques appartiennent à Histoire Association et ses membres.

---

## Politique de Confidentialité (RGPD)

### Données Collectées

Nous collectons les données suivantes via nos formulaires :

- **Formulaire de contact** : nom, email, message
- **Formulaire d'adhésion** : nom, prénom, email, téléphone, adresse

### Utilisation des Données

Vos données personnelles sont utilisées uniquement pour :

- Répondre à vos demandes de contact
- Traiter votre demande d'adhésion
- Vous informer de nos événements (si vous y consentez)

**Nous ne vendons ni ne partageons vos données avec des tiers.**

### Vos Droits

Conformément au RGPD, vous disposez d'un droit :

- D'accès à vos données
- De rectification
- De suppression
- D'opposition au traitement

Pour exercer ces droits, contactez-nous à : info@histoireassociation.be

### Cookies

Ce site n'utilise pas de cookies de traçage publicitaire. Seuls des cookies techniques nécessaires au fonctionnement du site sont utilisés.

### Conservation des Données

Les données de contact sont conservées pendant 3 ans maximum.  
Les données des membres actifs sont conservées pendant la durée de l'adhésion.

---

**Dernière mise à jour :** Mai 2026
```

4. **Publier**

5. **Ajouter le lien au footer :**
   - Va dans **Apparence → Menus**
   - Ajoute la page "Mentions Légales" au menu footer (si existant) ou au menu principal en bas

✅ **Test :** Va sur `/mentions-legales` → La page doit s'afficher

---

## 🎯 PRIORITÉ 7 : Tests Finaux (20 minutes)

### Étape 7.1 : Tester le Formulaire de Contact

1. **Va sur :** `/nous-contacter`
2. **Remplis le formulaire :**
   - Nom : Ton prénom
   - Email : Ton email
   - Message : "Test du formulaire"
3. **Envoie**
4. **Vérifie :**
   - Message de confirmation s'affiche
   - Email reçu (regarde aussi les spams)

❌ **Si ça ne marche pas :** Vérifie dans ACF Options que l'email de contact est bien rempli

---

### Étape 7.2 : Tester le Formulaire d'Adhésion

1. **Va sur :** `/recrutement`
2. **Remplis le formulaire**
3. **Envoie et vérifie** comme pour le contact

---

### Étape 7.3 : Tester les Filtres d'Événements

1. **Va sur :** `/evenements`
2. **Utilise les filtres :**
   - Sélectionne une ère (ex : "Les Gallo-Romains")
   - Clique sur "Filtrer"
3. **Vérifie :** Seuls les événements de cette ère doivent apparaître

---

### Étape 7.4 : Vérifier le Responsive Mobile

1. **Ouvre les DevTools :** Appuie sur `F12`
2. **Active le mode mobile :** Clique sur l'icône téléphone/tablette
3. **Parcours les pages :**
   - Accueil
   - Événements
   - Actualités
   - Contact
4. **Vérifie :**
   - Le menu burger fonctionne
   - Les images ne débordent pas
   - Le texte est lisible
   - Les boutons sont cliquables

---

### Étape 7.5 : Vérifier Tous les Liens

**Checklist des liens à tester :**

- [ ] Logo header → Accueil
- [ ] Menu : Accueil
- [ ] Menu : Toutes les infos → `/actualites`
- [ ] Menu : Agenda → `/evenements`
- [ ] Menu : Nous contacter
- [x] Menu : Recrutement → `/recrutement/`
- [ ] Footer : Liens rapides
- [ ] Footer : Réseaux sociaux
- [ ] CTA "Découvrez notre catalogue"
- [ ] Boutons sur la page d'accueil

✅ **Résultat attendu :** Aucun lien ne doit renvoyer une 404

---

## 🎓 BONUS : Améliorations Facultatives

Si tu as du temps supplémentaire, voici des améliorations possibles :

### Bonus 1 : Ajouter Plus de Photos

- Upload 5-10 photos historiques dans la médiathèque
- Remplace les images de placeholder
- Sites recommandés pour images gratuites :
  - Unsplash.com (cherche : "history", "medieval", "archaeology")
  - Pexels.com
  - Pixabay.com

### Bonus 2 : Créer une Page "À Propos"

- Page expliquant l'histoire de l'association
- Présentation de l'équipe
- Utilise le Builder ACF avec layouts Text+Image

### Bonus 3 : Paramétrer les Permaliens

1. **Va dans :** Réglages → Permaliens
2. **Sélectionne :** Nom de l'article
3. **Enregistre**

Cela donne des URLs propres : `/evenements/reconstitution-gallo-romaine` au lieu de `?p=123`

### Bonus 4 : Ajouter un Favicon

1. Va dans **Apparence → Personnaliser**
2. Section **Identité du site**
3. Upload une icône (logo de l'association en 512x512px)

---

## 📊 Checklist Finale de Validation

Avant de considérer le site terminé, vérifie que TOUT est coché :

### Configuration WordPress

- [x] Thème activé
- [x] ACF Pro installé
- [x] Champs ACF importés
- [x] Menu principal configuré et assigné
- [x] Menu footer configuré et assigné
- [ ] Page d'accueil définie (Réglages → Lecture)

### Taxonomies

- [x] 5 Ères historiques créées
- [x] 4 Catégories d'actualité créées

### ACF Options Page

- [ ] CTA Catalogue rempli
- [ ] Footer : À propos rempli
- [ ] Footer : Liens rapides remplis (3 liens)
- [ ] Footer : Réseaux sociaux remplis (2 réseaux)
- [x] Infos contact remplies (adresse, email, téléphone)

### Contenu

- [ ] 5 Événements créés (avec dates futures, lieu, galerie, ère)
- [ ] 5 Actualités créées (avec date, auteur, galerie, catégorie)
- [ ] Page d'accueil complète (6 blocs builder)
- [x] Page Recrutement créée et fonctionnelle
- [ ] Page Contact existe et fonctionne
- [ ] Page Mentions Légales rédigée

### Tests

- [x] Lien Recrutement fonctionne (plus de 404)
- [ ] Tous les autres liens du header fonctionnent
- [ ] Formulaire Contact testé et fonctionnel
- [ ] Formulaire Adhésion testé et fonctionnel
- [x] Filtres événements par ère fonctionnels ✅
- [ ] Site responsive testé sur mobile
- [ ] Footer s'affiche correctement sur toutes les pages
- [ ] CTA global apparaît avant le footer

---

## 🆘 Aide et Dépannage

### Problème : Les champs ACF ne s'affichent pas

**Solution :**

1. Va dans ACF → Field Groups
2. Vérifie que les groupes de champs sont bien assignés aux bons post types
3. Vérifie que ACF Pro est bien activé (Plugins)

### Problème : Les événements ne s'affichent pas sur l'accueil

**Solution :**

1. Vérifie que tu as bien créé des événements avec des **dates futures**
2. Va dans le builder de la page d'accueil
3. Vérifie que le layout `list_event` est bien présent
4. Vérifie le champ "Nombre" (doit être 3 minimum)

### Problème : Les emails des formulaires ne sont pas reçus

**Solution :**

1. En local (Local by Flywheel), les emails ne sont pas envoyés par défaut
2. Installe le plugin **WP Mail SMTP** ou **MailHog**
3. Ou teste directement en production sur un vrai hébergeur

### Problème : Page 404 après activation du thème

**Solution :**

1. Va dans **Réglages → Permaliens**
2. Clique simplement sur **Enregistrer** (sans rien changer)
3. Cela force WordPress à régénérer les règles de réécriture

### Problème : Le menu ne s'affiche pas

**Solution :**

1. Va dans **Apparence → Menus**
2. Vérifie qu'un menu est bien **assigné** à l'emplacement "Menu Principal"
3. Si aucun emplacement n'existe, vérifie le fichier `inc/fct_general.php`

---

## 🎯 Récapitulatif du Temps

| Étape                           | Temps estimé | Statut  |
| ------------------------------- | ------------ | ------- |
| ✅ Page Recrutement créée       | 10 min       | FAIT ✅ |
| ✅ Créer taxonomies             | 15 min       | FAIT ✅ |
| ✅ Réparer header/footer        | 10 min       | FAIT ✅ |
| ✅ Infos contact footer         | 15 min       | FAIT ✅ |
| ✅ Créer 3 événements + filtres | 20 min       | FAIT ✅ |
| Compléter ACF Options (CTA, RS) | 15 min       | À faire |
| Créer 5 actualités              | 30 min       | À faire |
| Compléter page d'accueil        | 15 min       | À faire |
| Page Mentions Légales           | 15 min       | À faire |
| Tests finaux                    | 20 min       | À faire |
| **TOTAL RESTANT**               | **1h35**     |         |

---

## ✅ C'est Fini !

Une fois toutes les étapes complétées et la checklist validée, ton site WordPress est **opérationnel** ! 🎉

**Prochaines étapes (hors scope formation) :**

- Déployer sur un hébergeur de production
- Créer de vraies adresses email (@histoireassociation.be)
- Ajouter plus de contenu régulièrement
- Promouvoir le site sur les réseaux sociaux

---

**Bon courage ! Tu vas y arriver ! 💪**

_N'hésite pas à revenir vers moi si tu bloques sur une étape._
