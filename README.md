# Projet-CineSpin
# Plateforme de Gestion de Films

Une application web pour gérer des utilisateurs, leurs abonnements, et une base de films avec catégories, intégrant l'API TMDB pour enrichir les données des films.

## Table des matières
- [Description](#description)
- [Fonctionnalités](#fonctionnalités)
- [Technologies](#technologies)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Structure du projet](#structure-du-projet)
- [API Endpoints](#api-endpoints)
- [Contribuer](#contribuer)
- [Licence](#licence)

## Description
Ce projet est une plateforme permettant aux utilisateurs de s'inscrire, choisir un abonnement, et explorer des films organisés par catégories. Les données des films sont importées depuis l'API TMDB (The Movie Database) et stockées localement. Le backend est construit avec Symfony et API Platform, tandis que le frontend utilise React pour une interface utilisateur dynamique.

## Fonctionnalités
- Gestion des utilisateurs (inscription, profil, abonnements).
- Gestion des abonnements (plans comme "Premium" ou "Basic").
- Catalogue de films avec titre, synopsis, date de sortie, note moyenne, et catégories.
- Intégration de l'API TMDB pour importer des films populaires, détails, ou recherches.
- Frontend React pour afficher les films et gérer les profils utilisateurs.

## Technologies
- **Backend** :
  - PHP 8.x
  - Symfony 6.x
  - API Platform
  - Doctrine ORM
  - MySQL/PostgreSQL
- **Frontend** :
  - React 18.x
  - Axios (pour les requêtes API)
- **API externe** :
  - TMDB API (v3)
- **Outils** :
  - Composer
  - Node.js / npm
  - Git

## Prérequis
- PHP 8.x
- Composer
- Node.js et npm
- MySQL/PostgreSQL
- Une clé API TMDB (obtenue sur [themoviedb.org](https://www.themoviedb.org/))

## Installation

### Backend
1. Clone le dépôt :
   ```bash
   git clone https://github.com/ton_utilisateur/ton_projet.git
   cd ton_projet
