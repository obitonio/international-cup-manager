<?php
include_once('../modeles/DAOJoueur.php');

JoueurControleur::handleRequest(); // Démarrage du contrôleur

class JoueurControleur
{

    public static function handleRequest()
    {
        if (isset($_POST['action'])) { // Gestion des requêtes POST avec action
            $code = $_POST['action'];
            switch ($code) {
                case '0':
                    echo JoueurControleur::ajouterJoueur();
                    break;
            }
        } else if (isset($_GET["resource"])) { // Gestion des requêtes GET avec resource
            $ressource = $_GET['resource'];
            switch ($ressource) {
                case 'joueurs':
                    echo JoueurControleur::getAll();
                    break;
            }
        }
    }

    public static function getAll()
    {
        $joueur = DAOJoueur::getAll();
        return json_encode($joueur); // Encodage au format JSON
    }

    public static function ajouterJoueur()
    {
        if (isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['age'])) {
            $idJoueurEnregistre = DAOJoueur::ajouterJoueur($_POST['nom'], $_POST['prenom'], (int)$_POST['age']);
            return json_encode($idJoueurEnregistre); 
        }
        else {
            return json_encode("Erreur : paramètres manquants");
        }

    }
}