# International-cup-manager

Ceci est le socle pour l'application demandé à titre d'example **Vous devez modifier le code pour respecter les fonctionnalitées attendues**

## Architecture

Le projet est découpé en deux parties :

### **I. Le dossier Services**
C'est la partie serveur du projet faite en PHP

#### a) Database.php

Le fichier `database.php` gère la connexion à la base de données et rends accessible une connexion à la base de données sous la forme d'un [singleton](https://fr.wikipedia.org/wiki/Singleton_(patron_de_conception))

#### b) Les DAO




La class `DAOJoueur` regroupe toutes les fonctions qui requête la table joueur de la base de données.

Il faudra créer un DAO par table dans la base de données.



