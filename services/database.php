<?php

class PDOMySQLConnector
{
    private static $mysqlClient;

    public static function getClient() {
        if (self::$mysqlClient == null) {
            self::$mysqlClient = new PDO('mysql:host=localhost;dbname=cup-manager;charset=utf8', 'root', '');
        }
        return self::$mysqlClient;
    }
}


