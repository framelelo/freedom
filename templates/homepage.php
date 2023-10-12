<?php
function showHomePage($posts) {
$title="accueil";
        global $isConnected;
        ob_start();
?>
    <h1><?= $title?></h1>
    <div class="container container_form px-4">

  <!-- SHOW POSTS -->
        <?php if ($isConnected){?>
            <form method="POST" action="<?php $base_url?>?page=publish&a=create">
                <div class="form-group mb-3">           
                    <div class="custom-file">
                        <label class="label" for="post_picture">Ajouter une photo</label>
                        <br>
                        <input type="file" class="upload_picture" name="post_img" id="post_picture" accept=".png,.jpg,.jpeg,.webp">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class='label' for="post_title">Titre</label>
                    <input type="text" class="form-control" name="post_title" placeholder="Titre" required>
                </div>
        
                <div class="form-group">
                    <label class='label' for="article">Votre article</label>
                    <textarea class="form-control" name="post_content" rows="5" required></textarea>
                </div>
                <div class="right my-5">
                    <button type="submit" class="btn btn-primary">PUBLIER</button>
                </div>
            </form>  
            
            <!-- SHOW COMMENTS -->
        <?php };
        foreach($posts as $post){ 
            echo $post['id'] . "<br>"; 
            echo $post['title'] . "<br>"; 
            echo $post['img'] . "<br>"; 
            echo $post['text'] . "<br>"; 
            echo $post['date'];
            
        // Si l'utilisateur est connecté, on affiche le formulaire de commentaire
        if ($isConnected) { ?>
            <form method="post" action="<?php $base_url?>?page=comment&a=create&id_status=<?= $post["id"] ?>">
                <textarea name="content" placeholder="Commenter ..." cols="30" rows="1"></textarea>
                <input type="submit" value="Commenter">
            </form>

        <?php }
        // On récupère tous les commentaires du statut
        $comments = getAllCommentsById($post["id"]);
        foreach ($comments as $c) { ?>
            <p><?= $c["text"] ?> 
            </p>
    <?php }
    } ?>
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

