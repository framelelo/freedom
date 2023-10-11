<?php function UpdateAction(){
    global $base_url;
    global $isConnected;
    if ($isConnected){
        if ($_POST && $_POST['gender'] && $_POST['username'] && $_POST['email'] && $_POST['password']) {
        
            $update = modify( $_POST['gender'],  $_POST['username'],$_POST['email'], $_POST['password']);
    
            if ($update) header("location:$base_url?page=profile");
                else echo '<p class="message px-2">Merci de vérifier !</p>';
         }
    }
   

    showUpdatePage();

};

?>