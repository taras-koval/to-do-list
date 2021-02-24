<?php

class Database
{

    public static function getConnection()
    {
        $params = include(ROOT . '/config/db.php');

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        try {
            $dbh = new PDO(
                $dsn, 
                $params['user'], 
                $params['password'],
                // Persistent connections
                [PDO::ATTR_PERSISTENT => true]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $dbh->exec("set names utf8");

        return $dbh;
    }

}

?>