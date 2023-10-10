<?php

function login($username, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("SELECT * FROM users WHERE username = :u");
        $query->execute(['u' => $username]);
    
        $user = $query->fetch();
    
        if($user && password_verify($password, $user['password'])) {

            $_SESSION["users"] = $user;
            return true;
}

    } catch (PDOEXCEPTION $e) {
            return false;
        }
        return false;
}

function register ($gender,$username, $email, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("INSERT INTO users (gender, username, email, password, date) VALUES (:g, :u,:e,:p,:d)");
        $query->execute([
            'g' => $gender,
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
}?>