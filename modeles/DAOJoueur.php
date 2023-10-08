<?php
include_once('PDOMySQLConnector.php');

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

    public static function ajouterJoueur(string $nom, string $prenom, int $age)
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
