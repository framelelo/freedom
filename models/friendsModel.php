<?php
function showFriend() 
{ 
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM friends");

         $query->execute([]);
        
        $friends = $query->fetchAll(PDO::FETCH_ASSOC);
            return $friends;
        
    }  catch (PDOEXCEPTION $e) {
       
        return false;
    
    }

    return false;
}


function showSuggestion($myid) 
    { 
        global $pdo;
        try {$query = $pdo->prepare("SELECT u.* FROM `users` as u where u.id != :id 
        AND u.id not in (SELECT f.id_friend from friends as f where f.id_user = :id) 
        AND u.id not in (SELECT f.id_user from friends as f where f.id_friend = :id)");
            $query->execute([
                'id' => $myid,
            ]);
            
            $suggestions = $query->fetchAll();
                return $suggestions;
            
        }  catch (PDOEXCEPTION $e) {
           
            return false;
        
        }

    }

  function removeFriends($id_friend){ 
       
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM friends WHERE id = :f");
        $query->execute([
            "f" => $id_friend,
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

}
function addFriend($id_user, $id_friend) 
    {
        global $pdo;
        try {
            $query = $pdo->prepare("INSERT INTO friends (id_user,id_friend, date) VALUES (:u,:f, :d)");
            $query->execute([
                "u" => $id_user,
                "f" => $id_friend,
                "d" => date("Y-m-d H:i:s")
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    

?>
