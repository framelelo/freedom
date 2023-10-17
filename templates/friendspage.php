<?php
function showFriendPage($friends, $suggestions) {
$title="amis";
        global $isConnected;
        ob_start();
?>
    <div class="container p-4">
    
    <div class='row'>
            <?php if($friends) {?>
                <h1><?= $title?></h1>
                <?php foreach($friends as $friend) { ?>
                <div class='col-md-5 card my-3 p-3'> 
                    <div class='img'>
                        <img src='uploads/<?=getUserImage($friend['id'])?>' alt='<?= getUserImage($friend['id'])?>'>
                </div>
                    <p><?= getUsername($friend['id'])?></p>
                    <a href="?page=managefriends&a=delete&id_friend=<?= $friend["id"] ?>" type="submit" class="btn btn-primary">SUPPRIMER</a>
                
            </div>
            
        <?php };
            echo '<hr>';
    }; ?>
    </div>
    <div class='row'>
        
        <?php if($suggestions) {
            echo ' <h2>Suggestions</h2>';
        }
        else {
            echo ' <h2 class ="text-center">Pas de suggestions pour le moment !</h2>';

        }
        
        foreach($suggestions as $suggestion) { ?>
            <div class='col-md-5 card my-3 p-3'> 
                <div class='img'>
                    <img src='uploads/<?= $suggestion['img']?>' alt='<?= $suggestion['img']?>'>
        </div>
                <p><?php echo ($suggestion['username'])?></p>
                <a href="?page=managefriends&a=add&id_friend=<?= $suggestion["id"] ?>" type="submit" class="btn btn-primary">AJOUTER</a>
               
            </div>
        <?php }; ?>
    </div>
    </div>
<?php  

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

