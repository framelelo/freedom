<?php
function showFriendPage($friends, $suggestions) {
$title="amis";
        global $isConnected;
        ob_start();
?>
    <div class="container p-4">
    <h1><?= $title?></h1>
    <div class='row'>
            <?php foreach($friends as $friend) { ?>
            <div class='col-md-5 card my-3 p-3'> 
                <p><?= getUsername($friend['id_friend'])?></p>
                <a href="?page=managefriends&a=delete&id_friend=<?= $friend["id"] ?>" type="submit" class="btn btn-primary">SUPPRIMER</a>
                
            </div>
            
        <?php }; ?><hr>
    </div>
    <div class='row'>
        <h2>Suggestions</h2>
        
        <?php foreach($suggestions as $suggestion) { ?>
            <div class='col-md-5 card my-3 p-3'> 
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

