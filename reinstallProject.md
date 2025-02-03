# Projet Recette 🍲

## Installation 🛠️

Pour installer le projet en local, suivez les étapes ci-dessous :

1. **Cloner le dépôt :** 📂
    ```bash
    git clone Le_Repo_De_Mon_Projet
    cd Tp_projet_recette
    ```

2. **Installer les dépendances :** 📦
    ```bash
    composer install
    ```

3. **Configurer les variables d'environnement :** 🔧
    Copiez le fichier `.env` en `.env.local` et modifiez les valeurs selon votre configuration locale.
    ```bash
    cp .env .env.local
    ```

4. **Mettre à jour le schéma de la base de données :** 🗄️

    * dans le `.env.local` mettre la variable pour la connexion à la BDD
    * ensuite :
        ```bash
        php bin/console doctrine:database:create
        ```
    * supprimer les migrations puis :
        ```bash
        php bin/console make:migration
        php bin/console d:m:m
        ```

5. **Récupérer le code .env à intégrer sur [Mailtrap](https://mailtrap.io/)** 📧

6. **Démarrer Messenger** 📨

    Pour qu'il puisse gérer les tâches asynchrone comme l'envoi de mail

    ```bash
    php bin/console messenger:consume async -vv
    ```

7. **Lancer le serveur de développement :** 🚀
    ```bash
    symfony server:start
    ```

Votre projet Symfony 7 est maintenant installé et accessible à l'adresse `http://localhost:8000`. 🎉