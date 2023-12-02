<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# WEB-WORK2

Ce projet est une application web pour gérer un inventaire d'actions vendues. Il est construit à l'aide de laravel, et utilise Docker pour l'environnement de développement.

<img src="img/preview.png" alt="website screenshot">

## Prérequis

- Docker
- Docker Compose

## Installation

Clonez ce dépôt sur votre machine locale :

```bash
git git@github.com:apirakas/WEB-WORK2.git
```

Construisez et démarrez les conteneurs Docker :

```bash
docker-compose up -d
```

## Utilisation

Pour démarrer l'application, utilisez la commande suivante :

```bash
docker exec nom_du_conteneur_web php artisan serve
```
Ouvrez votre navigateur web et accédez à http://localhost:8000 pour voir l'application en action.


Pour peupler la base de données avec des données de test, utilisez la commande suivante :
> [!IMPORTANT]  
> Toutes les devises sont autorisées mais c'est uniquement pour un exmeple de fonctionnement de l'application.

```bash
docker exec nom_du_conteneur_web php artisan db:seed --class=ActionsTableSeeder
```

Fonctionnalités
- Affichage d'un inventaire de ventes d'actions
- Ajout de nouvelles ventes d'actions
- Modification de ventes d'actions existantes
- Suppression de ventes d'actions


