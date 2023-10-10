<?php 

function showCreatePost() {   
    global $base_url;
    
        if ($_POST && $_POST['post_title'] && $_POST['post_content']) {                         
            $post = createPost( $_SESSION['users']['id'], $_POST['post_title'], $_POST['post_content']);
            if($post){
                echo '<p class="message px-2">Publication créée !</p>';  
            }
            else {
            echo '<p class="message px-2">Merci de vérifier !</p>';  
            } 
        }                 
        showHomePage();
};

function showPost($id)
{
    $post = getPost($id);
    $comment = getComments($id);
    global $base_url;
    if ($_POST && $_POST['content']) {
        createComment($_SESSION['users']['id'], $id, $_POST['content']) ;
        echo '<p class="message px-2">Commentaire ajouté !</p>'; 
           
        showHomePage();
    }


    if (sizeof($post)) {
        $post = $post[0];
       
    }
    else {
        echo "This post doesn't exist";
    }
};
?>