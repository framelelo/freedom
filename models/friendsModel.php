<?php

function showFriend($username) 
    { 
        global $pdo;
        try {
            $query = $pdo->prepare("SELECT * FROM users WHERE id_user = :u");
            $query->execute(['u' => $username]);
            
            $user = $query->fetchAll();
          
            if (!$user) {
                return false;
            }
            return true;
        }  catch (PDOEXCEPTION $e) {
           
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
