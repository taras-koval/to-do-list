<?php

class User
{

    public static function create($username, $password)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO user (username, password)
            VALUES (:username, :password)";

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function read($id)
    {
        $db = Database::getConnection();

        $sql = "SELECT id, username FROM user WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function login($username, $password)
    {
        $db = Database::getConnection();

        $sql = "SELECT id FROM user
            WHERE username = :username AND password = :password";

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        return $result->fetchColumn();
    }
    
    public static function findUsername($username)
    {
        $db = Database::getConnection();

        $sql = "SELECT id FROM user WHERE username = :username";

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        return $result->fetchColumn();
    }
}

?>