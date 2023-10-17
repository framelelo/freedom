<?php function UpdateAction(){
    global $base_url;
    global $isConnected;
    if ($isConnected){

        if ($_POST){
            $gender = $_POST['gender']; 
             $username = $_POST['username']; 
              $email  = $_POST['email']; 
               $password = $_POST['password']; 
              
                $image_name = null; 
            
                if (!empty($_FILES['profile_img']['name'])) {
                    $image_name = time() . '_' . $_FILES['profile_img']['name'];
            
                    $temp_folder = $_FILES['profile_img']['tmp_name'];
                    $upload_folder = ROOT_PATH . "/uploads/" . $image_name;
                    
                    $result = move_uploaded_file($temp_folder, $upload_folder);
                    if (!$result) {
                        echo "Merci de vérifier.";
                    }
                }
                $update = modify( $gender, $image_name, $username, $email, $password);
    
            if ($update) header("location:$base_url?page=profile");
                else echo '<p class="message px-2">Merci de vérifier !</p>';
         }
        } 

    showUpdatePage();

};

?>