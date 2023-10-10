<?php
function showHomePage() {
$title="accueil";
        global $isConnected;
        $posts = getPosts();
    global $base_url;
        ob_start();
?>
    <h1><?= $title?></h1>
    <div class="container container_form px-4">
        <?php if ($isConnected){?>
            <form method="POST" action="<?php $base_url?>?page=publish">
                <div class="form-group mb-3">           
                    <div class="custom-file">
                        <label class="label" for="post_picture">Ajouter une photo</label>
                        <br>
                        <input type="file" class="upload_picture" id="post_picture" accept=".png,.jpg,.jpeg,.webp">
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
        <?php };
        foreach($posts as $post){ echo 
        $post['title']?>
            <div class="comment-section m-3">
                    <?php if ($GLOBALS['isConnected']) {?>
                    <form action="<?php $base_url?>?page=comment" method="POST">
                        <textarea name="content" class="my-2" rows="5">  </textarea>
                        <button type="submit"  class="btn btn-primary my-3">Commenter</button>
                    </form>
                <?php };?>
            </div> 
        <?php };?>
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

