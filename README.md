# International-cup-manager

## Mise en place

Il est recommandé d'utiliser l'IDE [Visual studio code](https://code.visualstudio.com/) et d'installer les extensions recommandées :

- [PHP intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) : Fournit l'autocomplétion en PHP

Ceci est le socle pour l'application demandé à titre d'exemple. **Vous devez modifier le code pour respecter les fonctionnalités attendues.**

## Architecture

Le projet est découpé en trois parties :

## **I. L'index.html**

C'est le point d'entrée de l'application, du javascript est exécuté sur plusieurs [listeners](https://www.pierre-giraud.com/javascript-apprendre-coder-cours/addeventlistener-gestion-evenement/) :

- [ready](https://www.freecodecamp.org/news/javascript-document-ready-jquery-example/) : Exécuté lorsque la page à fini de se charger ou à fini de se raffraichir
- [submit](https://fr.javascript.info/forms-submit) : Exécuté quand le formulaire d'ajout de joueur est soumis via la bouton Ajouter

## **II. Le dossier js**

Regroupe toutes les requêtes [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>) pour communiquer avec la base de données.

**Chacune de ces fonctions est [asynchrone](https://fr.javascript.info/async-await), il est important d'attendre la fin de la fonction avec le mot-clé `await` ou en ajoutant la fonction `then`**

### **III. Le dossier Services**

C'est la partie serveur du projet faite en PHP

#### a) Database.php

Le fichier `database.php` gère la connexion à la base de données et rends accessible une connexion à la base de données sous la forme d'un [singleton](<https://fr.wikipedia.org/wiki/Singleton_(patron_de_conception)>).

#### b) Les DAO

La première partie du code du fichier correspond au code qui va être éxecuté par les requetes [AJAX](<https://fr.wikipedia.org/wiki/Ajax_(informatique)>)

```php
// Verifie l'existence des variables envoyé par les requetes de type GET ou POST
if (isset($_POST['code'])) {
    $code = $_POST['code'];
    switch ($code) {
        case '0':
            //Recupere les parametre envoyé par le formulaire d'ajout de joueur
            if (isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['age'])) {
                //Renvoit les données au format [JSON](https://fr.wikipedia.org/wiki/JavaScript_Object_Notation)
                echo json_encode(DAOJoueur::addEquipe($_POST['nom'], $_POST['prenom'], (int)$_POST['age']));
            }
            break;
    }

```

La classe `DAOJoueur` regroupe toutes les fonctions qui requêtent la table joueur de la base de données.

Note : Il faudra créer un DAO par table dans la base de données.
