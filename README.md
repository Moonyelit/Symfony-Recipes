# 🍲 RecettesCuisine

## 📖 Description

RecettesCuisine est un projet de site web pour la gestion et le partage des recettes de cuisine. Ce projet a pour but d'apprendre et de comprendre comment utiliser le framework Symfony.

## ✨ Fonctionnalités

- 📝 Inscription et authentification des utilisateurs
- 🍴 Création, modification et suppression de recettes
- 📤 Partage de recettes avec d'autres utilisateurs
- 👀 Consultation des recettes partagées par les autres utilisateurs

## 🛠️ Prérequis

- 🐘 PHP 8.0 ou supérieur
- 📦 Composer
- 🚀 Symfony CLI
- 🌐 Un serveur web (Apache, Nginx, etc.)
- 🗄️ Une base de données (MySQL, PostgreSQL, etc.)

## ⚙️ Installation

1. Clonez le dépôt :

    ```bash
    git clone https://github.com/votre-utilisateur/RecettesCuisine.git
    ```

2. Accédez au répertoire du projet :

    ```bash
    cd RecettesCuisine
    ```

3. Installez les dépendances :

    ```bash
    composer install
    ```

4. Configurez les variables d'environnement en copiant le fichier `.env` :

    ```bash
    cp .env .env.local
    ```

    Modifiez le fichier `.env.local` pour configurer la connexion à votre base de données.

5. Exécutez les migrations de la base de données :

    ```bash
    php bin/console doctrine:migrations:migrate
    ```

6. Démarrez le serveur web de Symfony :

    ```bash
    symfony server:start
    ```

7. Accédez à l'application dans votre navigateur à l'adresse `http://localhost:8000`.

## 🚀 Utilisation

- Inscrivez-vous en tant que nouvel utilisateur.
- Connectez-vous avec vos identifiants.
- Créez, modifiez et partagez vos recettes de cuisine.
- Consultez les recettes partagées par les autres utilisateurs.

## 🤝 Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez suivre les étapes suivantes :

1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/ma-fonctionnalite`).
3. Commitez vos modifications (`git commit -am 'Ajout de ma fonctionnalité'`).
4. Poussez votre branche (`git push origin feature/ma-fonctionnalite`).
5. Créez une Pull Request.

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
