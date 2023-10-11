<?php
function modify ($gender,$username, $email, $password) {
    global $pdo;

    try {
        $query = $pdo->prepare("UPDATE users SET gender = :g, username = :u, email = :e, password = :p WHERE id = :i") ;
        $query->execute([
            'i' => $_SESSION["users"]["id"],
            'g' => $gender,
            'u' => $username,
            'e' => $email,
            'p' => password_hash($password, PASSWORD_DEFAULT)
        
        ]);
        $_SESSION["users"]["gender"]= $gender;
        $_SESSION["users"]["username"]= $username;
        $_SESSION["users"]["email"] = $email;
        $_SESSION["users"]["password"] = $password;
        
        return true;
        
          
}
    catch (PDOEXCEPTION $e) {
        return false;
}
}?>

