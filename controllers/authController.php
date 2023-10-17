<?php
function showLogin(){
   
    global $base_url;

    global $base_url;
    global $isConnected;
    
    if ($isConnected) {
        header("Location: $base_url");
    }
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $user = $_POST["username"]; 
        $password = $_POST["password"];

        $verif = login($user, $password);
        if ($verif) {
            header("Location: $base_url");
        } else {
            echo "Merci de vérifier !";
        }
    } showLoginPage();
};

function Subscription(){
    global $base_url;

    if ($_POST){
        $gender = $_POST['gender']; 
         $username = $_POST['username']; 
          $email  = $_POST['email']; 
           $password = $_POST['password']; 
           $confirmed_password = $_POST['confirmation_password']; 
          
            $image_name = null; 
        
            if (!empty($_FILES['profile_img']['name'])) {
                $image_name = time() . '_' . $_FILES['profile_img']['name'];
        
                $temp_folder = $_FILES['profile_img']['tmp_name'];
                $upload_folder = ROOT_PATH . "/uploads/" . $image_name;
                
                $result = move_uploaded_file($temp_folder, $upload_folder);
                if (!$result) {
                    echo "Merci de vérifier l'image.";
                }
            }
            if ($gender && $image_name && $username && $email && $password) {
              
                if ($password === $confirmed_password) {

                    $connexion = register($gender, $image_name, $username, $email, $password);
                        
                    if ($connexion) header("location:$base_url?page=login");
                            else echo '<p class="message px-2">Merci de vérifier !</p>';
                        } else {
                            echo '<p class="message px-2">Les mots de passe ne correspondent pas.</p>';
            }  
    } 
};showRegisterPage();
   

};
    

function logOut(){
    global $base_url;
        session_destroy();
        header("location: $base_url");
    };
?>
<?php

   
