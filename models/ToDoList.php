 <?php

class ToDoList
{

    public static function create($title, $userId)
    {
        $db = Database::getConnection();

        $sql = "INSERT INTO list (title, user_id) VALUES (:title, :user_id)";

        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function read($userId)
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT * FROM list WHERE user_id = $userId"); 
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function readByListId($listId)
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT * FROM list WHERE id = $listId"); 
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>