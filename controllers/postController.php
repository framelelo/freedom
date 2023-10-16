<?php 

function CreatePostAction() { 
    
    global $isConnected;  
    global $base_url;
    if($isConnected) {
        
        if ($_POST['post_content']) {
            $user_id = $_SESSION['users']['id'];
            $post_title = $_POST['post_title'];
            $post_content = $_POST['post_content'];
        
            $image_name = null; 
        
            if (!empty($_FILES['post_img']['name'])) {
                $image_name = time() . '_' . $_FILES['post_img']['name'];
        
                $temp_folder = $_FILES['post_img']['tmp_name'];
                $upload_folder = ROOT_PATH . "/uploads/" . $image_name;
                
                $result = move_uploaded_file($temp_folder, $upload_folder);
                if (!$result) {
                    echo "Merci de vérifier.";
                }
            }
            $post = createPost($user_id, $image_name, $post_title, $post_content);
        
            if ($post) {
                header("location: $base_url");
            } else {
                echo '<p class="message px-2">Merci de vérifier !</p>';
            }
        }
                   
        } else header("location: $base_url?page=login");
    }

?>