<?php

function homeAction(){
        global $base_url;
        $posts = getPosts();
        
        showHomePage($posts);

        if(!$posts){?>
        <div class="text-center">
                <h2>Rien pour le moment !</h2>

                <p>
                        Créez votre publication : <a href='<?= $base_url ?>?page=login'>Se connecter</a>
                </p>
        </div>
              
        <?php };
};
?>