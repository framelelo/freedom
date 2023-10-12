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
            <form method="POST" action="<?php $base_url?>?page=publish&a=create" class="form_publish bg-color mb-5 p-3">
                <div class="form-group mb-3">
                    <label class='label' for="post_title">Titre</label>
                    <input type="text" class="form-control" name="post_title" placeholder="Titre" required>
                </div>
        
                <div class="form-group">
                    <label class='label' for="article">Votre article</label>
                    <textarea class="form-control" name="post_content" rows="5" required></textarea>
                </div>
                <div class="right mt-3">
                    <button type="submit" class="btn btn-primary">PUBLIER</button>
                </div>
            </form>  
            
            <!-- SHOW COMMENTS -->
        <?php };
        foreach($posts as $post){ ?>
                    <div class="card p-3 mb-4 text-center">
                        <div class="card-body">
                            <h2 class="card-title"><?= $post['title'] ?></h2>
                            <p class="card-text"><?= $post['text'] ?></p>
                            <p class="card-text"><span><?=getUsername($post['id_user'])?></span><?= $post['date'] ?></p> 
                        </div>
                        <div class="card-footer">
                   
                
                
                <?php if ($isConnected) { ?>
            <form class="pt-4" method="post" action="<?php $base_url?>?page=comment&a=create&id_status=<?= $post["id"] ?>">
                <textarea name="content" placeholder="Commenter ..." cols="30" rows="2"></textarea>
                <div class="right my-2">
                    <button type="submit" class="btn btn-primary w-100">Commenter</button>
                </div>
            </form>

        <?php }
        
        $comments = getAllCommentsById($post["id"]);
        foreach ($comments as $comment) { ?>
            <p><?= $comment["text"] ?> - <?=getUsername($comment['id_user']) ?>
            </p>
    <?php } echo '</div> </div>';
    } ?>
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

