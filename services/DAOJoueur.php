<?php
include_once('database.php');


if (isset($_POST['code'])) {
    $code = $_POST['code'];
    switch ($code) {
        case '0':
            if (isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['age']))
                echo json_encode(DAOJoueur::addEquipe($_POST['nom'], $_POST['prenom'], (int)$_POST['age']));
            break;
    }
} else if (isset($_GET["resource"])) {
    $ressource = $_GET['resource'];
    switch ($ressource) {
        case 'joueurs':
            echo json_encode(DAOJoueur::getAll());
            break;
    }
}

class DAOJoueur
{
    public static function getAll()
    {
        $mysqlClient = PDOMySQLConnector::getClient();

        $requeteSQL = 'SELECT * FROM joueur';
        $requeteJoueurs = $mysqlClient->prepare($requeteSQL);
        $requeteJoueurs->execute();
        $joueurs = $requeteJoueurs->fetchAll();
        return $joueurs;
    }

    public static function addEquipe(string $nom, string $prenom, int $age)
    {
        $mysqlClient = PDOMySQLConnector::getClient();

        $requeteSQL = 'INSERT INTO joueur(nom, prenom, age) VALUES(:nom, :prenom,:age)';
        $insertionJoueurs = $mysqlClient->prepare($requeteSQL);
        $insertionJoueurs->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
        ]);
        //Renvoi l'identifiant de la derniere insertion
        return $mysqlClient->lastInsertId();
    }
}
