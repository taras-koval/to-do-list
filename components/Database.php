<?php

class Database
{

    public static function getConnection()
    {
        $params = include(ROOT . '/config/db.php');

        $dsn = "mysql:host={$params['host']};dbname={$params['db']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];

        try {
            $dbh = new PDO($dsn, $params['user'], $params['pass'], $options);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }

        $dbh->exec("set names utf8");

        return $dbh;
    }

}

?>