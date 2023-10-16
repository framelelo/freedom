<?php 

function CreatePostAction() { 
    
    global $isConnected;  
    global $base_url;
    if($isConnected) {
        
        if ($_POST['post_content']) {                  
            $post = createPost( $_SESSION['users']['id'], $_FILES['post_img'], $_POST['post_title'], $_POST['post_content']);
            
            if($post){
                if(!empty($_FILES['post_img']['name'])) {    
                                  
                    $image_name = time() . '_' . $_FILES['post_img']['name'];
                    $temp_folder = $_FILES['post_img']['tmp_name'];
                    $upload_folder = ROOT_PATH . "/uploads/".$image_name; 
                    
                    $result = move_uploaded_file($temp_folder, $upload_folder);
                    if($result) {
                        $_FILES['post_img']=  $_POST['post_img'];
                    }   
                    
                   } 
                
                 header("location: $base_url");
            }
            else {
                echo '<p class="message px-2">Merci de vérifier !</p>';  
            } 
        }            
        } else header("location: $base_url?page=login");
    }

?>