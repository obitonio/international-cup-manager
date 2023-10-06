<?php
include_once('database.php');


if (isset($_POST['code'])) {
    $code = $_POST['code'];

    switch ($code) {
        case '0':
            echo DAOJoueur::getAll();
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
}
