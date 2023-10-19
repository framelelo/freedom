<?php
function showHomePage($posts) {
$title="accueil";
        global $isConnected;
        global $base_url;
        ob_start();

?>
    <div class="container px-4">

  <!-- SHOW POSTS -->
        <?php if ($isConnected){?>

            <form method="POST" action="<?php $base_url?>?page=publish&a=create" class="form_publish bg-color mb-5 p-3" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <h3>Exprimez-vous !</h3>
                    <input type="file" class="form-control" name="post_img" accept= '.jpeg,.png,.jpg'>
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
            
            <!-- SHOW POSTS -->
        <?php };
        foreach($posts as $post){?>
        
                    <div class="card posts p-3 mb-4">
                        <div class="card-top mb-3">
                            <span class='img'>
                                <img class='w-100' src='uploads/<?=getUserImage($post['id_user'])?>?<?= time() ?>' alt='<?= getUserImage($post['id_user'])?>'>
                            </span>
                            <p class="card-text username"><span><?=getUsername($post['id_user'])?></span></p> 
                        </div>

                        <p class='img_post mb-4'>
                            <img src="uploads/<?= $post['img'] ?>" alt="<?= $post['title']?>" class='w-100'>
                        </p>
                        <div class="card-body flex">
                            <div class="text_part">
                                <h2><?= $post['title'] ?></h2>
                                <p class="card-text"><?= $post['text'] ?></p>
                            </div>
                            <div class="likes">
                                <?php if ($isConnected) { 
                                    if (isLiked($_SESSION["users"]["id"], $post["id"])) {
                                        $action = "delete";
                                        $value = '<i class="fas fa-thumbs-down"></i>';
                                    } else {
                                        $action = "create";
                                        $value = '<i class="fas fa-thumbs-up"></i>';
                                    }
                                ?>
                                <a href="?page=likes&a=<?= $action ?>&id_post=<?= $post["id"] ?>"> <?= $value ?></a>
                                <?php };?>

                            </div>
                        </div>
                 
                <?php if ($isConnected) { ?>
                    <div class="card-footer mb-4">
                        <form class="pt-4" method="post" action="<?php $base_url?>?page=comment&a=create&id_status=<?= $post["id"] ?>">
                            <textarea name="content" placeholder="Commenter ..." cols="30" rows="2"></textarea>
                            <div class="right my-2">
                                <button type="submit" class="btn btn-primary w-100">VALIDER</button>
                            </div>
                            
                    </div>
            </form>

        <?php };
        
        $comments = getAllCommentsById($post["id"]);
        foreach ($comments as $comment) { ?>
           
            <div class="comments-part flex"><p><?= $comment["text"] ?></p>  <span><?=getUsername($comment['id_user']) ?></span>
        </div>
    <?php } echo '</div>';
    } ?>
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

