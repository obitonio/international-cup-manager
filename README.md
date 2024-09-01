# International-cup-manager

Ceci est le socle de l'application cup manager.  
 **Vous devez compléter/modifier le code pour respecter les fonctionnalités attendues.**

## Mise en place

### IDE

Il est recommandé d'utiliser [Visual studio code](https://code.visualstudio.com/) et d'installer ces extensions :

- [PHP intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) : Fournit l'autocomplétion en PHP
- [Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode) : Formate automatiquement le code

### Technologies

1. une **base de données mysql**, vous pouvez l'héberger en ligne gratuitement [quelques exemples ici](#liens-utiles) ou [l'héberger localement avec wamp](https://www.wampserver.com/).

2. Un serveur Apache avec PHP pour tester localement votre site vous pouvez la aussi utiliser [Wamp](https://www.wampserver.com/).

## Architecture MVC (Modèles Vues Controleurs)

Une bonne pratique pour organiser un projet est de découper les fichiers en fonction de leur responsabilité, c'est ce que propose l'architecture [MVC](https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur).  
Le projet est découpé en trois parties :

### **I. Le dossier "vues" (Affichage)**

Il contient toutes les pages HTML de l'application.

#### a) L'index.html

C'est le point d'entrée de l'application, du javascript est exécuté sur plusieurs [écouteurs/listeners](https://www.pierre-giraud.com/javascript-apprendre-coder-cours/addeventlistener-gestion-evenement/) :

- [ready](https://www.freecodecamp.org/news/javascript-document-ready-jquery-example/) : Exécuté lorsque la page à fini de se charger ou à fini de se raffraichir
- [submit](https://fr.javascript.info/forms-submit) : Exécuté quand le formulaire d'ajout de joueur est soumis via la bouton Ajouter

#### b) Le dossier "js"

Regroupe tous le javascript avec les requêtes [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>) pour communiquer avec le serveur PHP.

**Chacune de ces fonctions est [asynchrone](https://fr.javascript.info/async-await), il est important d'attendre la fin de la fonction avec le mot-clé `await` ou en ajoutant la fonction `then`**

### **II. Le dossier "modeles" (Données)**

C'est la partie serveur du projet faite en PHP

#### a) PDOMySQLConnector.php

Le fichier `PDOMySQLConnector.php` gère la connexion à la base de données et rends accessible une connexion à la base de données sous la forme d'un [singleton](<https://fr.wikipedia.org/wiki/Singleton_(patron_de_conception)>).

#### b) Les DAO (Data Access Object)

La classe `DAOJoueur` regroupe toutes les fonctions qui requêtent la table joueur de la base de données.

Note : Il faudra créer un DAO par table dans la base de données.

### **III. Le dossier "controleurs" (Logique métier)**

La classe `JoueurController` permet de gérer le traitement de toutes les requêtes [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>) concernant les opérations sur les joueurs.

```php
    if (isset($_POST['action'])) { // Gestion des requêtes POST avec un paramètre action
            $code = $_POST['action'];
            switch ($code) {
                case '0':
                    echo JoueurController::ajouterJoueur();
                    break;
            }
        } else if (isset($_GET["resource"])) { // Gestion des requêtes GET avec resource
            $ressource = $_GET['resource'];
            switch ($ressource) {
                case 'joueurs':
                    echo JoueurController::getAll();
                    break;
            }
        }

```

## Dépendance installée

- [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/) : Fourni des composants et des classes CSS.

## Liens utiles

- [Comprendre la syntaxe await en js](https://fr.javascript.info/async-await)
- [Utilisation du connecteur PDO](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-accedez-aux-donnees-en-php-avec-pdo)

- Des exemples d'hébergeur gratuit
  - [InfinityFree](https://www.infinityfree.com/)
  - [HelioHost](https://heliohost.org/)
  - [000webhost](https://fr.000webhost.com/)
