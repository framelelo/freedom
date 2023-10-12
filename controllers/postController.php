<?php 

function CreatePostAction() { 
    global $isConnected;  
    global $base_url;
    if($isConnected) {
        
        if ($_POST['post_content']) {                         
            $post = createPost( $_SESSION['users']['id'], $_POST['post_img'], $_POST['post_title'], $_POST['post_content']);
            if($post){
                header("location: $base_url");
            }
            else {
                echo '<p class="message px-2">Merci de vérifier !</p>';  
            } 
        }            
        } else header("location: $base_url?page=login");
    }

?>