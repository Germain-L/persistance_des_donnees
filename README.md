# Application de Gestion de Bibliothèque
Projet de : 
- [x] **Germain LEIGNEL**
- [x] **Marco-Olivier CAS**

Cette application web de gestion de bibliothèque est construite en utilisant Symfony et les templates Twig. L'application vous permet de gérer diverses entités telles que `Adherent`, `Auteur`, `Categorie`, `Emprunt`, et `Livre`. Chaque entité comprend un ensemble d'opérations comme `Créer`, `Lire`, `Mettre à jour`, et `Supprimer`.

## Comment Utiliser l'Application Web

### Adherent

Un `Adherent` est un membre de la bibliothèque. Vous pouvez gérer les `Adherent` depuis la page d'index de `Adherent`. Ici, vous pouvez voir tous les `Adherents`, ajouter un nouvel `Adherent`, modifier les `Adherents` existants, ou supprimer des `Adherents`.

- **Créer** : Cliquez sur le lien "Créer nouveau" en bas de la page d'index de `Adherent` pour ajouter un nouvel `Adherent`.
- **Lire** : Cliquez sur le lien "afficher" dans la colonne `actions` pour voir les détails d'un `Adherent`.
- **Mettre à jour** : Cliquez sur le lien "modifier" dans la colonne `actions` pour mettre à jour les informations d'un `Adherent`.
- **Supprimer** : Le bouton de suppression est disponible sur la page de détails de `Adherent`.

### Auteur

L'entité `Auteur` représente les auteurs des livres de la bibliothèque. De manière similaire à `Adherent`, vous pouvez créer, lire, mettre à jour et supprimer `Auteur`.

### Categorie

L'entité `Categorie` représente les catégories des livres de la bibliothèque. Les opérations sont similaires à `Adherent` et `Auteur`.

### Emprunt

L'entité `Emprunt` représente les prêts des livres par les `Adherents`. Les opérations sont similaires à `Adherent`, `Auteur` et `Categorie`.

### Livre

L'entité `Livre` représente les livres de la bibliothèque. Les opérations sont similaires à `Adherent`, `Auteur`, `Categorie` et `Emprunt`.

## Comment Exécuter l'Application Web

Avant de pouvoir utiliser cette application, vous devez l'installer sur votre machine locale.

1. **Clonez le dépôt** : Utilisez la commande `git clone <url-du-dépôt>` pour cloner le dépôt sur votre machine locale.

2. **Installez les dépendances** : Utilisez la commande `composer install` pour installer toutes les dépendances nécessaires.

3. **Démarrer le serveur** : Utilisez la commande `symfony server:start` pour démarrer le serveur Symfony.

4. **Ouvrez l'application** : Ouvrez votre navigateur web préféré et naviguez jusqu'à `http://localhost:8000` pour commencer à utiliser l'application.