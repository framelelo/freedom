<?php
function showLogin(){
   
    global $base_url;

    if ($_POST && $_POST['username'] && $_POST['password']) {                
            
            $connexion = login($_POST['username'], $_POST['password']);
            
            if ($connexion){
                header("location: $base_url");
}
            else {
                echo '<p class="message px-2">Merci de vérifier !</p>';  
            } 
        };   
        showLoginPage();
};

function Subscription(){
    global $base_url;
    if ($_POST && $_POST['gender'] &&  $_POST['username'] && $_POST['email'] && $_POST['password']) {
        if ($_POST['password'] === $_POST['confirmation_password']) {

        $connexion = register($_POST['gender'],  $_POST['username'],$_POST['email'], $_POST['password']);

        if ($connexion) header("location:$base_url?page=login");
            else echo '<p class="message px-2">Merci de vérifier !</p>';
                } else {
        echo '<p class="message px-2">Les mots de passe ne correspondent pas.</p>';
    }
}

    showRegisterPage();

};
    

function logOut(){
    global $base_url;
        session_destroy();
        header("location: $base_url");
    };
?>
