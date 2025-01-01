# Projet Noël 2024 - Gestion de Ferme

Ce projet est une application web PHP utilisant une architecture MVC pour la gestion d'une ferme. Il comprend trois versions avec des fonctionnalités croissantes.

## Structure du Projet

```
Projet_Noel_2024/
├── V1/               # Version procédurale
├── V2/               # Version Orientée Objet
└── V3/               # Version avec Doctrine ORM et Blade
```

## Technologies Utilisées

- PHP 8.x
- Doctrine ORM
- Blade Template Engine
- MySQL/MariaDB
- Tailwind CSS

## Installation

1. Clonez le dépôt :
```bash
git clone https://github.com/avatarodc/Projet_Noel_TechnoWeb.git
```

2. Installez les dépendances :
```bash
cd V3
composer install
```

3. Configurez la base de données dans `app/config/database.php`

4. Créez le schéma de base de données :
```bash
vendor/bin/doctrine orm:schema-tool:create
```

5. Lancez le serveur :
```bash
cd public
php -S localhost:8000
```

## Fonctionnalités

### V3 - Version Finale
- Gestion des animaux (CRUD)
- Gestion des équipements (CRUD)
- Interface utilisateur moderne avec Tailwind CSS
- Relations entre animaux et équipements

## Structure MVC

```
app/
├── config/
├── Controllers/
├── Models/
└── views/
```

## Auteur
[Votre Nom]

## Licence
Ce projet est réalisé dans le cadre d'un exercice académique.
