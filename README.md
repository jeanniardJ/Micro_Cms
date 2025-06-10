# Micro CMS

Micro CMS est un projet léger de gestion de contenu (CMS) développé en PHP en suivant les standards de développement modernes.

## Fonctionnalités

- Système de connexion sécurisé.
- Backoffice pour la gestion des contenus.
- Frontoffice pour l'affichage des contenus.
- Architecture MVC avec des modèles CRUD.
- Base de données MySQL.

## Standards et outils

- Respect des standards PSR-4 et PSR-12.
- Tests unitaires avec PHPUnit.
- Analyse statique avec PHPStan.
- CI/CD avec GitHub Actions.

## Installation

1. Clonez le dépôt :

    ```bash
    git clone <url-du-repo>
    ```

2. Installez les dépendances :

    ```bash
    composer install
    ```

3. Configurez le fichier `.env` avec vos paramètres de base de données.
4. Exécutez les migrations SQL :

    ```bash
    php bin/console doctrine:migrations:migrate
    ```

5. Lancez le serveur local :

    ```bash
    php -S localhost:8000 -t public
    ```

## Tests

Pour exécuter les tests :

```bash
vendor/bin/phpunit
```

## Contribution

Les contributions sont les bienvenues. Veuillez soumettre une pull request avec une description claire de vos modifications.

## Licence

Ce projet est sous licence MIT. Consultez le fichier `LICENSE` pour plus d'informations.
