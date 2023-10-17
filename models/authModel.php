<?php

function login($username, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM users WHERE username = :u");
        $query->execute(['u' => $username]);
    
        $user = $query->fetch();
        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user["password"])) {
            return false;
        }

        $_SESSION["users"] = $user;
        
        return true;
    }  catch (PDOEXCEPTION $e) {
            return false;
        }
        return false;
}

function register ($gender,$image_name, $username, $email, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO users (gender, img, username, email, password, date) VALUES (:g,:i, :u,:e,:p,:d)");
        $query->execute([
            'g' => $gender,
            'i' => $image_name,
            'u' => $username,
            'e' => $email,
            'p' => password_hash($password, PASSWORD_DEFAULT),
            'd' => date("Y-m-d H:i:s")
        
        ]);
            return true;
           
}
    catch (PDOEXCEPTION $e) {
        return false;
}
}

function getUsername($id)
{
    global $pdo;
    $query = $pdo->prepare("SELECT username FROM users WHERE id = :id");
    $query->execute([
        "id" => $id
    ]);
    $user = $query->fetch();
    return $user["username"];
}

function getUserImage($id)
{
    global $pdo;
     try {
        $query = $pdo->prepare("SELECT img FROM users WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
    
    $user = $query->fetch();
    return $user["img"];
 
    }  catch (PDOEXCEPTION $e) {
            return false;
        }
        return false;
}

?>