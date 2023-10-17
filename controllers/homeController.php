<?php

function homeAction(){
        global $base_url;
        global $isConnected;
        $posts = getPosts();
        
        showHomePage($posts);

        if(!$posts){?>
        <div class="text-center">
                <h2>Rien pour le moment, Créez votre publication !</h2>
                <?php if(!$isConnected){?>
                <p>
                      L'avanture commence par : <a href='<?= $base_url ?>?page=login'>Se connecter</a>
                </p>
        </div>
              
        <?php }; };
};
?>