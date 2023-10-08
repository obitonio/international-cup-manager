# International-cup-manager

## Mise en place

Il est recommandé d'utiliser l'IDE [Visual studio code](https://code.visualstudio.com/) et d'installer les extensions recommandées :

- [PHP intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) : Fournit l'autocomplétion en PHP

Ceci est le socle pour l'application demandé à titre d'exemple. **Vous devez modifier le code pour respecter les fonctionnalités attendues.**

## Architecture MVC (Modèles Vues Controleurs)

Le projet est découpé en trois parties :

### **I. Le dossier "vues"**
Ce dossier contient toutes les pages de l'application.
#### a) L'index.html

C'est le point d'entrée de l'application, du javascript est exécuté sur plusieurs [listeners](https://www.pierre-giraud.com/javascript-apprendre-coder-cours/addeventlistener-gestion-evenement/) :

- [ready](https://www.freecodecamp.org/news/javascript-document-ready-jquery-example/) : Exécuté lorsque la page à fini de se charger ou à fini de se raffraichir
- [submit](https://fr.javascript.info/forms-submit) : Exécuté quand le formulaire d'ajout de joueur est soumis via la bouton Ajouter

#### b) Le dossier "js"
Regroupe toutes les requêtes [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>) pour communiquer avec la base de données.

**Chacune de ces fonctions est [asynchrone](https://fr.javascript.info/async-await), il est important d'attendre la fin de la fonction avec le mot-clé `await` ou en ajoutant la fonction `then`**

### **II. Le dossier "modeles"**

C'est la partie serveur du projet faite en PHP

#### a) PDOMySQLConnector.php

Le fichier `PDOMySQLConnector.php` gère la connexion à la base de données et rends accessible une connexion à la base de données sous la forme d'un [singleton](<https://fr.wikipedia.org/wiki/Singleton_(patron_de_conception)>).

#### b) Les DAO (Data Access Object)

La classe `DAOJoueur` regroupe toutes les fonctions qui requêtent la table joueur de la base de données.

Note : Il faudra créer un DAO par table dans la base de données.


### **III. Le dossier "controleurs"**

La classe JoueurController permet de gérer le traitement de toutes les requêtes AJAX concernant les opérations sur les joueurs. [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>)

```php
    if (isset($_POST['action'])) { // Gestion des requêtes POST avec action
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


