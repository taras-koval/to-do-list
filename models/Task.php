<?php

class Task
{

    public static function create($title, $listId)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO task (title, list_id) VALUES (:title, :list_id)";

        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':list_id', $listId, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function read($listId)
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT * FROM task WHERE list_id = $listId"); 
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function readByTaskId($taskId)
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT * FROM task WHERE id = $taskId"); 
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($taskId, $isDone)
    {
        $db = Database::getConnection();

        $result = $db->prepare("UPDATE task SET is_done = :is_done WHERE id = :id");                                  
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);       
        $result->bindParam(':is_done', $isDone, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function delete($taskId)
    {
        $db = Database::getConnection();

        $result = $db->prepare("DELETE FROM task WHERE id = :id");
        $result->bindParam(':id', $taskId, PDO::PARAM_INT);

        return $result->execute();
    }

}

?>