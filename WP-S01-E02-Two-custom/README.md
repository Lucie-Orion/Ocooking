# Utilisation du pattern

## Liste des étapes

- Cloner le repo `git clone ...`, renommer le dossier avec le nom du projet souhaité `mv <anciennom> <nouveaunom>`, puis se rendre dans le dossier nouvellement créé `cd nouveaunom`
- Supprimer le dossier `.git` afin de ne pas écraser le repo pattern d'origine `sudo rm -R .git`
- Initialiser `git` dans notre dossier du projet `git init`
- Installation de nos dépendances avec composer `composer install`
- Création de la BDD
- Création du fichier `wp-config.php` à partir du fichier `wp-config-sample.php`
    - Renseigner les informations de connexion à la BDD
    - Renseigner les clé de salages [URL pratique](https://api.wordpress.org/secret-key/1.1/salt/)
    - Renseigner la constante `WP_CONTENT_URL` avec notre URL locale
- Changer les droits des fichiers/dossiers de notre projet:
    ```bash
    sudo chown -R <user>:www-data .
    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +
    sudo chmod 644 .htaccess
    ```
- Se rendre sur notre URL local pour terminer l'installation de WordPress
- Penser à changer l'url de la home de WordPress _(Admin BO / Réglages / Général)_

